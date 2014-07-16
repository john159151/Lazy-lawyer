
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `YourDatabase`
--

-- --------------------------------------------------------

--
-- 表的结构 `yxy_casecat`
--

CREATE TABLE IF NOT EXISTS `yxy_casecat` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `catname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_cases`
--

CREATE TABLE IF NOT EXISTS `yxy_cases` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `category` smallint(4) NOT NULL,
  `time` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_downloadfile`
--

CREATE TABLE IF NOT EXISTS `yxy_downloadfile` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `filecat` tinyint(2) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_filecat`
--

CREATE TABLE IF NOT EXISTS `yxy_filecat` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `catname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_lawcat`
--

CREATE TABLE IF NOT EXISTS `yxy_lawcat` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `catname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_laws`
--

CREATE TABLE IF NOT EXISTS `yxy_laws` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `lawcat` smallint(4) NOT NULL,
  `time` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `yxy_master`
--

CREATE TABLE IF NOT EXISTS `yxy_master` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
