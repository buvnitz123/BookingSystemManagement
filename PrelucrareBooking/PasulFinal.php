<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Final</title>
    <style>
        .container {
            margin: 5% auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
        }

        footer {
            position: fixed;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        header("refresh:5;url=../index.php");
        ?>
        <h2>Comanda ta a fost confirmata</h2>
        <p>Ati primit un email cu detaliile comenzii dumneavoastra</p>
        <p>Comanda ta a fost preluata cu succes. Veti fi redirectionat in 5 secunde</p>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>