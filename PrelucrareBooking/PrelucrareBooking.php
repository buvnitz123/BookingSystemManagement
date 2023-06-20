<?php
session_start();
include('../BazaDeDateCinema.php');
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = "guest";
}
$idSala = $_SESSION['idSala'];
$randSiLoc = $_SESSION['RandSiLoc'];
$idFilm = $_SESSION['idFilm'];
$dataRezervare = date('Y-m-d');
$dataProiectiei = $_SESSION['dataProiectiei'];
$oraProiectiei = $_SESSION['ora'];
//---------------
$email = $_SESSION['email'];

require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = "smtp-relay.sendinblue.com";
$mail->Port = 587;
$mail->Username = "dragoschiper89@gmail.com";
$mail->Password = "GQTK0ayndD1fJHN7";
$mail->setFrom("no.reply@cinemaproject.com", "CinemaProject");
$mail->addAddress($email, $user);
$mail->Subject = $_SESSION['booking'];
if ($_SESSION['booking'] == 'Achizitie') {
    $bilete = array();
    foreach ($randSiLoc as $rd) {
        $rand = substr($rd, 1, 1);
        $loc = substr($rd, 2);
        foreach ($_SESSION['tipuriBilete'] as $tipBilet) {
            if ($_SESSION['nr' . $tipBilet['denumire']] != 0) {
                $categorie = $_SESSION['denTipBilet' . $tipBilet['denumire']];
                $id = AchizitieBilet($tipBilet['pret'], $categorie, $oraProiectiei, $dataProiectiei, $idSala, $loc, $rand, $idFilm);
                $_SESSION['nr' . $tipBilet['denumire']] = $_SESSION['nr' . $tipBilet['denumire']] - 1;
                array_push($bilete, md5($id));
                break;
            }
        }
    }
    $folderCoduriQR = 'CoduriQR/';
    foreach ($bilete as $index => $bilet) {
        $qrCode = new QrCode($bilet);
        $writer = new PngWriter;
        $result = $writer->write($qrCode);

        $numeFisier = 'bilet' . ($index + 1) . '.png';
        $caleFisier = $folderCoduriQR . $numeFisier;

        file_put_contents($caleFisier, $result->getString());

        $mail->addAttachment($caleFisier, $numeFisier);
    }

    $mail->Body = "Buna ziua domnule/doamna " . $_SESSION['nume'] . " " . $_SESSION['prenume'] . "!Multumim pentru tranzactie, aici biletele dumneavoastra!";
} elseif ($_SESSION['booking'] == 'Rezervare') {
    $cod = md5($user . $idSala . $idFilm . date('Y-m-d h:i') . $dataProiectiei . $oraProiectiei);
    foreach ($randSiLoc as $rd) {
        $rand = substr($rd, 1, 1);
        $loc = substr($rd, 2);
        addRezervare($user, $idSala, $loc, $rand, $idFilm, $dataRezervare, $dataProiectiei, $oraProiectiei, $cod);
    }
    $mail->Body = "Buna ziua domnule/doamna " . $_SESSION['nume'] . " " . $_SESSION['prenume'] . "! Confirmam rezervarea dumneavoastra! Codul rezervarii dumneavoastra este " . $cod;
}
$mail->send();
foreach ($_SESSION as $key => $value) {
    if ($key !== 'user' && $key !== 'functie') {
        unset($_SESSION[$key]);
    }
}
foreach ($bilete as $index => $bilet) {
    $numeFisier = 'bilet' . $index . '.png';
    $caleFisier = $folderCoduriQR . $numeFisier;
    unlink($caleFisier);
}
header('Location: PasulFinal.php');
