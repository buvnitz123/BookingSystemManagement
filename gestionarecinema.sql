-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3307
-- Timp de generare: iun. 20, 2023 la 09:04 PM
-- Versiune server: 10.4.27-MariaDB
-- Versiune PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `gestionarecinema`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `actor`
--

CREATE TABLE `actor` (
  `id_actor` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `nationalitate` varchar(50) NOT NULL,
  `data_nasterii` date NOT NULL,
  `data_deces` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `actor`
--

INSERT INTO `actor` (`id_actor`, `nume`, `prenume`, `nationalitate`, `data_nasterii`, `data_deces`) VALUES
(24, 'Worthington', 'Sam', 'Australiana', '1976-08-02', NULL),
(25, 'Weaver', 'Sigourney', 'American', '1949-10-08', NULL),
(26, 'Saldana', 'Zoe', 'American', '1978-06-19', NULL),
(27, 'Radcliffe', 'Daniel', 'Britanica', '1989-07-23', NULL),
(28, 'Grint', 'Rupert', 'Britanica', '1988-08-24', NULL),
(29, 'Watson', 'Emma', 'Britanica', '1990-04-15', NULL),
(30, 'Chris', 'Hemsworth', 'Australian', '1983-08-11', NULL),
(31, 'Natalie', 'Portman', 'American', '1981-06-09', NULL),
(32, 'Tom', 'Hiddleston', 'Britanica', '1981-02-09', NULL),
(33, 'Schwarzenegger', 'Arnold', 'American', '1947-07-30', NULL),
(34, 'Hamilton', 'Linda', 'American', '1956-09-26', NULL),
(35, 'Furlong', 'Edward', 'American', '1977-08-02', NULL),
(36, 'Farmiga', 'Taissa', 'American', '1994-08-17', NULL),
(37, 'Bichir', 'Demian', 'Mexicana', '1963-08-01', NULL),
(38, 'Bloquet', 'Jonas', 'Belgiana', '1992-01-10', NULL),
(40, 'fdsfsd', 'fdsfs', 'dfsfs', '2023-05-20', '2023-05-20'),
(41, 'dadas', 'sadada', 'American', '2023-05-08', NULL),
(42, 'sdaas', 'dsada', 'dadad', '2023-05-20', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bilet`
--

CREATE TABLE `bilet` (
  `id_bilet` int(11) NOT NULL,
  `pret` float NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `ora_proiectie` time NOT NULL,
  `data_proiectie` date NOT NULL,
  `id_sala` int(11) NOT NULL,
  `numar_loc` int(11) NOT NULL,
  `nr_rand` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `codBilet` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `bilet`
--

INSERT INTO `bilet` (`id_bilet`, `pret`, `categorie`, `ora_proiectie`, `data_proiectie`, `id_sala`, `numar_loc`, `nr_rand`, `id_film`, `codBilet`) VALUES
(21, 20, 'Copil', '15:50:00', '2023-05-15', 1, 8, 4, 42, '3c59dc048e8850243be8079a5c74d079'),
(22, 25, 'Pensionar', '15:50:00', '2023-05-15', 1, 3, 5, 42, 'b6d767d2f8ed5d21a44b0e5886680cb9'),
(23, 25, 'Elev', '15:50:00', '2023-05-15', 1, 6, 2, 42, '37693cfc748049e45d87b8c7d8b9aacd'),
(24, 25, 'Elev', '15:50:00', '2023-05-15', 1, 7, 2, 42, '1ff1de774005f8da13f42943881c655f'),
(25, 25, 'Student', '15:50:00', '2023-05-15', 1, 5, 3, 42, '8e296a067a37563370ded05f5a3bf3ec'),
(26, 20, 'Copil', '15:50:00', '2023-05-15', 1, 6, 3, 42, '4e732ced3463d06de0ca9a15b6153677'),
(27, 25, 'Student', '15:50:00', '2023-05-15', 1, 3, 4, 42, '02e74f10e0327ad868d138f2b4fdd6f0'),
(28, 25, 'Pensionar', '22:20:00', '2023-05-16', 2, 5, 4, 38, '33e75ff09dd601bbe69f351039152189'),
(29, 25, 'Pensionar', '22:20:00', '2023-05-16', 2, 6, 4, 38, '6ea9ab1baa0efb9e19094440c317e21b'),
(30, 25, 'Student', '15:50:00', '2023-05-17', 1, 5, 3, 37, '34173cb38f07f89ddbebc2ac9128303f'),
(31, 25, 'Student', '15:50:00', '2023-05-17', 1, 6, 3, 37, 'c16a5320fa475530d9583c34fd356ef5'),
(32, 30, 'Normal', '15:50:00', '2023-05-17', 1, 3, 2, 37, '6364d3f0f495b6ab9dcf8d3b5c6e0b01'),
(33, 25, 'Student', '15:50:00', '2023-05-17', 1, 4, 2, 37, '182be0c5cdcd5072bb1864cdee4d3d6e'),
(34, 25, 'Student', '15:50:00', '2023-05-17', 1, 5, 2, 37, 'e369853df766fa44e1ed0ff613f563bd'),
(35, 25, 'Student', '15:50:00', '2023-05-17', 1, 6, 2, 37, '1c383cd30b7c298ab50293adfecb7b18'),
(36, 25, 'Elev', '15:50:00', '2023-05-17', 1, 7, 2, 37, '19ca14e7ea6328a42e0eb13d585e4c22'),
(37, 25, 'Pensionar', '15:50:00', '2023-05-17', 1, 8, 2, 37, 'a5bfc9e07964f8dddeb95fc584cd965d'),
(38, 25, 'Pensionar', '19:20:00', '2023-05-17', 2, 4, 2, 42, 'a5771bce93e200c36f7cd9dfd0e5deaa'),
(39, 25, 'Pensionar', '19:20:00', '2023-05-17', 2, 8, 2, 42, 'd67d8ab4f4c10bf22aa353e27879133c'),
(40, 25, 'Pensionar', '19:20:00', '2023-05-17', 2, 5, 3, 42, 'd645920e395fedad7bbbed0eca3fe2e0'),
(41, 25, 'Pensionar', '19:20:00', '2023-05-17', 2, 7, 3, 42, '3416a75f4cea9109507cacd8e2f2aefc'),
(42, 25, 'Pensionar', '19:20:00', '2023-05-17', 2, 5, 4, 42, 'a1d0c6e83f027327d8461063f4ac58a6'),
(43, 30, 'Normal', '12:10:00', '2023-05-23', 1, 5, 3, 42, '17e62166fc8586dfa4d1bc0e1742c08b'),
(44, 30, 'Normal', '12:10:00', '2023-05-23', 1, 6, 3, 42, 'f7177163c833dff4b38fc8d2872f1ec6'),
(45, 25, 'Student', '13:10:00', '2023-06-03', 2, 4, 3, 39, '6c8349cc7260ae62e3b1396831a8398f'),
(46, 25, 'Student', '13:10:00', '2023-06-03', 2, 5, 3, 39, 'd9d4f495e875a2e075a1a4a6e1b9770f'),
(47, 30, 'Normal', '12:10:00', '2023-06-09', 1, 5, 3, 38, '67c6a1e7ce56d3d6fa748ab6d9af3fd7'),
(48, 20, 'Copil', '12:10:00', '2023-06-09', 1, 6, 3, 38, '642e92efb79421734881b53e1e1b18b6'),
(49, 25, 'Student', '12:10:00', '2023-06-09', 1, 7, 3, 38, 'f457c545a9ded88f18ecee47145a72c0'),
(50, 25, 'Elev', '12:10:00', '2023-06-09', 1, 8, 3, 38, 'c0c7c76d30bd3dcaefc96f40275bdc0a'),
(51, 25, 'Pensionar', '12:10:00', '2023-06-09', 1, 9, 3, 38, '2838023a778dfaecdc212708f721b788'),
(52, 30, 'Normal', '20:00:00', '2023-06-16', 1, 3, 3, 38, '9a1158154dfa42caddbd0694a4e9bdc8'),
(53, 30, 'Normal', '20:00:00', '2023-06-16', 1, 4, 3, 38, 'd82c8d1619ad8176d665453cfb2e55f0'),
(54, 30, 'Normal', '20:00:00', '2023-06-16', 1, 5, 3, 38, 'a684eceee76fc522773286a895bc8436'),
(55, 30, 'Normal', '20:00:00', '2023-06-16', 1, 6, 3, 38, 'b53b3a3d6ab90ce0268229151c9bde11');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `detalii`
--

CREATE TABLE `detalii` (
  `id_detalii` int(11) NOT NULL,
  `detalii_descriere` varchar(4000) NOT NULL DEFAULT '',
  `link` varchar(50) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `detalii`
--

INSERT INTO `detalii` (`id_detalii`, `detalii_descriere`, `link`, `film_id`) VALUES
(11, '\"Avatar\" este un film de actiune si aventura science fiction regizat de James Cameron. A fost lansat in anul 2009 si a obtinut un succes urias la nivel global. Filmul se desfasoara intr-un viitor indepartat si urmareste povestea lui Jake Sully, un fost militar paralizat care este recrutat pentru a participa intr-un program ce implica explorarea lumii Pandora, un satelit extraterestru.', '5PSNL1qE6VY', 37),
(12, '\"Harry Potter si Camera Secretelor\" este al doilea film din seria \"Harry Potter\" bazata pe cartile scrise de J.K. Rowling. A fost lansat in anul 2002 si a fost regizat de Chris Columbus. Filmul continua povestea lui Harry Potter, un tanar vrajitor, in timpul celui de-al doilea sau an la Scoala de Vrajitorie si Vrajitorie Hogwarts.\r\n\r\nPovestea se concentreaza pe descoperirea unei camere secrete ascunse in Hogwarts, care adaposteste un secret intunecat si periculos. Harry, impreuna cu prietenii sai Ron si Hermione, se implica intr-o noua aventura pentru a descoperi cine a deschis Camera Secretelor si pentru a salva scoala de fortele intunecate.', 'jBltxS8HfQ4', 38),
(13, '\"Thor\" este un film de supereroi care explorează povestea lui Thor, un puternic zeu nordic al tunetului, exilat pe Pământ pentru a-și învăța lecții de umilință și responsabilitate. După ce este trimis în exil de către tatăl său Odin, Thor trebuie să învețe să-și stăpânească puterile și să înțeleagă adevăratul înțeles al valorilor noble. Pe măsură ce amenințările se ridică împotriva lui și a lumii sale, Thor trebuie să-și dovedească demnitatea și să-și recâștige drepturile de zeu pentru a salva umanitatea și a recâștiga încrederea tatălui său. Filmul combină acțiunea spectaculoasă, aventura și elemente mitologice pentru a oferi o călătorie epică a transformării și redescoperirii personajului principal.', 'vJUDu40Z_RY', 39),
(16, '\"Terminator 2: Judgment Day\" (1991) este un film american de actiune si stiintifico-fantastic regizat de James Cameron. Filmul este o continuare a filmului original \"The Terminator\" si prezinta o poveste in care un android avansat, numit T-800 (interpretat de Arnold Schwarzenegger), este trimis in trecut pentru a proteja un baiat pe nume John Connor (interpretat de Edward Furlong) de un alt android malefic, T-1000 (interpretat de Robert Patrick), care doreste sa-l elimine. Actiunea filmului este plina de secvente spectaculoase si efecte vizuale remarcabile, iar povestea abordeaza teme precum destinul, sacrificiul si importanta umanitatii. \"Terminator 2: Judgment Day\" a avut un impact semnificativ in industria cinematografica si a fost laudat pentru inovatiile sale tehnice si pentru interpretarile actorilor.', 'CRRlbK5w8AE', 42),
(22, '\"The Nun\" (2018) este un film de groaza supranatural regizat de Corin Hardy si face parte din franciza \"The Conjuring\". Actiunea filmului are loc in anii 1950 si se concentreaza pe originile intunecate ale personajului demonic cunoscut sub numele de \"The Nun\" (Calugarita).\r\n\r\nPovestea incepe atunci cand un calugar sinucigas isi pierde viata intr-o manastire din Romania. In urma acestui incident, Vaticanul trimite un preot, Parintele Burke, si o novice, Sora Irene, sa investigheze cazul. Ei descopera o forta malefica ce pune in pericol atat manastirea, cat si credinta lor.\r\n\r\nPe masura ce investigatia avanseaza, Parintele Burke si Sora Irene dezvaluie secrete intunecate si se confrunta cu forte supranaturale infricosatoare. In lupta lor pentru supravietuire, ei descopera legaturi intre aceasta calugarita demonica si evenimentele din filmele anterioare din universul \"The Conjuring\".\r\n\r\n\"The Nun\" aduce atmosfera infricosatoare si suspansul specific francizei \"The Conjuring\", oferind o experienta plina de jump-scares si momente tensionate. Este un film care exploreaza teroarea si lupta impotriva raului, cu elemente de mister si o estetica gotica.', 'zwAM5UnGd2s', 44),
(23, '\"Harry Potter si Printul Semipur\" (\"Harry Potter and the Half-Blood Prince\") este al saselea film din seria de filme \"Harry Potter\" bazata pe romanele celebre scrise de J.K. Rowling. Filmul a fost lansat in anul 2009 si aduce in prim-plan aventurile lui Harry Potter in lumea vrajitorilor.\r\n\r\nIn acest capitol al seriei, Harry Potter (interpretat de Daniel Radcliffe) se intoarce la scoala Hogwarts pentru cel de-al saselea sau an de studiu. Intr-un context intunecat, Voldemort si fortele sale malefice isi intaresc puterea si ameninta lumea vrajitorilor si cea a oamenilor. Profesorul Dumbledore (interpretat de Michael Gambon) il ia pe Harry sub aripa sa si il initiaza in tainele trecutului intunecat al lui Voldemort, in speranta de a gasi o slabiciune a temutului vrajitor.\r\n\r\nIn timp ce Voldemort se apropie tot mai mult de obtinerea nemuririi si de preluarea controlului asupra lumii vrajitorilor, Harry descopera indicii importante despre un misterios Print Semipur si despre conexiunile sale cu trecutul lui Voldemort. In aceasta calatorie periculoasa, Harry isi intareste prieteniile si trebuie sa faca fata marilor provocari si sacrificii pentru a se pregati de confruntarea finala cu cel mai mare vrajitor intunecat din toate timpurile.\r\n\r\n\"Harry Potter si Printul Semipur\" reprezinta o combinatie captivanta de aventura, mister, magie si emotie. Filmul exploreaza teme precum loialitatea, sacrificiul, puterea prieteniei si lupta impotriva raului absolut. Cu efecte vizuale impresionante, interpretari remarcabile si o poveste plina de suspans, acest film continua sa captiveze atat fanii seriei, cat si pe cei noi in universul magic al lui Harry Potter.', 'tAiy66Xrsz4', 45);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `distributie`
--

CREATE TABLE `distributie` (
  `id_film` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `distributie`
--

INSERT INTO `distributie` (`id_film`, `id_actor`) VALUES
(37, 24),
(37, 25),
(37, 26),
(38, 27),
(38, 28),
(38, 29),
(39, 30),
(39, 31),
(39, 32),
(42, 33),
(42, 34),
(42, 35),
(44, 36),
(44, 37),
(44, 38),
(45, 27),
(45, 28),
(45, 29);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `denumire_film` varchar(50) NOT NULL,
  `data_lansarii` date NOT NULL,
  `durata` int(11) NOT NULL,
  `restrictie_varsta` varchar(50) NOT NULL,
  `regizor_id` int(11) NOT NULL,
  `detalii_id` int(11) DEFAULT NULL,
  `imagine_film` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `film`
--

INSERT INTO `film` (`id_film`, `denumire_film`, `data_lansarii`, `durata`, `restrictie_varsta`, `regizor_id`, `detalii_id`, `imagine_film`) VALUES
(37, 'Avatar', '2009-12-18', 162, 'AP12', 27, 11, 'Images/Avatar.jpeg'),
(38, 'Harry Potter si Camera Secretelor', '2002-11-15', 161, 'AG', 28, 12, 'Images/Harry-Potter2.jpg'),
(39, 'Thor', '2011-05-06', 115, 'AP12', 29, 13, 'Images/Thor.jpg'),
(42, 'Terminator 2: Judgment Day', '1991-07-03', 137, 'N15', 27, 16, 'Images/terminator2 judgement day.jpg'),
(44, 'The Nun', '2018-07-09', 96, 'IM18', 32, 22, 'Images/theNun.jpg'),
(45, 'Harry Potter si Printul Semipur', '2009-07-15', 153, 'AP12', 33, 23, 'Images/harry-potter6.jpg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `gen`
--

CREATE TABLE `gen` (
  `denumire_gen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `gen`
--

INSERT INTO `gen` (`denumire_gen`) VALUES
('Actiune'),
('Aventura'),
('Comedie'),
('Drama'),
('Fantezie'),
('Horror'),
('SF'),
('Thriller');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `genfilm`
--

CREATE TABLE `genfilm` (
  `id_film` int(11) NOT NULL,
  `denumire_gen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `genfilm`
--

INSERT INTO `genfilm` (`id_film`, `denumire_gen`) VALUES
(37, 'Actiune'),
(37, 'Aventura'),
(37, 'Fantezie'),
(37, 'SF'),
(38, 'Aventura'),
(38, 'Comedie'),
(38, 'Drama'),
(38, 'Fantezie'),
(39, 'Actiune'),
(39, 'Aventura'),
(39, 'Fantezie'),
(42, 'Actiune'),
(42, 'SF'),
(42, 'Thriller'),
(44, 'Horror'),
(45, 'Aventura'),
(45, 'Fantezie');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `loc`
--

CREATE TABLE `loc` (
  `id_sala` int(11) NOT NULL,
  `numar_loc` int(11) NOT NULL,
  `nr_rand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `loc`
--

INSERT INTO `loc` (`id_sala`, `numar_loc`, `nr_rand`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 2, 4),
(1, 2, 5),
(1, 3, 1),
(1, 3, 2),
(1, 3, 3),
(1, 3, 4),
(1, 3, 5),
(1, 4, 1),
(1, 4, 2),
(1, 4, 3),
(1, 4, 4),
(1, 4, 5),
(1, 5, 1),
(1, 5, 2),
(1, 5, 3),
(1, 5, 4),
(1, 5, 5),
(1, 6, 1),
(1, 6, 2),
(1, 6, 3),
(1, 6, 4),
(1, 6, 5),
(1, 7, 1),
(1, 7, 2),
(1, 7, 3),
(1, 7, 4),
(1, 7, 5),
(1, 8, 1),
(1, 8, 2),
(1, 8, 3),
(1, 8, 4),
(1, 8, 5),
(1, 9, 1),
(1, 9, 2),
(1, 9, 3),
(1, 9, 4),
(1, 9, 5),
(1, 10, 1),
(1, 10, 2),
(1, 10, 3),
(1, 10, 4),
(1, 10, 5),
(2, 1, 1),
(2, 1, 2),
(2, 1, 3),
(2, 1, 4),
(2, 1, 5),
(2, 2, 1),
(2, 2, 2),
(2, 2, 3),
(2, 2, 4),
(2, 3, 1),
(2, 3, 2),
(2, 3, 3),
(2, 3, 4),
(2, 4, 1),
(2, 4, 2),
(2, 4, 3),
(2, 4, 4),
(2, 5, 1),
(2, 5, 2),
(2, 5, 3),
(2, 5, 4),
(2, 6, 1),
(2, 6, 2),
(2, 6, 3),
(2, 6, 4),
(2, 7, 1),
(2, 7, 2),
(2, 7, 3),
(2, 7, 4),
(2, 8, 1),
(2, 8, 2),
(2, 8, 3),
(2, 8, 4),
(2, 9, 1),
(2, 9, 2),
(2, 9, 3),
(2, 9, 4),
(2, 10, 1),
(2, 10, 2),
(2, 10, 3),
(2, 10, 4),
(2, 11, 1),
(2, 11, 2),
(2, 11, 3),
(2, 11, 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `proiectie`
--

CREATE TABLE `proiectie` (
  `id_sala` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `data_proiectiei_PK_` date NOT NULL,
  `ora_proiectiei_PK_` time NOT NULL,
  `durata_proiectie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `proiectie`
--

INSERT INTO `proiectie` (`id_sala`, `id_film`, `data_proiectiei_PK_`, `ora_proiectiei_PK_`, `durata_proiectie`) VALUES
(1, 37, '2023-05-14', '22:30:00', 162),
(1, 37, '2023-05-15', '20:40:00', 162),
(1, 37, '2023-05-16', '14:30:00', 162),
(1, 37, '2023-05-16', '16:40:00', 162),
(1, 37, '2023-05-17', '15:50:00', 162),
(1, 37, '2023-05-20', '12:00:00', 162),
(1, 38, '2023-05-15', '12:00:00', 161),
(1, 38, '2023-05-17', '12:50:00', 161),
(1, 38, '2023-05-20', '22:20:00', 161),
(1, 38, '2023-06-09', '12:10:00', 161),
(1, 38, '2023-06-09', '14:10:00', 161),
(1, 38, '2023-06-16', '20:00:00', 161),
(1, 39, '2023-05-16', '12:25:00', 115),
(1, 39, '2023-05-20', '16:10:00', 115),
(1, 42, '2023-05-15', '15:50:00', 137),
(1, 42, '2023-05-15', '18:50:00', 137),
(1, 42, '2023-05-16', '20:40:00', 137),
(1, 42, '2023-05-17', '18:00:00', 137),
(1, 42, '2023-05-20', '22:40:00', 137),
(1, 42, '2023-05-24', '12:30:00', 137),
(1, 44, '2023-05-20', '20:00:00', 96),
(1, 44, '2023-05-23', '21:58:00', 96),
(1, 45, '2023-05-20', '18:30:00', 153),
(2, 37, '2023-05-15', '20:25:00', 162),
(2, 37, '2023-05-15', '20:42:00', 162),
(2, 37, '2023-05-17', '12:50:00', 162),
(2, 37, '2023-05-20', '21:20:00', 162),
(2, 38, '2023-05-15', '22:45:00', 161),
(2, 38, '2023-05-16', '17:20:00', 161),
(2, 38, '2023-05-16', '22:20:00', 161),
(2, 38, '2023-05-20', '12:40:00', 161),
(2, 38, '2023-06-16', '18:00:00', 161),
(2, 39, '2023-05-16', '15:00:00', 115),
(2, 39, '2023-05-17', '14:00:00', 115),
(2, 39, '2023-06-03', '13:10:00', 115),
(2, 42, '2023-05-16', '19:30:00', 137),
(2, 42, '2023-05-17', '19:20:00', 137),
(2, 42, '2023-05-20', '22:30:00', 137),
(2, 44, '2023-05-20', '18:10:00', 96),
(2, 44, '2023-05-20', '22:00:00', 96),
(2, 44, '2023-05-21', '23:00:00', 96),
(2, 44, '2023-06-15', '14:50:00', 96);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `regizor`
--

CREATE TABLE `regizor` (
  `id_regizor` int(11) NOT NULL,
  `nume_regizor` varchar(50) NOT NULL,
  `prenume_regizor` varchar(50) NOT NULL,
  `data_nastere` date NOT NULL,
  `data_deces` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `regizor`
--

INSERT INTO `regizor` (`id_regizor`, `nume_regizor`, `prenume_regizor`, `data_nastere`, `data_deces`) VALUES
(27, 'Cameron', 'James', '1954-08-16', NULL),
(28, 'Chris', 'Columbus', '1958-09-10', NULL),
(29, 'Branagh', 'Kenneth', '1960-12-10', NULL),
(32, 'Hardy', 'Corin', '1975-11-06', NULL),
(33, 'Yates', 'David', '1963-11-30', NULL),
(34, 'Cameron', 'J.K', '2000-12-12', NULL),
(35, 'dasdasd', 'dasdad', '2023-05-20', '2023-05-20'),
(36, 'dsdsd', 'dasda', '1222-12-12', '2023-05-20'),
(37, 'adadsa', 'dasda', '2023-05-15', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `rezervare`
--

CREATE TABLE `rezervare` (
  `username` varchar(50) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `numar_loc` int(11) NOT NULL,
  `nr_rand` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `data_rezervare_PK_` date NOT NULL,
  `data_proiectie` date NOT NULL,
  `ora_proiectie` time NOT NULL,
  `codRezervare` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `rezervare`
--

INSERT INTO `rezervare` (`username`, `id_sala`, `numar_loc`, `nr_rand`, `id_film`, `data_rezervare_PK_`, `data_proiectie`, `ora_proiectie`, `codRezervare`) VALUES
('Cristian', 2, 5, 1, 44, '2023-06-15', '2023-06-15', '14:50:00', '3feabfcb5db9da096e1eb3af0da23ad0');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sala`
--

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nr_scaune` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `sala`
--

INSERT INTO `sala` (`id_sala`, `nr_scaune`) VALUES
(1, 50),
(2, 45);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `nr_telefon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `functie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`username`, `nume`, `prenume`, `parola`, `nr_telefon`, `email`, `functie`) VALUES
('admin', 'admin', 'admin', '098f6bcd4621d373cade4e832627b4f6', '0751781139', 'admin@gmail.com', 'admin'),
('Buvnitz123', 'Chiper', 'Cristian', '1f4078de2f71d4ed357ceb50c5aaad0f', '0751781139', 'dragoschiper89@gmail.com', 'admin'),
('Cristian', 'Ambraus ', 'Cristian', '836ebf35b9051512c59796e5dbbdcfd1', '0774475477', 'ambrauscristian@gmail.com', 'client'),
('DragosAdmin', 'Chiper', 'Dragos', '02b9f9ef78be1179a1221641631b2a0e', '0751781139', 'dragoschiper89@gmail.com', 'admin'),
('guest', '', '', '', '', '', '');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id_actor`);

--
-- Indexuri pentru tabele `bilet`
--
ALTER TABLE `bilet`
  ADD PRIMARY KEY (`id_bilet`),
  ADD KEY `Bilet_Loc_FK` (`id_sala`,`numar_loc`,`nr_rand`),
  ADD KEY `Bilet_Film0_FK` (`id_film`);

--
-- Indexuri pentru tabele `detalii`
--
ALTER TABLE `detalii`
  ADD PRIMARY KEY (`id_detalii`),
  ADD KEY `FKfilm_detalii` (`film_id`);

--
-- Indexuri pentru tabele `distributie`
--
ALTER TABLE `distributie`
  ADD PRIMARY KEY (`id_film`,`id_actor`),
  ADD KEY `Rol_Actor0_FK` (`id_actor`);

--
-- Indexuri pentru tabele `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `FKdetalii_film` (`detalii_id`),
  ADD KEY `FK_regizor_film` (`regizor_id`);

--
-- Indexuri pentru tabele `gen`
--
ALTER TABLE `gen`
  ADD PRIMARY KEY (`denumire_gen`);

--
-- Indexuri pentru tabele `genfilm`
--
ALTER TABLE `genfilm`
  ADD PRIMARY KEY (`id_film`,`denumire_gen`),
  ADD KEY `GenFilm_Gen0_FK` (`denumire_gen`);

--
-- Indexuri pentru tabele `loc`
--
ALTER TABLE `loc`
  ADD PRIMARY KEY (`id_sala`,`numar_loc`,`nr_rand`);

--
-- Indexuri pentru tabele `proiectie`
--
ALTER TABLE `proiectie`
  ADD PRIMARY KEY (`id_sala`,`id_film`,`data_proiectiei_PK_`,`ora_proiectiei_PK_`) USING BTREE,
  ADD KEY `Proiectie_Film0_FK` (`id_film`);

--
-- Indexuri pentru tabele `regizor`
--
ALTER TABLE `regizor`
  ADD PRIMARY KEY (`id_regizor`);

--
-- Indexuri pentru tabele `rezervare`
--
ALTER TABLE `rezervare`
  ADD PRIMARY KEY (`username`,`id_sala`,`numar_loc`,`nr_rand`,`id_film`,`data_rezervare_PK_`) USING BTREE,
  ADD KEY `Rezervare_Loc0_FK` (`id_sala`,`numar_loc`,`nr_rand`),
  ADD KEY `Rezervare_Film1_FK` (`id_film`);

--
-- Indexuri pentru tabele `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `actor`
--
ALTER TABLE `actor`
  MODIFY `id_actor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pentru tabele `bilet`
--
ALTER TABLE `bilet`
  MODIFY `id_bilet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pentru tabele `detalii`
--
ALTER TABLE `detalii`
  MODIFY `id_detalii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pentru tabele `regizor`
--
ALTER TABLE `regizor`
  MODIFY `id_regizor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pentru tabele `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `bilet`
--
ALTER TABLE `bilet`
  ADD CONSTRAINT `Bilet_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `Bilet_Loc_FK` FOREIGN KEY (`id_sala`,`numar_loc`,`nr_rand`) REFERENCES `loc` (`id_sala`, `numar_loc`, `nr_rand`);

--
-- Constrângeri pentru tabele `detalii`
--
ALTER TABLE `detalii`
  ADD CONSTRAINT `FKfilm_detalii` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `distributie`
--
ALTER TABLE `distributie`
  ADD CONSTRAINT `Rol_Actor0_FK` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`) ON DELETE CASCADE,
  ADD CONSTRAINT `Rol_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `FK_regizor_film` FOREIGN KEY (`regizor_id`) REFERENCES `regizor` (`id_regizor`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKdetalii_film` FOREIGN KEY (`detalii_id`) REFERENCES `detalii` (`id_detalii`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `genfilm`
--
ALTER TABLE `genfilm`
  ADD CONSTRAINT `GenFilm_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  ADD CONSTRAINT `GenFilm_Gen0_FK` FOREIGN KEY (`denumire_gen`) REFERENCES `gen` (`denumire_gen`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `loc`
--
ALTER TABLE `loc`
  ADD CONSTRAINT `Loc_Sala_FK` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE;

--
-- Constrângeri pentru tabele `proiectie`
--
ALTER TABLE `proiectie`
  ADD CONSTRAINT `Proiectie_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `Proiectie_Sala_FK` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Constrângeri pentru tabele `rezervare`
--
ALTER TABLE `rezervare`
  ADD CONSTRAINT `Rezervare_Film1_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `Rezervare_Loc0_FK` FOREIGN KEY (`id_sala`,`numar_loc`,`nr_rand`) REFERENCES `loc` (`id_sala`, `numar_loc`, `nr_rand`),
  ADD CONSTRAINT `Rezervare_User_FK` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
