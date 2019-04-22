-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 22/01/2019 às 00:06
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
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `fila`
--

CREATE TABLE `fila` (
  `id` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responsavel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular1` varchar(16) NOT NULL,
  `celular2` varchar(16) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `nomecrianca` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `certidaonascimento` varchar(50) NOT NULL,
  `deficiencia` char(3) NOT NULL DEFAULT 'Não',
  `opcao1_id` int(11) NOT NULL,
  `opcao2_id` int(11) NOT NULL,
  `opcao3_id` int(11) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `observacao` varchar(255) NOT NULL,
  `comprovanteres` blob NOT NULL,
  `comprovantenasc` blob NOT NULL,
  `cpfresponsavel` varchar(15) NOT NULL,
  `protocolo` varchar(255) NOT NULL
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
-- Índices de tabela `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpfresponsavel` (`cpfresponsavel`),
  ADD KEY `bairro_id` (`bairro_id`),
  ADD KEY `opcao1_id` (`opcao1_id`),
  ADD KEY `opcao2_id` (`opcao2_id`),
  ADD KEY `opcao3_id` (`opcao3_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fila`
--
ALTER TABLE `fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `fila`
--
ALTER TABLE `fila`
  ADD CONSTRAINT `fila_ibfk_1` FOREIGN KEY (`bairro_id`) REFERENCES `bairro` (`id`),
  ADD CONSTRAINT `fila_ibfk_2` FOREIGN KEY (`opcao1_id`) REFERENCES `escola` (`id`),
  ADD CONSTRAINT `fila_ibfk_3` FOREIGN KEY (`opcao2_id`) REFERENCES `escola` (`id`),
  ADD CONSTRAINT `fila_ibfk_4` FOREIGN KEY (`opcao3_id`) REFERENCES `escola` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
