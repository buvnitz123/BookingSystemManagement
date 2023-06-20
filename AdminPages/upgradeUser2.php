<?php
session_start();
$_SESSION['username'] = $_POST['username'];
if (isset($_POST['upgrade'])) {
    $_SESSION['optiuneUser'] = "upgrade";
    $_SESSION['intrebare'] = "Doriti sa-l promovati pe " . $_SESSION['username'] . " la functia de admin?";
} elseif (isset($_POST['delete'])) {
    $_SESSION['optiuneUser'] = "delete";
    $_SESSION['intrebare'] = "Doriti sa-l stergeti pe " . $_SESSION['username'] . "?";
}
header("Location: upgradeUser3.php");
