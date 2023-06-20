<?php
session_start();
$_SESSION['denumireFilm'] = $_POST['denumire'];
$_SESSION['dataFilm'] = $_POST['data_lansarii'];
$_SESSION['durataFilm'] = $_POST['durata'];
$_SESSION['restrictieFilm'] = $_POST['restrictie'];
$_SESSION['arrayGenuri'] = $_POST['genuri'];
$_SESSION['numeRegizor'] = $_POST['nume_regizor'];
$_SESSION['prenumeRegizor'] = $_POST['prenume_regizor'];
$_SESSION['dataNasteriiRegizor'] = $_POST['data_nasterii_regizor'];
$_SESSION['dataDecesRegizor'] = $_POST['data_deces_regizor'];
$url = $_POST['link'];
$queryParams = parse_url($url, PHP_URL_QUERY);
parse_str($queryParams, $queryArray);
if (isset($queryArray['v'])) {
    $videoId = $queryArray['v'];
}
$_SESSION['link'] = $videoId;
$_SESSION['listaActori'] = array();
header("Location: inserareFilm2.php");
exit();
