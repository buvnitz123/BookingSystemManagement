<?php
include_once("..\BazaDeDateCinema.php");
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
        <h4>Inserare Sala:</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Numar de locuri:<input type="number" name="nrLocuri" min="1" required></label><br>
            <a href="admin-page.php">Inapoi</a>
            <input type="submit" name="submit" value="Next">
        </form>
        <?php

        if (isset($_POST['submit'])) {
            $nrLocuri = $_POST['nrLocuri'];
            $nrRanduri = (int)($nrLocuri / 10);
            $nrLocRand = (int) ($nrLocuri / $nrRanduri);
            $locRamas = $nrLocuri % $nrRanduri;
            if ($locRamas != 0) {
                $nrRanduri++;
            }
            //-------------------
            $idSala = AdaugareSala($nrLocuri);
            $randSalvat = 0;
            if ($locRamas != 0) {
                for ($i = 0; $i < $nrRanduri - 1; $i++) {
                    for ($j = 0; $j < $nrLocRand; $j++) {
                        AdaugareLoc($idSala, $j + 1, $i + 1);
                        $randSalvat = $i + 1;
                    }
                }
                for ($i = 0; $i < $locRamas; $i++) {
                    AdaugareLoc($idSala, $i + 1, $randSalvat + 1);
                }
            } else {
                for ($i = 0; $i < $nrRanduri; $i++) {
                    for ($j = 0; $j < $nrLocRand; $j++) {
                        AdaugareLoc($idSala, $j + 1, $i + 1);
                    }
                }
            }
            header("Location: admin-page.php");
            exit();
        }
        ?>
    </div>
</body>

</html>