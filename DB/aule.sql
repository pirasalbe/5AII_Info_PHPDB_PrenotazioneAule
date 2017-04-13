-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 13, 2017 alle 15:21
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aule`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `aula`
--

CREATE TABLE `aula` (
  `numero` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(50) DEFAULT NULL,
  `type` enum('Attrezzatura Informatica','Aule speciali','Piano Rialzato','Primo Piano','Secondo Piano') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `aula`
--

INSERT INTO `aula` (`numero`, `nome`, `descrizione`, `type`) VALUES
(1, 'PC Port. 1 LENOVO 01', 'PC Port. 1 LENOVO 01', 'Attrezzatura Informatica'),
(2, 'PC Port. 2 LENOVO 02', 'PC Port. 2 LENOVO 02', 'Attrezzatura Informatica'),
(10, '10', '10', 'Secondo Piano'),
(11, '11', '11', 'Secondo Piano'),
(29, '29', '29', 'Primo Piano'),
(30, '30', '30', 'Primo Piano'),
(35, 'Aula 35 Lim', 'Aula 35 Lim', 'Aule speciali'),
(38, 'Aula 38 Umanistico', 'Aula 38 Umanistico', 'Aule speciali'),
(188, '188', '188', 'Piano Rialzato'),
(190, '190', '190', 'Piano Rialzato');

-- --------------------------------------------------------

--
-- Struttura della tabella `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `primo` varchar(20) NOT NULL,
  `secondo` varchar(20) NOT NULL,
  `messaggio` varchar(100) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `utente` varchar(20) NOT NULL,
  `aula` int(11) NOT NULL,
  `dettagli` varchar(50) NOT NULL,
  `inizio` varchar(20) NOT NULL,
  `fine` varchar(20) NOT NULL,
  `attiva` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`utente`, `aula`, `dettagli`, `inizio`, `fine`, `attiva`) VALUES
('giuliopertile', 2, 'prova', '2017-04-13 08:40:00', '2017-04-13 12:35:00', 'si');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` enum('si','no') NOT NULL DEFAULT 'no',
  `nome` varchar(20) NOT NULL,
  `attivo` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`username`, `password`, `admin`, `nome`, `attivo`) VALUES
('esterno1', 'rossiesterno1', 'no', 'Esterno', 'no'),
('giuliopertile', 'banane', 'no', 'Giulio Pertile', 'si'),
('pirasalbe', 'chicco70', 'si', 'Alberto Piras', 'si');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`numero`);

--
-- Indici per le tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`utente`,`aula`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
