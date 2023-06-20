<?php
session_start();
include('BazaDeDateCinema.php');
$id_film = $_SESSION['idFilm'];
$denumire_film = $_SESSION['denFilm'];
$detalii = getMovieDetails($id_film);
$actori = getMovieActors($id_film);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Detalii</title>
    <style>
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="movie-list">
        <h1><?php echo strtoupper($denumire_film) ?></h1>
        <hr>
        <table>
            <tr>
                <td>
                    <b>Regizor:</b>
                </td>
                <td><?php echo $detalii[1] ?></td>
            </tr>
            <tr>
                <td>
                    <b>Actori:</b>
                </td>
                <td>
                    <?php foreach ($actori as $actor) {
                        echo $actor[0] . ', ';
                    } ?>
                </td>
            </tr>
        </table>
        <hr>
        <h2>Descriere:</h2>
        <p><?php echo $detalii[0] ?></p>
        <hr>
        <h2>Trailer:</h2>
        <iframe width="850" height="525" src="https://www.youtube.com/embed/<?php echo $detalii[2] . "?cc_lang_pref=ro&cc_load_policy=1" ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <hr>
        <h3>Cumpara/Rezerva acum bilet la filmul <?php echo strtoupper($denumire_film) ?></h3>
        <?php
        echo "<form method='post' action='PrelucrareBooking/Pasul1.php'>
                <p>Puteti cumpara/rezerva bilet apasand aici<p>
                <input type='submit' value='Cumpara bilet'>
                </form>";
        ?>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>