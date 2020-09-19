-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Set-2020 às 20:51
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbvenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomecli` varchar(30) NOT NULL,
  `fonecli` varchar(15) NOT NULL,
  `emailcli` varchar(30) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nomecli`, `fonecli`, `emailcli`) VALUES
(1, 'Raphael Moraes', '86868686', 'raphael@moraes.com'),
(2, 'Marcio Shibata', '11111111', 'marcio@shibata.com'),
(3, 'Maria Moraes', '85858585', 'maria@moraes.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `idvenda` varchar(11) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `itemvenda` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorunid` double NOT NULL,
  `valortotal` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idvenda`, `idcliente`, `itemvenda`, `quantidade`, `valorunid`, `valortotal`) VALUES
('1', 2, 'NOTEBOOK ASUS', 1, 2500, 2500),
('2', 1, 'MONITOR AOC', 1, 450, 450),
('2', 1, 'TECLADO MICROSOFT', 1, 120, 120),
('2', 1, 'MOUSE MICROSOFT', 1, 80, 80),
('3', 1, 'TECLADO MICROSSOFT', 1, 80, 80),
('3', 1, 'CELULAR SAMSUNG', 1, 1180, 1180),
('4', 3, 'LUMINARIA MULTLASER', 1, 70, 70),
('4', 3, 'REGUA MULTLASER', 1, 50, 50),
('4', 3, 'HUB USB MULTLASER', 1, 80, 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `idvenda` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `valortotal` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`idvenda`, `idcliente`, `valortotal`) VALUES
(1, 2, 2500),
(2, 1, 650),
(3, 1, 1260),
(4, 3, 200);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
