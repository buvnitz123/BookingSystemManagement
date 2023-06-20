<?php
session_start();
if (isset($_POST['Next'])) {
    header("Location: inserareFilm3.php");
    die();
}
$_SESSION['numeActor'] = $_POST['nume'];
$_SESSION['prenumeActor'] = $_POST['prenume'];
$actor = array(
    'nume' => $_POST['nume'],
    'prenume' => $_POST['prenume'],
    'nationalitate' => $_POST['nationalitate'],
    'data_nasterii' => $_POST['data_nasterii'],
    'data_deces' => $_POST['data_deces']
);
$_SESSION['listaActori'][] = $actor;
header('Location: inserareFilm2.php?adaugareActor');
die();
