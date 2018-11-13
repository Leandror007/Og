-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2018 às 23:37
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `maps`
--

CREATE TABLE `maps` (
  `id` int(11) NOT NULL,
  `regiao` varchar(6) NOT NULL,
  `latitude_x` varchar(60) NOT NULL,
  `longitude_y` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maps`
--

INSERT INTO `maps` (`id`, `regiao`, `latitude_x`, `longitude_y`, `cidade`) VALUES
(1, 'ula', '-18.956505', '-48.258109', 'Uberlandia'),
(2, 'ari', '-18.649588', '-48.126101', 'Araguari'),
(3, 'spo', '-23.767283', '-46.657220', 'Sao Paulo'),
(4, 'rjo', '-22.901480', '-43.256735', 'Rio de Janeiro'),
(5, 'bsa', '-15.963677', '-47.802936', 'Brasilia'),
(6, 'rpo', '-21.272188', '-47.774538', 'RibeirÃ£o Preto'),
(7, 'jai', '-23.3316205', '-48.3671983', 'Jundiai'),
(8, 'vin', '-23.0373573', '-47.5001287', 'Vinhedo'),
(9, 'cas', '-22.907347', '-46.980092', 'Campinas'),
(10, 'soc', '-21.272188', '-47.774538', 'Sorocaba'),
(11, 'bet', '-19.963802', '-44.152356', 'Betim'),
(12, 'pms', '-18.592590', '-46.475139', 'Patos de Minas'),
(13, 'itui', '-18.975037', '-49.419403', 'Ituiutaba'),
(14, 'bhe', '-19.907826', '-43.981975', 'Belo Horizonte'),
(15, 'axa', '-19.583659', '-46.910176', 'Araxa'),
(16, 'pau', '-22.747435', '-47.153621', 'Paulinia'),
(19, 'Teste', '-8.78987988', '-9.9546546', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbog`
--

CREATE TABLE `tbog` (
  `id` int(11) NOT NULL,
  `assunto` varchar(250) NOT NULL,
  `og` varchar(20) NOT NULL,
  `notas` text NOT NULL,
  `regional` varchar(100) NOT NULL,
  `obs` text NOT NULL,
  `dtacionamento` date NOT NULL,
  `hracionamento` varchar(6) NOT NULL,
  `dataabertura` datetime NOT NULL,
  `datafechamento` datetime NOT NULL,
  `codencerramento` varchar(20) NOT NULL,
  `dtfechamento` date NOT NULL,
  `hrfechamento` time NOT NULL,
  `_status` varchar(10) NOT NULL,
  `semana` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(50) NOT NULL DEFAULT '',
  `login` varchar(50) NOT NULL DEFAULT '',
  `pwd_usuario` varchar(255) NOT NULL DEFAULT '',
  `nivel` varchar(20) NOT NULL DEFAULT '',
  `ds_status` varchar(20) NOT NULL,
  `cadastrado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cadastro de Usuários';

--
-- Extraindo dados da tabela `usuarios` ----
--

INSERT INTO `usuarios` (`cod_usuario`, `nom_usuario`, `login`, `pwd_usuario`, `nivel`, `ds_status`, `cadastrado`) VALUES
(1, 'Leandro', 'leandro', '81dc9bdb52d04dc20036dbd8313ed055', 'Sup', 'Ativo', '0000-00-00'),
(2, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 'Sup', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbog`
--
ALTER TABLE `tbog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbog`
--
ALTER TABLE `tbog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
