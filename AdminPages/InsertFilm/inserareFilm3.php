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
    <title>Adaugare detalii</title>
</head>

<body>
    <div>
        <h2>Inserare detalii film</h2>
        <form action="prelucrareInsert3.php" method="post" enctype="multipart/form-data">
            <label>Detalii film:<br><textarea name="detalii" cols="80" rows="5" required><?php echo $_SESSION['detalii'] ?></textarea></label><br>
            <label>Inserati o imagine: <input type="file" name="img" accept="image/png, image/jpeg"></label><br>
            <a href="inserareFilm2.php">Inapoi</a>
            <input type="submit" value="Gata">
        </form>
    </div>
</body>

</html>