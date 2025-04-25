-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 25.Apr 2025, 21:33
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
  `mesto` varchar(120) NOT NULL,
  `ulica` varchar(150) NOT NULL,
  `psc` varchar(20) NOT NULL,
  `typ` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(14, 'HP na dynamické zobrazenie obsahu na stránke?', 'asdasldlasldsaaaa', '2025-04-20 13:51:33', '2025-04-21 17:25:23');

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
  `sposob_dopravy` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(3, 'fa fa-youtubeaa', '#ff0000', '#ffffff', 'https://www.youtube.com'),
(5, 'fa fa-linkedin', '#42ffe9', '#ffffff', 'https://www.linkedin.com');

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
  `uzivatelia_iduzivatelia` int(11) NOT NULL,
  `doprava_iddoprava` int(11) NOT NULL,
  `platba_idplatba` int(11) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `stav_objednavky` varchar(50) NOT NULL,
  `produkty_idprodukty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `platba`
--

CREATE TABLE `platba` (
  `idplatba` int(11) NOT NULL,
  `sposob_platby` varchar(200) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `polozky_objednavky`
--

CREATE TABLE `polozky_objednavky` (
  `idpolozky_objednavky` int(11) NOT NULL,
  `objednavky_idobjednavky` int(11) NOT NULL,
  `produkty_idprodukty` int(11) NOT NULL,
  `pocet_ks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(31, 'Prom-in CFM Pure Performance - Mlieko s medom a škoricou', 'Prom-in CFM Pure Performance', 'Prom-in CFM Pure Whey Performácia\r\nVysokopercentný proteínový nápoj vyrobený metódou CFM ( c ross f  low microfiltration  – mikrofiltrácia skríženým tokom cez keramické filtre), ktorá zachováva maximum bio-aktívnych frakcií pôvodnej suroviny. CFM PURE PERFORMANCE  predstavuje prémiový proteínový suplement výhradne z najkvalitnejšieho srvátkového proteínového koncentrátu prémiovej kvality z mlieka získaného od kráv, ktoré sú po väčšiu časť roka kŕmené trávou.   Navyše vďaka najpokročilejšej technológii spracovania garantujeme zachovanie pôvodného pomeru bioaktívnych frakcií, vďaka čomu sa použitie produktu neobmedzuje len na šport, ale vďaka nepopierateľným zdravotným výhodám je vhodný na zaradenie do potravinového koša detí i dospelých. CFM PURE PERFORMANCE  neobsahuje žiadne umelé farbivá, aspartám, acesulfam, plnidlá ani nežiaduce tuky pre zjemnenie chuti. aminokyseliny BCAA. Nie nadarmo je srvátkový proteín považovaný za zlatý štandard v kvalitne bielkovín.', 59.90, 10, ' ', ' ', '2025-04-22 07:54:35', '2025-04-22 07:55:04', 'img/produkty/Prom-in CFM Pure Performance.webp', ' ', 'Vďaka šetrnému spracovaniu sa jedná o absolútnu špičku medzi vysokopercentnými proteínovými suplementami na trhu.'),
(32, 'GymSupps XWhey Protein - Citrónový cheesecake 1000g', 'GymSupps XWhey Protein', 'GymSupps XWhey Protein\r\nGymSupps XWhey Protein je dokonalým spojencom každého športovca, ktorý vie, že rast svalov a efektívna regenerácia začínajú pri kvalitných bielkovinách. Pripravte sa posunúť svoj tréning na ďalšiu úroveň! Kedy začať uvažovať o užívaní proteínu?\r\nZačnite uvažovať o užívaní proteínu najmä v obdobiach zvýšenej fyzickej námahy a pri snahe o budovanie svalovej hmoty. Ak zisťujete, že váš denný príjem bielkovín je nedostatočný, môže byť tento doplnok ideálnym riešením. Navyše, bielkoviny podporujú chudnutie – zvyšujú pocit sýtosti, pomáhajú spaľovať tuky a zároveň chránia svalovú hmotu pri redukčnej diéte. Odporúčané dávkovanie GymSupps XWhey Protein:\r\nRozmiešajte jednu odmerku (30 gramov) v 200–300 ml vody a skonzumujte. Užívajte 1–3× denne na doplnenie bielkovín.', 26.99, 20, ' ', ' ', '2025-04-22 07:57:44', '0000-00-00 00:00:00', 'img/produkty/GymSupps XWhey Protein.webp', ' ', 'X-Whey Protein od GymSupps je viaczložkový srvátkový proteín s izolátom značky Volactive®.'),
(33, 'Scitec 100% Whey Protein Professional - Biela čokoláda', 'Scitec', 'Whey Protein Professional od spoločnosti Scitec Nutrition má hodnotenie dlhodobo najlepšie chutného proteínu na našom trhu, navyše vďaka svojmu zloženiu patrí tiež k špičke. Obsahuje vysoký podiel kvalitných srvátkových bielkovín získaných ultra-mikrofiltračným procesom. Navyše obsahuje tráviace enzýmy papaín (extrahovaný z papáje) a bromelaín (z ananásovníka). Proteínová zložka Whey Protein Professional obsahuje cca 23% aminokyselín BCAA (5 g v každej dávke) a 18% L-\r\nglutamínu (4 g v dávke). Suplement je skvelou voľbou ako pre všetkých športovcov usilujúcich o nárast svalovej hmoty, tak aj ako veľmi kvalitná náhrada jedla do redukčných diét.\r\n\r\n100% Whey Protein Professional je srvátkový proteín s veľmi vysokou využiteľnosťou ľudským organizmom. Obsah esenciálnych aminokyselín a taktiež obsah anabolicky pôsobiacich aminokyselín s viazaným reťazcom je veľmi vysoký (až 47,5%). V záujme zabránenia katabolickým procesom je obohatený tiež množstvom glutamínu. 100% Whey Protein Professional obsahuje približne 10% imunoglobulínových mikrofrakcií, naopak neobsahuje žiadny aspartam. Veľmi dôležitou súčasťou je\r\nkomplex tráviacich enzýmov Aminogen (bromelaín extrahovaný z ananásovníku chocholatého - 1200 GDU / g a papaín extrahovaný z papáje - 1,5 FIP U / mg).\r\n\r\nProteín je určený všetkým užívateľom, ktorí sa usilujú o nárast svalovej hmoty a sily. Veľmi často je ale používaný aj v redukčných diétach ako náhrada jedla, popr. ako prímes k iným potravinám (do tvarohu)\r\n\r\nV bodoch:\r\n\r\nzmes srvátkového koncentrátu a srvátkového izolátu\r\nprispieva k zvyšovaniu a udržiavanie svalovej hmoty\r\ns obsahom všetkých 9 esenciálnych aminokyselín\r\nso zmesou tráviacich enzýmov\r\nOdporúčané dávkovanie:\r\n\r\nrozmixujte 3/4 odmerky (30 g) 100% Whey Protein Professional v 250 ml vody alebo mlieka\r\nužívajte najlepšie po tréningu (ale aj napr. ráno po prebudení či v priebehu dňa medzi jedlami)', 27.53, 10, ' ', ' ', '2025-04-22 07:59:51', '2025-04-22 08:01:48', 'img/produkty/Scitec protein.png', ' ', '100% Whey Protein Professional je syrovátkový produkt s obsahom 77% bielkovín s nízkym obsahom tukov a laktózy.\r\n\r\n'),
(34, 'Performance Protein, natívny srvátkový proteín, slaný karamel', 'Performance Protein', 'Upgradovali sme už tak dobrý Performance proteín zmenou bežného kolagénu na Grass-fed kolagén a celkovo vyladili chuť a rozpustnosť k dokonalosti. Úplne prelomová kombinácia vysoko kvalitného   natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom. Namiesto kokosového oleja sme použili kokosové mlieko, ktoré sa ľahšie rozpúšťa, a vďaka ktorému má proteín krémovejšiu konzistenciu. Úplne   prelomová kombinácia vysoko kvalitného natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom a kokosovým olejom. Svojím zložením a čistotou je úplným unikátom. Môžete si byť istí, že kombinácia látok v jednom produkte v takej kvalite neexistuje. Nie je určený iba na jednoduché doplnenie kvalitného zdroja bielkovín.   Performance Protein je komplexným riešením pre regeneráciu, črevo a imunitu. Aj napriek tomu, že je   dochutený iba prírodným sladidlom stévií, vyniká skvelou chuťou i vôňou. Navyše neobsahuje žiadne balastné látky, ani lepok.', 23.90, 15, ' ', ' ', '2025-04-22 08:04:44', '0000-00-00 00:00:00', 'img/produkty/Performance protein.webp', ' ', 'Performance Protein – Prémiová sila pre tvoje telo.\r\nPrelomová kombinácia natívneho srvátkového proteínu, Grass-fed kolagénu typu I a III, kolostra a kokosového mlieka. Bez lepku, bez balastu, so stéviou a skvelou chuťou. Podpora regenerácie, imunity a zdravého čreva v jednom čisto prírodnom produkte.\r\n\r\n'),
(35, 'ADIDAS ORIGINALS Tričko \'Adicolor Classics\' vo farbe Biela', 'ADIDAS ORIGINALS ', 'Produkt obsahuje: 100% organické materiály\r\nVyrobené z:Bavlna (ekologicky pestovaná)\r\nDôkaz:Vyhlásenie dodávateľa o prevedení nezávislej kontroly\r\nTento produkt obsahuje organické materiály, ktorých pestovanie sa zameriava na zachovanie zdravia pôdy a ekosystémov prostredníctvom ekologického poľnohospodárstva tým, že sa vyhýba genetickej modifikácii, a obmedzuje sa používanie vody a chemických hnojív.', 33.00, 20, 'XL', 'Biela', '2025-04-24 17:55:22', '2025-04-24 17:56:11', 'img/produkty/680a7b0ae25073.31247364.webp', ' ', 'Veľkosť & strih\r\nDĺžka rukávu: Štvrtinový rukáv\r\nDĺžka: Normálna dĺžka\r\nStrih: Štandardný fit\r\nPotlač loga\r\nDžersej\r\nOkrúhly výstrih\r\nZošívaný lem\r\nŠvy tón v tóne\r\nMäkký omak'),
(36, 'Nike Sportswear Mikina \'CLUB\' vo farbe Čierna', 'Nike', 'Objav pohodlie, ktoré si zamiluješ, a štýl, ktorý vynikne – s touto mikinou od značky Nike. Vyrobená z kvalitného a príjemného materiálu, ktorý ti poskytne teplo počas chladnejších dní, a zároveň umožní pokožke dýchať.\r\n\r\nModerný strih a minimalistický dizajn s ikonickým logom Nike robia z tejto mikiny ideálny kúsok do každodenného šatníka. Či už ju skombinuješ s džínsami, teplákmi alebo legínami, vždy budeš pôsobiť uvoľnene a štýlovo.\r\n\r\n✔️ Materiál: 80 % bavlna, 20 % polyester\r\n✔️ Strih: Regular Fit\r\n✔️ Kapucňa: Áno, so šnúrkami\r\n✔️ Vrecká: Kengurie vrecko vpredu\r\n✔️ Logo: Výrazné logo Nike na hrudi\r\n\r\nIdeálna na voľný čas, tréning aj každodenné nosenie. Buď v pohybe so štýlom – buď Nike.', 64.90, 12, 'L', 'Čierna', '2025-04-24 17:59:44', '0000-00-00 00:00:00', 'img/produkty/680a7c10962fa5.79633477.webp', ' ', 'Štýlová a pohodlná mikina Nike pre každý deň – ideálna voľba do mesta aj na tréning.'),
(38, 'GymSupps BCAA 4:1:1 Instant - 500g', 'GymSupps ', 'Ak hľadáš spôsob, ako podporiť svoj tréning a zlepšiť regeneráciu, musíš vyskúšať naše GymSupps BCAA 4:1:1 instant! Je to skvelý spoločník do fitka, ktorý ti pomôže dosiahnuť tvoje ciele rýchlejšie a efektívnejšie. Táto BCAA (aminokyseliny s rozvetveným reťazcom) sa skladá z leucínu, izoleucínu a valínu v skvelom pomere 4:1:1, čo znamená, že dostaneš väčšiu porciu leucínu, ktorý je kľúčový pre budovanie svalov a podporu regenerácie.\r\nPrečo pomer 4:1:1?\r\nPomer 4:1:1 ponúka vyššiu dávku leucínu v porovnaní s tradičnejším pomerom 2:1:1. Leucín je kľúčový pre spustenie syntézy svalových bielkovín, čo je zásadné pre rast svalov a regeneráciu po tréningu. S týmto pomerom získaš maximálny benefit z každej dávky BCAA, čo ti pomôže dosiahnuť lepšie výsledky rýchlejšie.\r\nKedy začať uvažovať nad užívaním BCAA ?\r\nBCAA sú skvelou voľbou, pokiaľ sa snažíš zlepšiť svoju výkonnosť a regeneráciu. Pokiaľ trénuješ intenzívne, zažívaš únavu alebo chceš zlepšiť svalovú regeneráciu a ochrániť svaly pred rozpadáním, BCAA sú pre teba to pravé. Sú ideálne ako pre začiatočníkov, tak pre pokročilých športovcov, ktorí chcú posunúť svoje výsledky na ďalšiu úroveň.', 17.45, 10, ' ', ' ', '2025-04-24 18:08:17', '0000-00-00 00:00:00', 'img/produkty/680a7e1113e236.81883601.png', ' ', 'BCAA 4:1:1 Instant od GymSupps ponúka skvelý pomer leucínu, rýchlu regeneráciu a lahodné príchute pre optimálny rast svalov.'),
(39, 'Trhačky Cotton Gel S4 Black - RDX Sports', 'RDX Sports', 'Trhačky Cotton Gel S4 - praktické tréningové pomôcky pre pevnejší úchop činky, ktoré môžu pomôcť zdvihnúť väčšiu váhu\r\nTrhačky Cotton Gel S4 sú praktické tréningové pomôcky na podporu úchopu pri silovom cvičení. Jednoducho si ich upevníte na zápästie a vďaka dĺžke 60 cm a šírke 4 cm potom pevne omotáte okolo činky. Znížite tak napätie v predlaktí a prstoch pri ťahových cvikoch, ako je mŕtvy ťah. Pri zdvíhaní ťažkých váh vás tak nebude toľko limitovať sila úchopu a zvládnete napríklad aj vyššiu záťaž a viac opakovaní.\r\n\r\nTieto trhačky sú vyrobené z odolnej bavlny a majú protišmykový povrch pre stabilnejšie držanie na činke. O vaše pohodlie sa navyše postará neoprénové polstrovanie v oblasti zápästia. Využijú ich najmä kulturisti, vzpierači, powerlifteri, crossfiťáci a ostatní športovci, ktorí hľadajú rôzne možnosti, ako posilniť úchop.\r\n\r\nTrhačky Cotton Gel S4 a ich výhody\r\nsú tréningové pomôcky pre podporu úchopu\r\nslúžia na zníženie napätia v predlaktí a prstoch\r\nmajú dĺžku 60 cm a šírku 4 cm\r\nsú vyrobené z odolnej bavlny\r\nmajú protišmykový povrch\r\njednoducho sa používajú\r\nhodia sa na mŕtvy ťah a ďalšie ťahové cviky\r\nideálne pre kulturistov, vzpieračov a powerlifterov \r\n \r\nMateriál\r\nBavlna, neoprénové polstrovanie, silikón.', 17.50, 10, ' ', ' ', '2025-04-24 18:13:52', '0000-00-00 00:00:00', 'img/produkty/680a7f60657447.37550074.webp', ' ', 'Trhačky Cotton Gel S4 slúžia na lepší úchop osi na tréningu. Majú dĺžku 60 cm a šírku 4 cm, vďaka čomu ich pevne omotáte okolo činky. Odľahčíte tak predlaktia pri ťahových cvikoch, ako je napríklad mŕtvy ťah. Trhačky vám pomôžu zdvihnúť väčšiu váhu a zvládnuť viac opakovaní. Pri tréningu ich bežne používajú najmä kulturisti, vzpierači a powerlifteri.'),
(40, 'Batoh Stellar Black - STRIX', 'STRIX', 'Backpack Stellar - funkčný ruksak s ultra-moderným dizajnom a vodeodolnou ochranou v podobe plášťa, ktorý udrží vaše veci suché aj počas dažďa či snehu\r\nBackpack Stellar je prvotriedny ruksak, ktorý ocení každý, kto hľadá nekompromisné riešenie na cesty, do práce, školy či fitka. Pýši sa ultra-moderným nadčasovým dizajnom, ktorý zdobia rôzne vychytené nápisy a logá prémiovej značky STRIX, čo mu pridáva na jedinečnosti. Poteší tiež aj veľkorysým úložným priestorom a samostatným vreckom na 16\" laptop. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na spoľahlivú ochranu vašich vecí pred dažďom a snehom. Backpack Stellar vás tak podrží za každého počasia a uschová vaše cennosti v suchu. Navyše sa môže pochváliť vetraním v spodnej časti, čo sa hodí najmä v prípade, že si v ňom nesiete veci z fitka.\r\nVnútro chránia bezpečné zipsy a povrch pokrýva bohatá ponuka vreciek a kapsičiek rôznych veľkostí. Navyše je ľahký a veľmi pohodlný na nosenie. Vďačí za to nastaviteľným popruhom, ale aj dokonalému anatomickému tvarovaniu s vystuženým chrbtom. Svoj podiel na komforte počas nosenia má aj sieťovaná vnútorná časť, ktorá sa postará o spoľahlivú ventiláciu chrbta. Backpack Stellar je tiež vybavený popruhmi na nosenie karimatky, čo sa hodí, keď sa chystáte spať v prírode alebo na lekciu jogy. Ide teda ultimátny batoh, ktorý by nemal chýbať vo výbave každého nomáda. Určite ho však využijú aj študenti, ktorí potrebujú priestor na skriptá, športovci chytajúci sa do fitka, manažéri či fanúšikovia turistiky. Zaraďte sa medzi elitu okolo značky STRIX a prejavte naplno svoju lásku k aktívnemu životnému štýlu.\r\nBackpack Stellar a jeho výhody \r\nje prvotriedny ruksak s ultra-moderným nadčasovým dizajnom \r\nhodí sa na cesty, do školy, práce či fitka\r\nmá objem 16,8 l\r\nmá vetranie v spodnej časti  \r\nmá veľkorysý úložný priestor s bohatou ponukou vreciek a kapsičiek \r\nje vyrobený z polyesteru, ktorý sa pýśi vysokou odolnosťou a dlhou životnosťou \r\nmá samostatné vrecko na 16\" laptop\r\nmá vodeodolný obal, ktorý ochráni vaše veci pred dažďom a snehom \r\nje veľmi ľahký a pohodlne sa nosí\r\nmá popruhy na karimatku \r\nmá dokonalé anatomické tvarovanie s vystuženým chrbtom \r\nmá nastaviteľné popruhy\r\nmá sieťovanú vnútornú časť, ktorá zabezpečí ventiláciu chrbta \r\n\r\nMateriál\r\nPolyester\r\n\r\n ', 45.95, 12, ' ', ' ', '2025-04-24 18:16:14', '0000-00-00 00:00:00', 'img/produkty/680a7feec18310.98440342.jpg', ' ', 'Backpack Stellar je ultimátny ruksak pre každého, kto hľadá nekompromisné riešenie na cesty, do práce, školy či do fitka. Poteší veľkorysým úložným priestorom s vreckom na 16\" laptop a ultra-moderným nadčasovým dizajnom. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na ochranu pred dažďom a snehom.');

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
(1, 'img/proteiny.jpg', ''),
(2, 'img/test.jpg', '');

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
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `uzivatelia`
--

INSERT INTO `uzivatelia` (`iduzivatelia`, `email`, `heslo`, `meno`, `priezvisko`, `datum_narodenia`, `rola`, `datum_vytvorenia`, `datum_upravy`) VALUES
(5, 'admin@outlook.sk', '$2y$10$mBWMr4yuRW0Kv7BoRQz0Nu0cpmZESxKgJ.2bNrIeAdrKjYO5KFzue', 'Adam', 'Nový', '2005-07-16', 0, '2025-04-16 17:36:47', '2025-04-24 17:41:59'),
(6, 'a@a', '$2y$10$zWZVka6KUt9Amv93389.LuvVLGnSX9YhOcRNEq1bMsKOXg5uaXGJ.', 'Adam', 'Starý', '2002-06-05', 1, '2025-04-19 07:51:18', '2025-04-19 07:51:18'),
(10, 'sadasdsadsaad@a', '$2y$10$oK9HaEGGnq2bsUohGJI0YuJ5h3sXwyoLrTxXCruqQBwZtSHVdPkYW', 'Patrik', 'Nový', '2025-04-27', 1, '2025-04-19 08:08:18', '2025-04-19 08:08:18');

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
  ADD KEY `fk_objednavky_uzivatelia1_idx` (`uzivatelia_iduzivatelia`),
  ADD KEY `fk_objednavky_doprava1_idx` (`doprava_iddoprava`),
  ADD KEY `fk_objednavky_platba1_idx` (`platba_idplatba`),
  ADD KEY `fk_objednavky_produkty1_idx` (`produkty_idprodukty`);

--
-- Indexy pre tabuľku `platba`
--
ALTER TABLE `platba`
  ADD PRIMARY KEY (`idplatba`);

--
-- Indexy pre tabuľku `polozky_objednavky`
--
ALTER TABLE `polozky_objednavky`
  ADD PRIMARY KEY (`idpolozky_objednavky`),
  ADD KEY `fk_polozky_objednavky_objednavky1_idx` (`objednavky_idobjednavky`);

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
  ADD PRIMARY KEY (`iduzivatelia`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `adresa`
--
ALTER TABLE `adresa`
  MODIFY `idadresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `akordeon`
--
ALTER TABLE `akordeon`
  MODIFY `idakordeon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pre tabuľku `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `blog_kategorie`
--
ALTER TABLE `blog_kategorie`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `doprava`
--
ALTER TABLE `doprava`
  MODIFY `iddoprava` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `footer_ikony`
--
ALTER TABLE `footer_ikony`
  MODIFY `idfooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `idobjednavky` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `platba`
--
ALTER TABLE `platba`
  MODIFY `idplatba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `polozky_objednavky`
--
ALTER TABLE `polozky_objednavky`
  MODIFY `idpolozky_objednavky` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idprodukty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pre tabuľku `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `idslideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  MODIFY `iduzivatelia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `fk_objednavky_doprava1` FOREIGN KEY (`doprava_iddoprava`) REFERENCES `doprava` (`iddoprava`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_objednavky_platba1` FOREIGN KEY (`platba_idplatba`) REFERENCES `platba` (`idplatba`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_objednavky_produkty1` FOREIGN KEY (`produkty_idprodukty`) REFERENCES `produkty` (`idprodukty`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_objednavky_uzivatelia1` FOREIGN KEY (`uzivatelia_iduzivatelia`) REFERENCES `uzivatelia` (`iduzivatelia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Obmedzenie pre tabuľku `polozky_objednavky`
--
ALTER TABLE `polozky_objednavky`
  ADD CONSTRAINT `fk_polozky_objednavky_objednavky1` FOREIGN KEY (`objednavky_idobjednavky`) REFERENCES `objednavky` (`idobjednavky`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
