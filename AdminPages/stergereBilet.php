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
        <h4>Stergeti biletul:</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Introduceti codul biletului: <input type="text" name="codBilet" required></label>
            <a href="admin-page.php">Inapoi</a>
            <input type="submit" value="Sterge">
        </form>
        <?php
        include_once("..\BazaDeDateCinema.php");
        if (isset($_POST['codBilet'])) {
            if (stergeBilet($_POST['codBilet'])) {
                echo "<p style='color:green'>Bilet sters</p>";
            } else {
                echo "<p style='color:red'>Nu exista acest bilet</p>";
            }
        }
        ?>
    </div>
</body>

</html>