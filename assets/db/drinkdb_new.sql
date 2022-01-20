-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 20, 2022 alle 22:00
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

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
(7, 1, 4),
(8, 2, 1),
(8, 3, 1),
(9, 1, 6),
(10, 4, 8),
(10, 5, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `liquidingredient`
--

CREATE TABLE `liquidingredient` (
  `ingredientID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qtystock` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `liquidingredient`
--

INSERT INTO `liquidingredient` (`ingredientID`, `name`, `qtystock`, `price`, `type`, `img`) VALUES
(7, 'Vodka', 6, 4, 'Spirits', ''),
(8, 'Rum', 6, 1, 'Spirits', ''),
(9, 'Aranciata', 4, 1, 'Beverages', ''),
(10, 'Limone', 1, 6, 'Beverages', ''),
(11, 'Prosecco', 3, 8, 'Wine', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderID` int(255) NOT NULL,
  `articID` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `orderdetails`
--

INSERT INTO `orderdetails` (`orderID`, `articID`, `qty`) VALUES
(1, 1, 2),
(1, 2, 2),
(2, 10, 2),
(3, 4, 7),
(4, 5, 6),
(5, 6, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `productID` int(255) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `qtystock` int(255) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`productID`, `name`, `description`, `price`, `qtystock`, `type`, `img`) VALUES
(1, 'Mojito', 'Buono', 4, 50, 'Default drink', ''),
(2, 'Vodka', 'Questo è super', 1, 24, 'Spirits', ''),
(3, 'Chianti', 'Ottimo per la carne', 4, 54, 'Wine', ''),
(4, 'Fanta', 'Con le bollicine', 6, 50, 'Beverages', ''),
(5, 'Prosecco', 'Vino bianco', 8, 10, 'Wine', ''),
(6, 'Rum', 'Dì ciao alla tua dignità', 9, 10, 'Spirits', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `totalorders`
--

CREATE TABLE `totalorders` (
  `orderID` int(100) NOT NULL,
  `userID` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `totalorders`
--

INSERT INTO `totalorders` (`orderID`, `userID`, `date`, `time`, `state`) VALUES
(1, 'Pippo123', '2021-12-06', '15:59:53.767000', 'Delivered'),
(2, 'Nick987', '2021-12-07', '15:59:59.588000', 'Ready for delivery'),
(3, 'Ale634', '2021-12-07', '17:55:53.044000', 'To prepare'),
(4, 'Franci31', '2021-12-08', '10:00:00.588000', 'To prepare'),
(5, 'Nick987', '2021-12-08', '10:00:00.664000', 'Ready to delivery');

-- --------------------------------------------------------

--
-- Struttura della tabella `unitingredient`
--

CREATE TABLE `unitingredient` (
  `ingredientID` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qtystock` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `unitingredient`
--

INSERT INTO `unitingredient` (`ingredientID`, `name`, `qtystock`, `price`, `img`) VALUES
(1, 'Ghiaccio', 6, 4, ''),
(2, 'Menta', 6, 1, ''),
(3, 'Cannella', 4, 1, ''),
(4, 'Lime', 1, 6, ''),
(5, 'Lime', 1, 6, ''),
(6, 'Marshmallow', 3, 8, '');

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
('Admin12', 'Giulia', 'Farneto', '2000-12-07', 'giulia.farneto@gmail.com', 'sosos', 'Admin'),
('Ale634', 'Alessia', 'Zucchini', '1996-04-03', 'alessia.zucchini@gmail.com', 'Ale9qwerty', 'User'),
('Alessio634', 'Alessia', 'Zucchini', '1996-04-03', 'alessia.zucchini@gmail.com', 'Ale9qwerty', 'User'),
('Express', 'Giancarlo', 'Olivato', '1997-12-23', 'giancarlo.olivato@gmail.com', 'madafaca', 'Express'),
('Franci31', 'Francesca', 'Bonucci', '1998-12-18', 'francesca.bonucci@gmail.com', 'abc123', 'User'),
('Nick987', 'Nicolo', 'Baldini', '1997-12-17', 'nicolo.baldini@gmail.com', 'Kiloporst', 'User'),
('Pippo123', 'Filippo', 'Bonini', '1999-12-02', 'filippo.bonini@gmail.com', 'passfilo', 'User');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `drinkhandmade`
--
ALTER TABLE `drinkhandmade`
  ADD PRIMARY KEY (`drinkID`,`ingredientID`);

--
-- Indici per le tabelle `liquidingredient`
--
ALTER TABLE `liquidingredient`
  ADD PRIMARY KEY (`ingredientID`);

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
-- Indici per le tabelle `unitingredient`
--
ALTER TABLE `unitingredient`
  ADD PRIMARY KEY (`ingredientID`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `liquidingredient`
--
ALTER TABLE `liquidingredient`
  MODIFY `ingredientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT per la tabella `totalorders`
--
ALTER TABLE `totalorders`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `unitingredient`
--
ALTER TABLE `unitingredient`
  MODIFY `ingredientID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
