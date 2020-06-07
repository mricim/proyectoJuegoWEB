<?php

//VARS NECESARY
/*
$SentToEmail = 'ericcasanova.m@gmail.com'; //email destinatario
$SentToName = 'Eric'; //NAME OR NULL 
$Asunto = 'Here is the subject 4';
$BodyHTML = 'This is the HTML message body <b>in bold!</b> XXXXXXX 3'; //Cuerpo
*/
$AltBodyHTML = strip_tags($BodyHTML); //Cuerpo sin html

//RETURN
//$msg = '';




require($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/varsWeb.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


require $_SERVER['DOCUMENT_ROOT'] . '/includes/mail/phpmailer/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mail/phpmailer/PHPMailer/src/SMTP.php';
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Europe/Amsterdam');




// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(false);
// To load the French version
$mail->setLanguage('es', './PHPMailer/lenguage/');



//Server settings
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
$mail->isSMTP();                                            // Send using SMTP
$mail->Host       = $HostSMTP;                    // Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = $SendFromEMAIL;                     // SMTP username
$mail->Password   = $ContrasenaDelCorreo;                               // SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted //Disable PHPMailer::ENCRYPTION_STARTTLS
$mail->Port       = $PortSMTP;                                    // TCP port to connect to


//Recipients
$mail->setFrom($SendFromEMAIL, $QuienLoEnviaNAME); //Quien lo envia

if (!empty($SentToName)) {
    $mail->addAddress($SentToEmail, $SentToName);     // Add a recipient / Name is optional
} else {
    $mail->addAddress($SentToEmail);     // Add a recipient / Name is optional
}
//$mail->addAddress($SentToEmail);               // Multiple Count
$mail->addReplyTo($SendFromEMAILreply, $QuienResponderNAME);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $Asunto; //asunto
$mail->Body    = $BodyHTML; //send HTML
$mail->Body    = $BodyHTMLTest;
$mail->AltBody = $AltBodyHTML; //send not HTML
//
/*
    $mail->Subject = 'PHPMailer GMail SMTP test';
    $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    $mail->AltBody = 'This is a plain-text message body';
    */

if (!$mail->send()) {
    // $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
    return 1;
} else {
    // $msg .= 'Message sent!';
    return 0;
}
return 2;