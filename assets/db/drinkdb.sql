-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 06, 2024 alle 17:53
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drinkdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `drinkhandmade`
--

CREATE TABLE `drinkhandmade` (
  `drinkID` int(255) NOT NULL,
  `ingredientID` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `drinkhandmade`
--

INSERT INTO `drinkhandmade` (`drinkID`, `ingredientID`, `qty`) VALUES
(10, 72, 150),
(10, 73, 15),
(10, 74, 1),
(10, 75, 50);

-- --------------------------------------------------------

--
-- Struttura della tabella `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredientID` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `qtystock` int(255) NOT NULL,
  `price` double NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `typology` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `imageURL` varchar(50) NOT NULL,
  `deleteIngredient` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ingredient`
--

INSERT INTO `ingredient` (`ingredientID`, `name`, `qtystock`, `price`, `description`, `typology`, `category`, `imageURL`, `deleteIngredient`) VALUES
(72, 'Coca cola', 99290, 0.01, 'Coca cola', 'Beverage', 'Liquid', './upload/coca-cola.jpg', 0),
(73, 'Lime juice', 9985, 0.01, 'Lime', 'Beverage', 'Liquid', './upload/lime.jpg', 0),
(74, 'Lime', 438, 0.4, 'Lime decoration', '', 'Unit', './upload/lime_2.jpg', 0),
(75, 'Rum pampero', 9288, 0.1, 'Rum blanco', 'Spirit', 'Liquid', './upload/PamperoBlanco.jpg', 0),
(76, 'Vodka Grey Goose', 96792, 0.12, 'Excelent vodka', 'Spirit', 'Liquid', './upload/greygoose.png', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifneworder`
--

CREATE TABLE `notifneworder` (
  `orderRef` int(11) NOT NULL,
  `userRef` varchar(30) NOT NULL,
  `notifID` int(11) NOT NULL,
  `readedUser` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `readedAmm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `notifneworder`
--

INSERT INTO `notifneworder` (`orderRef`, `userRef`, `notifID`, `readedUser`, `description`, `readedAmm`) VALUES
(1, 'Nick987', 17, 0, 'Fanta : 2,Champagne Brut : 1,HandMadeDrink : 1', 0),
(2, 'mariorossi99', 18, 0, 'Aperol spritz : 1,', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `notiforderready`
--

CREATE TABLE `notiforderready` (
  `orderRef` int(10) NOT NULL,
  `userRef` varchar(30) NOT NULL,
  `readed` tinyint(1) NOT NULL,
  `notifID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `notiforderstate`
--

CREATE TABLE `notiforderstate` (
  `orderRef` int(11) NOT NULL,
  `userRef` varchar(30) NOT NULL,
  `changedState` varchar(30) NOT NULL,
  `readed` tinyint(1) NOT NULL,
  `notifID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `notifsoldout`
--

CREATE TABLE `notifsoldout` (
  `articleIDRef` int(10) NOT NULL,
  `articleNameRef` varchar(30) NOT NULL,
  `readed` tinyint(1) NOT NULL,
  `notifID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(255) NOT NULL,
  `articID` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `subtotal` double NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `articID`, `qty`, `subtotal`, `description`) VALUES
(1, 5, 1, 50, 'Amazing'),
(1, 8, 2, 4, 'Fanta 45 cl'),
(1, 10, 1, 7.05, 'Custom drink'),
(2, 3, 1, 7, 'Veneti loves it !');

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `productID` int(255) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `qtystock` int(255) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `imageURL` varchar(50) NOT NULL,
  `deleteProduct` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`productID`, `name`, `description`, `price`, `qtystock`, `type`, `imageURL`, `deleteProduct`) VALUES
(1, 'Mojito', 'Fresh drink !', 8.5, 23, 'Drink', './upload/mojito_product.jpg', 0),
(2, 'Caipiroska passion fruit', 'Perfect to drink in summer !', 9, 126, 'Drink', './upload/passion-fruit-caipiroska.jpg', 0),
(3, 'Aperol spritz', 'Veneti loves it !', 7, 109, 'Drink', './upload/cookist-spritz-1200x1200.jpg', 0),
(4, 'Sangiovese', 'Perfect to drink with meat', 28, 100, 'Wine', './upload/sangiovese.jpg', 0),
(5, 'Champagne Brut', 'Amazing', 50, 95, 'Wine', './upload/ChampagneBrut.jpg', 0),
(6, 'Chianti', 'Fantastic', 15, 100, 'Wine', './upload/Chianti.jpg', 0),
(7, 'Coca cola', 'Coca cola 1,5 LT', 1.5, 347, 'Beverage', './upload/coca-cola.jpg', 0),
(8, 'Fanta', 'Fanta 45 cl', 2, 298, 'Beverage', './upload/Fanta45cl.jpg', 0),
(9, 'Lemon The', '', 2.5, 139, 'Beverage', './upload/TeLimone.JPG', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `totalorders`
--

CREATE TABLE `totalorders` (
  `orderID` int(100) NOT NULL,
  `userID` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `state` varchar(30) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `totalorders`
--

INSERT INTO `totalorders` (`orderID`, `userID`, `date`, `time`, `state`, `total`) VALUES
(1, 'Nick987', '2022-05-28', '02:14:53.000000', 'To prepare', 61.05),
(2, 'mariorossi99', '2022-05-28', '02:15:49.000000', 'To prepare', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `userID` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`userID`, `name`, `surname`, `birthdate`, `email`, `password`, `type`) VALUES
('Admin', 'Giulia', 'Farneto', '2000-12-07', 'giulia.farneto@gmail.com', '$2y$10$9tYWCBzVEFv/yuL50GUPVO/9zrkDw2Hrs5.ik0hoTU0CZ4H4L0196', 'Admin'),
('Express', 'Giancarlo', 'Olivato', '1997-12-23', 'giancarlo.olivato@gmail.com', '$2y$10$ie5HMQsm8nOTsnef8.nYz.StS5QOTRQ5Nd0pZZs6ZZxXi6JT.Z8au', 'Express'),
('mariorossi99', 'Mario', 'Rossi', '1987-11-12', 'marioross@gmail.com', '$2y$10$7gmqRItST89JK0R5QcQiWeQOOOstevlAGf5BLEeA0WH2rhFOs5aQe', 'User'),
('Nick987', 'Nicolo', 'Baldini', '1997-12-17', 'nicolo.baldini@gmail.com', '$2y$10$7gmqRItST89JK0R5QcQiWeQOOOstevlAGf5BLEeA0WH2rhFOs5aQe', 'User');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `drinkhandmade`
--
ALTER TABLE `drinkhandmade`
  ADD PRIMARY KEY (`drinkID`,`ingredientID`);

--
-- Indici per le tabelle `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredientID`);

--
-- Indici per le tabelle `notifneworder`
--
ALTER TABLE `notifneworder`
  ADD PRIMARY KEY (`notifID`);

--
-- Indici per le tabelle `notiforderready`
--
ALTER TABLE `notiforderready`
  ADD PRIMARY KEY (`notifID`);

--
-- Indici per le tabelle `notiforderstate`
--
ALTER TABLE `notiforderstate`
  ADD PRIMARY KEY (`notifID`);

--
-- Indici per le tabelle `notifsoldout`
--
ALTER TABLE `notifsoldout`
  ADD PRIMARY KEY (`notifID`);

--
-- Indici per le tabelle `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderID`,`articID`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indici per le tabelle `totalorders`
--
ALTER TABLE `totalorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT per la tabella `notifneworder`
--
ALTER TABLE `notifneworder`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `notiforderready`
--
ALTER TABLE `notiforderready`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `notiforderstate`
--
ALTER TABLE `notiforderstate`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT per la tabella `notifsoldout`
--
ALTER TABLE `notifsoldout`
  MODIFY `notifID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `totalorders`
--
ALTER TABLE `totalorders`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `totalorders`
--
ALTER TABLE `totalorders`
  ADD CONSTRAINT `totalorders_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
