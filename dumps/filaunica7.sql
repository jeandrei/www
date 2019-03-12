-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 12/03/2019 às 01:48
-- Versão do servidor: 5.7.23
-- Versão do PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filaunica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `bairro`
--

INSERT INTO `bairro` (`id`, `nome`) VALUES
(1, 'ARMAÇÃO'),
(2, 'GRAVATA'),
(3, 'SANTA LIDIA'),
(4, 'PRAIA ALEGRE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `escola`
--

INSERT INTO `escola` (`id`, `nome`, `bairro_id`, `logradouro`, `numero`) VALUES
(1, 'RUBENS', 1, '', 20),
(2, 'RQUEL', 2, '', 30),
(3, 'JOÃO ANTONIO PINTO', 2, '', 20);

-- --------------------------------------------------------

--
-- Estrutura para tabela `etapa`
--

CREATE TABLE `etapa` (
  `id` int(11) NOT NULL,
  `idade_minima` int(11) NOT NULL,
  `idade_maxima` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `etapa`
--

INSERT INTO `etapa` (`id`, `idade_minima`, `idade_maxima`, `descricao`) VALUES
(3, 2, 3, 'MATERNAL I'),
(12, 20, 20, 'MATERNAL II'),
(19, 20, 20, 'PRÉ'),
(20, 20, 20, 'PRÉ II'),
(21, 24, 48, 'PENHA MATERNAL II');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fila`
--

CREATE TABLE `fila` (
  `id` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responsavel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `celular1` varchar(16) NOT NULL,
  `celular2` varchar(16) DEFAULT NULL,
  `bairro_id` int(11) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `nomecrianca` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `certidaonascimento` varchar(50) NOT NULL,
  `deficiencia` varchar(1) NOT NULL DEFAULT '0',
  `opcao1_id` varchar(11) DEFAULT NULL,
  `opcao2_id` varchar(11) DEFAULT NULL,
  `opcao3_id` varchar(11) DEFAULT NULL,
  `turno1` varchar(20) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `comprovanteres` blob NOT NULL,
  `comprovantenasc` blob NOT NULL,
  `cpfresponsavel` varchar(15) DEFAULT NULL,
  `protocolo` varchar(255) DEFAULT NULL,
  `etapa_id` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Aguardando',
  `turno2` varchar(20) DEFAULT NULL,
  `turno3` varchar(20) DEFAULT NULL,
  `comprovante_res_nome` varchar(60) DEFAULT NULL,
  `comprovante_nasc_nome` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `fila`
--
ALTER TABLE `fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
