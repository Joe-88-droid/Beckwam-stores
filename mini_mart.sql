-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 10:47 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00 (GMT +3)";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_sale`
--

CREATE TABLE `cash_sale` (
  `id` int(11) NOT NULL,
  `ammount` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `receipt_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_sale`
--

INSERT INTO `cash_sale` (`id`, `ammount`, `date`, `receipt_id`) VALUES
(136, 4142, '2020-10-30', 1604076344),
(137, 4758, '2020-10-30', 1604076444),
(138, 1811, '2020-11-02', 1604340214),
(139, 1811, '2020-11-02', 1604340710),
(140, 1811, '2020-11-02', 1604340803),
(141, 1811, '2020-11-02', 1604340839),
(142, 4717, '2020-11-02', 1604341514),
(143, 2402, '2020-11-07', 1604718309),
(144, 4111, '2020-12-24', 1608826047),
(145, 9254, '2020-12-24', 1608827683),
(146, 1195, '2021-07-13', 1626197225),
(147, 1096, '2021-07-13', 1626197477),
(148, 540, '2021-07-13', 1626198154),
(149, 1046, '2021-07-13', 1626198771),
(150, 760, '2021-07-13', 1626198802),
(151, 790, '2021-07-14', 1626251306),
(152, 840, '2021-07-14', 1626251463),
(153, 540, '2021-07-14', 1626251540);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `weight` int(10) NOT NULL,
  `volume` int(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `expiry` date NOT NULL DEFAULT current_timestamp(),
  `expiry2` date NOT NULL DEFAULT current_timestamp(),
  `inStock` int(10) NOT NULL,
  `inStock2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `price`, `description`, `weight`, `volume`, `unit`, `expiry`, `expiry2`, `inStock`, `inStock2`) VALUES
(1, '616110637927976', 540, 'Sugar Mumias', 5, 5, '', '0000-00-00', '0000-00-00', 19, 0),
(2, '61611063792799898', 50, 'Eden Tea cooler', 250, 0, 'g', '2020-10-01', '0000-00-00', 63, 0),
(11, '8902310100154', 250, 'JK Copier Rim Papers su', 200, 0, 'g', '0000-00-00', '0000-00-00', -23, 0),
(12, '', 796, 'Top fry pure vegetable', 0, 5, 'L', '0000-00-00', '0000-00-00', -5, 0),
(13, '', 506, 'Top fry veg oil', 0, 3, 'L', '0000-00-00', '0000-00-00', -3, 0),
(14, '', 356, 'Top fry veg oil', 0, 2, 'L', '0000-00-00', '0000-00-00', -3, 0),
(15, '', 784, 'Salit vegetable oil', 0, 5, 'L', '0000-00-00', '0000-00-00', -51, 0),
(16, '', 498, 'Salit vegetable oil', 0, 3, 'L ', '0000-00-00', '0000-00-00', -51, 0),
(17, '', 365, 'Salit vegetable oil', 0, 2, 'L', '0000-00-00', '0000-00-00', -51, 0),
(18, '', 2888, 'Salit vegetable oil', 0, 20, 'L', '0000-00-00', '0000-00-00', -51, 0),
(19, '', 185, 'Salit vegetable oil', 0, 1, 'L', '0000-00-00', '0000-00-00', -51, 0),
(20, '', 1396, 'Salit vegetable oil', 0, 10, 'L', '0000-00-00', '0000-00-00', -51, 0),
(21, '', 3047, 'Rina vegetable cooking oil', 0, 20, 'L', '0000-00-00', '0000-00-00', -2, 0),
(22, '', 1534, 'Rina vegetable oil', 0, 10, 'L', '2020-10-06', '0000-00-00', -1, 0),
(23, '', 768, 'Pepco pure vegetable oil', 0, 5, 'L', '2020-10-06', '0000-00-00', -1, 0),
(24, '', 479, ' Pepco pure vegetable oil', 0, 3, 'L', '2020-10-06', '0000-00-00', -1, 0),
(25, '', 335, 'Pepco pure vegetable oil', 0, 2, 'L', '2020-10-06', '0000-00-00', -1, 0),
(26, '', 181, 'Pepco pure vegetable oil', 0, 1, 'L', '2020-10-06', '0000-00-00', -1, 0),
(27, '', 510, 'Pika  pure vegetable oil', 0, 3, 'L', '0000-00-00', '0000-00-00', -2, 0),
(28, '', 360, 'Pika pure vegetable oil', 0, 2, 'L', '2020-10-06', '0000-00-00', -1, 0),
(29, '', 187, 'Pika pure vegetable oil', 1, 0, 'Kg', '2020-10-06', '0000-00-00', -1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id_` int(20) NOT NULL,
  `code_` varchar(200) NOT NULL,
  `productDescription` varchar(200) NOT NULL,
  `receipt_bar_code` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `no_of_products_purchased` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id_`, `code_`, `productDescription`, `receipt_bar_code`, `date`, `no_of_products_purchased`, `cost`) VALUES
(182, '11', '', 1604076344, '2020-10-30', 1, 0),
(183, '16', '', 1604076344, '2020-10-30', 1, 0),
(184, '18', '', 1604076344, '2020-10-30', 1, 0),
(185, '13', '', 1604076344, '2020-10-30', 1, 0),
(186, '1', '', 1604076444, '2020-10-30', 3, 0),
(187, '11', '', 1604076444, '2020-10-30', 1, 0),
(188, '18', '', 1604076444, '2020-10-30', 1, 0),
(189, '17', '', 1604340214, '2020-11-02', 1, 0),
(190, '20', '', 1604340214, '2020-11-02', 1, 0),
(191, '2', '', 1604340214, '2020-11-02', 1, 0),
(192, '17', 'Salit vegetable oil', 1604340710, '2020-11-02', 1, 0),
(193, '20', 'Salit vegetable oil', 1604340710, '2020-11-02', 1, 0),
(194, '2', 'Eden Tea cooler', 1604340710, '2020-11-02', 1, 0),
(195, '17', 'Salit vegetable oil', 1604340803, '2020-11-02', 1, 0),
(196, '20', 'Salit vegetable oil', 1604340803, '2020-11-02', 1, 0),
(197, '2', 'Eden Tea cooler', 1604340803, '2020-11-02', 1, 0),
(198, '17', 'Salit vegetable oil', 1604340839, '2020-11-02', 1, 0),
(199, '20', 'Salit vegetable oil', 1604340839, '2020-11-02', 1, 0),
(200, '2', 'Eden Tea cooler', 1604340839, '2020-11-02', 1, 0),
(201, '1', 'Sugar Mumias', 1604341514, '2020-11-02', 3, 1620),
(202, '2', 'Eden Tea cooler', 1604341514, '2020-11-02', 1, 50),
(203, '21', 'Rina vegetable cooking oil', 1604341514, '2020-11-02', 1, 3047),
(204, '12', 'Top fry pure vegetable', 1604718309, '2020-11-07', 2, 1592),
(205, '2', 'Eden Tea cooler', 1604718309, '2020-11-07', 1, 50),
(206, '27', 'Pika  pure vegetable oil', 1604718309, '2020-11-07', 1, 510),
(207, '11', 'JK Copier Rim Papers su', 1604718309, '2020-11-07', 1, 250),
(208, '1', 'Sugar Mumias', 1608826047, '2020-12-24', 1, 540),
(209, '16', 'Salit vegetable oil', 1608826047, '2020-12-24', 1, 498),
(210, '19', 'Salit vegetable oil', 1608826047, '2020-12-24', 1, 185),
(211, '18', 'Salit vegetable oil', 1608826047, '2020-12-24', 1, 2888),
(212, '12', 'Top fry pure vegetable', 1608827683, '2020-12-24', 1, 796),
(213, '22', 'Rina vegetable oil', 1608827683, '2020-12-24', 1, 1534),
(214, '11', 'JK Copier Rim Papers su', 1608827683, '2020-12-24', 2, 500),
(215, '2', 'Eden Tea cooler', 1608827683, '2020-12-24', 3, 150),
(216, '16', 'Salit vegetable oil', 1608827683, '2020-12-24', 1, 498),
(217, '18', 'Salit vegetable oil', 1608827683, '2020-12-24', 2, 5776),
(218, '11', '', 1626197225, '2021-07-13', 2, 0),
(219, '25', '', 1626197225, '2021-07-13', 1, 0),
(220, '28', '', 1626197225, '2021-07-13', 1, 0),
(221, '11', '', 1626197477, '2021-07-13', 1, 0),
(222, '12', '', 1626197477, '2021-07-13', 1, 0),
(223, '2', '', 1626197477, '2021-07-13', 1, 0),
(224, '1', '', 1626198154, '2021-07-13', 1, 0),
(225, '12', '', 1626198771, '2021-07-13', 1, 0),
(226, '11', '', 1626198771, '2021-07-13', 1, 0),
(227, '11', '', 1626198802, '2021-07-13', 1, 0),
(228, '27', '', 1626198802, '2021-07-13', 1, 0),
(229, '1', '', 1626251306, '2021-07-14', 1, 0),
(230, '11', '', 1626251306, '2021-07-14', 1, 0),
(231, '1', '', 1626251463, '2021-07-14', 1, 0),
(232, '2', '', 1626251463, '2021-07-14', 1, 0),
(233, '11', '', 1626251463, '2021-07-14', 1, 0),
(234, '1', '', 1626251540, '2021-07-14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `track_register`
--

CREATE TABLE `track_register` (
  `id` int(11) NOT NULL,
  `opening_register` int(20) NOT NULL,
  `closing_register` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `track_register`
--

INSERT INTO `track_register` (`id`, `opening_register`, `closing_register`, `date`) VALUES
(5, 5000, 10000, '2020-09-29'),
(6, 4500, 0, '2020-09-29'),
(7, 3000, 15300, '2020-09-29'),
(8, 5000, 0, '2020-09-30'),
(9, 7000, 5200, '2020-10-01'),
(10, 3000, 14890, '2020-10-02'),
(11, 5000, 56220, '2020-10-03'),
(12, 5000, 4970, '2020-10-04'),
(13, 5000, 4890, '2020-10-05'),
(15, 5000, 18692, '2020-10-06'),
(16, 5000, 14545, '2020-10-07'),
(17, 5000, 5016, '2020-10-12'),
(18, 9200, 498, '2020-10-16'),
(19, 5000, 0, '2020-10-22'),
(20, 2000, 0, '2020-10-26'),
(21, 6000, 0, '2020-10-29'),
(22, 3000, 8900, '2020-10-30'),
(23, 5600, 11961, '2020-11-02'),
(24, 2000, 2402, '2020-11-07'),
(25, 3000, 0, '2020-11-08'),
(26, 6000, 0, '2020-11-16'),
(27, 5000, 0, '2020-12-21'),
(28, 7000, 13365, '2020-12-24'),
(30, 5000, 4637, '2021-07-13'),
(32, 10000, 2170, '2021-07-14'),
(33, 2000, 0, '2021-07-19'),
(34, 10000, 0, '2022-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_sale`
--
ALTER TABLE `cash_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id_`);

--
-- Indexes for table `track_register`
--
ALTER TABLE `track_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_sale`
--
ALTER TABLE `cash_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id_` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `track_register`
--
ALTER TABLE `track_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
