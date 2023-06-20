<?php
session_start();
include("../BazaDeDateCinema.php");
$user = $_SESSION['username'];
if (isset($_POST['da']) && $_SESSION['optiuneUser'] == "upgrade") {
    upgradeUser($user);
    header('Location: upgradeUser.php');
} elseif (isset($_POST['da']) && $_SESSION['optiuneUser'] == "delete") {
    deleteUser($user);
    header('Location: upgradeUser.php');
} else if (isset($_POST['nu'])) {
    header('Location: upgradeUser.php');
}
die();
