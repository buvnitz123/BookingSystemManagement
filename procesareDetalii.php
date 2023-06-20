<?php
session_start();
$_SESSION['idFilm'] = $_POST['id_film'];
$_SESSION['denFilm'] = $_POST['denumire_film'];
$_SESSION['idSala'] = $_POST['idSala'];
$_SESSION['ora'] = $_POST['oraFilm'];
$_SESSION['durata'] = $_POST['durata'];
header("Location: FilmDetalii.php");
