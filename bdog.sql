-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Nov-2018 às 14:21
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
  `logitude_y` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Extraindo dados da tabela `tbog`
--



--
-- Estrutura da tabela `usuarios`
--

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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nom_usuario`, `login`, `pwd_usuario`, `nivel`, `ds_status`, `cadastrado`) VALUES
(1, 'Leandro Ramalho', 'leandro', '81dc9bdb52d04dc20036dbd8313ed055', 'Sup', 'Ativo', '0000-00-00'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbog`
--
ALTER TABLE `tbog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
