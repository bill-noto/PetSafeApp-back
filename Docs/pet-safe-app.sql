-- -------------------------------------------------------------
-- TablePlus 4.0.2(374)
--
-- https://tableplus.com/
--
-- Database: pet-safe-app
-- Generation Time: 2021-08-10 15:56:15.4010
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date_requested` varchar(255) NOT NULL,
  `time_requested` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `extra_information` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '-',
  `amount_in` int DEFAULT '0',
  `complete` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`service_id`),
  KEY `fk_logs_services1_idx` (`service_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_logs_services1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `body` varchar(500) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_posts_users1_idx` (`user_id`),
  CONSTRAINT `fk_posts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `role` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

INSERT INTO `logs` (`id`, `service_id`, `user_id`, `date_requested`, `time_requested`, `extra_information`, `amount_in`, `complete`) VALUES
(8, 1, 5, '1628553600', '12:30', '-', 16, 1),
(9, 3, 7, '1628640000', '10:00', '-', 0, 0),
(10, 5, 4, '1628640000', '15:15', '-', 0, 0),
(11, 4, 11, '1628899200', '16:00', '-', 0, 0),
(12, 2, 9, '1628553600', '15:00', '-', 0, 0),
(13, 5, 11, '1628726400', '11:15', '-', 0, 0);

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `create_time`) VALUES
(1, 1, 'Lorem Ipsum', 'Sed ullamcorper, eros eu porttitor tincidunt, quam justo euismod quam, eu tincidunt est diam quis erat. Nulla non ex sit amet justo dignissim pellentesque. Vivamus interdum libero eu lorem lobortis viverra.', '2021-08-07 14:34:19'),
(2, 3, 'Lorem Amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ex tellus, facilisis luctus ipsum in, dignissim lobortis lectus. Sed ullamcorper, eros eu porttitor tincidunt, quam justo euismod quam, eu tincidunt est diam quis erat. Nulla non ex sit amet justo dignissim pellentesque. Vivamus interdum libero eu lorem lobortis viverra. Donec elementum lobortis ex, in sollicitudin sapien tincidunt bibendum. Etiam pharetra mollis ante eu vestibulum. Nulla et accumsan magna. ', '2021-08-07 14:34:19'),
(3, 2, 'Lorem Dolet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ex tellus, facilisis luctus ipsum in, dignissim lobortis lectus. Sed ullamcorper, eros eu porttitor tincidunt, quam justo euismod quam, eu tincidunt est diam quis erat. Nulla non ex sit amet justo dignissim pellentesque. Vivamus interdum libero eu lorem lobortis viverra. Donec elementum lobortis ex, in sollicitudin sapien tincidunt bibendum. ', '2021-08-07 14:34:19'),
(4, 3, 'Lorem', 'Mauris sed dui ut lorem ultricies sollicitudin. In ultrices feugiat nisl, vel tincidunt nisl egestas vitae. Vivamus pellentesque eros sed massa dignissim, in tristique mi lacinia. Nam elementum ultricies arcu. Fusce tincidunt felis at orci condimentum, in volutpat nunc congue. Praesent auctor ligula et dapibus dictum.', '2021-08-07 15:47:39'),
(5, 1, 'Lorem Ipsum Amet', 'Donec elementum lobortis ex, in sollicitudin sapien tincidunt bibendum. Etiam pharetra mollis ante eu vestibulum. Nulla et accumsan magna. ', '2021-08-10 15:36:43'),
(6, 2, 'Test', 'Donec elementum lobortis ex, in sollicitudin sapien tincidunt bibendum. Etiam pharetra mollis ante eu vestibulum. ', '2021-08-10 15:36:43');

INSERT INTO `services` (`id`, `service`) VALUES
(1, 'Pet Walking'),
(2, 'Pet Grooming Basic'),
(3, 'Pet Grooming Medium'),
(4, 'Pet Grooming Full'),
(5, 'Pet Boarding');

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `create_time`, `email`, `role`) VALUES
(1, 'John', 'Doe', 'johndoe123', 'c01ac32fe8bb0fe45c481cd1b07edc78', '2021-08-04 15:17:33', 'johndoe@petsafe.com', 'admin'),
(2, 'Jane', 'Doe', 'janedoe123', 'eac02d354f6e3e688101a5ad926da1a8', '2021-08-04 15:17:33', 'janedoe@petsafe.com', 'admin'),
(3, 'Mike', 'Doe', 'mikedoe123', '8fea2acf4f711c427887e9cb6393712a', '2021-08-04 15:17:33', 'mikedoe@petsafe.com', 'admin'),
(4, 'Uriah', 'Berry', 'hybitas', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2021-08-07 23:11:40', 'jabuge@mailinator.com', 'customer'),
(5, 'Coby', 'White', 'cobytheman', '62519e7c104d639d34285dc161f05e7a', '2021-08-08 22:25:09', 'coby@white.com', 'customer'),
(6, 'Carla', 'Singleton', 'ruponypory', '32250170a0dca92d53ec9624f336ca24', '2021-08-08 22:32:30', 'dukyl@mailinator.com', 'customer'),
(7, 'Naida', 'Greer', 'lifocefys', '73a054cc528f91ca1bbdda3589b6a22d', '2021-08-08 22:36:51', 'bobobil@mailinator.com', 'customer'),
(8, 'Rosalyn', 'Quinn', 'povedo', 'ba4bff55a79d1b469673ffbae5c3410b', '2021-08-10 15:03:37', 'wopimo@mailinator.com', 'customer'),
(9, 'Larissa', 'Sweeney', 'lapebutos', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2021-08-10 15:07:27', 'niqatun@mailinator.com', 'customer'),
(10, 'Dara', 'Hurst', 'rytejun', 'a152e841783914146e4bcd4f39100686', '2021-08-10 15:07:48', 'jazota@mailinator.com', 'customer'),
(11, 'Judah', 'Roy', 'pazip', 'c5a74599ded5e307687ef8c0ef86ff01', '2021-08-10 15:08:39', 'dybosede@mailinator.com', 'customer');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;