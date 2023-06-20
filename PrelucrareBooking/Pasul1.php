<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Type</title>
    <style>
        .container {
            margin: 5% auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
        }

        .btn {
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

        .btn:hover {
            background-color: #3e8e41;
        }

        footer {
            position: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Rezerva sau cumpara bilet!</h3>
        <hr>
        <?php
        if (isset($_GET['metoda'])) {
            echo "<p style='color:red'>Selectati o metoda pentru a continua</p>";
        }
        ?>
        <form action="prelucrarePasul1.php" method="POST">
            <label><input type="radio" name="booking" value="Rezervare">Rezervare</label><br>
            <p>Puteti rezerva si achizitiona biletele de la casa de marcat din cinematografie dar nu cu 30 de minute inainte de inceperea filmului</p>
            <hr>
            <label><input type="radio" name="booking" value="Achizitie">Cumparare</label><br>
            <p>Puteti achizitiona si evitati cozile de la casa de marcat din cinematografie</p>
            <a class="btn" href="../index.php">Inapoi pe pagina principala</a>
            <input class="btn" type="submit" value="Pasul urmator">
        </form>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>