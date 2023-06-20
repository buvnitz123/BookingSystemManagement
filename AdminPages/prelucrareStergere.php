<?php
session_start();
include("../BazaDeDateCinema.php");
$_SESSION['idFilm'] = $_POST['filmId'];
$_SESSION['denFilm'] = $_POST['filmDen'];
header("Location: stergereFilm2.php");
die();
