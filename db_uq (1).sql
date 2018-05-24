-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 04:36 PM
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
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(4, 'http://books.google.com/books/content?id=21CctAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api', 'http://books.google.com/books/content?id=21CctAEACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api', 'React.js for Busies', '', 'Shawna Evans', 'INFS7202', '0.00', '0.0', '20.00', 3, 'PHP is the main language n infs7202. This textbook can be used as reference in the class.'),
(5, 'http://books.google.com/books/content?id=O_KRDgAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=O_KRDgAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'Deadpool', '9781302497224', 'Alan Beaulieu', 'INFS7202', '3.45', '0.0', '20.00', 3, 'PHP is the main language n infs7202. This textbook can be used as reference in the class.'),
(6, 'http://books.google.com/books/content?id=wAcyDAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'http://books.google.com/books/content?id=wAcyDAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api', 'Spider-Man/Deadpool Vol. 1', '9781302490034', 'Joe Kelly', 'INFS7202', '20.77', '5.0', '20.00', 3, 'PHP is the main language n infs7202. This textbook can be used as reference in the class.');

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
(1, 'GGWP', 'PPWG', 'ggwp@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 12412412, 'ede7e2b6d13a41ddf9f4bdef84fdc737');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
