<?php
session_start();
include("../../BazaDeDateCinema.php");
$_SESSION['filmId'] = $_POST['filmId'];
$_SESSION['filmDen'] = $_POST['filmDen'];
$_SESSION['filme'] = getMoviesThatWillBe();
$_SESSION['filmBun'] = array();
foreach ($_SESSION['filme'] as $film) {
    if ($film[0] == $_SESSION['filmId']) {
        array_push($_SESSION['filmBun'], $film);
    }
}
if (empty($_SESSION['filmBun'])) {
    header('Location: modificareFilm.php?noexist');
    die();
}
header('Location: modificareFilm2.php');
die();
