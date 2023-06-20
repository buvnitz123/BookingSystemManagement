<?php
session_start();
include("../../BazaDeDateCinema.php");
$datetime = $_SESSION['datetime'];
$idFilm = $_SESSION['filmId'];
$dataNoua = $_POST['date'];
$oraNoua = $_POST['time'];
$dataVeche = substr($datetime, 0, 10);
$oraVeche = substr($datetime, 10);
actualizareProgram($idFilm, $oraVeche, $dataVeche, $oraNoua, $dataNoua);
header('Location: modificareFilm.php');
die();
