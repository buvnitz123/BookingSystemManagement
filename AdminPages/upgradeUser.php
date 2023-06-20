<?php
session_start();
include("../BazaDeDateCinema.php");
$useri = getUSers();
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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="admin-page.php">Inapoi</a>
        <h2>Bun venit, <?php echo $_SESSION['user'] ?>!</h2>
        <table id="filmeTable">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th>Nr Telefon</th>
                    <th>Email</th>
                    <th>Functie</th>
                    <th>Upgrade</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($useri as $user) {
                    if ($user['functie'] != '' && $user['username'] != $_SESSION['user']) {
                        echo "<tr>
                            <td>" . $user['username'] . "</td>
                            <td>" . $user['nume'] . "</td>
                            <td>" . $user['prenume'] . "</td>
                            <td>" . $user['nr_telefon'] . "</td>
                            <td>" . $user['email'] . "</td>
                            <td>" . $user['functie'] . "</td>
                            <td><form method='post' action='upgradeUser2.php'>
                            <input type='hidden' name='username' value='" . $user['username'] . "'>
                            <input type='submit' name='upgrade' value='Upgrade'>
                            </form></td>
                            <td><form method='post' action='upgradeUser2.php'>
                            <input type='hidden' name='username' value='" . $user['username'] . "'>
                            <input type='submit' name='delete' value='Delete'>
                            </form></td>
                        </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>