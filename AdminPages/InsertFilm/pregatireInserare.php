<?php
session_start();
$_SESSION['denumireFilm'] = "";
$_SESSION['dataFilm'] = "";
$_SESSION['durataFilm'] = 0;
$_SESSION['numeRegizor'] = "";
$_SESSION['prenumeRegizor'] = "";
$_SESSION['dataNasteriiRegizor'] = "";
$_SESSION['dataDecesRegizor'] = "";
$_SESSION['detalii'] = "";
header('Location: inserareFilm.php');
die();
