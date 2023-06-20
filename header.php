<ul>
    <li><a href="index.php"><i class="fas fa-home"></i> Acasa</a></li>
    <li><a href="ListaFilme.php"><i class="fas fa-film"></i> Lista filme</a></li>
    <li><a href="Contact/Contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
    <li><a href="DespreNoi.php"><i class="fas fa-info-circle"></i> Despre noi</a></li>
    <?php
    if (!isset($_SESSION['user'])) {
        echo "<li class='right'><a href='Logare.php'><i class='fas fa-sign-in-alt'></i> Logare</a></li>";
    } else {
        echo "<li class='right'><a href='Deconectare.php'><i class='fas fa-sign-out-alt'></i> Deconectare</a></li>";
    }
    if (isset($_SESSION['user']) && $_SESSION['functie'] === "admin") {
        echo "<li class='right'><a href='AdminPages/admin-page.php'><i class='fas fa-cogs'></i> Pagina Admin</a></li>";
    }
    ?>
</ul>

<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1;
    }


    li {
        float: left;
    }

    .right {
        float: right;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }
</style>