-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 08:39 PM
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
-- Database: `danaischgstore_tran`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `pcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `username`, `pid`, `pcount`) VALUES
(50, 'tran0903', 'P03', 1),
(69, 'tran@0903', 'P02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
('C01', 'Shirt', 'A shirt is a cloth garment for the upper body. Originally an undergarment worn exclusively by men, it has become, in American English, a catch-all term for a broad variety of upper-body garments and undergarments.'),
('C02', 'Blazer', 'The blazer is a tailored jacket with middle-of-the-road formality. Often they’re made of heavier fabrics like worsted wool, flannel or fresco. '),
('C03', 'Croptop', 'Crop tops are a type of shirt that is cropped, or shortened, to reveal the midriff. '),
('C04', 'Dresses', 'Dresses and gowns are essentially the same. Dresses are usually called gowns when they are full-length, formal styles. Dresses are made with a bodice that covers the torso and a skirt that extends down to hang over the legs of the wearer.'),
('C05', 'Outerwear', 'As the name suggests, outerwear is clothing that is designed to be worn outside or over regular garments. The best part about outerwear is that it can not only keep you cozy during winter but will add an extra layer to your ensemble.'),
('C06', 'Long Tee', 'Long tee are a type of shirt that is cropped, or shortened, to reveal the midriff. Generally classified as casual wear, crop tops are short sleeved or sleeveless tops that only cover half the torso, revealing the stomach.'),
('C07', 'Jacket', 'Crop tops are a type of shirt that is cropped, or shortened, to reveal the midriff. Generally classified as casual wear, crop tops are short sleeved or sleeveless tops that only cover half the torso, revealing the stomach.');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `delivery_local` varchar(255) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `total` decimal(8,0) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `delivery_date`, `delivery_local`, `cust_name`, `cust_phone`, `total`, `status`, `username`) VALUES
(25, '2022-12-18 05:30:48', '2022-12-18 05:30:48', 'Cantho', 'Nguyen Que Tran', '0843630939', '37', 1, 'tran0903'),
(26, '2022-12-18 05:31:58', '2022-12-18 05:31:58', 'Cantho', 'Nguyen Que Tran', '0843630939', '209', 1, 'tran0903'),
(27, '2022-12-20 03:24:40', '2022-12-20 03:24:40', 'Cantho', 'Nguyen Que Tran', '0843630939', '177', 1, 'tran0903'),
(28, '2022-12-21 14:11:55', '2022-12-21 14:11:55', 'Cantho', 'Nguyen Que Tran', '0843630939', '402', 1, 'tran0903'),
(29, '2022-12-23 12:57:56', '2022-12-23 12:57:56', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '69', 1, 'tran@0903'),
(30, '2022-12-23 13:01:57', '2022-12-23 13:01:57', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '69', 1, 'tran@0903'),
(31, '2022-12-23 13:05:37', '2022-12-23 13:05:37', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '69', 0, 'tran@0903'),
(32, '2022-12-23 13:06:18', '2022-12-23 13:06:18', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '91', 0, 'tran@0903'),
(33, '2022-12-23 13:08:57', '2022-12-23 13:08:57', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '168', 0, 'tran@0903'),
(34, '2022-12-23 13:11:33', '2022-12-23 13:11:33', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '150', 0, 'tran@0903'),
(35, '2022-12-23 13:11:58', '2022-12-23 13:11:58', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '48', 0, 'tran@0903'),
(36, '2022-12-23 13:18:07', '2022-12-23 13:18:07', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '48', 0, 'tran@0903'),
(37, '2022-12-23 13:18:19', '2022-12-23 13:18:19', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '70', 0, 'tran@0903'),
(38, '2022-12-23 13:18:49', '2022-12-23 13:18:49', '30/4 Street, An Khanh, Can Tho', 'Que Tran Nguyen', '0916843367', '78', 0, 'tran@0903');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `pro_id`, `quantity`) VALUES
(25, 'P03', 1),
(26, 'P02', 2),
(26, 'P03', 1),
(27, 'P02', 1),
(27, 'P04', 2),
(28, 'P02', 2),
(28, 'P03', 1),
(28, 'P09', 2),
(29, 'P03', 2),
(30, 'P03', 2),
(31, 'P03', 2),
(32, 'P02', 1),
(33, 'P03', 1),
(33, 'P07', 4),
(34, 'P06', 2),
(35, 'P04', 1),
(37, 'P08', 1),
(38, 'P06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `for_gender` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cate_id` varchar(10) NOT NULL,
  `sup_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `status`, `description`, `price`, `for_gender`, `quantity`, `image`, `cate_id`, `sup_id`) VALUES
('P01', 'Varsity for winter', 0, 'Varsity All-Star Winter Virtual Competition Series is unique in the way that it allows your athletes to continue their season from the comfort of your gym all while still getting the chance to earn bids to the End-Of-Season Championship events! ', 23, 1, 20, 'Cropped_Jacket.png', 'C01', 'SP01'),
('P02', 'Leo Cutout Wool Blazer Blue', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 86, 1, 1, 'Leo_Cutout_Wool_Blazer_Blue_1.png', 'C02', 'SP01'),
('P03', 'Pleated Short Skirt', 0, 'A mini white fairy dress is perfect for Jose girls who love the glamorous and dreamy look.\r\nThe design is made up of petal cuts and ruffled lace treatment to create a princess float in every movement.', 32, 1, 5, 'Pleated_Short_Skirt_1.png', 'C01', 'SP02'),
('P04', 'Leo Cutout Wool Blazer Brown', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 43, 1, -3, 'Leo_Cutout_Wool_Blazer_Brown_2.png', 'C02', 'SP02'),
('P05', 'Camellia Floral Minidress', 0, 'More than just an office Dress, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 52, 1, 0, 'Camellia_Floral_Minidress_3.png', 'C04', 'SP04'),
('P06', 'Storm Bomber Surplus', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 72.6, 0, -3, 'Storm_Bomber_Surplus_3.png', 'C05', 'SP02'),
('P07', 'Storm Bomber Black', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 32.8, 0, -4, 'Storm_Bomber_Black_2.png', 'C05', 'SP03'),
('P08', 'Knit Crop Tee ArmyGreen', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 65.08, 1, -1, 'Knit_Crop_Tee_ArmyGreen_1.png', 'C03', 'SP02'),
('P09', 'Herdsman Turtleneck', 0, 'More than just an office Blazer, Leo creates a highlight for Dear José girls with a cut out at the waist to diversify in many outfits.', 96.63, 0, -2, 'Herdsman_Turtleneck_4.png', 'C06', 'SP02'),
('P10', 'Vintage Tee Natural', 0, 'Soft premium cotton for added comfort\r\nDouble needle stitching in bottom hem for extra durability\r\nClassic cut for roomier fit\r\nSeamless double needle collar to lay flat on your neck', 20, 0, 9, 'Vintage_Tee_Natural_2.png', 'C06', 'SP04'),
('P11', 'Wool CPO Jacket Khaki', 0, 'A jacket typically has sleeves, and fastens in the front or slightly on the side. A jacket is generally lighter, tighter-fitting, and less insulating than a coat, which is outerwear.', 98, 0, 4, 'Wool_CPO_Jacket_Khaki_Men_1.png', 'C07', 'SP03'),
('P12', 'Off the shoulder short dress', 0, 'Gentle and elegant with off-the-shoulder dresses, Dear José\'s girls seem to be transformed into beautiful and seductive muses, with just one turn, you can conquer the opposite person.', 84, 1, 45, 'Off-the-shoulder-short-dress.png', 'C04', 'SP01');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `address`) VALUES
('SP01', 'Dear Róe', '0843630939', 'VietNam'),
('SP02', 'Chanel', '0978253689', 'America'),
('SP03', 'Mende', '0987846253', 'VietNam'),
('SP04', 'Balenciaga', '0916843367', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `firstName`, `lastName`, `gender`, `birthday`, `telephone`, `email`, `address`, `role`) VALUES
('admin', 'admin123', 'admin', 'admin', 0, '2012-11-15', '0123456789', 'admin@gmail.com', 'CanTho', 1),
('tran0903', '12345', 'Nguyen', 'Que Tran', 1, '2022-01-12', '0843630939', 'trannqgcc210042@gmail.com', 'Cantho', 0),
('tran@0903', '12345', 'Que Tran', 'Nguyen', 1, '2003-09-03', '0916843367', 'trannqgcc200030@fpt.edu.vn', '30/4 Street, An Khanh, Can Tho', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`pro_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
