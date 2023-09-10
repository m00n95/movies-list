-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 05:10 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_list`
--
CREATE DATABASE IF NOT EXISTS `movies_list` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `movies_list`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text,
  `rating` int DEFAULT NULL,
  `created_time` date DEFAULT NULL,
  `users_id` int NOT NULL,
  `movies_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users1_idx` (`users_id`),
  KEY `fk_comments_movies1_idx` (`movies_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `rating`, `created_time`, `users_id`, `movies_id`) VALUES
(1, 'Super film !', 10, '2023-09-04', 1, 1),
(2, 'Super ! Hâte de voir la suite !', 9, '2023-09-04', 1, 2),
(3, 'Film incroyable!!', 10, '2023-09-04', 1, 4),
(8, 'C\'était vraiment cool !', 9, '2023-09-06', 1, 3),
(9, 'J\'ai adoré!!!', 10, '2023-09-06', 1, 5),
(27, 'Super cool :)', 7, '2023-09-07', 1, 64);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(1, 'Animation'),
(2, 'Action'),
(3, 'Fantastique'),
(4, 'Science-Fiction'),
(5, 'Aventure');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `release_date`, `picture`, `summary`) VALUES
(1, 'Dragon', '2010-03-21', 'dragon.jpg', ' L\'histoire d\'Harold, jeune Viking peu à son aise dans sa tribu où combattre les dragons est le sport national. Sa vie va être bouleversée par sa rencontre avec un dragon qui va peu à peu amener Harold et les siens à voir le monde d\'un point de vue totalement différent.'),
(2, 'Dune', '2021-09-03', 'dune.jpg', 'L\'histoire de Paul Atreides, jeune homme aussi doué que brillant, voué à connaître un destin hors du commun qui le dépasse totalement. Car s\'il veut préserver l\'avenir de sa famille et de son peuple, il devra se rendre sur la planète la plus dangereuse de l\'univers – la seule à même de fournir la ressource la plus précieuse au monde, capable de décupler la puissance de l\'humanité. Tandis que des forces maléfiques se disputent le contrôle de cette planète, seuls ceux qui parviennent à dominer leur peur pourront survivre…'),
(3, 'Les Goonies', '1985-12-04', 'goonies.jpg', 'Astoria est une modeste et paisible cité portuaire de la Côte Ouest. Trop paisible au gré de ses jeunes habitants... \'Il ne se passe jamais rien ici\', soupira un jour l\'un d\'eux, mélancolique. Mickey Walsh, treize ans, venait de prononcer une de ces phrases fatidiques qui annoncent parfois les aventures les plus étranges, les plus folles et les plus amusantes.'),
(4, 'Harry Potter à l\'école des sorciers', '2018-09-12', 'harry-potter.jpg', 'Orphelin, Harry Potter a été recueilli à contrecœur par son oncle Vernon et sa tante Pétunia, aussi cruels que mesquins, qui n\'hésitent pas à le faire dormir dans le placard sous l\'escalier. Constamment maltraité, il doit en outre supporter les jérémiades de son cousin Dudley, garçon cupide et archi-gâté par ses parents. De leur côté, Vernon et Pétunia détestent leur neveu dont la présence leur rappelle sans cesse le tempérament \'imprévisible\' des parents du garçon et leur mort mystérieuse.\r\nÀ l\'approche de ses 11 ans, Harry ne s\'attend à rien de particulier – ni carte, ni cadeau, ni même un goûter d\'anniversaire. Et pourtant, c\'est à cette occasion qu\'il découvre qu\'il est le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. Quand on lui propose d\'intégrer Poudlard, la prestigieuse école de sorcellerie, il trouve enfin le foyer et la famille qui lui ont toujours manqué… et s\'engage dans l\'aventure de sa vie.'),
(5, 'Le voyage de Chihiro', '2002-04-10', 'chihiro.jpg', 'Chihiro, une fillette de 10 ans, est en route vers sa nouvelle demeure en compagnie de ses parents. Au cours du voyage, la famille fait une halte dans un parc à thème qui leur paraît délabré. Lors de la visite, les parents s’arrêtent dans un des bâtiments pour déguster quelques mets très appétissants, apparus comme par enchantement. Hélas cette nourriture les transforme en porcs. Prise de panique, Chihiro s’enfuit et se retrouve seule dans cet univers fantasmagorique ; elle rencontre alors l’énigmatique Haku, son seul allié dans cette terrible épreuve...'),
(6, 'Inception', '2010-07-21', 'inception.jpg', 'Dom Cobb est un voleur expérimenté – le meilleur qui soit dans l’art périlleux de l’extraction : sa spécialité consiste à s’approprier les secrets les plus précieux d’un individu, enfouis au plus profond de son subconscient, pendant qu’il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l’univers trouble de l’espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier qui a perdu tout ce qui lui est cher. Mais une ultime mission pourrait lui permettre de retrouver sa vie d’avant – à condition qu’il puisse accomplir l’impossible : l’inception. Au lieu de subtiliser un rêve, Cobb et son équipe doivent faire l’inverse : implanter une idée dans l’esprit d’un individu. S’ils y parviennent, il pourrait s’agir du crime parfait. Et pourtant, aussi méthodiques et doués soient-ils, rien n’aurait pu préparer Cobb et ses partenaires à un ennemi redoutable qui semble avoir systématiquement un coup d’avance sur eux. Un ennemi dont seul Cobb aurait pu soupçonner l’existence.'),
(7, 'Mission Impossible : Protocole Fantôme', '2011-12-14', 'mission-impossible.jpg', 'Impliquée dans l\'attentat terroriste du Kremlin, l\'agence Mission Impossible (IMF) est totalement discréditée. Tandis que le président lance l\'opération \'Protocole Fantôme\', Ethan Hunt, privé de ressources et de renfort, doit trouver le moyen de blanchir l\'agence et de déjouer toute nouvelle tentative d\'attentat. Mais pour compliquer encore la situation, l\'agent doit s\'engager dans cette mission avec une équipe de fugitifs d\'IMF dont il n\'a pas bien cerné les motivations…'),
(8, 'Fast and Furious 1', '2001-09-26', 'fast-furious.jpg', 'La nuit tombée, Dominic Toretto règne sur les rues de Los Angeles à la tête d\'une équipe de fidèles qui partagent son goût du risque, sa passion de la vitesse et son culte des voitures de sport lancées à plus de 250 km/h dans des rodéos urbains d\'une rare violence. Ses journées sont consacrées à bricoler et à relooker des modèles haut de gamme, à les rendre toujours plus performants et plus voyants, à organiser des joutes illicites où de nombreux candidats s\'affrontent sans merci sous le regard énamouré de leurs groupies. A la suite de plusieurs attaques de camions, la police de L.A. décide d\'enquêter sur le milieu des street racers. Brian, un jeune policier, est chargé d\'inflitrer la bande de Toretto, qui figure, avec celle de son rival Johnny Tran, au premier rang des suspects.'),
(61, 'Star Wars : Episode I - La Menace fantôme', '1999-10-13', 'star-wars.jpg', 'Avant de devenir un célèbre chevalier Jedi, et bien avant de se révéler l’âme la plus noire de la galaxie, Anakin Skywalker est un jeune esclave sur la planète Tatooine. La Force est déjà puissante en lui et il est un remarquable pilote de Podracer. Le maître Jedi Qui-Gon Jinn le découvre et entrevoit alors son immense potentiel.\r\nPendant ce temps, l’armée de droïdes de l’insatiable Fédération du Commerce a envahi Naboo, une planète pacifique, dans le cadre d’un plan secret des Sith visant à accroître leur pouvoir. Pour défendre la reine de Naboo, Amidala, les chevaliers Jedi vont devoir affronter le redoutable Seigneur Sith, Dark Maul. '),
(62, 'Parasite', '2019-06-05', 'parasite.jpg', 'Toute la famille de Ki-taek est au chômage, et s’intéresse fortement au train de vie de la richissime famille Park. Un jour, leur fils réussit à se faire recommander pour donner des cours particuliers d’anglais chez les Park. C’est le début d’un engrenage incontrôlable, dont personne ne sortira véritablement indemne...'),
(63, 'Les Gardiens de la Galaxie 3', '2023-05-03', 'gardiens-galaxie.jpg', 'Notre bande de marginaux favorite a quelque peu changé. Peter Quill, qui pleure toujours la perte de Gamora, doit rassembler son équipe pour défendre l’univers et protéger l’un des siens. En cas d’échec, cette mission pourrait bien marquer la fin des Gardiens tels que nous les connaissons.'),
(64, 'Ready Player One', '2018-03-28', 'ready-player-one.jpg', '2045. Le monde est au bord du chaos. Les êtres humains se réfugient dans l\'OASIS, univers virtuel mis au point par le brillant et excentrique James Halliday. Avant de disparaître, celui-ci a décidé de léguer son immense fortune à quiconque découvrira l\'œuf de Pâques numérique qu\'il a pris soin de dissimuler dans l\'OASIS. L\'appât du gain provoque une compétition planétaire. Mais lorsqu\'un jeune garçon, Wade Watts, qui n\'a pourtant pas le profil d\'un héros, décide de participer à la chasse au trésor, il est plongé dans un monde parallèle à la fois mystérieux et inquiétant… '),
(65, 'Le Seigneur des anneaux : la communauté de l\'anneau', '2001-12-19', 'seigneur-anneaux.jpg', 'Dans ce chapitre de la trilogie, le jeune et timide Hobbit, Frodon Sacquet, hérite d\'un anneau. Bien loin d\'être une simple babiole, il s\'agit de l\'Anneau Unique, un instrument de pouvoir absolu qui permettrait à Sauron, le Seigneur des ténèbres, de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. À moins que Frodon, aidé d\'une Compagnie constituée de Hobbits, d\'Hommes, d\'un Magicien, d\'un Nain, et d\'un Elfe, ne parvienne à emporter l\'Anneau à travers la Terre du Milieu jusqu\'à la Crevasse du Destin, lieu où il a été forgé, et à le détruire pour toujours. Un tel périple signifie s\'aventurer très loin en Mordor, les terres du Seigneur des ténèbres, où est rassemblée son armée d\'Orques maléfiques... La Compagnie doit non seulement combattre les forces extérieures du mal mais aussi les dissensions internes et l\'influence corruptrice qu\'exerce l\'Anneau lui-même.\r\nL\'issue de l\'histoire à venir est intimement liée au sort de la Compagnie.'),
(66, 'Le Labyrinthe', '2014-10-15', 'labyrinthe.jpg', 'Quand Thomas reprend connaissance, il est pris au piège avec un groupe d’autres garçons dans un labyrinthe géant dont le plan est modifié chaque nuit. Il n’a plus aucun souvenir du monde extérieur, à part d’étranges rêves à propos d’une mystérieuse organisation appelée W.C.K.D. En reliant certains fragments de son passé, avec des indices qu’il découvre au sein du labyrinthe, Thomas espère trouver un moyen de s’en échapper.');

-- --------------------------------------------------------

--
-- Table structure for table `movies_has_genres`
--

DROP TABLE IF EXISTS `movies_has_genres`;
CREATE TABLE IF NOT EXISTS `movies_has_genres` (
  `movies_id` int NOT NULL,
  `genres_id` int NOT NULL,
  PRIMARY KEY (`movies_id`,`genres_id`),
  KEY `fk_movies_has_genres_genres1_idx` (`genres_id`),
  KEY `fk_movies_has_genres_movies1_idx` (`movies_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `movies_has_genres`
--

INSERT INTO `movies_has_genres` (`movies_id`, `genres_id`) VALUES
(1, 1),
(5, 1),
(2, 2),
(6, 2),
(7, 2),
(8, 2),
(61, 2),
(63, 2),
(64, 2),
(66, 2),
(4, 3),
(5, 3),
(65, 3),
(2, 4),
(6, 4),
(61, 4),
(63, 4),
(64, 4),
(66, 4),
(1, 5),
(3, 5),
(4, 5),
(8, 5),
(65, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `auth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `email`, `password`, `auth_date`) VALUES
(1, 'elena', 'moon', 20, 'elena@gmail.com', 'movies95', '2023-08-12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_movies1` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `movies_has_genres`
--
ALTER TABLE `movies_has_genres`
  ADD CONSTRAINT `fk_movies_has_genres_genres1` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `fk_movies_has_genres_movies1` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
