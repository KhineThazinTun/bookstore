-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 11:26 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `created_date`, `modified_date`) VALUES
(1, 'Rupik Kaur', '2020-07-26 00:00:00', '2020-07-26 01:00:00'),
(2, 'Keir Thomas', '2020-07-26 00:00:00', '2020-07-26 02:00:00'),
(3, 'Oscar Wilde', '2020-07-27 00:02:12', '2020-07-27 20:02:45'),
(4, ' William Shakespeare', '2020-07-27 20:01:53', '2020-07-27 20:01:53'),
(5, 'Emily Dickinson', '2020-07-27 20:02:05', '2020-07-27 20:02:05'),
(6, 'Arthur Conan Doyle', '2020-07-27 20:02:18', '2020-07-27 20:02:18'),
(7, 'Leo Tolstoy', '2020-07-27 20:02:27', '2020-07-27 20:02:27'),
(8, 'William Blake', '2020-07-27 20:09:30', '2020-07-27 20:09:30'),
(9, 'Henry Wadsworth Longfellow', '2020-07-27 20:09:59', '2020-07-27 20:09:59'),
(10, 'Jacob De Haas', '2020-07-27 20:37:08', '2020-07-27 20:37:08'),
(11, 'O. Henry', '2020-07-27 20:37:21', '2020-07-27 20:37:21'),
(12, 'Jo Jo Moyes', '2020-07-28 17:21:56', '2020-07-28 17:21:56'),
(13, 'Maurice J. Bach', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `price`, `category_id`, `author_id`, `summary`, `cover`, `in_stock`, `created_date`, `modified_date`) VALUES
(1, 'Milks and Honey', 2, 3, 1, 'About Love and Lost', 'download.png', 10, '2020-07-26 23:04:05', '2020-07-26 23:04:05'),
(2, 'Ubuntu Pocket Guide and Reference', 2, 1, 2, 'A concise companion for day to day Ubuntu use.Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur deserunt est sit eveniet provident repellat numquam in dicta unde, nesciunt corporis eius recusandae maiores placeat minima dolorem! Doloribus, voluptatibus? Ab!				', 'ubuntu.jpg', 10, '2020-07-26 23:07:57', '2020-10-20 15:48:09'),
(4, 'The Tempest', 1, 2, 4, 'The Complete Works of William Shakespeare, Vol. I, Oxford edition (1910)', 'The Tempest.jpg', 10, '2020-07-27 21:06:01', '2020-07-27 21:06:01'),
(5, 'A Study in Scarlet', 1, 2, 4, 'A Study in Scarlet is a detective mystery novel written by Scottish author Sir Arthur Conan Doyle, which was first published in 1887.', 'A Study In Scarlet.png', 10, '2020-07-27 21:11:56', '2020-07-27 21:13:47'),
(6, 'War and Peace', 12, 2, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur deserunt est sit eveniet provident repellat numquam in dicta unde, nesciunt corporis eius recusandae maiores placeat minima dolorem! Doloribus, voluptatibus? Ab!', 'war and peace.jpg', 10, '2020-07-27 21:18:25', '2020-10-20 15:47:43'),
(7, 'Oliver Twist', 2, 2, 3, 'The story centres on orphan Oliver Twist, born in a workhouse and sold into apprenticeship with an undertaker.		', 'Oliver Twist.jpg', 10, '2020-07-27 21:25:58', '2020-07-27 21:27:21'),
(8, 'Voices of the night,and other poems', 987, 3, 9, 'This first book of Longfellow poetry is undated. The 295 pages are dense with poetry, from the great Longfellow in his earlier years.', 'Voices of the night,and other poems.jpg', 10, '2020-07-27 21:32:59', '2020-07-27 21:32:59'),
(9, 'Me Before You', 14, 2, 12, 'The story of the quirky Louisa Clark, who unfortunately lost her job and is seeking a new one. This is how she crosses paths with Will Traynor, who devastatingly became paralysed after a motorcycle accident.', '312.jpg', 10, '2020-07-28 17:24:08', '2020-07-28 17:24:08'),
(10, 'After You', 13, 2, 12, 'After You is the story of how Louisa Clark handles the death of Will Traynor, a 35-year-old quadriplegic who chose suicide as a way out of his suffering.', 'images.jpg', 10, '2020-07-28 17:31:43', '2020-07-28 17:31:43'),
(11, 'Still Me', 12, 2, 12, 'Louisa Clark arrives in New York ready to start a new life, confident that she can embrace this new adventure and keep her relationship with Ambulance Sam alive across several thousand miles. She steps into the world of the superrich, working for Leonard Gopnik and his much younger second wife, Agnes.', 'download.jpg', 10, '2020-07-28 17:39:22', '2020-07-28 17:39:22'),
(12, 'The Design of the UNIX Operating System', 49, 1, 13, 'This book describes the internal algorithms and the structures that form the basis of the UNIXÂ® operating system and their relationship to the programmer interface. The system description is based on UNIX System V Release 2 supported by AT&T, with some features from Release 3. 				', 'unix.jpg', 10, '2020-07-29 03:00:00', '2020-08-10 12:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
(1, 'Technology', 'NO cmt', '2020-07-26 22:57:35', '2020-07-27 00:06:38'),
(2, 'Novel', 'No comment', '2020-07-26 22:58:16', '2020-07-26 22:58:16'),
(3, 'Poem', 'No commnet', '2020-07-26 22:58:26', '2020-07-27 00:11:14'),
(4, 'Language', 'No comment', '2020-07-26 22:58:42', '2020-07-26 22:58:42'),
(5, 'Thriller', 'No comment', '2020-07-26 22:59:10', '2020-07-26 22:59:10'),
(6, 'Fantasty', 'no comment', '2020-07-28 17:41:47', '2020-07-28 17:41:47'),
(7, 'Detective', 'no comment', '2020-08-01 16:28:45', '2020-08-01 16:28:45'),
(8, 'Horror', 'no cmt', '2020-08-01 16:29:06', '2020-08-01 16:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `status`, `created_date`, `modified_date`) VALUES
(1, 'Khine Thazin Tun', 'heratmilektzt@gmail.com', '0934238492', 'Lorem jso slf sl ls smcn lsdioer sjflnc lskdf (ulds)', 1, '2020-07-31 21:38:10', '2020-08-01 02:44:53'),
(2, 'Lora Austin', 'mail@mail.com', '95924829523', 'Lorem sdk sljsfkd cmc sifoeoir dlsfjoie dkslfj', 0, '2020-08-01 02:08:26', '2020-08-01 02:08:26'),
(3, 'Customer 1', 'rt453432@gmail.com', '12345667', 'Address sample', 0, '2020-08-01 02:12:14', '2020-08-01 02:12:14'),
(4, 'Waston Fort ', 'FortWM@mail.com', '0949328479', 'Lorewm skd dskfoer kdsfjs  djfsir sdfjlsd mcflskdf dkfs;lafjsao sdkfoerp jslmcx,nvfjskdfeo', 0, '2020-08-01 02:18:54', '2020-08-01 02:18:54'),
(5, 'admin', 'khine@gmail.com', '0934238492', 'dada', 0, '2020-08-10 16:30:18', '2020-08-10 16:30:18'),
(9, 'Customer 2', 'khine@gmail.com', '092392342', 'edas', 0, '2020-08-10 16:59:37', '2020-08-10 16:59:37'),
(10, 'Customer 3', 'mail@mail.com', '09488923342', 'sfaerew', 0, '2020-08-10 20:38:55', '2020-08-10 20:38:55'),
(11, 'Customer 3', 'mail@mail.com', '09488923342', 'sfaerew', 0, '2020-08-10 20:45:27', '2020-08-10 20:45:27'),
(12, '', '', '', '', 0, '2020-08-10 20:46:00', '2020-08-10 20:46:00'),
(13, '', '', '', '', 0, '2020-08-10 20:46:53', '2020-08-10 20:46:53'),
(14, '', '', '', '', 0, '2020-08-10 20:48:03', '2020-08-10 20:48:03'),
(15, '', '', '', '', 0, '2020-08-10 20:48:12', '2020-08-10 20:48:12'),
(16, '', '', '', '', 0, '2020-08-10 20:48:45', '2020-08-10 20:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `book_id`, `order_id`, `qty`) VALUES
(1, 11, 1, 1),
(2, 2, 1, 1),
(3, 8, 1, 1),
(4, 12, 2, 1),
(5, 11, 2, 1),
(6, 2, 2, 1),
(7, 9, 2, 1),
(8, 12, 3, 1),
(9, 1, 3, 1),
(10, 11, 4, 3),
(11, 6, 4, 1),
(12, 4, 5, 1),
(13, 2, 5, 1),
(14, 1, 5, 1),
(18, 7, 9, 1),
(19, 6, 9, 1),
(20, 11, 9, 1),
(21, 8, 10, 1),
(22, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_date`) VALUES
(1, 'admin', 'admin', '2020-07-21 02:05:09'),
(2, 'Snow', '1234', '2020-08-10 20:37:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
