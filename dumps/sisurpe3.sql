-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 13/12/2018 às 00:11
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
-- Banco de dados: `sisurpe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(255) NOT NULL,
  `chave` char(13) NOT NULL,
  `nascimento` datetime DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `telefone_aluno` char(20) DEFAULT NULL,
  `email_aluno` varchar(255) DEFAULT NULL,
  `nome_pai` varchar(255) DEFAULT NULL,
  `telefone_pai` char(20) DEFAULT NULL,
  `nome_mae` varchar(255) DEFAULT NULL,
  `telefone_mae` char(20) DEFAULT NULL,
  `nome_responsavel` varchar(255) DEFAULT NULL,
  `telefone_resp` char(20) DEFAULT NULL,
  `naturalidade` varchar(255) DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `rg` char(15) DEFAULT NULL,
  `uf_rg` char(2) DEFAULT NULL,
  `orgao_emissor` char(5) DEFAULT NULL,
  `titulo_eleitor` varchar(20) DEFAULT NULL,
  `zona` int(11) DEFAULT NULL,
  `secao` int(11) DEFAULT NULL,
  `certidao` varchar(255) DEFAULT NULL,
  `uf_cert` char(2) DEFAULT NULL,
  `cartorio_cert` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `folha` int(11) DEFAULT NULL,
  `livro` varchar(255) DEFAULT NULL,
  `data_emissao_cert` datetime DEFAULT NULL,
  `municipio_cert` varchar(255) DEFAULT NULL,
  `cpf` char(15) DEFAULT NULL,
  `tipo_sanguineo` char(3) DEFAULT NULL,
  `faz_uso_medicacao` char(3) DEFAULT NULL,
  `medicamentos` varchar(255) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `deficiencias` varchar(255) DEFAULT NULL,
  `restric_alimentos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `chave`, `nascimento`, `sexo`, `telefone_aluno`, `email_aluno`, `nome_pai`, `telefone_pai`, `nome_mae`, `telefone_mae`, `nome_responsavel`, `telefone_resp`, `naturalidade`, `nacionalidade`, `rg`, `uf_rg`, `orgao_emissor`, `titulo_eleitor`, `zona`, `secao`, `certidao`, `uf_cert`, `cartorio_cert`, `modelo`, `numero`, `folha`, `livro`, `data_emissao_cert`, `municipio_cert`, `cpf`, `tipo_sanguineo`, `faz_uso_medicacao`, `medicamentos`, `alergias`, `deficiencias`, `restric_alimentos`) VALUES
(1, 'ABRAÃO ANGELO CORRÊA DE SOUZA', 'uKzDHYY4A2jH', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ano`
--

CREATE TABLE `ano` (
  `id_ano` int(11) NOT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_anuais`
--

CREATE TABLE `dados_anuais` (
  `id_da` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `ano_id` int(11) NOT NULL,
  `usa_transporte` char(3) DEFAULT NULL,
  `linha` varchar(255) DEFAULT NULL,
  `tam_moletom` varchar(50) DEFAULT NULL,
  `tam_camiseta` varchar(50) DEFAULT NULL,
  `tam_calca` varchar(50) DEFAULT NULL,
  `tam_bermuda` varchar(50) DEFAULT NULL,
  `tam_calcado` varchar(50) DEFAULT NULL,
  `tam_meia` varchar(50) DEFAULT NULL,
  `escola` varchar(255) DEFAULT NULL,
  `turma` char(50) DEFAULT NULL,
  `turno` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `ano`
--
ALTER TABLE `ano`
  ADD PRIMARY KEY (`id_ano`);

--
-- Índices de tabela `dados_anuais`
--
ALTER TABLE `dados_anuais`
  ADD PRIMARY KEY (`id_da`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `ano_id` (`ano_id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `aluno_id` (`aluno_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ano`
--
ALTER TABLE `ano`
  MODIFY `id_ano` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dados_anuais`
--
ALTER TABLE `dados_anuais`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `dados_anuais`
--
ALTER TABLE `dados_anuais`
  ADD CONSTRAINT `dados_anuais_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `dados_anuais_ibfk_2` FOREIGN KEY (`ano_id`) REFERENCES `ano` (`id_ano`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id_aluno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
