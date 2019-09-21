-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 05:33 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb_artur`
--
CREATE DATABASE IF NOT EXISTS `mydb_artur` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb_artur`;

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `iddias` int(11) NOT NULL,
  `ponto_turistico` varchar(255) DEFAULT NULL,
  `imagempage` varchar(45) DEFAULT NULL,
  `imagens` varchar(255) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `programas_idprograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`iddias`, `ponto_turistico`, `imagempage`, `imagens`, `descricao`, `programas_idprograma`) VALUES
(1, 'Dia 1: Statue of Liberty\r\n, Dia 2: Central Park, Dia 3: Empire State Building, Dia 4: Theatre District, Dia 5: The Museum of Modern Art', '../imagens/newyorkpage.jpg', '../imagens/day1.jpg,../imagens/day2.jpg,../imagens/day3.jpg,../imagens/day4.jpg, ../imagens/day5.jpg', '<p>Localizada numa pequena ilha à entrada do porto de Nova Iorque,  a <strong>Estátua da Liberdade</strong> é um grandioso monumento da cidade.</p>\r\n<p>\r\nÉ aclamada ser um Património Mundial da UNESCO.</p>\r\n<p>\r\nDesde 2007 é também considerada uma das Sete Novas Maravilhas do Mundo.;Envolvido no centro da cidade, o <strong>Central Park</strong> é o grande “pulmão” de Nova Iorque.</p>\r\n<p>\r\nInaugurado em 1857, é considerado por muitos nova-iorquinos um paraíso e refúgio da região.</p>\r\n<p>\r\nÉ um dos lugares onde as pessoas podem diminuir o ritmo frenético que a cidade exige.</p>;\r\n<p>\r\nO <strong>Empire State Building</strong> é um arranha-céus de 102 andares no centro de Nova Iorque.</p>\r\n<p>\r\nCom uma altura de 381 metros, foi o edifício mais alto do mundo por mais de 40 anos, desde a sua\r\nconclusão em 1931.</p>\r\n<p>\r\nA sua estrutura pertence ao estilo arquitectónico Art Deco.</p>;\r\n<p>\r\nLocal das famosas praças de <strong>Times Square</strong>, sob as luzes de enormes painéis publicitários digitais.</p>\r\n<p>\r\nHabitantes locais e turistas não dispensam a grande escadaria vermelha das bilheteiras para\r\nespetáculos da <strong>Broadway</strong> em teatros históricos da área.</p>\r\n<p>\r\nE na grande <strong>42nd Street</strong> existem diversas lojas e restaurantes para todos os gostos.</p>;\r\n<p>\r\nInaugurado no ano de 1929, o <strong>Museu de Arte Moderna</strong> é atualmente dos mais famosos e importantes museus de arte no mundo.</p>\r\n<p>\r\nAqui é possível contemplar-se obras de notáveis artistas como Van Gogh, Warbol, Kandinsky, Mondrian, entre muitos outros.</p>\r\n<p>\r\nÉ oferecido este quinto dia exclusivamente aos membros da Travelity.</p>', 4);

-- --------------------------------------------------------

--
-- Table structure for table `edicoes`
--

CREATE TABLE `edicoes` (
  `idedicao` int(11) NOT NULL,
  `edicao` datetime DEFAULT NULL,
  `programas_idprograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `idnews` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`idnews`, `email`, `date_created`) VALUES
(4, 'user0@gmail.com', '2019-06-25 13:31:22'),
(5, 'user00@gmail.com', '2019-06-25 13:31:58'),
(6, 'user000@gmail.com', '2019-06-25 13:32:11'),
(7, 'user123@gmail.com', '2019-06-25 13:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `participacoes`
--

CREATE TABLE `participacoes` (
  `utilizadores_idusers` int(11) NOT NULL,
  `edicoes_idedicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `programas`
--

CREATE TABLE `programas` (
  `idprograma` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `totalpermitido` int(11) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `preco` varchar(45) DEFAULT NULL,
  `gostos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programas`
--

INSERT INTO `programas` (`idprograma`, `titulo`, `imagem`, `totalpermitido`, `vagas`, `dias`, `preco`, `gostos`) VALUES
(1, 'Londres, Inglaterra', 'imagens/london.png', 25, 25, 5, '220', '55'),
(2, 'Budapeste, Hungria', 'imagens/budapest.png', 25, 25, 5, '320', '36'),
(3, 'Porto, Portugal', 'imagens/porto.png', 25, 25, 5, '110', '23'),
(4, 'Nova Iorque, EUA', 'imagens/newyork.png', 25, 25, 5, '420', '76');

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `idusers` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`iddias`),
  ADD KEY `fk_dias_programas1_idx` (`programas_idprograma`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`idedicao`),
  ADD KEY `fk_edicoes_programas_idx` (`programas_idprograma`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`idnews`);

--
-- Indexes for table `participacoes`
--
ALTER TABLE `participacoes`
  ADD PRIMARY KEY (`utilizadores_idusers`,`edicoes_idedicao`),
  ADD KEY `fk_utilizadores_has_edicoes_edicoes1_idx` (`edicoes_idedicao`),
  ADD KEY `fk_utilizadores_has_edicoes_utilizadores1_idx` (`utilizadores_idusers`);

--
-- Indexes for table `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `idnews` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dias`
--
ALTER TABLE `dias`
  ADD CONSTRAINT `fk_dias_programas1` FOREIGN KEY (`programas_idprograma`) REFERENCES `programas` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD CONSTRAINT `fk_edicoes_programas` FOREIGN KEY (`programas_idprograma`) REFERENCES `programas` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `participacoes`
--
ALTER TABLE `participacoes`
  ADD CONSTRAINT `fk_utilizadores_has_edicoes_edicoes1` FOREIGN KEY (`edicoes_idedicao`) REFERENCES `edicoes` (`idedicao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilizadores_has_edicoes_utilizadores1` FOREIGN KEY (`utilizadores_idusers`) REFERENCES `utilizadores` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
