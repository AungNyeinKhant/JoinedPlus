-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 02:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category2`
--

CREATE TABLE `category2` (
  `cate_id` int(11) NOT NULL,
  `maincate` varchar(30) NOT NULL,
  `subcate` varchar(30) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category2`
--

INSERT INTO `category2` (`cate_id`, `maincate`, `subcate`, `createdate`, `status`) VALUES
(1, 'Shoes', 'General', '2023-04-23 12:59:44', 1),
(2, 'Glass', 'Paradise', '2023-04-23 13:26:14', 1),
(3, 'Shoes', 'Galaxy series', '2023-04-23 15:39:16', 1),
(4, 'Food', 'Can', '2023-04-23 15:41:52', 1),
(5, 'Electronic', 'airpod', '2023-04-24 12:13:42', 1),
(6, 'Plant', 'Bonzai', '2023-04-27 08:31:16', 1),
(7, 'Glass', 'General', '2023-04-27 08:41:35', 1),
(8, 'Plant', 'General', '2023-04-27 09:06:56', 1),
(9, 'Electronic', 'Rainbow Airpod', '2023-04-27 09:07:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imgfile` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bankname` varchar(11) NOT NULL,
  `bankno` varchar(10) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `name`, `imgfile`, `phone`, `address`, `bankname`, `bankno`, `gmail`, `password`, `gender`, `createdate`, `status`) VALUES
(1, 'Potato', 'Screenshot (415).png', '098234675', 'no335,kajd street ,asjd township', 'wavepay', '2105', 'potato@gmail.com', 'potato', 'male', '2023-04-18 08:13:07', 0),
(2, 'Olivia', 'female1.jpg', '0932762468', 'no2372,dmasjhd street,jhsa road', 'kpay', '5422', 'Olivia@gmail.com', 'olivia', 'female', '2023-04-19 08:54:19', 1),
(3, 'Emma', 'female2.jpg', '0932866432', 'no 221,jasmine st,aihsd Road', 'kpay', '2100', 'Emma@gmail.com', 'emma', 'female', '2023-04-19 09:10:22', 1),
(4, 'Oliver', 'male1.jpg', '09337542432', 'no 33,j.r street,main road', 'ayapay', 'FN-3316', 'Oliver@gmail.com', 'oliver', 'male', '2023-04-19 14:30:39', 1),
(5, 'Charlotte', 'female3.jpg', '09237458643', 'no2376,qwuhdf street,khrva road', 'wavepay', 'TX-2934', 'Charlotte@gmail.com', 'charlotte', 'male', '2023-04-19 14:55:17', 1),
(6, 'Henry', 'male2.jpg', '0932866432', 'no2376,qwuhdf street,khrva road', 'ayapay', '3482', 'Henry@gmail.com', 'henry', 'male', '2023-04-26 07:32:28', 1),
(7, 'Lucas', 'male3.jpg', '019234788', 'no942,hisdaji street,ijdfo Road', 'kpay', '5317', 'lucas@gmail.com', 'lucas', 'male', '2023-04-27 08:09:37', 1),
(8, 'Paladin', 'plant1.jpg', '092394632', 'no2397 ,akjsdkj street , kdnk road', 'wavepay', '2100', 'paladin@gmail.com', 'paladin', 'male', '2023-05-09 14:47:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `maincate`
--

CREATE TABLE `maincate` (
  `cate_id` int(11) NOT NULL,
  `maincate` varchar(30) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maincate`
--

INSERT INTO `maincate` (`cate_id`, `maincate`, `status`) VALUES
(1, 'Electronic', 1),
(2, 'Shoes', 1),
(3, 'Glass', 1),
(4, 'Food', 1),
(5, 'Plant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order66`
--

CREATE TABLE `order66` (
  `order_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sellername` varchar(30) NOT NULL,
  `imgfile` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `paymentStatus` varchar(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order66`
--

INSERT INTO `order66` (`order_id`, `name`, `sellername`, `imgfile`, `price`, `paymentStatus`, `createdate`, `status`) VALUES
(21, 'Sketch', 'Otta Mark', 'sunglass1.jpg', 300, 'Paid', '2023-04-27 10:22:06', 0),
(22, 'LC-2172', 'Marc Company', 'sunglass3.jpg', 200, 'C.O.D', '2023-04-27 10:22:16', 0),
(23, 'Rainbow L-5 Airpod', 'Spiderman', 'airpod4.jpg', 549, 'Paid', '2023-04-27 10:22:25', 0),
(24, 'Tomato Pasta', 'DnD Market', 'can2-tomatopasta.jpg', 10, 'Paid', '2023-04-27 11:51:11', 0),
(25, 'Sketch', 'Otta Mark', 'sunglass1.jpg', 300, 'C.O.D', '2023-04-27 13:44:00', 0),
(26, 'KL-033', 'Lily Stark', 'sunglass2.jpg', 199, 'Paid', '2023-05-06 16:39:31', 0),
(27, 'KL-033', 'Lily Stark', 'sunglass2.jpg', 199, 'C.O.D', '2023-05-06 16:39:46', 0),
(77, 'KL-033', 'Lily Stark', 'sunglass2.jpg', 199, 'C.O.D', '2023-05-09 14:15:53', 0),
(78, 'LL-2673', 'Apple.JR', 'sunglass4.jpg', 219, 'C.O.D', '2023-05-09 14:17:56', 0),
(79, '', '', '', 0, 'C.O.D', '2023-05-09 14:38:39', 0),
(80, 'Tomato Pasta', 'DnD Market', 'can2-tomatopasta.jpg', 10, 'C.O.D', '2023-05-09 14:44:39', 0),
(81, 'Galaxy  Blue', 'Mr.Brownie', 'shoe2.jpg', 399, 'C.O.D', '2023-05-09 14:44:55', 0),
(82, 'Airpod 2-mini', 'Spicy Chilli', 'airpod1.jpg', 249, 'C.O.D', '2023-05-09 14:45:37', 0),
(83, 'Galaxy Dark Matters', 'Batman', 'shoe3.jpg', 399, 'C.O.D', '2023-05-09 15:22:29', 0),
(84, 'Galaxy Dark Matters', 'Batman', 'shoe3.jpg', 399, 'C.O.D', '2023-05-09 15:24:18', 0),
(85, 'Gray Shoe', 'Clark Kent', 'shoe1.jpg', 349, 'C.O.D', '2023-05-10 03:47:10', 0),
(86, 'Tomato Pasta', 'DnD Market', 'can2-tomatopasta.jpg', 10, 'C.O.D', '2023-05-10 04:38:29', 0),
(87, 'Galaxy Dark Matters', 'Batman', 'shoe3.jpg', 399, 'C.O.D', '2023-05-10 05:51:58', 0),
(88, 'KL-033', 'Lily Stark', 'sunglass2.jpg', 199, 'C.O.D', '2023-05-10 07:11:15', 0),
(89, 'Normal Shoe', 'DnD Market', 'shoe4.jpg', 219, 'C.O.D', '2023-05-10 07:11:18', 0),
(90, 'Airpod-3 mini', 'Marc Company', 'airpod2.jpg', 199, 'C.O.D', '2023-05-10 07:12:38', 0),
(91, 'Galaxy Dark Matters', 'Batman', 'shoe3.jpg', 399, 'C.O.D', '2023-05-10 07:15:48', 0),
(92, 'Rainbow D-11 Airpod', 'Thor Odin Son', 'airpod3.jpg', 519, 'C.O.D', '2023-05-10 07:15:57', 0),
(93, 'Tomato Pasta', 'DnD Market', 'can2-tomatopasta.jpg', 10, 'C.O.D', '2023-05-10 07:16:05', 0),
(94, 'LL-2673', 'Apple.JR', 'sunglass4.jpg', 219, 'C.O.D', '2023-05-10 08:02:21', 1),
(95, 'Gray Shoe', 'Clark Kent', 'shoe1.jpg', 349, 'C.O.D', '2023-05-10 08:04:03', 1),
(96, 'Rainbow L-5 Airpod', 'Spiderman', 'airpod4.jpg', 549, 'C.O.D', '2023-05-10 08:04:15', 1),
(97, 'Sketch', 'Otta Mark', 'sunglass1.jpg', 300, 'C.O.D', '2023-05-10 08:04:23', 1),
(98, 'Galaxy Dark Matters', 'Batman', 'shoe3.jpg', 399, 'C.O.D', '2023-05-10 08:04:32', 1),
(99, 'Garlic Pasta', 'DnD Market', 'can1-garlicpasta.jpg', 10, 'C.O.D', '2023-05-10 08:04:45', 1),
(100, 'Airpod 2-mini', 'Spicy Chilli', 'airpod1.jpg', 249, 'C.O.D', '2023-05-10 08:04:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sellername` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `imgfile` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `about` varchar(300) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `sellername`, `category`, `subcategory`, `imgfile`, `price`, `about`, `createdate`, `status`) VALUES
(1, 'Sketch', 'Otta Mark', 'Glass', 'Paradise', 'sunglass1.jpg', 300, '                                    This Shoe is Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ullam explicabo quibusdam quasi at, nobis facilis necessitatibus pariatur hic, voluptas eaque? Quaerat sint ea iste sed eveniet ad doloremque atque!                                       ', '2023-04-20 10:01:27', 0),
(2, 'KL-033', 'Lily Stark', 'Glass', 'Paradise', 'sunglass2.jpg', 199, '            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur perferendis amet quaerat recusandae. Ex praesentium explicabo minima, reprehenderit, beatae vitae numquam voluptas excepturi tempore mollitia odit nihil nam dolor quas.              ', '2023-04-20 10:07:38', 1),
(3, 'LL-2673', 'Apple.JR', 'Glass', 'General', 'sunglass4.jpg', 219, '                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur perferendis amet quaerat recusandae. Ex praesentium explicabo minima, reprehenderit, beatae vitae numquam voluptas excepturi tempore mollitia odit nihil nam dolor quas.                        ', '2023-04-20 10:17:23', 1),
(4, 'LC-2172', 'Marc Company', 'Glass', 'General', 'sunglass3.jpg', 200, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using L', '2023-04-20 10:19:48', 1),
(5, 'Normal Shoe', 'DnD Market', 'Shoes', 'General', 'shoe4.jpg', 219, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using L', '2023-04-20 10:21:52', 1),
(10, 'Gray Shoe', 'Clark Kent', 'Shoes', 'General', 'shoe1.jpg', 349, ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using ', '2023-04-23 14:41:29', 1),
(11, 'Galaxy  Blue', 'Mr.Brownie', 'Shoes', 'Galaxy series', 'shoe2.jpg', 399, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using L', '2023-04-23 15:20:57', 1),
(12, 'Galaxy Dark Matters', 'Batman', 'Shoes', 'Galaxy series', 'shoe3.jpg', 399, '              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The po', '2023-04-23 15:55:09', 1),
(13, 'Rainbow L-5 Airpod', 'Spiderman', 'Electronic', 'Rainbow Airpod', 'airpod4.jpg', 549, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum                        ', '2023-04-23 15:57:35', 1),
(14, 'Rainbow D-11 Airpod', 'Thor Odin Son', 'Electronic', 'Rainbow Airpod', 'airpod3.jpg', 519, '   It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum                     ', '2023-04-23 15:59:09', 1),
(15, 'Airpod 2-mini', 'Spicy Chilli', 'Electronic', 'airpod', 'airpod1.jpg', 249, '  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum      ', '2023-04-23 16:19:13', 1),
(16, 'Airpod-3 mini', 'Marc Company', 'Electronic', 'airpod', 'airpod2.jpg', 199, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using L', '2023-04-27 10:06:31', 1),
(17, 'Garlic Pasta', 'DnD Market', 'Food', 'Can', 'can1-garlicpasta.jpg', 10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2023-04-27 10:08:18', 1),
(18, 'Tomato Pasta', 'DnD Market', 'Food', 'Can', 'can2-tomatopasta.jpg', 10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2023-04-27 10:09:45', 1),
(19, 'Pink Salmon', 'DnD Market', 'Food', 'Can', 'can3-salmon.jpg', 10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2023-04-27 10:11:54', 1),
(20, 'Ham and Mushroom Sou', 'DnD Market', 'Food', 'Can', 'can4-ham.jpg', 10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum', '2023-04-27 10:17:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `realorder`
--

CREATE TABLE `realorder` (
  `order_id` int(11) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `products` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total` int(20) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `payments` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `realorder`
--

INSERT INTO `realorder` (`order_id`, `customer`, `products`, `phone`, `address`, `total`, `createdate`, `payments`, `status`) VALUES
(1, 'Pikachu', 'Sketch,Rainbow L-5 Airpod,Tomato Pasta,KL-033,LL-2673,Tomato Pasta,Galaxy  Blue,Airpod 2-mini,Galaxy Dark Matters,Gray Shoe,Tomato Pasta,Galaxy Dark Matters,', '923579234', '', 3092, '2023-05-10 06:49:53', 'Paid', 0),
(2, 'Ladio', 'Sketch,Rainbow L-5 Airpod,Tomato Pasta,KL-033,LL-2673,Tomato Pasta,Galaxy  Blue,Airpod 2-mini,Galaxy Dark Matters,Gray Shoe,Tomato Pasta,Galaxy Dark Matters,', '0927345234', 'asdjk smwq', 3092, '2023-05-10 07:02:42', 'C.O.D', 1),
(3, 'Tonato', 'Sketch,Rainbow L-5 Airpod,Tomato Pasta,KL-033,LL-2673,Tomato Pasta,Galaxy  Blue,Airpod 2-mini,Galaxy Dark Matters,Gray Shoe,Tomato Pasta,Galaxy Dark Matters,', '09437527832', 'sdbha mfsmksf wem,a.dada', 3092, '2023-05-10 07:09:26', 'Paid', 1),
(5, 'Shooting Stars', 'Galaxy Dark Matters,Rainbow D-11 Airpod,Tomato Pasta,', '092346823', 'sdagu asmlkdasd asdkmad', 928, '2023-05-10 07:16:58', 'C.O.D', 1),
(6, 'Metallica', 'KL-033', '0982347689', 'dasidh dsk ma d asd,asa', 199, '2023-05-10 08:01:37', 'Paid', 1),
(7, 'Lily', 'Sketch', '093248623', 'asdahi ada jdan adadma,sio', 300, '2023-05-10 08:05:30', 'Paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `imgfile` varchar(100) NOT NULL,
  `gmail` varchar(40) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `bankname` varchar(10) NOT NULL,
  `bankno` varchar(15) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `name`, `phone`, `address`, `imgfile`, `gmail`, `gender`, `bankname`, `bankno`, `createdate`, `status`) VALUES
(1, 'Lyra Bane', '012937646', 'no234,aldjnf street,najvvrion road', 'female4.jpg', 'lyra@gmail.com', 'female', 'ayapay', 'NY-2310', '2023-04-21 08:08:26', 1),
(2, 'Mark ', '09346289340', 'no234,aldjnf street,najvvrion road', 'male4.jpg', 'mark@gmail.com', 'male', 'ayapay', 'XY-8093', '2023-04-21 08:18:02', 1),
(3, 'Mac', '0983477282', 'no238,msdsij eam street,moasdm Road', 'male5.jpg', 'mac@gmail.com', 'male', 'kpay', 'NYY-2839', '2023-04-27 08:13:31', 1),
(4, 'Isabella', '096882378', 'no38,ishf jd street,jiasd Road', 'female5.jpg', 'isabella@gmail.com', 'female', 'kpay', '9026', '2023-04-27 08:15:47', 1),
(5, 'Mia', '0976232678', 'no232,asjnd street jomsad Road', 'female6.jpg', 'mia@gmail.com', 'female', 'wavepay', '893459', '2023-04-27 08:16:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category2`
--
ALTER TABLE `category2`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `maincate`
--
ALTER TABLE `maincate`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `order66`
--
ALTER TABLE `order66`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `realorder`
--
ALTER TABLE `realorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category2`
--
ALTER TABLE `category2`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `maincate`
--
ALTER TABLE `maincate`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order66`
--
ALTER TABLE `order66`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `realorder`
--
ALTER TABLE `realorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
