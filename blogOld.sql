SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `login`, `pass`) VALUES
(1, 'jean', '39a652b7cd9be307b372a1f51cfcba580e00a1bd');

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `articles` (`id`, `title`, `content`, `date`) VALUES
(1, 'Episode 1', '[b]Restabat[/b] ut Caesar post haec [i]properaret[/i] accitus et [url=jonathan-richard.fr]abstergendae[/url] causa suspicionis sororem suam, eius uxorem, [b]Constantius[/b] ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet [b][i]ambigeret[/i][/b] metuens saepe cruentum, spe tamen quod eum lenire poterit ut [b]germanum[/b] profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium [i]repentina[/i]. cuius post obitum maritus [b]contemplans[/b] cecidisse fiduciam qua se fultum existimabat, anxia [i]cogitatione[/i], quid moliretur haerebat.', '2017-04-01 13:12:16'),
(2, 'Episode 2', '[b]Restabat[/b] ut Caesar post haec [i]properaret[/i] accitus et [url=jonathan-richard.fr]abstergendae[/url] causa suspicionis sororem suam, eius uxorem, [b]Constantius[/b] ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet [b][i]ambigeret[/i][/b] metuens saepe cruentum, spe tamen quod eum lenire poterit ut [b]germanum[/b] profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium [i]repentina[/i]. cuius post obitum maritus [b]contemplans[/b] cecidisse fiduciam qua se fultum existimabat, anxia [i]cogitatione[/i], quid moliretur haerebat.', '2017-05-01 14:15:56'),
(3, 'Episode 3', '[b]Restabat[/b] ut Caesar post haec [i]properaret[/i] accitus et [url=jonathan-richard.fr]abstergendae[/url] causa suspicionis sororem suam, eius uxorem, [b]Constantius[/b] ad se tandem desideratam venire multis fictisque blanditiis hortabatur. quae licet [b][i]ambigeret[/i][/b] metuens saepe cruentum, spe tamen quod eum lenire poterit ut [b]germanum[/b] profecta, cum Bithyniam introisset, in statione quae Caenos Gallicanos appellatur, absumpta est vi febrium [i]repentina[/i]. cuius post obitum maritus [b]contemplans[/b] cecidisse fiduciam qua se fultum existimabat, anxia [i]cogitatione[/i], quid moliretur haerebat.', '2017-05-01 14:17:59');

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `articleId` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `alert` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `articleId`, `author`, `comment`, `alert`, `date`) VALUES
(1, 1, 'Jaky', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 5, '2017-05-31 15:53:23'),
(2, 3, 'Lady', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-01 11:51:12'),
(3, 3, 'Elsa', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-03 09:03:31'),
(4, 1, 'Josianne', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 2, '2017-06-05 16:16:54'),
(5, 1, 'Michel', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:43:31'),
(6, 1, 'Phillippe', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:46:47'),
(7, 1, 'Manu', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:47:41'),
(8, 1, 'Cerise', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:47:57'),
(9, 1, 'Simple', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:48:21'),
(10, 1, 'Will', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:48:33'),
(11, 1, 'Joe', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 0, '2017-06-09 12:48:47'),
(12, 1, 'Bernard', 'Fiduciam qua se fultum existimabat, anxia cogitatione, quid moliretur haerebat.', 1, '2017-06-09 12:49:07');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleId` (`articleId`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
