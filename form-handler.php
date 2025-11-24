<?php
// 1. Autoriser les requêtes venant de ton site (CORS)
header("Access-Control-Allow-Origin: *"); // En prod, remplace * par ton domaine (ex: https://moon-services.fr)
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Gérer les requêtes OPTIONS (pre-flight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Récupération des données
$prenom   = sanitize($_POST['prenom'] ?? '');
$nom      = sanitize($_POST['nom'] ?? '');
$company  = sanitize($_POST['company'] ?? '');
$phone    = sanitize($_POST['phone'] ?? '');
$email    = sanitize($_POST['email'] ?? '');
$message  = nl2br(sanitize($_POST['message'] ?? ''));

// Gestion particulière pour le tableau de services
$services = $_POST['services'] ?? []; 
if (!is_array($services)) {
    $services = [$services]; // Force en tableau si ce n'est pas le cas
}

// Vérification
if (empty($prenom) || empty($nom) || empty($phone) || empty($message) || empty($services) || empty($email)) {
    http_response_code(400);
    echo json_encode(["error" => "Veuillez remplir tous les champs obligatoires."]);
    exit;
}

// Formatage HTML de la liste des services
$servicesList = "";
foreach ($services as $srv) {
    $srvSanitized = sanitize($srv);
    $servicesList .= "<li>$srvSanitized</li>";
}

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$senderEmail = $_ENV['MAIL_USERNAME'] ?? getenv('MAIL_USERNAME');

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host       = $_ENV['MAIL_HOST'] ?? getenv('MAIL_HOST');
    $mail->SMTPAuth   = true;
    $mail->Username   = $senderEmail;
    $mail->Password   = $_ENV['MAIL_PASSWORD'] ?? getenv('MAIL_PASSWORD');
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // --- MAIL ADMIN (Pour toi) ---
    $mail->setFrom($senderEmail, 'Site Web Moon Services');
    $mail->addAddress($senderEmail); 
    $mail->addBCC('ryan.cecon@gmail.com');

    

    $mail->isHTML(true);
    $mail->Subject = "Demande de devis : $prenom $nom";
    $mail->Body = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
      <h2>Nouvelle demande de devis</h2>
      <p><strong>Client :</strong> $prenom $nom</p>
      <p><strong>Entreprise :</strong> $company</p>
      <p><strong>Email :</strong> $email</p>
      <p><strong>Téléphone :</strong> $phone</p>
      <hr>
      <h3>Services demandés :</h3>
      <ul>$servicesList</ul>
      <p>$senderEmail : test .env</p>
      <h3>Message :</h3>
      <p>$message</p>
    </body>
    </html>";
    
    $mail->send();

    // --- MAIL CONFIRMATION CLIENT ---
    // On réinitialise les destinataires pour le second mail
    $mail->clearAddresses();
    $mail->clearBCCs();
    
    $mail->addAddress($email);
    $mail->Subject = 'Confirmation de votre demande - Moon Services';
    $mail->Body = "
    <html>
      <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
        <div style='background: #fff; padding: 20px; border-radius: 10px; text-align: center;'>
          <h2 style='color: #02638c;'>Merci $prenom !</h2>
          <p>Nous avons bien reçu votre demande de devis.</p>
          <p>Notre équipe vous répondra sous 24h à 48h.</p>
          <br>
          <p>L’équipe Moon Services</p>
        </div>
      </body>
    </html>";

    $mail->send();

    echo json_encode(["success" => true, "message" => "Email envoyé avec succès"]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $mail->ErrorInfo]);
}
?>