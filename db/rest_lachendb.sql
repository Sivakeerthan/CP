-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Sep 2018 um 11:33
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `rest_lachendb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alc_menu`
--

CREATE TABLE `alc_menu` (
  `alcid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descr` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `alc_menu`
--

INSERT INTO `alc_menu` (`alcid`, `name`, `descr`, `price`, `cat_id`) VALUES
(3, 'Tomaten Creme Suppe', ' ', '7.00', 1),
(4, 'Bouillon Suppe mit Ei', ' ', '6.50', 1),
(5, 'Grüner Salat', ' ', '7.00', 2),
(6, 'Gemischter Salat', ' ', '8.50', 2),
(7, 'Grosser Salat-Teller', ' ', '14.50', 2),
(8, 'Spaghetti Pomodoro', ' ', '9.00', 4),
(9, 'Chicken Nuggets 5 Stk.', 'mit Pommes Frites', '12.00', 4),
(10, 'Schnitzel', 'mit Pommes Frites', '13.50', 4),
(11, 'Spaghetti Pomodoro', ' ', '16.00', 3),
(12, 'Spaghetti Carbonara', ' ', '19.50', 3),
(13, 'Schnitzel', 'mit Pommes Frites', '24.50', 5),
(14, 'Cordon Bleu', 'mit Pommes Frites und Gemüse', '28.50', 5),
(15, 'Schweins Piccata Milanese Art', 'mit Risotto oder Spaghetti Pomodoro', '24.50', 5),
(16, 'Rahmschnitzel', 'mit Pilzrahmsauce, Nudeln oder Pommes Frites', '24.50', 5),
(17, 'Rindergeschnetzeltes', 'mit Champignon Cognac Sauce, Rösti Kroketten und Gemüse', '29.50', 6),
(18, 'Rind Entrecôte(180g)', 'mit Café de Paris, Pommes Frites und Saisongemüse', '35.50', 6),
(19, 'Glasierte Pouletbrust', 'an Kräuterbutter mit Reis und Gemüse', '26.00', 7),
(20, 'Poulet Geschnetzeltes', 'mit Whiskyrahmsauce und Teigwaren', '30.50', 7),
(21, 'Pouletflügeli 6 Stk.', 'mit Pommes Frites', '18.00', 7),
(22, 'Samosa(Veg)', 'mit Sweet-Sour Sauce und Salat', '8.00', 9),
(23, 'Lamm Frühlingsrollen', 'Tamilische Frühlingsrollen mit Sweet-Sour Sauce und gemischtem Salat', '17.50', 9),
(24, 'Lamm Curry', 'mit Mango Curry Sauce, Daal, Pappadam und Basmati Reis', '28.00', 10),
(25, 'Butter Chicken', 'mit Daal und Butter Reis / Butter Nudeln', '22.50', 10),
(26, 'Riesen Crevetten mit Curry', 'mit Basmati Reis, Früchtespiessli und Pappadam', '28.00', 10);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cat`
--

CREATE TABLE `cat` (
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cat`
--

INSERT INTO `cat` (`catid`, `name`) VALUES
(1, 'Vorspeisen'),
(2, 'Hauptgang'),
(3, 'Schweinefleisch'),
(4, 'Rindfleisch'),
(5, 'Poulet(CH)'),
(6, 'Vegetarisch'),
(7, 'Indisches & Tamilisches');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subcat`
--

CREATE TABLE `subcat` (
  `scatid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `subcat`
--

INSERT INTO `subcat` (`scatid`, `name`, `cat_id`) VALUES
(1, 'Suppen', 1),
(2, 'Salate', 1),
(3, 'Teigwaren', 2),
(4, 'Kinder-Menu', 2),
(5, 'Gerichte', 3),
(6, 'Gerichte', 4),
(7, 'Gerichte', 5),
(8, 'Gerichte', 6),
(9, 'Vorspeisen', 7),
(10, 'Menü', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tages_menu`
--

CREATE TABLE `tages_menu` (
  `tid` int(11) NOT NULL,
  `date` date NOT NULL,
  `m1_name` varchar(50) NOT NULL,
  `m1_descr` varchar(100) NOT NULL,
  `m1_price` decimal(10,2) NOT NULL,
  `m2_name` varchar(50) NOT NULL,
  `m2_descr` varchar(100) NOT NULL,
  `m2_price` decimal(10,2) NOT NULL,
  `th_name` varchar(50) NOT NULL,
  `th_descr` varchar(100) NOT NULL,
  `th_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tages_menu`
--

INSERT INTO `tages_menu` (`tid`, `date`, `m1_name`, `m1_descr`, `m1_price`, `m2_name`, `m2_descr`, `m2_price`, `th_name`, `th_descr`, `th_price`) VALUES
(2, '2018-09-25', 'Test', 'Lorem ipsum dolor si', '18.00', 'Test', 'Lorem ipsum dolor si', '17.90', 'Test', 'Lorem ipsum dolor si', '17.90');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `uname`, `pw`) VALUES
(1, 'info@restaurant-lachen.ch', '384598737da5c559db477c491054269390430de6');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `alc_menu`
--
ALTER TABLE `alc_menu`
  ADD PRIMARY KEY (`alcid`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indizes für die Tabelle `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`catid`);

--
-- Indizes für die Tabelle `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`scatid`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indizes für die Tabelle `tages_menu`
--
ALTER TABLE `tages_menu`
  ADD PRIMARY KEY (`tid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `alc_menu`
--
ALTER TABLE `alc_menu`
  MODIFY `alcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `cat`
--
ALTER TABLE `cat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `subcat`
--
ALTER TABLE `subcat`
  MODIFY `scatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tages_menu`
--
ALTER TABLE `tages_menu`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `alc_menu`
--
ALTER TABLE `alc_menu`
  ADD CONSTRAINT `alc_menu_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `subcat` (`scatid`);

--
-- Constraints der Tabelle `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `subcat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
