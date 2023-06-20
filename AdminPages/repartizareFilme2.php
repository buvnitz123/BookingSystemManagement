<?php
session_start();
$idFilm = $_SESSION['idFilm'];
$numeFilm = $_SESSION['numeFilm'];
$idSala = $_SESSION['idSala'];
$data = $_SESSION['data'];
$ora = $_SESSION['ora'];
$durata = $_SESSION['durata'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        p {
            margin-top: 20px;
            font-size: 18px;
        }

        form {
            margin-top: 10px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
            display: inline-block;
            background-color: #f1f1f1;
            padding: 5px 10px;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <p>Doriti sa adaugati <b><?php echo $numeFilm ?></b> la ora <b><?php echo $ora ?></b> in data de <b><?php echo $data ?></b>?</p>
    <form action="repartizareFilmeFinal.php" method="post">
        <label>Film: <?php echo $numeFilm ?></label><br>
        <label>Sala: <?php echo $idSala ?></label><br>
        <label>Ora: <?php echo $ora ?></label><br>
        <label>Data: <?php echo $data ?></label><br>
        <label>Durata: <?php echo $durata ?></label><br>
        <a href="repartizareFilme.php">Inapoi</a>
        <input type="submit" value="Da">
    </form>
</body>

</html>