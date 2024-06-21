-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 21-Jun-2024 às 22:40
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `motorista`
--
CREATE DATABASE IF NOT EXISTS `motorista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `motorista`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastos`
--

CREATE TABLE IF NOT EXISTS `gastos` (
  `idgastos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `viagens_idviagens` int(11) NOT NULL,
  `motoristas_idmotoristas` int(11) NOT NULL,
  PRIMARY KEY (`idgastos`),
  KEY `fk_gastos_viagens1_idx` (`viagens_idviagens`),
  KEY `fk_gastos_motoristas1_idx` (`motoristas_idmotoristas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `gastos`
--

INSERT INTO `gastos` (`idgastos`, `descricao`, `viagens_idviagens`, `motoristas_idmotoristas`) VALUES
(1, 'Passagem: R$200,00', 1, 1),
(2, 'Passagem: R$200,00', 2, 2),
(3, 'Passagem: R$200,00', 3, 3),
(4, 'Combustível: R$300,00', 1, 1),
(5, 'Passagem: R$180,00', 11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE IF NOT EXISTS `motoristas` (
  `idmotoristas` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`idmotoristas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`idmotoristas`, `nome`, `email`, `senha`) VALUES
(1, 'Jorge Perez', 'jorgejf@gmail.com', 'senha123'),
(2, 'Carlos Nobrega', 'carlosjf@gmail.com', 'senha456'),
(3, 'Arlindo Cruz', 'arlindojf@gmail.com', 'senha789');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE IF NOT EXISTS `viagens` (
  `idviagens` int(11) NOT NULL AUTO_INCREMENT,
  `motoristas_idmotoristas` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idviagens`),
  KEY `fk_viagens_motoristas_idx` (`motoristas_idmotoristas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`idviagens`, `motoristas_idmotoristas`, `nome`) VALUES
(1, 1, 'Rio de Janeiro'),
(2, 2, 'Rio de Janeiro '),
(3, 3, 'Rio de Janeiro'),
(5, 2, 'Belo Horizonte '),
(6, 3, 'Belo Horizonte'),
(8, 2, 'São Paulo'),
(9, 3, 'São Paulo'),
(11, 1, 'São Paulo'),
(12, 1, 'Belo Horizonte'),
(17, 1, 'pao de açúcar'),
(18, 1, 'morro do cristo');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_gastos_motoristas1` FOREIGN KEY (`motoristas_idmotoristas`) REFERENCES `motoristas` (`idmotoristas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gastos_viagens1` FOREIGN KEY (`viagens_idviagens`) REFERENCES `viagens` (`idviagens`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `fk_viagens_motoristas` FOREIGN KEY (`motoristas_idmotoristas`) REFERENCES `motoristas` (`idmotoristas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
