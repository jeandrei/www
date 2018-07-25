-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 25-Jul-2018 às 06:29
-- Versão do servidor: 5.5.53-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

#CREATE DATABASE ijdb;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ijdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `author`
--

INSERT INTO `author` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jeandrei Walter', 'jeandreiwalter@gmail.com', '11088d77dfa6640753da082d23365368'),
(2, 'Joan Smith', 'joan@example.com', '8d3a85614b6f848c085a4919e4a3b4c2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `authorrole`
--

CREATE TABLE IF NOT EXISTS `authorrole` (
  `authorid` int(11) NOT NULL,
  `roleid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `authorrole`
--

INSERT INTO `authorrole` (`authorid`, `roleid`) VALUES
(1, 'Account Administrator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Knock-knock'),
(2, 'Cross the road'),
(3, 'Lawyers'),
(4, 'Walk the bar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `joke`
--

CREATE TABLE IF NOT EXISTS `joke` (
`id` int(11) NOT NULL,
  `joketext` text,
  `jokedate` date NOT NULL,
  `authorid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `joke`
--

INSERT INTO `joke` (`id`, `joketext`, `jokedate`, `authorid`) VALUES
(1, 'Why did the chicken cross the road? To get to the other side!', '2018-06-07', 1),
(2, 'Knock-knock! Who''s there? Boo! "Boo" who? Don''t cry; it''s only a joke!', '2012-04-01', 1),
(3, 'A man walks into a bar. "Ouch."', '2012-04-01', 2),
(4, 'How many lawyers does it take to screw in a lightbulb? I can''t say: I might be sued!', '2012-04-01', 2),
(5, 'Teste de adicao de joke				\r\n			', '2018-07-10', NULL),
(6, 'TESTE 1				\r\n			', '2018-07-10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jokecategory`
--

CREATE TABLE IF NOT EXISTS `jokecategory` (
  `jokeid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jokecategory`
--

INSERT INTO `jokecategory` (`jokeid`, `categoryid`) VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `description`) VALUES
('Account Administrator', 'Add, remove, and edit authors'),
('Content Editor', 'Add, remove, and edit jokes'),
('Site Administrator', 'Add, remove, and edit categories');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `authorrole`
--
ALTER TABLE `authorrole`
 ADD PRIMARY KEY (`authorid`,`roleid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joke`
--
ALTER TABLE `joke`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jokecategory`
--
ALTER TABLE `jokecategory`
 ADD PRIMARY KEY (`jokeid`,`categoryid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `joke`
--
ALTER TABLE `joke`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
