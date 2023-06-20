<?php
session_start();
include('../BazaDeDateCinema.php');
if (!isset($_SESSION['user'])) {
    if (!isset($_SESSION['nume'])) {
        $_SESSION['nume'] = "";
        $_SESSION['prenume'] = "";
        $_SESSION['telefon'] = "";
        $_SESSION['email'] = "";
    }
} else {
    $listaUser = getUser($_SESSION['user']);
    $_SESSION['nume'] = $listaUser[0];
    $_SESSION['prenume'] = $listaUser[1];
    $_SESSION['telefon'] = $listaUser[2];
    $_SESSION['email'] = $listaUser[3];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Information</title>
    <style>
        .container {
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
            margin-top: 100px;
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 20px;
        }

        .container h2 {
            margin-bottom: 10px;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .container form label {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: 10px 0;
        }

        .container form label input[type="text"] {
            margin-left: 10px;
            padding: 5px;
            border-radius: 5px;
            border: none;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .container form input[type="submit"],
        a {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .container form input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        a:hover {
            background-color: #3e8e41;
        }

        footer {
            position: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verificati campurile!</h2>
        <hr>

        <form action="prelucrarePasul4.php" method="post">
            <label>Nume:<input type="text" name="nume" value="<?php echo $_SESSION['nume'] ?>" required></label><br>
            <label>Prenume:<input type="text" name="prenume" value="<?php echo $_SESSION['prenume'] ?>" required></label><br>
            <label>Nr telefon:<input type="text" name="telefon" value="<?php echo $_SESSION['telefon'] ?>" required></label><br>
            <label>E-mail::<input type="text" name="email" value="<?php echo $_SESSION['email'] ?>" required></label><br>
            <a href="Pasul3.php">Inapoi</a>
            <input type="submit" value="Pasul urmator">
        </form>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>