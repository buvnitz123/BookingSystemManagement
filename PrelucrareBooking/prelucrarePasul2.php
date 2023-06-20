<?php
session_start();
$_SESSION['nrBilete'] = 0;
$_SESSION['pret'] = 0;
foreach ($_SESSION['tipuriBilete'] as $tipBilet) {
    if (isset($_POST[$tipBilet['denumire']])) {
        $_SESSION['nrBilete'] += $_POST[$tipBilet['denumire']];
        $_SESSION['nr' . $tipBilet['denumire']] = $_POST[$tipBilet['denumire']];
        $_SESSION['denTipBilet' . $tipBilet['denumire']] = $tipBilet['denumire'];
        $_SESSION['pretBilet' . $tipBilet['denumire']] = $tipBilet['pret'];
    }
    if ($_SESSION['nr' . $tipBilet['denumire']] > 0) {
        $_SESSION['pret'] += $_SESSION['pretBilet' . $tipBilet['denumire']] * $_SESSION['nr' . $tipBilet['denumire']];
    }
}


if ($_SESSION['nrBilete'] > 10) {
    header("Location: Pasul2.php?biletMax");
} else if ($_SESSION['nrBilete'] == 0) {
    header("Location: Pasul2.php?biletMin");
} else {
    header("Location: Pasul3.php");
}
