<?php

/*   Files called in ajax */
/*
  echo '<pre>';
  print_r($_REQUEST);
 * 
 * Array
  (
  [nom] => a
  [email] => b
  )
 */
require_once 'config.php';
session_start();
session_write_close();


$invit = base64_encode(uniqid());
$from = getUserIdFromSession($_SESSION['token']);
//$from = getUserIdFromMail($_REQUEST['email']);
addInviToDb($from, $_REQUEST['email'], $invit);

$invitLink =  $_SERVER['HTTP_ORIGIN'] . '/' . dirname($_SERVER['SCRIPT_NAME']) . '/friendSubscribe.php?invit_token=' . $invit;

require_once '../MailerPHP/vendor/PHPMailer/PHPMailerAutoload.php';

$from = "MyEvent";
$exp = 'myevent.organiser@gmail.com';
$pass = 'Adminmyevent';
$dests[] = $_REQUEST['email'];
$destsBcc = ['dl_aznar@mode83.net'];

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
$mail->Subject = "MyEvent Oragniser : Invitation";
$mail->Body = utf8_decode("Bonjour, <br><br>" . $_REQUEST['nom'] . " vous avez été invité. Merci de cliquer sur le lien ci-dessous :<br><a href=\"".$invitLink.'">Voir mon invitation</a>');

foreach ($dests as $d) {
    $mail->addAddress($d);
}
foreach ($destsBcc as $d) {
    $mail->addBCC($d);
}

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    exit();
}


echo "0"; // no error

function addInviToDb($fromId, $destMail, $invitToken) {
    global $bdd;
    $query = 'INSERT INTO `amis`(`ami_from`, `ami_to`, `ami_date`, `invit_token`)  VALUES (' . $bdd->quote($fromId) . ',' . $bdd->quote($destMail) . ','.time(). ',' . $bdd->quote($invitToken) . ')';
   // echo $query."<hr>";
    try {
        $bdd->exec($query);
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
   
}

function getUserIdFromSession($inToken) {
    global $bdd;
    $query = 'SELECT `id` FROM `compte` WHERE `token`=' . $bdd->quote($inToken);

    try {
        $sth = $bdd->query($query);
        $data = $sth->fetchAll();
        return $data[0]['id'];
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    return null;
}
