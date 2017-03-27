<?php

require_once('MailerPHP/vendor/PHPMailer/PHPMailerAutoload.php');

$from = "MyEvent";
$exp = 'Zboub';
$pass ='HAHAlol';
$dests = ['dl_aznar@mode83.net', ''];
$destsBcc = [];

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = $exp;
$mail->Password = $pass;
$mail->SetFrom($exp, $from);
$mail->Subject = "Réinitialisation de mot de passe";
$mail->Body = "Merci de cliquer sur ce lien pour pouvoir changer votre mot de passe !";
foreach ($dests as $d) {
    $mail->AddAddress($d);
}
foreach ($destsBcc as $d) {
    $mail->addBCC($d);
}

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
    header('location: HTML/page_connexion.html');
 }
