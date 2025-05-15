-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 15.Máj 2025, 19:28
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
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `nazov_firmy` varchar(150) DEFAULT NULL,
  `ico` int(11) DEFAULT NULL,
  `dic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `adresa`
--

INSERT INTO `adresa` (`idadresa`, `mesto`, `ulica`, `psc`, `datum_vytvorenia`, `nazov_firmy`, `ico`, `dic`) VALUES
(1, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:07:04', NULL, NULL, NULL),
(2, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:09:18', NULL, NULL, NULL),
(3, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:13:14', NULL, NULL, NULL),
(4, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:15:34', NULL, NULL, NULL),
(5, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:16:19', NULL, NULL, NULL),
(6, 'Vráble', 'Hlavná', '987654', '2025-04-29 16:42:09', NULL, NULL, NULL),
(7, 'Vráble', 'Hlavná', '987654', '2025-04-30 06:52:53', NULL, NULL, NULL),
(8, 'Vráble', 'Hlavná', '987654', '2025-04-30 08:38:38', NULL, NULL, NULL),
(9, 'Vráble', 'Hlavná', '987654', '2025-04-30 10:33:06', NULL, NULL, NULL),
(10, 'Vráble', 'Hlavná', '987654', '2025-04-30 19:05:02', NULL, NULL, NULL),
(11, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:28:40', NULL, NULL, NULL),
(12, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:47:49', NULL, NULL, NULL),
(13, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:48:27', NULL, NULL, NULL),
(14, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:49:08', NULL, NULL, NULL),
(15, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:50:07', NULL, NULL, NULL),
(16, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:51:14', NULL, NULL, NULL),
(17, 'Vráble', 'Hlavná', '987654', '2025-05-02 15:56:24', NULL, NULL, NULL),
(18, 'Vráble', 'Hlavná', '987654', '2025-05-02 17:05:10', NULL, NULL, NULL),
(19, 'Vráble', 'Hlavná', '987654', '2025-05-03 13:53:02', NULL, NULL, NULL),
(20, 'Vráble', 'Hlavná', '987654', '2025-05-03 13:53:58', NULL, NULL, NULL),
(21, 'Vráble', 'Hlavná', '987654', '2025-05-03 14:37:05', NULL, NULL, NULL),
(22, 'Vráble', 'Hlavná', '95182', '2025-05-10 16:37:55', 'sdasdas', 12345678, 'SK1023456789'),
(23, 'Vráble', 'Hlavná', '95182', '2025-05-11 14:34:35', NULL, NULL, NULL),
(24, 'Vráble', 'Hlavná', '95182', '2025-05-14 19:21:44', NULL, NULL, NULL),
(25, 'Vráble', 'Hlavná', '95182', '2025-05-14 19:22:39', NULL, NULL, NULL),
(26, 'Vráble', 'Hlavná', '95182', '2025-05-14 19:34:25', 'sdasdas', 12345678, 'SK1023456789');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `akordeon`
--

CREATE TABLE `akordeon` (
  `idakordeon` int(11) NOT NULL,
  `otazka` varchar(255) NOT NULL,
  `odpoved` text NOT NULL,
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `akordeon`
--

INSERT INTO `akordeon` (`idakordeon`, `otazka`, `odpoved`, `datum_vytvorenia`, `datum_upravy`) VALUES
(19, ' Ako dlho trvá doručenie objednávky?', 'Všetky objednávky odosielame do 24 hodín počas pracovných dní. Doručenie trvá zvyčajne 1–3 pracovné dni v rámci Slovenska a 2–5 dní.', '2025-05-04 18:02:55', '2025-05-04 16:02:55'),
(20, 'Je možné vrátiť tovar, ak mi nesedí veľkosť?', 'Áno, máte 14 dní na vrátenie alebo výmenu tovaru. Tovar musí byť nepoužitý a v pôvodnom balení.', '2025-05-15 19:04:45', '2025-05-15 17:04:45'),
(21, 'Predávate produkty aj pre začiatočníkov?', 'Áno, máme široký výber produktov pre začiatočníkov – od základných proteínov až po jednoduché cvičebné pomôcky.', '2025-05-15 19:05:03', '2025-05-15 17:05:03'),
(22, 'Môžem kombinovať viacero výživových doplnkov naraz?', 'Väčšina doplnkov sa dá bezpečne kombinovať, ale odporúčame konzultovať to s odborníkom alebo si prečítať naše odporúčania pri produkte.', '2025-05-15 19:05:17', '2025-05-15 17:05:17'),
(23, 'Kde sú vaše produkty vyrobené?', 'Spolupracujeme s overenými európskymi aj slovenskými výrobcami, ktorí spĺňajú prísne normy kvality.', '2025-05-15 19:05:37', '2025-05-15 17:05:37'),
(24, 'Ako zistím, či je produkt na sklade?', 'Dostupnosť je vždy uvedená pri produkte. Ak je skladom, odošleme ho ihneď.', '2025-05-15 19:05:55', '2025-05-15 17:05:55'),
(25, 'Môžem zrušiť alebo upraviť objednávku po jej odoslaní?', 'Ak nás kontaktujete čo najskôr po vytvorení objednávky, vieme ju upraviť alebo zrušiť ešte pred odoslaním. Po expedícii už zmeny nie sú možné.', '2025-05-15 19:06:33', '2025-05-15 17:06:33'),
(26, ' Aký je rozdiel medzi srvátkovým a rastlinným proteínom?', 'Srvátkový proteín pochádza z mlieka a je rýchlo vstrebateľný – ideálny po tréningu. Rastlinný proteín je vhodný pre vegánov a osoby s intoleranciou na laktózu.', '2025-05-15 19:06:49', '2025-05-15 17:06:49'),
(27, 'Môžem nakupovať aj bez registrácie?', 'Áno, nákup môžete dokončiť aj ako hosť. Registráciou však získate výhodu sledovania objednávok.', '2025-05-15 19:07:23', '2025-05-15 17:07:23');

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
  `id_kategorie` int(11) DEFAULT NULL,
  `id_uzivatel` int(11) NOT NULL,
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `blog`
--

INSERT INTO `blog` (`idblog`, `nazov`, `popis`, `img_blog`, `img_alt`, `id_kategorie`, `id_uzivatel`, `datum_vytvorenia`, `datum_upravy`) VALUES
(2, 'Čo je zdravá strava a ako sa naučiť jesť zdravo?', 'Ľudia si čím ďalej, tým viac uvedomujú dôležitosť zdravého stravovania, ktoré by malo byť pevnou súčasťou každodenného života nás všetkých. Čo to ale zdravé stravovanie vlastne znamená? Nebojte sa nič, nie je to brokolica na pare s vareným kuracím mäsom ani šalát so šalátom trikrát denne, ako by sa na prvý pohľad mohlo zdať. Nemusíte ani hneď bežať do kníhkupectva po najnovšiu prevratnú knižku o zdravom stravovaní a začať vyraďovať pečivo, mliečne výrobky alebo sa vyhýbať lepku ako čert krížu. Možno budete dokonca prekvapení, ako môže tá zdravá strava vyzerať.\r\n\r\nO zdravej strave, žiaľ, stále koluje množstvo zbytočných mýtov a presvedčení, ktoré robia problematiku stravovania ďaleko zložitejšiu, ako je potrebné. Spomeňte si, čo všetko ste o zdravom stravovaní počuli. Raz je za vinníka celosvetovej obezity označovaný lepok, potom sú to tuky alebo cukor a podľa dokumentov na Netflixe sa zase môže zdať, že by sme sa všetci mali stať vegánmi. Kvôli takej informačnej džungli niet divu, že ľudia často v pokusoch o zdravšie stravovanie zlyhávajú alebo s tým radšej ani nezačínajú, pretože je im proti srsti myšlienka, že by museli jesť napríklad len určitý druh potravín. Ono je to ale všetko o dosť jednoduchšie, to si len my sami veci zbytočne komplikujeme.\r\nAko vidíte, zdravá strava a zdravšie stravovacie návyky vám môžu priniesť rad výhod. Najdôležitejšia je podpora celkového zdravia, ktoré máme všetci len jedno. Často sa oň však začneme starať, až keď sa objaví nejaký zdravotný problém, čo už je trochu neskoro. Je lepšie predsa problémom predchádzať, ako ich potom „hasiť“.  \r\n\r\nAko sa dá definovať zdravé stravovanie? \r\nPodľa slovníka Cambridge University je zdravé jedlo také, o ktorom sa verí, že je dobré pre ľudské zdravie, pretože neobsahuje umelé chemikálie ani príliš veľa cukru alebo tuku. Keby ste si preštudovali, čo o zdravom stravovaní hovorí WHO, našli by ste aj nejaké číselné vyjadrenie toho, ako by zdravá strava (ne)mala vyzerať. Nebudeme to zatiaľ zbytočne komplikovať a pozrieme sa na to, ako by sme mohli definovať zdravé stravovanie ďaleko jednoduchšie a výstižnejšie.\r\n', 'img/blog/6810ffe5d40103.15293080.jpg', '', 1, 5, '2025-04-28 20:56:34', '2025-04-29 18:35:49'),
(3, '10 najlepších komplexných cvikov na rast svalov, sily a chudnutie', 'Komplexné cviky nie sú skvelou voľbou len v prípade, keď nemáme dostatok času na tréning každej partie zvlášť. Majú tiež množstvo ďalších benefitov, ktoré presvedčia každého, že by ich rozhodne mal zaradiť do tréningového plánu. Dnešný článok však nie je len o výhodách komplexných cvikov, ale rovno ponúka výber tých najlepších so správnou technikou a príkladom 2 vzorových tréningov.\r\n\r\nČo sú komplexné cviky?\r\nKomplexné alebo viackĺbové cviky spoznáte tak, že sa pri nich zapája viacero svalových skupín naraz. Ich opakom sú izolované cviky, ktoré sú zacielené na jednu svalovú partiu. Typickým príkladom komplexného cviku je drep, ktorý zaťaží svaly zadku, stehien, lýtok a preverí aj stred tela. Izolovaný cvik je napríklad bicepsový zdvih, ktorý zaťažuje najmä dvojhlavý ramenný sval. To sa hodí v prípade, že sa chceme zamerať na jednu časť tela, napríklad v rámci kulturistického tréningového splitu. Komplexné cviky ale majú aj množstvo výhod z hľadiska rastu svalov, sily alebo chudnutia. 5 benefitov komplexných cvikov\r\n1. Posilňujete viacero partií naraz\r\nKomplexné cviky, ako sú drepy, mŕtve ťahy či bench press vyžadujú koordinovanú činnosť niekoľkých svalových skupín a kĺbov naraz. Napríklad pri drepe sa primárne zapájajú kvadricepsy (predná strana stehien), hamstringy (zadná strana stehien), svaly zadku a svaly dolnej časti chrbta. Sekundárne sú aktivované lýtkové svaly a svaly stredu tela (core), ktoré zaisťujú stabilizáciu chrbtice počas pohybu. Táto simultánna aktivácia umožňuje efektívnejší tréning, pretože precvičujete viacero svalových skupín v rámci jedného cviku, čo zvyšuje celkovú efektivitu cvičenia.  \r\n\r\nKomplexné cviky sa tak ideálne hodia do tréningu celého tela. Zároveň vám ušetria čas, pretože keby ste mali každej partii venovať 2 – 3 cviky či viac, strávili by ste vo fitku aj niekoľko hodín. Vďaka komplexným cvikom máte do hodiny hotovo. Oveľa efektívnejšie tak využijete čas na tréning.\r\n2. Budujete silu\r\nKomplexné cviky sú kľúčové na budovanie celkovej sily. Vďaka tomu, že sa pri nich zapájajú veľké svalové skupiny, zvládnete zdvihnúť aj ťažšie váhy. To vedie k vyššiemu mechanickému napätiu na svaly, čo je jeden z hlavných impulzov pre rast sily. Na to je zároveň dôležité cvičiť s vysokými váhami, robiť nízky počet opakovaní a medzi sériami vkladať dlhšie pauzy. Ak je teda vaším hlavným cieľom rast sily, rozhodne by komplexné cviky nemali chýbať vo vašom tréningovom pláne do posilňovne.\r\n3. Podporujete rast svalov\r\nKomplexné cviky vynikajú vysokou intenzitou a zapojením veľkých svalových skupín. Keď si k tomu vezmeme dostatočnú záťaž a urobíme s ňou dostatočný počet opakovaní a sérií, svaly ľahko vyčerpáme. Výsledkom je metabolický stres, na ktorý telo reaguje spustením anabolických procesov, teda mechanizmov, ktoré vedú k rastu svalovej hmoty (hypertrofia).\r\n\r\nKomplexné cviky môžu dokonca viesť k dočasnému zvýšeniu hladín anabolických hormónov, ako je testosterón a rastový hormón. Z dlhodobého hľadiska však nie je podľa štúdií jasné, aký významný vplyv má toto krátkodobé zvýšenie na hypertrofiu. [3]\r\n\r\nVďaka komplexným cvikom v tréningovom pláne tak môžete docieliť efektívnejší nárast svalovej hmoty. Na dosiahnutie optimálnych výsledkov je však nevyhnutné ich v tréningovom pláne kombinovať aj s izolovanými cvikmi. K tomu pridať aj adekvátnu regeneráciu (medzi tréningami rovnakej svalovej skupiny mať rozstup minimálne 24 hodín), dostatočný spánok a vyváženú stravu bohatú na bielkoviny a ďalšie esenciálne živiny. \r\nĎalšou výhodou toho, že komplexné cviky zaťažujú tie najväčšie svalové skupiny, je veľké množstvo spálených kalórií. To vám uľahčí nielen udržiavanie aktuálnej hmotnosti, ale aj chudnutie.\r\n\r\nZa 45 minút tréningu s komplexnými cvikmi spáli 65 kg žena približne 250 kcal a 80 kg muž 300 kcal.\r\nMnožstvo spálených kalórií sa však vždy odvíja od zvolenej záťaže, intenzity, dĺžky páuz a ďalších faktorov.\r\nA čo je ešte lepšia správa? Po ukončení tréningu dochádza k fenoménu známemu ako EPOC (Excess Post-exercise Oxygen Consumption), teda k zvýšenej spotrebe kyslíka po cvičení. To znamená, že telo spaľuje viac kalórií aj v pokojovom stave. Zrýchlený metabolizmus tak budete mať ešte niekoľko hodín po cvičení.\r\n. Zlepšujete koordináciu tela\r\nKomplexné cviky sú často náročné na vykonanie. Vyžadujú koordináciu celého tela a u väčšiny cvikov je nutné aj zapojenie svalov stredu tela (CORE). Týmto spôsobom sa posilňujú hlboké stabilizačné svaly (HSS), čo vedie k zlepšeniu celkovej stability a držania tela. To má následne pozitívny dopad nielen na športový výkon, ale aj na zvládanie každodenných aktivít, ako je zdvíhanie predmetov zo zeme. Budete celkovo stabilnejší, čím sa znižuje riziko pádov.\r\n\r\nV prípade, že sa chcete zamerať na zlepšenie koordinácie tela, vyskúšajte aj 10 najlepších cvikov s balančnou podložkou na zlepšenie rovnováhy, posilnenie chrbta a celého tela.\r\n\r\n Bench press\r\nVýchodisková poloha: Ľahnite si na chrbát na vodorovnú lavicu. Lopatky držte pri sebe a činku uchopte nadhmatom. Držte rovné zápästia a lakte priamo pod osou. Šírka úchopu je o niečo väčšia ako šírka vašich ramien. Chodidlá sú celou plochou položené na zemi a kolená zvierajú uhol približne 90 stupňov. Počas cviku je možné mierne prehnutie v bedrovej oblasti. Ramená a zadok zostávajú celou plochou na podložke. Stred tela a svaly zadku sú počas cvičenia aktívne.\r\nPostup: Zdvihnite činku do východiskovej polohy nad hrudník. Potom ju s nádychom pomaly spúšťajte na hrudník. V spodnej fáze sa os jemne dotkne hrude, zhruba v strede hrudnej kosti. V tejto fáze paže s telom zvierajú uhol 45 – 60 stupňov. Potom s výdychom pomocou kontrakcie prsných svalov zatlačte do činky smerom nahor až do takej výšky, keď máte takmer narovnané lakte. Dráha osi v smere nahor by mala opisovať mierny oblúk. Po návrate do východiskovej polohy nadviažte ďalším opakovaním.\r\nČasté chyby: Tlačenie lakťov k telu, nekontrolovaný pohyb, nevhodne zvolená záťaž, nadmerné prehýbanie sa v chrbte, nedostatočná aktivácia stredu tela a zadku, malý rozsah pohybu.\r\nZapojené svaly: Primárne prsné svaly, tricepsy a predná časť ramien. Sekundárne aj svaly predlaktia, medzilopatkové svaly a stabilizačné svaly trupu.\r\n\r\n Bench press s užším alebo širším úchopom\r\nVďaka úprave šírky úchopu tiež mierne zmeníte aktiváciu svalov. Pri verzii na úzko viac precvičíte tricepsy a v prípade širšieho variantu s rukami ďalej od seba zase intenzívnejšie zapojíte prsné svaly.\r\n. Striktné tlaky s osou nad hlavu (Barbell Strict Press)\r\nVýchodisková poloha: Postavte sa s chodidlami na šírku vašich bokov a uchopte os nadhmatom obomi rukami. Narovnajte sa a mierne pokrčte kolená. Zdvihnite os až pod bradu, tesne pred hornú časť hrudníka. Zápästia držte rovno, ramená stiahnite smerom od uší a lopatky fixujte k sebe.\r\nPostup: S výdychom kontrolovaným pohybom vzpažte. Potom s nádychom plynule vráťte tyč do východiskovej polohy a nadviažte ďalším opakovaním.\r\nČasté chyby: Zdvihnuté ramená, ohnuté zápästia, nekontrolovaný (trhavý) pohyb, nevhodná záťaž, nadmerné zakláňanie sa.\r\nZapojené svaly: Primárne ramenné svaly (deltové svaly), tricepsy a horná časť prsných svalov. Sekundárne horné trapézy, stred tela (core), stabilizačné svaly trupu a dolná časť chrbta.\r\n\r\nPríťahy s osou v predklone nadhmatom (Overhand Grip Barbell Bent Over Row)\r\nVýchodisková poloha: Postavte sa s chodidlami na šírku vašich bokov a mierne pokrčte kolená. Mierne sa predkloňte s tým, že chrbát zostáva v prirodzenom zakrivení, ramená stiahnuté smerom od uší a hlava v predĺžení chrbtice. Uchopte činku nadhmatom na šírku vašich ramien a zdvihnite ju do výšky ku kolenám.\r\nPostup: S výdychom pomocou kontrakcie svalov chrbta pritiahnite činku k bokom. Potom ju kontrolovane vráťte ku kolenám a nadviažte ďalším opakovaním.\r\nČasté chyby: Zaguľacovanie chrbta, narovnanie kolien, nedostatočný predklon trupu, nedostatočný rozsah pohybu.\r\nZapojené svaly: Primárne trapézy, chrbtové svaly, paže a predlaktia. Sekundárne aj zadok a zadná strana stehien (hamstringy).\r\n\r\nRolovanie do sedu s jednoručkou (Dumbbell Roll-Ups)\r\nVýchodisková poloha: Položte sa na chrbát s natiahnutými nohami. Do jednej ruky chyťte jednoručku a predpažte. Druhú pažu nechajte natiahnutú voľne pozdĺž tela.\r\nPostup: S výdychom sa pomocou aktivácie brušných svalov plynule zdvihnite s natiahnutými pažami až do sedu bez pokrčenia dolných končatín. Rukou, v ktorej držíte jednoručku, plynule prejdite do vzpaženia. Potom sa s nádychom kontrolovane vráťte do východiskovej polohy a cvik zopakujte. Po celej sérii vymeňte ruky.\r\nČasté chyby: Malý rozsah pohybu, nekontrolovaný pohyb, prehýbanie sa v chrbte.\r\nZapojené svaly: Primárne brušný sval, ramenné svaly. Sekundárne šikmé brušné svaly, flexory bedier, vzpriamovače chrbtice a stabilizačné svaly trupu.\r\n\r\n. Ruský kettlebell swing (Russian Kettlebell Swing)\r\nVýchodisková poloha: Postavte sa s chodidlami približne na šírku vašich ramien. Kettlebell uchopte obomi natiahnutými rukami a držte ho pred telom. Chrbát je celý čas rovný a ramená stiahnuté nadol. Majte aktivovaný stred tela a pohľad smerujte dopredu.\r\nPostup: S nádychom sa mierne predkloňte, mierne pokrčte kolená a kettlebell umiestnite medzi nohy. S výdychom aktivujte zadok i hamstringy a urobte švih kettlebellom pred seba, približne do výšky vášho hrudníka až očí. Potom sa vráťte do východiskovej pozície a nadviažte ďalším opakovaním.\r\nČasté chyby: Zaguľacovanie alebo nadmerné prehýbanie chrbta, kolená smerujú dovnútra, nedostatočná aktivácia dolných končatín.\r\nZapojené svaly: Primárne zadkové svaly, zadná strana stehien (hamstringy) a vzpriamovače chrbtice. Sekundárne stred tela (core), svaly chrbta a predlaktia.\r\nHip thrust s osou (Barbell Hip Thrust)\r\nVýchodisková poloha: Sadnite si na zem, hornou časťou chrbta sa oprite o lavicu, hlava zostáva v predĺžení chrbtice. Nasuňte si prázdnu alebo naloženú os na boky. Na os si dajte návlek, aby vám tyč toľko netlačila na panvu. Chodidlá potom pritiahnite k zadku a nechajte ich položené celé alebo len pätami na zemi. Od seba ich posuňte približne do vzdialenosti na šírku ramien a kolená nasmerujte mierne do strán.\r\nPostup: Aktivujte stred tela. S výdychom pomocou aktivácie svalov zadku kontrolovane zdvíhajte panvu s osou do takej výšky, až sa trup dostane do rovnobežky so zemou. V hornej pozícii sa sústreďte na kontrakciu svalov zadku. Sekundu až dve vydržte a potom panvu kontrolovane spustite nadol. Nadviažte ďalším opakovaním.\r\nČasté chyby: Prehýbanie bedier v hornej pozícii, zalomenie krku, nekontrolovaný pohyb, nesprávna pozícia chodidiel, malý rozsah pohybu, nevhodne zvolená záťaž.\r\nZapojené svaly: Primárne svaly zadku a zadnej strany stehien. Sekundárne svaly prednej strany stehien (kvadricepsy), vzpriamovače chrbtice a stred tela (core).\r\n. Mŕtvy ťah (Barbell Deadlift)\r\nVýchodisková poloha: Postavte sa pred naloženú os alebo trap bar s kotúčmi, s chodidlami približne na šírku vašich bokov. Špičky chodidiel smerujú dopredu. Pokrčte kolená a predkloňte sa k osi tak, aby váš chrbát zostal v prirodzenom zakrivení a hlava v predĺžení chrbtice. Potom obomi rukami chyťte os nadhmatom alebo striedavým úchopom v prípade veľkej hmotnosti na osi (jednou rukou nadhmatom, druhou podhmatom). Šírka úchopu je približne vo vzdialenosti vašich ramien alebo o niečo širšia.\r\nPostup: Nadýchnite sa a s výdychom sa pomocou aktivácie svalov stehien a zadku postupne narovnajte. Najprv narovnajte kolená a plynule potom aj trup. Os cestou nahor prechádza tesne pred nohami. Následne nadviažte ďalším opakovaním.\r\nČasté chyby: Zaguľacovanie chrbta, nekontrolovaný pohyb, malý rozsah pohybu.\r\nZapojené svaly: Primárne svaly zadku, hamstringy a vzpriamovače chrbtice. Sekundárne kvadricepsy, trapézy, široké chrbtové svaly, predlaktia a stred tela (core).\r\n Zadný drep (Back Squat)\r\nVýchodisková poloha: Nastavte si os s vhodne naloženou váhou na posilňovací stojan (zhruba do výšky vašich kľúčnych kostí). Postavte sa pod os s chodidlami zhruba na šírku ramien. Položte si os na hornú časť trapézov, chyťte ju obomi rukami vedľa ramien s tým, že lakte smerujú nadol. Aktivujte stred tela, zložte tyč zo stojana a urobte krok vzad.\r\nPostup: Nadýchnite sa a pohybom panvy dozadu a nadol urobte drep. Hĺbku drepu zvoľte tak, aby sa vám podarilo zachovať prirodzené zakrivenie chrbtice a dokázali ste sa z tejto pozície zdvihnúť. Os kolena, členka a špičky chodidla zostáva v jednej rovine. S výdychom sa pomocou aktivácie svalov zadku a prednej strany stehien plynule narovnajte. Potom urobte ďalšie opakovanie. Po ukončení série vráťte os naspäť na stojan.\r\nČasté chyby: Prehýbanie sa v chrbte, malý rozsah pohybu, predkláňanie sa dopredu, vtáčanie kolien dovnútra, nerovnomerne rozložená váha, prepadávanie na špičku alebo na pätu, nadmerná alebo nedostatočná záťaž na osi.\r\nZapojené svaly: Primárne svaly zadku, kvadricepsy a hamstringy. Sekundárne vzpriamovače chrbtice, lýtka, adduktory (vnútorná strana stehien) a stred tela (core).\r\n\r\n10. Zadné výpady (Barbell Back Lunges)\r\nVýchodisková poloha: Postavte sa s chodidlami na šírku vašich bokov. Os položte na stojan posilňovacej klietky a naložte si na ňu vhodnú záťaž v podobe kotúčov. Potom si ju položte na chrbát a chyťte zo strán vedľa ramien.\r\nPostup: Nadýchnite sa, váhu preneste na jednu nohu a druhou urobte kontrolovane výpad vzad. Dostaňte sa do hĺbky, keď vaše stehno zviera s lýtkom v kolene približne 90 stupňov alebo ešte hlbšie. S výdychom sa pomocou aktivácie svalov prednej strany stehien a zadku vráťte do východiskovej polohy a urobte výpad druhou nohou.\r\nČasté chyby: Malý rozsah pohybu, predkláňanie sa dopredu, vtáčanie kolena dovnútra, nerovnomerne rozložená váha, zlá koordinácia pohybu.\r\nZapojené svaly: Primárne svaly zadku a prednej strany stehien. Sekundárne hamstringy, lýtka, stred tela (core) a adduktory (vnútorná strana stehien).\r\n', 'img/blog/68177e6826ff84.39010549.jpg', '', 2, 5, '2025-05-04 16:49:12', '2025-05-04 16:49:12');

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
(1, 'Zdravá strava', '2025-04-25 21:33:16', '2025-04-25 21:33:16'),
(2, 'Cviky a tréningy', '2025-05-04 16:44:27', '2025-05-04 17:24:31');

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
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(4, 38),
(4, 46),
(4, 47),
(4, 48),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(6, 44),
(6, 45),
(6, 49),
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
(8, 10, 1, 1, 10, 27.53, 'V príprave', '2025-04-30 19:05:02'),
(9, 11, 1, 1, 11, 59.90, 'V príprave', '2025-05-02 15:28:40'),
(10, 12, 1, 1, 12, 59.90, 'V príprave', '2025-05-02 15:47:49'),
(11, 13, 1, 1, 13, 59.90, 'V príprave', '2025-05-02 15:48:27'),
(12, 14, 1, 1, 14, 59.90, 'V príprave', '2025-05-02 15:49:08'),
(13, 15, 1, 1, 15, 59.90, 'V príprave', '2025-05-02 15:50:07'),
(14, 16, 1, 1, 16, 59.90, 'V príprave', '2025-05-02 15:51:14'),
(15, 17, 1, 1, 17, 59.90, 'V príprave', '2025-05-02 15:56:24'),
(16, 18, 1, 1, 18, 26.99, 'V príprave', '2025-05-02 17:05:10'),
(17, 19, 1, 1, 19, 27.53, 'V príprave', '2025-05-03 13:53:02'),
(18, 20, 1, 1, 20, 23.90, 'V príprave', '2025-05-03 13:53:58'),
(19, 21, 1, 1, 21, 110.85, 'V príprave', '2025-05-03 14:37:05'),
(20, 22, 1, 1, 22, 27.53, 'V príprave', '2025-05-10 16:37:55'),
(21, 23, 1, 1, 23, 23.90, 'V príprave', '2025-05-11 14:34:35'),
(22, 24, 1, 1, 24, 23.90, 'V príprave', '2025-05-14 19:21:44'),
(23, 25, 1, 1, 25, 45.95, 'V príprave', '2025-05-14 19:22:39'),
(24, 26, 1, 1, 26, 27.53, 'V príprave', '2025-05-14 19:34:25');

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
(8, 33, 2),
(9, 31, 2),
(10, 31, 8),
(11, 31, 8),
(12, 31, 8),
(13, 31, 8),
(14, 31, 8),
(15, 31, 2),
(16, 32, 3),
(17, 33, 1),
(18, 34, 1),
(19, 36, 1),
(19, 40, 1),
(20, 33, 1),
(21, 34, 1),
(22, 34, 1),
(23, 40, 1),
(24, 33, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `platba`
--

CREATE TABLE `platba` (
  `idplatba` int(11) NOT NULL,
  `nazov` varchar(100) NOT NULL,
  `datum_vytvorenia` timestamp NOT NULL DEFAULT current_timestamp(),
  `datum_upravy` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `platba`
--

INSERT INTO `platba` (`idplatba`, `nazov`, `datum_vytvorenia`, `datum_upravy`) VALUES
(1, 'Platba kartou', '2025-04-29 14:56:15', '2025-05-02 17:17:40'),
(2, 'Hotovosť', '2025-05-02 17:16:37', '2025-05-02 17:17:40');

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
  `datum_vytvorenia` datetime DEFAULT current_timestamp(),
  `datum_upravy` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_hlavna` varchar(255) NOT NULL,
  `img_alt` varchar(255) NOT NULL,
  `hlavny_popis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `produkty`
--

INSERT INTO `produkty` (`idprodukty`, `nazov`, `znacka`, `popis`, `cena`, `pocet_kusov`, `velkost`, `farba`, `datum_vytvorenia`, `datum_upravy`, `img_hlavna`, `img_alt`, `hlavny_popis`) VALUES
(31, 'Prom-in CFM Pure Performance - Mlieko s medom a škoricou', 'Prom-in CFM Pure Performance', 'Prom-in CFM Pure Whey Performácia\r\nVysokopercentný proteínový nápoj vyrobený metódou CFM ( c ross f  low microfiltration  – mikrofiltrácia skríženým tokom cez keramické filtre), ktorá zachováva maximum bio-aktívnych frakcií pôvodnej suroviny. CFM PURE PERFORMANCE  predstavuje prémiový proteínový suplement výhradne z najkvalitnejšieho srvátkového proteínového koncentrátu prémiovej kvality z mlieka získaného od kráv, ktoré sú po väčšiu časť roka kŕmené trávou.   Navyše vďaka najpokročilejšej technológii spracovania garantujeme zachovanie pôvodného pomeru bioaktívnych frakcií, vďaka čomu sa použitie produktu neobmedzuje len na šport, ale vďaka nepopierateľným zdravotným výhodám je vhodný na zaradenie do potravinového koša detí i dospelých. CFM PURE PERFORMANCE  neobsahuje žiadne umelé farbivá, aspartám, acesulfam, plnidlá ani nežiaduce tuky pre zjemnenie chuti. aminokyseliny BCAA. Nie nadarmo je srvátkový proteín považovaný za zlatý štandard v kvalitne bielkovín.', 59.90, 0, ' ', ' ', '2025-04-22 09:54:35', '2025-05-02 17:56:24', 'img/produkty/6810ffc9a4df19.73752177.webp', ' ', 'Vďaka šetrnému spracovaniu sa jedná o absolútnu špičku medzi vysokopercentnými proteínovými suplementami na trhu.'),
(32, 'GymSupps XWhey Protein - Citrónový cheesecake 1000g', 'GymSupps XWhey Protein', 'GymSupps XWhey Protein\r\nGymSupps XWhey Protein je dokonalým spojencom každého športovca, ktorý vie, že rast svalov a efektívna regenerácia začínajú pri kvalitných bielkovinách. Pripravte sa posunúť svoj tréning na ďalšiu úroveň! Kedy začať uvažovať o užívaní proteínu?\r\nZačnite uvažovať o užívaní proteínu najmä v obdobiach zvýšenej fyzickej námahy a pri snahe o budovanie svalovej hmoty. Ak zisťujete, že váš denný príjem bielkovín je nedostatočný, môže byť tento doplnok ideálnym riešením. Navyše, bielkoviny podporujú chudnutie – zvyšujú pocit sýtosti, pomáhajú spaľovať tuky a zároveň chránia svalovú hmotu pri redukčnej diéte. Odporúčané dávkovanie GymSupps XWhey Protein:\r\nRozmiešajte jednu odmerku (30 gramov) v 200–300 ml vody a skonzumujte. Užívajte 1–3× denne na doplnenie bielkovín.', 26.99, 17, ' ', ' ', '2025-04-22 09:57:44', '2025-05-02 19:05:10', 'img/produkty/6810ffbb404109.09647336.webp', ' ', 'X-Whey Protein od GymSupps je viaczložkový srvátkový proteín s izolátom značky Volactive®.'),
(33, 'Scitec 100% Whey Protein Professional - Biela čokoláda', 'Scitec', 'Whey Protein Professional od spoločnosti Scitec Nutrition má hodnotenie dlhodobo najlepšie chutného proteínu na našom trhu, navyše vďaka svojmu zloženiu patrí tiež k špičke. Obsahuje vysoký podiel kvalitných srvátkových bielkovín získaných ultra-mikrofiltračným procesom. Navyše obsahuje tráviace enzýmy papaín (extrahovaný z papáje) a bromelaín (z ananásovníka). Proteínová zložka Whey Protein Professional obsahuje cca 23% aminokyselín BCAA (5 g v každej dávke) a 18% L-\r\nglutamínu (4 g v dávke). Suplement je skvelou voľbou ako pre všetkých športovcov usilujúcich o nárast svalovej hmoty, tak aj ako veľmi kvalitná náhrada jedla do redukčných diét.\r\n\r\n100% Whey Protein Professional je srvátkový proteín s veľmi vysokou využiteľnosťou ľudským organizmom. Obsah esenciálnych aminokyselín a taktiež obsah anabolicky pôsobiacich aminokyselín s viazaným reťazcom je veľmi vysoký (až 47,5%). V záujme zabránenia katabolickým procesom je obohatený tiež množstvom glutamínu. 100% Whey Protein Professional obsahuje približne 10% imunoglobulínových mikrofrakcií, naopak neobsahuje žiadny aspartam. Veľmi dôležitou súčasťou je\r\nkomplex tráviacich enzýmov Aminogen (bromelaín extrahovaný z ananásovníku chocholatého - 1200 GDU / g a papaín extrahovaný z papáje - 1,5 FIP U / mg).\r\n\r\nProteín je určený všetkým užívateľom, ktorí sa usilujú o nárast svalovej hmoty a sily. Veľmi často je ale používaný aj v redukčných diétach ako náhrada jedla, popr. ako prímes k iným potravinám (do tvarohu)\r\n\r\nV bodoch:\r\n\r\nzmes srvátkového koncentrátu a srvátkového izolátu\r\nprispieva k zvyšovaniu a udržiavanie svalovej hmoty\r\ns obsahom všetkých 9 esenciálnych aminokyselín\r\nso zmesou tráviacich enzýmov\r\nOdporúčané dávkovanie:\r\n\r\nrozmixujte 3/4 odmerky (30 g) 100% Whey Protein Professional v 250 ml vody alebo mlieka\r\nužívajte najlepšie po tréningu (ale aj napr. ráno po prebudení či v priebehu dňa medzi jedlami)', 27.53, 7, ' ', ' ', '2025-04-22 09:59:51', '2025-05-15 19:16:19', 'img/produkty/6810ffaf5b5697.08181715.webp', ' ', '100% Whey Protein Professional je syrovátkový produkt s obsahom 77 % bielkovín s nízkym obsahom tukov a laktózy. Vďaka vysokému podielu kvalitných bielkovín podporuje rast a udržiavanie svalovej hmoty. Je ideálny pre športovcov, aktívnych ľudí aj tých, ktorí chcú doplniť bielkoviny do svojho jedálnička. Obsahuje všetky esenciálne aminokyseliny vrátane BCAA, ktoré napomáhajú regenerácii po tréningu. Vďaka nízkemu obsahu tukov a cukrov je vhodný aj počas diéty alebo pri rysovaní svalov. Produkt je ľahko stráviteľný a nezaťažuje tráviaci systém.\r\n\r\n'),
(34, 'Performance Protein, natívny srvátkový proteín, slaný karamel', 'Performance Protein', 'Upgradovali sme už tak dobrý Performance proteín zmenou bežného kolagénu na Grass-fed kolagén a celkovo vyladili chuť a rozpustnosť k dokonalosti. Úplne prelomová kombinácia vysoko kvalitného   natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom. Namiesto kokosového oleja sme použili kokosové mlieko, ktoré sa ľahšie rozpúšťa, a vďaka ktorému má proteín krémovejšiu konzistenciu. Úplne   prelomová kombinácia vysoko kvalitného natívneho srvátkového proteínu s Grass-fed hydrolyzovaným kolagénom typu I a III, kolostrom a kokosovým olejom. Svojím zložením a čistotou je úplným unikátom. Môžete si byť istí, že kombinácia látok v jednom produkte v takej kvalite neexistuje. Nie je určený iba na jednoduché doplnenie kvalitného zdroja bielkovín.   Performance Protein je komplexným riešením pre regeneráciu, črevo a imunitu. Aj napriek tomu, že je   dochutený iba prírodným sladidlom stévií, vyniká skvelou chuťou i vôňou. Navyše neobsahuje žiadne balastné látky, ani lepok.', 23.90, 12, ' ', ' ', '2025-04-22 10:04:44', '2025-05-14 21:21:44', 'img/produkty/6810ffa45e3db9.16214368.webp', ' ', 'Performance Protein – Prémiová sila pre tvoje telo.\r\nPrelomová kombinácia natívneho srvátkového proteínu, Grass-fed kolagénu typu I a III, kolostra a kokosového mlieka. Bez lepku, bez balastu, so stéviou a skvelou chuťou. Podpora regenerácie, imunity a zdravého čreva v jednom čisto prírodnom produkte.\r\n\r\n'),
(35, 'ADIDAS ORIGINALS Tričko \'Adicolor Classics\' vo farbe Biela', 'ADIDAS ORIGINALS ', 'Produkt obsahuje: 100% organické materiály\r\nVyrobené z:Bavlna (ekologicky pestovaná)\r\nDôkaz:Vyhlásenie dodávateľa o prevedení nezávislej kontroly\r\nTento produkt obsahuje organické materiály, ktorých pestovanie sa zameriava na zachovanie zdravia pôdy a ekosystémov prostredníctvom ekologického poľnohospodárstva tým, že sa vyhýba genetickej modifikácii, a obmedzuje sa používanie vody a chemických hnojív.', 33.00, 20, 'XL', 'Biela', '2025-04-24 19:55:22', '2025-04-29 18:34:33', 'img/produkty/6810ff99d5a3a0.57127201.webp', ' ', 'Veľkosť & strih\r\nDĺžka rukávu: Štvrtinový rukáv\r\nDĺžka: Normálna dĺžka\r\nStrih: Štandardný fit\r\nPotlač loga\r\nDžersej\r\nOkrúhly výstrih\r\nZošívaný lem\r\nŠvy tón v tóne\r\nMäkký omak'),
(36, 'Nike Sportswear Mikina \'CLUB\' vo farbe Čierna', 'Nike', 'Objav pohodlie, ktoré si zamiluješ, a štýl, ktorý vynikne – s touto mikinou od značky Nike. Vyrobená z kvalitného a príjemného materiálu, ktorý ti poskytne teplo počas chladnejších dní, a zároveň umožní pokožke dýchať.\r\n\r\nModerný strih a minimalistický dizajn s ikonickým logom Nike robia z tejto mikiny ideálny kúsok do každodenného šatníka. Či už ju skombinuješ s džínsami, teplákmi alebo legínami, vždy budeš pôsobiť uvoľnene a štýlovo.\r\n\r\n✔️ Materiál: 80 % bavlna, 20 % polyester\r\n✔️ Strih: Regular Fit\r\n✔️ Kapucňa: Áno, so šnúrkami\r\n✔️ Vrecká: Kengurie vrecko vpredu\r\n✔️ Logo: Výrazné logo Nike na hrudi\r\n\r\nIdeálna na voľný čas, tréning aj každodenné nosenie. Buď v pohybe so štýlom – buď Nike.', 64.90, 11, 'L', 'Čierna', '2025-04-24 19:59:44', '2025-05-03 16:37:05', 'img/produkty/6810ff8ced5b43.91104363.webp', ' ', 'Štýlová a pohodlná mikina Nike pre každý deň – ideálna voľba do mesta aj na tréning.'),
(38, 'GymSupps BCAA 4:1:1 Instant - 500g', 'GymSupps ', 'Ak hľadáš spôsob, ako podporiť svoj tréning a zlepšiť regeneráciu, musíš vyskúšať naše GymSupps BCAA 4:1:1 instant! Je to skvelý spoločník do fitka, ktorý ti pomôže dosiahnuť tvoje ciele rýchlejšie a efektívnejšie. Táto BCAA (aminokyseliny s rozvetveným reťazcom) sa skladá z leucínu, izoleucínu a valínu v skvelom pomere 4:1:1, čo znamená, že dostaneš väčšiu porciu leucínu, ktorý je kľúčový pre budovanie svalov a podporu regenerácie.\r\nPrečo pomer 4:1:1?\r\nPomer 4:1:1 ponúka vyššiu dávku leucínu v porovnaní s tradičnejším pomerom 2:1:1. Leucín je kľúčový pre spustenie syntézy svalových bielkovín, čo je zásadné pre rast svalov a regeneráciu po tréningu. S týmto pomerom získaš maximálny benefit z každej dávky BCAA, čo ti pomôže dosiahnuť lepšie výsledky rýchlejšie.\r\nKedy začať uvažovať nad užívaním BCAA ?\r\nBCAA sú skvelou voľbou, pokiaľ sa snažíš zlepšiť svoju výkonnosť a regeneráciu. Pokiaľ trénuješ intenzívne, zažívaš únavu alebo chceš zlepšiť svalovú regeneráciu a ochrániť svaly pred rozpadáním, BCAA sú pre teba to pravé. Sú ideálne ako pre začiatočníkov, tak pre pokročilých športovcov, ktorí chcú posunúť svoje výsledky na ďalšiu úroveň.', 17.45, 10, ' ', ' ', '2025-04-24 20:08:17', '2025-04-29 18:34:09', 'img/produkty/6810ff8143e842.22814577.png', ' ', 'BCAA 4:1:1 Instant od GymSupps ponúka skvelý pomer leucínu, rýchlu regeneráciu a lahodné príchute pre optimálny rast svalov.'),
(39, 'Trhačky Cotton Gel S4 Black - RDX Sports', 'RDX Sports', 'Trhačky Cotton Gel S4 - praktické tréningové pomôcky pre pevnejší úchop činky, ktoré môžu pomôcť zdvihnúť väčšiu váhu\r\nTrhačky Cotton Gel S4 sú praktické tréningové pomôcky na podporu úchopu pri silovom cvičení. Jednoducho si ich upevníte na zápästie a vďaka dĺžke 60 cm a šírke 4 cm potom pevne omotáte okolo činky. Znížite tak napätie v predlaktí a prstoch pri ťahových cvikoch, ako je mŕtvy ťah. Pri zdvíhaní ťažkých váh vás tak nebude toľko limitovať sila úchopu a zvládnete napríklad aj vyššiu záťaž a viac opakovaní.\r\n\r\nTieto trhačky sú vyrobené z odolnej bavlny a majú protišmykový povrch pre stabilnejšie držanie na činke. O vaše pohodlie sa navyše postará neoprénové polstrovanie v oblasti zápästia. Využijú ich najmä kulturisti, vzpierači, powerlifteri, crossfiťáci a ostatní športovci, ktorí hľadajú rôzne možnosti, ako posilniť úchop.\r\n\r\nTrhačky Cotton Gel S4 a ich výhody\r\nsú tréningové pomôcky pre podporu úchopu\r\nslúžia na zníženie napätia v predlaktí a prstoch\r\nmajú dĺžku 60 cm a šírku 4 cm\r\nsú vyrobené z odolnej bavlny\r\nmajú protišmykový povrch\r\njednoducho sa používajú\r\nhodia sa na mŕtvy ťah a ďalšie ťahové cviky\r\nideálne pre kulturistov, vzpieračov a powerlifterov \r\n \r\nMateriál\r\nBavlna, neoprénové polstrovanie, silikón.', 17.50, 10, ' ', ' ', '2025-04-24 20:13:52', '2025-04-29 18:33:46', 'img/produkty/6810ff6a082986.33175529.webp', ' ', 'Trhačky Cotton Gel S4 slúžia na lepší úchop osi na tréningu. Majú dĺžku 60 cm a šírku 4 cm, vďaka čomu ich pevne omotáte okolo činky. Odľahčíte tak predlaktia pri ťahových cvikoch, ako je napríklad mŕtvy ťah. Trhačky vám pomôžu zdvihnúť väčšiu váhu a zvládnuť viac opakovaní. Pri tréningu ich bežne používajú najmä kulturisti, vzpierači a powerlifteri.'),
(40, 'Batoh Stellar Black - STRIX', 'STRIX', 'Backpack Stellar - funkčný ruksak s ultra-moderným dizajnom a vodeodolnou ochranou v podobe plášťa, ktorý udrží vaše veci suché aj počas dažďa či snehu\r\nBackpack Stellar je prvotriedny ruksak, ktorý ocení každý, kto hľadá nekompromisné riešenie na cesty, do práce, školy či fitka. Pýši sa ultra-moderným nadčasovým dizajnom, ktorý zdobia rôzne vychytené nápisy a logá prémiovej značky STRIX, čo mu pridáva na jedinečnosti. Poteší tiež aj veľkorysým úložným priestorom a samostatným vreckom na 16\" laptop. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na spoľahlivú ochranu vašich vecí pred dažďom a snehom. Backpack Stellar vás tak podrží za každého počasia a uschová vaše cennosti v suchu. Navyše sa môže pochváliť vetraním v spodnej časti, čo sa hodí najmä v prípade, že si v ňom nesiete veci z fitka.\r\nVnútro chránia bezpečné zipsy a povrch pokrýva bohatá ponuka vreciek a kapsičiek rôznych veľkostí. Navyše je ľahký a veľmi pohodlný na nosenie. Vďačí za to nastaviteľným popruhom, ale aj dokonalému anatomickému tvarovaniu s vystuženým chrbtom. Svoj podiel na komforte počas nosenia má aj sieťovaná vnútorná časť, ktorá sa postará o spoľahlivú ventiláciu chrbta. Backpack Stellar je tiež vybavený popruhmi na nosenie karimatky, čo sa hodí, keď sa chystáte spať v prírode alebo na lekciu jogy. Ide teda ultimátny batoh, ktorý by nemal chýbať vo výbave každého nomáda. Určite ho však využijú aj študenti, ktorí potrebujú priestor na skriptá, športovci chytajúci sa do fitka, manažéri či fanúšikovia turistiky. Zaraďte sa medzi elitu okolo značky STRIX a prejavte naplno svoju lásku k aktívnemu životnému štýlu.\r\nBackpack Stellar a jeho výhody \r\nje prvotriedny ruksak s ultra-moderným nadčasovým dizajnom \r\nhodí sa na cesty, do školy, práce či fitka\r\nmá objem 16,8 l\r\nmá vetranie v spodnej časti  \r\nmá veľkorysý úložný priestor s bohatou ponukou vreciek a kapsičiek \r\nje vyrobený z polyesteru, ktorý sa pýśi vysokou odolnosťou a dlhou životnosťou \r\nmá samostatné vrecko na 16\" laptop\r\nmá vodeodolný obal, ktorý ochráni vaše veci pred dažďom a snehom \r\nje veľmi ľahký a pohodlne sa nosí\r\nmá popruhy na karimatku \r\nmá dokonalé anatomické tvarovanie s vystuženým chrbtom \r\nmá nastaviteľné popruhy\r\nmá sieťovanú vnútornú časť, ktorá zabezpečí ventiláciu chrbta \r\n\r\nMateriál\r\nPolyester\r\n\r\n ', 45.95, 10, ' ', ' ', '2025-04-24 20:16:14', '2025-05-14 21:22:39', 'img/produkty/6810ff5ea3d090.30218470.jpg', ' ', 'Backpack Stellar je ultimátny ruksak pre každého, kto hľadá nekompromisné riešenie na cesty, do práce, školy či do fitka. Poteší veľkorysým úložným priestorom s vreckom na 16\" laptop a ultra-moderným nadčasovým dizajnom. Je vyrobený z polyesteru, ktorý mu zaručuje vysokú odolnosť a dlhú životnosť. K nej prispieva aj vodeodolný obal fungujúci ako plášť na ochranu pred dažďom a snehom.'),
(44, 'GymSupps Vitamin C - 100 kapslí', 'GymSupps', 'GymSupps Vitamin C\r\nKaždou kapsulou nášho Vitamínu C doslova vypustíte záplavu zdravia a tak sa stane každodenným spojencom Vašej imunity!\r\n\r\nMožno ich odporučiť všetkým športujúcim, všetkým podstupujúcim veľkú fyzickú alebo aj psychickú záťaž.\r\nVitamín C je nevyhnutným mikronutrientom pri akejkoľvek zvýšenej fyzickej námahe. Podieľa sa v tele na desiatkach biochemických procesov a jeho dostatočná hladina bezprostredne súvisí s kondíciou, výkonom a vytrvalosťou.\r\n\r\nOdporúčané dávkovanie GymSupps Vitamín C:\r\nUžívajte 1 kapsulu denne. Neprekračujte odporúčané dávkovanie.\r\nUpozornenie: Doplnok stravy s vitamínom C. Výrobok nie je určený ako náhrada pestrej stravy. Skladujte v suchu pri teplote do 25 °C. Chráňte pred priamym slnečným žiarením. Ukladajte mimo dosahu detí. Výrobca neručí za škody vzniknuté nevhodným použitím alebo skladovaním. Minimálna trvanlivosť je uvedená na obale.', 11.35, 30, ' ', ' ', '2025-05-15 19:14:19', '2025-05-15 19:16:52', 'img/produkty/682620ebd2f5c8.07191119.webp', ' ', 'Vitamín C od GymSupps je dôležitý vitamín pre posilnenie a udržanie normálneho stavu našej imunity. Tento antioxidant prispieva k ochrane buniek pred oxidačným stresom, čím podporuje zdravé fungovanie celého organizmu. Pomáha aj pri tvorbe kolagénu, ktorý je nevyhnutný pre zdravé kosti, kĺby, pokožku a cievy. Pravidelné užívanie vitamínu C môže znížiť únavu a vyčerpanie, najmä počas náročných období. Športovcom napomáha k lepšej regenerácii po fyzickej záťaži a skracuje čas zotavenia. Tento doplnok výživy je vhodný aj pri zvýšenej psychickej záťaži, keďže podporuje správne fungovanie nervového systému. Vitamín C zároveň zvyšuje vstrebávanie železa z potravy, čo je dôležité najmä pre ľudí s chudokrvnosťou. V období chrípkovej sezóny je výbornou prevenciou proti infekciám a vírusom. Produkt od GymSupps je vyrábaný s dôrazom na kvalitu a čistotu zložiek. Je ideálny pre každého, kto chce podporiť svoje zdravie a imunitu prirodzeným spôsobom.\r\n\r\n'),
(45, 'Prom-in Health Balance - 120 kapslí', 'Prom-in', 'Popis produktu Prom-in Health Balance\r\nHealth Balance athletic predstavuje špeciálnu formu pre celkovú revitalizáciu organizmu. Je vhodný hlavne pre osoby vystavené zvýšenej fyzickej a psychickej záťaži, ako sú výkonnostní a kondiční športovci, manažéri a všetky osoby staršie 30 rokov.\r\n\r\nOdporúčané dávkovanie:\r\n\r\n4 kapsuly denne, ideálne s jedlom. Zapite dostatočným množstvom vody.\r\nUpozornenie: Skladujte na suchom a chladnom mieste. Chráňte pred mrazom a priamym slnečným žiarením. Nie je určené pre deti, tehotné a dojčiace ženy. Výrobok nie je určený ako náhrada pestrej stravy. Výrobca neručí za škody, vzniknuté nevhodným použitím alebo skladovaním. Spotrebujte do dátumu uvedeného na obale.', 18.89, 30, ' ', ' ', '2025-05-15 19:18:48', '2025-05-15 19:18:48', 'img/produkty/682621f808bdd2.11530349.webp', ' ', 'Health Balance predstavuje špeciálnu formulu pre celkovú revitalizáciu organizmu. Obsahuje kombináciu vitamínov, minerálov, antioxidantov a rastlinných extraktov, ktoré podporujú rovnováhu tela aj mysle. Je navrhnutý tak, aby posilňoval imunitu, zlepšoval vitalitu a podporoval celkový pocit pohody. Pravidelné užívanie prispieva k zníženiu únavy, lepšiemu zvládaniu stresu a udržaniu psychickej rovnováhy. Health Balance tiež podporuje správne fungovanie metabolizmu a napomáha detoxikácii organizmu. Vďaka vyváženému zloženiu je vhodný pre ľudí s aktívnym životným štýlom aj pre tých, ktorí hľadajú každodennú podporu zdravia. Prírodné extrakty pomáhajú harmonizovať vnútorné procesy tela bez zbytočnej chémie. Produkt je šetrný k tráveniu a nezaťažuje organizmus. Môže byť výborným doplnkom výživy v období zvýšenej záťaže alebo pri rekonvalescencii. '),
(46, 'BCAA Instant Premium ochutené', 'Warrior', 'Informácie o produkte\r\nInstantné ochutené BCAA Aminokyseliny v prášku - s vylepšenou rozpustnosťou vo vode a skvelou chuťou\r\n\r\nBCAA - do skupiny vetvených aminokyselín (Branched-Chain Amino Acids) patrí leucín, izoleucín a valín. Ide o esenciálne aminokyseliny, ktoré si telo nevie vytvoriť z iných zdrojov a je teda odkázané na množstvo prijaté potravou. Na rozdiel od ostatných aminokyselín sú metabolizované priamo vo svale. Po vyčerpaní svalového glykogénu počas cvičenia sú vetvené aminokyseliny metabolizované vo zvýšenej miere a výledkom je úbytok svalovej hmoty.\r\n\r\nNaopak príjem BCAA má výrazný vplyv na budovanie svalov a ochranu pred ich degradáciou. Štúdie dokázali, že príjem BCAA pri cvičení nalačno zvyšuje mieru spaľovania tukov a znižuje svalovú únavu po cvičení.\r\n\r\nZ BCAA ma najvyšší proteoanabolický účinok práve leucín, preto ponúkame BCAA v rôznych pomeroch, ktoré sa líšia práve zastúpením leucínu. To, ktorý pomer je pre Vás najvhodnejší závisí na diétnom režime a cieľoch cvičenia. Instantné BCAA sú v pomere 2:1:1 - obsahujú teda vetvené aminokyseliny v pomere 2 (leucín) :1 (izoleucín):1 (valín). Sú ochutené štyroma rôznymi príchuťami a preto skvele chutia.', 15.39, 15, ' ', ' ', '2025-05-15 19:20:59', '2025-05-15 19:20:59', 'img/produkty/6826227b1d2742.49851254.webp', ' ', 'Ochutené instantné BCAA od WARRIOR!\r\nVylepšená rozpustnosť vo vode.\r\nPodpora pre budovanie a ochranu svalov. \r\nInstantné BCAA v pomere 2:1:1 s prémiovým obsahom glukózy.\r\nMnožstvo skvelých chutí.\r\nBez GMO.\r\n Alternatívne názvy: leucín, izoleucín, valín, aminokyseliny, esenciálne aminokyseliny, BCAA powder, glukóza.'),
(47, 'BCAA MAX SUPPORT INSTANT', 'ALLNUTRITION', 'ALLNUTRITION BCAA MAX SUPPORT INSTANT\r\nPopis\r\nOdporúčané dávkovanie\r\nZloženie produktu\r\nRecenzie\r\nVYSOKOKVALITNÉ AMINOKYSELINY BCAA V PRÁŠKU\r\nIDEÁLNA RECEPTÚRA\r\nINSTANTNÁ FORMA UĽAHČUJÚCA ROZPÚŠŤANIE\r\nJEDEN Z NAJOBĽÚBENEJŠÍCH TYPOV DOPLNKOV\r\nOVERENÝ NA CELOM SVETE\r\n8 LAHODNÝCH PRÍCHUTÍ\r\n5 000 MG BCAA V JEDNEJ DÁVKE\r\n3 000 MG GLUTAMÍNU NA DÁVKU\r\nZNIŽUJE SVALOVÝ KATABOLIZMUS\r\nPOSKYTUJE NAJLEPŠIU MOŽNÚ REGENERÁCIU\r\nPODPORUJE SPAĽOVANIE TUKOV\r\nZNIŽUJE BOLESTI SVALOV PO CVIČENÍ\r\nPODPORUJE TELO POČAS TRÉNINGU A PO JEHO UKONČENÍ\r\nPRE ŠPORTOVCOV VŠETKÝCH ÚROVNÍ\r\nPOMÁHA PRI OBNOVE PO NÁROČNOM ÚSILÍ A TVRDEJ PRÁCI\r\nBCAA MAX SUPPORT INSTANT môže byť cenným doplnkom stravy fyzicky aktívnych ľudí, najmä profesionálnych športovcov. Opodstatnenosť ich príjmu však závisí od viacerých faktorov, ako je telesné zloženie, účel a typ použitej stravy, frekvencia a intenzita tréningových jednotiek. Čím nižšia je hladina tukového tkaniva, tým hlbší je kalorický deficit, menší prísun sacharidov a náročnejšie a častejšie tréningy, tým viac výhod pri užívaní BCAA MAX SUPPORT INSTANT môžete získať a využiť vyššie dávky týchto aminokyselín.\r\n\r\nBCAA – čo to je?\r\nBCAA, alebo aminokyseliny s rozvetveným reťazcom patria medzi najobľúbenejšie doplnky, ktoré používajú fyzicky aktívni ľudia. Je to tak kvôli skutočnosti, že tak každodenná prax, ako aj výsledky vedeckého výskumu potvrdzujú ich priaznivý vplyv na všeobecne chápanú formu športu. Skrátený názov BCAA pochádza z anglického výrazu: branched chain amino acids, čo preložíme ako „aminokyseliny s rozvetveným reťazcom“. Uvedený názov vyplýva zo špecifickej štruktúry týchto zlúčenín.\r\n\r\nMedzi BCAA patria: leucín, izoleucín a valín, ktoré tiež patria do skupiny esenciálnych aminokyselín nazývaných exogénne, t. j. tých, ktoré sa musia dodávať s jedlom alebo vo forme doplnku, pretože telo si ich nedokáže samo syntetizovať. BCAA na rozdiel od iných aminokyselín tvoriacich bielkoviny sa vyznačujú svojou chemickou štruktúrou a skutočnosťou, že sa metabolizujú nie v pečeni, ale predovšetkým vo svalovom tkanive.\r\n\r\nKedy a v akých dávkach užívať BCAA MAX SUPPORT INSTANT?\r\nIdeálnym riešením pre aktívneho človeka bude absolvovanie BCAA MAX SUPPORT INSTANT pred a po tréningu. Optimálna dávka, ktorá produkuje očakávané účinky v našom tele, je 10 g. Pre získanie všetkých ochranných vlastností Allnutrition BCAA MAX SUPPORT INSTANT sa oplatí užívať ho nalačno alebo pri dlhodobom tréningu.\r\n\r\nBCAA MAX SUPPORT vo verzii INSTANT poskytuje ešte lepšiu rozpustnosť, čo sa priamo premieňa na vaše pohodlie a umožňuje vám ešte viac si vychutnať jeho plnú funkčnosť.\r\n\r\nPôsobenie glutamínu\r\nV mnohých prípadoch sa táto aminokyselina môže stať potenciálne cenným doplnkom stravy. Glutamín má určitý antikatabolický potenciál, ktorý chráni získanú svalovú hmotu. Vedecký výskum podporuje spoločnú teóriu, že užívanie glutamínu zvyšuje výkonnosť športovcov v dvoch alebo viacerých silových trojkolkách. Stojí za to vedieť, že značná časť glutamínu prijatého tráviacim traktom je zachytená bunkami tenkého čreva.\r\n\r\nAj keď sa to na prvý pohľad zdá byť nevýhodou spomínaného prípravku, v skutočnosti to tak nie je. Glutamín, ktorý je primárnym a prioritným palivom pre enterocyty, môže mať vplyv na zdravie črevného epitelu. Črevá sa nie bez dôvodu považujú za prvý front v boji za naše zdravie. Je to najdôležitejší vojak nášho imunitného systému.', 11.99, 17, ' ', ' ', '2025-05-15 19:22:49', '2025-05-15 19:22:49', 'img/produkty/682622e95727a4.09778490.webp', ' ', 'BCAA MAX SUPPORT INSTANT môže byť cenným doplnkom stravy fyzicky aktívnych ľudí, najmä profesionálnych športovcov. Opodstatnenosť ich príjmu však závisí od viacerých faktorov, ako je telesné zloženie, účel a typ použitej stravy, frekvencia a intenzita tréningových jednotiek. Čím nižšia je hladina tukového tkaniva, tým hlbší je kalorický deficit, menší prísun sacharidov a náročnejšie a častejšie tréningy, tým viac výhod pri užívaní BCAA MAX SUPPORT INSTANT môžete získať a využiť vyššie dávky týchto aminokyselín.'),
(48, 'BCAA Elite Rate - Amix', 'Amix', 'BCAA Elite Rate sú esenciálne aminokyseliny s rozvetveným reťazcom (Branched-Chain Amino Acids), ktoré ocenia siloví aj vytrvalostní športovci. Obsahujú aminokyseliny leucín, valín a izoleucín v pomere 2:1:1 v prospech leucínu. \r\n\r\n \r\n\r\nTáto zmes aminokyselín je v praktickej kapsulovej forme, čo vám umožní ľahko doplniť BCAA vždy, keď práve potrebujete. Môžete ich užívať pred tréningom, po ňom aj kedykoľvek v priebehu dňa na doplnenie aminokyselín.\r\n\r\n \r\n\r\nBCAA Elite Rate sú vhodné pre športovcov, ktorí si dávajú záležať na príjme všetkých esenciálnych aminokyselín. Hodia sa vytrvalcom aj silovým atlétom na zdokonalenie ich každodennej suplementačnej rutiny.\r\n\r\n \r\n\r\nBCAA Elite Rate a ich výhody\r\nesenciálne aminokyseliny s rozvetveným reťazcom \r\nobsahujú leucín, valín a izoleucín v pomere 2:1:1\r\nmajú praktickú kapsulovú formu \r\ndajú sa užívať pred tréningom, po ňom aj kedykoľvek cez deň\r\nhodia sa silovým aj vytrvalostným športovcom\r\n \r\n\r\nZloženie\r\nL-Leucín, L-izoleucín, L-Valín, rastlinná kapsula obsahujúca: hydroxypropylmethylcellulose, čistená voda a calcium carbonate, protihrudkujúce látky: stearát horečnatý, oxid kremičitý.\r\n\r\n \r\n\r\nDávkovanie\r\nOdprúčaná denná dávka je 6 kapsúl. Užívajte 3 kapsule 30-60 minút pred fyzickým výkonom a 3 kapsule ihneď po fyzickom výkone.', 10.99, 18, ' ', ' ', '2025-05-15 19:24:25', '2025-05-15 19:24:25', 'img/produkty/682623499f8671.48289976.webp', ' ', 'BCAA Elite Rate je formula s esenciálnymi rozvetvenými aminokyselinami v kapsulovej forme. Obsahuje leucín, valín a izoleucín v pomere 2:1:1. Môžete ich užívať po tréningu aj kedykoľvek v priebehu dňa.'),
(49, 'Prom-in Vita Solution - 60 tabliet', 'Prom-in', 'Profesionálny produkt, ktorý obsahuje komplex vitamínov a minerálov v optimálnom pomere a forme tak, aby pokryl zvýšenú potrebu mikroživín.\r\n\r\nBenefity:\r\n\r\nb-komplex vo zvýšenej dávke pre aktívnych športovcov\r\n10 000 iu vitamínu A, ktorého zdrojom je iba beta-karotén\r\n200 iu vitamínu E vo forme organického d-alfa-tokoferolu\r\n75 mcg vitamínu k2 MK7\r\n200 mcg pikolinátu chrómu\r\n2 mg piperín pre zvýšenie absorpcieOdporúčané dávkovanie:\r\n\r\n2 x denne 1 tableta, ideálne ráno a večer spoločne s jedlom, zapiť dostatočným množstvom vody\r\nUpozornenie: Skladujte v suchu pri teplote do 25° C, starostlivo uzavreté, chráňte pred priamym slnečným žiarením a pred mrazom. Uchovávajte mimo dosahu detí. Prípravok nie je určený pre deti, tehotné a dojčiace ženy. Výrobca neručí za škody vzniknuté nevhodným použitím alebo skladovaním. Výrobok nie je určený ako náhrada pestrej stravy. Neprekračujte dennú odporúčanú dávku. Spotrebujte do dátumu uvedeného na obale.', 19.68, 20, ' ', ' ', '2025-05-15 19:27:19', '2025-05-15 19:27:19', 'img/produkty/682623f77b7772.02721168.webp', ' ', 'Profesionálny produkt, ktorý obsahuje komplex vitamínov a minerálov v optimálnom pomere a forme tak, aby pokryl zvýšenú potrebu mikroživín. Tento vyvážený mix je ideálny pre športovcov, aktívnych ľudí, ale aj každého, kto je vystavený fyzickému alebo psychickému stresu. Pomáha zabezpečiť správne fungovanie imunitného systému, nervovej sústavy a energetického metabolizmu. Vďaka vysokej biodostupnosti jednotlivých zložiek organizmus efektívne vstrebáva a využíva živiny. Obsahuje dôležité antioxidanty, ktoré chránia bunky pred oxidačným stresom a predčasným starnutím. Produkt prispieva k zníženiu únavy, podpore koncentrácie a lepšiemu výkonu počas celého dňa. Pravidelné užívanie pomáha udržiavať zdravé kosti, svaly, pokožku a srdcovo-cievny systém.');

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
(5, 'admin@outlook.sk', '$2y$10$mBWMr4yuRW0Kv7BoRQz0Nu0cpmZESxKgJ.2bNrIeAdrKjYO5KFzue', 'Adam', 'Nový', '2005-07-16', 0, '2025-04-16 17:36:47', '2025-05-14 19:33:20', NULL),
(6, 'a@a', '$2y$10$zWZVka6KUt9Amv93389.LuvVLGnSX9YhOcRNEq1bMsKOXg5uaXGJ.', 'Adam', 'Starý', '2002-06-05', 1, '2025-04-19 07:51:18', '2025-04-19 07:51:18', NULL),
(10, 'sadasdsadsaad@a', '$2y$10$oK9HaEGGnq2bsUohGJI0YuJ5h3sXwyoLrTxXCruqQBwZtSHVdPkYW', 'Patrik', 'Nový', '2025-04-27', 1, '2025-04-19 08:08:18', '2025-04-19 08:08:18', NULL),
(16, 'adamstary@outlook.sk', '$2y$10$nkEDdYVQVX.BkooTnLgsh.7QGotahEnjocx.EjhA3wr1Ww2ypyaM.', 'Adam', 'Starý', '1998-10-27', 1, '2025-04-27 13:44:51', '2025-04-27 13:44:51', NULL),
(17, 'adam@sima.ru', '$2y$10$3LQRWxQd8Ql14zd9g325EuvZGqc3zUlCfPuu2dxi39cRTTMGEId7K', 'Adam', 'Starý', '1997-11-11', 1, '2025-05-11 14:35:07', '2025-05-11 14:35:07', NULL);

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
(10, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Nový', '2025-04-30 21:05:02', '2025-04-30 21:05:02', '0903293213'),
(11, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-05-02 17:28:40', '2025-05-02 17:28:40', '0903293213'),
(12, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-02 17:47:49', '2025-05-02 17:47:49', '0903293213'),
(13, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-02 17:48:27', '2025-05-02 17:48:27', '0903293213'),
(14, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-02 17:49:08', '2025-05-02 17:49:08', '0903293213'),
(15, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-02 17:50:07', '2025-05-02 17:50:07', '0903293213'),
(16, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-02 17:51:14', '2025-05-02 17:51:14', '0903293213'),
(17, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Nový', '2025-05-02 17:56:24', '2025-05-02 17:56:24', '0903293213'),
(18, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Adam', '2025-05-02 19:05:10', '2025-05-02 19:05:10', '0903293213'),
(19, NULL, 'admin@admin.com', 'Adam', 'g', '2025-05-03 15:53:02', '2025-05-03 15:53:02', '0903293213'),
(20, 16, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-05-03 15:53:58', '2025-05-03 15:53:58', '0903293213'),
(21, 16, 'adam.sima@student.ukf.sk', 'Adam', 'Adam', '2025-05-03 16:37:05', '2025-05-03 16:37:05', '0903293213'),
(22, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Nový', '2025-05-10 18:37:55', '2025-05-10 18:37:55', '0903293213'),
(23, NULL, 'adam.sima@student.ukf.sk', 'Adam', 'Nový', '2025-05-11 16:34:35', '2025-05-11 16:34:35', '0903293213'),
(24, NULL, 'adam.sima@student.ukf.sk', 'Patrik', 'Nový', '2025-05-14 21:21:44', '2025-05-14 21:21:44', '0903293213'),
(25, 5, 'adam.sima@student.ukf.sk', 'Adam', 'Starý', '2025-05-14 21:22:39', '2025-05-14 21:22:39', '0903293213'),
(26, 5, 'adam.sima@student.ukf.sk', 'Adam', 'Šima', '2025-05-14 21:34:25', '2025-05-14 21:34:25', '0903293213');

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
  MODIFY `idadresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pre tabuľku `akordeon`
--
ALTER TABLE `akordeon`
  MODIFY `idakordeon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pre tabuľku `blog`
--
ALTER TABLE `blog`
  MODIFY `idblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `blog_kategorie`
--
ALTER TABLE `blog_kategorie`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `idobjednavky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pre tabuľku `platba`
--
ALTER TABLE `platba`
  MODIFY `idplatba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pre tabuľku `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idprodukty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pre tabuľku `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `idslideshow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `uzivatelia`
--
ALTER TABLE `uzivatelia`
  MODIFY `iduzivatelia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pre tabuľku `zakaznici`
--
ALTER TABLE `zakaznici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `blog`
--
ALTER TABLE `blog`
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
