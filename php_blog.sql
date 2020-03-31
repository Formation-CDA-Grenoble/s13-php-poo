-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2020 at 01:30 PM
-- Server version: 10.2.6-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `cover`, `created_at`, `category_id`) VALUES
(1, 'My first article', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.', 'http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg', '2020-03-31 11:56:58', 2),
(2, 'Tourism halted due to coronavirus', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur corrupti ratione aperiam cupiditate animi, numquam, sunt omnis magnam nisi reiciendis voluptate quidem! Consequuntur repellendus cumque numquam, saepe vitae enim natus maiores, a fugit sit incidunt ad exercitationem ea suscipit impedit hic molestias rem consequatur culpa. Fugit repellat saepe cum porro.', 'http://3.bp.blogspot.com/-2PfSfnFm34s/UEYPkEfSUdI/AAAAAAAAEwU/3O-C3gDfu_A/s1920/Beautiful-aerial-view-of-Hong-Kong-1920.jpg', '2020-03-31 11:56:58', 1),
(3, 'When can we expect a good Star Wars movie?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Condimentum lacinia quis vel eros donec ac odio tempor orci. Elit duis tristique sollicitudin nibh sit amet commodo nulla. Dignissim cras tincidunt lobortis feugiat vivamus at. Ac feugiat sed lectus vestibulum mattis ullamcorper velit. Dis parturient montes nascetur ridiculus. At in tellus integer feugiat scelerisque varius. Duis tristique sollicitudin nibh sit amet. Iaculis eu non diam phasellus vestibulum. Erat imperdiet sed euismod nisi porta lorem mollis aliquam. Volutpat lacus laoreet non curabitur gravida arcu. A diam sollicitudin tempor id eu. Ut sem nulla pharetra diam sit amet nisl. Tellus orci ac auctor augue mauris augue. Mi tempus imperdiet nulla malesuada pellentesque elit eget gravida.', 'https://images7.alphacoders.com/671/thumb-1920-671281.jpg', '2020-03-31 14:33:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'News', ''),
(2, 'Business', ''),
(3, 'Sports', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
