-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 10:34 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

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
-- Table structure for table `aula`
--

CREATE TABLE `aula` (
  `numero` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descrizione` varchar(50) DEFAULT NULL,
  `type` enum('Attrezzatura Informatica','Aule speciali','Piano Rialzato','Primo Piano','Secondo Piano') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aula`
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `primo` varchar(20) NOT NULL,
  `secondo` varchar(20) NOT NULL,
  `messaggio` varchar(100) NOT NULL,
  `timestamp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `primo`, `secondo`, `messaggio`, `timestamp`) VALUES
(5, 'pirasalbe', 'esterno2', 'ciaone', '2017-04-22 07:50:46'),
(6, 'pirasalbe', 'giuliopertile', ':)', '2017-04-24 07:52:21'),
(7, 'pirasalbe', 'giuliopertile', ':(', '2017-04-22 07:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `cod` int(11) NOT NULL,
  `utente` varchar(20) NOT NULL,
  `aula` int(11) NOT NULL,
  `dettagli` varchar(50) NOT NULL,
  `inizio` varchar(20) NOT NULL,
  `fine` varchar(20) NOT NULL,
  `attiva` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prenotazioni`
--

INSERT INTO `prenotazioni` (`cod`, `utente`, `aula`, `dettagli`, `inizio`, `fine`, `attiva`) VALUES
(1, 'pirasalbe', 1, 'Prova', '2017-05-09 07:45:00', '2017-05-09 08:40:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` enum('si','no') NOT NULL DEFAULT 'no',
  `nome` varchar(20) NOT NULL,
  `attivo` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`username`, `password`, `admin`, `nome`, `attivo`) VALUES
('esterno2', '00f92437fac39095b06f11134ce8e624226bec76487d516cec438c15395ae228', 'no', 'Esterno 2', 'si'),
('giuliopertile', '0df55addf230c0040da973a7a30da952d9c107bb055314a7d3bdba3335ec099d', 'no', 'Giulio Pertile', 'si'),
('pirasalbe', '2db7cbcee0ceaf7f3ed31c3d278ec565481c4b2c4ae9f050661592bc46b7208d', 'si', 'Alberto Piras', 'si');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`numero`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
