-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 01.Máj 2025, 18:39
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `fitstream`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `adresa`
--

CREATE TABLE `adresa` (
  `idadresa` int(11) NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `ulica` varchar(100) DEFAULT NULL,
  `psc` varchar(20) DEFAULT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `adresa`
--

INSERT INTO `adresa` (`idadresa`, `mesto`, `ulica`, `psc`, `datum_vytvorenia`) VALUES
(1, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:07:04'),
(2, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:09:18'),
(3, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:13:14'),
(4, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:15:34'),
(5, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:16:19'),
(6, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:42:09'),
(7, 'Vráble', 'Hlavná', '987654', '2025-04-30 06:52:53'),
(8, 'Vráble', 'Hlavná', '987654', '2025-04-30 08:38:38'),
(9, 'Vráble', 'Hlavná', '987654', '2025-04-30 10:33:06'),
(10, 'Vráble', 'Hlavná', '987654', '2025-04-30 19:05:02');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `akordeon`
--

CREATE TABLE `akordeon` (
  `idakordeon` int(11) NOT NULL,
  `otazka` varchar(255) NOT NULL,
  `odpoved` text NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `akordeon`
--

INSERT INTO `akordeon` (`idakordeon`, `otazka`, `odpoved`, `datum_vytvorenia`, `datum_upravy`) VALUES
(15, ' Ako dlho trvá doručenie objednávky?', 'Všetky objednávky odosielame do 24 hodín počas pracovných dní. Doručenie trvá zvyčajne 1–3 pracovné dni v rámci Slovenska a 2–5 dní.', '2025-05-01 16:15:34', '0000-00-00 00:00:00'),
(16, 'Je možné tovar vrátiť alebo vymeniť?', 'Áno, nepoužitý tovar môžete vrátiť alebo vymeniť do 14 dní od doručenia. Stačí vyplniť formulár na našej stránke a zaslať nám ho spolu s tovarom späť.', '2025-05-01 16:15:50', '0000-00-00 00:00:00'),
(17, 'Môžem si objednať aj bez registrácie?', 'Áno, nákup je možný aj bez vytvárania účtu. Stačí pri pokladni vyplniť doručovacie údaje a vybrať spôsob platby.', '2025-05-01 16:16:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `blog`
--

CREATE TABLE `blog` (
  `idblog` int(11) NOT NULL,
  `nazov` varchar(255) NOT NULL,
  `popis` text NOT NULL,
  `img_blog` varchar(255) DEFAULT NULL,
  `img_alt` varchar(255) DEFAULT NULL,
  `id_kategorie` int(11) NOT NULL,
  `id_uzivatel` int(11) NOT NULL,
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `blog`
--

INSERT INTO `blog` (`idblog`, `nazov`, `popis`, `img_blog`, `img_alt`, `id_kategorie`, `id_uzivatel`, `datum_vytvorenia`, `datum_upravy`) VALUES
(2, 'Čo je zdravá strava a ako sa naučiť jesť zdravo?', 'Ľudia si čím ďalej, tým viac uvedomujú dôležitosť zdravého stravovania, ktoré by malo byť pevnou súčasťou každodenného života nás všetkých. Čo to ale zdravé stravovanie vlastne znamená? Nebojte sa nič, nie je to brokolica na pare s vareným kuracím mäsom ani šalát so šalátom trikrát denne, ako by sa na prvý pohľad mohlo zdať. Nemusíte ani hneď bežať do kníhkupectva po najnovšiu prevratnú knižku o zdravom stravovaní a začať vyraďovať pečivo, mliečne výrobky alebo sa vyhýbať lepku ako čert krížu. Možno budete dokonca prekvapení, ako môže tá zdravá strava vyzerať.\r\n\r\nO zdravej strave, žiaľ, stále koluje množstvo zbytočných mýtov a presvedčení, ktoré robia problematiku stravovania ďaleko zložitejšiu, ako je potrebné. Spomeňte si, čo všetko ste o zdravom stravovaní počuli. Raz je za vinníka celosvetovej obezity označovaný lepok, potom sú to tuky alebo cukor a podľa dokumentov na Netflixe sa zase môže zdať, že by sme sa všetci mali stať vegánmi. Kvôli takej informačnej džungli niet divu, že ľudia často v pokusoch o zdravšie stravovanie zlyhávajú alebo s tým radšej ani nezačínajú, pretože je im proti srsti myšlienka, že by museli jesť napríklad len určitý druh potravín. Ono je to ale všetko o dosť jednoduchšie, to si len my sami veci zbytočne komplikujeme.\r\nAko vidíte, zdravá strava a zdravšie stravovacie návyky vám môžu priniesť rad výhod. Najdôležitejšia je podpora celkového zdravia, ktoré máme všetci len jedno. Často sa oň však začneme starať, až keď sa objaví nejaký zdravotný problém, čo už je trochu neskoro. Je lepšie predsa problémom predchádzať, ako ich potom „hasiť“.  \r\n\r\nAko sa dá definovať zdravé stravovanie? \r\nPodľa slovníka Cambridge University je zdravé jedlo také, o ktorom sa verí, že je dobré pre ľudské zdravie, pretože neobsahuje umelé chemikálie ani príliš veľa cukru alebo tuku. Keby ste si preštudovali, čo o zdravom stravovaní hovorí WHO, našli by ste aj nejaké číselné vyjadrenie toho, ako by zdravá strava (ne)mala vyzerať. Nebudeme to zatiaľ zbytočne komplikovať a pozrieme sa na to, ako by sme mohli definovať zdravé stravovanie ďaleko jednoduchšie a výstižnejšie.\r\n', 'img/blog/6810ffe5d40103.15293080.jpg', '', 1, 5, '2025-04-28 20:56:34', '2025-04-29 18:35:49');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `blog_kategorie`
--

CREATE TABLE `blog_kategorie` (
  `id_kategorie` int(11) NOT NULL,
  `nazov_kategorie_blog` varchar(255) NOT NULL,
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `blog_kategorie`
--

INSERT INTO `blog_kategorie` (`id_kategorie`, `nazov_kategorie_blog`, `datum_vytvorenia`, `datum_upravy`) VALUES
(1, 'Zdravá strava', '2025-04-25 21:33:16', '2025-04-25 21:33:16');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `doprava`
--

CREATE TABLE `doprava` (
  `iddoprava` int(11) NOT NULL,
  `nazov` varchar(100) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `doprava`
--

INSERT INTO `doprava` (`iddoprava`, `nazov`, `datum_vytvorenia`, `datum_upravy`) VALUES
(1, 'Kuriér', '2025-04-29 14:56:47', '2025-05-01 16:13:04');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `footer_ikony`
--

CREATE TABLE `footer_ikony` (
  `idfooter` int(11) NOT NULL,
  `ikona` varchar(255) NOT NULL,
  `farba_bg` varchar(255) NOT NULL,
  `farba_ikony` varchar(255) NOT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `footer_ikony`
--

INSERT INTO `footer_ikony` (`idfooter`, `ikona`, `farba_bg`, `farba_ikony`, `url`) VALUES
(5, 'fa fa-linkedin', '#42ffe9', '#ffffff', 'https://www.linkedin.com'),
(15, 'fa fa-youtube', '#ff0000', '#ffffff', 'https://www.youtube.com'),
(16, 'fa fa-instagram', '#fb00ff', '#ffffff', 'https://www.instagram.com/'),
(17, 'fa fa-facebook', '#006eff', '#ffffff', 'https://www.facebook.com/?locale=sk_SK');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie`
--

CREATE TABLE `kategorie` (
  `idkategorie` int(11) NOT NULL,
  `nazov_kategorie` varchar(255) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kategorie_idkategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `kategorie`
--

INSERT INTO `kategorie` (`idkategorie`, `nazov_kategorie`, `datum_vytvorenia`, `datum_upravy`, `kategorie_idkategorie`) VALUES
(1, 'Oblečenie', '2025-04-14 22:00:00', '2025-04-14 22:00:00', NULL),
(2, 'Príslušenstvo', '2025-04-14 22:00:00', '2025-04-14 22:00:00', NULL),
(3, 'Športová výživa', '2025-04-14 22:00:00', '2025-04-14 22:00:00', NULL),
(4, 'BCAA', '2025-04-21 14:11:19', '2025-04-24 17:56:50', 3),
(5, 'Protein', '2025-04-22 07:51:16', '0000-00-00 00:00:00', 3),
(6, 'Vitamíny', '2025-04-24 17:52:57', '2025-04-24 17:52:57', 3),
(7, 'Tričká', '2025-04-24 17:56:04', '2025-04-24 17:56:04', 1),
(8, 'Mikiny', '2025-04-24 17:57:36', '2025-04-24 17:57:36', 1),
(9, 'Tréningové pomôcky', '2025-04-24 18:12:19', '2025-04-24 18:12:19', 2),
(10, 'Tašky a batohy', '2025-04-24 18:14:57', '2025-04-24 18:14:57', 2);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie_has_produkty`
--

CREATE TABLE `kategorie_has_produkty` (
  `kategorie_idkategorie` int(11) NOT NULL,
  `produkty_idprodukty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `kategorie_has_produkty`
--

INSERT INTO `kategorie_has_produkty` (`kategorie_idkategorie`, `produkty_idprodukty`) VALUES
(1, 35),
(1, 36),
(2, 39),
(2, 40),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 38),
(4, 38),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(7, 35),
(8, 36),
(9, 39),
(10, 40);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `navbar`
--

CREATE TABLE `navbar` (
  `idnavbar` int(11) NOT NULL,
  `nazov` varchar(200) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `navbar`
--

INSERT INTO `navbar` (`idnavbar`, `nazov`, `url`) VALUES
(1, 'Výživa', 'vyziva.php'),
(2, 'Oblečenie', 'oblecenie.php'),
(3, 'Príslušenstvo', 'prislusenstvo.php'),
(4, 'Blog', 'blog.php'),
(5, 'Kontakt', 'kontakt.php');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `objednavky`
--

CREATE TABLE `objednavky` (
  `idobjednavky` int(11) NOT NULL,
  `id_adresa` int(11) DEFAULT NULL,
  `id_platba` int(11) DEFAULT NULL,
  `id_doprava` int(11) DEFAULT NULL,
  `id_zakaznici` int(11) DEFAULT NULL,
  `cena` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `datum_objednavky` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `objednavky`
--

INSERT INTO `objednavky` (`idobjednavky`, `id_adresa`, `id_platba`, `id_doprava`, `id_zakaznici`, `cena`, `status`, `datum_objednavky`) VALUES
(1, 3, 1, 1, 3, 26.99, 'V príprave', '2025-04-29 16:13:14'),
(2, 4, 1, 1, 4, 106.48, 'V príprave', '2025-04-29 16:15:34'),
(3, 5, 1, 1, 5, 59.90, 'V príprave', '2025-04-29 16:16:19'),
(4, 6, 1, 1, 6, 94.85, 'V príprave', '2025-04-29 16:42:09'),
(5, 7, 1, 1, 7, 72.94, 'V príprave', '2025-04-30 06:52:53'),
(6, 8, 1, 1, 8, 26.99, 'V príprave', '2025-04-30 08:38:38'),
(7, 9, 1, 1, 9, 23.90, 'V príprave', '2025-04-30 10:33:06'),
(8, 10, 1, 1, 10, 27.53, 'V príprave', '2025-04-30 19:05:02');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `objednavky_produkty`
--

CREATE TABLE `objednavky_produkty` (
  `id_objednavky` int(11) NOT NULL,
  `id_produkt` int(11) NOT NULL,
  `mnozstvo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `objednavky_produkty`
--

INSERT INTO `objednavky_produkty` (`id_objednavky`, `id_produkt`, `mnozstvo`) VALUES
(1, 32, 1),
(2, 33, 1),
(2, 35, 1),
(2, 40, 1),
(3, 31, 5),
(4, 31, 1),
(4, 38, 1),
(4, 39, 1),
(5, 32, 3),
(5, 40, 1),
(6, 32, 5),
(7, 34, 1),
(8, 33, 2);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `platba`
--

CREATE TABLE `platba` (
  `idplatba` int(11) NOT NULL,
  `nazov` varchar(100) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `platba`
--

INSERT INTO `platba` (`idplatba`, `nazov`, `datum_vytvorenia`, `datum_upravy`) VALUES
(1, 'Platba kartou', '2025-04-29 14:56:15', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `produkty`
--

CREATE TABLE `produkty` (
  `idprodukty` int(11) NOT NULL,
  `nazov` varchar(150) NOT NULL,
  `znacka` varchar(255) DEFAULT NULL,
  `popis` text NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `pocet_kusov` int(11) NOT NULL,
  `velkost` varchar(20) DEFAULT NULL,
  `farba` varchar(75) DEFAULT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_hlavna` varchar(255) NOT NULL,
  `img_alt` varchar(255) NOT NULL,
  `hlavny_popis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `produkty`
--

INSERT INTO `produkty` (`idprodukty`, `nazov`, `znacka`, `popis`, `cena`, `pocet_kusov`, `velkost`, `farba`, `datum_vytvorenia`, `datum_upravy`, `img_hlavna`, `img_alt`, `hlavny_popis`) VALUES
(31, 'Prom-in CFM Pure Performance - Mlieko s medom a škoricou', 'Prom-in CFM Pure Performance', 'Prom-in CFM Pure Whey Performácia\r\nVysokopercentný proteínový nápoj vyrobený metódou CFM ( c ross f  low microfiltration  – mikrofiltrácia skríženým tokom cez keramické filtre), ktorá zachováva maximum bio-aktívnych frakcií pôvodnej suroviny. CFM PURE PERFORMANCE  predstavuje prémiový proteínový suplement výhradne z najkvalitnejšieho srvátkového proteínového koncentrátu prémiovej kvality z mlieka získaného od kráv, ktoré sú po väčšiu časť roka kŕmené trávou.   Navyše vďaka najpokročilejšej technológii spracovania garantujeme zachovanie pôvodného pomeru bioaktívnych frakcií, vďaka čomu sa použitie produktu neobmedzuje len na šport, ale vďaka nepopierateľným zdravotným výhodám je vhodný na zaradenie do potravinového koša detí i dospelých. CFM PURE PERFORMANCE  neobsahuje žiadne umelé farbivá, aspartám, acesulfam, plnidlá ani nežiaduce tuky pre zjemnenie chuti. aminokyseliny BCAA. Nie nadarmo je srvátkový proteín považovaný za zlatý štandard v kvalitne bielkovín.', 59.90, 10, ' ', ' ', '2025-04-22 07:54:35', '2025-04-29 16:35:21', 'img/produkty/6810ffc9a4df19.73752177.webp', ' ', 'Vďaka šetrnému spracovaniu sa jedná o absolútnu špičku medzi vysokopercentnými proteínovými suplementami na trhu.'),
(32, 'GymSupps XWhey Protein - Citrónový cheesecake 1000g', 'GymSupps XWhey Protein', 'GymSupps XWhey Protein\r\nGymSupps XWhey Protein je dokonalým spojencom každého športovca, ktorý vie, že rast svalov a efektívna regenerácia začínajú pri kvalitných bielkovinách. Pripravte sa posunúť svoj tréning na ďalšiu úroveň! Kedy začať uvažovať o užívaní proteínu?\r\nZačnite uvažovať o užívaní proteínu najmä v obdobiach zvýšenej fyzickej námahy a pri snahe o budovanie svalovej hmoty. Ak zisťujete, že váš denný príjem bielkovín je nedostatočný, môže byť tento doplnok ideálnym riešením. Navyše, bielkoviny podporujú chudnutie – zvyšujú pocit sýtosti, pomáhajú spaľovať tuky a zároveň chránia svalovú hmotu pri redukčnej diéte. Odporúčané dávkovanie GymSupps XWhey Protein:\r\nRozmiešajte jednu odmerku (30 gramov) v 200–300 ml vody a skonzumujte. Užívajte 1–3× denne na doplnenie bielkovín.', 26.99, 20, ' ', ' ', '2025-04-22 07:57:44', '2025-04-29 16:35:07', 'img/produkty/6810ffbb404109.09647336.webp', ' ', 'X-Whey Protein od GymSupps je viaczložkový srvátkový proteín s izolátom značky Volactive®.'),
(33, 'Scitec 100% Whey Protein Professional - Biela čokoláda', 'Scitec', 'Whey Protein Professional od spoločnosti Scitec Nutrition má hodnotenie dlhodobo najlepšie chutného proteínu na našom trhu, navyše vďaka svojmu zloženiu patrí tiež k špičke. Obsahuje vysoký podiel kvalitných srvátkových bielkovín získaných ultra-mikrofiltračným procesom. Navyše obsahuje tráviace enzýmy papaín (extrahovaný z papáje) a bromelaín (z ananásovníka). Proteínová zložka Whey Protein Professional obsahuje cca 23% aminokyselín BCAA (5 g v každej dávke) a 18% L-\r\nglutamínu (4 g v dávke). Suplement je skvelou voľbou ako pre všetkých športovcov usilujúcich o nárast svalovej hmoty, tak aj ako veľmi kvalitná náhrada jedla do redukčných diét.\r\n\r\n100% Whey Protein Professional je srvátkový proteín s veľmi vysokou využiteľnosťou ľudským organizmom. Obsah esenciálnych aminokyselín a taktiež obsah anabolicky pôsobiacich aminokyselín s viazaným reťazcom je veľmi vysoký (až 47,5%). V záujme zabránenia katabolickým procesom je obohatený tiež množstvom glutamínu. 100% Whey Protein Professional obsahuje približne 10% imunoglobulínových mikrofrakcií, naopak neobsahuje žiadny aspartam. Veľmi dôležitou súčasťou je\r\nkomplex tráviacich enzýmov Aminogen (bromelaín extrahovaný z ananásovníku chocholatého - 1200 GDU / g a papaín extrahovaný z papáje - 1,5 FIP U / mg).\r\n\r\nProteín je určený všetkým užívateľom, ktorí sa usilujú o nárast svalovej hmoty a sily. Veľmi často je ale používaný aj v redukčných diétach ako náhrada jedla, popr. ako prímes k iným potravinám (do tvarohu)\r\n\r\nV bodoch:\r\n\r\nzmes srvátkového koncentrátu a srvátkového izolátu\r\nprispieva k zvyšovaniu a udržiavanie svalovej hmoty\r\ns obsahom všetkých 9 esenciálnych aminokyselín\r\nso zmesou tráviacich enzýmov\r\nOdporúčané dávkovanie:\r\n\r\nrozmixujte 3/4 odmerky (30 g) 100% Whey Protein Professional v 250 ml vody alebo mlieka\r\nužívajte najlepšie po tréningu (ale aj napr. ráno po prebudení či v priebehu dňa medzi jedlami)', 27.53, 10, ' ', ' ', '2025-04-22 07:59:51', '2025-04-29 16:34:55', 'img/produkty/6810ffaf5b5697.08181715.webp', ' ', '100% Whey Protein Professional je syrovátkový produkt s obsahom 77% bielkovín s nízkym obsahom tukov a laktózy.\r\n\r\n'),
(34, 'Performance Protein, natívny srvátkový proteín, slaný karamel', 'Performance Protein', 'Upgradovali sme už tak dobrý Performance proteín zmenou bežného kolagénu na Grass-fed kolagén a celkovo vyladili chuť a rozpustnosť k dokonalosti. Úplne prelomová kombinácia vysoko kvalitného   natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom. Namiesto kokosového oleja sme použili kokosové mlieko, ktoré sa ľahšie rozpúšťa, a vďaka ktorému má proteín krémovejšiu konzistenciu. Úplne   prelomová kombinácia vysoko kvalitného natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom a kokosovým olejom. Svojím zložením a čistotou je úplným unikátom. Môžete si byť istí, že kombinácia látok v jednom produkte v takej kvalite neexistuje. Nie je určený iba na jednoduché doplnenie kvalitného zdroja bielkovín.   Performance Protein je komplexným riešením pre regeneráciu, črevo a imunitu. Aj napriek tomu, že je   dochutený iba prírodným sladidlom stévií, vyniká skvelou chuťou i vôňou. Navyše neobsahuje žiadne balastné látky, ani lepok.', 23.90, 15, ' ', ' ', '2025-04-22 08:04:44', '2025-04-29 16:34:44', 'img/produkty/6810ffa45e3db9.16214368.webp', ' ', 'Performance Protein – Prémiová sila pre tvoje telo.\r\nPrelomová kombinácia natívneho srvátkového proteínu, Grass-fed kolagénu typu I a III, kolostra a kokosového mlieka. Bez lepku, bez balastu, so stéviou a skvelou chuťou. Podpora regenerácie, imunity a zdravého čreva v jednom čisto prírodnom produkte.\r\n\r\n'),
(35, 'ADIDAS ORIGINALS Tričko \'Adicolor Classics\' vo farbe Biela', 'ADIDAS ORIGINALS ', 'Produkt obsahuje: 100% organické materiály\r\nVyrobené z:Bavlna (ekologicky pestovaná)\r\nDôkaz:Vyhlásenie dodávateľa o prevedení nezávislej kontroly\r\nTento produkt obsahuje organické materiály, ktorých pestovanie sa zameriava na zachovanie zdravia pôdy a ekosystémov prostredníctvom ekologického poľnohospodárstva tým, že sa vyhýba genetickej modifikácii, a obmedzuje sa používanie vody a chemických hnojív.', 33.00, 20, 'XL', 'Biela', '2025-04-24 17:55:22', '2025-04-29 16:34:33', 'img/produkty/6810ff99d5a3a0.57127201.webp', ' ', 'Veľkosť & strih\r\nDĺžka rukávu: Štvrtinový rukáv\r\nDĺžka: Normálna dĺžka\r\nStrih: Štandardný fit\r\nPotlač loga\r\nDžersej\r\nOkrúhly výstrih\r\nZošívaný lem\r\nŠvy tón v tóne\r\nMäkký omak'),
(36, 'Nike Sportswear Mikina \'CLUB\' vo farbe Čierna', 'Nike', 'Objav pohodlie, ktoré si zamiluješ, a štýl, ktorý vynikne – s touto mikinou od značky Nike. Vyrobená z kvalitného a príjemného materiálu, ktorý ti poskytne teplo počas chladnejších dní, a zároveň umožní pokožke dýchať.\r\n\r\nModerný strih a minimalistický dizajn s ikonickým logom Nike robia z tejto mikiny ideálny kúsok do každodenného šatníka. Či už ju skombinuješ s džínsami, teplákmi alebo legínami, vždy budeš pôsobiť uvoľnene a štýlovo.\r\n\r\n✔️ Materiál: 80 % bavlna, 20 % polyester\r\n✔️ Strih: Regular Fit\r\n✔️ Kapucňa: Áno, so šnúrkami\r\n✔️ Vrecká: Kengurie vrecko vpredu\r\n✔️ Logo: Výrazné logo Nike na hrudi\r\n\r\nIdeálna na voľný čas, tréning aj každodenné nosenie. Buď v pohybe so štýlom – buď Nike.', 64.90, 12, 'L', 'Čierna', '2025-04-24 17:59:44', '2025-04-29 16:34:21', 'img/produkty/6810ff8ced5b43.91104363.webp', ' ', 'Štýlová a pohodlná mikina Nike pre každý deň – ideálna voľba do mesta aj na tréning.'),
(38, 'GymSupps BCAA 4:1:1 Instant - 500g', 'GymSupps ', 'Ak hľadáš spôsob, ako podporiť svoj tréning a zlepšiť regeneráciu, musíš vyskúšať naše GymSupps BCAA 4:1:1 instant! Je to skvelý spoločník do fitka, ktorý ti pomôže dosiahnuť tvoje ciele rýchlejšie a efektívnejšie. Táto BCAA (aminokyseliny s rozvetveným reťazcom) sa skladá z leucínu, izoleucínu a valínu v skvelom pomere 4:1:1, čo znamená, že dostaneš väčšiu porciu leucínu, ktorý je kľúčový pre budovanie svalov a podporu regenerácie.\r\nPrečo pomer 4:1:1?\r\nPomer 4:1:1 ponúka vyššiu dávku leucínu v porovnaní s tradičnejším pomerom 2:1:1. Leucín je kľúčový pre spustenie syntézy svalových bielkovín, čo je zásadné pre rast svalov a regeneráciu po tréningu. S týmto pomerom získaš maximálny benefit z každej dávky BCAA, čo ti pomôže dosiahnuť lepšie výsledky rýchlejšie.\r\nKedy začať uvažovať nad užívaním BCAA ?\r\nBCAA sú skvelou voľbou, pokiaľ sa snažíš zlepšiť svoju výkonnosť a regeneráciu. Pokiaľ trénuješ intenzívne, zažívaš únavu alebo chceš zlepšiť svalovú regeneráciu a ochrániť svaly pred rozpadáním, BCAA sú pre teba to pravé. Sú ideálne ako pre začiatočníkov, tak pre pokročilých športovcov, ktorí chcú posunúť svoje výsledky na ďalšiu úroveň.', 17.45, 10, ' ', ' ', '2025-04-24 18:08:17', '2025-04-29 16:34:09', 'img/produkty/6810ff8143e842.22814577.png', ' ', 'BCAA 4:1:1 Instant od GymSupps ponúka skvelý pomer leucínu, rýchlu regeneráciu a lahodné príchute pre optimálny rast svalov.'),
(39, 'Trhačky Cotton Gel S4 Black - RDX Sports', 'RDX Sports', 'Trhačky Cotton Gel S4 - praktické tréningové pomôcky pre pevnejší úchop činky, ktoré môžu pomôcť zdvihnúť väčšiu váhu\r\nTrhačky Cotton Gel S4 sú praktické tréningové pomôcky na podporu úchopu pri silovom cvičení. Jednoducho si ich upevníte na zápästie a vďaka dĺžke 60 cm a šírke 4 cm potom pevne omotáte okolo činky. Znížite tak napätie v predlaktí a prstoch pri ťahových cvikoch, ako je mŕtvy ťah. Pri zdvíhaní ťažkých váh vás tak nebude toľko limitovať sila úchopu a zvládnete napríklad aj vyššiu záťaž a viac opakovaní.\r\n\r\nTieto trhačky sú vyrobené z odolnej bavlny a majú protišmykový povrch pre stabilnejšie držanie na činke. O vaše pohodlie sa navyše postará neoprénové polstrovanie v oblasti zápästia. Využijú ich najmä kulturisti, vzpierači, powerlifteri, crossfiťáci a ostatní športovci, ktorí hľadajú rôzne možnosti, ako posilniť úchop.\r\n\r\nTrhačky Cotton Gel S4 a ich výhody\r\nsú tréningové pomôcky pre podporu úchopu\r\nslúžia na zníženie napätia v predlaktí a prstoch\r\nmajú dĺžku 60 cm a šírku 4 cm\r\nsú vyrobené z odolnej bavlny\r\nmajú protišmykový povrch\r\njednoducho sa používajú\r\nhodia sa na mŕtvy ťah a ďalšie ťahové cviky\r\nideálne pre kulturistov, vzpieračov a powerlifterov \r\n \r\nMateriál\r\nBavlna, neoprénové polstrovanie, silikón.', 17.50, 10, ' ', ' ', '2025-04-24 18:13:52', '2025-04-29 16:33:46', 'img/produkty/6810ff6a082986.33175529.webp', ' ', 'Trhačky Cotton Gel S4 slúžia na lepší úchop osi na tréningu. Majú dĺžku 60 cm a šírku 4 cm, vďaka čomu ich pevne omotáte okolo činky. Odľahčíte tak predlaktia pri ťahových cvikoch, ako je napríklad mŕtvy ťah. Trhačky vám pomôžu zdvihnúť väčšiu váhu a zvládnuť viac opakovaní. Pri tréningu ich bežne používajú najmä kulturisti, vzpierači a powerlifteri.'),
(40, 'Batoh Stellar Black - STRIX', 'STRIX', 'Backpack Stellar - funkčný ruksak s ultra-moderným dizajnom a vodeodolnou ochranou v podobe plášťa, ktorý udrží vaše veci suché aj počas dažďa či snehu\r\nBackpack Stellar je prvotriedny ruksak, ktorý ocení každý, kto hľadá nekompromisné riešenie na cesty, do práce, školy či fitka. Pýši sa ultra-moderným nadčasovým dizajnom, ktorý zdobia rôzne vychytené nápisy a logá prémiovej značky STRIX, čo mu pridáva na jedinečnosti. Poteší tiež aj veľkorysým úložným priestorom a samostatným vreckom na 16\" laptop. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na spoľahlivú ochranu vašich vecí pred dažďom a snehom. Backpack Stellar vás tak podrží za každého počasia a uschová vaše cennosti v suchu. Navyše sa môže pochváliť vetraním v spodnej časti, čo sa hodí najmä v prípade, že si v ňom nesiete veci z fitka.\r\nVnútro chránia bezpečné zipsy a povrch pokrýva bohatá ponuka vreciek a kapsičiek rôznych veľkostí. Navyše je ľahký a veľmi pohodlný na nosenie. Vďačí za to nastaviteľným popruhom, ale aj dokonalému anatomickému tvarovaniu s vystuženým chrbtom. Svoj podiel na komforte počas nosenia má aj sieťovaná vnútorná časť, ktorá sa postará o spoľahlivú ventiláciu chrbta. Backpack Stellar je tiež vybavený popruhmi na nosenie karimatky, čo sa hodí, keď sa chystáte spať v prírode alebo na lekciu jogy. Ide teda ultimátny batoh, ktorý by nemal chýbať vo výbave každého nomáda. Určite ho však využijú aj študenti, ktorí potrebujú priestor na skriptá, športovci chytajúci sa do fitka, manažéri či fanúšikovia turistiky. Zaraďte sa medzi elitu okolo značky STRIX a prejavte naplno svoju lásku k aktívnemu životnému štýlu.\r\nBackpack Stellar a jeho výhody \r\nje prvotriedny ruksak s ultra-moderným nadčasovým dizajnom \r\nhodí sa na cesty, do školy, práce či fitka\r\nmá objem 16,8 l\r\nmá vetranie v spodnej časti  \r\nmá veľkorysý úložný priestor s bohatou ponukou vreciek a kapsičiek \r\nje vyrobený z polyesteru, ktorý sa pýśi vysokou odolnosťou a dlhou životnosťou \r\nmá samostatné vrecko na 16\" laptop\r\nmá vodeodolný obal, ktorý ochráni vaše veci pred dažďom a snehom \r\nje veľmi ľahký a pohodlne sa nosí\r\nmá popruhy na karimatku \r\nmá dokonalé anatomické tvarovanie s vystuženým chrbtom \r\nmá nastaviteľné popruhy\r\nmá sieťovanú vnútornú časť, ktorá zabezpečí ventiláciu chrbta \r\n\r\nMateriál\r\nPolyester\r\n\r\n ', 45.95, 12, ' ', ' ', '2025-04-24 18:16:14', '2025-04-29 16:33:34', 'img/produkty/6810ff5ea3d090.30218470.jpg', ' ', 'Backpack Stellar je ultimátny ruksak pre každého, kto hľadá nekompromisné riešenie na cesty, do práce, školy či do fitka. Poteší veľkorysým úložným priestorom s vreckom na 16\" laptop a ultra-moderným nadčasovým dizajnom. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na ochranu pred dažďom a snehom.');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `slideshow`
--

CREATE TABLE `slideshow` (
  `idslideshow` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_preklik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `slideshow`
--

INSERT INTO `slideshow` (`idslideshow`, `img_url`, `img_preklik`) VALUES
(3, 'img/slideshow/6810ff128bccc3.17845243.webp', 'http://localhost/FitStream/vyziva.php'),
(4, 'img/slideshow/6811fdc6baccf4.97241390.jpg', 'http://localhost/FitStream/oblecenie.php'),
(5, 'img/slideshow/6811fe80761532.28553325.jpg', 'http://localhost/FitStream/prislusenstvo.php');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `uzivatelia`
--

CREATE TABLE `uzivatelia` (
  `iduzivatelia` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `heslo` varchar(255) NOT NULL,
  `meno` varchar(255) NOT NULL,
  `priezvisko` varchar(255) NOT NULL,
  `datum_narodenia` date NOT NULL,
  `rola` int(11) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adresa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `uzivatelia`
--

INSERT INTO `uzivatelia` (`iduzivatelia`, `email`, `heslo`, `meno`, `priezvisko`, `datum_narodenia`, `rola`, `datum_vytvorenia`, `datum_upravy`, `adresa_id`) VALUES
(5, 'admin@outlook.sk', '$2y$10$mBWMr4yuRW0Kv7BoRQz0Nu0cpmZESxKgJ.2bNrIeAdrKjYO5KFzue', 'Adam', 'Nový', '2005-07-16', 0, '2025-04-16 17:36:47', '2025-04-24 17:41:59', NULL),
(6, 'a@a', '$2y$10$zWZVka6KUt9Amv93389.LuvVLGnSX9YhOcRNEq1bMsKOXg5uaXGJ.', 'Adam', 'Starý', '2002-06-05', 1, '2025-04-19 07:51:18', '2025-04-19 07:51:18', NULL),
(10, 'sadasdsadsaad@a', '$2y$10$oK9HaEGGnq2bsUohGJI0YuJ5h3sXwyoLrTxXCruqQBwZtSHVdPkYW', 'Patrik', 'Nový', '2025-04-27', 1, '2025-04-19 08:08:18', '2025-04-19 08:08:18', NULL),
(16, 'adamstary@outlook.sk', '$2y$10$nkEDdYVQVX.BkooTnLgsh.7QGotahEnjocx.EjhA3wr1Ww2ypyaM.', 'Adam', 'Starý', '1998-10-27', 1, '2025-04-27 13:44:51', '2025-04-27 13:44:51', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakaznici`
--

CREATE TABLE `zakaznici` (
  `id` int(11) NOT NULL,
  `id_uzivatelia` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `meno` varchar(100) DEFAULT NULL,
  `priezvisko` varchar(100) DEFAULT NULL,
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telefonne_cislo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zakaznici`
--

INSERT INTO `zakaznici` (`id`, `id_uzivatelia`, `email`, `meno`, `priezvisko`, `datum_vytvorenia`, `datum_upravy`, `telefonne_cislo`) VALUES
(1, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-04-29 18:07:04', '2025-04-29 18:07:04', '0904329235'),
(2, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-04-29 18:09:18', '2025-04-29 18:09:18', '0904329235'),
(3, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-04-29 18:13:14', '2025-04-29 18:13:14', '0904329235'),
(4, NULL, 'admin@admin.com', 'Patrik', 'Starý', '2025-04-29 18:15:34', '2025-04-29 18:15:34', '0904329235'),
(5, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-04-29 18:16:19', '2025-04-29 18:16:19', '0904329235'),
(6, NULL, 'admin@admin.com', 'Adam', 'Starý', '2025-04-29 18:42:09', '2025-04-29 18:42:09', '0904329235'),
(7, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Adam', '2025-04-30 08:52:53', '2025-04-30 08:52:53', '0904329235'),
(8, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-04-30 10:38:38', '2025-04-30 10:38:38', '0904329235'),
(9, NULL, 'admin@outlook.sk', 'Adam', 'Starý', '2025-04-30 12:33:06', '2025-04-30 12:33:06', '0903293213'),
(10, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Nový', '2025-04-30 21:05:02', '2025-04-30 21:05:02', '0903293213');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `adresa`
--
ALTER TABLE `adresa`
  ADD PRIMARY KEY (`idadresa`);

--
-- Indexy pre tabuľku `akordeon`
--
ALTER TABLE `akordeon`
  ADD PRIMARY KEY (`idakordeon`);

--
-- Indexy pre tabuľku `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idblog`),
  ADD KEY `id_kategorie` (`id_kategorie`),
  ADD KEY `id_uzivatel` (`id_uzivatel`);

--
-- Indexy pre tabuľku `blog_kategorie`
--
ALTER TABLE `blog_kategorie`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Indexy pre tabuľku `doprava`
--
ALTER TABLE `doprava`
  ADD PRIMARY KEY (`iddoprava`);

--
-- Indexy pre tabuľku `footer_ikony`
--
ALTER TABLE `footer_ikony`
  ADD PRIMARY KEY (`idfooter`);

--
-- Indexy pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`idkategorie`),
  ADD KEY `fk_kategorie_kategorie1_idx` (`kategorie_idkategorie`);

--
-- Indexy pre tabuľku `kategorie_has_produkty`
--
ALTER TABLE `kategorie_has_produkty`
  ADD PRIMARY KEY (`kategorie_idkategorie`,`produkty_idprodukty`),
  ADD KEY `fk_kategorie_has_produkty_produkty1_idx` (`produkty_idprodukty`),
  ADD KEY `fk_kategorie_has_produkty_kategorie1_idx` (`kategorie_idkategorie`);

--
-- Indexy pre tabuľku `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`idnavbar`);

--
-- Indexy pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`idobjednavky`),
  ADD KEY `id_adresa` (`id_adresa`),
  ADD KEY `id_platba` (`id_platba`),
  ADD KEY `id_doprava` (`id_doprava`),
  ADD KEY `id_zakaznici` (`id_zakaznici`);

--
-- Indexy pre tabuľku `objednavky_produkty`
--
ALTER TABLE `objednavky_produkty`
  ADD PRIMARY KEY (`id_objednavky`,`id_produkt`),
  ADD KEY `id_produkt` (`id_produkt`);

--
-- Indexy pre tabuľku `platba`
--
ALTER TABLE `platba`
  ADD PRIMARY KEY (`idplatba`);

--
-- Indexy pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`idprodukty`);

--
-- Indexy pre tabuľku `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`idslideshow`);

--
-- Indexy pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  ADD PRIMARY KEY (`iduzivatelia`),
  ADD KEY `fk_adresa` (`adresa_id`);

--
-- Indexy pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzivatelia` (`id_uzivatelia`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `adresa`
--
ALTER TABLE `adresa`
  MODIFY `idadresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `akordeon`
--
ALTER TABLE `akordeon`
  MODIFY `idakordeon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pre tabuľku `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `blog_kategorie`
--
ALTER TABLE `blog_kategorie`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `doprava`
--
ALTER TABLE `doprava`
  MODIFY `iddoprava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `footer_ikony`
--
ALTER TABLE `footer_ikony`
  MODIFY `idfooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `idkategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `navbar`
--
ALTER TABLE `navbar`
  MODIFY `idnavbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `idobjednavky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pre tabuľku `platba`
--
ALTER TABLE `platba`
  MODIFY `idplatba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idprodukty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pre tabuľku `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `idslideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  MODIFY `iduzivatelia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_kategorie`) REFERENCES `blog_kategorie` (`id_kategorie`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_uzivatel`) REFERENCES `uzivatelia` (`iduzivatelia`);

--
-- Obmedzenie pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD CONSTRAINT `fk_kategorie_kategorie1` FOREIGN KEY (`kategorie_idkategorie`) REFERENCES `kategorie` (`idkategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `kategorie_has_produkty`
--
ALTER TABLE `kategorie_has_produkty`
  ADD CONSTRAINT `fk_kategorie_has_produkty_kategorie1` FOREIGN KEY (`kategorie_idkategorie`) REFERENCES `kategorie` (`idkategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategorie_has_produkty_produkty1` FOREIGN KEY (`produkty_idprodukty`) REFERENCES `produkty` (`idprodukty`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD CONSTRAINT `objednavky_ibfk_1` FOREIGN KEY (`id_adresa`) REFERENCES `adresa` (`idadresa`),
  ADD CONSTRAINT `objednavky_ibfk_2` FOREIGN KEY (`id_platba`) REFERENCES `platba` (`idplatba`),
  ADD CONSTRAINT `objednavky_ibfk_3` FOREIGN KEY (`id_doprava`) REFERENCES `doprava` (`iddoprava`),
  ADD CONSTRAINT `objednavky_ibfk_4` FOREIGN KEY (`id_zakaznici`) REFERENCES `zakaznici` (`id`);

--
-- Obmedzenie pre tabuľku `objednavky_produkty`
--
ALTER TABLE `objednavky_produkty`
  ADD CONSTRAINT `objednavky_produkty_ibfk_1` FOREIGN KEY (`id_objednavky`) REFERENCES `objednavky` (`idobjednavky`),
  ADD CONSTRAINT `objednavky_produkty_ibfk_2` FOREIGN KEY (`id_produkt`) REFERENCES `produkty` (`idprodukty`);

--
-- Obmedzenie pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  ADD CONSTRAINT `fk_adresa` FOREIGN KEY (`adresa_id`) REFERENCES `adresa` (`idadresa`);

--
-- Obmedzenie pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  ADD CONSTRAINT `zakaznici_ibfk_1` FOREIGN KEY (`id_uzivatelia`) REFERENCES `uzivatelia` (`iduzivatelia`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
