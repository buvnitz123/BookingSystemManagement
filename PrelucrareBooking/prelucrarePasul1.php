<?php
session_start();
if (isset($_POST['booking'])) {
    if ($_POST['booking'] == 'Achizitie') {
        if (!isset($_SESSION['user'])) {
            header("Location: ../Logare.php?achizitie");
            die();
        } else {
            $_SESSION['booking'] = $_POST['booking'];
            header("Location: Pasul2.php");
            die();
        }
    }
    $_SESSION['booking'] = $_POST['booking'];
    header("Location: Pasul2.php");
    die();
} else {
    header("Location: Pasul1.php?metoda");
}
