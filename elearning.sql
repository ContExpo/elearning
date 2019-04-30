-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 alle 13:15
-- Versione del server: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elearning`
--
CREATE DATABASE IF NOT EXISTS `elearning` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `elearning`;

-- --------------------------------------------------------

--
-- Struttura della tabella `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id_exercise` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `score` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id_exercise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `id_exercise` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `correct` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `multiple_choices`
--

DROP TABLE IF EXISTS `multiple_choices`;
CREATE TABLE IF NOT EXISTS `multiple_choices` (
  `id_choice` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `text` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id_choice`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=41 ;

--
-- Dump dei dati per la tabella `multiple_choices`
--

INSERT INTO `multiple_choices` (`id_choice`, `id_question`, `text`) VALUES
(1, 21, 'seeing double'),
(2, 21, 'about to get hurt'),
(3, 21, 'staring at them'),
(4, 21, 'looking in'),
(5, 22, 'is drinking'),
(6, 22, 'drinks'),
(7, 22, 'drink '),
(8, 22, 'is drinking'),
(9, 24, ' Do you ever played'),
(10, 24, 'Did you ever play'),
(11, 24, 'Have you ever played'),
(12, 24, 'Did you ever played'),
(13, 25, 'have just finished'),
(14, 25, 'am finishing'),
(15, 25, 'just finished'),
(16, 25, ' has just finished'),
(17, 26, 'into'),
(18, 26, 'in'),
(19, 26, 'for'),
(20, 26, 'at'),
(21, 27, 'would have listened'),
(22, 27, 'should listen'),
(23, 27, 'should have listened'),
(24, 27, 'shouldn’t have listened'),
(25, 28, 'drop for'),
(26, 28, 'drop by'),
(27, 28, 'pop for'),
(28, 28, 'drag'),
(29, 29, 'denounced'),
(30, 29, 'derelict'),
(31, 29, 'decided'),
(32, 29, 'declined'),
(33, 30, 'fresh blood'),
(34, 30, 'red blood'),
(35, 30, 'freshen'),
(36, 30, 'fresh as a daisy'),
(37, 31, 'are discovering'),
(38, 31, 'will discovered'),
(39, 31, 'have discovered'),
(40, 31, 'will have discovered');

-- --------------------------------------------------------

--
-- Struttura della tabella `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) COLLATE latin1_general_cs NOT NULL COMMENT 'Testo della domanda',
  `type` varchar(1) COLLATE latin1_general_cs NOT NULL COMMENT 'Il tipo di domanda (fill, risposta multipla...)',
  `solution` varchar(50) COLLATE latin1_general_cs NOT NULL COMMENT 'La risposta esatta',
  `category` varchar(20) COLLATE latin1_general_cs DEFAULT NULL COMMENT 'La categoria di conoscenza (verbi, vocaboli...)',
  PRIMARY KEY (`id_question`),
  KEY `id_question` (`id_question`),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=34 ;

--
-- Dump dei dati per la tabella `questions`
--

INSERT INTO `questions` (`id_question`, `text`, `type`, `solution`, `category`) VALUES
(1, 'I am very thirsty, I need to drink some ***.', 'i', 'WATER', NULL),
(2, 'The dog is an animal with four ***.', 'i', 'LEGS', NULL),
(3, 'I got too close to the fire and *** myself.', 'i', 'BURNED ', NULL),
(4, 'It is raining *** and dogs.', 'i', 'CATS ', NULL),
(5, 'There''s not signal, I can''t *** my mom.', 'i', 'CALL ', NULL),
(6, 'I spent little, this restaurant is very ***.', 'i', 'CHEAP', NULL),
(7, 'To be or *** to be, this is the question.', 'i', 'NOT ', NULL),
(8, 'English is one of the most widely spoken *** ??in the world.\r\n', 'i', 'LANGUAGES ', NULL),
(9, 'Today it''s sunny am tomorrow it *** rain.', 'i', 'WILL ', NULL),
(10, 'I need the pen because I *** mine.\r\n', 'i', 'LOST ', NULL),
(11, 'I flown to Spain and met my guide, George.', 'c', 'FLEW', NULL),
(12, 'She lives in London with her husband Tom and their three daughter. \n', 'c', 'DAUGHTER', NULL),
(13, 'He spends her time riding his motorbike and listening to music. \r\n', 'c', 'HIS', NULL),
(14, 'She forgets always my birthday.   ', 'c', 'ALWAYS FORGETS', NULL),
(15, 'How long has your father live in Sicily?     ', 'c', 'LIVED', NULL),
(16, 'He’s be listening to that song for hours.     \r\n', 'c', 'BEEN', NULL),
(17, 'I sleeped and fell on the ice.   ', 'c', 'SLIPPED', NULL),
(18, 'What a beautiful day for your weding, Mary!    ', 'c', 'WEDDING', NULL),
(19, 'Who’s that well-looking man talking to Rosemary?  \r\n', 'c', 'GOOD-LOOKING', NULL),
(20, 'The dentist had to pull out two of his tooths.', 'c', 'TEETH', NULL),
(21, 'If someone yells “Look out” at you, you are...', 'm', 'about to get hurt', NULL),
(22, 'He usually *** mineral water.', 'm', 'drinks', NULL),
(24, '*** softball? I love it!', 'm', 'Have you ever played', NULL),
(25, ' I *** doing my daily exercise.\r\n', 'm', 'have just finished', NULL),
(26, 'I don’t believe *** reincarnation, but we will see.', 'm', 'in', NULL),
(27, 'We *** to her, but she seemed honest.', 'm', 'shouldn’t have liste', NULL),
(28, 'Can you *** at 8 o’clock? I can give you the book then.', 'm', 'drop by', NULL),
(29, 'I *** her offer. It wasn’t good enough.\r\n', 'm', 'declined', NULL),
(30, 'You company needs some *** on its PR team.', 'm', 'fresh blood', NULL),
(31, ' By the end of the decade scientists *** a cure for this illness.', 'm', 'will have discovered', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `name` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `surname` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `role` varchar(1) COLLATE latin1_general_cs NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `name`, `surname`, `role`) VALUES
(1, 'Ciula', 'stdZ/mi729gPs', 'andrew@ciulish.it', 'Andrew', 'Ciulish', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
