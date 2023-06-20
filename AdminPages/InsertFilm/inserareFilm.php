<?php
session_start();
include_once("../../BazaDeDateCinema.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adaugare film</title>
</head>

<body>
    <div>
        <div>
            <h2>Adaugare film:</h2>
            <hr>
            <div>
                <form action="prelucrareInsert.php" method="post">
                    <h4>Adaugare film</h4>
                    <label>Denumire:<input type="text" value="<?php echo $_SESSION['denumireFilm'] ?>" name="denumire" required></label><br>
                    <label>Data lansarii:<input type="date" value="<?php echo $_SESSION['dataFilm'] ?>" name="data_lansarii" required></label><br>
                    <label>Durata:<input type="number" value="<?php echo $_SESSION['durataFilm'] ?>" name="durata" min="1" required></label><br>
                    <label>Restrictie de varsta:
                        <select name="restrictie" required>
                            <option value="AG">AG</option>
                            <option value="AP12">AP12</option>
                            <option value="N15">N15</option>
                            <option value="IM18">IM18</option>
                        </select></label><br>
                    <hr>
                    <h4>Selectare gen film:</h4>
                    <label>Genuri:
                        <select name="genuri[]" multiple required>
                            <?php
                            $list = getGenres();
                            for ($i = 0; $i < count($list); $i++) {
                                echo "<option>$list[$i]</option>";
                            }
                            ?>
                        </select></label><br>
                    <p>Daca vrei sa adaugi un gen apasa <a href="../adaugareGen.php">aici</a></p>
                    <br>
                    <hr>
                    <h4>Adauga regizor:</h4>
                    <label>Nume:<input type="text" value="<?php echo $_SESSION['numeRegizor'] ?>" name="nume_regizor" required></label><br>
                    <label>Prenume:<input type="text" value="<?php echo $_SESSION['prenumeRegizor'] ?>" name="prenume_regizor" required></label><br>
                    <label>Data nasterii:<input type="date" value="<?php echo $_SESSION['dataNasteriiRegizor'] ?>" name="data_nasterii_regizor" required></label><br>
                    <label>Data decesului:<input type="date" value="<?php echo $_SESSION['dataDecesRegizor'] ?>" name="data_deces_regizor"></label><br>
                    <hr>
                    <label>Introduceti link youtube: <input type="url" name="link" required></label><br>
                    <input type="submit" value="Adauga film">
                </form>
            </div>
        </div>
        <div>
            <a href="../admin-page.php">Inapoi</a>
        </div>
    </div>
</body>

</html>