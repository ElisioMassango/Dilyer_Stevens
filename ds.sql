-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Abr-2022 às 19:23
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int NOT NULL AUTO_INCREMENT,
  `information` text NOT NULL,
  `number_songs` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image_about` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `about`
--

INSERT INTO `about` (`id`, `information`, `number_songs`, `name`, `surname`, `image1`, `image_about`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae. Explicabo illo unde, odio consequatur ipsam possimus veritatis, placeat, ab molestiae velit inventore exercitationem consequuntur blanditiis omnis beatae. Dolor iste excepturi ratione soluta quas culpa voluptatum repudiandae harum non.', 0, 'Dilyer', 'Stevens', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `cat_slug` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `created_on`) VALUES
(7, 'Sapatilhas da Zara', 'elisiomassango12@gmail.com', 'aaa', 'aaa', '2022-04-11 19:17:23'),
(17, 'Shelton', 'zeincanto13@gmail.com', 'Reclamacao', 'Ola teste teste ', '2022-04-12 18:57:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `photo_album`
--

DROP TABLE IF EXISTS `photo_album`;
CREATE TABLE IF NOT EXISTS `photo_album` (
  `id` int NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `video` varchar(300) NOT NULL,
  `category_id` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `released_at` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `date_view` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `songs`
--

INSERT INTO `songs` (`id`, `name`, `slug`, `photo`, `video`, `category_id`, `description`, `released_at`, `link`, `date_view`) VALUES
(1, 'SORVEIGN D', '', '_1649788806.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4r3MZNCGzVY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 0, 'THis song is very special to me.Becau it talks about this that are currently happening in the society.', '0000-00-00', '', '0000-00-00'),
(3, 'bawito', 'bawito', 'bawito_1649788778.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/StluLZhOTBg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, '<p>aavdvvd</p>\r\n', '0000-00-00', 'http://deadbroskiix.epizy.com/', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `up_coming`
--

DROP TABLE IF EXISTS `up_coming`;
CREATE TABLE IF NOT EXISTS `up_coming` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `address` varchar(150) NOT NULL,
  `contact_info` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `address`, `contact_info`, `photo`, `status`, `created_on`) VALUES
(3, 'admin', 'admin', 'admin@admin.com', '$2y$10$H17.LLWofIHe4zomV17kRez88rmDGo3I31C4fqkMgtEqGtDQvMbB6', 0, '1234', 124, '5.jpg', 1, '2022-04-11 00:00:00'),
(4, 'shelton', 'Biquiza', 'shelton@gmail.com', '$2y$10$ozq.vCEapC/LW1J1hDbk4OcWIVqtU.8RMKJAMJZfiVrv8r5zXnOgG', 0, 'safsvc', 12344, '2.jpg', 1, '2022-04-12 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
