-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2014 at 02:47 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE IF NOT EXISTS `goal` (
  `match_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `goal_time` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `goal_id_UNIQUE` (`goal_id`),
  KEY `fk_goal_match_info1_idx` (`match_id`),
  KEY `fk_goal_player_info1_idx` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`match_id`, `player_id`, `goal_time`, `goal_id`) VALUES
(1, 1, 0, 1),
(1, 2, 0, 2),
(1, 1, 0, 3),
(1, 4, 0, 4),
(1, 6, 0, 5),
(1, 6, 0, 6),
(1, 6, 0, 7),
(1, 6, 0, 8),
(1, 3, 0, 9),
(1, 3, 0, 10),
(1, 5, 0, 11),
(1, 5, 0, 12),
(2, 7, 0, 13),
(3, 10, 0, 14),
(3, 11, 0, 15),
(4, 14, 0, 16),
(4, 16, 0, 17),
(2, 8, 0, 18),
(2, 7, 0, 19),
(2, 1, 0, 20),
(2, 3, 0, 21),
(2, 7, 1377103699, 22),
(5, 35, 46, 23),
(5, 37, 2292, 24),
(5, 37, 2295, 25),
(5, 37, 2295, 26),
(5, 25, 2297, 27),
(5, 27, 2391, 28),
(6, 18, 1, 29),
(7, 31, 25, 30),
(8, 37, 1, 31),
(8, 38, 95, 32),
(9, 19, 16, 33),
(9, 30, 4346, 34);

-- --------------------------------------------------------

--
-- Stand-in structure for view `goal_info`
--
CREATE TABLE IF NOT EXISTS `goal_info` (
`goal_id` int(11)
,`goal_time` int(11)
,`player_id` int(11)
,`player_name` varchar(255)
,`team_id` int(11)
,`team_name` varchar(255)
,`match_id` int(11)
,`match_venue` varchar(255)
,`league_name` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `team_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`,`match_id`),
  KEY `fk_match_match_info1_idx` (`match_id`),
  KEY `fk_match_team_info1_idx` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`team_id`, `match_id`, `starttime`) VALUES
(1, 1, '1370703967'),
(1, 2, '1370806206'),
(2, 1, '1370703967'),
(3, 2, '1370806206'),
(4, 3, '1370929356'),
(5, 3, '1370929356'),
(6, 4, '1370932611 '),
(7, 4, '1370932611 '),
(8, 5, '1377267656'),
(8, 6, '1377423288'),
(8, 9, '1377756951'),
(9, 5, '1377267656'),
(9, 7, '1377585775'),
(9, 8, '1377750283'),
(9, 9, '1377756951'),
(10, 6, '1377423288'),
(10, 7, '1377585775'),
(10, 8, '1377750283'),
(12, 10, '1377758098'),
(13, 10, '1377758098');

-- --------------------------------------------------------

--
-- Stand-in structure for view `match_all`
--
CREATE TABLE IF NOT EXISTS `match_all` (
`user_mail` varchar(255)
,`match_id` int(11)
,`league_name` varchar(255)
,`match_venue` varchar(255)
,`match_result` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `match_info`
--

CREATE TABLE IF NOT EXISTS `match_info` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `league_name` varchar(255) NOT NULL,
  `match_venue` varchar(255) NOT NULL,
  `match_result` varchar(255) NOT NULL,
  PRIMARY KEY (`match_id`),
  UNIQUE KEY `idmatch_id_UNIQUE` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `match_info`
--

INSERT INTO `match_info` (`match_id`, `league_name`, `match_venue`, `match_result`) VALUES
(1, 'FIFA', 'Bangladesh', '0-0'),
(2, 'FIFA', 'Bangladesh', '0-0'),
(3, 'Chaimpion Leuge', 'hghdfgjhk,kd', '0-0'),
(4, 'fm le', 'in a drain', '0-0'),
(5, 'La LiGa', 'Spain', '0-0'),
(6, 'La LIGA', 'Spain', '0-0'),
(7, 'La LIGA', 'Spain', '0-0'),
(8, 'La Liga', 'Spain', '0-0'),
(9, 'La Liga', 'Germany', '0-0'),
(10, 'BPL', 'Mirpur', '0-0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `match_player`
--
CREATE TABLE IF NOT EXISTS `match_player` (
`match_id` int(11)
,`team_id` int(11)
,`team_name` varchar(255)
,`player_id` int(11)
,`player_name` varchar(255)
,`player_age` varchar(255)
,`player_jersey` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `playerteam`
--

CREATE TABLE IF NOT EXISTS `playerteam` (
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  PRIMARY KEY (`team_id`,`player_id`),
  KEY `fk_playerteam_team_info1_idx` (`team_id`),
  KEY `fk_playerteam_player_info1_idx` (`player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playerteam`
--

INSERT INTO `playerteam` (`team_id`, `player_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(5, 12),
(6, 13),
(6, 14),
(6, 15),
(7, 16),
(7, 17),
(8, 18),
(8, 19),
(8, 20),
(8, 21),
(8, 22),
(8, 23),
(8, 24),
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(9, 29),
(9, 30),
(9, 31),
(9, 32),
(9, 33),
(9, 34),
(9, 35),
(9, 36),
(9, 37),
(9, 38),
(9, 39),
(10, 40),
(10, 41),
(10, 42),
(10, 43),
(10, 44),
(10, 45),
(10, 46),
(10, 47),
(10, 48),
(10, 49),
(10, 50),
(12, 51),
(12, 52),
(13, 53);

-- --------------------------------------------------------

--
-- Table structure for table `player_info`
--

CREATE TABLE IF NOT EXISTS `player_info` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(255) NOT NULL,
  `player_age` varchar(255) NOT NULL,
  `player_jersey` int(11) NOT NULL,
  PRIMARY KEY (`player_id`),
  UNIQUE KEY `player_id_UNIQUE` (`player_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `player_info`
--

INSERT INTO `player_info` (`player_id`, `player_name`, `player_age`, `player_jersey`) VALUES
(1, 'Raju Islam', '22', 15),
(2, 'B', '19', 16),
(3, 'C', '20', 14),
(4, 'A', '19', 15),
(5, 'B', '19', 15),
(6, 'C', '20', 14),
(7, 'Ronjon', '19', 17),
(8, 'Raj', '18', 1),
(9, 'Rojith', '19', 13),
(10, 'Xavi', '30', 6),
(11, 'David Via', '25', 7),
(12, 'Molar', '22', 9),
(13, 'sdjkn', '31', 14),
(14, 'kllk', '32', 14),
(15, 'hfgfggh', '24', 12),
(16, 'mvbvnvbn', '29', 6),
(17, 'hhgjhgjty', '31', 10),
(18, 'Neymar', '21', 1),
(19, 'Leono messi', '24', 10),
(20, 'Pedro Rodríguez', '26', 9),
(21, 'Gerard Piqué', '26', 2),
(22, 'Sergio Busquets', '25', 3),
(23, 'Daniel Alves', '26', 5),
(24, 'Éric Abidal', '26', 7),
(25, 'Deco', '26', 8),
(26, 'Rafael Márquez', '27', 13),
(27, 'Xavi', '28', 5),
(28, 'Andres inesta', '28', 16),
(29, 'Diego Lopez', '22', 1),
(30, 'Pepe', '23', 2),
(31, 'Carvajal', '25', 3),
(32, 'Nacho', '25', 5),
(33, 'Mateos and Casado', '25', 6),
(34, 'Khedira', '26', 6),
(35, 'Ozil', '26', 8),
(36, 'Kaka', '24', 9),
(37, 'Cristiano Ronaldo', '25', 12),
(38, 'Benzema and Morata', '27', 17),
(39, 'Casemiro and Cheryshev', '28', 7),
(40, 'Sergeo Aguro', '31', 1),
(41, 'Edin Desko', '20', 2),
(42, 'David Silva', '26', 3),
(43, 'Samir Nasir', '24', 5),
(44, 'Yaya Tore', '24', 6),
(45, 'Joe Hart', '24', 8),
(46, 'Vincent Company', '21', 9),
(47, 'Stevan', '22', 10),
(48, 'Fermando Luiz', '23', 11),
(49, 'James Milner', '24', 15),
(50, 'JAvi Gracia', '23', 13),
(51, 'a', '26', 12),
(52, 'b', '22', 11),
(53, 'S', '23', 13);

-- --------------------------------------------------------

--
-- Stand-in structure for view `player_list`
--
CREATE TABLE IF NOT EXISTS `player_list` (
`user_mail` varchar(255)
,`team_id` int(11)
,`team_name` varchar(255)
,`player_id` int(11)
,`player_name` varchar(255)
,`player_age` varchar(255)
,`player_jersey` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `team`
--
CREATE TABLE IF NOT EXISTS `team` (
`user_mail` varchar(255)
,`team_id` int(11)
,`team_name` varchar(255)
,`team_country` varchar(255)
,`team_coach` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE IF NOT EXISTS `team_info` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) NOT NULL,
  `team_country` varchar(255) NOT NULL,
  `team_coach` varchar(255) NOT NULL,
  PRIMARY KEY (`team_id`),
  UNIQUE KEY `team_id_UNIQUE` (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `team_info`
--

INSERT INTO `team_info` (`team_id`, `team_name`, `team_country`, `team_coach`) VALUES
(1, 'Pakisthan', 'Pakisthan', 'Robi'),
(2, 'Bangladesh', 'Bangladesh', 'asd'),
(3, 'India', 'India', 'Pasha'),
(4, 'Spain', 'Spain', 'Del box'),
(5, 'Germani', 'Germani', 'loo'),
(6, 'ediot', 'bangladesh', 'Rony'),
(7, 'goal', 'india', 'FM'),
(8, 'Bercelona', 'Spain', 'jak'),
(9, 'Real Madrid', 'Spain', 'Jon'),
(10, 'Manchester city', 'Germany', 'zxc'),
(11, 'Manchester United', 'Germany', 'jason'),
(12, 'Abahoni', 'Bangladesh', 'Ron'),
(13, 'Mohamaden', 'Bangladesh', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_mail` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_mail`),
  UNIQUE KEY `user_mail_UNIQUE` (`user_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_mail`, `user_name`, `user_password`) VALUES
('mac_pasha@ovi.com', 'ipasha', 'e3e93eee355774323118a58fb792ad4e'),
('robin@yahoo.com', 'RK', '202cb962ac59075b964b07152d234b70'),
('zkrony@gmail.com', 'zkrony', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userlive_match`
--
CREATE TABLE IF NOT EXISTS `userlive_match` (
`user_mail` varchar(255)
,`match_id` int(11)
,`team_id` int(11)
,`team_name` varchar(255)
,`starttime` varchar(255)
);
-- --------------------------------------------------------

--
-- Table structure for table `usermatch`
--

CREATE TABLE IF NOT EXISTS `usermatch` (
  `user_mail` varchar(255) NOT NULL,
  `match_id` int(11) NOT NULL,
  PRIMARY KEY (`user_mail`,`match_id`),
  KEY `fk_usermatch_user1_idx` (`user_mail`),
  KEY `fk_usermatch_match_info1_idx` (`match_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermatch`
--

INSERT INTO `usermatch` (`user_mail`, `match_id`) VALUES
('zkrony@gmail.com', 1),
('zkrony@gmail.com', 2),
('mac_pasha@ovi.com', 3),
('robin@yahoo.com', 4),
('zkrony@gmail.com', 5),
('zkrony@gmail.com', 6),
('zkrony@gmail.com', 7),
('zkrony@gmail.com', 8),
('zkrony@gmail.com', 9),
('zkrony@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `userteam`
--

CREATE TABLE IF NOT EXISTS `userteam` (
  `user_mail` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`user_mail`,`team_id`),
  KEY `fk_userteam_user_idx` (`user_mail`),
  KEY `fk_userteam_team_info1_idx` (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userteam`
--

INSERT INTO `userteam` (`user_mail`, `team_id`) VALUES
('zkrony@gmail.com', 1),
('zkrony@gmail.com', 2),
('zkrony@gmail.com', 3),
('mac_pasha@ovi.com', 4),
('mac_pasha@ovi.com', 5),
('robin@yahoo.com', 6),
('robin@yahoo.com', 7),
('zkrony@gmail.com', 8),
('zkrony@gmail.com', 9),
('zkrony@gmail.com', 10),
('zkrony@gmail.com', 11),
('zkrony@gmail.com', 12),
('zkrony@gmail.com', 13);

-- --------------------------------------------------------

--
-- Structure for view `goal_info`
--
DROP TABLE IF EXISTS `goal_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `goal_info` AS select distinct `goal`.`goal_id` AS `goal_id`,`goal`.`goal_time` AS `goal_time`,`goal`.`player_id` AS `player_id`,`match_player`.`player_name` AS `player_name`,`match_player`.`team_id` AS `team_id`,`match_player`.`team_name` AS `team_name`,`match_info`.`match_id` AS `match_id`,`match_info`.`match_venue` AS `match_venue`,`match_info`.`league_name` AS `league_name` from ((`match_info` join `goal`) join `match_player`) where ((`goal`.`match_id` = `match_info`.`match_id`) and (`goal`.`match_id` = `match_player`.`match_id`) and (`goal`.`player_id` = `match_player`.`player_id`));

-- --------------------------------------------------------

--
-- Structure for view `match_all`
--
DROP TABLE IF EXISTS `match_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `match_all` AS select `usermatch`.`user_mail` AS `user_mail`,`usermatch`.`match_id` AS `match_id`,`match_info`.`league_name` AS `league_name`,`match_info`.`match_venue` AS `match_venue`,`match_info`.`match_result` AS `match_result` from (`usermatch` join `match_info`) where (`usermatch`.`match_id` = `match_info`.`match_id`);

-- --------------------------------------------------------

--
-- Structure for view `match_player`
--
DROP TABLE IF EXISTS `match_player`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `match_player` AS select distinct `match`.`match_id` AS `match_id`,`match`.`team_id` AS `team_id`,`player_list`.`team_name` AS `team_name`,`player_list`.`player_id` AS `player_id`,`player_list`.`player_name` AS `player_name`,`player_list`.`player_age` AS `player_age`,`player_list`.`player_jersey` AS `player_jersey` from (`match` join `player_list`) where (`match`.`team_id` = `player_list`.`team_id`);

-- --------------------------------------------------------

--
-- Structure for view `player_list`
--
DROP TABLE IF EXISTS `player_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `player_list` AS select distinct `userteam`.`user_mail` AS `user_mail`,`playerteam`.`team_id` AS `team_id`,`team_info`.`team_name` AS `team_name`,`playerteam`.`player_id` AS `player_id`,`player_info`.`player_name` AS `player_name`,`player_info`.`player_age` AS `player_age`,`player_info`.`player_jersey` AS `player_jersey` from (((`playerteam` join `player_info`) join `team_info`) join `userteam`) where ((`playerteam`.`player_id` = `player_info`.`player_id`) and (`team_info`.`team_id` = `playerteam`.`team_id`) and (`userteam`.`team_id` = `team_info`.`team_id`));

-- --------------------------------------------------------

--
-- Structure for view `team`
--
DROP TABLE IF EXISTS `team`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `team` AS select distinct `userteam`.`user_mail` AS `user_mail`,`userteam`.`team_id` AS `team_id`,`team_info`.`team_name` AS `team_name`,`team_info`.`team_country` AS `team_country`,`team_info`.`team_coach` AS `team_coach` from (`userteam` join `team_info`) where (`userteam`.`team_id` = `team_info`.`team_id`);

-- --------------------------------------------------------

--
-- Structure for view `userlive_match`
--
DROP TABLE IF EXISTS `userlive_match`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userlive_match` AS select `match_all`.`user_mail` AS `user_mail`,`match`.`match_id` AS `match_id`,`match`.`team_id` AS `team_id`,`team`.`team_name` AS `team_name`,`match`.`starttime` AS `starttime` from ((`match_all` join `match`) join `team`) where ((`match_all`.`match_id` = `match`.`match_id`) and (`match`.`team_id` = `team`.`team_id`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `fk_goal_match_info1` FOREIGN KEY (`match_id`) REFERENCES `match_info` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_goal_player_info1` FOREIGN KEY (`player_id`) REFERENCES `player_info` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `match`
--
ALTER TABLE `match`
  ADD CONSTRAINT `fk_match_match_info1` FOREIGN KEY (`match_id`) REFERENCES `match_info` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_match_team_info1` FOREIGN KEY (`team_id`) REFERENCES `team_info` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playerteam`
--
ALTER TABLE `playerteam`
  ADD CONSTRAINT `fk_playerteam_player_info1` FOREIGN KEY (`player_id`) REFERENCES `player_info` (`player_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_playerteam_team_info1` FOREIGN KEY (`team_id`) REFERENCES `team_info` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usermatch`
--
ALTER TABLE `usermatch`
  ADD CONSTRAINT `fk_usermatch_match_info1` FOREIGN KEY (`match_id`) REFERENCES `match_info` (`match_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usermatch_user1` FOREIGN KEY (`user_mail`) REFERENCES `user` (`user_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userteam`
--
ALTER TABLE `userteam`
  ADD CONSTRAINT `fk_userteam_team_info1` FOREIGN KEY (`team_id`) REFERENCES `team_info` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userteam_user` FOREIGN KEY (`user_mail`) REFERENCES `user` (`user_mail`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
