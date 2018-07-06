-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 11:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecommerceusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`) VALUES
(1, 'Apple', 'NA'),
(2, 'Asuse', 'NA'),
(3, 'No Brand', 'NA'),
(4, 'Samsung', 'NA'),
(5, 'Dell', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`, `CategoryId`, `Description`) VALUES
(1, 'Electronics', 0, 'NA'),
(2, 'Cosmetics', 0, 'NA'),
(3, 'Home Applience', 0, 'NA'),
(4, 'Medicine', 0, 'NA'),
(5, 'Computer', 1, 'NA'),
(6, 'TV, Freeze', 1, 'NA'),
(7, 'Laptop', 5, 'NA'),
(8, 'Destop', 5, 'NA'),
(11, 'Headphone & Wireless Speaker', 1, 'NA'),
(10, 'Beauty Shop', 2, 'NA'),
(12, 'Cell Phone & Accessorics', 1, 'NA'),
(13, 'Car Electronics', 1, 'NA'),
(14, 'Powerbank', 1, 'NA'),
(15, 'Salon & Spa', 2, 'NA'),
(16, 'Video Games', 1, 'NA'),
(17, 'Wearable Technology', 1, 'NA'),
(18, 'Computer Parts & Component', 1, 'NA'),
(19, 'Baby & Child Care', 10, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `CountryId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`Id`, `Name`, `CountryId`) VALUES
(1, 'Dhaka', 1),
(2, 'madrid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Id`, `Name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(3, 'Pakista');

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

CREATE TABLE `mylist` (
  `id` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Charge` float DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`Id`, `Name`, `Charge`, `Description`) VALUES
(1, 'BKASH', NULL, '20 Percent Flat'),
(2, 'DBBL Rocket', 10, '10% Flat'),
(3, 'Credit Card', 150, 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Code` varchar(10) DEFAULT NULL,
  `tags` varchar(200) NOT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `UnitId` int(11) DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `BrandId` int(11) DEFAULT NULL,
  `CreatDate` date DEFAULT NULL,
  `LastUpdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Name`, `Code`, `tags`, `Description`, `Price`, `Discount`, `UnitId`, `CategoryId`, `BrandId`, `CreatDate`, `LastUpdate`) VALUES
(1, 'Mercury', '6557567', '', 'NA', 25, 0, 1, 1, 1, '2017-10-30', '2017-10-30'),
(2, 'Acer S3', 's30008', '', 'nai ba dilam', 86000, 10, 2, 7, 2, '2017-10-30', '2017-10-30'),
(3, 'Samsung', '62452', '', 'na', 73632, 0, 2, 7, 2, '2017-10-30', '2017-10-30'),
(4, 'Jata', '8732482', '', 'na', 454, 0, 2, 1, 2, '2017-10-30', '2017-10-30'),
(5, 'Hawai', '3865', '', 'Na', 50000, 0, 2, 7, 1, '2017-10-30', '2017-10-30'),
(6, 'Magic Mouse 2', 'mm2aple', 'apple, magic, mouse, toouch', 'NA', 9900, 10, 2, 5, 1, NULL, NULL),
(7, 'mp3 player', '62452', 'music', 'very bad product', 1, 50, 4, 1, 2, NULL, NULL),
(8, 'Apple', '6557567', 'apple prod.', 'this is good product', 800000, 5, 2, 1, 1, NULL, NULL),
(9, 'light bulb', '8732482', 'bulb', 'light not good', 100, 0, 2, 1, 3, NULL, NULL),
(10, 't-shirt', '56666', 'clothes', 'wear it first', 700, 0, 3, 10, 3, NULL, NULL),
(11, 'biscuit', '34444', 'biscuits', 'no comment', 25, 0, 3, 3, 3, NULL, NULL),
(12, 'rice', '51999', 'rice', 'take it as much as u want', 2000, 10, 4, 3, 3, NULL, NULL),
(14, 'green chili', '72974', 'green chili', 'have fun', 200, 0, 1, 3, 3, NULL, NULL),
(15, 'bottle', '555554', 'bottle', 'bottle', 100, 0, 2, 3, 3, NULL, NULL),
(16, 'jug', '8732482', 'jug', 'jug', 200, 5, 2, 3, 3, NULL, NULL),
(17, 'tablet', '3865', 'tablet', 'tablet', 2000, 10, 3, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcomment`
--

CREATE TABLE `productcomment` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `DateTime` date DEFAULT NULL,
  `Comments` varchar(2000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `productId`, `dateTime`, `image`, `title`) VALUES
(2, 6, '2017-11-22 00:00:00', 'mm2.jpg', 'Magic mouse'),
(3, 2, '2017-11-22 00:00:00', '477648-acer-aspire-e5-573g-57hr.jpg', 'Acer'),
(4, 3, '2017-11-22 00:00:00', 'galaxynote8.jpg', 'Galaxy note 8'),
(5, 7, '2017-11-27 00:00:00', 'tSh.jpg', 'mp3'),
(6, 8, '2017-11-27 00:00:00', 'th.jpg', ':D :V'),
(7, 9, '2018-12-28 00:00:00', 'vlight bulb.jpg', 'fuse'),
(9, 10, '2017-10-25 00:00:00', 't-shirt.jpg', 'flexible'),
(10, 11, '2017-11-25 00:00:00', 'biscuits.jpg', 'biscuits'),
(11, 12, '2017-11-23 00:00:00', 'rice.png', 'rice'),
(13, 14, '2017-11-29 00:00:00', 'green chili.jpg', 'green chili'),
(15, 15, '2017-11-27 00:00:00', 'bottle.jpg', 'bottle'),
(17, 16, '2017-10-22 00:00:00', 'jug.png', 'jug'),
(18, 17, '2017-12-30 00:00:00', 'tablet.jpg', 'tablet'),
(19, 17, '2017-11-29 00:00:00', 'images8IU2ODQC.jpg', '11th veto by Russia regarding Syria');

-- --------------------------------------------------------

--
-- Table structure for table `productlike`
--

CREATE TABLE `productlike` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `DateTime` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Id` int(11) NOT NULL,
  `Number` varchar(12) DEFAULT NULL,
  `DateTime` date DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `DeliveryCharge` float DEFAULT NULL,
  `Vat` float DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `PaymentMethodId` int(11) DEFAULT NULL,
  `address` varchar(500) NOT NULL DEFAULT 'na'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Id`, `Number`, `DateTime`, `UserId`, `Total`, `DeliveryCharge`, `Vat`, `Discount`, `PaymentMethodId`, `address`) VALUES
(1, 'P_NV_0789', '2017-11-25', 1, 12000, 0, 2, 5, 1, 'na'),
(2, 'P_NV_07892', '2017-12-06', 1, 12725.5, 120, 2.56, 10, 2, 'NAOA, voter goli, gabtoli'),
(3, 'P_NV_07893', '2017-12-06', 1, 12725.5, 120, 2.56, 10, 3, 'NAOA'),
(4, 'P_NV_07894', '2017-12-06', 1, 12725.5, 120, 2.56, 5, 1, 'NAOA'),
(5, 'P_NV_07895', '2017-12-09', 1, 90425, 300, 2, 2, 1, 'NAOA, Alphabet'),
(6, 'P_NV_07896', '2017-12-09', 1, 10735.5, 300, 2, 2, 1, 'NAOA'),
(7, 'P_NV_07897', '2017-12-09', 1, 770736, 120, 2, 2, 3, 'NAOA'),
(8, 'P_NV_07898', '2017-12-09', 1, 58935, 120, 2, 2, 1, 'NAOA'),
(9, 'P_NV_07898', '2017-12-09', 1, 58935, 120, 2, 2, 1, 'NAOA'),
(10, 'P_NV_0656', '2017-12-09', 1, 8910, 120, 2, 2, 1, 'NAOA');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
  `Id` int(11) NOT NULL,
  `PurchaseId` int(11) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Rate` float DEFAULT NULL,
  `Qty` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasedetails`
--

INSERT INTO `purchasedetails` (`Id`, `PurchaseId`, `ProductId`, `Rate`, `Qty`) VALUES
(1, 1, 1, 35, 20),
(2, 1, 5, 22000, 1),
(3, 1, 4, 3500, 2),
(4, 7, 6, 9900, 1),
(5, 7, 8, 800000, 1),
(6, 7, 11, 25, 1),
(7, 7, 12, 2000, 1),
(8, 7, 7, 1, 1),
(9, 8, 1, 25, 1),
(10, 8, 5, 50000, 1),
(11, 8, 6, 9900, 1),
(12, 10, 6, 9900, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchasestatus`
--

CREATE TABLE `purchasestatus` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `StatusId` int(11) DEFAULT NULL,
  `PurchaseID` int(11) DEFAULT NULL,
  `DateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasestatus`
--

INSERT INTO `purchasestatus` (`Id`, `UserId`, `StatusId`, `PurchaseID`, `DateTime`) VALUES
(1, 1, 1, 1, '2017-11-25 16:26:57'),
(2, 1, 2, 1, '2017-11-25 16:32:05'),
(3, 1, 1, 10, '2017-12-09 16:33:06'),
(4, 1, 2, 10, '2017-12-09 16:33:22'),
(5, 1, 3, 10, '2017-12-09 16:33:32'),
(6, 1, 4, 10, '2017-12-09 16:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Id`, `Name`, `Description`, `level`) VALUES
(1, 'Just Ordered', 'New Order', 1),
(2, 'Confirmed', 'NA', 2),
(3, 'In Progress', 'NA', 4),
(4, 'Delivered', 'NA', 5),
(5, 'Received', 'NA', 7),
(6, 'Returned', 'NA', 8),
(7, 'Rejected', 'NA', 6),
(8, 'Cancelled', 'NA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `primaryQuantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`Id`, `Name`, `Description`, `primaryQuantity`) VALUES
(1, 'KG', 'Kilo Gram', 0),
(2, 'PCS', '1 Piece', 0),
(3, 'Box', 'One Box', 0),
(4, 'Bosta', 'ek bosta chal', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Contact` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `CityId` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'U'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Contact`, `Email`, `Password`, `Gender`, `DateOfBirth`, `Address`, `CityId`, `type`) VALUES
(1, 'Mr Admin Ali', '0171420420', 'admin@system.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 'male', '1980-06-10', 'NAOA', 1, 'A'),
(2, 'Emtiaz Bod', '01717420420', 'imtiaz@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 'Male', '1999-12-21', 'Agarga Bosti', 1, 'U'),
(3, 'Akikul Islam', '016755576576', 'akikul@yahoo.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 'Male', '2017-11-20', 'Taltola Market tin shed', 1, 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CategoryId` (`CategoryId`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CountryId` (`CountryId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `mylist`
--
ALTER TABLE `mylist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UnitId` (`UnitId`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `BrandId` (`BrandId`);

--
-- Indexes for table `productcomment`
--
ALTER TABLE `productcomment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `productlike`
--
ALTER TABLE `productlike`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `PaymentMethodId` (`PaymentMethodId`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PurchaseId` (`PurchaseId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `purchasestatus`
--
ALTER TABLE `purchasestatus`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `StatusId` (`StatusId`),
  ADD KEY `PurchaseID` (`PurchaseID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CityId` (`CityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mylist`
--
ALTER TABLE `mylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `productcomment`
--
ALTER TABLE `productcomment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `productlike`
--
ALTER TABLE `productlike`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `purchasestatus`
--
ALTER TABLE `purchasestatus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
