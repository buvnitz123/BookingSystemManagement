<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
    $_SESSION['nume'] = "";
    $_SESSION['prenume'] = "";
    $_SESSION['email'] = "";
    $_SESSION['tel'] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Inregistrare</title>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="login-container">
        <h2 class="login-title">Inregistrare</h2>
        <?php
        if (isset($_GET['user'])) {
            echo "<p style='color:red'>Usernameul nu este disponibil</p>";
        } elseif (isset($_GET['password'])) {
            echo "<p style='color:red'>Parola trebuie sa contina o litera mare,o litera mica, un numar si mai mare de 8 caractere</p>";
        } elseif (isset($_GET['passwordMatch'])) {
            echo "<p style='color:red'>Parolele nu sunt identice</p>";
        }
        ?>
        <form class="login-form" action="backendRegister.php" method="post">
            <label>Username:<input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" required></label><br>
            <label>Nume:<input type="text" name="nume_user" value="<?php echo $_SESSION['nume'] ?>" required></label><br>
            <label>Prenume:<input type="text" name="prenume_user" value="<?php echo $_SESSION['prenume'] ?>" required></label><br>
            <label>Email:<input type="email" name="email_user" value="<?php echo $_SESSION['email'] ?>" required></label><br>
            <label>Nr Telefon:<input type="tel" name="telefon_user" value="<?php echo $_SESSION['tel'] ?>" required></label><br>
            <label>Parola:<input type="password" name="parola_user" required></label><br>
            <label>Verificare parola:<input type="password" name="parola2_user" required></label><br>
            <input class="register-submit-btn" type="submit" value="Inregistrare cont">
        </form>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>