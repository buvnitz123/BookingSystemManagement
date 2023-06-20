<?php
session_start();
$den_film = $_SESSION['filmDen'];
$filmBun = $_SESSION['filmBun'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Modificare</title>
</head>

<body>
    <div>
        <h4>Filmul <?php echo $den_film ?></h4>

        <?php
        foreach ($filmBun as $film) {
            echo "<form action='prelucrareModificare2.php' method='post'>
                <label>Acest film ruleaza la $film[6] </label>
                <input type='hidden' name='datetime' value='$film[6]'>
                <input type='submit' value='Selecteaza'></form>";
        }
        ?>
        <br>
        <a href="modificareFilm.php">Inapoi</a>
    </div>
</body>

</html>