-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 01:17 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shoptility`
--

-- --------------------------------------------------------

--
-- Table structure for table `category1`
--

CREATE TABLE IF NOT EXISTS `category1` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id',
  `name` varchar(128) NOT NULL COMMENT 'name of the top level category',
  `price` decimal(10,2) NOT NULL COMMENT 'price of the category and sub categories',
  `active` bit(1) NOT NULL COMMENT 'is the category active or not',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores all the top level categories' AUTO_INCREMENT=32 ;

--
-- Dumping data for table `category1`
--

INSERT INTO `category1` (`id`, `name`, `price`, `active`) VALUES
(2, 'Apparel & Accessoriess', '11.55', b'1'),
(3, 'Arts & Entertainment', '10.00', b'0'),
(4, 'Baby', '3.00', b'1'),
(5, 'Business & Industrial', '10.00', b'1'),
(6, 'Cameras & Optics', '10.00', b'1'),
(7, 'Electronics', '10.00', b'1'),
(8, 'Food, Beverages & Tobacco', '10.00', b'1'),
(9, 'Furniture', '10.00', b'1'),
(10, 'Hardware', '10.00', b'1'),
(11, 'Health & Beauty', '10.00', b'1'),
(12, 'Home & Garden', '10.00', b'1'),
(13, 'Luggage & Bags', '10.00', b'1'),
(14, 'Mature', '10.00', b'1'),
(15, 'Media', '10.00', b'1'),
(16, 'Office Supplies', '10.00', b'1'),
(17, 'Religious & Ceremonial', '10.00', b'1'),
(18, 'Software', '10.00', b'1'),
(19, 'Sporting Goods', '10.00', b'1'),
(20, 'Toys & Games', '10.00', b'1'),
(21, 'Vehicles & Parts', '3.00', b'1'),
(28, 'Animals & Pet Supplies', '22.10', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `category2`
--

CREATE TABLE IF NOT EXISTS `category2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL COMMENT 'name of the top level category',
  `category1_id` int(11) DEFAULT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category1_id` (`category1_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores all the top level categories' AUTO_INCREMENT=205 ;

--
-- Dumping data for table `category2`
--

INSERT INTO `category2` (`id`, `name`, `category1_id`, `active`) VALUES
(1, 'Live Animals', 28, b'1'),
(3, 'Clothing', 2, b'1'),
(4, 'Clothing Accessories', 2, b'1'),
(5, 'Costumes & Accessories', 2, b'1'),
(6, 'Handbag & Wallet Accessories', 2, b'1'),
(7, 'Handbags, Wallets & Cases', 2, b'1'),
(8, 'Jewelry', 2, b'1'),
(9, 'Shoe Accessories', 2, b'1'),
(10, 'Shoes', 2, b'1'),
(11, 'Hobbies & Creative Arts', 3, b'0'),
(12, 'Party & Celebration', 3, b'0'),
(13, 'Baby & Toddler Gift Sets', 4, b'0'),
(14, 'Baby Bathing', 4, b'0'),
(15, 'Baby Health', 4, b'0'),
(16, 'Baby Safety', 4, b'0'),
(17, 'Baby Toys', 4, b'1'),
(18, 'Baby Transport', 4, b'0'),
(19, 'Baby Transport Accessories', 4, b'1'),
(20, 'Diapering', 4, b'0'),
(21, 'Nursing & Feeding', 4, b'0'),
(22, 'Potty Training', 4, b'0'),
(23, 'Swaddling Blankets', 4, b'0'),
(24, 'Advertising & Marketing', 5, b'0'),
(25, 'Agriculture', 5, b'0'),
(26, 'Construction', 5, b'0'),
(27, 'Dentistry', 5, b'0'),
(28, 'Film & Television', 5, b'0'),
(29, 'Finance & Insurance', 5, b'0'),
(30, 'Food Service', 5, b'0'),
(31, 'Forestry & Logging', 5, b'0'),
(32, 'Hairdressing & Cosmetology', 5, b'0'),
(33, 'Heavy Machinery', 5, b'0'),
(34, 'Hotel & Hospitality', 5, b'0'),
(35, 'Industrial Storage', 5, b'0'),
(36, 'Industrial Storage Accessories', 5, b'0'),
(37, 'Law Enforcement', 5, b'0'),
(38, 'Manufacturing', 5, b'0'),
(39, 'Material Handling', 5, b'0'),
(40, 'Medical', 5, b'0'),
(41, 'Mining & Quarrying', 5, b'0'),
(42, 'Piercing & Tattooing', 5, b'0'),
(43, 'Retail', 5, b'0'),
(44, 'Science & Laboratory', 5, b'0'),
(45, 'Signage', 5, b'0'),
(46, 'Work Safety Protective Gear', 5, b'0'),
(47, 'Camera & Optic Accessories', 6, b'0'),
(48, 'Cameras', 6, b'0'),
(49, 'Optics', 6, b'0'),
(50, 'Photography', 6, b'0'),
(52, 'Arcade Equipment', 7, b'0'),
(53, 'Audio', 7, b'0'),
(54, 'Circuit Components', 7, b'0'),
(55, 'Communications', 7, b'0'),
(56, 'Components', 7, b'0'),
(57, 'Computers', 7, b'0'),
(58, 'Electrical Motors', 7, b'0'),
(59, 'Electronics Accessories', 7, b'0'),
(60, 'GPS', 7, b'0'),
(61, 'GPS Accessories', 7, b'0'),
(62, 'GPS Trackers', 7, b'0'),
(63, 'Marine Electronics', 7, b'0'),
(64, 'Networking', 7, b'0'),
(65, 'Plug & Play TV Games', 7, b'0'),
(66, 'Print, Copy, Scan & Fax', 7, b'0'),
(67, 'Print, Copy, Scan & Fax Accessories', 7, b'0'),
(68, 'Toll Collection Devices', 7, b'0'),
(69, 'Video', 7, b'0'),
(70, 'Video Game Console Accessories', 7, b'0'),
(71, 'Video Game Consoles', 7, b'0'),
(72, 'Beverages', 8, b'0'),
(73, 'Food Items', 8, b'0'),
(74, 'Tobacco Products', 8, b'0'),
(75, 'Baby & Toddler Furniture', 9, b'0'),
(76, 'Beds & Accessories', 9, b'0'),
(77, 'Benches', 9, b'0'),
(78, 'Cabinets & Storage', 9, b'0'),
(79, 'Carts & Islands', 9, b'0'),
(80, 'Chair Accessories', 9, b'0'),
(81, 'Chairs', 9, b'0'),
(82, 'Entertainment Centers & TV Stands', 9, b'0'),
(83, 'Furniture Sets', 9, b'0'),
(84, 'Futon Frames', 9, b'0'),
(85, 'Futon Pads', 9, b'0'),
(86, 'Futons', 9, b'0'),
(87, 'Office Furniture', 9, b'0'),
(88, 'Ottomans', 9, b'0'),
(89, 'Outdoor Furniture', 9, b'0'),
(90, 'Outdoor Furniture Accessories', 9, b'0'),
(91, 'Room Divider Accessories', 9, b'0'),
(92, 'Room Dividers', 9, b'0'),
(93, 'Shelving', 9, b'0'),
(94, 'Shelving Accessories', 9, b'0'),
(95, 'Sofa Accessories', 9, b'0'),
(96, 'Sofas', 9, b'0'),
(97, 'Table Accessories', 9, b'0'),
(98, 'Tables', 9, b'0'),
(99, 'Adhesives, Coatings & Sealants', 10, b'0'),
(100, 'Building Materials', 10, b'0'),
(101, 'Cabinetry', 10, b'0'),
(102, 'Chemicals', 10, b'0'),
(103, 'Electrical Supplies', 10, b'0'),
(104, 'Generators', 10, b'0'),
(105, 'Hardware Accessories', 10, b'0'),
(106, 'Hardware Torches', 10, b'0'),
(107, 'Home Fencing', 10, b'0'),
(108, 'Insulation', 10, b'0'),
(109, 'Key Blanks', 10, b'0'),
(110, 'Locks & Locksmithing', 10, b'0'),
(111, 'Painting & Wall Covering Supplies', 10, b'0'),
(112, 'Plumbing', 10, b'0'),
(113, 'Renewable Energy', 10, b'0'),
(114, 'Roofing', 10, b'0'),
(115, 'Shop Stools', 10, b'0'),
(116, 'Storage Tanks', 10, b'0'),
(117, 'Tool Accessories', 10, b'0'),
(118, 'Tools', 10, b'0'),
(119, 'Health Care', 11, b'0'),
(120, 'Jewelry Cleaning & Care', 11, b'0'),
(121, 'Personal Care', 11, b'0'),
(122, 'Bathroom Accessories', 12, b'0'),
(123, 'Decor', 12, b'0'),
(124, 'Emergency Preparedness', 12, b'0'),
(125, 'Fire & Gas Safety', 12, b'0'),
(126, 'Fireplace & Wood Stove Accessories', 12, b'0'),
(127, 'Fireplaces', 12, b'0'),
(128, 'Home Security', 12, b'0'),
(129, 'Household Appliance Accessories', 12, b'0'),
(130, 'Household Appliances', 12, b'0'),
(131, 'Household Supplies', 12, b'0'),
(132, 'Kitchen & Dining', 12, b'0'),
(133, 'Lawn & Garden', 12, b'0'),
(134, 'Lighting', 12, b'0'),
(135, 'Lighting Accessories', 12, b'0'),
(136, 'Linens & Bedding', 12, b'0'),
(137, 'Parasols & Rain Umbrellas', 12, b'0'),
(138, 'Plants', 12, b'0'),
(139, 'Pool & Spa', 12, b'0'),
(140, 'Smoking Accessories', 12, b'0'),
(141, 'Umbrella Sleeves & Cases', 12, b'0'),
(142, 'Wood Stoves', 12, b'0'),
(143, 'Backpack Accessories', 13, b'0'),
(144, 'Backpacks', 13, b'0'),
(145, 'Business Bags', 13, b'0'),
(146, 'Cosmetic & Toiletry Bags', 13, b'0'),
(147, 'Diaper Bags', 13, b'0'),
(148, 'Duffel Bags', 13, b'0'),
(149, 'Fanny Packs', 13, b'0'),
(150, 'Luggage Accessories', 13, b'0'),
(151, 'Messenger Bags', 13, b'0'),
(152, 'Shopping Totes', 13, b'0'),
(153, 'Suitcases', 13, b'0'),
(154, 'Train Cases', 13, b'0'),
(155, 'Erotic', 14, b'0'),
(156, 'Weapons', 14, b'0'),
(157, 'Books', 15, b'0'),
(158, 'DVDs & Videos', 15, b'0'),
(159, 'Magazines & Newspapers', 15, b'0'),
(160, 'Music', 15, b'0'),
(161, 'Product Manuals', 15, b'0'),
(162, 'Sheet Music', 15, b'0'),
(163, 'Book Accessories', 16, b'0'),
(164, 'Filing & Organization', 16, b'0'),
(165, 'General Supplies', 16, b'0'),
(166, 'Impulse Sealers', 16, b'0'),
(167, 'Name Plates', 16, b'0'),
(168, 'Office & Chair Mats', 16, b'0'),
(169, 'Office Carts', 16, b'0'),
(170, 'Office Equipment', 16, b'0'),
(171, 'Office Instruments', 16, b'0'),
(172, 'Paper Handling', 16, b'0'),
(173, 'Presentation Supplies', 16, b'0'),
(174, 'Shipping Supplies', 16, b'0'),
(175, 'Memorial Ceremony Supplies', 17, b'0'),
(176, 'Religious Items', 17, b'0'),
(177, 'Wedding Ceremony Supplies', 17, b'0'),
(178, 'Computer Software', 18, b'0'),
(179, 'Digital Goods & Currency', 18, b'0'),
(180, 'Video Game Software', 18, b'0'),
(181, 'Air Sports', 19, b'0'),
(182, 'Combat Sports', 19, b'0'),
(183, 'Dancing', 19, b'0'),
(184, 'Exercise & Fitness', 19, b'0'),
(185, 'Gymnastics', 19, b'0'),
(186, 'Indoor Games', 19, b'0'),
(187, 'Jumping', 19, b'0'),
(188, 'Outdoor Recreation', 19, b'0'),
(189, 'Racquet Sports', 19, b'0'),
(190, 'Team Sports', 19, b'0'),
(191, 'Water Sports', 19, b'0'),
(192, 'Winter Sports', 19, b'0'),
(193, 'Game Timers', 20, b'0'),
(194, 'Games', 20, b'0'),
(195, 'Outdoor Play Equipment', 20, b'0'),
(196, 'Puzzles', 20, b'0'),
(197, 'Toys', 20, b'0'),
(198, 'Vehicle Parts & Accessories', 21, b'0'),
(199, 'Pet Supplies2', 28, b'1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category2`
--
ALTER TABLE `category2`
  ADD CONSTRAINT `category2_ibfk_2` FOREIGN KEY (`category1_id`) REFERENCES `category1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
