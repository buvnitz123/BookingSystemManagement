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
        <form action="#" method="post">
            <label>Denumire gen:<input type="text" name="gen" required></label><br>
            <input type="submit" value="Adauga gen">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include_once("..\BazaDeDateCinema.php");
            if (addGenres($_POST['gen'])) {
                echo "<p>Gen adaugat!</p>";
            } else {
                echo "<p>Gen deja existent, nu a fost adaugat!</p>";
            }
        }
        ?>
        <a href="InsertFilm/inserareFilm.php">Inapoi</a>
    </div>
</body>

</html>