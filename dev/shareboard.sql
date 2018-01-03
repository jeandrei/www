-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 03-Jan-2018 às 21:38
-- Versão do servidor: 5.5.53-0+deb8u1
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shareboard`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `title`, `body`, `link`, `create_date`) VALUES
(1, 1, 'share one', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et consequat justo. Donec luctus tortor sed tortor sollicitudin, a eleifend ante dictum. Suspendisse urna quam, ultricies et quam ac, egestas tincidunt ex. In sagittis turpis eu elit accumsan mollis. Donec pharetra lectus a porta sodales. Vestibulum vitae accumsan quam. Integer sollicitudin nisl nec quam volutpat, eget feugiat risus efficitur.', 'http://eduonix.com', '2018-01-03 22:29:16'),
(2, 2, 'shate two', 'Fusce maximus efficitur arcu, vitae ullamcorper lacus condimentum sed. Maecenas elementum ut dolor quis egestas. Nullam semper mi a orci efficitur, eu interdum mauris volutpat. Ut cursus urna at orci malesuada placerat. Quisque mattis enim eu orci tempus faucibus. Curabitur in ante varius, consequat lorem a, mattis massa. ', 'http://google.com', '2018-01-03 22:29:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
