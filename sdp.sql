-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 11:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `email`, `password`) VALUES
(2, 'feres', 'feres@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae'),
(3, 'hellotaxi', 'hellotaxi@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae'),
(4, 'ride', 'ride@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae'),
(5, 'taxiye', 'taxiye@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae'),
(6, 'zay-ride', 'zay-ride@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae'),
(7, 'admin', 'juniourmimo@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_products`
--

CREATE TABLE `delivered_products` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `car_model` varchar(250) NOT NULL,
  `product_type` varchar(250) NOT NULL,
  `phone_number` int(250) NOT NULL,
  `delivery_date` varchar(25) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered_products`
--

INSERT INTO `delivered_products` (`id`, `first_name`, `last_name`, `company_name`, `car_model`, `product_type`, `phone_number`, `delivery_date`, `hide`) VALUES
(86, 'kaleab', 'tesfu', 'feres', 'corolla', 'hybrid', 912345678, '0000-00-00', 0),
(87, 'mimo', 'mm', 'ride', 'corolla', 'night', 912121212, '18/10/2021', 0),
(88, 'baba', 'vast', 'hellotaxi', 'Priez', 'day', 911124545, '07/10/2021', 0),
(94, 'Michael', 'Jordan', 'feres', 'Humvee', 'day', 923443434, '05/10/2021', 0),
(95, 'g', 'f', 'taxiye', 'vitz', 'hybrid', 912366222, '0000-00-00', 1),
(96, 'f', 'f', 'feres', 'vitz', 'night', 912366222, '05/10/2021', 0),
(98, 'Chala', 'Yetale', 'feres', 'Bugatti', 'night', 955451121, '05/10/2021', 0),
(100, 'tuba', 'gaga', 'feres', 'corolla', 'day', 912366000, '05/10/2021', 0),
(102, 'hi', 'breed', 'feres', 'corolla', 'hybrid', 945121212, '06/10/2021', 0),
(103, 'Demam', 'Beyene', 'feres', 'vitz', 'hybrid', 978675645, '07/10/2021', 0),
(107, 'jemal', 'lemaj', 'zay-ride', 'Isuzu', 'night', 976334455, '17/10/2021', 0),
(108, 'kasa', 'chelesa', 'feres', 'vitz', 'day', 912236548, '07/10/2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `car_model` varchar(80) NOT NULL,
  `product_type` varchar(80) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `approved` int(2) NOT NULL,
  `delivered` tinyint(1) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `company_name`, `car_model`, `product_type`, `phone_number`, `approved`, `delivered`, `status`) VALUES
(89, 'Haniwa', 'Tofun', 'ride', 'Mazda', 'night', '0945223030', 1, 1, 2),
(90, 'Kiflom', 'Robel', 'zay-ride', 'yaris', 'day', '0900500909', 0, 0, 1),
(97, 'q', 'q', 'hellotaxi', 'vitz', 'night', '0912366222', 1, -1, 2),
(99, 'abeba', 'ababa', 'taxiye', 'Hyundai', 'night', '0912334455', 1, 0, 2),
(104, 'Ato', 'Lemma', 'feres', 'yaris', 'day', '0981124442', 0, 0, 1),
(105, 't', 'f', 'hellotaxi', 'corolla', 'day', '0912366221', 1, 0, 2),
(106, 'Jagema', 'Kello', 'taxiye', 'V8', 'day', '0911098909', 1, -1, 2),
(109, 'Xobille', 'Yeshitila', 'ride', 'Honda', 'day', '0934112233', 0, 0, 1),
(110, 'abeba', 'ayehush', 'ride', 'lemlem', 'day', '0912344321', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`) VALUES
(83, 'juniourmimo@gmail.com', 'fe0c1d98fd6e058b4084dffba4523bae7f46da743feb59714403a669d91c9cd74e9d61c61088c6444dee2afcc5db39a0bfb1'),
(84, 'juniourmimo@gmail.com', 'dc2cc1a70960cef7b0280e38467c80be478c164ddaa95c1cfc8bc78b70ce06352dfc95f93bb3e6c77f28b24272afc090f43e'),
(85, 'juniourmimo@gmail.com', '9c1c69080ae5c9367068bd17594ef5655dc60ea68ec7f8f4375ad5aa363f603e5faa40aed851ac4aea8910fd8169b64cf42c'),
(86, '', '51c9e0387bbdaa4efb6b5ab85f0eebf633b9a5b8fcac0c8b3fefe62f509798c13969dc470726e4daf3d11ecab878b965677f'),
(87, '', '744c8da80e0191815bea975489cadd031f5892b243fe86c56c3588756e91a413c9c8b9b564d4ef9cc8d40de6d02f0da78359'),
(88, 'feres@gmail.com', '19b09833bfa0fd71daf5c8cd176a8ce4557cb1f170f2228ea981bdef712f86e76c216233c17e3d404d80f1edbde0c1416e9b'),
(89, 'feres@gmail.com', ''),
(90, 'feres@gmail.com', '6da73efce3805e036fc3a36094939a24d6ee8363be63eaecd7823fa5c14ac83b0b479a9cf87dfbed98e81da687a84059b04e'),
(91, 'feres@gmail.com', '332e9acf0b74121561f62adfec9cd27ca08804b0897204d385f16ba034786fbe19c96d919bb9ea0abfd767f81559e9abb2cb'),
(92, 'feres@gmail.com', '53b1293850eadc0a9e724b4c534680a709bd5a40bc04b0c47d7875174c72583dfc653d71b9671080ba020b530b9326a31009'),
(93, 'juniourmimo@gmail.com', '3d56ac07821023e8c6241c1e9075ae5372835a5e546a8a1b1fcb30b68a0a96c8963902a5182d0907bcc634a7b6e92bb9dd56'),
(94, 'juniourmimo@gmail.com', 'cb0f98dd55824c694da54f2a22db380ada52f6166da5b4e1b744ebca80f7eff1afaf4c358bee63a0f437e29b6067b08a27d8'),
(95, 'juniourmimo@gmail.com', 'eee7f5d1ce749aa47e0b8bf3eff08e58df3122be4bc92db4ebb2b106e1d7e9805128c993c587f59d8dcbd3761cfb49bf42eb'),
(96, 'juniourmimo@gmail.com', 'fc43c841c3b1d2275432ecc7573a168269785ff46c2dc9b122729dd0562d3c2fae8d16174113e16040351bb83a0db092cd0a'),
(97, 'juniourmimo@gmail.com', '1d3dfb48d36ea988b3feceb66a8f6d1c3e484268e10dd1dabcd5a68f55751b77520e1e28d6ba9e4d9c89245f39a6dcd87ba3'),
(98, 'juniourmimo@gmail.com', '156adcdc48f59cb68a267b6b0292802bdcd1e9f307cbc8c8079e4b7b29587e71f3adea32f8e992e5f03d4eae3e706abad175'),
(100, 'juniourmimo@gmail.com', '6a91f59cff84c3608acf12cb7c593584be08ca18a1fd3f828ec465e01796e028106e960f00694b42f91047a9cbb06cdf4bd5'),
(101, 'juniourmimo@gmail.com', 'a851a86a7427dce188b633c44777ebdb85cfedbce71d1acfe9ac0d1b0030a080782000da05e6ff9c9862230e31f1c6cd0fc9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered_products`
--
ALTER TABLE `delivered_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `delivered_products`
--
ALTER TABLE `delivered_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
