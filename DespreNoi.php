<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".container").fadeIn(1000);
        });
    </script>
    <title>Despre Noi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #70be73eb;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 5%;
            margin-bottom: 5%;
            display: none;
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
    </style>
</head>

<body>
    <div class="container">
        <a class="btn" href="index.php">Acasa</a>
        <h1>Despre noi (eu, de fapt)</h1>
        <h2>CinemaProject - Filme imaginare, cod real</h2>
        <p>Bun venit pe pagina mea! Sunt un dezvoltator pasionat de cod și m-am hotărât să creez CinemaProject, o aplicație web care promite o experiență cinematografică de neimaginat.</p>
        <h3>Istoric</h3>
        <p>CinemaProject a fost conceput dintr-un impuls de inspirație după o noapte de binge-watching al unor seriale cult și a câtorva filme clasice. Cu o cană de cafea în mână și codul ca armă, am pus bazele acestei platforme unice într-o zi în care plictiseala mi-a cucerit toate deadline-urile.</p>
        <h3>Echipa mea</h3>
        <p>Da, e adevărat, sunt singurul membru al echipei CinemaProject. Un dezvoltator, un designer, un testator și un manager - toate aceste roluri se îmbină într-un singur individ genial. În fond, cine are nevoie de o echipă când poți face totul singur, nu-i așa?</p>
        <h3>Misiune și viziune</h3>
        <p>Misiunea mea este de a revoluționa experiența de vizionare a filmelor online, folosind cele mai avansate tehnologii și... așa, încolo. Viziunea mea este de a domina lumea cinematografiei web, un cod excepțional și ceva noroc în gestionarea serverelor.</p>
        <h3>Valori</h3>
        <ul>
            <li>Procrastinare - Cu cât amân mai mult sarcinile, cu atât mai mare va fi satisfacția de a le finaliza.</li>
            <li>Bugs colorate - Nu toți eroii poartă capă. Un bug de culoare stridentă în cod mă face să mă simt special.</li>
            <li>Urmărirea ratelor de succes - Deși am puțini utilizatori, mă consolez știind că majoritatea lor nu își dau seama când nu merge butonul de play.</li>
            <li>Cafea fără limite - Știu că nu e o valoare, dar fără cafea nu aș fi dezvoltator adevărat.</li>
        </ul>
        <h3>Contact</h3>
        <p>Telefon: 0751781139</p>
        <p>Email: <a class="btn" href="Contact/Contact.php">Apasa-ma</a></p>
    </div>
</body>

</html>