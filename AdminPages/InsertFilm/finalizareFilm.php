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
    <title>Verificare Film</title>
</head>
<div>
    <h2>Detaliile filmului:</h2>
    <form action="finalizareInsert.php" method="post">
        <label>Titlu film: <?php echo $_SESSION['denumireFilm'] ?></label><br>
        <label>Durata film: <?php echo $_SESSION['durataFilm'] ?></label><br>
        <label>Data aparitiei film: <?php echo $_SESSION['dataFilm'] ?></label><br>
        <label>Restrictie varsta: <?php echo $_SESSION['restrictieFilm'] ?></label><br>
        <label>Lista genuri:<select>
                <?php foreach ($_SESSION['arrayGenuri'] as $genFilm) {
                    echo "<option>" . $genFilm . "</option>";
                } ?>
            </select></label><br>
        <label>Lista actori:<select>
                <?php foreach ($_SESSION['listaActori'] as $actor) {
                    echo "<option>" . $actor['nume'] . ' ' . $actor['prenume'] . "</option>";
                } ?>
            </select></label><br>
        <label>Regizor: <?php echo $_SESSION['numeRegizor'], " ", $_SESSION['prenumeRegizor'] ?></label><br>
        <label>Detalii: <?php echo $_SESSION['detalii'] ?></label><br>
        <a href="inserareFilm3.php">Inapoi</a>
        <input type="submit" name="anulare" value="Anulare">
        <input type="submit" name="submit" value="Finalizare">
    </form>
</div>

<body>

</body>

</html>