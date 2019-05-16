<!DOCTYPE html>
<?php
/**
 * @remark Mettre le bon chemin d'accès à votre fichier contenant les constantes
 */
require_once '../config/mailparam.php';
// Inclure le fichier swift_required.php localisé dans le répertoire swiftmailer5
require_once '../swiftmailer5/lib/swift_required.php';

?>
<html>    
<head>
<meta charset="utf-8">
<title>Mailing - Sample</title>
</head>
<body>
<?php

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
    $message->setSubject('Petit test de message');
    // Qui envoie le message 
    $message->setFrom(array('locamoto.noreply@gmail.com' => 'LOCAMOTO'));
    // A qui on envoie le message
    $message->setTo(array('ludovic.jctdt@eduge.ch'));

    // Un petit message html
    // On peut bien évidemment avoir un message texte
    $body = 
    '<html>' .
    ' <head></head>' .
    ' <body>'.
    '  <p>Un petit message envoyé avec Swift Mailer 5.</p>' .
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

echo "Message envoyé à ludovic.jctdt@eduge.ch";

?>
</body>
</html>