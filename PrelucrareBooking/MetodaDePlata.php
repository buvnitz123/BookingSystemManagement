<?php
session_start();
if (!isset($_SESSION['booking'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Payment Method</title>
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

        .container label {
            display: block;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .container input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .container input[type="submit"] {
            display: block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            position: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label>Numele de pe card: <input type="text" name="nume_card" placeholder="Numele de pe card" required></label>
            <label>Numărul cardului: <input type="text" name="numar_card" placeholder="0000-0000-0000-0000" required></label>
            <label>Data expirării: <input type="text" name="expirare" placeholder="MM/AA" required></label>
            <label>CVV: <input type="text" name="cvv" required></label>
            <input type="submit" value="Plătește">
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header("Location: PrelucrareBooking.php");
            die();
        }
        ?>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>