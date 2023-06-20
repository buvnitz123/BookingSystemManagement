<?php
session_start();
if (isset($_POST['nume'])) {
    $_SESSION['nume'] = $_POST['nume'];
    $_SESSION['prenume'] = $_POST['prenume'];
    $_SESSION['telefon'] = $_POST['telefon'];
    $_SESSION['email'] = $_POST['email'];
}
header("Location: Pasul5.php");
