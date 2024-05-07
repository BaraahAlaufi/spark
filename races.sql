-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 08:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `ID` INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `round` varchar(50) NOT NULL,
  `circuit` varchar(100) NOT NULL,
  `date` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`round`, `circuit`, `date`) VALUES
('Round 1', 'Bahrain International Circuit', '29 FEB - 02 MAR'),
('Round 2', 'Jedda Cornich Circuit, Saudi Arabia', '07 MAR - 09 MAR'),
('Round 3', 'Melbourne Grand Prix Circuit, Australia', '22 MAR - 24 MAR'),
('Round 4', 'Suzuka International Racing Course, Japan', '05 APR - 07 APR'),
('Round 5', 'Shanghai International Circuit, China', '19 APR - 21 APR'),
('Round 6', ' Miami International Autodrome, United States', '03 MAY - 06 MAY'),
('Round 7', 'Autodromo Enzo e Dino Ferrari, Italy', '17 MAY - 19 MAY'),
('Round 8', 'Circuit de Monaco, Monaco', '24 MAY - 26 MAY'),
('Round 9', 'Circuit Gilles-Villeneuve, Canada', '07 JUN - 09 JUN'),
('Round 10', 'Circuit de Barcelona-Catalunya, Spain', '21 JUN - 23 JUN'),
('Round 11', 'Red Bull Ring, Austria', '28 JUN - 30 JUN'),
('Round 12', 'Silverstone Circuit, Great Britain', '05 JUL - 07 JUL'),
('Round 13', 'Hungaroring, Hungary', '19 JUL - 21 JUL'),
('Round 14', 'Circuit de Spa-Francorchamps, Belgium', '26 JUL - 28 JUL'),
('Round 15', ' Circuit Zandvoort, Netherlands', '23 AUG - 25 AUG'),
('Round 16', 'Autodromo Nazionale Monza, Italy', '30 AUG - 01 SEP'),
('Round 17', 'Baku City Circuit, Azerbaijan', '13 SEP - 15 SEP'),
('Round 18', 'Marina Bay Street Circuit, Singapore', '20 SEP - 22 SEP'),
('Round 19', 'Circuit of the Americas, United States', '18 OCT - 20 OCT'),
('Round 20', 'Autódromo Hermanos Rodríguez, Mexico', '25 OCT - 27 OCT'),
('Round 21', 'Autódromo José Carlos Pace, Brazil', '01 NOV - 03 NOV'),
('Round 22', 'Las Vegas Strip Circuit, United States', '21 NOV - 23 NOV'),
('Round 23', 'Lusail International Circuit, Qatar', '29 NOV - 01 DEC'),
('Round 24', 'Yas Marina Circuit, Abu Dhabi', '06 DEC - 08 DEC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
