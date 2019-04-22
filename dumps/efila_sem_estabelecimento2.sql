-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 15/01/2019 às 12:52
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
-- Banco de dados: `efila`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nascimento` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `aluno`
--

INSERT INTO `aluno` (`id`, `usuario_id`, `nascimento`, `endereco`, `Nome`) VALUES
(1, 1, '2017-08-14', 'Rua José João Batista', 'DEXTER DA SILVA'),
(2, 1, '2016-10-18', 'Rua Manoel Tolentino dos Santos, 93\r\nCasa', 'BIJU SAPECA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `idade_minima` int(11) NOT NULL,
  `idade_maxima` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `idade_minima`, `idade_maxima`, `descricao`) VALUES
(3, 2, 3, 'MATERNAL I'),
(12, 20, 20, 'MATERNAL II'),
(19, 20, 20, 'PRÉ'),
(20, 20, 20, 'PRÉ II'),
(21, 24, 48, 'PENHA MATERNAL II');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id`, `nome`, `endereco`) VALUES
(4, 'TESTE ESTABELECIMENTO', 'ADAFD'),
(6, 'CEI ANJOS DO ITAPOCOROI', 'RUA DAS NEVES, 96 BAIRRO GRAVATÃ DKJDKK'),
(7, 'RUBENS', 'RUA TESTE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fila`
--

CREATE TABLE `fila` (
  `id` int(11) NOT NULL,
  `atendimento_id` int(11) NOT NULL,
  `dataini` date NOT NULL,
  `datafim` date NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `fila`
--

INSERT INTO `fila` (`id`, `atendimento_id`, `dataini`, `datafim`, `status`) VALUES
(1, 3, '2019-02-01', '2019-03-01', 'ativo'),
(2, 3, '2018-08-05', '2019-01-08', 'inativo'),
(3, 12, '2018-10-07', '2019-01-10', 'inativo'),
(4, 21, '2018-11-01', '2019-01-15', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filaespera`
--

CREATE TABLE `filaespera` (
  `id` int(11) NOT NULL,
  `fila_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `ordem_fila` int(11) NOT NULL,
  `stuacao` varchar(50) NOT NULL DEFAULT 'aguardando'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `filaespera`
--

INSERT INTO `filaespera` (`id`, `fila_id`, `aluno_id`, `ordem_fila`, `stuacao`) VALUES
(1, 1, 1, 1, 'aguardando'),
(2, 1, 2, 2, 'aguardando');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 1, 'Post One', 'This is a test for post one', '2018-11-27 20:01:26'),
(2, 1, 'Post Two', 'This is a test for post two', '2018-11-27 20:01:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telefone1` varchar(20) DEFAULT NULL,
  `desctel1` varchar(100) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `desctel2` varchar(100) DEFAULT NULL,
  `type` char(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `telefone1`, `desctel1`, `telefone2`, `desctel2`, `type`) VALUES
(1, 'Jeandrei', 'jeandreiwalter@gmail.com', '$2y$10$lyyCqzV/cJw5A8TpddC47Ow8K2iVHOHbKl.Nzs0fm/CgjuDBRZoMq', '2018-11-23 10:19:18', '', '', '', '', 'admin'),
(2, 'teste1', 'teste1r@gmail.com', '$2y$10$Y3Phy8lW7ACZ41qrXjqOjuS26Jzj5WEoWa3mjNrNwWcHpyPKnOtji', '2018-11-27 15:29:36', '', '', '', '', 'user'),
(3, 'Dexter', 'dexter@gmail.com', '$2y$10$xS7RXsPMbTaUx9JVG8fqMO3aFrqQPUqjcLhLxmMmfS9gyLD/SqrIy', '2019-01-09 12:34:26', '', '', '', '', 'user'),
(4, 'jean', 'jeandrei.walter@penha.sc.gov.br', '$2y$10$//zWWho7kVCC7jMXFPZeMuFTAyQgL4Awjy9S0m.1S0PMa/qLBQOru', '2019-01-09 16:49:58', NULL, NULL, NULL, NULL, 'user'),
(6, 'biju', 'biju@gmail.com', '$2y$10$ddCIFSoS7VKaJCAMFqlenenZLAfFw38AqDJXRKOaWcL0qqLW881Y6', '2019-01-09 17:04:05', '(47) 99587-2547', 'casa', '(47) 99587-9874', 'trabalho', 'user'),
(7, 'Arlete', 'arlete@gmail.com', '$2y$10$nUAZY2gpZvobmJDNEKJHr.cT4B1xpB89xDgu94hxyTjGmhp4/O5lG', '2019-01-09 17:35:50', '(55) 12315-4545', 'casa', '(54) 54654-5456', 'trabalho', 'user');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atedimento_id` (`atendimento_id`);

--
-- Índices de tabela `filaespera`
--
ALTER TABLE `filaespera`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ordem` (`ordem_fila`),
  ADD KEY `aluno_id` (`aluno_id`) USING BTREE,
  ADD KEY `fila_id` (`fila_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `fila`
--
ALTER TABLE `fila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `filaespera`
--
ALTER TABLE `filaespera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `fila`
--
ALTER TABLE `fila`
  ADD CONSTRAINT `atendimento_id` FOREIGN KEY (`atendimento_id`) REFERENCES `atendimento` (`id`);

--
-- Restrições para tabelas `filaespera`
--
ALTER TABLE `filaespera`
  ADD CONSTRAINT `filaespera_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `filaespera_ibfk_2` FOREIGN KEY (`fila_id`) REFERENCES `fila` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
