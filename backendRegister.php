<?php
session_start();
include('BazaDeDateCinema.php');
include('PrelucrareBooking/Utilitati.php');
$username = $_POST['username'];
$nume = $_POST['nume_user'];
$prenume = $_POST['prenume_user'];
$parola = $_POST['parola_user'];
$tel = $_POST['telefon_user'];
$email = $_POST['email_user'];
$_SESSION['username'] = $username;
$_SESSION['nume'] = $nume;
$_SESSION['prenume'] = $prenume;
$_SESSION['email'] = $email;
$_SESSION['tel'] = $tel;
if ($parola === $_POST['parola2_user']) {
    if (verifParola($parola)) {
        if (AdaugareCont($username, $nume, $prenume, $email, $tel, md5($parola))) {
            foreach ($_SESSION as $key => $value) {
                if ($key !== 'user' && $key !== 'functie') {
                    unset($_SESSION[$key]);
                }
            }
            header("Location:Logare.php?succes");
            die();
        } else {
            header("Location: Inregistrare.php?user");
        }
    } else {
        header("Location: Inregistrare.php?password");
    }
} else {
    header("Location: Inregistrare.php?passwordMatch");
}
