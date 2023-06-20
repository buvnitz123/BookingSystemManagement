<?php
session_start();
$idFilm = $_SESSION['idFilm'];
$numeFilm = $_SESSION['numeFilm'];
$idSala = $_SESSION['idSala'];
$data = $_SESSION['data'];
$ora = $_SESSION['ora'];
$durata = $_SESSION['durata'];
include_once("..\BazaDeDateCinema.php");
RepartizareFilm($idSala, $idFilm, $data, $ora, $durata);
header("Location: admin-page.php");
exit();
