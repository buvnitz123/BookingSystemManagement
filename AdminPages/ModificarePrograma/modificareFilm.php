<?php
session_start();
if (isset($_GET['anulare'])) {
    foreach ($_SESSION as $key => $value) {
        if ($key !== 'user') {
            unset($_SESSION[$key]);
        }
    }
}
include("../../BazaDeDateCinema.php");
$listaFilme = getMovies();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#filmeTable').DataTable();
        });
    </script>
    <link rel="stylesheet" href="../style.css">
    <title>Modificare</title>
</head>

<body>
    <div>
        <h2>Lista Filme:</h2>
        <a href="../admin-page.php">Inapoi</a>
        <?php
        if (isset($_GET['noexist'])) {
            echo "<p style='color:red; text-align:center'>Acest film nu e repartizat la nici o ora</p>";
        }
        ?>
        <table id="filmeTable">
            <thead>
                <tr>
                    <th>Cod</th>
                    <th>Denumire</th>
                    <th>Durata</th>
                    <th>Restrictie</th>
                    <th>Modificare</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaFilme as $film) {
                    echo "<tr>
                            <td>$film[0]</td>
                            <td>$film[1]</td>
                            <td>$film[2]</td>
                            <td>$film[3]</td>
                            <td>
                                <form class='modifyForm' method='POST' action='prelucrareModificare.php'>
                                    <input type='hidden' name='filmDen' value='$film[1]'>
                                    <input type='hidden' name='filmId' value='$film[0]'>
                                    <input type='submit' value='Modifica'>
                                </form>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>