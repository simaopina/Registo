-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Abr-2018 às 19:15
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nome` varchar(20) NOT NULL,
  `Apelido` varchar(20) NOT NULL,
  `Morada` varchar(50) NOT NULL,
  `Codigo_Postal` varchar(8) DEFAULT NULL,
  `Codigo_Postal2` varchar(3) DEFAULT NULL,
  `Localidade` varchar(20) NOT NULL,
  `Pais` varchar(30) NOT NULL,
  `NIF` int(9) DEFAULT NULL,
  `Telefone` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`ID`, `Email`, `Password`, `Nome`, `Apelido`, `Morada`, `Codigo_Postal`, `Codigo_Postal2`, `Localidade`, `Pais`, `NIF`, `Telefone`) VALUES
(72, 'simao@pina.com.pt', '1', 'sdas', '', 'Rua Vale de Limos', '2600', '260', 'Ribamar', 'PRT', 123123123, 912312931),
(73, 'simasdsaao@pina.com.pt', '1', 'asdasd', 'asdasd', 'Rua Vale de Limos', '2600', '260', 'Ribamar', 'PRI', 123123123, 912312931);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
