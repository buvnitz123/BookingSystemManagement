<?php
session_start();
$tipuriBilete = array(
    'Normal' => array(
        'denumire' => 'Normal',
        'pret' => 30
    ),
    'Copil' => array(
        'denumire' => 'Copil',
        'pret' => 20
    ),
    'Student' => array(
        'denumire' => 'Student',
        'pret' => 25
    ),
    'Elev' => array(
        'denumire' => 'Elev',
        'pret' => 25
    ),
    'Pensionar' => array(
        'denumire' => 'Pensionar',
        'pret' => 25
    )
);
$_SESSION['tipuriBilete'] = $tipuriBilete;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Selectare bilete</title>
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
        <h3>Selecteaza numarul de bilete!</h3>
        <hr>
        <form method="POST" action="prelucrarePasul2.php">
            <table>
                <thead>
                    <tr>
                        <th>Categorie reducere</th>
                        <th>Pret</th>
                        <th>Cantitate</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tipuriBilete as $categorie) {
                        echo "
                        <tr>
                        <td>" . $categorie['denumire'] . "</td>
                        <td>" . $categorie['pret'] . " lei</td>
                        <td>
                        <select name='" . $categorie['denumire'] . "'>";
                        for ($i = 0; $i <= 10; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        echo "</select></td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (isset($_GET['biletMax'])) {
                echo "<p style='color:red'>Selectați maxim 10 bilete.</p>";
            } elseif (isset($_GET['biletMin'])) {
                echo "<p style='color:red'>Selectați macar un bilet.</p>";
            }
            ?>
            <a class="btn" href="Pasul1.php">Inapoi</a>

            <input type="submit" class="btn" value="Pasul urmator">
        </form>
    </div>
    <?php
    include('../footer.php');
    ?>
</body>

</html>