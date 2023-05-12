-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 01:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_actions`
--

CREATE TABLE `tbl_actions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `action` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_actions`
--

INSERT INTO `tbl_actions` (`id`, `user_id`, `action`, `date`) VALUES
(0, 1, 'added product test', '2023-05-11 18:45:23'),
(0, 1, 'added product test', '2023-05-11 18:46:23'),
(0, 1, 'added product test', '2023-05-11 18:47:15'),
(0, 1, 'added category test', '2023-05-11 19:31:58'),
(0, 1, 'updated product test', '2023-05-11 19:33:52'),
(0, 1, 'added stock of 10 to test', '2023-05-11 19:41:20'),
(0, 1, 'added stock of 5 to test', '2023-05-11 19:41:35'),
(0, 1, 'updated category test', '2023-05-12 10:22:51'),
(0, 1, 'deleted category test1', '2023-05-12 10:22:59'),
(0, 1, 'added category test', '2023-05-12 10:24:30'),
(0, 1, 'updated product test', '2023-05-12 10:28:37'),
(0, 1, 'added category LAPTOP', '2023-05-12 11:12:05'),
(0, 1, 'updated category LAPTOP', '2023-05-12 11:12:13'),
(0, 1, 'added product laptop', '2023-05-12 11:12:46'),
(0, 1, 'added stock of 5 to laptop', '2023-05-12 11:13:04'),
(0, 1, 'updated order status for chouaib to Delivered', '2023-05-12 11:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `client_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(2, 'test', 'Product_category_91.jpeg', 'Yes', 'Yes'),
(3, 'LAPTOP', 'Product_category_469.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'chouaib', 'chouaib23kaddouri@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `checked` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `total` float(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(250) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_contact` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_address` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `checked` varchar(250) NOT NULL,
  `client_id` int(10) NOT NULL,
  `cancel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `product_id`, `checked`, `client_id`, `cancel`) VALUES
(1, '1', 200.00, '2023-05-12 00:00:46', 'Cancelled', 'chouaib', '0762546252', 'chouaib23kaddouri@gmail.com', 'hachmia', '1', '', 1, 0),
(2, '1,1', 10200.00, '2023-05-12 00:13:52', 'Delivered', 'chouaib', '0762546252', 'chouaib23kaddouri@gmail.com', 'aiksydzxghcjbuefkyjsvdkfhzbcx', '1,2', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `brand` varchar(250) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Money_spent` float(10,2) NOT NULL,
  `Money_won` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`, `stock`, `brand`, `creation_date`, `Money_spent`, `Money_won`) VALUES
(1, 'test', 'dsadawdsa', 200.00, 'Product_Name_9445.jpeg', 2, 'Yes', 'Yes', 13, 'dsad', '2023-05-11 18:47:15', 1300.00, 400),
(2, 'laptop', 'very good laptop\r\n0;s;1;P;c;7;o;1;0t;1;0l;3;0o;1;0a;1;0f;0;1b;0;S;d;0', 10000.00, 'Product_Name_9587.png', 3, 'Yes', 'Yes', 4, 'asus', '2023-05-12 11:12:46', 30000.00, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_revenue`
--

CREATE TABLE `tbl_revenue` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `Money_spent` float(10,2) NOT NULL,
  `Money_won` float(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_revenue`
--

INSERT INTO `tbl_revenue` (`id`, `product_id`, `Money_spent`, `Money_won`, `date`) VALUES
(1, 1, 1200.00, 0.00, '2023-05-11 19:41:20'),
(2, 1, 100.00, 0.00, '2023-05-11 19:41:35'),
(3, 1, 0.00, 200.00, '2023-05-12 11:00:46'),
(4, 2, 30000.00, 0.00, '2023-05-12 11:13:04'),
(5, 1, 0.00, 400.00, '2023-05-12 11:13:52'),
(6, 2, 0.00, 10000.00, '2023-05-12 11:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `stock_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `product_id`, `stock`, `stock_date`, `stock_price`) VALUES
(1, 1, 10, '2023-05-11 08:38:32', 1200),
(2, 1, 10, '2023-05-11 08:41:20', 1200),
(3, 1, 5, '2023-05-11 08:41:35', 100),
(4, 2, 5, '2023-05-12 00:13:04', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `password`, `email`, `sexe`, `phone`, `adress`) VALUES
(1, 'chouaib kaddouri', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'chouaib23kaddouri@gmail.com', 'Male', '0762546252', 'hachmia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_revenue`
--
ALTER TABLE `tbl_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_revenue`
--
ALTER TABLE `tbl_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
