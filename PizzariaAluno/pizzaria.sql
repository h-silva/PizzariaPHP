-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Abr-2018 às 15:05
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(100) COLLATE utf8_bin NOT NULL,
  `salarioBase` float NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`codigo`, `nome`, `descricao`, `salarioBase`) VALUES
(5, 'Gerente', 'Organizar papelada', 7000),
(6, 'Garçom', 'Servir Pessoas', 1500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comanda`
--

DROP TABLE IF EXISTS `comanda`;
CREATE TABLE IF NOT EXISTS `comanda` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dataCompra` datetime NOT NULL,
  `formaPagamento` varchar(45) COLLATE utf8_bin NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `codigoFuncionario` int(11) NOT NULL,
  `codigoPizza` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigoFuncionario` (`codigoFuncionario`),
  KEY `codigoPizza` (`codigoPizza`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `comanda`
--

INSERT INTO `comanda` (`codigo`, `dataCompra`, `formaPagamento`, `status`, `codigoFuncionario`, `codigoPizza`) VALUES
(4, '2011-10-20 00:00:00', 'À Vista', 'A Pagar', 3, 7),
(5, '2008-11-10 00:00:00', 'À Vista', 'Paga', 2, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `cpf` varchar(45) COLLATE utf8_bin NOT NULL,
  `dataAdmissao` datetime NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `codigoCargo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo`, `nome`, `cpf`, `dataAdmissao`, `status`, `codigoCargo`) VALUES
(1, 'Joao', '45441', '1997-12-26 00:00:00', 'Ativo', 1),
(2, 'Ellen Soares', '4615246815', '2002-02-26 00:00:00', 'Ativo', 6),
(3, 'Heitor Augusto', '4613214523', '2005-10-26 00:00:00', 'Ativo', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `ingredientes` varchar(100) COLLATE utf8_bin NOT NULL,
  `valor` float NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pizza`
--

INSERT INTO `pizza` (`codigo`, `nome`, `ingredientes`, `valor`, `status`, `tipo`) VALUES
(6, 'Calabresa', 'Calabresa,massa,cebola', 60, 'disponivel', 'salgado'),
(7, 'Bacon', 'Massa,Bacon,cebola,mussarela', 60, 'disponivel', 'salgado'),
(8, 'Chocolate', 'chocolate,massa', 70, 'indisponivel', 'salgado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rosicleidemaria`
--

DROP TABLE IF EXISTS `rosicleidemaria`;
CREATE TABLE IF NOT EXISTS `rosicleidemaria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(45) COLLATE utf8_bin NOT NULL,
  `ultimoNome` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `rosicleidemaria`
--

INSERT INTO `rosicleidemaria` (`codigo`, `primeiroNome`, `ultimoNome`) VALUES
(5, 'Rosicleia', 'Maria'),
(6, 'Rosicleide', 'Maria');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`codigoFuncionario`) REFERENCES `funcionario` (`codigo`),
  ADD CONSTRAINT `comanda_ibfk_2` FOREIGN KEY (`codigoPizza`) REFERENCES `pizza` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
