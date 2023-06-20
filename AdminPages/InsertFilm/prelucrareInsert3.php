<?php
session_start();
$_SESSION['detalii'] = $_POST['detalii'];
$_SESSION['caleImg'] = '../Images/' . $_FILES['img']['name'];
$cale = '../../Images/' . $_FILES['img']['name'];
$upload = move_uploaded_file($_FILES['img']['tmp_name'], $cale);
header("Location: finalizareFilm.php");
die();
