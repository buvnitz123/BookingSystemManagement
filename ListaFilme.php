<?php
session_start();
include("BazaDeDateCinema.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Lista Filme</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: green;
            padding: 5px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 10px;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="movie-list">
        <div class="grid-container">
            <?php
            $list = getMoviesThatWillBe();
            $listaFilme = getMovies();
            foreach ($listaFilme as $film) {
                $disponibil = false;
                foreach ($list as $filme) {
                    if ($film[0] == $filme[0]) {
                        $disponibil = true;
                        break;
                    }
                }
                echo "<div class='grid-item'>
                <h3><u>" . strtoupper($film[1]) . "</u></h3>
                <img src='$film[4]' width='300' height='500'>
                <p>$film[2] minute | $film[3]<p>";
                if ($disponibil) {
                    echo "<b style='color:green'>Acest film este disponibil</b>";
                } else {
                    echo "<i style='color:red'>Acest film nu este disponibil momentan</i>";
                }

                echo "</div>";
            }
            ?>

        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>