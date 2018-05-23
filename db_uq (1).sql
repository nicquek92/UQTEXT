-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 02:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(26, 'adminjohn', '827ccb0eea8a706c4c34a16891f84e7b'),
(28, 'nono', 'c625ade02c3acde8e4d9de57fca78203');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_min` text,
  `title` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `course_tags` varchar(50) DEFAULT NULL,
  `original_price` decimal(5,2) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `image`, `image_min`, `title`, `isbn`, `author`, `course_tags`, `original_price`, `rating`, `price`, `quantity`, `description`) VALUES
(56, 'http://books.google.com/books/content?id=1PgCCVryjOQC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=1PgCCVryjOQC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'Learning SQL', '9780596555580', 'Alan Beaulieu', 'INFS7202', '40.69', '5.0', '20.00', 3, 'Good book. Missing One page. No Scratch.'),
(57, 'http://books.google.com/books/content?id=ppjUtAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api', 'http://books.google.com/books/content?id=ppjUtAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api', 'Fullstack React', '0991344626', 'Accomazzo Anthony,Murray Nathaniel,Lerner Ari', 'INFS7202', '0.00', '0.0', '10.00', 3, 'Good book. Missing One page. No Scratch.'),
(58, 'http://books.google.com/books/content?id=2S_Y6Zm02BQC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=2S_Y6Zm02BQC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'Programming PHP', '9781449365837', 'Kevin Tatroe,Peter MacIntyre,Rasmus Lerdorf', 'INFS7202', '35.19', '4.5', '20.00', 3, 'Good book. Missing One page. No Scratch.'),
(59, 'http://books.google.com/books/content?id=MZFRAQAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=MZFRAQAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'Code Name: Johnny Walker', '9780062267573', 'Johnny Walker,Jim DeFelice', 'INFS7202', '19.99', '4.0', '10.00', 3, 'Good book. Missing One page. No Scratch.'),
(60, 'http://books.google.com/books/content?id=Q9OP0ClTTvIC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=Q9OP0ClTTvIC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'PHP 5 For Dummies', '0764556622', 'Janet Valade', 'INFS7202', '39.99', '3.0', '20.00', 3, 'Good book. Missing One page. No Scratch.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `student_id` int(8) DEFAULT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `email`, `password`, `status`, `student_id`, `hash`) VALUES
(1, 'GG', 'WP', 'ggwp@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 2134123, ''),
(2, 'john', 'henry', 'johnhenry@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 12345, ''),
(3, 'green', 'day', 'green@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, ''),
(4, 'Brian', 'Griffin', 'brian@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, ''),
(5, 'dj', 'fighter', 'dj@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, '42e77b63637ab381e8be5f8318cc28a2'),
(7, 'pyae phyo', 'kyaw', 'pyaephyokyaw.22121996@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 45234234, 'b73dfe25b4b8714c029b37a6ad3006fa'),
(10, 'pouk', 'kyine', 'pouk.kyine.yangon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 123123, '8e98d81f8217304975ccb23337bb5761'),
(11, 'asdf', 'asdf', 'pouk.kyine.yangon@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 234234, 'f7177163c833dff4b38fc8d2872f1ec6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
