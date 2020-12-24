-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2020 at 05:02 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'JavaScript'),
(2, 'PHP'),
(3, 'Python'),
(4, 'Git'),
(6, 'Random😎🥳🙄');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(5) NOT NULL,
  `comments_post_id` int(3) NOT NULL,
  `comments_user` varchar(200) NOT NULL,
  `comments_status` varchar(200) NOT NULL,
  `comments_date` date NOT NULL,
  `comments_email` varchar(255) NOT NULL,
  `comments_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comments_id`, `comments_post_id`, `comments_user`, `comments_status`, `comments_date`, `comments_email`, `comments_content`) VALUES
(1, 2, 'Asad Anik', 'approved', '2020-11-28', 'aa.software.developer@gmail.com', 'Nice application 😎😎..'),
(3, 1, 'Xerox A', 'unapproved', '2020-11-28', 'xerox.a@gmail.com', 'Weldone, thanks a lot. it works to me😍'),
(9, 13, 'My Wish', 'approved', '2020-12-07', 'my.wish@yahoo.com', 'Yes Right bro.. MacBook is overheating nowadays.'),
(11, 33, 'Ryan Dahl', 'approved', '2020-12-14', 'ryan.node@yahoo.com', 'You have to solve with the solid terminal first of all. Remember about it please it will help you thank you.'),
(12, 32, 'Alpi Akhi', 'approved', '2020-12-16', 'alpi.akhi@gmail.com', 'Hey man awesome bro'),
(14, 33, 'Elon Musk', 'approved', '2020-12-17', 'elon.musk@gmail.com', 'Hey, man well done!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(5) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(200) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_status` varchar(200) NOT NULL,
  `post_tags` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_comment_count` int(5) NOT NULL,
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_status`, `post_tags`, `post_content`, `post_comment_count`, `post_views_count`) VALUES
(1, 4, 'Solve when try to make pull on GitHub.', 'Asad Anik', '2020-12-03', 'idea_overview_5_1.png', 'published', 'git, GitHub, version control', 'Try to make sure you are in current directory on your command line or powershell on windows, for Mac and Linux user you should try on terminal or kommand (Kali-Linux). Then try again, in-shaa-allah it will be work for you.                                                                                     ', 5, 3),
(2, 2, 'Develop ultimate website to business.', 'Xerox A', '2020-12-07', 'blue-onepage-business-html5-template.jpg', 'published', 'PHP, Laravel, Vue.JS, web design, website', '<p>Here is solution to someone who wants to design website. The website is for business as well. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>', 9, 4),
(13, 6, 'About My Macbook Overheating...', 'Asad Anik', '2020-12-06', 'Laptop-Tablet-Smartphone-User.jpg', 'published', 'macbook, apple, random, asadanik, asad anik', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 6, 6),
(14, 6, 'Top technologies', 'Asad Anik', '2020-12-07', '1_KFRPjWmJx3iZey3ase8MFQ.jpeg', 'published', 'top technology, technology, random, asadanik, asad, anik, asad anik, world, map, world map', '<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 4, 4),
(20, 2, 'Develop ultimate website to business.', 'Xerox A', '2020-12-07', 'blue-onepage-business-html5-template.jpg', 'published', 'PHP, Laravel, Vue.JS, web design, website', '<p>Here is solution to someone who wants to design website. The website is for business as well. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>', 8, 0),
(23, 6, 'Top technologies', 'Asad Anik', '2020-12-10', '1_KFRPjWmJx3iZey3ase8MFQ.jpeg', 'published', 'top technology, technology, random, asadanik, asad, anik, asad anik, world, map, world map', '<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 4, 2),
(24, 6, 'About My Macbook Overheating...', 'Asad Anik', '2020-12-10', 'Laptop-Tablet-Smartphone-User.jpg', 'published', 'macbook, apple, random, asadanik, asad anik', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 6, 0),
(25, 4, 'Solve when try to make pull on GitHub.', 'Asad Anik', '2020-12-10', 'idea_overview_5_1.png', 'published', 'git, GitHub, version control', 'Try to make sure you are in current directory on your command line or powershell on windows, for Mac and Linux user you should try on terminal or kommand (Kali-Linux). Then try again, in-shaa-allah it will be work for you.                                                                                     ', 5, 4),
(26, 4, 'Solve when try to make pull on GitHub.', 'Asad Anik', '2020-12-10', 'idea_overview_5_1.png', 'draft', 'git, GitHub, version control', 'Try to make sure you are in current directory on your command line or powershell on windows, for Mac and Linux user you should try on terminal or kommand (Kali-Linux). Then try again, in-shaa-allah it will be work for you.                                                                                     ', 5, 5),
(27, 6, 'About My Macbook Overheating...', 'Asad Anik', '2020-12-10', 'Laptop-Tablet-Smartphone-User.jpg', 'published', 'macbook, apple, random, asadanik, asad anik', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 6, 0),
(28, 6, 'Top technologies', 'Asad Anik', '2020-12-10', '1_KFRPjWmJx3iZey3ase8MFQ.jpeg', 'published', 'top technology, technology, random, asadanik, asad, anik, asad anik, world, map, world map', '<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 4, 3),
(29, 2, 'Develop ultimate website to business.', 'Xerox A', '2020-12-10', 'blue-onepage-business-html5-template.jpg', 'draft', 'PHP, Laravel, Vue.JS, web design, website', '<p>Here is solution to someone who wants to design website. The website is for business as well. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>', 8, 0),
(30, 6, 'Top technologies', 'Asad Anik', '2020-12-10', '1_KFRPjWmJx3iZey3ase8MFQ.jpeg', 'published', 'top technology, technology, random, asadanik, asad, anik, asad anik, world, map, world map', '<h2>Where does it come from?</h2>\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n<p>&nbsp;</p>\r\n<h2>Where can I get some?</h2>\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 4, 3),
(31, 6, 'About My Macbook Overheating...', 'Asad Anik', '2020-12-10', 'Laptop-Tablet-Smartphone-User.jpg', 'published', 'macbook, apple, random, asadanik, asad anik', '<h2>Why do we use it?</h2>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n<p>&nbsp;</p>', 6, 0),
(32, 1, 'Develop ultimate website to business.', 'alpiakhi', '2020-12-18', 'blue-onepage-business-html5-template.jpg', 'published', 'PHP, Laravel, Vue.JS, web design, website', '<p>Here is solution to someone who wants to design website. The website is for business as well. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</p>                            ', 9, 9),
(35, 1, 'Hello All To Surprise Here', 'demo', '2020-12-20', 'mainback10comp.jpg', 'published', 'javascript, js, es, es-5, es-6, es-next, es-7', '', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(200) NOT NULL,
  `users_firstname` varchar(100) NOT NULL,
  `users_lastname` varchar(100) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_image` text NOT NULL,
  `users_age` text NOT NULL,
  `users_gender` varchar(100) NOT NULL,
  `users_date` date NOT NULL,
  `users_type` varchar(100) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2a$07$usesomesillystringforsalt$'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_firstname`, `users_lastname`, `users_email`, `users_password`, `users_image`, `users_age`, `users_gender`, `users_date`, `users_type`, `randSalt`) VALUES
(45, 'asadanik', 'Asad', 'Anik', 'asad.anik@gmail.com', '$2y$12$ISizmsUK9SkR1RkDGPaBjurBkdnsLjPDt.NgjWhrfxvXczXG6MFzW', 'AA.jpeg', '20', 'Male', '2020-12-14', 'admin', '$2a$07$usesomesillystringforsalt$'),
(46, 'aa', 'A', 'A', 'aa170984@gmail.com', '$2y$12$ZPav.1cwHznM5YgMl.GpmeNJdZ0ahrDVJUICtfIX3whglRENeO3EO', '', '17', 'Female', '2020-12-14', 'subscriber', '$2a$07$usesomesillystringforsalt$'),
(47, 'demo', 'Fdemo', 'Ldemo', 'demo.demo@gmail.com', '$2y$12$vai5lDUOC6703wigJNwjSevAqdkIhkpishctvjJNupbi7zSqjOypS', '', '21', 'Male', '2020-12-16', 'admin', '$2a$07$usesomesillystringforsalt$');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(200) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, '6e7c0c6e50270addaaa1020a27821530', 1607933247),
(3, '1afc199a79d53a11500bf3ecf663516d', 1607701566),
(4, '5df3a8e5a700fc3fb04ea913fbba9f12', 1607773621),
(5, '8460ac3e5bf1d88b5cac8a4098a5ec51', 1607866132),
(6, '2156c82b9acf049016dd91583a134ce4', 1608096601),
(7, '93ffd141a28ed6eccbf505b1e4ceb330', 1608297253),
(8, '223ccd568549b260818b535845d7fc57', 1608142766),
(9, '41bacaf6c5e4a3ef579925c6352a67e4', 1608186677),
(10, 'f0e4af3dace30a287aa9efe2bc63467d', 1608221194),
(11, 'c6500adc2e360634dc7edcf850efede4', 1608229920),
(12, '0b5b6ed6234d24c8510fff18df67af4c', 1608271879),
(13, 'a55fe0e736e6251dcde56eedd37deb2b', 1608271895),
(14, '1c8722883c4bb45702b061ae19a64566', 1608312175),
(15, '9a2b7128afc6605e86fcc14ee3d2c60f', 1608460876),
(16, 'a4e5065846a283cf1c4003ab3cdca511', 1608478260),
(17, '3592e9dbaaa05872a5e73e23f33814b0', 1608542836),
(18, 'e870febd536e61ddfbc14c6309209887', 1608661226),
(19, '5201033b23002cb9565943d883961e25', 1608782507);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
