<?php
session_start();
include("../BazaDeDateCinema.php");
$id_film = $_SESSION['idFilm'];
$denumire = $_SESSION['denFilm'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <p>Doriti sa stergeti filmul <?php echo $denumire ?>?</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" name="da" value="DA">
            <input type="submit" name="nu" value="NU">
        </form>
        <?php
        if (isset($_POST['da'])) {
            try {
                stergereFilm($id_film);
                header("Location:stergereFilm.php");
            } catch (\Throwable $th) {
                echo "<p>Filmul nu a putut fi sters din motive de siguranta!</p>";
            }
        } elseif (isset($_POST['nu'])) {
            header("Location:stergereFilm.php");
        }
        ?>
    </div>
</body>

</html>