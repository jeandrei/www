DROP DATABASE IF EXISTS modelo;
CREATE DATABASE modelo CHARACTER SET utf8 COLLATE utf8_general_ci;
USE modelo;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 18/07/2020 às 18:52
-- Versão do servidor: 5.7.30
-- Versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `modelo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `etapa`
--

INSERT INTO `etapa` (`id`, `data_ini`, `data_fin`, `descricao`) VALUES
(1, '2019-04-01', '2020-12-31', 'BERÇÁRIO-I'),
(2, '2018-04-01', '2019-03-31', 'BERÇÁRIO-II'),
(3, '2017-04-01', '2018-03-31', 'MATERNAL'),
(4, '2016-04-01', '2017-03-31', 'PRÉ-I');



-- --------------------------------------------------------

--
-- Estrutura para tabela `fila`
--

CREATE TABLE `fila` (
  `id` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `responsavel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(16) NOT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `bairro_id` int(11) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `nomecrianca` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `deficiencia` varchar(1) NOT NULL DEFAULT '0',
  `observacao` varchar(255) DEFAULT NULL,
  `cpfresponsavel` varchar(15) DEFAULT NULL,
  `protocolo` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Aguardando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fila`
--

INSERT INTO `fila` (`id`, `registro`, `responsavel`, `email`, `telefone`, `celular`, `bairro_id`, `logradouro`, `numero`, `complemento`, `nomecrianca`, `nascimento`, `deficiencia`, `observacao`, `cpfresponsavel`, `protocolo`, `status`) VALUES
(15, '2019-12-03 14:20:00', '	 carolina andrea parra valdivia 	', NULL, '	99910-4449	', NULL, NULL, NULL, NULL, NULL, '	matheus felipe valdivia 	', '2019-02-27', '0', NULL, NULL, '152020', 'Aguardando'),
(16, '2019-12-03 14:24:00', '	 ana carolina franco albino 	', NULL, '	99910-4449	', NULL, NULL, NULL, NULL, NULL, '	lorenzo albino martins 	', '2018-04-05', '0', NULL, NULL, '162020', 'Aguardando'),
(17, '2019-12-04 10:49:00', '	 Ekaterina Smirnova 	', NULL, '	99725-6694	', NULL, NULL, NULL, NULL, NULL, '	Helena Smirnova 	', '2017-11-12', '0', NULL, NULL, '172020', 'Aguardando'),
(18, '2019-12-05 09:32:00', '	 Patricia Xavier 	', NULL, '	99667-6424	', NULL, NULL, NULL, NULL, NULL, '	Amanda Xavier Provesi 	', '2018-03-27', '0', NULL, NULL, '182020', 'Aguardando'),
(19, '2019-12-05 19:17:00', '	 Rosangela Teixeira 	', NULL, '	99626-2494	', NULL, NULL, NULL, NULL, NULL, '	Heryka da Cunha 	', '2018-02-15', '0', NULL, NULL, '192020', 'Aguardando'),
(20, '2019-12-06 12:40:00', '	 JENIFER DE AGUIAR ANSELMO 	', NULL, '	98911-7801	', NULL, NULL, NULL, NULL, NULL, '	LIVIA ANSELMO FONSECA 	', '2017-06-27', '0', NULL, NULL, '202020', 'Aguardando'),
(21, '2019-12-06 15:04:00', '	 joice furlaneto leite 	', NULL, '	3398-1675 	', NULL, NULL, NULL, NULL, NULL, '	Angélica Furlaneto Leite 	', '2017-09-01', '0', NULL, NULL, '212020', 'Aguardando'),
(22, '2019-12-06 19:59:00', '	 Aline Ranghett 	', NULL, '	99198-6302	', NULL, NULL, NULL, NULL, NULL, '	Gabriel Schumacker da Silva 	', '2019-01-02', '0', NULL, NULL, '222020', 'Aguardando'),
(23, '2019-12-08 18:28:00', '	 mayara flores da luz 	', NULL, '	9292-7431 	', NULL, NULL, NULL, NULL, NULL, '	cecília da luz 	', '2017-10-10', '0', NULL, NULL, '232020', 'Aguardando'),
(24, '2019-12-09 10:24:00', '	 EDINEIA TEIXEIRA NUNES 	', NULL, '	99636-2990	', NULL, NULL, NULL, NULL, NULL, '	AGATHA ISABELY NUNES DE SOUZA 	', '2019-10-17', '0', NULL, NULL, '242020', 'Aguardando'),
(25, '2019-12-09 10:31:00', '	 EDINEIA TEIXEIRA NUNES 	', NULL, '	99636-2990	', NULL, NULL, NULL, NULL, NULL, '	LEANDRO JOSEPH NUNES DE SOUZA 	', '2017-03-25', '0', NULL, NULL, '252020', 'Aguardando'),
(26, '2019-12-10 09:36:00', '	 ELAINE CRISTINA GODRI DA LUZ ROMAO 	', NULL, '	99133-3083	', NULL, NULL, NULL, NULL, NULL, '	ANTONELLA SCHWARTZ ROMAO 	', '2018-07-23', '0', NULL, NULL, '262020', 'Aguardando'),
(27, '2019-12-10 14:40:00', '	 RENATA DE SOUZA MARQUES 	', NULL, '	99166-6564	', NULL, NULL, NULL, NULL, NULL, '	ROBERTA DE SOUZA MARQUES 	', '2019-08-04', '0', NULL, NULL, '272020', 'Aguardando'),
(28, '2019-12-10 19:23:00', '	 Walnice Branco Jorge 	', NULL, '	99604-2414	', NULL, NULL, NULL, NULL, NULL, '	Bryan Da Silveira 	', '2019-07-15', '0', NULL, NULL, '282020', 'Aguardando'),
(29, '2019-12-11 18:23:00', '	 Luana Manfroi 	', NULL, '	3342-4025 	', NULL, NULL, NULL, NULL, NULL, '	Dylan Manfroi Mianes 	', '2018-03-03', '0', NULL, NULL, '292020', 'Aguardando'),
(30, '2019-12-15 20:06:00', '	 Luciana de Oliveira Carvalho 	', NULL, '	99701-7737	', NULL, NULL, NULL, NULL, NULL, '	Anne de Carvalho Camargo 	', '2017-07-04', '0', NULL, NULL, '302020', 'Aguardando'),
(31, '2019-12-19 09:46:00', '	 DAIANE MARIA BENTO 	', NULL, '	99107-3473	', NULL, NULL, NULL, NULL, NULL, '	VYCTOR MYSAEL VIEIRA 	', '2017-06-23', '0', NULL, NULL, '312020', 'Aguardando'),
(32, '2019-12-19 14:55:00', '	 Franciele dos santos fiorin 	', NULL, '	3342-7873 	', NULL, NULL, NULL, NULL, NULL, '	Hagatha Monaliza Fiorin Pereira 	', '2019-01-29', '0', NULL, NULL, '322020', 'Aguardando'),
(33, '2019-12-19 14:59:00', '	 Eliania Maria Costa de Souza 	', NULL, '	99715-0841	', NULL, NULL, NULL, NULL, NULL, '	João Arthur Lima de Souza 	', '2019-08-19', '0', NULL, NULL, '332020', 'Aguardando'),
(34, '2019-12-30 11:42:00', '	 Janaina Pereira 	', NULL, '	98483-0340	', NULL, NULL, NULL, NULL, NULL, '	Isabella Pereira Ramalho 	', '2019-08-19', '0', NULL, NULL, '342020', 'Aguardando'),
(35, '2019-12-30 16:13:00', '	 Jovana Demarch 	', NULL, '	99128-4777	', NULL, NULL, NULL, NULL, NULL, '	Emanuel José Demarch 	', '2019-07-12', '0', NULL, NULL, '352020', 'Aguardando'),
(36, '2020-01-06 16:16:00', '	 Patricia Antunes da Luz de Souza 	', NULL, '	99755-8306	', NULL, NULL, NULL, NULL, NULL, '	Helena Vitória Antunes da Luz de Souza 	', '2018-05-13', '0', NULL, NULL, '362020', 'Aguardando'),
(37, '2020-01-06 18:08:00', '	 marcia reinert 	', NULL, '	98482-2805	', NULL, NULL, NULL, NULL, NULL, '	henrique gabriel reinert dos santos 	', '2019-01-15', '0', NULL, NULL, '372020', 'Aguardando'),
(38, '2020-01-07 11:07:00', '	 Rosiane Adelina Celista 	', NULL, '	99661-8279	', NULL, NULL, NULL, NULL, NULL, '	José Anthony de Lira 	', '2019-10-05', '0', NULL, NULL, '382020', 'Aguardando'),
(39, '2020-01-07 11:37:00', '	 Crislaine Kelly da Silva Baptista 	', NULL, '	98830-8286	', NULL, NULL, NULL, NULL, NULL, '	Lorena Baptista da Silva 	', '2018-10-02', '0', NULL, NULL, '392020', 'Aguardando'),
(40, '2020-01-07 16:43:00', '	 KAUANA CUBAS 	', NULL, '	99608-2440	', NULL, NULL, NULL, NULL, NULL, '	ELOAH SCHNEIDER 	', '2018-06-20', '0', NULL, NULL, '402020', 'Aguardando'),
(41, '2020-01-07 20:47:00', '	 LUCIANA PETROSKI 	', NULL, '	8828-2139 	', NULL, NULL, NULL, NULL, NULL, '	EMANUEL ANACLETO 	', '2018-03-09', '0', NULL, NULL, '412020', 'Aguardando'),
(42, '2020-01-08 13:08:00', '	 itamara carla gouveia da silva 	', NULL, '	99626-8279	', NULL, NULL, NULL, NULL, NULL, '	Thaina da silva salvador 	', '2018-10-19', '0', NULL, NULL, '422020', 'Aguardando'),
(43, '2020-01-08 15:12:00', '	 VANESSA CAMPOS PAES CARNEIRO 	', NULL, '	98493-2624	', NULL, NULL, NULL, NULL, NULL, '	MILENA CAMPOS DOMINGOS 	', '2019-09-28', '0', NULL, NULL, '432020', 'Aguardando'),
(44, '2020-01-08 16:14:00', '	0/1/1900	', NULL, '	99268-7405	', NULL, NULL, NULL, NULL, NULL, '	ALICE ISABELLA DE LIMA SOUZA 	', '2019-04-24', '0', NULL, NULL, '442020', 'Aguardando'),
(45, '2020-01-09 17:38:00', '	 KARLA MACCARI FERMINO FIGUEIREDO 	', NULL, '	3345-2726 	', NULL, NULL, NULL, NULL, NULL, '	ELOÁ MACCARI FERMINO FIGUEIREDO 	', '2018-10-18', '0', NULL, NULL, '452020', 'Aguardando'),
(46, '2020-01-09 17:39:00', '	 TATIANA CAROLINA COSTA SANTANA 	', NULL, '	99119-5152	', NULL, NULL, NULL, NULL, NULL, '	kaio yude santana bezerra 	', '2017-08-16', '0', NULL, NULL, '462020', 'Aguardando'),
(47, '2020-01-09 18:13:00', '	 Bruna Aparecida Martins Prado 	', NULL, '	99260-5064	', NULL, NULL, NULL, NULL, NULL, '	Pietro Martins Benete 	', '2018-10-07', '0', NULL, NULL, '472020', 'Aguardando'),
(48, '2020-01-10 09:10:00', '	 Geane Jacob da Silva 	', NULL, '	9968-4738 	', NULL, NULL, NULL, NULL, NULL, '	Théo Lucca de Andrades 	', '2019-06-16', '0', NULL, NULL, '482020', 'Aguardando'),
(49, '2020-01-10 11:15:00', '	 daniele dos santos de souza 	', NULL, '	99633-6201	', NULL, NULL, NULL, NULL, NULL, '	Miguel Natanael Berdardo De Souza 	', '2019-11-10', '0', NULL, NULL, '492020', 'Aguardando'),
(50, '2020-01-10 17:29:00', '	 Aline Capraro Espindola 	', NULL, '	99682-9042	', NULL, NULL, NULL, NULL, NULL, '	Lívia Capraro Espindola 	', '2017-12-04', '0', NULL, NULL, '502020', 'Aguardando'),
(51, '2020-01-11 09:21:00', '	 Thaís Regina da Silva 	', NULL, '	99951-8537	', NULL, NULL, NULL, NULL, NULL, '	Álvaro da Silva Fraga 	', '2019-11-28', '0', NULL, NULL, '512020', 'Matriculado'),
(52, '2020-01-11 15:32:00', '	 Francine Verissimo Adão Emmerich 	', NULL, '	98849-2602	', NULL, NULL, NULL, NULL, NULL, '	Davi Verissimo Emmerich 	', '2017-03-21', '0', NULL, NULL, '522020', 'Matriculado'),
(53, '2020-01-13 12:29:00', '	 Damares carvavalho de jesus 	', NULL, '	98841-4804	', NULL, NULL, NULL, NULL, NULL, '	LUIZ HENRIQUE CARVALHO MARIANA 	', '2019-09-18', '0', NULL, NULL, '532020', 'Matriculado'),
(54, '2020-01-13 15:37:00', '	 Vanessa valcaringhi 	', NULL, '	98423-5153	', NULL, NULL, NULL, NULL, NULL, '	Annalú Valcaringhi Possamai 	', '2019-04-03', '0', NULL, NULL, '542020', 'Matriculado'),
(55, '2020-01-13 15:38:00', '	 cintia mara moser dos anjos 	', NULL, '	99913-1703	', NULL, NULL, NULL, NULL, NULL, '	helena mackenzie dos anjos 	', '2019-12-12', '0', NULL, NULL, '552020', 'Matriculado'),
(56, '2020-01-13 18:17:00', '	 ERIKA REGINA VIEIRA DE OLIVEIRA 	', NULL, '	99999-4003	', NULL, NULL, NULL, NULL, NULL, '	MARIA EMILIA VIEIRA 	', '2019-10-30', '0', NULL, NULL, '562020', 'Matriculado'),
(57, '2020-01-14 09:55:00', '	 JANAINA CRISPIM DA VEIGA 	', NULL, '	3342-0435 	', NULL, NULL, NULL, NULL, NULL, '	PIETRO CRISPIM FANTINEL 	', '2018-01-18', '0', NULL, NULL, '572020', 'Matriculado'),
(58, '2020-01-14 13:50:00', '	 ariana gomes 	', NULL, '	99282-7653	', NULL, NULL, NULL, NULL, NULL, '	~samuel fernando de souza 	', '2017-03-02', '0', NULL, NULL, '582020', 'Matriculado'),
(59, '2020-01-14 17:47:00', '	 Vanessa Souza de Negreiros 	', NULL, '	99111-6946	', NULL, NULL, NULL, NULL, NULL, '	Gabriele vitoria dos Santos Negreiros 	', '2018-11-23', '0', NULL, NULL, '592020', 'Matriculado'),
(60, '2020-01-15 09:54:00', '	 Ingraca maria da costa 	', NULL, '	3348-7968 	', NULL, NULL, NULL, NULL, NULL, '	Alice Maria Sporny 	', '2017-10-03', '0', NULL, NULL, '602020', 'Matriculado'),
(61, '2020-01-15 12:37:00', '	0/1/1900	', NULL, '	99677-1825	', NULL, NULL, NULL, NULL, NULL, '	NATHAN ADLER NELCY 	', '2019-10-12', '0', NULL, NULL, '612020', 'Matriculado'),
(62, '2020-01-15 14:00:00', '	 michelle shaiane nunes 	', NULL, '	99684-8876	', NULL, NULL, NULL, NULL, NULL, '	nikolas gabriel nunes dos reis 	', '2019-07-17', '0', NULL, NULL, '622020', 'Matriculado'),
(63, '2020-01-15 18:59:00', '	 Giselly de Freitas Castro 	', NULL, '	7440-1235 	', NULL, NULL, NULL, NULL, NULL, '	Elise de Freitas Miranda 	', '2018-04-24', '0', NULL, NULL, '632020', 'Matriculado'),
(64, '2020-01-15 19:07:00', '	 Raianne de Freitas Castro 	', NULL, '	97305-8359	', NULL, NULL, NULL, NULL, NULL, '	Joao Pedro Gomes Freitas 	', '2018-06-11', '0', NULL, NULL, '642020', 'Matriculado'),
(65, '2020-01-15 22:56:00', '	 JESSICA DOS SANTOS NUNES 	', NULL, '	99254-2700	', NULL, NULL, NULL, NULL, NULL, '	MARIA EDUARDA NUNES NORONHA 	', '2017-12-15', '0', NULL, NULL, '652020', 'Matriculado'),
(66, '2020-01-16 10:00:00', '	 MICHELLE KARINA DE SOUZA 	', NULL, '	99150-9720	', NULL, NULL, NULL, NULL, NULL, '	MATEUS JOÃO PAULINA 	', '2019-01-04', '0', NULL, NULL, '662020', 'Matriculado'),
(67, '2020-01-16 12:59:00', '	 Marcia Maria Volpato de Mattos 	', NULL, '	3345-8436 	', NULL, NULL, NULL, NULL, NULL, '	Marcos Paulo Volpato de Mattos 	', '2018-08-31', '0', NULL, NULL, '672020', 'Matriculado'),
(68, '2020-01-16 14:07:00', '	 AMANDA PELOIA 	', NULL, '	98488-9790	', NULL, NULL, NULL, NULL, NULL, '	FERNANDO PELOIA STEFANI 	', '2019-06-23', '0', NULL, NULL, '682020', 'Matriculado'),
(69, '2020-01-16 14:53:00', '	 Bruna Adriana Cardoso 	', NULL, '	9288-9016 	', NULL, NULL, NULL, NULL, NULL, '	Nathaniel Cardoso Sutil 	', '2019-02-01', '0', NULL, NULL, '692020', 'Matriculado'),
(70, '2020-01-16 15:49:00', '	 Luana de Oliveira Metzger 	', NULL, '	98474-2462	', NULL, NULL, NULL, NULL, NULL, '	Helena Flor de Oliveira Maçaneiro 	', '2018-08-29', '0', NULL, NULL, '702020', 'Matriculado'),
(71, '2020-01-16 17:28:00', '	 Aline Maria Siqueira 	', NULL, '	99150-0889	', NULL, NULL, NULL, NULL, NULL, '	estefania margarete siqueira hang 	', '2018-01-23', '0', NULL, NULL, '712020', 'Matriculado'),
(72, '2020-01-16 18:45:00', '	 Dhenifer Aline Da Silva 	', NULL, '	99119-8947	', NULL, NULL, NULL, NULL, NULL, '	Ana Alice da Silva pinto 	', '2018-12-26', '0', NULL, NULL, '722020', 'Matriculado'),
(73, '2020-01-16 19:34:00', '	 Maria Carolina Lima De Almeida 	', NULL, '	99289-2063	', NULL, NULL, NULL, NULL, NULL, '	Thayla Manuelli Vieira Lima 	', '2018-11-12', '0', NULL, NULL, '732020', 'Matriculado'),
(74, '2020-01-16 20:02:00', '	 Beatriz Ferreira de Souza 	', NULL, '	9914-3230 	', NULL, NULL, NULL, NULL, NULL, '	Miguel Augusto de Souza Correa 	', '2019-04-28', '0', NULL, NULL, '742020', 'Matriculado'),
(75, '2020-01-17 15:30:00', '	 LUIZA CARLA NUNES TEIXEIRA 	', NULL, '	3360-8432 	', NULL, NULL, NULL, NULL, NULL, '	MARIA LUIZA TEIXEIRA CIRINEU 	', '2018-01-10', '0', NULL, NULL, '752020', 'Matriculado'),
(76, '2020-01-17 15:36:00', '	 Suzana Cardoso Alexandre 	', NULL, '	99925-1072	', NULL, NULL, NULL, NULL, NULL, '	Luiz Gustavo Cardoso dos Santos 	', '2020-01-17', '0', NULL, NULL, '762020', 'Matriculado'),
(77, '2020-01-17 16:04:00', '	 Luciane Schutter Mafra 	', NULL, '	99687-4470	', NULL, NULL, NULL, NULL, NULL, '	Helena Schutter Mafra 	', '2019-02-20', '0', NULL, NULL, '772020', 'Matriculado'),
(78, '2020-01-18 10:38:00', '	 JESSICA DAYANE DE OLIVEIRA CARVALHO 	', NULL, '	99215-0929	', NULL, NULL, NULL, NULL, NULL, '	THÉO GABRIEL CORREIA CARVALHO 	', '2018-07-10', '0', NULL, NULL, '782020', 'Matriculado'),
(79, '2020-01-20 11:49:00', '	 pamela joelma de oliveira balduino 	', NULL, '	99213-8838	', NULL, NULL, NULL, NULL, NULL, '	SERGIO EMANOEL CARVALHO 	', '2018-05-17', '0', NULL, NULL, '792020', 'Matriculado'),
(80, '2020-01-20 12:38:00', '	0/1/1900	', NULL, '	3345-0084 	', NULL, NULL, NULL, NULL, NULL, '	Perolla Magally de Sousa 	', '2018-12-04', '0', NULL, NULL, '802020', 'Matriculado'),
(81, '2020-01-20 13:51:00', '	 ROULIA COULANGES 	', NULL, '	99951-2099	', NULL, NULL, NULL, NULL, NULL, '	NATHAN ADLER NELCY 	', '2019-10-12', '0', NULL, NULL, '812020', 'Matriculado'),
(82, '2020-01-20 14:04:00', '	 Sandrieli Telles da Silva 	', NULL, '	99734-6680	', NULL, NULL, NULL, NULL, NULL, '	Henrique Gabriel Da Silva Bento 	', '2019-04-17', '0', NULL, NULL, '822020', 'Matriculado'),
(83, '2020-01-20 15:24:00', '	 tainara fernandes pascoal 	', NULL, '	99294-3159	', NULL, NULL, NULL, NULL, NULL, '	Daniel Batista da Silva Fernandes 	', '2019-07-13', '0', NULL, NULL, '832020', 'Matriculado'),
(84, '2020-01-20 15:34:00', '	 LYANDRA SOUZA SILVEIRA 	', NULL, '	99935-6579	', NULL, NULL, NULL, NULL, NULL, '	SAID JUMA LUGOGO NETO 	', '2018-11-26', '0', NULL, NULL, '842020', 'Matriculado'),
(85, '2020-01-20 16:11:00', '	 MARINES IRMA DA SILVA 	', NULL, '	99271-8236	', NULL, NULL, NULL, NULL, NULL, '	ESTER CRISTINA DE SOUZA 	', '2019-09-28', '0', NULL, NULL, '852020', 'Matriculado'),
(86, '2020-01-20 18:50:00', '	 Thayna Gabriela Alves 	', NULL, '	99910-0380	', NULL, NULL, NULL, NULL, NULL, '	Luiz Henrique Wilbert 	', '2019-05-06', '0', NULL, NULL, '862020', 'Matriculado'),
(87, '2020-01-21 01:16:00', '	 Josiane Schmitt Euriques Provesi 	', NULL, '	99972-8742	', NULL, NULL, NULL, NULL, NULL, '	Laura Provesi 	', '2019-02-19', '0', NULL, NULL, '872020', 'Matriculado'),
(88, '2020-01-21 08:02:00', '	 JAILA SOARES 	', NULL, '	99147-0548	', NULL, NULL, NULL, NULL, NULL, '	LORENA SOARES 	', '2019-12-19', '0', NULL, NULL, '882020', 'Matriculado'),
(89, '2020-01-21 08:27:00', '	 FATIMA LIRACI DOS SANTOS 	', NULL, '	99103-4941	', NULL, NULL, NULL, NULL, NULL, '	ÉVILYN LAVÍNIA DOS SANTOS 	', '2019-10-31', '0', NULL, NULL, '892020', 'Matriculado'),
(90, '2020-01-21 09:06:00', '	 MARILENE ANACLETO TOMAZ 	', NULL, '	99117-0135	', NULL, NULL, NULL, NULL, NULL, '	MARIA ISABEL IDALINA 	', '2018-11-06', '0', NULL, NULL, '902020', 'Matriculado'),
(91, '2020-01-21 11:58:00', '	 CAMILA DA SILVA 	', NULL, '	9657-6960 	', NULL, NULL, NULL, NULL, NULL, '	LORENZO LUZ 	', '2019-03-21', '0', NULL, NULL, '912020', 'Matriculado'),
(92, '2020-01-21 15:22:00', '	 bruna angelica rodrigues 	', NULL, '	99108-2124	', NULL, NULL, NULL, NULL, NULL, '	mateus rodrigues castro 	', '2019-09-18', '0', NULL, NULL, '922020', 'Matriculado'),
(93, '2020-01-21 20:48:00', '	 Talita Vicente Anacleto 	', NULL, '	3345-5310 	', NULL, NULL, NULL, NULL, NULL, '	Lavínia Macedo 	', '2019-07-28', '0', NULL, NULL, '932020', 'Matriculado'),
(94, '2020-01-22 11:39:00', '	 MARIANE REGINA BERNARDO 	', NULL, '	99160-7786	', NULL, NULL, NULL, NULL, NULL, '	NATHAN BERNARDO VICTORINO 	', '2018-09-28', '0', NULL, NULL, '942020', 'Matriculado'),
(95, '2020-01-22 12:07:00', '	 Célia Vergilino 	', NULL, '	99664-1085	', NULL, NULL, NULL, NULL, NULL, '	Heloysa Vitória Alves 	', '2018-11-01', '0', NULL, NULL, '952020', 'Matriculado'),
(96, '2020-01-22 15:37:00', '	 sandrieli telles da silva 	', NULL, '	3345-0809 	', NULL, NULL, NULL, NULL, NULL, '	Henrique Gabriel Da Silva Bento 	', '2019-04-17', '0', NULL, NULL, '962020', 'Matriculado'),
(97, '2020-01-22 17:27:00', '	 Larissa Sousa Gomes Oliveira 	', NULL, '	98175-5951	', NULL, NULL, NULL, NULL, NULL, '	Cristal da Lua Gomes da Silva 	', '2019-01-15', '0', NULL, NULL, '972020', 'Matriculado'),
(98, '2020-01-23 15:04:00', '	 bruna angelica rodrigues 	', NULL, '	99108-2124	', NULL, NULL, NULL, NULL, NULL, '	mateus rodrigues castro 	', '2019-09-23', '0', NULL, NULL, '982020', 'Matriculado'),
(99, '2020-01-24 10:00:00', '	 Thais Solange Galvão 	', NULL, '	99712-1571	', NULL, NULL, NULL, NULL, NULL, '	Yasmin Galvão Peniche 	', '2018-04-06', '0', NULL, NULL, '992020', 'Matriculado'),
(100, '2020-01-24 15:12:00', '	 Iana Carla Pinto Santos 	', NULL, '	3361-9703 	', NULL, NULL, NULL, NULL, NULL, '	Sofia Santos 	', '2017-06-02', '0', NULL, NULL, '1002020', 'Matriculado'),
(101, '2020-01-25 00:01:00', '	 Pablícia de Araujo Porcincula 	', NULL, '	98844-1967	', NULL, NULL, NULL, NULL, NULL, '	Esther Porcincula de Brito 	', '2017-08-11', '0', NULL, NULL, '1012020', 'Cancelado'),
(102, '2020-01-25 12:37:00', '	 Leonela de Sousa Nascimento Romão 	', NULL, '	99663-0124	', NULL, NULL, NULL, NULL, NULL, '	Maria Rita Nascimento Romão 	', '2017-09-06', '0', NULL, NULL, '1022020', 'Cancelado'),
(103, '2020-01-25 14:04:00', '	 Jenifer Aline da Cunha Gums 	', NULL, '	99860-9826	', NULL, NULL, NULL, NULL, NULL, '	Joaquim da Cunha Gums 	', '2019-05-08', '0', NULL, NULL, '1032020', 'Cancelado'),
(104, '2020-01-26 15:15:00', '	 rute de fatima reimer 	', NULL, '	99955-0986	', NULL, NULL, NULL, NULL, NULL, '	joão vitor reimer 	', '2017-08-22', '0', NULL, NULL, '1042020', 'Cancelado'),
(105, '2020-01-27 12:44:00', '	 ROSIMERE PEREIRA DE ANDRADE 	', NULL, '	98488-8255	', NULL, NULL, NULL, NULL, NULL, '	EMANUELY DE ANDRADE DOMINGUES 	', '2017-11-03', '0', NULL, NULL, '1052020', 'Cancelado'),
(106, '2020-01-27 12:54:00', '	 GISLAINE GAMBA 	', NULL, '	99213-4489	', NULL, NULL, NULL, NULL, NULL, '	SARA EUNICE GAMBA LONGEN 	', '2017-03-14', '0', NULL, NULL, '1062020', 'Cancelado'),
(107, '2020-01-27 13:33:00', '	 KASSIELE FRANCINE DA SILVA 	', NULL, '	3345-5060 	', NULL, NULL, NULL, NULL, NULL, '	LORENZO COSTA 	', '2019-08-14', '0', NULL, NULL, '1072020', 'Cancelado'),
(108, '2020-01-27 13:44:00', '	 Jeniffer Pereira da Silva 	', NULL, '	3319-3622 	', NULL, NULL, NULL, NULL, NULL, '	lucas emanuel da silva 	', '2017-07-11', '0', NULL, NULL, '1082020', 'Cancelado'),
(109, '2020-01-27 14:46:00', '	 BARBARA DOMECIANO PARRADO 	', NULL, '	99275-9066	', NULL, NULL, NULL, NULL, NULL, '	DAVI JONATAN SCHUTTEL 	', '2017-04-14', '0', NULL, NULL, '1092020', 'Cancelado'),
(110, '2020-01-27 15:45:00', '	 Patricia de Andrade Novak Pereira 	', NULL, '	99918-3256	', NULL, NULL, NULL, NULL, NULL, '	Marina Novak Pereira 	', '2018-04-23', '0', NULL, NULL, '1102020', 'Cancelado'),
(111, '2020-01-27 15:48:00', '	 PRISCILA FLORES BRUCALE 	', NULL, '	99245-0036	', NULL, NULL, NULL, NULL, NULL, '	BERNARDO BRUCALE 	', '2019-03-19', '0', NULL, NULL, '1112020', 'Cancelado'),
(112, '2020-01-27 17:42:00', '	 JAQUELINE JACOBI DA LUZ 	', NULL, '	98411-3011	', NULL, NULL, NULL, NULL, NULL, '	PIETRA JACOBI DA LUZ 	', '2019-07-15', '0', NULL, NULL, '1122020', 'Cancelado'),
(113, '2020-01-27 18:25:00', '	 Daniela de Abreu Pacheco 	', NULL, '	3398-3113 	', NULL, NULL, NULL, NULL, NULL, '	Ana Laura Pacheco Costa 	', '2018-07-18', '0', NULL, NULL, '1132020', 'Cancelado'),
(114, '2020-01-27 18:26:00', '	 LIANDRA PINHEIRO RITA 	', NULL, '	99694-5983	', NULL, NULL, NULL, NULL, NULL, '	Miguel Henrique Pinheiro Rita 	', '2018-11-15', '0', NULL, NULL, '1142020', 'Cancelado'),
(115, '2020-01-27 19:22:00', '	 Ediani Bento 	', NULL, '	3319-3488 	', NULL, NULL, NULL, NULL, NULL, '	Bernardo Ladewig 	', '2018-06-28', '0', NULL, NULL, '1152020', 'Cancelado'),
(116, '2020-01-28 09:30:00', '	 LISIANE NUNES FERNANDES 	', NULL, '	99156-8257	', NULL, NULL, NULL, NULL, NULL, '	EMANUEL NUNES BITENCOURT 	', '2019-08-19', '0', NULL, NULL, '1162020', 'Cancelado'),
(117, '2020-01-28 09:42:00', '	 tatiana carolina costa santana 	', NULL, '	99292-4347	', NULL, NULL, NULL, NULL, NULL, '	kaio yude santana bezerra 	', '2017-08-16', '0', NULL, NULL, '1172020', 'Cancelado'),
(118, '2020-01-28 13:56:00', '	 Graziela Jasper 	', NULL, '	99693-1717	', NULL, NULL, NULL, NULL, NULL, '	Adryan Jasper Girardi 	', '2018-02-12', '0', NULL, NULL, '1182020', 'Cancelado'),
(119, '2020-01-28 15:25:00', '	 ADRIANA APARECIDA OLIVEIRA SANTAREM DOS SANTOS	', NULL, '	99251-6211	', NULL, NULL, NULL, NULL, NULL, '	Lorenzo Pietro Oliveira dos Santos 	', '2017-03-04', '0', NULL, NULL, '1192020', 'Cancelado'),
(120, '2020-01-28 15:55:00', '	 Evelin Karine Leal Dos Santos Borges 	', NULL, '	3319-1050 	', NULL, NULL, NULL, NULL, NULL, '	Heitor Leal Borges 	', '2019-01-25', '0', NULL, NULL, '1202020', 'Cancelado'),
(121, '2020-01-28 17:34:00', '	 pamela da silva oliveira 	', NULL, '	99686-8360	', NULL, NULL, NULL, NULL, NULL, '	emily maisa oliveira pereira 	', '2019-07-17', '0', NULL, NULL, '1212020', 'Cancelado'),
(122, '2020-01-28 17:58:00', '	 PATRICIA PERES GONCALVES 	', NULL, '	99273-2997	', NULL, NULL, NULL, NULL, NULL, '	JONATHAN DAVI GONCALVES PERES 	', '2020-01-07', '0', NULL, NULL, '1222020', 'Cancelado'),
(123, '2020-01-28 18:22:00', '	 Barbara Mendes Clariano da Silva 	', NULL, '	99660-0502	', NULL, NULL, NULL, NULL, NULL, '	Ana Lívia Mendes de Oliveira 	', '2018-11-25', '0', NULL, NULL, '1232020', 'Cancelado'),
(124, '2020-01-28 20:09:00', '	 Elaine Cristina da Silva Souza 	', NULL, '	3319-1578 	', NULL, NULL, NULL, NULL, NULL, '	Gabriel da Silva Souza 	', '2019-03-08', '0', NULL, NULL, '1242020', 'Cancelado'),
(125, '2020-01-29 08:20:00', '	 Larissa Pinheiro Fernandes 	', NULL, '	99130-6265	', NULL, NULL, NULL, NULL, NULL, '	Benjamin Teylor Padilha 	', '2019-01-03', '0', NULL, NULL, '1252020', 'Cancelado'),
(126, '2020-01-29 09:05:00', '	 Rebeca Casagrande Portaleoni 	', NULL, '	99186-3108	', NULL, NULL, NULL, NULL, NULL, '	Leo Garrido Casagrande Portaleoni 	', '2019-11-09', '0', NULL, NULL, '1262020', 'Cancelado'),
(127, '2020-01-29 13:16:00', '	 Suzana Cardoso Alexandre 	', NULL, '	99925-1072	', NULL, NULL, NULL, NULL, NULL, '	Luiz Gustavo Cardoso dos Santos 	', '2019-11-29', '0', NULL, NULL, '1272020', 'Cancelado'),
(128, '2020-01-29 15:08:00', '	0/1/1900	', NULL, '	99902-3525	', NULL, NULL, NULL, NULL, NULL, '	kaylaine antonio ramos dos santos 	', '2017-06-26', '0', NULL, NULL, '1282020', 'Cancelado'),
(129, '2020-01-29 15:35:00', '	 julia rosa carneiro berlim 	', NULL, '	99709-2862	', NULL, NULL, NULL, NULL, NULL, '	lucca eduardo santos berlim 	', '2019-08-15', '0', NULL, NULL, '1292020', 'Cancelado'),
(130, '2020-01-29 17:12:00', '	 SASKIA MANNRICH RODRIGUES 	', NULL, '	99150-7655	', NULL, NULL, NULL, NULL, NULL, '	PEDRO MANNRICH MOURA 	', '2017-10-22', '0', NULL, NULL, '1302020', 'Cancelado'),
(131, '2020-01-30 13:26:00', '	Nelsieli de Meira jacobi 	', NULL, '	9223-8688 	', NULL, NULL, NULL, NULL, NULL, '	arthur zimmermann 	', '2017-04-18', '0', NULL, NULL, '1312020', 'Cancelado'),
(132, '2020-01-31 14:01:00', '	 Dalilian de Souaa Felicio 	', NULL, '	3345-2606 	', NULL, NULL, NULL, NULL, NULL, '	Bernardo de Sousa Silvano Felício 	', '2019-11-12', '0', NULL, NULL, '1322020', 'Cancelado'),
(133, '2020-01-31 14:43:00', '	 Juliana De Azevedo Morgan 	', NULL, '	99602-1068	', NULL, NULL, NULL, NULL, NULL, '	Davi Emanuel Morgan 	', '2019-07-16', '0', NULL, NULL, '1332020', 'Cancelado'),
(134, '2020-01-31 16:18:00', '	 Aline Maiara dos Santos de Santana 	', NULL, '	99911-5239	', NULL, NULL, NULL, NULL, NULL, '	Giovana de Santana 	', '2020-01-17', '0', NULL, NULL, '1342020', 'Cancelado'),
(135, '2020-01-31 18:13:00', '	 Gislaine Soares 	', NULL, '	99787-9155	', NULL, NULL, NULL, NULL, NULL, '	gustavo silva 	', '2018-04-10', '0', NULL, NULL, '1352020', 'Cancelado'),
(136, '2020-02-01 10:16:00', '	 JOICE WISBECKI 	', NULL, '	3342-5225 	', NULL, NULL, NULL, NULL, NULL, '	ELOÍSA DA COSTA WISBECKI 	', '2018-11-30', '0', NULL, NULL, '1362020', 'Cancelado'),
(137, '2020-02-02 20:26:00', '	 DILSA DA CONCEIÇAO 	', NULL, '	99995-5286	', NULL, NULL, NULL, NULL, NULL, '	ELOÁ DA CONCEIÇAO SABINO 	', '2019-02-10', '0', NULL, NULL, '1372020', 'Cancelado'),
(138, '2020-02-03 08:22:00', '	 JAQUELINE DA LUZ PEREIRA 	', NULL, '	99289-4558	', NULL, NULL, NULL, NULL, NULL, '	KAYKY FERNANDO DA LUZ ETUR 	', '2019-03-05', '0', NULL, NULL, '1382020', 'Cancelado'),
(139, '2020-02-03 10:40:00', '	fabiane priscila da silva 	', NULL, '	99724-7031	', NULL, NULL, NULL, NULL, NULL, '	DAVI HERMENEGILDO 	', '2017-12-01', '0', NULL, NULL, '1392020', 'Cancelado'),
(140, '2020-02-03 14:58:00', '	 mariaeloyza velloso 	', NULL, '	8418-9446 	', NULL, NULL, NULL, NULL, NULL, '	brayan velloso lamim 	', '2019-01-23', '0', NULL, NULL, '1402020', 'Cancelado'),
(141, '2020-02-03 15:40:00', '	 Leliane Militão da Silva 	', NULL, '	99947-0536	', NULL, NULL, NULL, NULL, NULL, '	Guilherme Henrique da Silva 	', '2020-01-25', '0', NULL, NULL, '1412020', 'Cancelado'),
(142, '2020-02-03 16:17:00', '	 Taylana melek 	', NULL, '	99680-5861	', NULL, NULL, NULL, NULL, NULL, '	Isabelly melek libório 	', '2018-10-09', '0', NULL, NULL, '1422020', 'Cancelado'),
(143, '2020-02-03 16:41:00', '	 Talita Carvalho 	', NULL, '	99906-6225	', NULL, NULL, NULL, NULL, NULL, '	Leonardo Henrique da cunha 	', '2018-09-13', '0', NULL, NULL, '1432020', 'Cancelado'),
(144, '2020-02-03 16:42:00', '	 Maria fabiani rosa 	', NULL, '	99987-0674	', NULL, NULL, NULL, NULL, NULL, '	arthur davi rosa schmidt 	', '2019-01-18', '0', NULL, NULL, '1442020', 'Cancelado'),
(145, '2020-02-03 17:00:00', '	Vanessa Costa da sILVA 	', NULL, '	99229-7367	', NULL, NULL, NULL, NULL, NULL, '	Enrico Costa da Silva 	', '2018-04-26', '0', NULL, NULL, '1452020', 'Cancelado'),
(146, '2020-07-13 23:58:08', 'JEANDREI', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 6, 'TUA TESTE', 93, NULL, 'DEXTER', '2020-01-01', '1', 'teste de observação', '004.620.059-25', '1462020', 'Cancelado'),
(148, '2020-07-14 00:34:12', 'MARICLEIA RIBEIRO', '', '(47) 99116-9267', '', 6, 'RUA TESTE', 0, NULL, 'BELOCA DA MARI DEX E BIJU DO JEANDREI', '2020-04-30', '0', 'teste', '008.607.209-93', '1482020', 'Cancelado'),
(152, '2020-07-15 20:26:22', 'ORLANDO WALTER', '', '(47) 99116-9267', '', 6, 'FDSF', 0, '', 'ADFADFAF', '2020-05-07', '1', 'afdaf', '', '1492020', 'Cancelado'),
(153, '2020-07-15 20:28:37', 'FDFADF', '', '(47) 99116-9267', '', 7, 'FDASDFASDF', 3, '', 'ASDFAFASDFASDF', '2020-05-07', '1', 'adfaf', '', '1532020', 'Cancelado'),
(154, '2020-07-15 20:29:28', 'JEANDREI WALTER', '', '(47) 99116-9267', '', 6, 'DFAFSDA', 54, '', 'ASDFAFA', '2020-07-02', '1', 'afdf', '', '1542020', 'Cancelado'),
(155, '2020-07-15 20:29:59', 'JEANDREI WALTER', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 7, 'AFDFAF', 34, '', 'ADFDSAF', '2020-06-04', '0', 'adfafa', '004.620.059-25', '1552020', 'Cancelado'),
(156, '2020-07-15 20:30:28', 'AFAFA FAFA', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 6, 'ASDFSAFA', 54, '', 'AFDSAFA', '2020-07-02', '0', 'asdf', '004.620.059-25', NULL, 'Cancelado'),
(163, '2020-07-16 20:17:36', 'JEANDREI WALTER', '', '(47) 99116-9267', '', 6, 'RUA TESTE', 54, '', 'SEI LA APENAS TESTE', '2020-07-02', '0', '', '', NULL, 'Cancelado'),
(164, '2020-07-16 20:19:33', 'JEANDREI WALTER', 'jeandreiwalter@gmail.com', '(47) 99116-9267', '', 6, 'RUA TESTE', 54, '', 'NOME TESTE F', '1980-02-10', '1', 'obs', '', NULL, 'Cancelado'),
(165, '2020-07-16 20:20:12', 'JEANDREI WALTER', 'jeandreiwalter@yahoo.com.br', '(47) 99116-3863', '(47) 99116-9267', 5, 'MANOEL TOLENTINO DOS SANTOS', 93, '', 'NOME TESTE', '1980-02-10', '1', 'AFAF O DEX ESTÁ AQUI COMIGOdsfa', '', NULL, 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_id_fila`
--

CREATE TABLE `historico_id_fila` (
  `id` int(11) NOT NULL,
  `fila_id` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `historico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `role`
--

CREATE TABLE `role` (
  `id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `userrole`
--

CREATE TABLE `userrole` (
  `userid` int(11) NOT NULL,
  `roleid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` char(5) DEFAULT 'user',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`) VALUES
(1, 'Jeandrei', 'jeandreiwalter@gmail.com', '$2y$10$lyyCqzV/cJw5A8TpddC47Ow8K2iVHOHbKl.Nzs0fm/CgjuDBRZoMq', 'admin', '0000-00-00 00:00:00'),
(2, 'teste1', 'teste1r@gmail.com', '$2y$10$Y3Phy8lW7ACZ41qrXjqOjuS26Jzj5WEoWa3mjNrNwWcHpyPKnOtji', 'user', '2018-11-27 15:29:36'),
(3, 'teste', 'jean.walter@penha.sc.gov.br', '$2y$10$EwxO3Gf78AQdSoVhVf6yxefdZFR2n3ON2w.t9XnyXsZPLJTNXfTGi', 'user', '2019-01-09 16:46:20');


CREATE TABLE `estados` (
  `id` int(11) NOT NULL,  
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `municipio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
-- Índices de tabela `historico_id_fila`
--
ALTER TABLE `historico_id_fila`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `municipios`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de tabela `historico_id_fila`
--
ALTER TABLE `historico_id_fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
