SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `exercises` (
  `id_exercise` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `score` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id_exercise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `links` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `id_exercise` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `user_answer` varchar(20) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `multiple_choices` (
  `id_choice` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `text` varchar(20) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id_choice`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `text` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'Il tipo di domanda (fill, risposta multipla...)',
  `solution` varchar(20) COLLATE latin1_general_cs NOT NULL COMMENT 'La risposta esatta',
  `category` varchar(20) COLLATE latin1_general_cs NOT NULL COMMENT 'La categoria di conoscenza (verbi, vocaboli...)',
  PRIMARY KEY (`id_question`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `role` varchar(1) COLLATE latin1_general_cs NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
