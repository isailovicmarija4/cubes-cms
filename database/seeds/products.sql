-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2018 at 11:10 AM
-- Server version: 10.1.25-MariaDB-1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cubesphp`
--

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `title`, `website_url`) VALUES
(1, 'Apple', ''),
(2, 'Beko', ''),
(3, 'Bosh', ''),
(4, 'Gorenje', ''),
(5, 'HTC', ''),
(6, 'Huawei', ''),
(7, 'LG', ''),
(8, 'Samsung', ''),
(9, 'Sony', ''),
(16, 'Siemens', ''),
(17, 'Vivax', '');

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `description`, `product_group_id`) VALUES
(1, 'Mobilni Telefon', '', 1),
(2, 'Televizor', '', 2),
(3, 'Frizider', '', 2),
(4, 'Ves Masina', '', 2),
(5, 'Sporet', '', 2),
(6, 'Fen za kosu', '', 2),
(7, 'Laptop', '', 3),
(8, 'Sporet', '', 2);

--
-- Dumping data for table `product_groups`
--

INSERT INTO `product_groups` (`id`, `title`) VALUES
(1, 'Mobilni Uredjaji'),
(2, 'Bela Tehnika'),
(3, 'Racunari');

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_brand_id`, `title`, `photo_filename`, `description`, `specification`, `price`, `quantity`, `product_category_id`, `on_sale`, `discount`, `created_at`) VALUES
(7, 1, 'Apple iPhone7 32GB', NULL, 'Mobilni Telefon Apple iPhone7 32GB', '', '98546.21', 23, 1, 0, '0.00', '2016-06-12 12:53:00'),
(8, 1, 'Apple iPhone7 64GB', '8_enkel-home-colours.png', 'Mobilni Telefon Apple iPhone7 64GB', '', '112345.12', 2, 1, 1, '0.00', '2016-12-13 13:53:00'),
(9, 1, 'Apple iPhone7 32GB Gold', NULL, 'Mobilni Telefon Apple iPhone7 32GB Gold', '', '101234.23', 1, 1, 0, '0.00', '2016-03-14 14:53:00'),
(10, 1, 'Apple iPhone8 32GB', NULL, 'Mobilni Telefon Apple iPhone8 32GB', '', '127880.39', 12, 1, 1, '15.00', '2017-04-15 15:53:00'),
(11, 1, 'Apple iPhone8 64GB', NULL, 'Mobilni Telefon Apple iPhone8 64GB', '', '151339.32', 2, 1, 0, '0.00', '2017-06-16 16:53:00'),
(12, 1, 'Apple iPhone8 32GB Gold', NULL, 'Mobilni Telefon Apple iPhone8 32GB Gold', '', '161323.37', 0, 1, 0, '0.00', '2017-08-17 17:53:00'),
(13, 8, 'Samsung Galaxy S8', NULL, 'Mobilni Telefon Samsung Galaxy S8', '', '99876.34', 12, 1, 0, '0.00', '2017-06-18 18:53:00'),
(14, 8, 'Samsung Galaxy S7', NULL, 'Mobilni Telefon Samsung Galaxy S7', '', '69887.34', 3, 1, 0, '0.00', '2016-07-19 14:53:00'),
(15, 8, 'Samsung Galaxy S6', NULL, 'Mobilni Telefon Samsung Galaxy S6', '', '55763.34', 3, 1, 0, '0.00', '2015-02-20 11:53:00'),
(16, 6, 'Huawei P10', NULL, 'Mobilni Telefon Huawei P10', '', '67898.77', 6, 1, 0, '0.00', '2016-11-21 12:53:00'),
(17, 6, 'Huawei P9', NULL, 'Mobilni Telefon Huawei P9', '', '65632.33', 12, 1, 0, '0.00', '2015-03-22 12:53:00'),
(18, 5, 'HTC Desire 820', NULL, 'Mobilni Telefon HTC Desire 820', '', '32456.76', 3, 1, 0, '0.00', '2014-08-23 12:53:00'),
(19, 5, 'HTC One A9', NULL, 'Mobilni Telefon HTC One A9', '', '38271.12', 11, 1, 1, '20.00', '2016-05-24 12:53:00'),
(20, 5, 'HTC U12', NULL, 'Mobilni Telefon HTC U12', '', '55736.43', 7, 1, 0, '0.00', '2017-06-25 12:53:00'),
(21, 8, 'Samsung UE-32J4000AWXXH', NULL, 'Televizor Samsung UE-32J4000AWXXH', '', '32985.76', 0, 2, 0, '0.00', '2015-12-26 12:53:00'),
(22, 8, 'Samsung UE-32K4102AKXXH', NULL, 'Televizor Samsung UE-32K4102AKXXH', '', '34323.32', 5, 2, 0, '0.00', '2016-11-27 12:53:00'),
(23, 8, 'Samsung', NULL, 'Televizor Samsung', '', '11212.12', 0, 2, 0, '0.00', '2017-09-28 12:53:00'),
(24, 7, 'LG 32LH510B', NULL, 'Televizor LG 32LH510B', '', '14544.32', 6, 2, 0, '0.00', '2017-01-29 12:53:00'),
(25, 7, 'LG 32LH510U', NULL, 'Televizor LG 32LH510U', '', '12345.54', 8, 2, 0, '0.00', '2016-08-30 12:53:00'),
(26, 9, 'Sony KD 65XE9005BAEP', NULL, 'Televizor Sony KD 65XE9005BAEP', '', '89189.33', 12, 2, 1, '10.00', '2015-07-01 12:53:00'),
(27, 9, 'Sony LED LCD KDL 50W755CBAEP', NULL, 'Televizor Sony LED LCD KDL 50W755CBAEP', '', '72098.23', 2, 2, 0, '0.00', '2014-10-02 12:53:00'),
(28, 9, 'Sony 40WD650BAEP', '28_enkel-project-grey.png', 'Televizor Sony 40WD650BAEP', '', '56765.32', 12, 2, 0, '0.00', '2013-10-03 12:53:00'),
(29, 9, 'Sony TV KDL32WE615BAEP', NULL, 'Televizor Sony TV KDL32WE615BAEP', '', '32345.56', 4, 2, 0, '0.00', '2015-04-04 12:53:00'),
(30, 2, 'Beko RCS A300K 20W', NULL, 'Frizider Beko RCS A300K 20W', '', '29199.99', 2, 3, 1, '5.00', '2013-07-05 12:53:00'),
(31, 2, 'Beko DSA 28020', NULL, 'Frizider Beko DSA 28020', '', '27654.23', 1, 3, 0, '0.00', '2017-08-06 12:53:00'),
(33, 4, 'Gorenje RF 4120 AW', NULL, 'Frizider Gorenje RF 4120 AW', '', '21987.72', 3, 3, 0, '0.00', '2012-03-08 12:53:00'),
(34, 3, 'Bosh KGN 36NL30', NULL, 'Frizider Bosh KGN 36NL30', '', '54320.43', 1, 3, 0, '0.00', '2013-07-09 12:53:00'),
(39, 1, 'iPhone6 S', NULL, 'iPhone6 S', '', '39999.99', 12, 1, 0, '0.00', '2016-03-21 18:00:00'),
(40, 1, 'iPhone6 SE', NULL, 'iPhone6 SE', '', '37999.99', 11, 1, 0, '0.00', '2016-03-21 18:00:00'),
(41, 1, 'iPhone5', NULL, 'iPhone5', '', '32999.99', 10, 1, 0, '0.00', '2016-03-21 18:00:00'),
(43, NULL, 'Televizor 8X56P', NULL, 'Televizor 8X56P', NULL, '11800.00', 36, 2, 0, '0.00', '2017-10-28 13:21:00'),
(44, 1, 'iPod Nano', NULL, 'iPod Nano', NULL, '9800.00', 3, NULL, 0, '0.00', '2017-10-28 13:21:00'),
(45, 2, 'Pegla 1200W', NULL, 'Pegla 1200W', NULL, '3200.00', 1, 99, 0, '0.00', '2017-10-28 13:21:00'),
(46, 3, 'Test sportet', '46_enkel-home-red.png', 'sdadas', 'dasdasds', '121992.00', 0, 5, 0, '0.00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
