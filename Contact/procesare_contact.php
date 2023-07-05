<?php
$name = $_POST['nume'];
$continut = $_POST['mesaj'];
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = "smtp-relay.sendinblue.com";
$mail->Port = 587;
$mail->Username = "example@gmail.com";
$mail->Password = "example";
$mail->setFrom("guest@cinemaproject.com", $name);
$mail->addAddress("example89@gmail.com");
$mail->Subject = "Contact";
$mail->Body = $continut;
$mail->send();
header("Location: finalizareContact.php");
die();
