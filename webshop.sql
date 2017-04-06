-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 06. 04 2017 kl. 14:33:28
-- Serverversion: 5.7.9
-- PHP-version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_number` bigint(20) NOT NULL,
  `prod_added` int(11) NOT NULL,
  `prod_category` varchar(100) NOT NULL,
  `prod_type` varchar(100) NOT NULL,
  `prod_artist` varchar(200) NOT NULL,
  `prod_title` varchar(250) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_price` varchar(50) NOT NULL,
  `prod_photo` varchar(250) NOT NULL,
  PRIMARY KEY (`prod_number`),
  UNIQUE KEY `prod_photo` (`prod_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`prod_number`, `prod_added`, `prod_category`, `prod_type`, `prod_artist`, `prod_title`, `prod_description`, `prod_price`, `prod_photo`) VALUES
(66312, 1491210358, 'Pop', 'Vinyl', 'Pet Shop Boys', 'Introspective', 'Introspective is the third studio album by English synthpop duo Pet Shop Boys. It was first released on 11 October 1988 and is the Pet Shop Boys'' second-best-selling album, selling over 4.5 million copies worldwide', '200', 'psb_intro.jpg'),
(16000, 1491210915, 'Pop', 'Vinyl', 'ABBA', 'Voulez-Vous', 'Voulez-Vous (Do You Want in French) is the sixth studio album by the Swedish group ABBA, released in 1979. It features a number of hits such as "Chiquitita", "Does Your Mother Know" and "I Have a Dream" and showed the group embrace disco music, which was at its peak at the time. The album peaked at No.1 in a number of countries and was one of the top five-selling albums in the UK for that year.', '150', 'abba.jpg'),
(6755002, 1491211851, 'Pop', 'Vinyl', 'Depeche Mode', '101', '101 is a live album and documentary by the English electronic band Depeche Mode released on 13 March 1989 chronicling the final leg of the band''s 1987/1988 Music for the Masses Tour and the final show at the Rose Bowl in Pasadena which was held on 18 June, 1988', '250', 'R-1397102-1468275615-6164.jpeg.jpg'),
(458285, 1491212110, 'Pop', 'Vinyl', 'Talking Heads', 'Remain In Light', 'Remain in Light is the fourth studio album by American new wave band Talking Heads, released on October 8, 1980, on Sire Records. It was recorded at Compass Point Studios in the Bahamas and Sigma Sound Studios in Philadelphia between July and August 1980 and was produced by the quartet''s long-time collaborator Brian Eno.', '250', 'remain.jpg'),
(2812, 1491212577, 'Pop', 'Vinyl', 'Spice Girls', 'Spice', 'Spice is the debut studio album by British girl group the Spice Girls. It was first released on 19 September 1996 by Virgin Records. The album was recorded at Olympic Studios in Barnes, London between 1995 and 1996, by producers Matt Rowe and Richard Stannard, and the production duo Absolute. The album is a pop record with an inclusion of styles such as dance, R&B and hip hop. It is considered to be the record that brought teen pop back, opening the doors for a wave of teen pop artists.[1] Conceptually, the album centered on the idea of Girl Power, and during that time was compared to Beatlemania', '100', 'spice.jpg'),
(147, 1491218264, 'Pop', 'CD', 'Thomas Helmig Brothers', '2', 'Second album from danish Thomas Helmig and band. Released in 1986.', '59', 'th_2.jpg'),
(88985336822, 1491219523, 'Pop', 'CD', 'Beyoncé', 'Beyoncé', 'Beyoncé is the fifth studio album by American singer Beyoncé, released on December 13, 2013, by Parkwood Entertainment and Columbia Records. Developed as a simultaneous audio-visual medium, Beyoncé''s songs are accompanied by non-linear short films that illustrate the musical concepts conceived during production. Its dark, intimate subject material includes feminist themes of sex, monogamous love and relationship issues, inspired by Beyoncé''s desire to assert her full creative freedom', '99', 'beo.jpg'),
(602517350465, 1491219721, 'Pop', 'CD', 'Rihanna', 'Good Girl Gone Bad', 'Good Girl Gone Bad is the third studio album by Barbadian singer Rihanna. It was released on May 31, 2007, by Def Jam Recordings and SRP Records. Rihanna worked with various producers on the album, including Christopher "Tricky" Stewart, Terius "Dream" Nash, Neo da Matrix, Timbaland, Carl Sturken, Evan Rogers and StarGate. Inspired by Brandy Norwood''s fourth studio album Afrodisiac (2004), Good Girl Gone Bad is a pop, dance-pop and R&B album with 1980s music influences. Described as a turning point in Rihanna''s career, it represents a departure from the Caribbean sound of her previous releases, Music of the Sun (2005) and A Girl like Me (2006). Apart from the sound, she also endorsed a new image for the release going from an innocent girl to an edgier and more sexual look.', '139', 'rih.jpg'),
(88765493481, 1491243165, 'Hip Hop', 'Vinyl', 'Cypress Hill', 'Black Sunday', 'Black Sunday is the second studio album by American hip hop group Cypress Hill. It was released on July 20, 1993. It debuted at number one on the Billboard 200 selling 261,000 copies in its first week,[2] recording the highest Soundscan for a rap group at the time. The album went Triple platinum in the U.S. with 3.4 million units sold', '199', 'cypress.jpg'),
(50605, 1491244191, 'Hip Hop', 'CD', 'Snoop Doggy Dogg', 'Doggystyle', 'Doggystyle is the debut studio album by American West Coast hip hop artist Snoop Doggy Dogg, released by Death Row Records and Interscope Records on November 23, 1993. The album was recorded soon following the release of Dr. Dre''s landmark debut album The Chronic (1992), to which Snoop Doggy Dogg contributed significantly. The style he developed for Dre''s album was continued on Doggystyle.[1] Critics have praised Snoop Doggy Dogg for the lyrical "realism" he delivers on the album and for his distinctive vocal flow.', '119', 'doggy.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(150) NOT NULL,
  `user_street` varchar(150) NOT NULL,
  `user_houseno` varchar(10) NOT NULL,
  `user_street2` varchar(150) DEFAULT NULL,
  `user_postno` int(11) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_mail` varchar(150) NOT NULL,
  `user_pass` varchar(70) NOT NULL,
  `user_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_street`, `user_houseno`, `user_street2`, `user_postno`, `user_city`, `user_phone`, `user_mail`, `user_pass`, `user_status`) VALUES
(6, 'Admin One', 'New Street', '123', '2B', 8888, 'City', 87654321, 'admin@test.com', '$2y$10$YmNkOThlNjlkZTliODcxOOzOjAqQZ3EntvhzMls14pzpPXoltAnge', 'admin'),
(3, 'Customer One', 'oagerho', '567', '', 4654, 'gkågk', 21354678, 'customer@test.com', '$2y$10$MzJmNzI2OGVjZjM5ZGU3Mu20NpQyObGijUtjFZYrbVjghscXXbjCi', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
