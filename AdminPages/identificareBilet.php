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
        <h4>Introduceti biletul:</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Introduceti codul biletului: <input type="text" name="codBilet" required></label>
            <a href="admin-page.php">Inapoi</a>
            <input type="submit" value="Cauta">
        </form>
        <?php
        include_once("..\BazaDeDateCinema.php");
        if (isset($_POST['codBilet'])) {
            $bilet = cautareBilet($_POST['codBilet']);
            if (empty($bilet)) {
                echo "<p style='color:red'>Nu exista acest bilet</p>";
            } else {
                foreach ($bilet as $b) {
                    echo "<p>Film: " . $b['denumire_film'] . "<br>Ora: " . $b['ora_proiectie'] . "<br>Data: " . $b['data_proiectie'] . "<br>Sala: " . $b['id_sala'] . "<br>Rand: " . $b['nr_rand'] . " Loc: " . $b['numar_loc'] . "</p>";
                }
            }
        }
        ?>
    </div>
</body>

</html>