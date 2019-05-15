-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 06/05/2019 às 19:02
-- Versão do servidor: 5.7.25
-- Versão do PHP: 7.2.14

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
-- Despejando dados para a tabela `bairro`
--

INSERT INTO `bairro` (`id`, `nome`) VALUES
(5, 'Armação'),
(6, 'Gravata'),
(7, 'Santa Lídia'),
(8, 'Praia Alegra'),
(9, 'Centro'),
(10, 'São Nicolau'),
(11, 'NSra de Fátima'),
(12, 'São Cristovão');

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
-- Despejando dados para a tabela `escola`
--

INSERT INTO `escola` (`id`, `nome`, `bairro_id`, `logradouro`, `numero`) VALUES
(4, 'CEI ANJOS DO ITAPOCOROI', 1, 'Avenida São João', 445),
(5, 'CEI DONA BELINHA', 3, 'Rua Vereador Arnô Reinaldo da Silva', 0),
(6, 'CEI MARA LÚCIA DE SOUZA DE MELO', 1, 'Rua Vereador Arnô Reinaldo da Silva', 0),
(7, 'CEI PINGO DE GENTE', 1, 'RUA ABÍLIO DE SOUZA - TRAV. BARBACENA', 488),
(8, 'CEI PROFª ORLANDINA BENTO MENDES', 3, 'Rua Antônio João Caldeira', 0),
(9, 'CEI PROFESSORA SIMONE APARECIDA REIS DE SOUZA', 5, 'Rua Lauro Zimerman Filho', 200),
(10, 'CRECHE CASA DA AMIZADE', 5, 'Rua Artur Silvino dos Reis', 63),
(11, 'CRECHE MUNICIPAL JOÃO BATISTA DA CRUZ', 5, 'Rua João Carlos Alves', 40),
(12, 'CRECHE MUNICIPAL TEREZINHA MARLENE CORREIA', 5, 'Rua Maria Joaquina Bento', 85);

-- --------------------------------------------------------

--
-- Estrutura para tabela `etapa`
--

CREATE TABLE `etapa` (
  `id` int(11) NOT NULL,
  `data_ini` date DEFAULT NULL,
  `data_fin` date DEFAULT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `etapa`
--

INSERT INTO `etapa` (`id`, `data_ini`, `data_fin`, `descricao`) VALUES
(1, '2018-04-01', '2019-12-31', 'BERÇÁRIO-I'),
(2, '2017-04-01', '2018-03-31', 'BERÇÁRIO-II'),
(3, '2016-04-01', '2017-03-31', 'MATERNAL'),
(4, '2015-04-01', '2016-03-31', 'PRÉ-I');

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
  `comprovanteres` longblob NOT NULL,
  `comprovanteres_tipo` varchar(50) DEFAULT NULL,
  `comprovantenasc` longblob NOT NULL,
  `comprovantenasc_tipo` varchar(50) DEFAULT NULL,
  `cpfresponsavel` varchar(15) DEFAULT NULL,
  `protocolo` varchar(255) DEFAULT NULL,
  `etapa_id` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Aguardando',
  `turno2` varchar(20) DEFAULT NULL,
  `turno3` varchar(20) DEFAULT NULL,
  `comprovante_res_nome` varchar(255) DEFAULT NULL,
  `comprovante_nasc_nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `fila`
--

INSERT INTO `fila` (`id`, `registro`, `responsavel`, `email`, `celular1`, `celular2`, `bairro_id`, `logradouro`, `numero`, `complemento`, `nomecrianca`, `nascimento`, `certidaonascimento`, `deficiencia`, `opcao1_id`, `opcao2_id`, `opcao3_id`, `turno1`, `observacao`, `comprovanteres`, `comprovanteres_tipo`, `comprovantenasc`, `comprovantenasc_tipo`, `cpfresponsavel`, `protocolo`, `etapa_id`, `status`, `turno2`, `turno3`, `comprovante_res_nome`, `comprovante_nasc_nome`) VALUES
(22, '2019-03-22 00:01:00', '	RESPONSAVEL PELO ALUNO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 10, '	Teste	', '	José da Silva	', '2018-12-12', '9999', '0', '1', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	004.620.059-25', '12019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(23, '2019-03-22 00:02:00', '	FABRIELE LUZIA BENTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 11, '	Teste	', '	ARTHUR MOREIRA MORAES	', '2018-04-23', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	058.428.459-46', '22019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(24, '2019-03-22 00:03:00', '	AMANDA DE JESUS LIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 12, '	Teste	', '	AMANDA BENTIVOGLIO RODRIGUES	', '2018-06-14', '9999', '0', '3', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	108.561.687-85', '32019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(25, '2019-03-22 00:04:00', '	MARIA TEREZA BENTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 13, '	Teste	', '	NICOLAS CALEB DE FREITAS	', '2017-11-01', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	049.571.459-38', '42019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(26, '2019-03-22 00:05:00', '	LUCIANA JOANINI TAVARES	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 14, '	Teste	', '	ALICE LENOIR DOS SANTOS GOMES	', '2018-01-31', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	051.620.439-40', '52019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(27, '2019-03-22 00:06:00', '	IVETE TARNOWSKI	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 15, '	Teste	', '	ANTONY SAUTNER	', '2018-03-23', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	866.300.169-04', '62019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(28, '2019-03-22 00:07:00', '	CARINE APARECIDA RODRIGUES ANTUNES	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 16, '	Teste	', '	NATHALI ISNAÉLY FELISBINO	', '2018-10-27', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	087.702.589-45', '72019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(29, '2019-03-22 00:08:00', '	THALITA NAIR PEREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 17, '	Teste	', '	ISAQUE LUIZ DA SILVA CAMILO	', '2017-07-06', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	065.293.639-39', '82019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(30, '2019-03-22 00:09:00', '	TEREZA JAZINSKI	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 18, '	Teste	', '	JOSUÉ ALESSANDRO MATEUS	', '2017-12-28', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	861.226.579-72', '92019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(31, '2019-03-22 00:10:00', '	SIMONE PATRICIA BRUNER	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 19, '	Teste	', '	VINÍCIUS ANDRÉ KIRCHNER FILHO	', '2018-10-10', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	702.329.389-20', '102019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(32, '2019-03-22 00:11:00', '	TAINARA DE FREITAS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 20, '	Teste	', '	LAURA TRENTINI	', '2017-08-22', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	107.710.959-88', '112019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(33, '2019-03-22 00:12:00', '	BIANCA RODRIGUES DOS SANTOS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 21, '	Teste	', '	DAVI FERNANDO CHAMORRO DO NASCIMENTO	', '2017-05-16', '9999', '0', '3', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	285.997.928-06', '122019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(34, '2019-03-22 00:13:00', '	LETICIA DA COSTA FERREIRA EYNG	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 22, '	Teste	', '	POLIANA YONI DA SILVA STOLFI	', '2017-07-05', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	059.847.379-30', '132019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(35, '2019-03-22 00:14:00', '	JULIANE FELIX FRAGA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 23, '	Teste	', '	MIGUEL CARDOSO DE SOUZA ROZENO	', '2018-01-19', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	070.293.899-80', '142019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(36, '2019-03-22 00:15:00', '	MÔNICA MARIA DOS SANTOS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 24, '	Teste	', '	REBECCA ROSA TEIXEIRA	', '2018-01-06', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	276.271.418-42', '152019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(37, '2019-03-22 00:16:00', '	MARIA DE FATIMA DA COSTA FERREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 25, '	Teste	', '	ADRIAN ALAN SILVA SANTOS	', '2017-11-19', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	523.373.249-15', '162019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(38, '2019-03-22 00:17:00', '	MARIA APARECIDA DA COSTA DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 26, '	Teste	', '	ISABELLA DELLA GIUSTINA	', '2018-11-11', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	557.436.769-68', '172019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(39, '2019-03-22 00:18:00', '	AMANDA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 27, '	Teste	', '	RAY MIGUEL FOGAÇA DOS SANTOS	', '2018-01-12', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	087.166.869-69', '182019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(40, '2019-03-22 00:19:00', '	TATIANE DE AMORIM TOMIO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 28, '	Teste	', '	HELENA LETICIA SEVERINO	', '2017-10-23', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	019.867.499-67', '192019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(41, '2019-03-22 00:20:00', '	CARLA BEATRIZ DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 29, '	Teste	', '	ANGEL DE PAULA AMARIJO	', '2018-02-19', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	003.500.769-95', '202019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(42, '2019-03-22 00:21:00', '	NAYARA BEATRIZ BONI DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 30, '	Teste	', '	SARA BIANCA MACEDO INÁCIO	', '2018-11-07', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	071.857.999-29', '212019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(43, '2019-03-22 00:22:00', '	SIMONE PEREIRA DE LIMA BELTRAMINI	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 31, '	Teste	', '	SANDIELLY MARTINS DA COSTA	', '2018-04-01', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	902.981.609-00', '222019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(44, '2019-03-22 00:23:00', '	SILVIA VENNITTS COELHO DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 32, '	Teste	', '	ISABELA DE AVILA RIBEIRO	', '2017-09-01', '9999', '0', '5', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	657.849.369-72', '232019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(45, '2019-03-22 00:24:00', '	ISABEL CRISTINA FORSTER	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 33, '	Teste	', '	EVELLYN GRAH	', '2017-08-08', '9999', '0', '6', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	101.612.619-06', '242019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(46, '2019-03-22 00:25:00', '	JANAINA NEIDE DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 34, '	Teste	', '	ALICE ROSA VITORINO	', '2018-09-20', '9999', '0', '7', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	043.913.639-33', '252019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(47, '2019-03-22 00:26:00', '	CARLA DANIELA DO NASCIMENTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 35, '	Teste	', '	MARIA EDUARDA MABA	', '2017-08-04', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	086.110.079-48', '262019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(48, '2019-03-22 00:27:00', '	CLAUDIOMIRO MACIEL DE OLIVEIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 36, '	Teste	', '	LUIZ HENRIQUE DE OLIVEIRA	', '2018-10-09', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	893.432.399-04', '272019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(49, '2019-03-22 00:28:00', '	MARIA AMÁLIA DE ABREU DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 37, '	Teste	', '	PEDRO HENRIQUE DALBERTO	', '2018-12-06', '9999', '0', '1', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	199.310.588-38', '282019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(50, '2019-03-22 00:29:00', '	KLEIDI ROLING BENTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 38, '	Teste	', '	MATHEUS OLIVEIRA MATIAS	', '2017-07-08', '9999', '0', '2', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	034.932.899-44', '292019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(51, '2019-03-22 00:30:00', '	SUELI LIMA PEREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 39, '	Teste	', '	VALENTINA DA MAIA FLOR	', '2017-06-18', '9999', '0', '3', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	006.984.779-79', '302019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(52, '2019-03-22 00:31:00', '	ROSILENE DE ALMEIDA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 40, '	Teste	', '	ELOÁ DA MAIA FLOR	', '2017-06-18', '9999', '0', '4', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	048.169.999-65', '312019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(53, '2019-03-22 00:32:00', '	LETÍCIA CLEONICE CAETANO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 41, '	Teste	', '	HELOISA BEATRIZ DE L. DE MORAES	', '2018-07-13', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	059.300.339-00', '322019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(54, '2019-03-22 00:33:00', '	ISABELA MONTIBELLER DE SOUZA KUEHN	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 42, '	Teste	', '	EMANUELLY L. M. DOS SANTOS	', '2017-07-08', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	034.760.789-65', '332019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(55, '2019-03-22 00:34:00', '	ELISABETE SUELI VICENTE DA COSTA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 43, '	Teste	', '	DAVI DA SILVA ENICA	', '2017-07-27', '9999', '0', '7', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	005.125.469-75', '342019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(56, '2019-03-22 00:35:00', '	JUCIANE ISABEL DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 44, '	Teste	', '	TAYLOR BOLZAN CONTIERE	', '2017-11-11', '9999', '0', '8', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	081.469.749-61', '352019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(57, '2019-03-22 00:36:00', '	MABEL ROSANE CAMPOS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 45, '	Teste	', '	ANA BEATRIZ COUTO SILVA	', '2017-10-22', '9999', '0', '9', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	871.472.209-78', '362019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(58, '2019-03-22 00:37:00', '	KELLY COSTA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 46, '	Teste	', '	PEDRO HENRIQUE DE SOUZA	', '2018-07-04', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	040.304.029-92', '372019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(59, '2019-03-22 00:38:00', '	CRISTIANE MARILENA DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 47, '	Teste	', '	NOAH SANTOS	', '2017-07-29', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	006.980.909-77', '382019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(60, '2019-03-22 00:39:00', '	ELIZANE APARECIDA FRANCISCO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 48, '	Teste	', '	YURI MIGUEL NUNES	', '2017-07-04', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	638.933.639-04', '392019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(61, '2019-03-22 00:40:00', '	ALINE CÓRDOVA FORTE	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 49, '	Teste	', '	SOPHYA DE AGUIAR LEMOS	', '2018-12-10', '9999', '0', '4', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	050.502.129-36', '402019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(62, '2019-03-22 00:41:00', '	RENATA RAIMON PEREIRA DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 50, '	Teste	', '	VALENTINA CALHEIRO FRAGA	', '2018-02-01', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	033.234.099-65', '412019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(63, '2019-03-22 00:42:00', '	VITORIA GABRIELA PEREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 51, '	Teste	', '	LUIZ FELIPE DOS SANTOS FRAGA JUNIOR	', '2018-02-01', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	101.747.449-43', '422019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(64, '2019-03-22 00:43:00', '	MAIARA CRISTINA VIEIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 52, '	Teste	', '	GAEL MIGUEL PEREIRA GODOY	', '2018-09-14', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	075.156.209-27', '432019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(65, '2019-03-22 00:44:00', '	APARECIDA MARIA EMMERICH BRONGEL	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 53, '	Teste	', '	LÍVIA RODRIGUES	', '2018-05-27', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	547.104.309-00', '442019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(66, '2019-03-22 00:45:00', '	FÁBIO GARDIOLI DE CARVALHO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 54, '	Teste	', '	HELOÍSA MOURA	', '2018-05-25', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	070.621.157-03', '452019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(67, '2019-03-22 00:46:00', '	ROSA MARIA FELICIO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 55, '	Teste	', '	LAVÍNIA STEPANIAK RAMOS MARTINS	', '2018-11-21', '9999', '0', '1', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	850.056.069-04', '462019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(68, '2019-03-22 00:47:00', '	Alexandra Darci Francisco	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 56, '	Teste	', '	LUIZ FELIPE DE OLIVEIRA DE LIMA	', '2018-01-23', '9999', '0', '2', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	007.139.909-70', '472019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(69, '2019-03-22 00:48:00', '	MARGARET MARIA MISTURA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 57, '	Teste	', '	PAOLLA MOSER CORREIA	', '2018-01-26', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	380.126.859-49', '482019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(70, '2019-03-22 00:49:00', '	GABRIELA GARBINI	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 58, '	Teste	', '	HENRIQUE MEDEIROS MORAES	', '2018-10-09', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	247.216.748-21', '492019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(71, '2019-03-22 00:50:00', '	MARIA ÂNGELA SEBASTIÃO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 59, '	Teste	', '	LUIZA SPIESS	', '2018-12-10', '9999', '0', '5', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	019.827.489-07', '502019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(72, '2019-03-22 00:51:00', '	GIULIANO MADUREIRA BARBOSA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 60, '	Teste	', '	LORENA EDUARDA DE LIMA	', '2018-08-02', '9999', '0', '6', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	273.998.038-89', '512019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(73, '2019-03-22 00:52:00', '	VERÔNICA MARIA LEITE FRANCISCO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 61, '	Teste	', '	PEDRO HENRIQUE GONÇALVES DE SOUZA	', '2018-08-27', '9999', '0', '7', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	611.687.779-68', '522019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(74, '2019-03-22 00:53:00', '	CLAUDETE FATIMA DALMAGRO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 62, '	Teste	', '	ELOÍSA DA COSTA WISBECKI	', '2018-11-30', '9999', '0', '8', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	034.833.589-00', '532019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(75, '2019-03-22 00:54:00', '	SUELI DOS SANTOS CARDOSO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 63, '	Teste	', '	GABRIEL RIBEIRO GANDOLFI	', '2018-07-15', '9999', '0', '9', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	660.472.429-87', '542019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(76, '2019-03-22 00:55:00', '	CAMYLLA EMANUELLY PRÍNCIPE DE MORAIS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 64, '	Teste	', '	ÁGATHA VITÓRIA DA SILVA FERREIRA	', '2018-09-04', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	050.937.129-90', '552019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(77, '2019-03-22 00:56:00', '	NÁDIA SIEGEL	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 65, '	Teste	', '	MAYA MULARI	', '2018-05-20', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	970.511.109-00', '562019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(78, '2019-03-22 00:57:00', '	ELINES MARIA DE JESUS NASCIMENTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 66, '	Teste	', '	SOPHIA EMANUELLY RIBEIRO	', '2018-11-23', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	939.727.099-00', '572019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(79, '2019-03-22 00:58:00', '	JAQUELINE DO NASCIMENTO DE BORBA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 67, '	Teste	', '	LAURA FLÔRES DA SILVA FRANCISCO	', '2018-05-09', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	005.638.109-39', '582019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(80, '2019-03-22 00:59:00', '	LÍVIA DOS NAVEGANTES DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 68, '	Teste	', '	KALEB HAEL MARTINS	', '2018-01-10', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	047.198.699-20', '592019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(81, '2019-03-22 01:00:00', '	LEDINÉIA MILITÃO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 69, '	Teste	', '	GABRIEL SCHMIDT BRAND	', '2018-06-20', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	052.579.949-41', '602019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(82, '2019-03-22 01:01:00', '	ADRIANA ARAUJO SANTANA TAVARES	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 70, '	Teste	', '	MIRELA VALENTINA DA SILVA	', '2018-04-11', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	040.189.269-79', '612019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(83, '2019-03-22 01:02:00', '	CARLA PIZZATTO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 71, '	Teste	', '	ANTHONY DE OLIVEIRA	', '2018-06-12', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	023.447.419-09', '622019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(84, '2019-03-22 01:03:00', '	MARIA EDUARDA CORDEIRO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 72, '	Teste	', '	ISABELLA CAVALCANTI PEREIRA	', '2018-10-16', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	077.385.129-11', '632019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(85, '2019-03-22 01:04:00', '	DENISE TEREZINHA VIEIRA BORBA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 73, '	Teste	', '	KAETANO YAGO STANISZEWSKI GARCIA DIAZ	', '2018-09-26', '9999', '0', '1', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	617.292.059-68', '642019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(86, '2019-03-22 01:05:00', '	JANE MARIA LEITE TEODORO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 74, '	Teste	', '	ARTHUR FELIPE CORDEIRO	', '2018-10-26', '9999', '0', '2', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	667.989.739-49', '652019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(87, '2019-03-22 01:06:00', '	CLAUDIA ROSANE TRICHES TULIO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 75, '	Teste	', '	HELENA CAVANHA MARTINELLI	', '2018-07-05', '9999', '0', '3', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	021.434.939-08', '662019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(88, '2019-03-22 01:07:00', '	YNDIALI APARECIDA BENTO INACIO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 76, '	Teste	', '	LÍVIA CERESOLI	', '2018-07-23', '9999', '0', '4', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	018.443.559-50', '672019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(89, '2019-03-22 01:08:00', '	MARCOS HENRIQUE WAGNER	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 77, '	Teste	', '	MAX VINICIOS DEL SENT DIAS	', '2018-06-10', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	871.720.119-53', '682019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(90, '2019-03-22 01:09:00', '	JULIANE APARECIDA XAVIER BARBOSA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 78, '	Teste	', '	ALICE BATISTA DA SILVA	', '2018-07-06', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	364.315.958-74', '692019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(91, '2019-03-22 01:10:00', '	NÍVIA MARIA BENTO SANTANA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 79, '	Teste	', '	HELOÍSA FLÔR	', '2018-03-25', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	870.699.119-04', '702019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(92, '2019-03-22 01:11:00', '	ROSANE DE ALMEIDA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 80, '	Teste	', '	GUILHERME INOCENCIO LUCIANO	', '2018-02-19', '9999', '0', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	947.567.919-72', '712019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(93, '2019-03-22 01:12:00', '	ROSÉLIA DE FÁTIMA VIEIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 81, '	Teste	', '	LIZ AIMÉE CORREIA LIMEIRA	', '2017-11-07', '9999', '0', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	636.650.939-53', '722019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(94, '2019-03-22 01:13:00', '	LAZARA MARISTELA DE FREITAS GODOY BUENO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 82, '	Teste	', '	LAIS DE OLIVEIRA MACHADO	', '2017-07-22', '9999', '0', '3', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	861.980.929-68', '732019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(95, '2019-03-22 01:14:00', '	MARIA APARECIDA DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 83, '	Teste	', '	HELENA SCHULLE SOARES	', '2017-05-03', '9999', '0', '4', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	388.363.609-63', '742019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(96, '2019-03-22 01:15:00', '	RITA DE CÁSSIA DE SOUZA MARQUETTI	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 84, '	Teste	', '	LETICIA PEREIRA DOS REIS	', '2018-02-15', '9999', '0', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	656.676.119-53', '752019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(97, '2019-03-22 01:16:00', '	ANDREIA LUCIA SANTANA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 85, '	Teste	', '	HELOYSA OLIVEIRA HUBERT	', '2017-09-21', '9999', '0', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	953.351.709-30', '762019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(98, '2019-03-22 01:17:00', '	BIANCA ROCHA LEITE ELIAS DA CRUZ	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 86, '	Teste	', '	LOUISE COELHO FRANCEZ	', '2017-08-08', '9999', '0', '7', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	048.011.497-82', '772019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(99, '2019-03-22 01:18:00', '	NOÉLI APARECIDA DE ARAGÃO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 87, '	Teste	', '	SAMIR MIGUEL DE OLIVEIRA	', '2017-10-19', '9999', '0', '8', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	083.629.019-42', '782019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(100, '2019-03-22 01:19:00', '	GILDA DA GRAÇA CUSTODIO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 88, '	Teste	', '	ANA LUÍZA BASSANI BALDANÇA	', '2018-01-31', '9999', '0', '9', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	543.468.609-82', '792019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(101, '2019-03-22 01:20:00', '	THYRCIANE FEITOSA DE SANTANA DA COSTA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 89, '	Teste	', '	PEDRO HENRIQUE CARDOSO	', '2017-12-19', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	064.255.039-55', '802019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(102, '2019-03-22 01:21:00', '	SANDRA MARIA PEREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 90, '	Teste	', '	BERNARDO FURTADO VIGATO	', '2018-02-15', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	004.476.079-52', '812019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(103, '2019-03-22 01:22:00', '	ADRIANA CARDOSO PEREIRA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 91, '	Teste	', '	ADRYAM GUILHERME PAVAO SODRE	', '2017-04-27', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	005.633.809-00', '822019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(104, '2019-03-22 01:23:00', '	JERUZA QUEIZA DA CRUZ	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 92, '	Teste	', '	KELVYN DOMONIC PAVAO SODRE	', '2017-04-27', '9999', '0', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	088.049.649-52', '832019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(105, '2019-03-22 01:24:00', '	TATIANA DA SILVA CRISTO DIAS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 93, '	Teste	', '	BERNARDO VITORINO VICENTE	', '2017-05-25', '9999', '0', '5', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	017.415.849-14', '842019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(106, '2019-03-22 01:25:00', '	OTILIA MOTTA PINHEIRO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 94, '	Teste	', '	HELENA MAFRA MELO	', '2017-12-29', '9999', '0', '6', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	621.063.849-04', '852019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(107, '2019-03-22 01:26:00', '	FABIANA OLIVEIRA SILVA BERNARDO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 95, '	Teste	', '	ANA CLARA PEREIRA	', '2017-06-07', '9999', '0', '7', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	280.432.768-03', '862019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(108, '2019-03-22 01:27:00', '	LUCIANA DUTRA SILVA THOMSEN	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 96, '	Teste	', '	MARIA EDUARDA DA ROSA PEDROSO	', '2018-03-08', '9999', '0', '8', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	288.988.638-70', '872019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(109, '2019-03-22 01:28:00', '	DJESSICA SIEDSCHLAG	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 97, '	Teste	', '	MARINA SCHULLE	', '2017-08-17', '9999', '0', '9', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	060.626.179-61', '882019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(110, '2019-03-22 01:29:00', '	MARIA APARECIDA DOS SANTOS LACAVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 98, '	Teste	', '	ARTHUR DE JESUS ESPÓSITO	', '2017-08-31', '9999', '0', '1', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	718.511.519-15', '892019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(111, '2019-03-22 01:30:00', '	CLADECÍ MARIA KUZMA BORGES	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 99, '	Teste	', '	ISAC SULLIVAN DA CUNHA DA SILVA	', '2017-12-28', '9999', '0', '2', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	603.629.529-49', '902019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(112, '2019-03-22 01:31:00', '	AUDITOR SEDUC	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 1, '	Rua teste	', 100, '	Teste	', '	DOM DIAS GONÇALVES	', '2017-05-01', '9999', '0', '3', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	004.620.059-25', '912019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(113, '2019-03-22 01:32:00', '	PAULO SÉRGIO EMMERICH	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 2, '	Rua teste	', 101, '	Teste	', '	BRYAN DA SILVA FERNANDES	', '2017-06-27', '9999', '1', '4', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	866.296.899-68', '922019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(114, '2019-03-22 01:33:00', '	MORGANA LUZIA DA SILVA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 3, '	Rua teste	', 102, '	Teste	', '	BRAYAN FERREIRA DOS SANTOS	', '2018-03-20', '9999', '1', '5', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	093.467.579-14', '932019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(115, '2019-03-22 01:34:00', '	GISELE NAIR DE MELO DA COSTA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 4, '	Rua teste	', 103, '	Teste	', '	LÍVIA DOS REIS GOMES	', '2017-11-10', '9999', '1', '6', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	038.992.289-79', '942019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(116, '2019-03-22 01:35:00', '	CONSTÂNCIA MARIA CUSTÓDIO ZUCCO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 104, '	Teste	', '	MIGUEL VEIGA DA SILVA	', '2017-10-09', '9999', '1', '7', NULL, NULL, '2', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	593.226.409-87', '952019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(117, '2019-03-22 01:36:00', '	SUSANA CELISTA POLICARPO	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 6, '	Rua teste	', 105, '	Teste	', '	EMANUELLE DE LIZ	', '2017-12-26', '9999', '1', '8', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	939.550.819-15', '962019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(118, '2019-03-22 01:37:00', '	SONIA MARIA DE SOUZA	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 7, '	Rua teste	', 106, '	Teste	', '	MATHEUS DA CRUZ CALDEIRA	', '2017-01-20', '9999', '1', '9', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	871.025.609-15', '972019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(119, '2019-03-22 01:38:00', '	ADRIANA RIBEIRO DE CAMPOS	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 8, '	Rua teste	', 107, '	Teste	', '	ENZO LUIZ VICENTE	', '2016-04-06', '9999', '1', '5', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	891.029.329-20', '982019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	'),
(120, '2019-03-22 01:39:00', '	SANDRA REGINA GONÇALVES	', '	responsavel@gmail.com	', '	(47) 99116-9267', NULL, 5, '	Rua teste	', 108, '	Teste	', '	SAMUEL HENRIQUE SALES	', '2016-11-02', '9999', '1', '6', NULL, NULL, '1', NULL, 0x4172726179, NULL, 0x4172726179, NULL, '	009.359.239-69', '992019', NULL, 'Aguardando', NULL, NULL, '	arquivo.pdf	', '	arquivo.pdf	');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `etapa`
--
ALTER TABLE `etapa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fila`
--
ALTER TABLE `fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE `user` (
`id` INT NOT NULL,
`name` VARCHAR(255),
`email` VARCHAR(255) UNIQUE NOT NULL,
 `password` varchar(255) NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;