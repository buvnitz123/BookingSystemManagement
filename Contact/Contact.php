<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CinemaProiect/style.css">
    <title>Document</title>
</head>

<body>
    <div class="contact">
        <h1>Contactează-ne</h1>
        <p><b>Arata-ti aprecierea prin trimiterea unui email!</b></p>
        <form action="procesare_contact.php" method="POST">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" required><br>

            <label for="mesaj">Mesaj:</label>
            <textarea id="mesaj" name="mesaj" rows="4" required></textarea><br>

            <input type="submit" value="Trimite">
            <a id="acasa" href="../index.php">Acasa</a>
        </form>
    </div>
</body>

</html>