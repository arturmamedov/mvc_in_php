-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Ott 16, 2014 alle 04:55
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `mvc_menu`
--

CREATE TABLE IF NOT EXISTS `mvc_menu` (
  `menu_id` int(2) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_visible` enum('0','1') NOT NULL,
  `menu_position` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `mvc_menu`
--

INSERT INTO `mvc_menu` (`menu_id`, `menu_name`, `menu_title`, `menu_visible`, `menu_position`) VALUES
(1, 'Home', 'HomePage del sito fatto in MVC in PHP', '1', 1),
(2, 'About', 'SecondPage del sito fatto in MVC in PHP', '1', 2),
(3, 'Terza Pagina', 'Terza pagina del sito MVC in PHP', '1', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `mvc_page`
--

CREATE TABLE IF NOT EXISTS `mvc_page` (
  `page_id` int(2) NOT NULL,
  `page_keywords` varchar(255) NOT NULL,
  `page_description` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_titleText` varchar(255) NOT NULL,
  `page_text` text NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `mvc_page`
--

INSERT INTO `mvc_page` (`page_id`, `page_keywords`, `page_description`, `page_title`, `page_titleText`, `page_text`, `active`) VALUES
(1, 'META_KEYWORDS', 'META_DESCRIPTION', 'VideoCorso MVC in PHP -[OBIV].it', 'Quinta VideoLezione - MVC in PHP', 'Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.', '1'),
(2, 'META_KEYWORDS', 'META_DESCRIPTION', 'Pagina 2 VideoCorso MVC in PHP -[OBIV].it', 'Pagina 2 Quinta VideoLezione - MVC in PHP', 'Pagina 2 Lorem Ipsum è un testo segnaposto utilizzato nel settore della tipografia e della stampa. Lorem Ipsum è considerato il testo segnaposto standard sin dal sedicesimo secolo, quando un anonimo tipografo prese una cassetta di caratteri e li assemblò per preparare un testo campione. È sopravvissuto non solo a più di cinque secoli, ma anche al passaggio alla videoimpaginazione, pervenendoci sostanzialmente inalterato. Fu reso popolare, negli anni ’60, con la diffusione dei fogli di caratteri trasferibili “Letraset”, che contenevano passaggi del Lorem Ipsum, e più recentemente da software di impaginazione come Aldus PageMaker, che includeva versioni del Lorem Ipsum.', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mvc_menu`
--
ALTER TABLE `mvc_menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `mvc_page`
--
ALTER TABLE `mvc_page`
 ADD PRIMARY KEY (`page_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
