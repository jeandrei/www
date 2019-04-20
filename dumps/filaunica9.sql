-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: 25-Mar-2019 às 19:52
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filaunica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id`, `nome`) VALUES
(1, 'ARMAÇÃO'),
(2, 'GRAVATA'),
(3, 'SANTA LIDIA'),
(4, 'PRAIA ALEGRE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`id`, `nome`, `bairro_id`, `logradouro`, `numero`) VALUES
(1, 'RUBENS', 1, '', 20),
(2, 'RQUEL', 2, '', 30),
(3, 'JOÃO ANTONIO PINTO', 2, '', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE `etapa` (
  `id` int(11) NOT NULL,
  `idade_minima` int(11) NOT NULL,
  `idade_maxima` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `etapa`
--

INSERT INTO `etapa` (`id`, `idade_minima`, `idade_maxima`, `descricao`) VALUES
(3, 724, 1088, 'MATERNAL'),
(19, 1089, 1454, 'PRÉ I'),
(21, 120, 358, 'BERÇÁRIO I'),
(22, 359, 723, 'BERÇÁRIO II');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fila`
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
-- Extraindo dados da tabela `fila`
--

INSERT INTO `fila` (`id`, `registro`, `responsavel`, `email`, `celular1`, `celular2`, `bairro_id`, `logradouro`, `numero`, `complemento`, `nomecrianca`, `nascimento`, `certidaonascimento`, `deficiencia`, `opcao1_id`, `opcao2_id`, `opcao3_id`, `turno1`, `observacao`, `comprovanteres`, `comprovantenasc`, `cpfresponsavel`, `protocolo`, `etapa_id`, `status`, `turno2`, `turno3`, `comprovante_res_nome`, `comprovante_nasc_nome`) VALUES
(4, '2019-03-22 00:00:00', 'SDFGSD', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 1, '', 'JEANDREI', '2018-12-12', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '', '12019', NULL, 'Aguardando', 'NULL', 'NULL', 'SDFGSD_COMP_RESIDENCIA.pdf', 'SDFGSD_CERT_NASCIMENTO.pdf'),
(5, '2019-03-22 00:01:00', 'AFD', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA TESTE', 0, '', 'JEANDREI', '2018-12-05', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '004.620.059-25', '52019', NULL, 'Aguardando', 'NULL', 'NULL', 'AFD_COMP_RESIDENCIA.pdf', 'AFD_CERT_NASCIMENTO.pdf'),
(6, '2019-03-22 00:02:00', 'AFD', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA TESTE', 0, '', 'JEANDREI WALTER', '2018-12-05', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '004.620.059-25', '62019', NULL, 'Aguardando', 'NULL', 'NULL', 'AFD_COMP_RESIDENCIA.pdf', 'AFD_CERT_NASCIMENTO.pdf'),
(7, '2019-03-22 00:03:00', 'JEANDREI WALTER', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DEXTER', '2018-12-06', 'afasfasdfajkljdflkja', '0', '3', '2', '1', '1', 'teste', 0x4172726179, 0x4172726179, '004.620.059-25', '72019', NULL, 'Aguardando', '1', '1', 'JEANDREI WALTER_COMP_RESIDENCIA.pdf', 'JEANDREI WALTER_CERT_NASCIMENTO.pdf'),
(8, '2019-03-22 00:04:00', 'JEANDREI WALTER', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DEXTER TESTE', '2018-12-06', 'afasfasdfajkljdflkja', '0', '3', '2', '1', '1', 'teste', 0x4172726179, 0x4172726179, '004.620.059-25', '82019', NULL, 'Aguardando', '1', '1', 'JEANDREI WALTER_COMP_RESIDENCIA.pdf', 'JEANDREI WALTER_CERT_NASCIMENTO.pdf'),
(9, '2019-03-22 00:05:00', 'JEANDREI WALTER', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'BELINHA W', '2018-12-06', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '', '92019', NULL, 'Aguardando', 'NULL', 'NULL', 'JEANDREI WALTER_COMP_RESIDENCIA.pdf', 'JEANDREI WALTER_CERT_NASCIMENTO.pdf'),
(10, '2019-03-22 00:06:00', 'JEAN', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DEX TESTE', '2018-12-05', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '', '102019', NULL, 'Aguardando', 'NULL', 'NULL', 'JEAN_COMP_RESIDENCIA.pdf', 'JEAN_CERT_NASCIMENTO.pdf'),
(11, '2019-03-22 00:07:00', 'JEAN', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DEX TESTEDFS', '2018-12-05', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '', '112019', NULL, 'Aguardando', 'NULL', 'NULL', 'JEAN_COMP_RESIDENCIA.pdf', 'JEAN_CERT_NASCIMENTO.pdf'),
(12, '2019-03-25 00:00:00', 'JEANDREI', '', '(47) 99116-9267', '', 1, 'TESTE', 0, '', 'BELINHA', '2018-12-06', '', '0', '3', 'NULL', 'NULL', '1', '', 0x4172726179, 0x4172726179, '', '122019', NULL, 'Aguardando', 'NULL', 'NULL', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(13, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 1, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI TESTE', '2018-11-14', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '132019', NULL, 'Aguardando', '2', '3', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(14, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '47991169267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAF', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '142019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(15, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAFDAFADSF', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '152019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(16, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAFDAFADSF FDFADSF', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '162019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(17, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAFDAFADSF FDFADSF FDFA', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '172019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(18, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAFDAFADSF FDFADSF FDFAFDF', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '182019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(19, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'JEANDREI DFAFDAFADSF FDFADSF FDFAFDFD', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '192019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(20, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DJEANDREI DFAFDAFADSF FDFADSF FDFAFDFDSADA', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '202019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf'),
(21, '2019-03-25 00:00:00', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 2, 'RUA MANOEL TOLENTINO DOS SANTOS, 93, CASA', 0, '', 'DJEANDREI DFAFDAFADSF FDFADSF FDFAFDFDSADAFSDF', '2018-11-15', '', '0', '3', '2', '1', '1', '', 0x4172726179, 0x4172726179, '', '212019', NULL, 'Aguardando', '1', '1', 'JEANDREI_COMP_RESIDENCIA.pdf', 'JEANDREI_CERT_NASCIMENTO.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fila`
--
ALTER TABLE `fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
