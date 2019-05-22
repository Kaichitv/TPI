<?php
/*
  Projet: LOCAMOTO
  Description: Envoie d'email
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */


require_once('config/mailparam.php');
// Inclure le fichier swift_required.php localisé dans le répertoire swiftmailer5
require_once('swiftmailer5/lib/swift_required.php');

if(isset($_POST["email"]))
{
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
}
if(isset($_POST["marque"]))
{
    $marque = filter_input(INPUT_POST, 'marque', FILTER_SANITIZE_STRING);
}
if(isset($_POST["dateStart"]))
{
    $dateStart = filter_input(INPUT_POST, 'dateStart', FILTER_SANITIZE_STRING);
}
if(isset($_POST["dateEnd"]))
{
    $dateEnd = filter_input(INPUT_POST, 'dateEnd', FILTER_SANITIZE_STRING);
}
if(isset($_POST["price"]))
{
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
}

// On doit créer une instance de transport smtp avec les constantes
// définies dans le fichier mailparam.php
$transport = Swift_SmtpTransport::newInstance(EMAIL_SERVER, EMAIL_PORT, EMAIL_TRANS)
->setUsername(EMAIL_USERNAME)
->setPassword(EMAIL_PASSWORD);

try {
    // On crée un nouvelle instance de mail en utilisant le transport créé précédemment
    $mailer = Swift_Mailer::newInstance($transport);
    // On crée un nouveau message
    $message = Swift_Message::newInstance();
    // Le sujet du message
    $message->setSubject('LOCAMOTO: réservation confirmée');
    // Qui envoie le message 
    $message->setFrom(array('locamoto.noreply@gmail.com' => 'LOCAMOTO'));
    // A qui on envoie le message
    $message->setTo(array($email));

    // Un petit message html
    // On peut bien évidemment avoir un message texte
    $body = 
    '<html>' .
    ' <head></head>' .
    ' <body>'.
    '  <p>Bonjour, <br><br> Votre réservation du véhicule : '. $marque .' du : '. date_format(date_create($dateStart), "d.m.Y") .' jusqu\'au : '. date_format(date_create($dateEnd), "d.m.Y") .' a été approuvée au prix de : '. $price .'.- CHF <br><br>Merci d\'en prendre note.</p>' .
    ' </body>' .
    '</html>';
    // On assigne le message et on dit de quel type. Dans notre exemple c'est du html
    $message->setBody($body,'text/html');
    // Maintenant il suffit d'envoyer le message
    $result = $mailer->send($message);

} catch (Swift_TransportException $e) {
	echo "Problème d'envoi de message: ".$e->getMessage();
	exit();
}

header("Location: managelocation.php?message2");