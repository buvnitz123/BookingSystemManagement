<?php
include_once("..\BazaDeDateCinema.php");
$listaSali = getListaSali();
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
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Sala:<select name="idSala">
                    <?php
                    foreach ($listaSali as $sali) {
                        echo "<option value='$sali'>" . 'Sala ', $sali . "</option>";
                    }
                    ?>
                </select></label><br>
            <a href="admin-page.php">Inapoi</a>
            <input type="submit" value="Stergere">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (stergereSala($_POST['idSala'])) {
                    header("Location: admin-page.php");
                    die();
                }
            } catch (\Throwable $th) {
                echo "<p>Sala nu a putut fi stearsa deoarece exista un film in rulaj, rezervare, sau bilet existent</p>";
            }
        }
        ?>
    </div>
</body>

</html>