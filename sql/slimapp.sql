-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 04:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slimapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `estudiante` (
  `id_est` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono_est` varchar(255) NOT NULL,
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estudiante`
--

INSERT INTO `estudiante` (`id_est`, `nombre`, `apellido`, `correo`, `telefono_est`) VALUES
(101,'Maria Paula','Perez Martinez','mariap@mail.com',5648215);
(102,'Maria Alejandra', 'Castañeda Martinez','castañeda25@mail.com', '3265984598');
(103,'Juan Camilo', 'Morales Rocha','jcrocha@mail.com',3256982301);
(104,'Laura Vanessa','Gutierrez Doncel','lauragd@mail.com','3156298427');
(105,'Lina Marcela','Paez Lara','linamarp@mail.com','3215963285');
(106,'Alan Brito','Parra Delgado','alanbrito@mail.com','3156248912');
(107,'Kyle','Garcia','Kgarcia@mail.com',3165928465);
(108,'Michael','Johnson','MichaelJ@mail.com',3826591);
(109,'Denisse','Smith','denisses@mail.com',3014681695);
(110,'Donald','Perez','Dperez@mail.com',329506515);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_est`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
