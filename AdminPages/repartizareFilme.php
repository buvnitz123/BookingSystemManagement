<?php
session_start();
include_once("..\BazaDeDateCinema.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestiune Film</title>
</head>

<body>
    <div>
        <h4>Repartizare film la o ora</h4>
        <form action="#" method="post">
            <label>Sala: <select name="sala">
                    <?php
                    $listaSali = getListaSali();
                    foreach ($listaSali as $sala) {
                        echo "<option value='" . $sala . "'>" . "Sala ", $sala . "</option>";
                    }
                    ?>
                </select></label><br>
            <label>Filmul: <select name="film">
                    <?php
                    $listaFilme = getMovies();
                    foreach ($listaFilme as $film) {
                        echo "<option value='" . $film[0] . "'>" . $film[1] . "</option>";
                    }
                    ?>
                </select></label><br>
            <label>Ora: <input type="time" name="ora" min="10:00" max="23:00" required></label><br>
            <label>Data: <input type="date" name="data" min="<?php echo date("Y-m-d"); ?>" required></label><br>
            <a href="admin-page.php">Inapoi</a>
            <input type="submit" name="submit" value="Next">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $_SESSION['idFilm'] = $_POST['film'];

            $_SESSION['idSala'] = $_POST['sala'];
            $_SESSION['data'] = $_POST['data'];
            $_SESSION['ora'] = $_POST['ora'];
            foreach ($listaFilme as $film) {
                if ($_SESSION['idFilm'] == $film[0]) {
                    $_SESSION['numeFilm'] = $film[1];
                    $_SESSION['durata'] = $film[2];
                }
            }
            header("Location: repartizareFilme2.php");
            exit();
        }
        ?>

    </div>
</body>

</html>