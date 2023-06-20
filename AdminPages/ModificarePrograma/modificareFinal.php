<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <h4>Ati selectat filmul <?php echo $_SESSION['filmDen'] ?>, de la data si ora <?php echo $_SESSION['datetime'] ?></h4>
        <form action="prelucrareModificareFinal.php" method="post">
            <label>Selectati data: <input type="date" name="date" min="<?php echo date('Y-m-d') ?>"></label><br>
            <label>Selectati ora: <input type="time" name="time"></label><br>
            <a href="modificareFilm.php?anulare">Anulare</a>
            <a href="modificareFilm2.php">Inapoi</a>
            <input type="submit" value="Modifica">
        </form>
    </div>
</body>

</html>