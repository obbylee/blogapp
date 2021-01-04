-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 04:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Technology', '2019-02-25 01:59:51'),
(2, 'Bussiness', '2019-02-25 02:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(1, 2, 'Post One', 'Post-One', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel risus lacinia, finibus enim in, pharetra nunc. Nam id blandit tellus. Vivamus nec risus at justo finibus congue in quis mi. Pellentesque ut lectus ligula. Etiam vitae mattis augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus dapibus facilisis dignissim.</p>\r\n', '200px-Rotating_earth_(large).gif', '2019-02-25 02:20:19'),
(2, 1, 'Post Two', 'Post-Two', '<p>Donec in tincidunt nisl. Ut sem nisi, facilisis non leo et, gravida dictum lacus. Nunc mattis magna sit amet hendrerit maximus. Fusce vitae est eu orci tempor sollicitudin sit amet in risus. Ut ultrices et urna eu posuere. Proin quis dignissim urna. Donec posuere nulla in tortor hendrerit aliquam. Morbi lacinia fringilla tincidunt. Integer ex enim, consectetur eget scelerisque porttitor, ultrices non nisi. Duis eu ante augue. In eu velit eu enim ultrices fringilla quis sed nisi. Phasellus eget risus quis nulla suscipit volutpat. Ut et rhoncus velit. Phasellus finibus finibus suscipit.</p>\r\n', 'gif-hypnotique-013.gif', '2019-02-25 02:20:49'),
(3, 1, 'Post Three', 'Post-Three', '<blockquote>\r\n<p><em><strong>Nunc tempus consequat ante</strong></em>, sed fermentum libero varius id. Curabitur tempus id quam ac molestie. Suspendisse potenti. Nam magna justo, dictum ut ipsum ac, cursus euismod felis. Suspendisse aliquet ligula in lorem luctus fermentum. Nulla in diam quis risus <s>commodo sagittis</s>. Nam vehicula elementum justo sit amet viverra. Phasellus sodales sem et dictum lacinia.</p>\r\n</blockquote>\r\n', 'giphy.gif', '2019-02-25 02:21:05'),
(4, 1, 'Post Four', 'Post-Four', '<blockquote>\r\n<p><a href=\"http://localhost/blogapp/\"><em><strong>Aliquam posuere</strong></em></a> faucibus mi, in imperdiet odio. <strong>Nullam suscipit faucibus accumsan. </strong>Praesent dignissim urna eu ex mollis ultricies. Maecenas bibendum eget odio quis interdum. <s>Phasellus et leo laoreet,</s> elementum augue vel, tempor tellus. <em>Etiam vehicula turpis leo</em>. Etiam rhoncus tellus ac velit maximus, eu efficitur nibh bibendum. Aenean sed turpis tempus diam congue egestas. Integer auctor felis vel erat finibus, non semper massa ultrices. Vivamus tellus magna, vehicula id neque vitae, eleifend ultrices lorem. Praesent enim neque, gravida eu velit vel, convallis mattis mauris. Aliquam dictum, nisi eget rutrum pellentesque, nulla dui interdum tortor, a tristique lacus magna vitae nisi. Ut finibus mi vitae metus rutrum vehicula. Proin id fermentum lorem, ut condimentum risus.</p>\r\n</blockquote>\r\n', 'H1P.gif', '2019-02-25 02:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
