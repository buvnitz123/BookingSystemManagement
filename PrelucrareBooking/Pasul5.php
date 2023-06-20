<?php
session_start();
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
    </style>
</head>

<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h2>Va rog verificati comanda!</h2>
            <hr>
            <h2>Date personale:</h2>
            <table>
                <tr>
                    <td>Nume:</td>
                    <td><?php echo $_SESSION['nume'], " , ", $_SESSION['prenume'] ?></td>
                </tr>
                <tr>
                    <td>Nr telefon:</td>
                    <td><?php echo $_SESSION['telefon'] ?></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><?php echo $_SESSION['email'] ?></td>
                </tr>
            </table>
            <hr>
            <h2>Informatii eveniment:</h2>
            <table>
                <tr>
                    <td>Film:</td>
                    <td><?php echo $_SESSION['denFilm'] ?></td>
                </tr>
                <tr>
                    <td>Data/ora: </td>
                    <td><?php echo $_SESSION['dataProiectiei'], "/", $_SESSION['ora'] ?></td>
                </tr>
                <tr>
                    <td>Tip bilet:</td>
                    <td>
                        <?php
                        foreach ($_SESSION['tipuriBilete'] as $tipBilet) {
                            if ($_SESSION['nr' . $tipBilet['denumire']] != 0) {
                                echo $_SESSION['denTipBilet' . $tipBilet['denumire']], " x ", $_SESSION['nr' . $tipBilet['denumire']], ", ";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <?php
                    $loc = array();
                    $rand = array();
                    foreach ($_SESSION['RandSiLoc'] as $locRand) {
                        $parts = explode(',', $locRand);
                        $locRand = $parts[0];
                        $loc[] = substr($locRand, 2);
                        $randBun = substr($locRand, 1, 1);
                        if (!in_array($randBun, $rand)) {
                            $rand[] = substr($locRand, 1, 1);
                        }
                    }
                    ?>
                    <td>Loc:</td>
                    <td>Rand: <?php foreach ($rand as $r) {
                                    echo "$r,";
                                }
                                ?> Loc: <?php foreach ($loc as $l) {
                                            echo "$l,";
                                        } ?></td>
                </tr>
            </table>
            <hr>
            <h2>Informatii livrare:</h2>
            <p>Metoda: <?php echo $_SESSION['booking'] ?></p>
            <p>Total de plata: <?php echo $_SESSION['pret'] ?></p>
            <hr>
            <label><input type="checkbox" name="confirmare" required>Confirm ca detaliile sunt corecte!</label>
            <a class="btn" href="Pasul4.php">Inapoi</a>
            <input class="btn" type="submit" name="final" value="Finalizare">
            <?php
            if (isset($_POST['final'])) {
                if ($_SESSION['booking'] == 'Rezervare') {
                    header("Location: PrelucrareBooking.php");
                } else {
                    header("Location: MetodaDePlata.php");
                }
            }
            ?>
        </form>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>