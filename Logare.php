<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php?date" . date('Y-m-d'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="login-container">
        <h2 class="login-title">Login</h2>
        <?php
        if (isset($_GET['succes'])) {
            echo "<p style='color:green'>Cont creat cu succes</p>";
        }
        if (isset($_GET['achizitie'])) {
            echo "<p style='color:red'>Pentru achizitie este necesar sa va logati</p>";
            $_SESSION['achizitie'] = true;
        }
        ?>
        <form class="login-form" action="#" method="post">
            <label>Username: <input type="text" name="username" required></label><br>
            <label>Parola: <input type="password" name="parola_user" required></label><br>
            <input type="submit" value="Login" class="login-submit-btn">
        </form>
        <?php
        if (isset($_POST['username']) && isset($_POST['parola_user'])) {
            include('BazaDeDateCinema.php');
            $user = $_POST['username'];
            $password = $_POST['parola_user'];
            if (VerificareCont($user, md5($password))) {
                echo "<p>Logare cu succes!</p>";
                $_SESSION['user'] = $user;
                if (verifAdmin($user)) {
                    $_SESSION['functie'] = "admin";
                } else {
                    $_SESSION['functie'] = "client";
                }
                if (isset($_SESSION['user'])) {
                    if (isset($_SESSION['achizitie'])) {
                        unset($_SESSION['achizitie']);
                        header("Location: PrelucrareBooking/Pasul1.php");
                        die();
                    }
                    header("Location: index.php");
                }
            } else {
                echo "<p>Username și/sau parolă incorecte!</p>";
            }
        }
        ?>
        <a class="register-submit-btn" href="Inregistrare.php">Register</a>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>