<?php
function AdaugareCont($user, $nume, $prenume, $email, $nr_tel, $parola)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_verif = "SELECT username FROM user WHERE username=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    $sql_query = "INSERT INTO user (username,nume,prenume,parola,nr_telefon,email,functie) VALUES (?,?,?,?,?,?,'client')";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "ssssss", $user, $nume, $prenume, $parola, $nr_tel, $email);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
    return true;
}
function VerificareCont($username, $password)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "SELECT username,parola FROM user WHERE username=? AND parola=?";
    $prep = $con->prepare($sql_query);
    $prep->bind_param("ss", $username, $password);
    $prep->execute();
    $result = $prep->get_result();
    if (mysqli_num_rows($result) > 0) {
        $prep->close();
        $con->close();
        return true;
    }
    $prep->close();
    $con->close();
    return false;
}
function getMovies()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id_film,denumire_film,durata,restrictie_varsta,imagine_film FROM film";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $lista = mysqli_fetch_all($result);
        return $lista;
    }
    return false;
}
function getUser($username)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT nume, prenume, nr_telefon, email FROM user WHERE username=?";
    $prep = $con->prepare($query);
    $prep->bind_param("s", $username);
    $prep->execute();
    $result = $prep->get_result();
    if ($result && $result->num_rows > 0) {
        $listaProprietati = mysqli_fetch_array($result, MYSQLI_NUM);
        $prep->close();
        $con->close();
        return $listaProprietati;
    }
    $prep->close();
    $con->close();
    return false;
}
function verifAdmin($username)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT functie FROM user WHERE username=?";
    $prep = $con->prepare($query);
    $prep->bind_param("s", $username);
    $prep->execute();
    $result = $prep->get_result();
    if ($result && $result->num_rows > 0) {
        $list = mysqli_fetch_array($result, MYSQLI_NUM);
        if ($list[0] === "admin") {
            $prep->close();
            $con->close();
            return true;
        }
    }
    $prep->close();
    $con->close();
    return false;
}
function AdaugareFilm($den, $date, $durata, $restrictie, $regID, $detaliiId, $img)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $data_lansarii = date('Y-m-d', strtotime($date));
    $imgSQL = substr($img, 3);
    $sql_query = "INSERT INTO film (denumire_film,data_lansarii,durata,restrictie_varsta,regizor_id,detalii_id,imagine_film) VALUES (?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "ssisiis", $den, $data_lansarii, $durata, $restrictie, $regID, $detaliiId, $imgSQL);
    mysqli_stmt_execute($stmt);
    $inserted_id = mysqli_insert_id($con);
    mysqli_close($con);
    return $inserted_id;
}
function getGenres()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT denumire_gen FROM gen";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $lista = array();
        while ($row = mysqli_fetch_array($result)) {
            $lista[] = $row['denumire_gen'];
        }
        return $lista;
    }
    return false;
}
function getMovieGenres($idFilm)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "SELECT denumire_gen from genfilm WHERE id_film=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "i", $idFilm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result) {
        $genuri = mysqli_fetch_all($result);
        mysqli_close($con);
        return $genuri;
    }
}
function addGenres($gen)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_verif = "SELECT * FROM gen WHERE denumire_gen=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "s", $gen);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    $sql_query = "INSERT INTO gen VALUES (?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "s", $gen);
    $s = mysqli_stmt_execute($stmt);
    mysqli_close($con);
    return true;
}
function AdaugareRegizor($nume, $prenume, $data_nastere, $data_deces)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_verif = "SELECT id_regizor FROM regizor WHERE nume_regizor=? AND prenume_regizor=? AND data_nastere=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "sss", $nume, $prenume, $data_nastere);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $regizor_id = $row['id_regizor'];
        mysqli_free_result($result);
        mysqli_close($con);
        return $regizor_id;
    } else {
        if ($data_deces == "") {
            $query = "INSERT INTO regizor (nume_regizor, prenume_regizor, data_nastere) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sss", $nume, $prenume, $data_nastere);
            mysqli_stmt_execute($stmt);
        } else {
            $query = "INSERT INTO regizor (nume_regizor, prenume_regizor, data_nastere, data_deces) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $nume, $prenume, $data_nastere, $data_deces);
            mysqli_stmt_execute($stmt);
        }
        $inserted_id = mysqli_insert_id($con);
        mysqli_close($con);
        return $inserted_id;
    }
}

function AsociereGenFilm($id_film, $den_gen)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_verif = "SELECT id_film,denumire_gen FROM genfilm WHERE id_film=? AND denumire_gen=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "is", $id_film, $den_gen);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    $sql_query = "INSERT INTO genfilm (id_film, denumire_gen) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "is", $id_film, $den_gen);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
    return true;
}
function AdaugareActor($nume, $prenume, $nationalitate, $data_nastere, $data_deces)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $data_nastere = date('Y-m-d', strtotime($data_nastere));
    $sql_verif = "SELECT id_actor FROM actor WHERE nume=? AND prenume=? AND data_nasterii=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "sss", $nume, $prenume, $data_nastere);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $actor_id = $row['id_actor'];
        mysqli_free_result($result);
        mysqli_close($con);
        return $actor_id;
    } else {
        if ($data_deces == "") {
            $query = "INSERT INTO actor (nume, prenume, nationalitate, data_nasterii) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $nume, $prenume, $nationalitate, $data_nastere);
            mysqli_stmt_execute($stmt);
        } else {
            $data_deces = date('Y-m-d', strtotime($data_deces));
            $query = "INSERT INTO actor (nume, prenume, nationalitate, data_nasterii, data_deces) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $nume, $prenume, $nationalitate, $data_nastere, $data_deces);
            mysqli_stmt_execute($stmt);
        }
        $inserted_id = mysqli_insert_id($con);
        mysqli_close($con);
        return $inserted_id;
    }
}

function AsociereActorFilm($id_film, $id_actor)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_verif = "SELECT id_film,id_actor FROM distributie WHERE id_film=? AND id_actor=?";
    $stmt = mysqli_prepare($con, $sql_verif);
    mysqli_stmt_bind_param($stmt, "ii", $id_film, $id_actor);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        return false;
    }
    $sql_query = "INSERT INTO distributie (id_film, id_actor) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "ii", $id_film, $id_actor);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
    return true;
}
function AdaugareDetalii($detalii, $link)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "INSERT INTO detalii (detalii_descriere,link) VALUES (?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "ss", $detalii, $link);
    mysqli_stmt_execute($stmt);
    $inserted_id = mysqli_insert_id($con);
    mysqli_close($con);
    return $inserted_id;
}
function AsociereDetalii($idFilm, $idDetalii)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "UPDATE detalii SET film_id=? WHERE id_detalii=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "ii", $idFilm, $idDetalii);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}
function AdaugareSala($nrLoc)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "INSERT INTO sala (nr_scaune) VALUES (?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "i", $nrLoc);
    mysqli_stmt_execute($stmt);
    $inserted_id = mysqli_insert_id($con);
    mysqli_close($con);
    return $inserted_id;
}
function AdaugareLoc($idSala, $nrLoc, $nrRand)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "INSERT INTO loc VALUES (?,?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "iii", $idSala, $nrLoc, $nrRand);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}
function getListaSali()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id_Sala FROM sala";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $lista = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $lista[] = $row[0];
        }
        return $lista;
    }
    return false;
}
function RepartizareFilm($idSala, $idFilm, $data, $ora, $durata)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql_query = "INSERT INTO proiectie VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "iissi", $idSala, $idFilm, $data, $ora, $durata);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}
function getMoviesThatWillBe()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT film.id_film,proiectie.id_sala, film.denumire_film, film.durata, film.restrictie_varsta, film.data_lansarii, CONCAT(proiectie.data_proiectiei_PK_, ' ', proiectie.ora_proiectiei_PK_)
              FROM proiectie
              INNER JOIN film ON proiectie.id_film = film.id_film
              WHERE CONCAT(proiectie.data_proiectiei_PK_, ' ', proiectie.ora_proiectiei_PK_) >= NOW()";

    $result = mysqli_query($con, $query);
    if ($result) {
        $lista = mysqli_fetch_all($result);
        mysqli_close($con);
        return $lista;
    }
    mysqli_close($con);
    return false;
}
function getMoviesByDate($date)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT film.id_film,proiectie.id_sala, film.denumire_film, film.durata, film.restrictie_varsta, film.data_lansarii, CONCAT(proiectie.data_proiectiei_PK_, ' ', proiectie.ora_proiectiei_PK_),film.imagine_film 
              FROM proiectie
              INNER JOIN film ON proiectie.id_film = film.id_film
              WHERE CONCAT(proiectie.data_proiectiei_PK_, ' ', proiectie.ora_proiectiei_PK_) >= NOW()
              AND proiectie.data_proiectiei_PK_='$date'";

    $result = mysqli_query($con, $query);
    if ($result) {
        $lista = mysqli_fetch_all($result);
        mysqli_close($con);
        return $lista;
    }
    mysqli_close($con);
    return false;
}
function getMovieTimes($idFilm, $data)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT proiectie.ora_proiectiei_PK_ FROM proiectie INNER JOIN film ON proiectie.id_film=film.id_film 
    WHERE proiectie.data_proiectiei_PK_=? AND film.id_film=? AND CONCAT(proiectie.data_proiectiei_PK_, ' ', proiectie.ora_proiectiei_PK_) >= NOW()";
    $prep = $con->prepare($query);
    $prep->bind_param("si", $data, $idFilm);
    $prep->execute();
    $result = $prep->get_result();
    $listaOre = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $listaOre[] = $row[0];
    }
    $prep->close();
    $con->close();
    return $listaOre;
}
function getSeats($idSala)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT loc.nr_rand,loc.numar_loc FROM loc WHERE loc.id_sala=? ORDER BY nr_rand,numar_loc";
    $prep = $con->prepare($query);
    $prep->bind_param("i", $idSala);
    $prep->execute();
    $result = $prep->get_result();
    if ($result) {
        $listaLocuri = mysqli_fetch_all($result);
    }
    $prep->close();
    $con->close();
    return $listaLocuri;
}
function addRezervare($user, $idSala, $nrLoc, $nrRand, $idFilm, $dataRezervare, $dataFilm, $oraFilm, $cod)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "INSERT INTO rezervare VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "siiiissss", $user, $idSala, $nrLoc, $nrRand, $idFilm, $dataRezervare, $dataFilm, $oraFilm, $cod);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}
function AfisareRezervare($idFilm, $idSala, $data, $ora)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "SELECT numar_loc, nr_rand FROM rezervare 
    WHERE id_film=? AND data_proiectie=? AND ora_proiectie=? AND id_sala=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "issi", $idFilm, $data, $ora, $idSala);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rezervari = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rezervari[] = $row;
    }

    mysqli_close($con);

    return $rezervari;
}
function AchizitieBilet($pret, $categorie, $ora, $data, $idSala, $nrloc, $nrRand, $idFilm)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "INSERT INTO bilet (pret,categorie,ora_proiectie,data_proiectie,id_sala,numar_loc,nr_rand,id_film) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "dsssiiii", $pret, $categorie, $ora, $data, $idSala, $nrloc, $nrRand, $idFilm);
    mysqli_stmt_execute($stmt);
    $inserted_id = mysqli_insert_id($con);
    $sqlAsociere = "UPDATE bilet SET codBilet=? WHERE id_bilet=?";
    $stmt = mysqli_prepare($con, $sqlAsociere);
    mysqli_stmt_bind_param($stmt, "si", md5($inserted_id), $inserted_id);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
    return $inserted_id;
}
function AfisareAchizitie($idFilm, $idSala, $data, $ora)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "SELECT numar_loc, nr_rand FROM bilet 
    WHERE id_film=? AND data_proiectie=? AND ora_proiectie=? AND id_sala=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "issi", $idFilm, $data, $ora, $idSala);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $achizitii = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $achizitii[] = $row;
    }

    mysqli_close($con);

    return $achizitii;
}
function getMovieDetails($idFilm)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "SELECT detalii.detalii_descriere,CONCAT(regizor.nume_regizor,' ',regizor.prenume_regizor),detalii.link,film.denumire_film 
    FROM film INNER JOIN detalii ON film.id_film=detalii.film_id 
    INNER JOIN regizor ON regizor.id_regizor=film.regizor_id 
    WHERE film.id_film=?";
    $prep = $con->prepare($sql_query);
    $prep->bind_param("i", $idFilm);
    $prep->execute();
    $result = $prep->get_result();
    if ($result && $result->num_rows > 0) {
        $lista = mysqli_fetch_array($result, MYSQLI_NUM);
        $prep->close();
        $con->close();
        return $lista;
    }
}
function getMovieActors($idFilm)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "SELECT CONCAT(actor.nume,' ',actor.prenume) FROM distributie 
    INNER JOIN actor ON distributie.id_actor=actor.id_actor 
    INNER JOIN film ON distributie.id_film=film.id_film WHERE
    film.id_film=?";
    $prep = $con->prepare($sql_query);
    $prep->bind_param("i", $idFilm);
    $prep->execute();
    $result = $prep->get_result();
    if ($result && $result->num_rows > 0) {
        $lista = mysqli_fetch_all($result);
        $prep->close();
        $con->close();
        return $lista;
    }
}
function stergereSala($idSala)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "DELETE FROM sala WHERE id_sala=$idSala";
    $result = mysqli_query($con, $sql_query);
    if ($result) {
        return true;
    }
    mysqli_close($con);
    return false;
}
function stergereRezervari()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $sql_query = "DELETE FROM rezervare WHERE TIMESTAMP(data_proiectie, ora_proiectie) <= NOW() + INTERVAL 30 MINUTE";
    mysqli_query($con, $sql_query);
    mysqli_close($con);
}
function stergereFilm($idFilm)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "DELETE FROM film WHERE id_film=$idFilm";
    mysqli_query($con, $sql_query);
    mysqli_close($con);
}
function actualizareProgram($idFilm, $oraVeche, $dataVeche, $oraNoua, $dataNoua)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "UPDATE proiectie SET data_proiectiei_PK_ = '$dataNoua', ora_proiectiei_PK_='$oraNoua' 
    WHERE id_film=$idFilm AND data_proiectiei_PK_='$dataVeche' AND ora_proiectiei_PK_='$oraVeche'";
    mysqli_query($con, $sql_query);
    mysqli_close($con);
}
function cautareBilet($cod)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "SELECT film.denumire_film,bilet.ora_proiectie,bilet.data_proiectie,bilet.id_sala,bilet.nr_rand,bilet.numar_loc 
    FROM bilet 
    INNER JOIN film ON bilet.id_film=film.id_film 
    WHERE bilet.codBilet=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "s", $cod);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $bilet = array();
    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $bilet[] = $row;
        }
    }
    mysqli_close($con);
    return $bilet;
}
function cautareRezervare($cod)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "SELECT film.denumire_film,rezervare.ora_proiectie,rezervare.data_proiectie,rezervare.id_sala,rezervare.nr_rand,rezervare.numar_loc 
    FROM rezervare INNER JOIN film ON rezervare.id_film=film.id_film 
    WHERE rezervare.codRezervare=?";
    $stmt = mysqli_prepare($con, $sql_query);
    mysqli_stmt_bind_param($stmt, "s", $cod);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rezervare = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rezervare[] = $row;
        }
    }
    mysqli_close($con);
    return $rezervare;
}
function getUsers()
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $lista[] = $row;
        }
    }
    return $lista;
}
function upgradeUser($user)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "UPDATE user SET functie='admin' WHERE username='" . $user . "'";
    mysqli_query($con, $sql_query);
    mysqli_close($con);
}
function deleteUser($user)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "DELETE FROM user WHERE username='$user'";
    mysqli_query($con, $sql_query);
    mysqli_close($con);
}
function stergeBilet($cod)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "DELETE FROM bilet WHERE codBilet='$cod'";
    $result = mysqli_query($con, $sql_query);
    if ($result && mysqli_affected_rows($con) > 0) {
        mysqli_close($con);
        return true;
    } else {
        mysqli_close($con);
        return false;
    }
}

function stergeRezervare($cod)
{
    $con = mysqli_connect('localhost', 'root', '', 'gestionarecinema', 3307);
    $sql_query = "DELETE FROM rezervare WHERE codRezervare='$cod'";
    $result = mysqli_query($con, $sql_query);
    if ($result && mysqli_affected_rows($con) > 0) {
        mysqli_close($con);
        return true;
    } else {
        mysqli_close($con);
        return false;
    }
}

stergereRezervari();
