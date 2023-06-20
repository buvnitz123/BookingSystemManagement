<?php
session_start();
include("../BazaDeDateCinema.php");
include("Utilitati.php");
$locuriIndisponibile = array();
$locuriCumparate = array();
$rezervari = AfisareRezervare($_SESSION['idFilm'], $_SESSION['idSala'], $_SESSION['dataProiectiei'], $_SESSION['ora']);
$achizitii = AfisareAchizitie($_SESSION['idFilm'], $_SESSION['idSala'], $_SESSION['dataProiectiei'], $_SESSION['ora']);
foreach ($rezervari as $locuri) {
    $locuriIndisponibile[] = 'L' . $locuri['nr_rand'] . $locuri['numar_loc'];
}
foreach ($achizitii as $achizitie) {
    $locuriCumparate[] = 'L' . $achizitie['nr_rand'] . $achizitie['numar_loc'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .container {
            margin: 5% auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
        }

        .btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background-color: #3e8e41;
        }

        .ecran {
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 200px;
            width: 75%;
            margin-left: 2%;
            margin-top: 15px;
            margin-bottom: 10px;
            background-color: black;
            text-align: center;
        }

        .sala {
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: gray;
            width: 80%;
            margin-bottom: 10px;
            padding-left: 15px;
            padding-right: 15px;
            display: inline-block;
            padding-left: 15%;
        }

        .scaun {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 5px;
        }

        .seat {
            display: inline-block;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 5px;
        }

        .legend {
            margin: 10px;
        }

        .legend span {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border: 1px solid #000;
            vertical-align: middle;
        }

        .legend span:nth-child(1) {
            background-color: green;
        }

        .legend span:nth-child(2) {
            background-color: red;
        }

        .legend span:nth-child(3) {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Selecteaza locul</h2>
        <?php
        echo "<p>Va rog sa selectati " . $_SESSION['nrBilete'] . " locuri </p>
        <b>*(Trebuie sa aveti in vedere faptul ca rezervarile vor fi anulate cu 30 de minute inainte de inceperea filmului!)</b>"
        ?>
        <hr>
        <?php
        echo "<div class='legend'>";
        echo "<span style='background-color: green'></span> Liber ";
        echo "<span style='background-color: red'></span> Cumpărat ";
        echo "<span style='background-color: yellow'></span> Rezervat ";
        echo "</div>";
        $listaLocuri = getSeats($_SESSION['idSala'])
        ?>
        <form action="prelucrarePasul3.php" method="post">
            <?php
            $nrLocuri = count($listaLocuri);
            $nrRanduri = (int)($nrLocuri / 10);
            $nrLocRand = (int)($nrLocuri / $nrRanduri);
            $locRamas = $nrLocuri % $nrRanduri;
            $randSalvat = 0;
            if ($locRamas != 0) {
                $nrRanduri++;
            }
            $nrLocRandExtra = $nrLocRand + 1;
            $locRamasRandExtra = $nrLocuri % $nrRanduri;
            $locCounter = 0;
            echo "<div class='sala'>";
            echo "<div class='ecran'>";
            echo "<p style='color:#fff'>Ecran</p>";
            echo "</div>";
            if ($locRamasRandExtra != 0) {
                $nrRanduri = $nrRanduri - 1;
            }
            for ($i = 0; $i < $nrRanduri; $i++) {
                echo "<div class='scaun'>";
                for ($j = 0; $j < $nrLocRand; $j++) {
                    echo "<label class='seat' " . setCuloareRezervari('L' . ($i + 1) . ($j + 1), $locuriIndisponibile, $locuriCumparate) . ">" . 'L' . ($i + 1) . ($j + 1) . " <input type='checkbox' " . verifLoc('L' . ($i + 1) . ($j + 1), $locuriIndisponibile, $locuriCumparate) . " value=" . 'L' . ($i + 1) . ($j + 1) . " name='checkbox[]'></label>";
                    $locCounter++;
                }
                echo "</div>";
            }
            if ($locRamasRandExtra != 0) {
                $nrRanduri = $nrRanduri + 1;
            }
            echo "<div class='scaun'>";
            for ($k = 0; $k < $locRamasRandExtra; $k++) {
                echo "<label class='seat' " . setCuloareRezervari('L' . ($nrRanduri) . ($k + 1), $locuriIndisponibile, $locuriCumparate) . ">" . 'L' . ($nrRanduri) . ($k + 1) . " <input type='checkbox' " . verifLoc('L' . ($nrRanduri) . ($k + 1), $locuriIndisponibile, $locuriCumparate) . " value=" . 'L' . ($nrRanduri) . ($k + 1) . " name='checkbox[]'></label>";
                $locCounter++;
            }
            echo "</div>";
            echo "</div>";
            ?>
            <a class="btn" href="Pasul2.php">Inapoi</a>
            <input class="btn" type="submit" value="Pasul urmator"><br>
            <?php
            if (isset($_GET['header'])) {
                echo "<p style='color:red;'>Eroare: Va rog selectati " . $_SESSION['nrBilete'] . " locuri</p>";
            }
            ?>
        </form>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>