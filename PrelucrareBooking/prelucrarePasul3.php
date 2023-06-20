<?php
session_start();
if (isset($_POST['checkbox'])) {
    if (count($_POST['checkbox']) != $_SESSION['nrBilete']) {
        header("Location: Pasul3.php?header");
    } else {
        $_SESSION['RandSiLoc'] = $_POST['checkbox'];
        header("Location: Pasul4.php");
    }
} else {
    header("Location: Pasul3.php?header");
}
