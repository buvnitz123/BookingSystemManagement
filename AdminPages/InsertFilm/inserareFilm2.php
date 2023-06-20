<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adaugare actori</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['adaugareActor'])) {
            echo "<p style='color:green'>Actorul " . $_SESSION['numeActor'] . " " . $_SESSION['prenumeActor'] . " a fost adăugat cu succes.</p>";
        }
        ?>
        <h2>Adăugare actor nou</h2>
        <form method="post" action="prelucrareInsert2.php">
            <label>Nume: <input type="text" name="nume"></label><br>
            <label>Prenume: <input type="text" name="prenume"></label><br>
            <label>Nationalitate: <input type="text" name="nationalitate"></label><br>
            <label>Data nașterii: <input type="date" name="data_nasterii"></label><br>
            <label>Data deces: <input type="date" name="data_deces"></label><br>
            <a href="inserareFilm.php">Inapoi</a>
            <input type="submit" value="Adaugă actor">
        </form>

        <?php if (!empty($_SESSION['listaActori'])) {
            $container = array();
        ?>
            <h2>Lista actorilor adăugați</h2>
            <select>
                <?php foreach ($_SESSION['listaActori'] as $actor) {
                    if (!in_array($actor, $container)) {
                ?>
                        <option><?php echo $actor['nume'] . ' ' . $actor['prenume']; ?></option>
                <?php
                    }
                    array_push($container, $actor);
                } ?>
            </select>
            <form action="prelucrareInsert2.php" method="post">
                <input type="submit" name="Next" value="Next">
            </form>
        <?php } ?>
    </div>
</body>

</html>