-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 03:17 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onme`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `firebase_id`, `user_id`, `seat_number`, `message`, `total_price`) VALUES
(1, '1dsaj3', 1, 16, 'You\'re cute!', '99.99');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `picture` blob,
  `price` decimal(5,2) NOT NULL,
  `quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`id`, `firebase_id`, `item_id`, `cart_id`, `i_name`, `picture`, `price`, `quantity`) VALUES
(16, 'fea3j2', 1, 1, 'Macaroni', NULL, '9.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  `description` varchar(200) NOT NULL,
  `drink_tag` enum('Cocktail','Shooter','Mocktail') DEFAULT NULL,
  `food_tag` enum('Appetizer','Dessert') DEFAULT NULL,
  `trending` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `drink` tinyint(1) NOT NULL,
  `recent_rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `restaurant_id`, `firebase_id`, `i_name`, `picture`, `price`, `description`, `drink_tag`, `food_tag`, `trending`, `food`, `drink`, `recent_rank`) VALUES
(1, 1, '1', 'Fully Loaded Nachos', '../../assets/headerImg.png', '7.99', 'Olives, onions, tomatoes, ground beef, jalapeños with sour cream and fresh guac.', NULL, 'Appetizer', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `drink` tinyint(1) NOT NULL,
  `food` tinyint(1) NOT NULL,
  `frequent_rank` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `firebase_id`, `name`, `picture`, `address`, `city`, `drink`, `food`, `frequent_rank`) VALUES
(1, '0', 'SW01 Room 1205', '../../assets/headerImg.png', '3700 Willingdon Ave', 'Burnaby', 1, 1, 1),
(2, '0', 'Habitat Pub', '../../assets/headerImg.png', '3700 Willingdon Ave', 'Burnaby', 1, 1, 2),
(3, '0', 'Browns Socialhouse', '../../assets/headerImg.png', '1908 Rosser Ave', 'Burnaby', 1, 1, 3),
(4, '0', 'The Keg Steakhouse + Bar', '../../assets/headerImg.png', '4510 Still Creek Ave', 'Burnaby', 1, 1, 4),
(5, '0', 'JOEY', '../../assets/headerImg.png', '1899 Rosser Ave #109', 'Burnaby', 1, 1, 5),
(6, '0', 'Cactus Club Cafe', '../../assets/headerImg.png', '4219 B Lougheed Hwy.', 'Burnaby', 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firebase_id` varchar(50) NOT NULL,
  `picture` blob,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `truth1` varchar(200) DEFAULT NULL,
  `truth2` varchar(200) DEFAULT NULL,
  `lie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firebase_id`, `picture`, `first_name`, `last_name`, `age`, `truth1`, `truth2`, `lie`) VALUES
(1, 'Z8qVLjbaztMfzqpHYWIgrysZNEx1', NULL, 'Danny', 'Nguyen', 26, 'I am 26', 'My name is Danny', 'I eat bugs'),
(2, '12345', NULL, 'Steve', ' Urkel', NULL, NULL, NULL, NULL),
(4, '1jf231', NULL, 'Bob', 'Ross', NULL, NULL, NULL, NULL),
(5, '5veai', NULL, 'John', 'Smith', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_id` (`cart_id`),
  ADD KEY `fk_item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restaurant_id` (`restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `fk_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
