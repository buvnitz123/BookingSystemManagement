<?php
session_start();
include("../../BazaDeDateCinema.php");
$_SESSION['datetime'] = $_POST['datetime'];
header('Location: modificareFinal.php');
