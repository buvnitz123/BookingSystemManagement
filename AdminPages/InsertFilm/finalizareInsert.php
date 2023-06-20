<?php
session_start();
include("../../BazaDeDateCinema.php");
if (isset($_POST['submit'])) {
    $titluFilm = $_SESSION['denumireFilm'];
    $durataFilm = $_SESSION['durataFilm'];
    $dataFilm = $_SESSION['dataFilm'];
    $restrictie = $_SESSION['restrictieFilm'];
    $numeRegizor = $_SESSION['numeRegizor'];
    $prenumeRegizor = $_SESSION['prenumeRegizor'];
    $dataNasteriiReg = $_SESSION['dataNasteriiRegizor'];
    $dataDecesReg = $_SESSION['dataDecesRegizor'];
    $listaActori = $_SESSION['listaActori'];
    $listaGenuri = $_SESSION['arrayGenuri'];
    $detaliiFilm = $_SESSION['detalii'];
    $caleImg = $_SESSION['caleImg'];
    $link = $_SESSION['link'];
    $idRegizor = AdaugareRegizor($numeRegizor, $prenumeRegizor, $dataNasteriiReg, $dataDecesReg);
    $idDetalii = AdaugareDetalii($detaliiFilm, $link);
    $idFilm = AdaugareFilm($titluFilm, $dataFilm, $durataFilm, $restrictie, $idRegizor, $idDetalii, $caleImg);
    AsociereDetalii($idFilm, $idDetalii);
    foreach ($listaGenuri as $gen) {
        AsociereGenFilm($idFilm, $gen);
    }
    foreach ($listaActori as $actor) {
        $idActor = AdaugareActor($actor['nume'], $actor['prenume'], $actor['nationalitate'], $actor['data_nasterii'], $actor['data_deces']);
        AsociereActorFilm($idFilm, $idActor);
    }
    foreach ($_SESSION as $key => $value) {
        if ($key !== 'user' && $key !== 'functie') {
            unset($_SESSION[$key]);
        }
    }
    header("Location: ../admin-page.php");
    exit();
}
if (isset($_POST['anulare'])) {
    unlink("../" . $caleImg);
    foreach ($_SESSION as $key => $value) {
        if ($key !== 'user' && $key !== 'functie') {
            unset($_SESSION[$key]);
        }
    }
    header("Location: ../admin-page.php");
    exit();
}
