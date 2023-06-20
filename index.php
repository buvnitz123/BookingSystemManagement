<?php
session_start();
include("BazaDeDateCinema.php");
if (!isset($_GET['date'])) {
    $_SESSION['dataProiectiei'] = date('Y-m-d');
    $currentDate = $_SESSION['dataProiectiei'];
    header("Location: index.php?date=" . date('Y-m-d'));
} else {
    $currentDate = $_GET['date'];
    $_SESSION['dataProiectiei'] = $currentDate;
}
$listaFilme = getMoviesByDate($currentDate);
$listaFilmeAfisate = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Lista Filmelor</title>
</head>
<script>
    $(document).ready(function() {
        $('input[type="date"]').change(function() {
            $(this).closest('form').submit();
        });
    });
</script>

<body>
    <?php
    include('header.php');
    ?>
    <div class="data">
        <form method='get' action='<?php $_SERVER['PHP_SELF'] ?>'>
            <input type="date" name='date' min="<?php echo date('Y-m-d') ?>" value="<?php echo htmlspecialchars($currentDate) ?>" required>
        </form>
    </div>
    <div class="movie-list">
        <?php
        if ($listaFilme) {
            foreach ($listaFilme as $film) {
                if (!in_array($film[2], $listaFilmeAfisate)) { ?>
                    <div class="movie-details">
                        <div class="movie-info">
                            <h2><?php echo strtoupper($film[2]) ?></h2>
                            <p>Durata: <b><?php echo $film[3] ?> minute</b></p>
                            <p>Restrictie de varsta: <b><?php echo $film[4] ?></b></p>
                            <p>Anul aparitiei: <b><?php echo $film[5] ?></b></p>
                            <p>Gen: <b><?php
                                        $genuri = getMovieGenres($film[0]);
                                        foreach ($genuri as $gen) {
                                            echo "$gen[0], ";
                                        }
                                        ?></b></p>
                            <p>Disponibil: <?php
                                            $listaOre = getMovieTimes($film[0], $currentDate);
                                            foreach ($listaOre as $ora) {
                                                echo "<form action='procesareDetalii.php' method='post'>
                                            <input type='hidden' name='id_film' value='$film[0]'>
                                            <input type='hidden' name='idSala' value='$film[1]'>
                                            <input type='hidden' name='denumire_film' value='$film[2]'>
                                            <input type='hidden' name='durata' value='$film[3]'>
                                            <input type='hidden' name='oraFilm' value='$ora'>
                                            <input type='submit' class='ora' value='$ora'>
                                            </form>";
                                            }

                                            ?></p>
                        </div>
                        <div class="movie-image">
                            <img src="<?php echo $film[7] ?>" height="500" width="350">
                        </div>
                    </div>
                    <hr>
        <?php
                    array_push($listaFilmeAfisate, $film[2]);
                }
            }
        } else {
            echo "<h4 class='error-message'><i class='fas fa-exclamation-circle'></i> Nu există filme momentan</h4>";
            echo "<style>
            footer{
                position:fixed;
            }
            h4.error-message {
                text-align: center;
                color:red;
            }
            </style>";
        }
        ?>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>