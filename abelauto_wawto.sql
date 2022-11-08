-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2022 at 02:42 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abelauto_wawto`
--
CREATE DATABASE IF NOT EXISTS `abelauto_wawto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `abelauto_wawto`;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `generalsetting_id` tinyint(1) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `type` char(20) COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `page_type` text CHARACTER SET utf16 COLLATE utf16_romanian_ci DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `folder` text CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `html`, `generalsetting_id`, `page_id`, `type`, `page_type`, `is_visible`, `folder`) VALUES
(16, '\n        <div class=\"banner banner2 pl-sm-3 pl-0 pl-xl-0 mb-1\">\n             <img class=\"slide-bg\" src=\"../platform/frontend/assets/images/banners/default/engine.jpg\" alt=\"slider image\" style=\"background-color: #b48476;\">\n             <div class=\"container d-flex align-items-center\">\n                     <div class=\"banner-layer d-flex flex-column\">\n                     \n                    </div>\n                 <!-- End .banner-layer -->\n             </div>\n        </div>\n        <!-- End .home-slide -->\n        ', 1, 0, 'mini', 'home', 1, 'default'),
(17, '\n        <div class=\"banner banner2 pl-sm-3 pl-0 pl-xl-0 mb-1\">\n             <img class=\"slide-bg\" src=\"../platform/frontend/assets/images/banners/default/tires.jpg\" alt=\"slider image\" style=\"background-color: #b48476;\">\n             <div class=\"container d-flex align-items-center\">\n                     <div class=\"banner-layer d-flex flex-column\">\n                     \n                    </div>\n                 <!-- End .banner-layer -->\n             </div>\n        </div>\n        <!-- End .home-slide -->\n        ', 1, 0, 'mini', 'home', 1, 'default'),
(11, '            <div class=\"banner-section banner-bg\" style=\"background-image: url(../platform/frontend/assets/images/banners/default/banner.jpg);\">\r\n            <div class=\"banner col-md-11 m-auto d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between\">\r\n                <div class=\"content-left text-center text-sm-right\">\r\n                   <h3>TEST BANNER MAX</h3>\r\n<p>Maxi banner test pentru pagina home</p>\r\n                </div>\r\n                \r\n            </div>\r\n        </div>\r\n            ', 1, 0, 'maxi', 'home', 1, 'default'),
(12, '            <div class=\"banner-section banner-bg\" style=\"background-image: url(../platform/frontend/assets/images/banners/default/bf.jpg);\">\r\n            <div class=\"banner col-md-11 m-auto d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between\">\r\n                <div class=\"content-left text-center text-sm-right\">\r\n                   <h3>TEST 2 BANNER MAX</h3>\r\n<p>Acest e banner max al doilea sa vedem cum sat</p>\r\n                </div>\r\n                \r\n            </div>\r\n        </div>\r\n            ', 1, 0, 'maxi', 'home', 1, 'default'),
(13, '\n            <div class=\"banner-section banner-bg\" style=\"background-image: url(../platform/frontend/assets/images/banners/default/slider-img-1.jpg);\">\n            <div class=\"banner col-md-11 m-auto d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between\">\n                <div class=\"content-left text-center text-sm-right\">\n                   <h3>TEST 3 BANNER</h3>\r\n<p>Acest banner este trei test de baner maxim.</p>\n                </div>\n                \n            </div>\n        </div>\n            ', 1, 1, 'maxi', 'home', 1, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `blocked_users`
--

DROP TABLE IF EXISTS `blocked_users`;
CREATE TABLE IF NOT EXISTS `blocked_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blocker` int(11) DEFAULT NULL,
  `blocked` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

DROP TABLE IF EXISTS `boxes`;
CREATE TABLE IF NOT EXISTS `boxes` (
  `box_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `generalsetting_id` tinyint(4) NOT NULL,
  `box_type` varchar(100) DEFAULT NULL,
  `page_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`box_id`, `html`, `icon`, `page_id`, `generalsetting_id`, `box_type`, `page_type`) VALUES
(7, '  <div class=\"info-box info-box-icon-left\" style=\"background:none;\">\r\n                                    <i class=\"icon-support mr-3 pr-2\"></i>\r\n\r\n                                    <div class=\"info-box-content\">\r\n                                        <h4>Online Suport Luni/Vineri 09-17</h4>\r\n<p>Supurtul tehnic wawto va sta la dispozitie fie care zi lucratoare in interval 09:00 - 17:00</p>\r\n                                    </div>\r\n                                    <!-- End .info-box-content -->\r\n                                </div>\r\n                                <!-- End .info-box -->', 'icon-shipping', 1, 1, NULL, 'home'),
(5, '\n        <div class=\"info-box info-box-icon-left\" style=\"background:none;\">\n        <i class=\"icon-shipping mr-3 pr-2\"></i>\n\n        <div class=\"info-box-content\">\n            <h4>CURIER DEDICAT DPD</h4>\r\n<p>Avem curier dedicat pe care l cunoastem si pentru care suntem siguri ca livrare va face rapid si de calitate.</p>\n        </div>\n        <!-- End .info-box-content -->\n    </div>\n    <!-- End .info-box -->\n        ', 'icon-shipping', 1, 1, NULL, 'home'),
(6, ' <div class=\"info-box info-box-icon-left\" style=\"background:none;\">\r\n                                    <i class=\"icon-money\"></i>\r\n\r\n                                    <div class=\"info-box-content\">\r\n                                        <h4 class=\"ls-n-15\">Return garantat de Wawto</h4>\r\n<p>Wawto garanteaza retur cu bani platiti daca produsul nu este corespunzator</p>                                   </div>\r\n                                    <!-- End .info-box-content -->\r\n                                </div>\r\n                                <!-- End .info-box -->', 'icon-shipping', 1, 1, NULL, 'home'),
(18, '\n        <div class=\"col-md-4\">\n        <div class=\"feature-box px-sm-5 feature-box-simple text-center\">\n            <div class=\"feature-box-icon\">\n                <i class=\"fa fa-credit-card\"></i>\n            </div>\n            <div class=\"feature-box-content p-0\">\n               <h4 class=\"western\" style=\"font-variant: normal; letter-spacing: normal; font-style: normal; font-weight: normal;\"><span style=\"font-family: Poppins, sans-serif;\">PLATII SECURIZATE</span></h4>\r\n<h5 class=\"western\" style=\"font-variant: normal; letter-spacing: normal; font-style: normal; font-weight: normal; line-height: 120%; orphans: 2; widows: 2; margin-top: 0cm; margin-bottom: 0.5cm;\" align=\"center\"><span style=\"font-family: Poppins, sans-serif;\">VIVA WALLET CLOUD</span></h5>\r\n<p style=\"font-variant: normal; letter-spacing: normal; font-style: normal; font-weight: normal; orphans: 2; widows: 2;\" align=\"center\"><span style=\"color: #212529;\"><span style=\"font-family: Poppins, sans-serif;\"><span style=\"font-size: small;\">Platile cu cardul sunt securizate prin serviciile Viva Wallet. Garantam securizare maxima.</span></span></span></p>\r\n<p style=\"line-height: 100%; margin-bottom: 0cm;\">&nbsp;</p>\n            </div>\n            <!-- End .feature-box-content -->\n        </div>\n        <!-- End .feature-box -->\n    </div>\n    <!-- End .col-md-4 -->\n        ', 'fa fa-credit-card', 0, 1, 'maxi', 'home'),
(17, '\n        <div class=\"col-md-4\">\n        <div class=\"feature-box px-sm-5 feature-box-simple text-center\">\n            <div class=\"feature-box-icon\">\n                <i class=\"fa fa-users\"></i>\n            </div>\n            <div class=\"feature-box-content p-0\">\n               <h4>COMUNITATE MARE</h4>\r\n<h5>AVEM MUTLI FURNIZORI&nbsp;</h5>\r\n<p>Wawto concept este sa facem legatura intre client si furnizor prin un mod unic in lume. Codul de comportament.</p>\n            </div>\n            <!-- End .feature-box-content -->\n        </div>\n        <!-- End .feature-box -->\n    </div>\n    <!-- End .col-md-4 -->\n        ', 'fa fa-users', 0, 1, 'maxi', 'home'),
(15, '\n        <div class=\"col-md-4\">\n        <div class=\"feature-box px-sm-5 feature-box-simple text-center\">\n            <div class=\"feature-box-icon\">\n                <i class=\"icon-support\"></i>\n            </div>\n            <div class=\"feature-box-content p-0\">\n               <h4>WAWTO SUPPORT</h4>\r\n<h5>SUPPORT ONLINE</h5>\r\n<p>Wawto administratie va sta la dispozitie orice ziua lucratoare in intervalul de 09-17</p>\n            </div>\n            <!-- End .feature-box-content -->\n        </div>\n        <!-- End .feature-box -->\n    </div>\n    <!-- End .col-md-4 -->\n        ', 'icon-support', 0, 1, 'maxi', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `brandparams`
--

DROP TABLE IF EXISTS `brandparams`;
CREATE TABLE IF NOT EXISTS `brandparams` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`param_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brandparams`
--

INSERT INTO `brandparams` (`param_id`, `brand_id`, `user_id`) VALUES
(2, 99999999999, 77),
(5, 99999999999, 89),
(15, 5, 87),
(7, 99999999999, 92),
(8, 99999999999, 91),
(9, 99999999999, 93),
(14, 99999999999, 94);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_title` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `brand_image` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `domain_id` int(11) DEFAULT NULL,
  `generalsetting_id` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_title`, `brand_image`, `domain_id`, `generalsetting_id`) VALUES
(5, 'AUDI', 'audi.png', 11, 1),
(6, 'BMW', 'bmw.jpg', 11, 1),
(7, 'CITROEN', 'dacia.jpg', 11, 1),
(8, 'CHEVROLET', 'chevrolet.jpg', 11, 1),
(9, 'CRYSLER', 'crysler.jpg', 11, 1),
(10, 'DACIA', 'dacia.jpg', 11, 1),
(11, 'Alfa Romeo', 'alfa.jpg', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generalsetting_id` tinyint(4) NOT NULL DEFAULT 1,
  `position` int(11) DEFAULT 0,
  `show_rules` tinyint(4) DEFAULT 0,
  `cat_image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_title`, `generalsetting_id`, `position`, `show_rules`, `cat_image`) VALUES
(7, 'PIESE DE SCHIMB', 1, 1, NULL, 'cat-1.jpg'),
(8, 'ANVELOPE SI ROTI', 1, 3, NULL, 'cat-2.jpg'),
(9, 'JANTE', 1, 4, NULL, 'cat-3.jpg'),
(10, 'VULCANIZARE', 1, 5, NULL, 'cat-6.jpg'),
(11, 'TRACTARI', 1, 6, NULL, 'cat-5.jpg'),
(12, 'ASIGURARI', 1, 7, NULL, 'cat-9.jpg'),
(13, 'SERVICII', 1, 2, NULL, 'cat-4.jpg'),
(14, 'ACCESORII', 1, 8, NULL, 'cat-7.jpg'),
(15, 'SCULE SI ECHIPAMENTE', 1, 9, NULL, 'cat-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

DROP TABLE IF EXISTS `checkouts`;
CREATE TABLE IF NOT EXISTS `checkouts` (
  `ck_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `ammount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`ck_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`ck_id`, `supplier_id`, `client_id`, `command_id`, `ammount`, `created_at`, `updated_at`, `status`) VALUES
(28, 77, 77, 48, 854, '2022-07-19 12:10:15', '2022-07-19 12:10:15', 1),
(27, 87, 87, 46, 5969, '2022-07-17 06:25:41', '2022-07-17 06:25:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

DROP TABLE IF EXISTS `checks`;
CREATE TABLE IF NOT EXISTS `checks` (
  `check_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`check_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`check_id`, `label`, `number`) VALUES
(31, 'RECONDITIONARI POMPE INJECTIE', '1679485203'),
(32, 'INSTALATII GPL', '1679485203'),
(33, 'DIAGNOZA COMPUTERIZATA', '1679485203'),
(34, 'RECONDITIONARI INJECTOARE', '366495350'),
(35, 'ESAPAMENTE', '366495350'),
(36, 'TUNING EXTERIOR', '366495350'),
(37, 'SERVISE ROTI', '366495350'),
(38, 'DETAILING AUTO', '1310604818'),
(39, 'MECANICA', '1310604818'),
(40, 'ITP', '1310604818'),
(44, 'AER CONDITIONAT & CLIMA', '277581543'),
(45, 'ELECTRICA', '277581543'),
(46, 'MECANICA USOARA', '277581543'),
(47, 'PIESE FURNIZATE DE SERVICE', '277581543'),
(48, 'ITP', '277581543'),
(52, 'Vulcanizare roata', '2121656605'),
(53, 'Schimbare roata', '2121656605'),
(54, 'Echilibrare roata', '2121656605'),
(55, 'Umflare roata', '2121656605'),
(66, 'Schimbare roata', '1080945168'),
(68, 'Senzor roata', '217883198'),
(69, 'Senzor roata', '1515045767'),
(70, 'Senzor roata', '38158673');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `region_id`) VALUES
(16, 'Abrud', 47),
(6, 'Sector 1', 12),
(15, 'Alba Iulia', 47),
(7, 'Sector 2', 12),
(8, 'Sector 3', 12),
(9, 'Sector 4', 12),
(10, 'Sector 5', 12),
(14, 'Aiud', 47),
(17, 'Baia de aries', 47),
(18, 'Blaj', 47),
(19, 'Cugir', 47),
(20, 'Campeni', 47),
(21, 'Ocna Mures', 47),
(22, 'Sebes', 47),
(23, 'Teius', 47),
(24, 'Zlatna', 47),
(25, 'Adjud', 45),
(26, 'Focsani', 45),
(27, 'Marasesti', 45),
(28, 'Odobesti', 45),
(29, 'Panciu', 45),
(30, 'Ales', 7),
(31, 'Beius', 7),
(32, 'Marghita', 7),
(33, 'Nucet', 7),
(34, 'Oradea', 7),
(35, 'Salonita', 7),
(36, 'Sacuieni', 7),
(37, 'Stei', 7),
(38, 'Valea lui Mihai', 7),
(39, 'Vascau', 7),
(40, 'Campia Turzi', 16),
(41, 'Cluj-Napoca', 16),
(42, 'Dej', 16),
(43, 'Gherla', 16),
(44, 'Huedin', 16),
(45, 'Turda', 16),
(46, 'Curtea De Arges', 48),
(47, 'Costesti', 48),
(48, 'Campulung', 48),
(49, 'Mioveni', 48),
(50, 'Topoloveni', 48),
(51, 'Pitesti', 48),
(52, 'Domnesti', 48);

-- --------------------------------------------------------

--
-- Table structure for table `commands`
--

DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `command_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  `part_id` int(11) DEFAULT NULL,
  `offer_price` float DEFAULT NULL,
  `tva` float DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `total_ammount` float DEFAULT NULL,
  `confirm_limit` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_option` tinyint(4) DEFAULT NULL,
  `payment_option` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `accomplish_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`command_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commands`
--

INSERT INTO `commands` (`command_id`, `number`, `client_id`, `supplier_id`, `offer_id`, `request_id`, `part_id`, `offer_price`, `tva`, `total_price`, `total_ammount`, `confirm_limit`, `created_at`, `updated_at`, `delivery_option`, `payment_option`, `status`, `accomplish_date`) VALUES
(49, '732284253', 92, 92, 194, 151, 220, 85, 16.15, 101.15, 101.15, '2022-07-19 15:23:30', '2022-07-19 12:08:30', '2022-07-19 12:08:30', 2, 2, 0, '2022-07-19 15:08:30'),
(48, '705534212', 77, 77, 189, 150, 216, 700, 133, 833, 854, '2022-07-18 15:03:42', '2022-07-18 11:48:42', '2022-07-19 12:12:52', 1, 4, 4, '2022-07-18 14:48:42'),
(47, '1383858843', 77, 92, 187, 148, 213, 85, 16.15, 101.15, 101.15, '2022-07-18 12:21:15', '2022-07-18 09:06:15', '2022-07-18 09:06:15', 2, 2, 0, '2022-07-18 12:06:15'),
(46, '1054821186', 87, 87, 184, 146, 210, 5000, 950, 5950, 5969, '2022-07-17 09:37:27', '2022-07-17 06:22:27', '2022-07-17 06:25:58', 1, 1, 4, '2022-07-17 09:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `commision_grill`
--

DROP TABLE IF EXISTS `commision_grill`;
CREATE TABLE IF NOT EXISTS `commision_grill` (
  `cg_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `period` datetime NOT NULL,
  PRIMARY KEY (`cg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commision_grill`
--

INSERT INTO `commision_grill` (`cg_id`, `supplier_id`, `value`, `period`) VALUES
(1, 87, 8.4, '2022-07-04 05:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `curier`
--

DROP TABLE IF EXISTS `curier`;
CREATE TABLE IF NOT EXISTS `curier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `pay_load` float DEFAULT NULL,
  `payload_limit` float NOT NULL,
  `overload` float DEFAULT NULL,
  `is_default` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curier`
--

INSERT INTO `curier` (`id`, `name`, `pay_load`, `payload_limit`, `overload`, `is_default`) VALUES
(1, 'DPD', 15, 2, 2, 1),
(4, 'Cargus', 11, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `domainparams`
--

DROP TABLE IF EXISTS `domainparams`;
CREATE TABLE IF NOT EXISTS `domainparams` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`param_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domainparams`
--

INSERT INTO `domainparams` (`param_id`, `domain`, `user_id`) VALUES
(4, 11, 77),
(5, 12, 77),
(6, 12, 89),
(7, 11, 87),
(8, 11, 92),
(9, 12, 92),
(10, 11, 91),
(11, 12, 91),
(12, 12, 87),
(13, 11, 93),
(14, 12, 93),
(15, 11, 94),
(17, 12, 94);

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

DROP TABLE IF EXISTS `domains`;
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `domain_title` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generalsetting_id` tinyint(4) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `domain_picture` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `domain_url` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fast_request` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domains_domain_url_unique` (`domain_url`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `domain_title`, `generalsetting_id`, `subcategory_id`, `category_id`, `domain_picture`, `position`, `domain_url`, `fast_request`) VALUES
(11, 'Autoturisme si SUV-uri', 1, 9, 7, 'Lada-Vision-4x4-1024x768.jpg', 1, 'ip807z9VXk2guGG02ELJX4CEkhb4YmPdtDXXaMWJ19aDCv5LOOYhx3G7JeTLv1NGJELO30CTK2m0LJCq', 1),
(12, 'Motociclete si ATV-uri', 1, 9, 7, 'asigurari moto.jpg', 2, 'Zwdf2Tah0osX6aApCnMnF1migBgMMfTTCvVrl7AXdMTEkv9pW57CxeVv90N5IV3ebkPybvq98TX7njky', 1),
(13, 'Utilaje industriale / agricole', 1, 33, 7, '', 18, 'DlnAfji0x1yYoSS8kjHzBdrpbUp3Y1TFWbaqUJDGZHIrRISwYftrczATxKhpxF9Hsmyq1uArFGhmKPEx', 1),
(14, 'Autoutilitare pana in 3,5 tone', 1, 13, 7, '', 5, 'ZL2mGdXKHrabzbhfmrPDjECrvkbms4itfOiU8vK32SAhtazL9yzVILy8v6OuZml5F9p6fhwXvffVrIuy', 1),
(15, 'Autoutilitare pana in 7,5 tone', 1, 14, 7, '', 6, 'lq7BaWSeadaAxspxSVe3VsCSgoAHlSKqC9x0JuCmSrUkmsyl8mO7EAcFGfRQ1KjhsgeP0fGcAi558Y3C', 1),
(16, 'Autocamioane peste 7,5 tone', 1, 16, 7, '', 7, 'soxNgj36hR29daljY1cAQuLVWEgDcEZHxPRbDCyhpg3frDigxDy7UkrIN7Gkbf0QWWa014JFRVqj8eBI', 1),
(17, 'Transport calatori', 1, 17, 7, '', 7, 'JCdoFeTaVfDhiojfXIcztmkqGkmkozSbR7TOnRime0bd2s0LpRvH1pobKtFvhqH8zv3YVlYWkLcFZOQX', 1),
(18, 'Remorci si semiremorci', 1, 18, 7, '', 8, 'Si0ASKgB7tRRtJmzlKDb4AuS4YKiAGWsVaTUWnKBIQRjpxO4r8oqpdEF2oMS3lW3IS3giKVEkaEKdZSJ', 1),
(19, 'Anvelope', 1, 19, 8, '', 9, 'pnEdeq0SL32sZwQL3tmcWVmjlRZAGqfI7gBuFm8NDHq77NDp9qJXvZwftiP1OVNSJBK4yvbg5f57SiyU', 1),
(20, 'Anvelope motostivuitor', 1, 22, 8, '', 10, 'cui1Wqa1CEyrh7VXBifKSk7zryn8l4SRqjuYPs9xntQxoHuxAPRwnlU9xdRgtBzZ6Ho7aVoFhBWg4ly5', 1),
(21, 'Anvelope agricole', 1, 23, 8, '', 11, 'Qm1BZ36m8HeKeI1OoBtCFpyJDySocZZLtEA9YQRCgBt7Pfyqeg5v7oPFt0hJXq0EplCwxiTFnVzc3Qvg', 1),
(22, 'Anvelope industriale', 1, 20, 8, '', 12, 'zE7h8S9nZNO74330dIMIjczV3kRdPXuxZTOStGpx48cEmYtfUlA5o6WcOzOogiUnSEvhvS3m8XwkgfG3', 1),
(23, 'Anvelope camion', 1, 21, 8, '', 14, 'qUt5NyZOsxBZO2Wyts12754bK0bj6WGLLXqOjus3zcRLG4VD2lxZVZHSJ3vD9QxVg0169bR9ztklelSp', 1),
(24, 'Anvelope moto si atv-uri', 1, 24, 8, '', 14, 'rbs46mI7FLS8CLyEhaOr6QfLgAUasnOzrQJeQ3ArDdQv7zYH6FIdudLDbfI7YaGMlYa74pqOGqgnX6iw', 1),
(25, 'Anvelope autoutiliare pana in 7,5 tone', 1, 25, 8, '', 15, 'xxIkaG3NO2LLqdPJTI9e3bUrwAfs2fFBhuGs833VhzzQDgPJaXJPqvvPzDdPmTfe9ZQ4g8Rzs5z65aoA', 1),
(26, 'Jante auto si suv-uri', 1, 26, 9, '', 1, 'jMoiASxGxcn6wjTbpZo94jFUyJ8bDYwiKtTEtxZSXX0306dbSUYpaYNtispLs0JsOyUqib1eTu5YibUl', 1),
(27, 'Jante moto si atv-uri', 1, 27, 9, '', 100, '25y8KNsDFyKK4gVqLlm6TBAuX3X4YuRoPdndwCjg9baAUs4wUzmsIV6TZgmB4aAlPSGfozXn8Crxg9sh', 1),
(28, 'Janta autoutilitare', 1, 32, 9, '', 3, 'KdMMwUtfR0L0OMCsdwNAJMAaAiEauW9EWhcN4n48u9A8Vm1BK9kmo8nqtHg0VtjT9HgsSDGQuC3VDqCo', 1),
(29, 'Jante agricole', 1, 31, 9, '', 50, 't1LotmTv7qSvxeBkL01oQ9VbY9xMdkc8Jk7e9pJSXGskZQp4OebVoM4dl9CHIABbII3TGjdtq2BRC6QQ', 1),
(30, 'Jante camioane', 1, 29, 9, '', 4, 'S6GTv7goH7BiBeVfl8A6t4urRkeI3BYWuKRhsq20Vu1v2RUBGMWLRkrgZRu3so9pfDRl5ba2jU400j3j', 1),
(31, 'Jante stivuitor', 1, 30, 9, '', 6, 'dP7ImSZdEaRjdl97NUY4dgu3aeVS66klU1sug0cRFWtJpriZIG561esvJDt787IKomA1gVYBkObnKETV', 1),
(32, 'Jante industriale', 1, 28, 9, '', 7, 'p3dxfdswNAovUBLnN30gQEe17OnbeqcSxOUEbqWXhZe7LDO2YX7fTRtgdBuza0MZLGt5Iw9dSDvH2loM', 1),
(33, 'Service auto', 1, 34, 13, '', 23, '4r3EQ6rsKsGlBaxLa6gidlW1rIevLtrBHcvlJYpS56vz8uSCeJv7rzhrOfkNHzowuJ6jGpV9J2giuPFO', 1),
(34, 'Vulcanizare auto si suv-uri', 1, 39, 10, '', 24, '43uBdnJ95IijgBQ0gj6SfXFszZBDAEHi7tg74Tdy5NXgHQaehjIClyLHwMkl6zmmu6nLE64QraWMYXDX', 1),
(35, 'Asigurari auto', 1, 40, 12, '', 25, 'as1mYvA385FnLtj2V5T0jsBtddLe7Y2opxYj7Pttb68KpyfxzGmuBgaUW5qZkXLtiA6lJLvQD3oS3e2c', 1),
(36, 'Service moto si atv-uri', 1, 35, 13, '', 26, 'ey9l87dDk985C2ipikUk9AsW4Dbjo346XI1PoO0mZFMkUiAAVuFs8PNUiqONj61Rv2WfIen62ruwnql6', 1),
(37, 'Service camioane', 1, 36, 13, '', 27, 'y9zu4aStZqwE0un6nJPixR1w5RtQVQ1zVNqErOExmju5AOTLmK4IglCIWF2Y8JllclQguwWujI0BImrZ', 1),
(38, 'Service autoutilitare', 1, 38, 13, '', 28, 'sl9tYdIaIs4HVmymaBmVmJ49r80YtGE92q2IUf4qv3guXG3qsIWgDxBuKajcaTjBlPIpXy2mJbQR2Fnu', 1),
(39, 'Service utilaje industriale  / agricole', 1, 37, 13, '', 29, 'yF2FExMnclV23s876315Fedph0CgTZz6KhkV20AIQaP8UISSBi2J2vuFPyCatazn5FSmrhZneKgvbVdP', NULL),
(40, 'Service autocare / microbuze', 1, 41, 13, '', 30, 'mvsq6Tb5c9T9xil3UH7YlzYY1qdgZUt7jAIWMGd8eM0j4ldnuei8hayQMVk2wj5sGpOUVXSWuaQEMLQK', NULL),
(41, 'Service auto mobil', 1, 42, 13, '', 31, 'e7qPktSf0iYsfcNDRfI2HhruwyRfm9JIFLOhaZajd6tlGJwD8aBlLcsZlIhPmSBYmmZP2WPnDm8VmTgB', NULL),
(42, 'Tractari auto si agabaritice', 1, 43, 11, '', 32, 'cTdgbKxK7jk4wbZA2l03rWfTkjp1SWwORwrymCBlevoV2jfmehcRbjIMN54SmCOXFaLzQQ5bqhevO8rN', NULL),
(43, 'Accesorii auto / moto / camioane', 1, 44, 14, '', 33, 'XlDDnHD4YuhsDy4qbIlPPvQBioXGLL0wRiPP2whv68lNl7CuCZZiTFZJcxibogVzT7Jd8NvP5H39MJHD', NULL),
(44, 'Scule si echipamente auto', 1, 45, 15, '', 34, 'RWXwasu812fOUFawXniLw7ebbaytDvdRdawXRfKf8Db4kbq9uS4QX85NuA1WMSdociCwiWfeK8BNWvHF', NULL),
(45, 'Vulcanizare moto / atv', 1, 46, 10, '', 35, '3YYj2SmARQPjVouYgKm1jzm3QzUg0BWfp2ZpfyiK8ftHBSwHoL6lqTFfCvC7GKYcq0YCI5mJmWk2gdXr', NULL),
(46, 'Vulcanizare mobila', 1, 47, 10, '', 36, 'OrSct85QKbfaqdCbtxbfWAfKPawphC4Nfc2jlIGUGy1vENvsAsukfFNlD04sX6qHszdnaNLvkfaHaJF9', NULL),
(47, 'Vulcanizare autoutilitare / camioane', 1, 48, 10, '', 37, 'n80rncliCLuWyG5k3oTcg5DElYoZ5fu1QWhEp8XWI4Bhyw3vVttfgTFz0F2VkVATtEiTikLhq1hgLIoG', NULL),
(48, 'Vulcanizare utilaje industriale / agricole', 1, 49, 10, '', 38, 'Lbbbb6wrgQRCHB2GpnCLEPAWLQ8crTluvmY1mELUTu4r5UByrbF1oIZGMZ1tOh7eZjzSlmPTTwPa4P7c', NULL),
(49, 'Roti complete', 1, 50, 8, '', 39, 'jrHwyEWgg46mUjMZJJzJMvnZFnz4T1lpIBpiDnRWQYkBkb0zHgsH9x4sUHlmbCz1W2uFDVmn6ZT0Hq32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
CREATE TABLE IF NOT EXISTS `equipments` (
  `eq_id` int(11) NOT NULL AUTO_INCREMENT,
  `request` varchar(255) DEFAULT NULL,
  `air_condition` int(1) DEFAULT NULL,
  `abs` int(1) DEFAULT NULL,
  `light_wash` int(1) DEFAULT NULL,
  `xenon_light` int(1) DEFAULT NULL,
  `electric_mirrors` int(1) DEFAULT NULL,
  `heliomatic_mirrors` int(1) DEFAULT NULL,
  `central_lock` int(1) DEFAULT NULL,
  `automatic_gearbox` int(1) DEFAULT NULL,
  `parking_sensors` int(1) DEFAULT NULL,
  `parking_camera` int(1) DEFAULT NULL,
  `distronic` int(1) DEFAULT NULL,
  `projector_lights` int(1) DEFAULT NULL,
  PRIMARY KEY (`eq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`eq_id`, `request`, `air_condition`, `abs`, `light_wash`, `xenon_light`, `electric_mirrors`, `heliomatic_mirrors`, `central_lock`, `automatic_gearbox`, `parking_sensors`, `parking_camera`, `distronic`, `projector_lights`) VALUES
(173, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, '1885681864', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(169, '1885681864', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(167, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(168, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(166, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(165, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(164, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(163, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(162, '291424676', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL),
(160, '2026979352', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(161, '964824387', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, NULL, 1),
(159, '366048285', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(158, '1800598928', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, '863324482', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL),
(156, '1090264995', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(155, '1404867744', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(154, '1401603590', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(153, '2086784374', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(174, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, '1193750694', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '1475980967', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(211, '1619700975', 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(212, '1146106651', 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(213, '1146106651', 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(214, '1146106651', 1, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL),
(215, '554128380', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(216, '1292421396', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '2111208565', 1, 1, 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, 1),
(218, '2023000344', 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

DROP TABLE IF EXISTS `footers`;
CREATE TABLE IF NOT EXISTS `footers` (
  `footer_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text COLLATE utf8mb4_romanian_ci NOT NULL,
  `generalsetting_id` int(1) NOT NULL,
  PRIMARY KEY (`footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`footer_id`, `html`, `generalsetting_id`) VALUES
(1, '<div class=\"col-md-6 col-lg-3\">\r\n                                            <div class=\"widget\">\r\n                                                <h3 class=\"widget-title\">Phoenix Automobile Expret</h3>\r\n                                                <div class=\"widget-content\">\r\n                                                    <ul>\r\n                                                       <img src=\"../platform/frontend/assets/images/logo/phoenix.png\" style=\"width:100%;height:200px;\">\r\n                                                        \r\n                                                    </ul>\r\n <p>Phoenix Automobile Expert, Cui: 12345, J: 234554, IBAN: 123434, Banca: 234234.</p>\r\n<p>Strada Unirii nr. 456, Secotr 6, Bucuresti.</p>                                             </div>\r\n                                            </div>\r\n                                        </div>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

DROP TABLE IF EXISTS `generalsettings`;
CREATE TABLE IF NOT EXISTS `generalsettings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_platform` tinyint(4) NOT NULL DEFAULT 1,
  `site_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `main_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy_right` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `request_capacity` int(11) DEFAULT NULL,
  `offer_message` text CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `facebook_text` longtext CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `gmail_text` longtext CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `is_verified` tinyint(4) NOT NULL,
  `is_maintenace` tinyint(4) NOT NULL,
  `verify` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `request_perpage` int(11) DEFAULT NULL,
  `suppliers_perpage` int(11) DEFAULT NULL,
  `no_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `is_platform`, `site_title`, `site_logo`, `main_email`, `copy_right`, `request_capacity`, `offer_message`, `facebook_text`, `gmail_text`, `is_verified`, `is_maintenace`, `verify`, `request_perpage`, `suppliers_perpage`, `no_details`) VALUES
(1, 1, 'WAWTO SmarShop', 'logo.png', 'contact@wawto.ro', '2022 Wawto Romania | Continut cu drepturi protejate', 20, 'Stimati ati primit oferta pentru cerere pe care atri trimis cu numarul:', '<h5 class=\\\"text-center\\\">Optiune Facebook</h5><p>Facebook cont pe care aveti puteti folosi pentru a intra in cont Dumneavoastra pe Wawto. Daca faceti acest lucru si nu sunteti membru comunitatii Wawto contul pe wawto va fi creat automat dupa informatiile care va furniza Facebook. Din pacate retele sociale nu furnizeaza informatii suficient si va fi necesara o mica completare a informatiilor in panoul Dumneavoastra de control pe Wawto Multumim...</p>', '<h5 class=\\\"text-center\\\">Optiune Gmail</h5><p>Daca aveti cont pe gmail puteti folosi acest cont si pentru a intra in cont Dumneavoastra pe Wawto.Daca nu stunteti membru a comunitatii noastre contul pe wawto se va crea automat. Veti primi un e-mail cu parola pe Wawto care se poate folosi in formularul de login Wawto. Din pacate retele sociale nu furnizeaza informatii suficient si va fi necesara o mica completare a informatiilor in panoul Dumneavoastra de control pe Wawto Multumim...</p>', 1, 0, 'Stimati utilizator. Va rugam sa verificati e-mail adresa pe care ati inregistrat contul. Mutlumim....', 18, 18, 'Stimati furnizor, Client a folosit formular rapid pentru a trimite acesta cerere. Asta inseamna ca cod produs este specificat si nu era necesar sa completeze alte detali despre vehicol sau alte echipamente.');

-- --------------------------------------------------------

--
-- Table structure for table `genralsettings`
--

DROP TABLE IF EXISTS `genralsettings`;
CREATE TABLE IF NOT EXISTS `genralsettings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text COLLATE utf8mb4_romanian_ci NOT NULL,
  `generalsetting_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `html`, `generalsetting_id`) VALUES
(1, '<li><a href=\"https://anpc.ro/\">Protectia Consumatorului</a></li>', 1),
(2, '<li><a href=\"https://cnadnr.ro/\">CNADNR</a></li>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locationparams`
--

DROP TABLE IF EXISTS `locationparams`;
CREATE TABLE IF NOT EXISTS `locationparams` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`param_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationparams`
--

INSERT INTO `locationparams` (`param_id`, `location`, `user_id`) VALUES
(1, 47, 77),
(3, 47, 89),
(4, 48, 87),
(5, 12, 92),
(6, 12, 87),
(7, 12, 91),
(8, 12, 93),
(10, 12, 94),
(11, 47, 94),
(12, 47, 94);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` text NOT NULL,
  `menu_url` longtext NOT NULL,
  `is_header` tinyint(4) DEFAULT NULL,
  `is_footer` tinyint(4) DEFAULT NULL,
  `show_rules` tinyint(4) DEFAULT NULL,
  `generalsetting_Id` tinyint(4) NOT NULL,
  `is_visible` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_title`, `menu_url`, `is_header`, `is_footer`, `show_rules`, `generalsetting_Id`, `is_visible`) VALUES
(6, 'DESPRE NOI', 'about', 1, NULL, 0, 1, 1),
(7, 'INFORMATII', 'info', 1, NULL, 0, 1, 1),
(4, 'CONTACT', 'contact', 1, NULL, 0, 1, 1),
(8, 'ANPC', 'anpc', 1, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2022_06_16_154952_create_generalsettings_table', 1),
(11, '2022_06_16_174736_create_notifications_table', 1),
(12, '2022_06_16_191849_create_subcategories_table', 1),
(13, '2022_06_16_191934_create_categories_table', 1),
(14, '2022_06_16_192515_create_domains_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notifier_id` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notifier_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=300 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification`, `user_id`, `url`, `notifier_id`, `notifier_name`, `created_at`, `updated_at`) VALUES
(232, 'Stimati. Client Wawto Administrator a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 1837454542. Multumim pentru ca folositi serviicile noastre!!!', 77, '/', '77', 'Wawto Administrator', '2022-07-12 11:06:52', '2022-07-12 11:06:52'),
(116, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 89, '/local-requests', '77', 'Slavisa Berca', '2022-07-03 12:44:02', '2022-07-03 12:44:02'),
(175, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(174, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(148, 'Stimati, Utilizatorul Slavisa Comm a trimis comanda pentru ofrerta Dumneavoastra numarul: 1892654378, care se refera la cerere Dumneavoastra: 1404867744. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 94, '/my-account', '93', 'Slavisa Comm', '2022-07-06 19:20:05', '2022-07-06 19:20:05'),
(149, 'Stimati, Furnizorul a confirmat commanda Dumneavoastra numarul 1490322233. Acuma puteti proceda la checkout ca sa beneficiati de serviciile pe care va a oferit furnizorul... Multumim!!!', 93, 'my-account', '94', NULL, '2022-07-06 19:20:24', '2022-07-06 19:20:24'),
(150, 'Stimati. Client Slavisa Comm a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 1490322233. Multumim pentru ca folositi serviicile noastre!!!', 94, '/', '93', 'Slavisa Comma', '2022-07-06 19:21:27', '2022-07-06 19:21:27'),
(246, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:45:50', '2022-07-16 08:45:50'),
(238, 'Stimati. Client Wawto Administrator a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 596983180. Multumim pentru ca folositi serviicile noastre!!!', 77, '/', '77', 'Wawto Administrator', '2022-07-12 13:32:08', '2022-07-12 13:32:08'),
(235, 'Stimati. Client Wawto Administrator a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 991867565. Multumim pentru ca folositi serviicile noastre!!!', 77, '/', '77', 'Wawto Administrator', '2022-07-12 11:34:23', '2022-07-12 11:34:23'),
(234, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 1368576876, care se refera la cerere Dumneavoastra: 1503208750. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 77, '/my-account', '77', 'Wawto Administrator', '2022-07-12 11:23:20', '2022-07-12 11:23:20'),
(231, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 926448644, care se refera la cerere Dumneavoastra: 1503208750. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 77, '/my-account', '77', 'Wawto Administrator', '2022-07-12 11:06:28', '2022-07-12 11:06:28'),
(141, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'RUS IOAN', '2022-07-06 09:03:30', '2022-07-06 09:03:30'),
(142, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'RUS IOAN', '2022-07-06 09:03:30', '2022-07-06 09:03:30'),
(143, 'Stimati ati primit oferta pentru cerere pe care atri trimis cu numarul: 1382631754', 91, '/offer-details/257125741', '94', 'Slavisa Comma', '2022-07-06 17:50:46', '2022-07-06 17:50:46'),
(173, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(152, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(153, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(154, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(155, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(156, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(157, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:16:47', '2022-07-07 08:16:47'),
(239, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 77, '/local-requests', '77', 'Berca slavisa', '2022-07-16 08:41:01', '2022-07-16 08:41:01'),
(160, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(161, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(162, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(163, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(164, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(165, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-07-07 08:49:13', '2022-07-07 08:49:13'),
(167, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 1048080191, care se refera la cerere Dumneavoastra: 1800598928. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 92, '/my-account', '77', 'Wawto Administrator', '2022-07-07 08:53:22', '2022-07-07 08:53:22'),
(168, 'Stimati. Client Wawto Administrator a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 116210165. Multumim pentru ca folositi serviicile noastre!!!', 92, '/', '77', 'AMG SILVER CONSTRUCT SRL', '2022-07-07 08:57:25', '2022-07-07 08:57:25'),
(220, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-07-11 08:31:59', '2022-07-11 08:31:59'),
(219, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Wawto Administrator', '2022-07-11 08:31:59', '2022-07-11 08:31:59'),
(218, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Wawto Administrator', '2022-07-11 08:31:59', '2022-07-11 08:31:59'),
(176, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(177, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(178, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 04:10:34', '2022-07-10 04:10:34'),
(179, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(180, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(181, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(182, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(183, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(184, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:00:05', '2022-07-10 05:00:05'),
(185, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(186, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(187, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(188, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(189, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(190, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:01:28', '2022-07-10 05:01:28'),
(191, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(192, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(193, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(194, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(195, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(196, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 05:07:56', '2022-07-10 05:07:56'),
(243, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:41:01', '2022-07-16 08:41:01'),
(240, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:41:01', '2022-07-16 08:41:01'),
(241, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:41:01', '2022-07-16 08:41:01'),
(242, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:41:01', '2022-07-16 08:41:01'),
(201, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(202, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(203, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(204, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(205, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(206, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-10 06:11:38', '2022-07-10 06:11:38'),
(237, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 1607387684, care se refera la cerere Dumneavoastra: 277581543. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 77, '/my-account', '77', 'Wawto Administrator', '2022-07-12 13:31:40', '2022-07-12 13:31:40'),
(208, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(209, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(210, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(211, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '94', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(212, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '94', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(213, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Slavisa TEst', '2022-07-10 06:41:23', '2022-07-10 06:41:23'),
(244, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 77, '/local-requests', '77', 'Berca slavisa', '2022-07-16 08:45:50', '2022-07-16 08:45:50'),
(245, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:45:50', '2022-07-16 08:45:50'),
(247, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:45:50', '2022-07-16 08:45:50'),
(248, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:45:50', '2022-07-16 08:45:50'),
(249, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 77, '/local-requests', '77', 'Berca slavisa', '2022-07-16 08:48:11', '2022-07-16 08:48:11'),
(250, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:48:11', '2022-07-16 08:48:11'),
(251, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:48:11', '2022-07-16 08:48:11'),
(252, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:48:11', '2022-07-16 08:48:11'),
(253, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 08:48:11', '2022-07-16 08:48:11'),
(254, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 77, '/local-requests', '77', 'Berca slavisa', '2022-07-16 09:01:31', '2022-07-16 09:01:31'),
(255, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 09:01:31', '2022-07-16 09:01:31'),
(256, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 09:01:31', '2022-07-16 09:01:31'),
(257, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 09:01:31', '2022-07-16 09:01:31'),
(258, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Berca slavisa', '2022-07-16 09:01:31', '2022-07-16 09:01:31'),
(259, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 77, '/national-requests', '77', 'Berca slavisa', '2022-07-16 15:18:53', '2022-07-16 15:18:53'),
(260, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Berca slavisa', '2022-07-16 15:18:53', '2022-07-16 15:18:53'),
(261, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Berca slavisa', '2022-07-16 15:18:53', '2022-07-16 15:18:53'),
(262, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Berca slavisa', '2022-07-16 15:18:53', '2022-07-16 15:18:53'),
(263, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Berca slavisa', '2022-07-16 15:18:53', '2022-07-16 15:18:53'),
(271, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(269, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/national-requests', '91', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(270, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/national-requests', '93', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(272, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/national-requests', '94', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(273, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/national-requests', '94', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(274, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/national-requests', '94', 'Wawto Administrator', '2022-07-18 07:47:39', '2022-07-18 07:47:39'),
(282, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 1923341877, care se refera la cerere Dumneavoastra: 1515045767. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 77, '/my-account', '77', 'Wawto Administrator', '2022-07-18 11:48:42', '2022-07-18 11:48:42'),
(277, 'Stimati, Utilizatorul Wawto Administrator a trimis comanda pentru ofrerta Dumneavoastra numarul: 1369595611, care se refera la cerere Dumneavoastra: 1292421396. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 92, '/my-account', '77', 'Wawto Administrator', '2022-07-18 09:06:15', '2022-07-18 09:06:15'),
(283, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(284, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(285, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(286, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(287, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 92, '/local-requests', '94', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(288, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:51:05', '2022-07-19 11:51:05'),
(289, 'Stimati ati primit oferta pentru cerere pe care atri trimis cu numarul: 2111208565', 92, '/offer-details/728617611', '92', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:53:33', '2022-07-19 11:53:33'),
(292, 'Stimati, Utilizatorul AMG SILVER CONSTRUCT SRL a trimis comanda pentru ofrerta Dumneavoastra numarul: 90510103, care se refera la cerere Dumneavoastra: 2111208565. Va rugam sa confirmati acesta comanda in cel mai scurt timp. Multumim!!!! Wawto IT.', 92, '/my-account', '92', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 12:08:30', '2022-07-19 12:08:30'),
(291, 'Stimati ati primit oferta pentru cerere pe care atri trimis cu numarul: 2111208565', 92, '/offer-details/249534191', '92', 'AMG SILVER CONSTRUCT SRL', '2022-07-19 11:55:37', '2022-07-19 11:55:37'),
(293, 'Stimati. Client Wawto Administrator a trecut prin procedura checkout pentru comnda pe care ati primit Dumneavoastra numarul: 705534212. Multumim pentru ca folositi serviicile noastre!!!', 77, '/', '77', 'Wawto Administrator', '2022-07-19 12:10:15', '2022-07-19 12:10:15'),
(294, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '91', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41'),
(295, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '93', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41'),
(296, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41'),
(297, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 91, '/local-requests', '94', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41'),
(298, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 93, '/local-requests', '94', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41'),
(299, 'Stimati furnizor, pe platforma se a inregistrat o cerere de oferta noua care se potriveste cu parametri de vanzare a Dumneavoastra. Multumim', 94, '/local-requests', '94', 'Wawto Administrator', '2022-10-24 08:35:41', '2022-10-24 08:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `offerdatas`
--

DROP TABLE IF EXISTS `offerdatas`;
CREATE TABLE IF NOT EXISTS `offerdatas` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `data_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `offer` varchar(255) NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerdatas`
--

INSERT INTO `offerdatas` (`od_id`, `data_label`, `data_content`, `offer`) VALUES
(23, 'Schimbare roata', 'Mercedes', '834468116'),
(22, 'Schimbare roata', 'BMW', '1332505870');

-- --------------------------------------------------------

--
-- Table structure for table `offerformcomponents`
--

DROP TABLE IF EXISTS `offerformcomponents`;
CREATE TABLE IF NOT EXISTS `offerformcomponents` (
  `oc_id` int(11) NOT NULL AUTO_INCREMENT,
  `of_id` int(11) DEFAULT NULL,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`oc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerformcomponents`
--

INSERT INTO `offerformcomponents` (`oc_id`, `of_id`, `html`, `position`) VALUES
(1, 1, '<div class=\"col-md-4\">\n             <label>Subiectul*</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Subiectul\">\n             </div>', 2),
(2, 1, '<div class=\"col-md-4\">\n             <label>Valoare*</label>\n             <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Valoare\">\n             </div>', 1),
(4, 3, '<div class=\"col-md-6\">\n             <label>Data Programari*</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Data Programari\">\n             </div>', 3),
(5, 3, '<div class=\"col-md-6\">\n             <label>Disponibilitate*</label>\n             <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n             <option vlaue=\" Disponibil \"> Disponibil </option>\r\n<option vlaue=\" Cu asteptare\"> Cu asteptare </option>\n             </select>\n             <input type=\"hidden\" name=\"label[]\" value=Disponibilitate\">\n             </div>', 4),
(6, 6, '<div class=\"col-md-4\">\n             <label>Data preferata*</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Data preferata\">\n             </div>', 5),
(8, 6, '<div class=\"col-md-4\">\n             <label>Companie asigurari*</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Companie asigurari\">\n             </div>', 6),
(9, 9, '<div class=\"col-md-4\">\n             <label>DATA PREFERATA SERVICE</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n             </div>', 7),
(10, 9, '<div class=\"col-md-4\">\n             <label>Compania Service auto</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Compania Service auto\">\n             </div>', 8),
(11, 10, '<div class=\"col-md-4\">\n             <label>DATA PREFERATA SERVICE*</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n             </div>', 9),
(12, 10, '<div class=\"col-md-4\">\n             <label>Compania Service auto*</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Compania Service auto\">\n             </div>', 10),
(13, 10, '\n             <div class=\"col-md-12\">\n             <label>Defectiunile la camion</label>\n             <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n             <input type=\"hidden\" name=\"label[]\" value=Defectiunile la camion\">\n             </div>\n             ', 11),
(14, 11, '<div class=\"col-md-4\">\n             <label>DATA PREFERATA SERVICE</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n             </div>', 12),
(15, 11, '<div class=\"col-md-4\">\n             <label>Companie service</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Companie service\">\n             </div>', 13),
(16, 12, '<div class=\"col-md-4\">\n             <label>DATA LIVRARII</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"DATA LIVRARII\">\n             </div>', 14),
(17, 12, '<div class=\"col-md-4\">\n             <label>FURNIZOR</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"FURNIZOR\">\n             </div>', 15),
(18, 13, '<div class=\"col-md-4\">\n             <label>Data preferata*</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Data preferata\">\n             </div>', 16),
(19, 13, '<div class=\"col-md-4\">\n             <label>Nume companie*</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n             <input type=\"hidden\" name=\"label[]\" value=\"Nume companie\">\n             </div>', 17),
(20, 14, '<div class=\"col-md-4\">\n             <label>DATA PREFERATA VULCANIZARE</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA VULCANIZARE\">\n             </div>', 18),
(21, 14, '<div class=\"col-md-4\">\n             <label>Nume companie</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Nume companie\">\n             </div>', 19),
(22, 15, '<div class=\"col-md-4\">\n             <label>Data preferata</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Data preferata\">\n             </div>', 20),
(23, 15, '<div class=\"col-md-4\">\n             <label>Nume companie</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Nume companie\">\n             </div>', 21),
(24, 16, '<div class=\"col-md-4\">\n             <label>Disponibilitatea</label>\n             <input type=\"date\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Disponibilitatea\">\n             </div>', 22),
(25, 16, '<div class=\"col-md-4\">\n             <label>Producator</label>\n             <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n             <input type=\"hidden\" name=\"label[]\" value=\"Producator\">\n             </div>', 23);

-- --------------------------------------------------------

--
-- Table structure for table `offerforms`
--

DROP TABLE IF EXISTS `offerforms`;
CREATE TABLE IF NOT EXISTS `offerforms` (
  `of_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY (`of_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerforms`
--

INSERT INTO `offerforms` (`of_id`, `domain_id`) VALUES
(1, 11),
(2, 12),
(3, 33),
(4, 32),
(5, 17),
(6, 35),
(7, 15),
(8, 31),
(9, 36),
(10, 37),
(11, 39),
(12, 43),
(13, 45),
(14, 47),
(15, 48),
(16, 49);

-- --------------------------------------------------------

--
-- Table structure for table `offerimages`
--

DROP TABLE IF EXISTS `offerimages`;
CREATE TABLE IF NOT EXISTS `offerimages` (
  `oi_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `offer` varchar(255) NOT NULL,
  PRIMARY KEY (`oi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL,
  `request` int(11) DEFAULT NULL,
  `part_id` int(11) DEFAULT NULL,
  `part_code` varchar(255) COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `currency` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `image1` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `manufacturer` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `tva` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `number`, `request`, `part_id`, `part_code`, `client_id`, `supplier_id`, `value`, `currency`, `image`, `image1`, `manufacturer`, `weight`, `tva`, `created_at`, `updated_at`, `status`, `quantity`) VALUES
(189, 1923341877, 150, 216, '3455646466446', 77, 77, 700, 'RON', '', '', 'renault group', 5, 19, '2022-07-18 13:02:01', '2022-07-18 13:02:01', 0, 4),
(191, 215613795, 150, 218, '2343546565656', 77, 77, 685, 'RON', '10X938.jpg', '10X1000.jpg', 'renault group', 0, 0, '2022-07-18 13:12:53', '2022-07-18 13:12:53', 0, 4),
(190, 1112463732, 150, 216, '3455646466446', 77, 77, 700, 'RON', '6PK1888.jpg', '6PK2075.jpg', 'renault group', 5, 19, '2022-07-18 13:10:41', '2022-07-18 13:10:41', 0, 4),
(186, 834468116, 147, 66, NULL, 87, 87, 200, NULL, NULL, NULL, NULL, 0, 0, '2022-07-17 11:36:09', '2022-07-17 11:36:09', 0, NULL),
(187, 1369595611, 148, 213, '2343545656476', 77, 92, 85, 'RON', '', '', 'breckner', 0, 19, '2022-07-18 11:12:14', '2022-07-18 11:12:14', 0, 2),
(188, 1214322686, 148, 213, '2343545656476', 77, 77, 280, 'RON', '', '', 'renault group', 1, 0, '2022-07-18 12:04:51', '2022-07-18 12:04:51', 0, 2),
(185, 1332505870, 147, 66, NULL, 87, 87, 2999, NULL, NULL, NULL, NULL, 5, 19, '2022-07-17 11:28:20', '2022-07-17 11:28:20', 0, NULL),
(184, 1761772554, 146, 210, '1223', 87, 87, 5000, 'RON', 'audi-a4.jpg', 'ecosport.png', 'Tigar', 4, 19, '2022-07-17 09:17:05', '2022-07-17 09:17:05', 0, 1),
(192, 1059085326, 150, 217, 'e5r543545645', 77, 77, 285, 'RON', '10X950.jpg', '10X1000.jpg', 'renault group', 0, 19, '2022-07-18 13:13:34', '2022-07-18 13:13:34', 0, 4),
(193, 728617611, 151, 219, '456786587887', 92, 92, 70, 'RON', 'IMG-20211102-WA0010.jpg', 'IMG-20211102-WA0003.jpg', 'MANN', 0, 0, '2022-07-19 14:53:33', '2022-07-19 14:53:33', 0, 1),
(194, 90510103, 151, 220, '43587', 92, 92, 85, 'RON', 'IMG-20211102-WA0005.jpg', 'IMG-20211102-WA0004.jpg', 'MANN', 0, 19, '2022-07-19 14:54:51', '2022-07-19 14:54:51', 0, 1),
(195, 249534191, 151, 221, '6768787', 92, 92, 45, 'RON', 'IMG-20211102-WA0001.jpg', 'IMG-20211102-WA0002.jpg', 'MANN', 0, 19, '2022-07-19 14:55:37', '2022-07-19 14:55:37', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `old_city`
--

DROP TABLE IF EXISTS `old_city`;
CREATE TABLE IF NOT EXISTS `old_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `old_city`
--

INSERT INTO `old_city` (`city_id`, `country`, `region_id`, `city_name`) VALUES
(17, 1, 12, 'Sector 1'),
(18, 1, 12, 'Sector 2'),
(19, 1, 12, 'Sector 3'),
(20, 1, 12, 'Sector 4'),
(21, 1, 12, 'Sector 5'),
(22, 1, 12, 'Sector 6'),
(23, 1, 27, 'Cluj-Napoca'),
(24, 1, 41, 'Timișoara'),
(25, 1, 38, 'IaÈ™i'),
(26, 1, 28, 'Constanta'),
(27, 1, 31, 'Craiova'),
(28, 1, 23, 'BraÈ™ov'),
(29, 1, 22, 'Galati'),
(30, 1, 35, 'Ploiesti'),
(31, 1, 19, 'Oradea'),
(32, 1, 22, 'BrÄƒila'),
(33, 1, 16, 'Arad'),
(34, 1, 17, 'PiteÈ™ti'),
(35, 1, 47, 'Sibiu'),
(36, 1, 6, 'Bacau'),
(37, 1, 41, 'TÃ¢rgu MureÈ™'),
(38, 1, 39, 'Baia Mare'),
(39, 1, 24, 'BuzÄƒu'),
(40, 1, 21, 'BotoÈ™ani'),
(41, 1, 37, 'Satu Mare'),
(42, 1, 43, 'Ramnicu Valcea'),
(43, 1, 40, 'Drobeta-Turnu Severin'),
(44, 1, 48, 'Suceava'),
(45, 1, 42, 'Piatra NeamÈ›'),
(46, 1, 34, 'TÃ¢rgu Jiu'),
(47, 1, 30, 'TÃ¢rgoviÈ™te'),
(48, 1, 45, 'Focsani'),
(49, 1, 20, 'BistriÈ›a'),
(50, 1, 42, 'Tulcea'),
(51, 1, 26, 'ReÈ™iÈ›a'),
(52, 1, 43, 'Slatina'),
(53, 1, 25, 'CÄƒlÄƒraÈ™i'),
(54, 1, 15, 'Alba Iulia'),
(55, 1, 33, 'Giurgiu'),
(56, 1, 36, 'Deva'),
(57, 1, 36, 'Hunedoara'),
(58, 1, 45, 'ZalÄƒu'),
(59, 1, 29, 'SfÃ¢ntu Gheorghe'),
(60, 1, 44, 'Barlad'),
(61, 1, 44, 'Vaslui'),
(62, 1, 42, 'Roman'),
(63, 1, 27, 'Turda'),
(64, 1, 47, 'MediaÈ™'),
(65, 1, 37, 'Slobozia'),
(66, 1, 40, 'Alexandria'),
(67, 1, 14, 'Voluntari'),
(68, 1, 50, 'Lugoj'),
(69, 1, 28, 'Medgidia'),
(70, 1, 18, 'OneÈ™ti'),
(71, 1, 35, 'Miercurea Ciuc'),
(72, 1, 39, 'Sighetu MarmaÈ›iei'),
(73, 1, 36, 'PetroÈ™ani'),
(74, 1, 28, 'Mangalia'),
(75, 1, 32, 'Tecuci'),
(76, 1, 35, 'Odorheiu Secuiesc'),
(77, 1, 24, 'RÃ¢mnicu SÄƒrat'),
(78, 1, 38, 'PaÈ™cani'),
(79, 1, 27, 'PaÈ™cani'),
(80, 1, 41, 'Reghin'),
(81, 1, 28, 'NÄƒvodari'),
(82, 1, 44, 'CÃ¢mpina'),
(83, 1, 13, 'Mioveni'),
(84, 1, 13, 'CÃ¢mpulung'),
(85, 1, 43, 'Caracal'),
(86, 1, 23, 'SÄƒcele'),
(87, 1, 23, 'FÄƒgÄƒraÈ™'),
(88, 1, 37, 'FeteÈ™ti'),
(89, 1, 41, 'SighiÈ™oara'),
(90, 1, 39, 'BorÈ™a'),
(91, 1, 49, 'RoÈ™iorii de Vede'),
(92, 1, 13, 'Curtea de ArgeÈ™'),
(93, 1, 15, 'SebeÈ™'),
(94, 1, 44, 'Husi'),
(96, 1, 48, 'FÄƒlticeni'),
(97, 1, 14, 'Pantelimon'),
(98, 1, 25, 'OlteniÈ›a'),
(99, 1, 49, 'Turnu MÄƒgurele'),
(100, 1, 26, 'CaransebeÈ™'),
(101, 1, 21, 'Dorohoi'),
(102, 1, 36, 'Vulcan'),
(103, 1, 48, 'RÄƒdÄƒuÈ›i'),
(104, 1, 23, 'ZÄƒrneÈ™ti'),
(105, 1, 36, 'Lupeni'),
(106, 1, 15, 'Aiud'),
(107, 1, 36, 'Petrila'),
(108, 1, 27, 'CÃ¢mpia Turzii'),
(109, 1, 14, 'Buftea'),
(110, 1, 41, 'TÃ¢rnÄƒveni'),
(111, 1, 14, 'PopeÈ™ti-Leordeni'),
(112, 1, 18, 'MoineÈ™ti'),
(113, 1, 23, 'Codlea'),
(114, 1, 15, 'Cugir'),
(115, 1, 46, 'Carei'),
(116, 1, 27, 'Gherla'),
(117, 1, 15, 'Blaj'),
(118, 1, 18, 'ComÄƒneÈ™ti'),
(119, 1, 42, 'TÃ¢rgu NeamÈ›'),
(120, 1, 30, 'Moreni'),
(121, 1, 29, 'TÃ¢rgu Secuiesc'),
(122, 1, 35, 'Gheorgheni'),
(123, 1, 36, 'OrÄƒÈ™tie'),
(124, 1, 43, 'BalÈ™'),
(125, 1, 44, 'BÄƒicoi'),
(126, 1, 43, 'Dragasani'),
(127, 1, 19, 'Salonta'),
(128, 1, 31, 'BÄƒileÈ™ti'),
(129, 1, 31, 'Calafat'),
(130, 1, 28, 'CernavodÄƒ'),
(131, 1, 31, 'FiliaÈ™i'),
(132, 1, 48, 'CÃ¢mpulung Moldovenesc'),
(133, 1, 43, 'Corabia'),
(134, 1, 54, 'Adjud'),
(135, 1, 44, 'Breaza'),
(136, 1, 26, 'BocÈ™a'),
(137, 1, 19, 'Marghita'),
(138, 1, 39, 'Baia Sprie'),
(139, 1, 14, 'Bragadiru'),
(140, 1, 41, 'LuduÈ™'),
(141, 1, 37, 'Urziceni'),
(142, 1, 39, 'ViÈ™eu de Sus'),
(143, 1, 23, 'RÃ¢È™nov'),
(144, 1, 18, 'BuhuÈ™i'),
(145, 1, 13, 'È˜tefÄƒneÈ™ti'),
(146, 1, 36, 'Brad'),
(147, 1, 45, 'È˜imleu Silvaniei'),
(148, 1, 48, 'Vatra Dornei'),
(149, 1, 44, 'Mizil'),
(150, 1, 47, 'CisnÄƒdie'),
(151, 1, 30, 'Pucioasa'),
(152, 1, 57, 'Barajevo'),
(153, 1, 49, 'Zimnicea'),
(154, 1, 35, 'TopliÈ›a'),
(155, 1, 14, 'Otopeni'),
(156, 1, 28, 'Ovidiu'),
(157, 1, 48, 'Gura Humorului'),
(158, 1, 30, 'GÄƒeÈ™ti'),
(159, 1, 48, 'Vicovu de Sus'),
(160, 1, 37, 'ÈšÄƒndÄƒrei'),
(161, 1, 15, 'Ocna MureÈ™'),
(162, 1, 33, 'Bolintin-Vale'),
(163, 1, 47, 'Avrig'),
(164, 1, 16, 'Pecica'),
(165, 1, 57, 'Lazarevac'),
(166, 1, 36, 'Simeria'),
(167, 1, 26, 'Moldova NouÄƒ'),
(168, 1, 50, 'SÃ¢nnicolau Mare'),
(169, 1, 44, 'VÄƒlenii de Munte'),
(170, 1, 18, 'DÄƒrmÄƒneÈ™ti'),
(171, 1, 31, 'DÄƒbuleni'),
(172, 1, 44, 'Comarnic'),
(173, 1, 46, 'NegreÈ™ti-OaÈ™'),
(174, 1, 34, 'Rovinari'),
(175, 1, 43, 'ScorniceÈ™ti'),
(176, 1, 39, 'TÃ¢rgu LÄƒpuÈ™'),
(177, 1, 19, 'SÄƒcueni'),
(178, 1, 49, 'Videle'),
(179, 1, 16, 'SÃ¢ntana'),
(180, 1, 26, 'OraviÈ›a'),
(181, 1, 18, 'TÃ¢rgu Ocna'),
(182, 1, 36, 'CÄƒlan'),
(183, 1, 44, 'BoldeÈ™ti-ScÄƒeni'),
(184, 1, 14, 'MÄƒgurele'),
(185, 1, 38, 'HÃ¢rlÄƒu'),
(186, 1, 43, 'DrÄƒgÄƒneÈ™ti-Olt'),
(187, 1, 50, 'Jimbolia'),
(188, 1, 54, 'MÄƒrÄƒÈ™eÈ™ti'),
(189, 1, 19, 'BeiuÈ™'),
(190, 1, 20, 'Beclean'),
(191, 1, 44, 'UrlaÈ›i'),
(192, 1, 26, 'OÈ›elu RoÈ™u'),
(193, 1, 40, 'Strehaia'),
(194, 1, 38, 'TÃ¢rgu Frumos'),
(195, 1, 40, 'OrÈ™ova'),
(196, 1, 44, 'Sinaia'),
(197, 1, 45, 'Jibou'),
(198, 1, 41, 'Sovata'),
(199, 1, 13, 'CosteÈ™ti'),
(200, 1, 22, 'Ianca'),
(201, 1, 16, 'Lipova'),
(202, 1, 48, 'Dolhasca'),
(203, 1, 13, 'Topoloveni'),
(204, 1, 28, 'Murfatlar'),
(205, 1, 24, 'Nehoiu'),
(206, 1, 21, 'FlÄƒmÃ¢nzi'),
(207, 1, 29, 'Covasna'),
(208, 1, 19, 'AleÈ™d'),
(209, 1, 19, 'Valea lui Mihai'),
(210, 1, 21, 'Darabani'),
(211, 1, 35, 'Cristuru Secuiesc'),
(212, 1, 20, 'SÃ¢ngeorz-BÄƒi'),
(213, 1, 48, 'Liteni'),
(214, 1, 30, 'Titu'),
(215, 1, 36, 'HaÈ›eg'),
(216, 1, 16, 'Ineu'),
(217, 1, 20, 'NÄƒsÄƒud'),
(218, 1, 27, 'Huedin'),
(219, 1, 54, 'OdobeÈ™ti'),
(220, 1, 28, 'HÃ¢rÈ™ova'),
(221, 1, 34, 'BumbeÈ™ti-Jiu'),
(222, 1, 39, 'Seini'),
(223, 1, 48, 'Salcea'),
(224, 1, 38, 'Podu Iloaiei'),
(225, 1, 28, 'Eforie'),
(226, 1, 36, 'Uricani'),
(227, 1, 29, 'Baraolt'),
(228, 1, 44, 'BuÈ™teni'),
(229, 1, 46, 'TÄƒÈ™nad'),
(231, 1, 41, 'Iernut'),
(232, 1, 47, 'Agnita'),
(233, 1, 42, 'Roznov'),
(234, 1, 51, 'Babadag'),
(235, 1, 52, 'BÄƒbeni'),
(236, 1, 34, 'TÃ¢rgu CÄƒrbuneÈ™ti'),
(237, 1, 53, 'NegreÈ™ti'),
(238, 1, 50, 'RecaÈ™'),
(239, 1, 48, 'Siret'),
(240, 1, 51, 'MÄƒcin'),
(241, 1, 16, 'ChiÈ™ineu-CriÈ™'),
(242, 1, 44, 'Plopeni'),
(243, 1, 33, 'MihÄƒileÈ™ti'),
(244, 1, 39, 'È˜omcuta Mare'),
(245, 1, 30, 'Fieni'),
(246, 1, 29, 'ÃŽntorsura BuzÄƒului'),
(247, 1, 52, 'CÄƒlimÄƒneÈ™ti'),
(248, 1, 54, 'Panciu'),
(249, 1, 16, 'NÄƒdlac'),
(250, 1, 15, 'Zlatna'),
(251, 1, 24, 'PÄƒtÃ¢rlagele'),
(252, 1, 45, 'Cehu Silvaniei'),
(253, 1, 37, 'Amara'),
(254, 1, 39, 'Ulmeni'),
(255, 1, 23, 'Victoria'),
(256, 1, 25, 'BudeÈ™ti'),
(257, 1, 26, 'Anina'),
(258, 1, 47, 'DumbrÄƒveni'),
(259, 1, 15, 'CÃ¢mpeni'),
(260, 1, 24, 'Pogoanele'),
(261, 1, 39, 'TÄƒuÈ›ii-MÄƒgherÄƒuÈ™'),
(262, 1, 34, 'Tismana'),
(263, 1, 16, 'Curtici'),
(264, 1, 28, 'Techirghiol'),
(265, 1, 41, 'SÄƒrmaÈ™u'),
(266, 1, 35, 'VlÄƒhiÈ›a'),
(267, 1, 48, 'Cajvana'),
(268, 1, 21, 'SÄƒveni'),
(269, 1, 31, 'Segarcea'),
(270, 1, 16, 'PÃ¢ncota'),
(271, 1, 46, 'Livada'),
(272, 1, 30, 'RÄƒcari'),
(273, 1, 41, 'Ungheni'),
(274, 1, 50, 'FÄƒget'),
(275, 1, 47, 'TÄƒlmaciu'),
(276, 1, 50, 'BuziaÈ™'),
(277, 1, 25, 'Fundulea'),
(278, 1, 53, 'Murgeni'),
(279, 1, 15, 'TeiuÈ™'),
(280, 1, 22, 'ÃŽnsurÄƒÈ›ei'),
(281, 1, 42, 'Bicaz'),
(282, 1, 32, 'TÃ¢rgu Bujor'),
(283, 1, 19, 'È˜tei'),
(284, 1, 25, 'Lehliu GarÄƒ'),
(285, 1, 52, 'Horezu'),
(286, 1, 50, 'Deta'),
(287, 1, 44, 'SlÄƒnic'),
(288, 1, 43, 'Piatra-Olt'),
(289, 1, 46, 'Ardud'),
(290, 1, 35, 'BÄƒlan'),
(291, 1, 40, 'VÃ¢nju Mare'),
(292, 1, 48, 'Frasin'),
(293, 1, 52, 'Brezoi'),
(294, 1, 43, 'Potcoava'),
(295, 1, 50, 'GÄƒtaia'),
(296, 1, 48, 'BroÈ™teni'),
(297, 1, 34, 'Novaci'),
(298, 1, 41, 'Miercurea Nirajului'),
(299, 1, 40, 'Baia de AramÄƒ'),
(300, 1, 47, 'CopÈ™a MicÄƒ'),
(301, 1, 21, 'È˜tefÄƒneÈ™ti'),
(302, 1, 41, 'SÃ¢ngeorgiu de PÄƒdure'),
(303, 1, 36, 'Geoagiu'),
(304, 1, 47, 'SÄƒliÈ™te'),
(305, 1, 50, 'Ciacova'),
(306, 1, 23, 'Rupea'),
(307, 1, 48, 'MiliÈ™ÄƒuÈ›i'),
(308, 1, 51, 'Isaccea'),
(309, 1, 15, 'Abrud'),
(310, 1, 28, 'Negru VodÄƒ'),
(311, 1, 37, 'FierbinÈ›i-TÃ¢rg'),
(312, 1, 39, 'Cavnic'),
(313, 1, 39, 'SÄƒliÈ™tea de Sus'),
(314, 1, 26, 'BÄƒile Herculane'),
(315, 1, 52, 'BÄƒlceÈ™ti'),
(316, 1, 52, 'BerbeÈ™ti'),
(317, 1, 23, 'Ghimbav'),
(318, 1, 23, 'Predeal'),
(319, 1, 34, 'Èšicleni'),
(320, 1, 44, 'Azuga'),
(321, 1, 36, 'Aninoasa'),
(322, 1, 21, 'Bucecea'),
(323, 1, 52, 'BÄƒile OlÄƒneÈ™ti'),
(324, 1, 18, 'SlÄƒnic Moldova'),
(325, 1, 47, 'Miercurea Sibiului'),
(326, 1, 51, 'Sulina'),
(327, 1, 15, 'Baia de ArieÈ™'),
(328, 1, 22, 'FÄƒurei'),
(329, 1, 47, 'Ocna Sibiului'),
(330, 1, 31, 'Bechet'),
(331, 1, 37, 'CÄƒzÄƒneÈ™ti'),
(332, 1, 39, 'DragomireÈ™ti'),
(333, 1, 52, 'Ocnele Mari'),
(334, 1, 32, 'BereÈ™ti'),
(335, 1, 35, 'Borsec'),
(336, 1, 52, 'BÄƒile Govora'),
(337, 1, 19, 'VaÈ™cÄƒu'),
(338, 1, 19, 'Nucet'),
(339, 1, 48, 'Solca'),
(340, 1, 35, 'BÄƒile TuÈ™nad');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `has_slider` tinyint(4) NOT NULL,
  `has_banner` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `menu_id`, `has_slider`, `has_banner`) VALUES
(6, 6, 0, 0),
(7, 4, 0, 0),
(8, 7, 0, 0),
(9, 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partparams`
--

DROP TABLE IF EXISTS `partparams`;
CREATE TABLE IF NOT EXISTS `partparams` (
  `param_id` int(11) NOT NULL AUTO_INCREMENT,
  `param` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`param_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partparams`
--

INSERT INTO `partparams` (`param_id`, `param`, `user_id`) VALUES
(3, 99999999999, 77),
(4, 1, 89),
(6, 1, 92),
(7, 1, 92),
(8, 99999999999, 91),
(9, 99999999999, 93),
(25, 2, 94),
(26, 1, 94),
(24, 99999999999, 94),
(29, 1, 87);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `part_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `request` varchar(255) COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `measure_unity` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `part_title` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `part_code` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `part_image` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `part_image1` text COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `part_type` bigint(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`part_id`, `request`, `measure_unity`, `part_title`, `part_code`, `quantity`, `part_image`, `part_image1`, `part_type`, `status`) VALUES
(209, '674860325', 'Set', 'Izolare', NULL, 1, 'Mahindra XUV.jpg', '', 1, 1),
(207, '674860325', 'set', 'disc frane', NULL, 4, NULL, NULL, 1, 1),
(208, '674860325', 'bucata', 'Parbriz', NULL, 1, NULL, NULL, 1, 1),
(206, '1044986616', 'Set', 'Disc Frana', NULL, 4, '', '', 1, 1),
(203, '1972185820', 'Set', 'Disc Frana', NULL, 4, '', '', 1, 1),
(202, '1972185820', 'Set', 'Placii de franare', NULL, 8, NULL, NULL, 1, 1),
(204, '554128380', 'bucata', 'Placii Frane', NULL, 2, NULL, NULL, 1, 1),
(205, '554128380', 'bucata', 'Volanta', NULL, 2, NULL, NULL, 1, 1),
(210, '1323260724', 'bucata', 'Volanta', '1223', 1, NULL, NULL, 1, 1),
(211, '1323260724', 'Bucata', 'Bucsa', '122', 1, '', '', 1, 1),
(212, '1080945168', NULL, NULL, NULL, NULL, NULL, NULL, 99999999999, NULL),
(213, '1292421396\r\n', 'buc', 'simering 10x40x7', '2343545656476', 2, NULL, NULL, 1, 1),
(214, '1292421396\r\n', 'buc', 'planetara dreapta', '456786587887', 1, 'IMG-20211102-WA0006.jpg', '', 1, 1),
(215, '217883198', NULL, NULL, NULL, NULL, NULL, NULL, 99999999999, NULL),
(216, '1515045767', 'buc', 'janta r17', '3455646466446', 4, NULL, NULL, 1, 1),
(217, '1515045767', 'buc', 'senzor roata', 'e5r543545645', 4, NULL, NULL, 1, 1),
(218, '1515045767', 'buc', 'anvelopa 205/85/17', '2343546565656', 4, '13X2225.jpg', '', 1, 1),
(219, '2111208565', 'buc', 'filtru aer Mann', NULL, 1, NULL, NULL, 1, 1),
(220, '2111208565', 'buc', 'filtru combustibil', NULL, 1, NULL, NULL, 1, 1),
(221, '2111208565', 'buc', 'filtru ulei Mann', NULL, 1, '', '', 1, 1),
(222, '2023000344', 'buc', 'CUREA', '2343534', 2, NULL, NULL, NULL, 1),
(223, '2023000344', 'buc', 'DIFUZOARE', '2343546565656', 2, 'TCS5018.png', '', 99999999999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(199) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating`, `user_id`, `rated_by`) VALUES
(6, 1, 89, 77),
(5, 3, 77, 89);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`region_id`, `region_name`, `country`) VALUES
(6, 'Bacau', 1),
(7, 'Bihor', 1),
(8, 'Bistrita Nasaud', 1),
(9, 'Botosani', 1),
(10, 'Brasov', 1),
(11, 'Braila', 1),
(12, 'Bucuresti', 1),
(13, 'Buzau', 1),
(14, 'Caras Severin', 1),
(15, 'Calarasi', 1),
(16, 'Cluj', 1),
(17, 'Constanta', 1),
(19, 'Covasna', 1),
(20, 'Dambovita', 1),
(21, 'Dolj', 1),
(22, 'Galati', 1),
(23, 'Giurgiu', 1),
(24, 'Gorj', 1),
(25, 'Harghita', 1),
(26, 'Hunedoara', 1),
(27, 'Ialomita', 1),
(28, 'Iasi', 1),
(29, 'Ilfov', 1),
(30, 'Maramures', 1),
(31, 'Mehedinti', 1),
(32, 'Mures', 1),
(33, 'Neamt', 1),
(34, 'Olt', 1),
(35, 'Prahova', 1),
(36, 'Salaj', 1),
(37, 'Satu Mare', 1),
(38, 'Sibiu', 1),
(39, 'Suceava', 1),
(40, 'Teleorman', 1),
(41, 'Timis', 1),
(42, 'Tulcea', 1),
(43, 'Valcea', 1),
(44, 'Vaslui', 1),
(45, 'Vrancea', 1),
(47, 'Alba', 1),
(48, 'Arges', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestdatas`
--

DROP TABLE IF EXISTS `requestdatas`;
CREATE TABLE IF NOT EXISTS `requestdatas` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `data_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `request` varchar(255) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM AUTO_INCREMENT=403 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestdatas`
--

INSERT INTO `requestdatas` (`data_id`, `data_label`, `data_content`, `request`) VALUES
(402, 'Observatii\"', '', '2023000344'),
(400, 'Combustibil\"', 'Motorina', '2023000344'),
(401, 'Tip', 'Suv', '2023000344'),
(399, 'Capacitate cilindrica', '1800', '2023000344'),
(398, 'Putere kw', '105', '2023000344'),
(397, 'Seria sasiu VIN din talon', '122334545676887987980980', '2023000344'),
(396, 'Anul fabricatiei', '2021', '2023000344'),
(395, 'Model auto', 'dacia DUSTER', '2023000344'),
(393, 'Observatii\"', '', '2111208565'),
(394, 'Marca auto', 'dacia', '2023000344'),
(392, 'Tip', 'Combi', '2111208565'),
(391, 'Combustibil\"', 'Motorina', '2111208565'),
(390, 'Motorizare', '1956', '2111208565'),
(389, 'Capacitate cilindrica', '1956', '2111208565'),
(388, 'Putere kw', '88', '2111208565'),
(387, 'Seria sasiu VIN din talon', 'W0LGT8ER7F1029413', '2111208565'),
(386, 'Anul fabricatiei', '2015', '2111208565'),
(385, 'Model auto', 'INSIGNIA', '2111208565'),
(384, 'Marca auto', 'OPEL', '2111208565'),
(383, 'Tip', 'Aliaj', '1515045767'),
(382, 'Dimensiune janta', 'r17', '1515045767'),
(381, 'Dimensiune anvelopa', '205/85/17', '1515045767'),
(380, 'Seria de sasiu VIN din talon', 'dacia456666666666', '1515045767'),
(379, 'Motorizare', 'dacia', '1515045767'),
(378, 'An fabricatie', '5', '1515045767'),
(377, 'Model auto', 'dacia', '1515045767'),
(376, 'Marca auto', 'dacia', '1515045767'),
(375, 'Tip', 'Otel', '217883198'),
(374, 'Dimensiune janta', 'r17', '217883198'),
(373, 'Dimensiune anvelopa', '205/85/17', '217883198'),
(372, 'Seria de sasiu VIN din talon', '32435436457654757', '217883198'),
(371, 'Motorizare', '1800', '217883198'),
(370, 'An fabricatie', '2021', '217883198'),
(369, 'Model auto', 'duster', '217883198'),
(368, 'Marca auto', 'dacia', '217883198'),
(367, 'Observatii\"', 'este un test', '1292421396'),
(366, 'Tip', 'Limuzina', '1292421396'),
(365, 'Combustibil\"', 'Benzina', '1292421396'),
(364, 'Motorizare', '1600', '1292421396'),
(363, 'Capacitate cilindrica', '1600', '1292421396'),
(362, 'Putere kw', '55', '1292421396'),
(361, 'Seria sasiu VIN din talon', '123456789123456789989808', '1292421396'),
(360, 'Anul fabricatiei', '2022', '1292421396'),
(359, 'Model auto', 'civic', '1292421396'),
(358, 'Marca auto', 'honda', '1292421396'),
(357, 'Alte', '', '1080945168'),
(356, 'An fabricatie', '2019', '1080945168'),
(355, 'Model motocicleta / atv', '487b', '1080945168'),
(354, 'Marca motocicleta / atv', 'Freeway', '1080945168'),
(353, 'Observatii\"', 'Carambolat in accident vreau sa l repar', '554128380'),
(352, 'Tip', 'Limuzina', '554128380'),
(351, 'Combustibil\"', 'Benzina', '554128380'),
(350, 'Motorizare', '6000', '554128380'),
(349, 'Capacitate cilindrica', '12', '554128380'),
(348, 'Putere kw', '120', '554128380'),
(347, 'Seria sasiu VIN din talon', 'BMW12345678', '554128380'),
(346, 'Anul fabricatiei', '2020', '554128380'),
(345, 'Model auto', '750', '554128380'),
(344, 'Marca auto', 'BMW', '554128380'),
(343, 'Observatii\"', 'Am probleme cu sistemul de frana.', '1146106651'),
(342, 'Tip', 'Limuzina', '1146106651'),
(341, 'Combustibil\"', 'Benzina', '1146106651'),
(340, 'Motorizare', '1990', '1146106651'),
(339, 'Capacitate cilindrica', '6', '1146106651'),
(338, 'Putere kw', '110', '1146106651'),
(337, 'Seria sasiu VIN din talon', 'Mercedesqwe4r5t6t543', '1146106651'),
(336, 'Anul fabricatiei', '2009', '1146106651'),
(335, 'Model auto', 's500', '1146106651'),
(334, 'Marca auto', 'Mercedes', '1146106651'),
(333, 'Observatii\"', 'Am probleme cu sistemul de frana.', '1619700975'),
(332, 'Tip', 'Limuzina', '1619700975'),
(331, 'Combustibil\"', 'Benzina', '1619700975'),
(330, 'Motorizare', '1990', '1619700975'),
(329, 'Capacitate cilindrica', '6', '1619700975'),
(327, 'Seria sasiu VIN din talon', 'Mercedesqwe4r5t6t543', '1619700975'),
(328, 'Putere kw', '110', '1619700975'),
(326, 'Anul fabricatiei', '2009', '1619700975'),
(325, 'Model auto', 's500', '1619700975'),
(324, 'Marca auto', 'Mercedes', '1619700975');

-- --------------------------------------------------------

--
-- Table structure for table `requestformcomponents`
--

DROP TABLE IF EXISTS `requestformcomponents`;
CREATE TABLE IF NOT EXISTS `requestformcomponents` (
  `component_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `form_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`component_id`)
) ENGINE=MyISAM AUTO_INCREMENT=678 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestformcomponents`
--

INSERT INTO `requestformcomponents` (`component_id`, `html`, `form_id`, `position`) VALUES
(6, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 7, 1),
(7, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 7, 2),
(4, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 10, 2),
(9, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"min=“1930” max=“2100”required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 7, 3),
(11, '<div class=\"col-md-4\">\n                <label>Combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Benzina \"> Benzina </option>\r\n<option value=\" Motorina \"> Motorina </option>\r\n<option value=\" Gpl \"> Gpl </option>\r\n<option value=\" Electrica \"> Electrica</option>\r\n<option value=\" Hibrid \"> Hibrid </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Combustibil\">\n                </div>', 7, 7),
(13, '<div class=\"col-md-4\">\n                <label>Capacitate cilindrica*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitate cilindrica\">\n                </div>', 7, 5),
(14, '<div class=\"col-md-4\">\n                <label>Putere kw*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere kw\">\n                </div>', 7, 4),
(170, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 31, 2),
(16, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n                </div>', 10, 3),
(17, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 10, 5),
(18, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 10, 6),
(503, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 10, 4),
(20, '<div class=\"col-md-4\">\n                <label>Tip vehicul*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Scuter\"> Scuter </option>\r\n<option value=\" Motocicleta\"> Motocicleta </option>\r\n<option value=\" Motocicleta cu atas\"> Motocicleta cu atas</option>\r\n<option value=\" Motocicleta pe 3 roti\"> Motocicleta pe 3 roti </option>\r\n<option value=\" Atv\"> Atv</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip vehicul\">\n                </div>', 10, 1),
(21, '<div class=\"col-md-4\">\n                <label>Tip combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Benzina\"> Benzina</option>\r\n<option value=\" Electric\"> Electric</option>\r\n<option value=\" Hibrid\"> Hibrid</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip combustibil\">\n                </div>', 10, 7),
(22, '<div class=\"col-md-4\">\n                <label>Dotari suplimentare</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Dotari suplimentare\">\n                </div>', 10, 8),
(76, '<div class=\"col-md-4\">\n                <label>Model utilaj*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model utilaj\">\n                </div>', 11, 67),
(75, '<div class=\"col-md-4\">\n                <label>Marca utilaj*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca utilaj\">\n                </div>', 11, 66),
(74, '<div class=\"col-md-4\">\n                <label>Tip utilaj  ex mini excavator*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Tip utilaj  ex mini excavator\">\n                </div>', 11, 65),
(26, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 12, 21),
(27, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 12, 22),
(28, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 12, 23),
(29, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 12, 24),
(30, '<div class=\"col-md-4\">\n                <label>Combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Benzina \"> Benzina </option>\r\n<option value=\" Motorina \"> Motorina </option>\r\n<option value=\" Gpl \"> Gpl </option>\r\n<option value=\" Electrica \"> Electrica</option>\r\n<option value=\" Hibrid \"> Hibrid </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Combustibil\">\n                </div>', 12, 25),
(31, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Pickup\"> Pickup </option>\r\n<option value=\" Izoterma\"> Izoterma </option>\r\n<option value=\" Caroserie inchisa\"> Caroserie inchisa </option>\r\n<option value=\" Caroserie mixta\"> Caroserie mixta</option>\r\n<option value=\" Prelata\"> Prelata </option>\r\n<option value=\" Obloane\"> Obloane </option>\r\n<option value=\" Basculanta\"> Basculanta</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 12, 26),
(32, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 12, 27),
(33, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 13, 28),
(34, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 13, 29),
(35, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 13, 30),
(36, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Izoterma\"> Izoterma </option>\r\n<option value=\" Caroserie inchisa\"> Caroserie inchisa </option>\r\n<option value=\" Caroserie mixta\"> Caroserie mixta</option>\r\n<option value=\" Prelata\"> Prelata </option>\r\n<option value=\" Obloane\"> Obloane </option>\r\n<option value=\" Basculanta\"> Basculanta</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 13, 31),
(37, '<div class=\"col-md-4\">\n                <label>Combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Benzina \"> Benzina </option>\r\n<option value=\" Motorina \"> Motorina </option>\r\n<option value=\" Gpl \"> Gpl </option>\r\n<option value=\" Electrica \"> Electrica</option>\r\n<option value=\" Hibrid \"> Hibrid </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Combustibil\">\n                </div>', 13, 32),
(38, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 13, 33),
(39, '<div class=\"col-md-4\">\n                <label>Marca camion*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca camion\">\n                </div>', 14, 1),
(40, '<div class=\"col-md-4\">\n                <label>Model camion*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model camion\">\n                </div>', 14, 2),
(41, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 14, 4),
(42, '<div class=\"col-md-4\">\n                <label>Combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Motorina \"> Motorina </option>\r\n<option value=\" Electrica \"> Electrica</option>\r\n<option value=\" Hibrid \"> Hibrid </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Combustibil\">\n                </div>', 14, 5),
(43, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 14, 6),
(44, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Basculanta\"> Basculanta</option>\r\n<option value=\" Carosata\"> Carosata</option>\r\n<option value=\" Izoterma\"> Izoterma</option>\r\n<option value=\" Dublu izoterma\"> Dublu izoterma</option>\r\n<option value=\" Obloane\"> Obloane</option>\r\n<option value=\" Prelata\"> Prelata</option>\r\n<option value=\" Cherestea\"> Cherestea</option>\r\n<option value=\" Cap tractor\"> Cap tractor</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 14, 7),
(45, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 15, 2),
(46, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 15, 3),
(47, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 15, 4),
(48, '<div class=\"col-md-4\">\n                <label>Numar locuri*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar locuri\">\n                </div>', 15, 6),
(49, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Microbuz\"> Microbuz</option>\r\n<option value=\" Autobuz\"> Autobuz</option>\r\n<option value=\" Autocar\"> Autocar</option>\r\n<option value=\" Autocar etajat\"> Autocar etajat</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 15, 1),
(536, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 15, 5),
(51, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 16, 2),
(52, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n                </div>', 16, 3),
(53, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 16, 4),
(56, '<div class=\"col-md-4\">\n                <label>Numar axe*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar axe\">\n                </div>', 16, 5),
(55, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n                </div>', 16, 6),
(57, '<div class=\"col-md-4\">\n                <label>Tip Remorca</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Izoterma\"> Izoterma</option>\r\n<option value=\" Dublu izoterma\"> Dublu izoterma</option>\r\n<option value=\" Obloane\"> Obloane</option>\r\n<option value=\" Prelata\"> Prelata</option>\r\n<option value=\" Cherestea\"> Cherestea</option>\r\n<option value=\" Cisterna\"> Cisterna</option>\r\n<option value=\" Altceva\"> Altceva</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip Remorca\">\n                </div>', 16, 1),
(58, '<div class=\"col-md-4\">\n                <label>Tip anvelope*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Vara \"> Vara </option>\r\n<option value=\" Iarna \"> Iarna </option>\r\n<option value=\" All season \"> All season </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip anvelope\">\n                </div>', 17, 52),
(59, '<div class=\"col-md-4\">\n                <label>Dimensiune anvelopa ex 235/45 R17*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune anvelopa ex 235/45 R17\">\n                </div>', 17, 53),
(60, '<div class=\"col-md-4\">\n                <label>Profil*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Profil\">\n                </div>', 17, 54),
(61, '<div class=\"col-md-4\">\n                <label>Marca anvelopa ex Dunlop , Michelin</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca anvelopa ex Dunlop , Michelin\">\n                </div>', 17, 55),
(62, '<div class=\"col-md-4\">\n                <label>Dimensiunea ex 6.00/ R9*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiunea ex 6.00/ R9\">\n                </div>', 18, 56),
(63, '<div class=\"col-md-4\">\n                <label>Profil</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Profil\">\n                </div>', 18, 57),
(64, '<div class=\"col-md-4\">\n                <label>Marca anvelopa</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca anvelopa\">\n                </div>', 18, 58),
(65, '<div class=\"col-md-4\">\n                <label>Dimensiunea ex 10,0/75 R15,3*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiunea ex 10,0/75 R15,3\">\n                </div>', 19, 59),
(66, '<div class=\"col-md-4\">\n                <label>Profil</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Profil\">\n                </div>', 19, 60),
(67, '<div class=\"col-md-4\">\n                <label>Marca anvelopa</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca anvelopa\">\n                </div>', 19, 61),
(68, '<div class=\"col-md-4\">\n                <label>Dimensiune anvelopa ex 18/ R19,5*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune anvelopa ex 18/ R19,5\">\n                </div>', 20, 62),
(69, '<div class=\"col-md-4\">\n                <label>Profil*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Profil\">\n                </div>', 20, 63),
(70, '<div class=\"col-md-4\">\n                <label>Marca anvelopa</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca anvelopa\">\n                </div>', 20, 64),
(71, '<div class=\"col-md-4\">\n                <label>Dimensiune anvelopa ex 235/75 R17,5*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune anvelopa ex 235/75 R17,5\">\n                </div>', 21, 65),
(72, '<div class=\"col-md-4\">\n                <label>Profil*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Profil\">\n                </div>', 21, 66),
(73, '<div class=\"col-md-4\">\n                <label>Marca anvelopa</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca anvelopa\">\n                </div>', 21, 67),
(77, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 11, 68),
(78, '<div class=\"col-md-4\">\n                <label>Capacitate cilindrica</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitate cilindrica\">\n                </div>', 11, 69),
(513, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 11, 397),
(80, '<div class=\"col-md-4\">\n                <label>Dimensiunea ex R185/55-17*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiunea ex R185/55-17\">\n                </div>', 22, 71),
(81, '<div class=\"col-md-4\">\n                <label>Marca</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 22, 72),
(82, '<div class=\"col-md-4\">\n                <label>Dimensiunea ex 195/75R16C*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiunea ex 195/75R16C\">\n                </div>', 23, 73),
(83, '<div class=\"col-md-4\">\n                <label>Marca</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 23, 74),
(84, '<div class=\"col-md-4\">\n                <label>Anotimp*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\"Vara \"> Vara</option>\r\n<option value=\"Iarna \"> Iarna</option>\r\n<option value=\"All season \"> All season</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Anotimp\">\n                </div>', 23, 75),
(85, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 24, 76),
(86, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 24, 77),
(87, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 24, 78),
(88, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n                </div>', 24, 79),
(89, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 24, 80),
(90, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 24, 81),
(91, '<div class=\"col-md-4\">\n                <label>Tip Jante*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Otel \"> Otel</option>\r\n<option value=\" Aliaj \"> Aliaj</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip Jante\">\n                </div>', 24, 82),
(92, '<div class=\"col-md-4\">\n                <label>Dimensiune janta ex 17 inch*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta ex 17 inch\">\n                </div>', 24, 83),
(93, '<div class=\"col-md-4\">\n                <label>Numar prezoane  ex 6 prezoane*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane  ex 6 prezoane\">\n                </div>', 24, 84),
(94, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 25, 85),
(95, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n                </div>', 25, 86),
(96, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 25, 87),
(97, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 25, 88),
(98, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 25, 89),
(99, '<div class=\"col-md-4\">\n                <label>Tip Jante*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Otel \"> Otel  </option>\r\n<option value=\" Aliaj \"> Aliaj  </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip Jante\">\n                </div>', 25, 90),
(101, '<div class=\"col-md-4\">\n                <label>Dimensiune janta ex 21 inch*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta ex 21 inch\">\n                </div>', 25, 91),
(102, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n                </div>', 26, 92),
(103, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 26, 93),
(104, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 26, 94),
(105, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 26, 95),
(106, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n                </div>', 26, 96),
(107, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n                </div>', 26, 97),
(108, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 26, 98),
(109, '<div class=\"col-md-4\">\n                <label>Dimensiune janta ex 22 inch*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta ex 22 inch\">\n                </div>', 26, 99),
(110, '<div class=\"col-md-4\">\n                <label>Numar prezoane  ex 4 prezoane*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane  ex 4 prezoane\">\n                </div>', 26, 100),
(112, '<div class=\"col-md-4\">\n                <label>Tip punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Punte simpla \"> Punte simpla </option>\r\n<option value=\" Punte dubla\"> Punte dubla </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip punte\">\n                </div>', 26, 101),
(113, '<div class=\"col-md-4\">\n                <label>Punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option vlaue=\" Punte fata \"> Punte fata </option>\r\n<option vlaue=\" Punte spate \"> Punte spate</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Punte\">\n                </div>', 26, 102),
(114, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n                </div>', 26, 103),
(115, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 27, 104),
(116, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n                </div>', 27, 105),
(117, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 27, 106),
(118, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 27, 107),
(119, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 27, 108),
(120, '<div class=\"col-md-4\">\n                <label>Dimensiune janta  (inch)*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta  (inch)\">\n                </div>', 27, 109),
(121, '<div class=\"col-md-4\">\n                <label>Numar prezoane  ex 6 prezoane*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane  ex 6 prezoane\">\n                </div>', 27, 110),
(122, '<div class=\"col-md-4\">\n                <label>Tip punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Punte spate \"> Punte spate </option>\r\n<option value=\" Punte fata \"> Punte fata </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip punte\">\n                </div>', 27, 111),
(123, '<div class=\"col-md-4\">\n                <label>Punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Punte simpla \"> Punte simpla</option>\r\n<option value=\" Punte dubla \"> Punte dubla</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Punte\">\n                </div>', 27, 112),
(124, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n                </div>', 27, 113),
(125, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 28, 114),
(127, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n                </div>', 28, 115),
(128, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 28, 116),
(129, '<div class=\"col-md-4\">\n                <label>Anul fabricatiei</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Anul fabricatiei\">\n                </div>', 28, 117),
(130, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 28, 118),
(131, '<div class=\"col-md-4\">\n                <label>Dimensiune janta  (inch)*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta  (inch)\">\n                </div>', 28, 119),
(132, '<div class=\"col-md-4\">\n                <label>Numar prezoane*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane\">\n                </div>', 28, 120),
(133, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n                </div>', 28, 121),
(134, '<div class=\"col-md-4\">\n                <label>Tip punte*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Punte spate \"> Punte spate</option>\r\n<option value=\" Punte fata\"> Punte fata</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip punte\">\n                </div>', 28, 122),
(135, '<div class=\"col-md-4\">\n                <label>Punte*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Punte simpla \"> Punte simpla  </option>\r\n<option value=\" Punte dubla  \"> Punte dubla  </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Punte\">\n                </div>', 28, 123),
(137, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n                </div>', 29, 124),
(138, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n                </div>', 29, 125),
(139, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 29, 126),
(140, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 29, 127),
(141, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 29, 128),
(142, '<div class=\"col-md-4\">\n                <label>Dimensiune janta  (inch)*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta  (inch)\">\n                </div>', 29, 129),
(143, '<div class=\"col-md-4\">\n                <label>Numar prezoane  ex 8 prezoane*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane  ex 8 prezoane\">\n                </div>', 29, 130),
(144, '<div class=\"col-md-4\">\n                <label>Tip punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Punte fata \"> Punte fata </option>\r\n<option value=\" Punte spate \"> Punte spate </option>\r\n<option value=\" Altceva \"> Altceva </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip punte\">\n                </div>', 29, 131),
(145, '<div class=\"col-md-4\">\n                <label>Punte</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\">\n                <option value=\" Punte simpla \"> Punte simpla </option>\r\n<option value=\" Punte dubla \"> Punte dubla </option>\r\n<option value=\" Altceva \"> Altceva </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Punte\">\n                </div>', 29, 132),
(146, '<div class=\"col-md-4\">\n                <label>Marca utilaj*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca utilaj\">\n                </div>', 30, 133),
(147, '<div class=\"col-md-4\">\n                <label>Model utilaj*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model utilaj\">\n                </div>', 30, 134);
INSERT INTO `requestformcomponents` (`component_id`, `html`, `form_id`, `position`) VALUES
(148, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n                </div>', 30, 135),
(149, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n                </div>', 30, 136),
(150, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica\">\n                </div>', 30, 137),
(151, '<div class=\"col-md-4\">\n                <label>Dimensiune janta  (inch)*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta  (inch)\">\n                </div>', 30, 138),
(152, '<div class=\"col-md-4\">\n                <label>Dimensiune janta  (inch)*</label>\n                <input type=\"text\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta  (inch)\">\n                </div>', 30, 139),
(153, '<div class=\"col-md-4\">\n                <label>Numar prezoane  ex 8 prezoane*</label>\n                <input type=\"number\" class=\"form-control\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar prezoane  ex 8 prezoane\">\n                </div>', 30, 140),
(154, '<div class=\"col-md-4\">\n                <label>Tip punte*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Punte fata\"> Punte fata </option>\r\n<option value=\" Punte spate\"> Punte spate </option>\r\n<option value=\" Altceva\"> Altceva </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip punte\">\n                </div>', 30, 141),
(155, '<div class=\"col-md-4\">\n                <label>Punte*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Punte simpla \"> Punte simpla </option>\r\n<option value=\" Punte dubla\"> Punte dubla </option>\r\n<option value=\" Altceva \"> Altceva </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Punte\">\n                </div>', 30, 142),
(499, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 7, 3),
(500, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 7, 388),
(169, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 31, 1),
(300, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"668502968\" value=\"1\">AUDIO&ALARME</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab668502968\" value=\"AUDIO&ALARME\">\n                </div>', 31, 11),
(299, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"846008662\" value=\"1\">DETAILING AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab846008662\" value=\"DETAILING AUTO\">\n                </div>', 31, 12),
(298, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"10258852\" value=\"1\">DIAGNOZA COMPUTERIZATA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab10258852\" value=\"DIAGNOZA COMPUTERIZATA\">\n                </div>', 31, 13),
(289, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1821050486\" value=\"1\">TINICHIGERIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1821050486\" value=\"TINICHIGERIE\">\n                </div>', 31, 14),
(279, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"941207179\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab941207179\" value=\"MECANICA USOARA\">\n                </div>', 31, 8),
(286, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2128802484\" value=\"1\">TUNING EXTERIOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2128802484\" value=\"TUNING EXTERIOR\">\n                </div>', 31, 15),
(291, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1048229721\" value=\"1\">MECANICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1048229721\" value=\"MECANICA\">\n                </div>', 31, 16),
(303, '<div class=\"col-md-4\">\n                <label>Prenume persoana</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Prenume persoana\">\n				\n                </div>', 33, 16),
(290, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"460316879\" value=\"1\">GEOMETRIE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab460316879\" value=\"GEOMETRIE ROTI\">\n                </div>', 31, 17),
(293, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1222755115\" value=\"1\">RECONDITIONARI TURBINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1222755115\" value=\"RECONDITIONARI TURBINE\">\n                </div>', 31, 18),
(292, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"198485862\" value=\"1\">RESTAURARI AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab198485862\" value=\"RESTAURARI AUTO\">\n                </div>', 31, 19),
(288, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"244277864\" value=\"1\">REVIZII TEHNICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab244277864\" value=\"REVIZII TEHNICE\">\n                </div>', 31, 20),
(281, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1146977189\" value=\"1\">RECONDITIONARI INJECTOARE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1146977189\" value=\"RECONDITIONARI INJECTOARE\">\n                </div>', 31, 9),
(287, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1180901224\" value=\"1\">TAPITERIE SI INTERIOARE AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1180901224\" value=\"TAPITERIE SI INTERIOARE AUTO\">\n                </div>', 31, 21),
(280, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"643210908\" value=\"1\">SERVISE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab643210908\" value=\"SERVISE ROTI\">\n                </div>', 31, 10),
(285, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"744854116\" value=\"1\">TUNING MOTOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab744854116\" value=\"TUNING MOTOR\">\n                </div>', 31, 22),
(284, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"278707658\" value=\"1\">VOPSITORIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab278707658\" value=\"VOPSITORIE\">\n                </div>', 31, 23),
(283, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"988367680\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab988367680\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 31, 35),
(282, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"350187199\" value=\"1\">PIESE FURNIZATE DE SERVISE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab350187199\" value=\"PIESE FURNIZATE DE SERVISE\">\n                </div>', 31, 36),
(197, '\n                <div class=\"col-md-12\">\n                <label>DESCRIERE SERVICII</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=DESCRIERE SERVICII\">\n                </div>\n                ', 31, 34),
(198, '<div class=\"col-md-4\">\n                <label>Poze cu masina</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poze cu masina\">\n                </div>', 31, 30),
(200, '<div class=\"col-md-4\">\n                <label>POZE CU MASINA 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZE CU MASINA 2\">\n                </div>', 31, 31),
(201, '<div class=\"col-md-4\">\n                <label>POZE CU MASINA 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZE CU MASINA 3\">\n                </div>', 31, 32),
(202, '<div class=\"col-md-4\">\n                <label>POZA CU TALONUL</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU TALONUL\">\n                </div>', 31, 33),
(203, '<div class=\"col-md-4\">\n                <label>DATA PREFERATA SERVICE</label>\n                <input type=\"date\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n				\n                </div>', 31, 29),
(204, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 31, 4),
(205, '<div class=\"col-md-4\">\n                <label>Motorizare cm3</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare cm3\">\n				\n                </div>', 31, 5),
(206, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 31, 6),
(207, '<div class=\"col-md-4\">\n                <label>VERSIUNE / VARIANTA</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"VERSIUNE / VARIANTA\">\n				\n                </div>', 31, 3),
(208, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 32, 1),
(209, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 32, 2),
(210, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 32, 3),
(211, '<div class=\"col-md-4\">\n                <label>Dimensiune roti*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune roti\">\n				\n                </div>', 32, 4),
(212, '<div class=\"col-md-4\">\n                <label>Tip jante*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Aliaj \"> Aliaj</option>\r\n<option value=\" Otel \"> Otel</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip jante\">\n                </div>', 32, 5),
(213, '\n                <div class=\"col-md-12\">\n                <label>Serviciul dorit:</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Serviciul dorit:\">\n                </div>\n                ', 32, 13),
(214, '<div class=\"col-md-4\">\n                <label>Stare legala*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" In vederea inmatricularii \"> In vederea inmatricularii</option>\r\n<option value=\" Inregistrat \"> Inregistrat</option>\r\n<option value=\" In vederea inregistrarii \"> In vederea inregistrarii</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Stare legala\">\n                </div>', 33, 3),
(215, '<div class=\"col-md-4\">\n                <label>Numar auto</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar auto\">\n				\n                </div>', 33, 4),
(216, '<div class=\"col-md-4\">\n                <label>Tip auto*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Autoturism \"> Autoturism </option>\r\n<option value=\" Autoturism de teren \"> Autoturism de teren </option>\r\n<option value=\" Automobil mixt \"> Automobil mixt </option>\r\n<option value=\" Motocicleta\"> Motocicleta </option>\r\n<option value=\" Scuter\"> Scuter </option>\r\n<option value=\" Moped \"> Moped </option>\r\n<option value=\" Atv \"> Atv </option>\r\n<option value=\" Moped \"> Moped </option>\r\n<option value=\" Autoutilitara \"> Autoutilitara </option>\r\n<option value=\" Camion \"> Camion </option>\r\n<option value=\" Remorca \"> Remorca </option>\r\n<option value=\" Utilaj agricol\"> Utilaj agricol </option>\r\n<option value=\" Utilaj industrial \"> Utilaj industrial </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip auto\">\n                </div>', 33, 5),
(217, '<div class=\"col-md-4\">\n                <label>Tip combustibil*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Benzina \"> Benzina </option>\r\n<option value=\" Benzina hibrid \"> Benzina hibrid</option>\r\n<option value=\" Benzina si alcool \"> Benzina si alcool</option>\r\n<option value=\" Benzina si Gpl \">Benzina si Gpl </option>\r\n<option value=\" Motorina \"> Motorina </option>\r\n<option value=\" Motorina hibrid \"> Motorina hibrid </option>\r\n<option value=\" Electric \"> Electric</option>\r\n<option value=\" Hibrid \"> Hibrid </option>\r\n<option value=\" Fara combustibil \"> Fara combustibil </option>\r\n<option value=\" Altceva \"> Altceva </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip combustibil\">\n                </div>', 33, 6),
(218, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 33, 7),
(219, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 33, 8),
(220, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 33, 9),
(221, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 33, 10),
(222, '<div class=\"col-md-4\">\n                <label>Masa maxima (kg)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Masa maxima (kg)\">\n				\n                </div>', 33, 11),
(223, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica (cm3)*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica (cm3)\">\n				\n                </div>', 33, 12),
(224, '<div class=\"col-md-4\">\n                <label>Putere (kw)*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere (kw)\">\n				\n                </div>', 33, 13),
(225, '<div class=\"col-md-4\">\n                <label>Numar locuri*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar locuri\">\n				\n                </div>', 33, 14),
(301, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"91628886\" value=\"1\">AERCONDITIONAT&CLIMA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab91628886\" value=\"AERCONDITIONAT&CLIMA\">\n                </div>', 31, 24),
(297, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1298010425\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1298010425\" value=\"ELECTRICA\">\n                </div>', 31, 25),
(296, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1979372551\" value=\"1\">ESAPAMENTE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1979372551\" value=\"ESAPAMENTE\">\n                </div>', 31, 26),
(294, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"998083956\" value=\"1\">ITP</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab998083956\" value=\"ITP\">\n                </div>', 31, 27),
(295, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1398508972\" value=\"1\">INSTALATII GPL</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1398508972\" value=\"INSTALATII GPL\">\n                </div>', 31, 28),
(302, '<div class=\"col-md-4\">\n                <label>Nume persoana / denumire firma*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Nume persoana / denumire firma\">\n				\n                </div>', 33, 15),
(304, '<div class=\"col-md-4\">\n                <label>Cnp persoana / Cui firma*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Cnp persoana / Cui firma\">\n				\n                </div>', 33, 17),
(277, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1006315553\" value=\"1\">RECONDITIONARI POMPE INJECTIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1006315553\" value=\"RECONDITIONARI POMPE INJECTIE\">\n                </div>', 31, 7),
(305, '<div class=\"col-md-4\">\n                <label>Seria BI CI / J reg com Firma</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria BI CI / J reg com Firma\">\n				\n                </div>', 33, 18),
(306, '<div class=\"col-md-4\">\n                <label>Numar BI /CI</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar BI /CI\">\n				\n                </div>', 33, 19),
(307, '<div class=\"col-md-4\">\n                <label>Judet*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Judet\">\n				\n                </div>', 33, 20),
(308, '<div class=\"col-md-4\">\n                <label>Localitate*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Localitate\">\n				\n                </div>', 33, 21),
(309, '<div class=\"col-md-4\">\n                <label>Strada</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Strada\">\n				\n                </div>', 33, 22),
(310, '<div class=\"col-md-4\">\n                <label>Numarul</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numarul\">\n				\n                </div>', 33, 23),
(311, '<div class=\"col-md-4\">\n                <label>Bloc</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Bloc\">\n				\n                </div>', 33, 24),
(312, '<div class=\"col-md-4\">\n                <label>Scara</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Scara\">\n				\n                </div>', 33, 25),
(313, '<div class=\"col-md-4\">\n                <label>Etaj</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Etaj\">\n				\n                </div>', 33, 26),
(314, '<div class=\"col-md-4\">\n                <label>Apartament</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Apartament\">\n				\n                </div>', 33, 27),
(315, '<div class=\"col-md-4\">\n                <label>Cod postal</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Cod postal\">\n				\n                </div>', 33, 28),
(316, '<div class=\"col-md-4\">\n                <label>Perioada asigurata*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option vlaue=\" 1 Luna \"> 1 Luna </option>\r\n<option value=\" 2 LunI \"> 2 LunI </option>\r\n<option value=\" 3 LunI \"> 3 LunI </option>\r\n<option value=\" 4 LunI \"> 4 LunI </option>\r\n<option value=\" 5 LunI \"> 5 LunI </option>\r\n<option value=\" 6 LunI \"> 6 LunI </option>\r\n<option value=\" 7 LunI \"> 7 LunI </option>\r\n<option value=\" 8 LunI \"> 8 LunI </option>\r\n<option value=\" 9 LunI \"> 9 LunI </option>\r\n<option value=\" 10 LunI \"> 10 LunI </option>\r\n<option value=\" 11 LunI \"> 11 LunI </option>\r\n<option value=\" 12 LunI \"> 12 LunI </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Perioada asigurata\">\n                </div>', 33, 1),
(317, '<div class=\"col-md-4\">\n                <label>Data inceperii asigurarii*</label>\n                <input type=\"date\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Data inceperii asigurarii\">\n				\n                </div>', 33, 2),
(318, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n				\n                </div>', 34, 213),
(319, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n				\n                </div>', 34, 214),
(320, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 34, 215),
(321, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica (cm3)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica (cm3)\">\n				\n                </div>', 34, 216),
(322, '\n                <div class=\"col-md-12\">\n                <label>Defectiunea*</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Defectiunea\">\n                </div>\n                ', 34, 217),
(323, '<div class=\"col-md-4\">\n                <label>Marca camion*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca camion\">\n				\n                </div>', 35, 1),
(324, '<div class=\"col-md-4\">\n                <label>Model camion*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model camion\">\n				\n                </div>', 35, 2),
(325, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 35, 3),
(326, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 35, 4),
(327, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica cm3</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica cm3\">\n				\n                </div>', 35, 5),
(329, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Basculanta \"> Basculanta </option>\r\n<option value=\" Carosata \"> Carosata</option>\r\n<option value=\" Izoterma \"> Izoterma</option>\r\n<option value=\" Dublu izoterma \"> Dublu izoterma</option>\r\n<option value=\" Obloane \"> Obloane</option>\r\n<option value=\" Prelata \"> Prelata</option>\r\n<option value=\" Cherestea \"> Cherestea</option>\r\n<option value=\" Cap tractor \"> Cap tractor</option>\r\n<option value=\" Agabaritic\"> Agabaritic</option>\r\n<option value=\" Trailer\"> Trailer</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 35, 6),
(330, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"179410896\" value=\"1\">AER CONDITIONAT & CLIMA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab179410896\" value=\"AER CONDITIONAT & CLIMA\">\n                </div>', 35, 7),
(331, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2085072163\" value=\"1\">AUDIO SI ALARME</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2085072163\" value=\"AUDIO SI ALARME\">\n                </div>', 35, 8),
(332, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"398436778\" value=\"1\">DETAILING AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab398436778\" value=\"DETAILING AUTO\">\n                </div>', 35, 9),
(333, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"774982974\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab774982974\" value=\"ELECTRICA\">\n                </div>', 35, 10),
(334, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"305867124\" value=\"1\">ESAPAMENTE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab305867124\" value=\"ESAPAMENTE\">\n                </div>', 35, 11),
(335, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"830418559\" value=\"1\">GEAMURI AUTO & PARBRIZE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab830418559\" value=\"GEAMURI AUTO & PARBRIZE\">\n                </div>', 35, 12),
(336, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1030774500\" value=\"1\">GEOMETRIE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1030774500\" value=\"GEOMETRIE ROTI\">\n                </div>', 35, 13),
(337, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1517353619\" value=\"1\">ITP</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1517353619\" value=\"ITP\">\n                </div>', 35, 14),
(338, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"433571070\" value=\"1\">MECANICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab433571070\" value=\"MECANICA\">\n                </div>', 35, 15),
(339, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"800133108\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab800133108\" value=\"MECANICA USOARA\">\n                </div>', 35, 16),
(340, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"53753457\" value=\"1\">RECONDITIONARI INJECTOARE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab53753457\" value=\"RECONDITIONARI INJECTOARE\">\n                </div>', 35, 17),
(341, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"995339039\" value=\"1\">RECONDITIONARI POMPE INJECTIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab995339039\" value=\"RECONDITIONARI POMPE INJECTIE\">\n                </div>', 35, 18),
(342, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2095654509\" value=\"1\">RECONDITIONARI TURBINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2095654509\" value=\"RECONDITIONARI TURBINE\">\n                </div>', 35, 19),
(343, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"414637597\" value=\"1\">RESTAURARI AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab414637597\" value=\"RESTAURARI AUTO\">\n                </div>', 35, 20),
(344, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"880334113\" value=\"1\">REVIZII TEHNICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab880334113\" value=\"REVIZII TEHNICE\">\n                </div>', 35, 21),
(345, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"638716071\" value=\"1\">SERVICE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab638716071\" value=\"SERVICE ROTI\">\n                </div>', 35, 22),
(346, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"325350207\" value=\"1\">TAPITERIE SI INTERIOARE AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab325350207\" value=\"TAPITERIE SI INTERIOARE AUTO\">\n                </div>', 35, 23),
(347, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1519705716\" value=\"1\">TINICHIGERIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1519705716\" value=\"TINICHIGERIE\">\n                </div>', 35, 24),
(348, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"111239449\" value=\"1\">TUNING EXTERIOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab111239449\" value=\"TUNING EXTERIOR\">\n                </div>', 35, 25),
(349, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"309290016\" value=\"1\">TUNING MOTOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab309290016\" value=\"TUNING MOTOR\">\n                </div>', 35, 26),
(350, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1534205510\" value=\"1\">VOPSITORIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1534205510\" value=\"VOPSITORIE\">\n                </div>', 35, 27),
(351, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1900751829\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1900751829\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 35, 35),
(352, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1196510817\" value=\"1\">PIESE FURNIZATE DE SERVICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1196510817\" value=\"PIESE FURNIZATE DE SERVICE\">\n                </div>', 35, 34),
(353, '<div class=\"col-md-4\">\n                <label>DATA PREFERATA SERVICE</label>\n                <input type=\"date\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n				\n                </div>', 35, 28),
(354, '<div class=\"col-md-4\">\n                <label>POZA CU CAMIONUL</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU CAMIONUL\">\n                </div>', 35, 29),
(355, '<div class=\"col-md-4\">\n                <label>POZA CU CAMIONUL 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU CAMIONUL 2\">\n                </div>', 35, 30),
(356, '<div class=\"col-md-4\">\n                <label>POZA CU CAMIONUL 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU CAMIONUL 3\">\n                </div>', 35, 31),
(357, '<div class=\"col-md-4\">\n                <label>POZA CU TALONUL</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU TALONUL\">\n                </div>', 35, 32),
(358, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 36, 1),
(359, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 36, 2),
(360, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 36, 4),
(361, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 36, 5),
(362, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica cm3</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica cm3\">\n				\n                </div>', 36, 6),
(363, '<div class=\"col-md-4\">\n                <label>Putere (kw)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere (kw)\">\n				\n                </div>', 36, 8),
(364, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Izoterma \"> Izoterma </option>\r\n<option value=\" Caroserie inchisa \"> Caroserie inchisa </option>\r\n<option value=\" Caroserie mixta \"> Caroserie mixta </option>\r\n<option value=\" Prelata \"> Prelata </option>\r\n<option value=\" Obloane \"> Obloane </option>\r\n<option value=\" Basculanta \"> Basculanta </option>\r\n<option value=\" Altele\"> Altele</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 36, 9),
(365, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"686414438\" value=\"1\">AER CONDITIONAT & CLIMA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab686414438\" value=\"AER CONDITIONAT & CLIMA\">\n                </div>', 36, 10),
(366, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1989129451\" value=\"1\">AUDIO SI ALARME</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1989129451\" value=\"AUDIO SI ALARME\">\n                </div>', 36, 11),
(367, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2104304375\" value=\"1\">DETAILING AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2104304375\" value=\"DETAILING AUTO\">\n                </div>', 36, 12),
(368, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1892238305\" value=\"1\">DIAGNOZA COMPUTERIZATA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1892238305\" value=\"DIAGNOZA COMPUTERIZATA\">\n                </div>', 36, 13),
(369, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"342904177\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab342904177\" value=\"ELECTRICA\">\n                </div>', 36, 14),
(370, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"295304633\" value=\"1\">ESAPAMENTE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab295304633\" value=\"ESAPAMENTE\">\n                </div>', 36, 15),
(371, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1105501039\" value=\"1\">GEAMURI AUTO & PARBRIZE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1105501039\" value=\"GEAMURI AUTO & PARBRIZE\">\n                </div>', 36, 16),
(372, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"706712901\" value=\"1\">GEOMETRIE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab706712901\" value=\"GEOMETRIE ROTI\">\n                </div>', 36, 17),
(373, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1917153337\" value=\"1\">ITP</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1917153337\" value=\"ITP\">\n                </div>', 36, 18),
(374, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2012451031\" value=\"1\">MECANICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2012451031\" value=\"MECANICA\">\n                </div>', 36, 19),
(375, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1781318030\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1781318030\" value=\"MECANICA USOARA\">\n                </div>', 36, 20);
INSERT INTO `requestformcomponents` (`component_id`, `html`, `form_id`, `position`) VALUES
(376, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"436554509\" value=\"1\">RECONDITIONARI INJECTOARE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab436554509\" value=\"RECONDITIONARI INJECTOARE\">\n                </div>', 36, 21),
(377, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"904758624\" value=\"1\">RECONDITIONARI POMPE INJECTIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab904758624\" value=\"RECONDITIONARI POMPE INJECTIE\">\n                </div>', 36, 22),
(378, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1576171308\" value=\"1\">RECONDITIONARI TURBINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1576171308\" value=\"RECONDITIONARI TURBINE\">\n                </div>', 36, 23),
(379, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"413432779\" value=\"1\">REVIZIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab413432779\" value=\"REVIZIE\">\n                </div>', 36, 24),
(380, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1558723848\" value=\"1\">SERVICE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1558723848\" value=\"SERVICE ROTI\">\n                </div>', 36, 25),
(381, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"917254334\" value=\"1\">TAPITERIE SI INTERIOARE AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab917254334\" value=\"TAPITERIE SI INTERIOARE AUTO\">\n                </div>', 36, 26),
(382, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"956349694\" value=\"1\">TINICHIGERIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab956349694\" value=\"TINICHIGERIE\">\n                </div>', 36, 27),
(383, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1867705843\" value=\"1\">TUNING EXTERIOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1867705843\" value=\"TUNING EXTERIOR\">\n                </div>', 36, 28),
(384, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1373398897\" value=\"1\">TUNING MOTOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1373398897\" value=\"TUNING MOTOR\">\n                </div>', 36, 29),
(385, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"574100845\" value=\"1\">VOPSITORIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab574100845\" value=\"VOPSITORIE\">\n                </div>', 36, 30),
(387, '<div class=\"col-md-4\">\n                <label>Versiune / Varianta</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Versiune / Varianta\">\n				\n                </div>', 36, 3),
(390, '<div class=\"col-md-4\">\n                <label>DATA PREFERATA SERVICE</label>\n                <input type=\"date\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"DATA PREFERATA SERVICE\">\n				\n                </div>', 36, 32),
(389, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n				\n                </div>', 36, 7),
(391, '<div class=\"col-md-4\">\n                <label>Poza cu masina</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu masina\">\n                </div>', 36, 33),
(392, '<div class=\"col-md-4\">\n                <label>Poza cu masina 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu masina 2\">\n                </div>', 36, 34),
(393, '<div class=\"col-md-4\">\n                <label>Poza cu masina 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu masina 3\">\n                </div>', 36, 35),
(394, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 36, 36),
(395, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1085661517\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1085661517\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 36, 37),
(396, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"431708465\" value=\"1\">PIESE FURNIZATE DE SERVICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab431708465\" value=\"PIESE FURNIZATE DE SERVICE\">\n                </div>', 36, 38),
(397, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"427107312\" value=\"1\">Altele</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab427107312\" value=\"Altele\">\n                </div>', 36, 31),
(398, '<div class=\"col-md-4\">\n                <label>Tip utilaj  ex mini excavator*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Tip utilaj  ex mini excavator\">\n				\n                </div>', 37, 1),
(399, '<div class=\"col-md-4\">\n                <label>Marca utilaj*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca utilaj\">\n				\n                </div>', 37, 2),
(400, '<div class=\"col-md-4\">\n                <label>Model utilaj*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model utilaj\">\n				\n                </div>', 37, 3),
(401, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 37, 4),
(402, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 37, 5),
(403, '<div class=\"col-md-4\">\n                <label>Putere (kw)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere (kw)\">\n				\n                </div>', 37, 6),
(404, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica (cm3)*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica (cm3)\">\n				\n                </div>', 37, 7),
(405, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1693952382\" value=\"1\">AER CONDITIONAT & CLIMA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1693952382\" value=\"AER CONDITIONAT & CLIMA\">\n                </div>', 37, 8),
(406, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"585497871\" value=\"1\">AUDIO SI ALARME</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab585497871\" value=\"AUDIO SI ALARME\">\n                </div>', 37, 9),
(407, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1449091171\" value=\"1\">DETAILING AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1449091171\" value=\"DETAILING AUTO\">\n                </div>', 37, 10),
(408, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"16977751\" value=\"1\">DIAGNOZA COMPUTERIZATA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab16977751\" value=\"DIAGNOZA COMPUTERIZATA\">\n                </div>', 37, 11),
(409, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1530486326\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1530486326\" value=\"ELECTRICA\">\n                </div>', 37, 12),
(410, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2064823574\" value=\"1\">ESAPAMENTE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2064823574\" value=\"ESAPAMENTE\">\n                </div>', 37, 13),
(411, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1606369311\" value=\"1\">GEAMURI AUTO & PARBRIZE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1606369311\" value=\"GEAMURI AUTO & PARBRIZE\">\n                </div>', 37, 14),
(412, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"579282646\" value=\"1\">GEOMETRIE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab579282646\" value=\"GEOMETRIE ROTI\">\n                </div>', 37, 15),
(413, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1293064038\" value=\"1\">ITP</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1293064038\" value=\"ITP\">\n                </div>', 37, 16),
(414, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1274152705\" value=\"1\">MECANICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1274152705\" value=\"MECANICA\">\n                </div>', 37, 17),
(415, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1370494100\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1370494100\" value=\"MECANICA USOARA\">\n                </div>', 37, 18),
(416, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1138837046\" value=\"1\">RECONDITIONARI INJECTOARE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1138837046\" value=\"RECONDITIONARI INJECTOARE\">\n                </div>', 37, 19),
(417, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"827215950\" value=\"1\">RECONDITIONARI POMPE INJECTIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab827215950\" value=\"RECONDITIONARI POMPE INJECTIE\">\n                </div>', 37, 20),
(418, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"964359586\" value=\"1\">RECONDITIONARI TURBINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab964359586\" value=\"RECONDITIONARI TURBINE\">\n                </div>', 37, 21),
(419, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"874094861\" value=\"1\">REVIZII TEHNICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab874094861\" value=\"REVIZII TEHNICE\">\n                </div>', 37, 22),
(420, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1281354822\" value=\"1\">SERVICE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1281354822\" value=\"SERVICE ROTI\">\n                </div>', 37, 23),
(421, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1075094787\" value=\"1\">TAPITERIE SI INTERIOARE AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1075094787\" value=\"TAPITERIE SI INTERIOARE AUTO\">\n                </div>', 37, 24),
(422, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1699229496\" value=\"1\">TINICHIGERIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1699229496\" value=\"TINICHIGERIE\">\n                </div>', 37, 25),
(423, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"369661987\" value=\"1\">TUNING EXTERIOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab369661987\" value=\"TUNING EXTERIOR\">\n                </div>', 37, 26),
(424, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"579601681\" value=\"1\">TUNING MOTOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab579601681\" value=\"TUNING MOTOR\">\n                </div>', 37, 27),
(425, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"604404188\" value=\"1\">VOPSITORIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab604404188\" value=\"VOPSITORIE\">\n                </div>', 37, 28),
(426, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"979977611\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab979977611\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 37, 35),
(427, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1638563206\" value=\"1\">PIESE FURNIZATE DE SERVICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1638563206\" value=\"PIESE FURNIZATE DE SERVICE\">\n                </div>', 37, 34),
(428, '<div class=\"col-md-4\">\n                <label>Poza utilaj</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza utilaj\">\n                </div>', 37, 29),
(429, '<div class=\"col-md-4\">\n                <label>Poza utilaj 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza utilaj 2\">\n                </div>', 37, 30),
(430, '<div class=\"col-md-4\">\n                <label>Poza utilaj 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza utilaj 3\">\n                </div>', 37, 31),
(431, '<div class=\"col-md-4\">\n                <label>Poza talon</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza talon\">\n                </div>', 37, 32),
(432, '\n                <div class=\"col-md-12\">\n                <label>Descriere problema</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Descriere problema\">\n                </div>\n                ', 37, 33),
(433, '\n                <div class=\"col-md-12\">\n                <label>Descriere problema</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Descriere problema\">\n                </div>\n                ', 35, 33),
(464, '<div class=\"col-md-4\">\n                <label>Tip autocar / microbuz*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Tip autocar / microbuz\">\n				\n                </div>', 38, 1),
(435, '<div class=\"col-md-4\">\n                <label>Marca autocar / microbuz*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca autocar / microbuz\">\n				\n                </div>', 38, 2),
(436, '<div class=\"col-md-4\">\n                <label>Model autocar / microbuz*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model autocar / microbuz\">\n				\n                </div>', 38, 3),
(437, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 38, 5),
(438, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 38, 6),
(439, '<div class=\"col-md-4\">\n                <label>Putere (kw)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere (kw)\">\n				\n                </div>', 38, 7),
(440, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica (cm3)*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica (cm3)\">\n				\n                </div>', 38, 8),
(441, '<div class=\"col-md-4\">\n                <label>Numar de locuri*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar de locuri\">\n				\n                </div>', 38, 9),
(442, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1210222080\" value=\"1\">AER CONDITIONAT & CLIMA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1210222080\" value=\"AER CONDITIONAT & CLIMA\">\n                </div>', 38, 10),
(443, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"629492893\" value=\"1\">AUDIO SI ALARME</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab629492893\" value=\"AUDIO SI ALARME\">\n                </div>', 38, 11),
(444, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1550665392\" value=\"1\">DETAILING AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1550665392\" value=\"DETAILING AUTO\">\n                </div>', 38, 12),
(445, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"887810614\" value=\"1\">DIAGNOZA COMPUTERIZATA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab887810614\" value=\"DIAGNOZA COMPUTERIZATA\">\n                </div>', 38, 13),
(446, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"190712107\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab190712107\" value=\"ELECTRICA\">\n                </div>', 38, 14),
(447, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1696165331\" value=\"1\">ESAPAMENTE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1696165331\" value=\"ESAPAMENTE\">\n                </div>', 38, 15),
(448, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1328065730\" value=\"1\">GEAMURI AUTO & PARBRIZE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1328065730\" value=\"GEAMURI AUTO & PARBRIZE\">\n                </div>', 38, 16),
(449, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"876019619\" value=\"1\">GEOMETRIE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab876019619\" value=\"GEOMETRIE ROTI\">\n                </div>', 38, 17),
(450, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1684130745\" value=\"1\">ITP</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1684130745\" value=\"ITP\">\n                </div>', 38, 18),
(451, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2143591958\" value=\"1\">MECANICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2143591958\" value=\"MECANICA\">\n                </div>', 38, 20),
(452, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"646873806\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab646873806\" value=\"MECANICA USOARA\">\n                </div>', 38, 21),
(453, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"460385571\" value=\"1\">RECONDITIONARI INJECTOARE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab460385571\" value=\"RECONDITIONARI INJECTOARE\">\n                </div>', 38, 22),
(454, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1894769542\" value=\"1\">RECONDITIONARI POMPE INJECTIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1894769542\" value=\"RECONDITIONARI POMPE INJECTIE\">\n                </div>', 38, 23),
(455, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1386958321\" value=\"1\">RECONDITIONARI TURBINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1386958321\" value=\"RECONDITIONARI TURBINE\">\n                </div>', 38, 24),
(456, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2127336021\" value=\"1\">REVIZIE TEHNICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2127336021\" value=\"REVIZIE TEHNICA\">\n                </div>', 38, 19),
(457, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2036264279\" value=\"1\">SERVICE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2036264279\" value=\"SERVICE ROTI\">\n                </div>', 38, 25),
(458, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1752343356\" value=\"1\">TAPITERIE SI INTERIOARE AUTO</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1752343356\" value=\"TAPITERIE SI INTERIOARE AUTO\">\n                </div>', 38, 26),
(459, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1241194465\" value=\"1\">TINICHIGERIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1241194465\" value=\"TINICHIGERIE\">\n                </div>', 38, 27),
(460, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"888122961\" value=\"1\">TUNING EXTERIOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab888122961\" value=\"TUNING EXTERIOR\">\n                </div>', 38, 28),
(461, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1135622083\" value=\"1\">TUNING MOTOR</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1135622083\" value=\"TUNING MOTOR\">\n                </div>', 38, 29),
(462, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1650383845\" value=\"1\">VOPSITORIE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1650383845\" value=\"VOPSITORIE\">\n                </div>', 38, 30),
(463, '<div class=\"col-md-4\">\n                <label>VERSIUNE / VARIANTA</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"VERSIUNE / VARIANTA\">\n				\n                </div>', 38, 4),
(465, '<div class=\"col-md-4\">\n                <label>Imagine autocar / microbuz 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Imagine autocar / microbuz 1\">\n                </div>', 38, 31),
(466, '<div class=\"col-md-4\">\n                <label>Imagine autocar / microbuz 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Imagine autocar / microbuz 2\">\n                </div>', 38, 32),
(467, '<div class=\"col-md-4\">\n                <label>Imagine autocar / microbuz 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Imagine autocar / microbuz 3\">\n                </div>', 38, 33),
(468, '<div class=\"col-md-4\">\n                <label>POZA CU TALONUL</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"POZA CU TALONUL\">\n                </div>', 38, 34),
(469, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"831801868\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab831801868\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 38, 37),
(470, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1726867609\" value=\"1\">PIESE FURNIZATE DE SERVICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1726867609\" value=\"PIESE FURNIZATE DE SERVICE\">\n                </div>', 38, 36),
(471, '\n                <div class=\"col-md-12\">\n                <label>Descriere problema</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Descriere problema\">\n                </div>\n                ', 38, 35),
(472, '<div class=\"col-md-4\">\n                <label>Tip auto*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Autoturism \"> Autoturism </option>\r\n<option value=\" Motocicleta \"> Motocicleta </option>\r\n<option value=\" Autoutilitara \"> Autoutilitara </option>\r\n<option value=\" Camion \"> Camion </option>\r\n<option value=\" Autocar \"> Autocar </option>\r\n<option value=\" Microbuz \"> Microbuz</option>\r\n<option value=\" Autobuz \"> Autobuz</option>\r\n<option value=\" Utilaj industrial\"> Utilaj industrial</option>\r\n<option value=\" Utilaj agricol\"> Utilaj agricol</option>\r\n<option value=\" Altele\"> Altele</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip auto\">\n                </div>', 39, 1),
(473, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 39, 2),
(474, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 39, 3),
(475, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 39, 5),
(476, '<div class=\"col-md-4\">\n                <label>Putere (kw)</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Putere (kw)\">\n				\n                </div>', 39, 6),
(477, '<div class=\"col-md-4\">\n                <label>Capacitatea cilindrica cm3*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Capacitatea cilindrica cm3\">\n				\n                </div>', 39, 7),
(478, '<div class=\"col-md-4\">\n                <label>VERSIUNE / VARIANTA</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"VERSIUNE / VARIANTA\">\n				\n                </div>', 39, 4),
(479, '<div class=\"col-md-4\">\n                <label>Adresa unde este masina*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa unde este masina\">\n				\n                </div>', 39, 8),
(480, '<div class=\"col-md-4\">\n                <label>Telefon client*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Telefon client\">\n				\n                </div>', 39, 9),
(481, '\n                <div class=\"col-md-12\">\n                <label>Descriere problema*</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Descriere problema\">\n                </div>\n                ', 39, 11),
(482, '<div class=\"col-md-4\">\n                <label>Adresa de email</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa de email\">\n				\n                </div>', 39, 10),
(483, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"358641821\" value=\"1\">DIAGNOZA COMPUTERIZATA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab358641821\" value=\"DIAGNOZA COMPUTERIZATA\">\n                </div>', 39, 13),
(484, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"503092050\" value=\"1\">ELECTRICA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab503092050\" value=\"ELECTRICA\">\n                </div>', 39, 14),
(485, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1533680988\" value=\"1\">MECANICA USOARA</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1533680988\" value=\"MECANICA USOARA\">\n                </div>', 39, 15),
(486, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"707934205\" value=\"1\">SERVICE ROTI</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab707934205\" value=\"SERVICE ROTI\">\n                </div>', 39, 16),
(487, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 39, 20),
(488, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 39, 21),
(489, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 39, 22),
(490, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 39, 23),
(491, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"637763923\" value=\"1\">PIESE CUMPARATE DE MINE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab637763923\" value=\"PIESE CUMPARATE DE MINE\">\n                </div>', 39, 24),
(492, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2018941317\" value=\"1\">PIESE FURNIZATE DE SERVICE</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2018941317\" value=\"PIESE FURNIZATE DE SERVICE\">\n                </div>', 39, 25),
(493, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"277858813\" value=\"1\">Deblocare usa / deblocare volan</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab277858813\" value=\"Deblocare usa / deblocare volan\">\n                </div>', 39, 17),
(494, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"572560094\" value=\"1\">Alimentare gresita carburant</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab572560094\" value=\"Alimentare gresita carburant\">\n                </div>', 39, 18),
(495, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1803728486\" value=\"1\">Inlocuire / incarcare baterie</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1803728486\" value=\"Inlocuire / incarcare baterie\">\n                </div>', 39, 19),
(496, '<div class=\"col-md-4\">\n                <label>Servicii service mobil</label>\n                <input type=\"\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Servicii service mobil\">\n				\n                </div>', 39, 12),
(498, '<div class=\"col-md-4\">\n                <label>Tip caroserie*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Limuzina\"> Limuzina </option>\r\n<option value=\" Hatchback\"> Hatchback </option>\r\n<option value=\" Suv\"> Suv </option>\r\n<option value=\" Combi\"> Combi</option>\r\n<option value=\" Cabriolet\"> Cabriolet </option>\r\n<option value=\" Coupe\"> Coupe</option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip caroserie\">\n                </div>', 7, 8),
(504, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 10, 389),
(505, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 10, 390),
(506, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 10, 391),
(507, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 10, 392),
(508, '<div class=\"col-md-4\">\n                <label>Poza din talon</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza din talon\">\n                </div>', 10, 393),
(509, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 7, 394),
(510, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 7, 395),
(511, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 7, 396),
(512, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 7, 397),
(514, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 11, 398),
(515, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 11, 399),
(516, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 11, 400),
(519, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 11, 402),
(518, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 11, 402),
(520, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 12, 403),
(521, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 12, 404),
(522, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 12, 405),
(523, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 12, 406),
(524, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 12, 407),
(525, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 13, 408),
(526, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 13, 409),
(527, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 13, 410),
(528, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 13, 411),
(529, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 13, 412),
(530, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 14, 3),
(531, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 14, 414);
INSERT INTO `requestformcomponents` (`component_id`, `html`, `form_id`, `position`) VALUES
(532, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 14, 415),
(533, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 14, 416),
(534, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 14, 417),
(535, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 14, 418),
(537, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 15, 7),
(538, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 15, 8),
(539, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 15, 9),
(540, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 15, 10),
(541, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 15, 11),
(542, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 16, 424),
(543, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 16, 425),
(544, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 16, 426),
(545, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 16, 427),
(546, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 16, 428),
(547, '<div class=\"col-md-4\">\n                <label>Numar telefon*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar telefon\">\n				\n                </div>', 33, 429),
(548, '<div class=\"col-md-4\">\n                <label>Adresa de email</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa de email\">\n				\n                </div>', 33, 430),
(549, '<div class=\"col-md-4\">\n                <label>Tip autovehicul*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Autoturism \"> Autoturism </option>\r\n<option value=\" Autoturism 4x4 suv  \"> Autoturism 4x4 suv </option>\r\n<option value=\" Motocicleta \"> Motocicleta</option>\r\n<option value=\" Atv\"> Atv</option>\r\n<option value=\" Autoutilitara \"> Autoutilitara </option>\r\n<option value=\" Camion \"> Camion</option>\r\n<option value=\" Microbuz\"> Microbuz </option>\r\n<option value=\" Autocar \"> Autocar </option>\r\n<option value=\" Autobuz \"> Autobuz </option>\r\n<option value=\" Utilaj industrial \"> Utilaj industrial </option>\r\n<option value=\" Utilaj agricol \"> Utilaj agricol</option>\r\n<option value=\" Altele \"> Altele </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip autovehicul\">\n                </div>', 40, 431),
(550, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n				\n                </div>', 40, 432),
(551, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n				\n                </div>', 40, 433),
(552, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n				\n                </div>', 40, 434),
(553, '<div class=\"col-md-4\">\n                <label>Adresa de ridicare*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa de ridicare\">\n				\n                </div>', 40, 435),
(554, '<div class=\"col-md-4\">\n                <label>Adresa de depozitare</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa de depozitare\">\n				\n                </div>', 40, 436),
(555, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 40, 437),
(556, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 40, 438),
(557, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 40, 439),
(558, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 40, 440),
(559, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 40, 441),
(560, '<div class=\"col-md-4\">\n                <label>Tip auto*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Autoturism \"> Autoturism </option>\r\n<option value=\" Autoturism 4x4 suv \"> Autoturism 4x4 suv </option>\r\n<option value=\" Motocicleta \"> Motocicleta </option>\r\n<option value=\" Atv\"> Atv</option>\r\n<option value=\" Autoutilitara \"> Autoutilitara </option>\r\n<option value=\" Autospeciala \"> Autospeciala </option>\r\n<option value=\" Camion \"> Camion </option>\r\n<option value=\" Utilaj industrial \"> Utilaj industrial </option>\r\n<option value=\" Utilaj agricol \"> Utilaj agricol</option>\r\n<option value=\" Utilaj de transport \"> Utilaj de transport </option>\r\n<option value=\" Utilaj pentru transport aagabaritic\"> Utilaj pentru transport agabaritic </option>\r\n<option value=\" Altele \"> Altele </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip auto\">\n                </div>', 41, 442),
(561, '<div class=\"col-md-4\">\n                <label>Marca*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca\">\n				\n                </div>', 41, 443),
(562, '<div class=\"col-md-4\">\n                <label>Model*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model\">\n				\n                </div>', 41, 444),
(563, '<div class=\"col-md-4\">\n                <label>Seria sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria sasiu VIN din talon\">\n				\n                </div>', 41, 445),
(565, '\n                <div class=\"col-md-12\">\n                <label>Accesorii dorite (cu specificatii)</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Accesorii dorite (cu specificatii)\">\n                </div>\n                ', 41, 446),
(566, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 41, 447),
(567, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 41, 448),
(568, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 41, 449),
(569, '<div class=\"col-md-4\">\n                <label>Poza cu talonul</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza cu talonul\">\n                </div>', 41, 450),
(598, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"417528073\" value=\"1\">Vulcanizare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab417528073\" value=\"Vulcanizare roata\">\n                </div>', 43, 1),
(596, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"107223375\" value=\"1\">Echilibrare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab107223375\" value=\"Echilibrare roata\">\n                </div>', 43, 3),
(595, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1594843722\" value=\"1\">Schimbare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1594843722\" value=\"Schimbare roata\">\n                </div>', 43, 2),
(573, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1300248574\" value=\"1\">Elevatoare Vulcanizare</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1300248574\" value=\"Elevatoare Vulcanizare\">\n                </div>', 42, 1),
(594, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1337495454\" value=\"1\">Elevator moto / atv</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1337495454\" value=\"Elevator moto / atv\">\n                </div>', 42, 2),
(593, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1273467247\" value=\"1\">Elevator auto</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1273467247\" value=\"Elevator auto\">\n                </div>', 42, 3),
(576, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1335833132\" value=\"1\">Scule de mana</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1335833132\" value=\"Scule de mana\">\n                </div>', 42, 4),
(577, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"146432467\" value=\"1\">Scule de mana speciale</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab146432467\" value=\"Scule de mana speciale\">\n                </div>', 42, 5),
(578, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1891494725\" value=\"1\">Vulcanizare si aer comprimat</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1891494725\" value=\"Vulcanizare si aer comprimat\">\n                </div>', 42, 7),
(579, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"252335030\" value=\"1\">Diagnoza auto si accesorii</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab252335030\" value=\"Diagnoza auto si accesorii\">\n                </div>', 42, 8),
(580, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1881722089\" value=\"1\">Service climatizare auto</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1881722089\" value=\"Service climatizare auto\">\n                </div>', 42, 9),
(581, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1931604704\" value=\"1\">Sisteme testare injectoare</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1931604704\" value=\"Sisteme testare injectoare\">\n                </div>', 42, 10),
(582, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"399892552\" value=\"1\">Testere baterii</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab399892552\" value=\"Testere baterii\">\n                </div>', 42, 11),
(583, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1154516457\" value=\"1\">Testere alternatoare</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1154516457\" value=\"Testere alternatoare\">\n                </div>', 42, 12),
(584, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1789385716\" value=\"1\">Reglofaruri</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1789385716\" value=\"Reglofaruri\">\n                </div>', 42, 13),
(585, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1974571178\" value=\"1\">Echipamente diverse pentru atelier</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1974571178\" value=\"Echipamente diverse pentru atelier\">\n                </div>', 42, 14),
(586, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1373383343\" value=\"1\">Echipamente pentru curatare si spalare</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1373383343\" value=\"Echipamente pentru curatare si spalare\">\n                </div>', 42, 15),
(587, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1794292340\" value=\"1\">Echipamente de protectie</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1794292340\" value=\"Echipamente de protectie\">\n                </div>', 42, 16),
(588, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1114816540\" value=\"1\">Echipamente de sudura</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1114816540\" value=\"Echipamente de sudura\">\n                </div>', 42, 17),
(589, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1922287333\" value=\"1\">Scule pentru tinichigerie</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1922287333\" value=\"Scule pentru tinichigerie\">\n                </div>', 42, 18),
(590, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"626450941\" value=\"1\">Scule electrice</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab626450941\" value=\"Scule electrice\">\n                </div>', 42, 6),
(591, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"967133355\" value=\"1\">Scule pentru camioane</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab967133355\" value=\"Scule pentru camioane\">\n                </div>', 42, 19),
(592, '\n                <div class=\"col-md-12\">\n                <label>DESCRIERE SCULE SI ECHIPAMENTE</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=DESCRIERE SCULE SI ECHIPAMENTE\">\n                </div>\n                ', 42, 20),
(599, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1328365133\" value=\"1\">Umflare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1328365133\" value=\"Umflare roata\">\n                </div>', 43, 4),
(600, '<div class=\"col-md-4\">\n                <label>Marca motocicleta / atv</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca motocicleta / atv\">\n				\n                </div>', 43, 8),
(601, '<div class=\"col-md-4\">\n                <label>Model motocicleta / atv*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model motocicleta / atv\">\n				\n                </div>', 43, 9),
(602, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 43, 10),
(603, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 43, 11),
(604, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 43, 12),
(605, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 43, 13),
(606, '\n                <div class=\"col-md-12\">\n                <label>Alte observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Alte observatii\">\n                </div>\n                ', 43, 14),
(607, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1085363764\" value=\"1\">Reparatie roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1085363764\" value=\"Reparatie roata\">\n                </div>', 43, 5),
(608, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"666228650\" value=\"1\">Inlocuire anvelopa</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab666228650\" value=\"Inlocuire anvelopa\">\n                </div>', 43, 6),
(609, '<div class=\"col-md-4\">\n                <label>Tip auto*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Autoturism \"> Autoturism </option>\r\n<option value=\" Autoturism 4x4 suv \"> Autoturism4x4 suv </option>\r\n<option value=\" Motocicleta \"> Motocicleta </option>\r\n<option value=\" ATV \"> ATV </option>\r\n<option value=\" Autoutilitara \"> Autoutilitara</option>\r\n<option value=\" Camion \"> Camion </option>\r\n<option value=\" Microbuz\"> Microbuz</option>\r\n<option value=\" Autocar \"> Autocar </option>\r\n<option value=\" Autobuz \"> Autobuz</option>\r\n<option value=\" Utilaj agricol \"> Utilaj agricol</option>\r\n<option value=\" Utilaj industrial \"> Utilaj industrial </option>\r\n<option value=\" Utilaj de transport agabaritic \"> Utilaj de transport agabaritic </option>\r\n<option value=\" Remorca\"> Remorca </option>\r\n<option value=\" Semiremorca\"> Semiremorca </option>\r\n<option value=\" Altele \"> Altele </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip auto\">\n                </div>', 44, 1),
(610, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 44, 2),
(611, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 44, 3),
(612, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 44, 4),
(613, '<div class=\"col-md-4\">\n                <label>Numar roti</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar roti\">\n				\n                </div>', 44, 5),
(614, '\n                <div class=\"col-md-12\">\n                <label>Descriere problema</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Descriere problema\">\n                </div>\n                ', 44, 7),
(615, '<div class=\"col-md-4\">\n                <label>Adresa vehicul (locul unde se afla)*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Adresa vehicul (locul unde se afla)\">\n				\n                </div>', 44, 8),
(616, '<div class=\"col-md-4\">\n                <label>Telefon vehicul*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Telefon vehicul\">\n				\n                </div>', 44, 9),
(617, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 44, 10),
(618, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 44, 11),
(619, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 44, 12),
(620, '<div class=\"col-md-4\">\n                <label>Dimensiune anvelopa ex 235/45 R17 sau 18/R19,5*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune anvelopa ex 235/45 R17 sau 18/R19,5\">\n				\n                </div>', 44, 6),
(632, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 45, 1),
(622, '<div class=\"col-md-4\">\n                <label>Model auto</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 45, 2),
(623, '<div class=\"col-md-4\">\n                <label>An fabricatie</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 45, 3),
(624, '<div class=\"col-md-4\">\n                <label>Dimensiune roata</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune roata\">\n				\n                </div>', 45, 5),
(625, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"697303829\" value=\"1\">Vulcanizare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab697303829\" value=\"Vulcanizare roata\">\n                </div>', 45, 6),
(626, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1044666713\" value=\"1\">Schimbare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1044666713\" value=\"Schimbare roata\">\n                </div>', 45, 7),
(627, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1753114264\" value=\"1\">Echilibrare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1753114264\" value=\"Echilibrare roata\">\n                </div>', 45, 8),
(628, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1960599466\" value=\"1\">Umflare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1960599466\" value=\"Umflare roata\">\n                </div>', 45, 9),
(629, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1286921890\" value=\"1\">Reparatie roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1286921890\" value=\"Reparatie roata\">\n                </div>', 45, 8),
(630, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"2018163475\" value=\"1\">Inlocuire anvelopa</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab2018163475\" value=\"Inlocuire anvelopa\">\n                </div>', 45, 11),
(631, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n				\n                </div>', 45, 4),
(633, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 45, 507),
(634, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 45, 508),
(635, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 45, 509),
(636, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 45, 510),
(637, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 46, 511),
(638, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 46, 512),
(639, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 46, 513),
(640, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n				\n                </div>', 46, 514),
(641, '<div class=\"col-md-4\">\n                <label>Numar axe fata</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar axe fata\">\n				\n                </div>', 46, 515),
(642, '<div class=\"col-md-4\">\n                <label>Numar axe spate</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar axe spate\">\n				\n                </div>', 46, 516),
(643, '<div class=\"col-md-4\">\n                <label>Tonaj</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Tonaj\">\n				\n                </div>', 46, 517),
(644, '<div class=\"col-md-4\">\n                <label>Numar de roti</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Numar de roti\">\n				\n                </div>', 46, 518),
(645, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"555453253\" value=\"1\">Vulcanizare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab555453253\" value=\"Vulcanizare roata\">\n                </div>', 46, 519),
(646, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"10309506\" value=\"1\">Schimbare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab10309506\" value=\"Schimbare roata\">\n                </div>', 46, 520),
(647, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"178558155\" value=\"1\">Echilibrare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab178558155\" value=\"Echilibrare roata\">\n                </div>', 46, 521),
(648, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1712491255\" value=\"1\">Umflare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1712491255\" value=\"Umflare roata\">\n                </div>', 46, 522),
(649, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1113184231\" value=\"1\">Reparatie roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1113184231\" value=\"Reparatie roata\">\n                </div>', 46, 523),
(650, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"798325211\" value=\"1\">Inlocuire anvelopa</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab798325211\" value=\"Inlocuire anvelopa\">\n                </div>', 46, 524),
(652, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"99373789\" value=\"1\">Indreptat janta</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab99373789\" value=\"Indreptat janta\">\n                </div>', 46, 525),
(653, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 46, 526),
(654, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 46, 527),
(655, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 46, 528),
(656, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 46, 529),
(657, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1990414968\" value=\"1\">Vulcanizare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1990414968\" value=\"Vulcanizare roata\">\n                </div>', 32, 6),
(658, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1934360099\" value=\"1\">Schimbare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1934360099\" value=\"Schimbare roata\">\n                </div>', 32, 7),
(659, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1310979983\" value=\"1\">Echilibrare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1310979983\" value=\"Echilibrare roata\">\n                </div>', 32, 8),
(660, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1771936609\" value=\"1\">Umflare roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1771936609\" value=\"Umflare roata\">\n                </div>', 32, 9),
(661, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1675266777\" value=\"1\">Reparatie roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1675266777\" value=\"Reparatie roata\">\n                </div>', 32, 10),
(662, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1006625505\" value=\"1\">Inlocuire anvelopa</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1006625505\" value=\"Inlocuire anvelopa\">\n                </div>', 32, 11),
(663, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1426259871\" value=\"1\">Indreptat janta</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1426259871\" value=\"Indreptat janta\">\n                </div>', 32, 12),
(664, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1046764176\" value=\"1\">Indreptat janta</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1046764176\" value=\"Indreptat janta\">\n                </div>', 43, 7),
(665, '<div class=\"col-md-4\">\n                <label>Marca auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Marca auto\">\n				\n                </div>', 47, 538),
(666, '<div class=\"col-md-4\">\n                <label>Model auto*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Model auto\">\n				\n                </div>', 47, 539),
(667, '<div class=\"col-md-4\">\n                <label>An fabricatie*</label>\n                <input type=\"number\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"An fabricatie\">\n				\n                </div>', 47, 540),
(668, '<div class=\"col-md-4\">\n                <label>Motorizare</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"label[]\" value=\"Motorizare\">\n				\n                </div>', 47, 541),
(669, '<div class=\"col-md-4\">\n                <label>Seria de sasiu VIN din talon*</label>\n                <input type=\"text\" class=\"form-control\" maxlength=\"17\" id=\"length_input\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Seria de sasiu VIN din talon\">\n				\n                </div>', 47, 542),
(670, '<div class=\"col-md-4\">\n                <label>Dimensiune anvelopa*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune anvelopa\">\n				\n                </div>', 47, 543),
(671, '<div class=\"col-md-4\">\n                <label>Dimensiune janta*</label>\n                <input type=\"text\" class=\"form-control\"  id=\"\" name=\"input[]\" style=\"border:none;border-bottom:solid 1px black;\"required>\n                <input type=\"hidden\" name=\"label[]\" value=\"Dimensiune janta\">\n				\n                </div>', 47, 544),
(672, '<div class=\"col-md-4\">\n                <label>Tip janta*</label>\n                <select class=\"form-control\" name=\"input[]\"style=\"height:46px; border:none;border-bottom:solid 1px black;\"required>\n                <option value=\" Otel \"> Otel </option>\r\n<option value=\" Aliaj \"> Aliaj </option>\n                </select>\n                <input type=\"hidden\" name=\"label[]\" value=Tip janta\">\n                </div>', 47, 545),
(673, '<div class=\"col-md-4\"><label><input type=\"checkbox\" class=\"mt-1\" name=\"input_check[]\" id=\"check_box\" data-id=\"1497728274\" value=\"1\">Senzor roata</label>\n                    <input type=\"hidden\" name=\"check_label[]\" id=\"lab1497728274\" value=\"Senzor roata\">\n                </div>', 47, 546),
(674, '\n                <div class=\"col-md-12\">\n                <label>Observatii</label>\n                <textarea class=\"form-control\" name=\"input[]\"placeholder=\"Mentiuni\" cols=\"8\" rows=\"8\"></textarea>\n                <input type=\"hidden\" name=\"label[]\" value=Observatii\">\n                </div>\n                ', 47, 547),
(675, '<div class=\"col-md-4\">\n                <label>Poza 1</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 1\">\n                </div>', 47, 548),
(676, '<div class=\"col-md-4\">\n                <label>Poza 2</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 2\">\n                </div>', 47, 549),
(677, '<div class=\"col-md-4\">\n                <label>Poza 3</label>\n                <input type=\"file\" class=\"form-control\" name=\"image[]\" style=\"border:none;border-bottom:solid 1px black;\">\n                <input type=\"hidden\" name=\"image_label[]\" value=\"Poza 3\">\n                </div>', 47, 550);

-- --------------------------------------------------------

--
-- Table structure for table `requestforms`
--

DROP TABLE IF EXISTS `requestforms`;
CREATE TABLE IF NOT EXISTS `requestforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `has_part` tinyint(11) DEFAULT NULL,
  `has_equipment` tinyint(11) DEFAULT NULL,
  `domain_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestforms`
--

INSERT INTO `requestforms` (`id`, `has_part`, `has_equipment`, `domain_id`) VALUES
(7, 1, 1, 11),
(10, 1, NULL, 12),
(11, 1, 1, 13),
(12, 1, 1, 14),
(13, 0, 0, 15),
(14, 1, 1, 16),
(15, 1, 1, 17),
(16, 1, NULL, 18),
(17, 1, NULL, 19),
(18, 1, NULL, 20),
(19, 1, NULL, 21),
(20, 1, NULL, 22),
(21, 1, NULL, 23),
(22, 1, NULL, 24),
(23, 1, NULL, 25),
(24, 1, NULL, 26),
(25, 1, NULL, 27),
(26, 1, NULL, 28),
(27, 1, NULL, 29),
(28, 1, NULL, 30),
(29, 0, 0, 31),
(30, 0, 0, 32),
(31, 0, NULL, 33),
(32, 0, 0, 34),
(33, 0, 0, 35),
(34, 0, 0, 36),
(35, 0, 0, 37),
(36, 1, NULL, 38),
(37, 0, 0, 39),
(38, 0, 0, 40),
(39, 1, 1, 41),
(40, 0, 0, 42),
(41, 0, 1, 43),
(42, 0, 0, 44),
(43, 0, 0, 45),
(44, 0, 0, 46),
(45, 0, 0, 47),
(46, 0, 0, 48),
(47, 1, NULL, 49);

-- --------------------------------------------------------

--
-- Table structure for table `requestimages`
--

DROP TABLE IF EXISTS `requestimages`;
CREATE TABLE IF NOT EXISTS `requestimages` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `request` int(11) NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestimages`
--

INSERT INTO `requestimages` (`image_id`, `request`, `image`) VALUES
(2, 1310604818, 'IMG-20211102-WA0001.jpg'),
(3, 1310604818, 'IMG-20211102-WA0002.jpg'),
(4, 1310604818, 'IMG-20211102-WA0003.jpg'),
(5, 1310604818, 'IMG-20211102-WA0010.jpg'),
(6, 277581543, 'IMG-20211102-WA0002.jpg'),
(7, 277581543, 'IMG-20211102-WA0003.jpg'),
(8, 277581543, 'IMG-20211102-WA0010.jpg'),
(9, 277581543, 'IMG-20211102-WA0010.jpg'),
(10, 964824387, 'IMG_20220519_122935.jpg'),
(11, 964824387, 'IMG_20220519_114717.jpg'),
(12, 964824387, 'marker_toro_white__02635_zoom.jpg'),
(13, 964824387, 'banner.jpg'),
(14, 2121656605, 'IMG-20211102-WA0007.jpg'),
(15, 2121656605, 'IMG-20211102-WA0004.jpg'),
(16, 2121656605, 'IMG-20211102-WA0005.jpg'),
(17, 554128380, 'creta.jpg'),
(18, 554128380, 'ecosport.png'),
(19, 554128380, 'Fortuner.png'),
(20, 554128380, 'jaguarxf.jpg'),
(21, 554128380, 'mghector.jpg'),
(22, 554128380, 'hondacr.jpg'),
(23, 554128380, 'hyundai0.png'),
(24, 554128380, 'rangero.jpg'),
(25, 554128380, 'nexon.jpg'),
(26, 1080945168, 'creta.jpg'),
(27, 1080945168, 'ecosport.png'),
(28, 1080945168, 'audi-a4.jpg'),
(29, 1292421396, 'IMG-20211102-WA0001.jpg'),
(30, 1292421396, 'IMG-20211102-WA0002.jpg'),
(31, 1292421396, 'IMG-20211102-WA0004.jpg'),
(32, 1292421396, 'IMG-20211102-WA0007.jpg'),
(33, 1292421396, 'IMG-20211102-WA0007.jpg'),
(34, 1292421396, 'IMG-20211102-WA0006.jpg'),
(35, 1292421396, 'IMG-20211102-WA0007.jpg'),
(36, 1515045767, 'Bare-Transversale-Auto.jpg'),
(37, 1515045767, '6PK1888.jpg'),
(38, 1515045767, '6PK2075.jpg'),
(39, 1515045767, '10X950.jpg'),
(40, 1515045767, '10X1000.jpg'),
(41, 2111208565, 'CI RUS IOAN 2019.jpg'),
(42, 2023000344, 'TCS 5018.png'),
(43, 2023000344, '5PK1250.jpg'),
(44, 2023000344, '5PK1250.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_number` int(11) DEFAULT NULL,
  `request_domain` int(11) DEFAULT NULL,
  `request_location` int(11) DEFAULT NULL,
  `request_city` int(1) NOT NULL,
  `rural_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `searching_params` tinyint(1) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `personal_code` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `brand` bigint(20) DEFAULT NULL,
  `has_part` tinyint(1) DEFAULT NULL,
  `part_type` bigint(20) DEFAULT NULL,
  `has_equipment` tinyint(1) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `form_used` tinyint(1) NOT NULL,
  `request_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_number`, `request_domain`, `request_location`, `request_city`, `rural_name`, `delivery_address`, `searching_params`, `added_by`, `personal_code`, `status`, `brand`, `has_part`, `part_type`, `has_equipment`, `relation`, `created_at`, `updated_at`, `form_used`, `request_url`) VALUES
(152, 2023000344, 11, 12, 9, 'Tiganesti Topoloveni', 'Splaiul unirii nr 450', 1, 77, 1762744581, 1, 99999999999, 0, 99999999999, 1, NULL, '2022-10-24 11:35:41', '2022-10-24 11:35:41', 0, 'PO1o1OLESAQ9AWnFUgTseYE62RshKA39lLaPiXja'),
(151, 2111208565, 11, 12, 9, NULL, 'SPLAIUL UNIRII ,nr 450,COMPLEX AUTOVIT,STAND C1', 1, 92, 2037194517, 0, 99999999999, 1, 1, 1, NULL, '2022-07-19 14:51:05', '2022-07-19 15:08:30', 0, '5hKPutfN7JLilL9i8WXPoaaxHE5gcV7SpLIEqs3J'),
(150, 1515045767, 49, 12, 6, 'sector 1', 'Splaiul unirii nr 450', 1, 77, 1762744581, 0, 99999999999, 1, 1, 0, NULL, '2022-07-18 12:58:17', '2022-07-18 14:48:42', 0, '5B3GOpkTRexVNiTmJMfwrwXcAX87MrVCnGK4qwXT'),
(149, 217883198, 49, 12, 9, 'sector 4', 'Splaiul unirii nr 450', 1, 77, 1762744581, 1, 99999999999, 0, 99999999999, 0, NULL, '2022-07-18 12:31:11', '2022-07-18 12:31:11', 0, 'BTAwjv8gxOGnKcrJ6s62tuViiyzQL2VGsHCBCQnY'),
(148, 1292421396, 11, 12, 16, 'Tiganesti Topoloveni', 'Splaiul unirii nr 450', NULL, 77, 1762744581, 0, 99999999999, 1, 1, 1, NULL, '2022-07-18 10:47:39', '2022-07-18 12:06:15', 0, '7Q8eFW6uO4QDDmeFAgncIbeXslx4ELasxXmcJMW8'),
(147, 1080945168, 45, 47, 16, NULL, 'Alea abrud 10', 1, 87, 1351304974, 1, 99999999999, 0, 99999999999, 0, NULL, '2022-07-17 09:39:31', '2022-07-17 09:39:31', 0, 'BAm1lfF20OKP3MtUKNDVzhvfn9dPkvvWakCcBWwt'),
(146, 1323260724, 11, 47, 16, NULL, 'Alea abrud 10', NULL, 87, 1351304974, 0, 99999999999, 1, 1, NULL, NULL, '2022-07-16 18:18:53', '2022-07-17 09:22:27', 1, 'ppkMqhstvc1SR4RmICxpCy9mFOBx3Z0rKJ5rSxJe'),
(145, 554128380, 11, 47, 16, NULL, 'Alea abrud 10', 1, 87, 1351304974, 1, 99999999999, 1, 1, 1, NULL, '2022-07-16 12:01:31', '2022-07-16 12:01:31', 0, 'ATC8Tkx53VVacPK7PqE5bo8XfUHW5VJ3QZmkBOBV'),
(144, 1146106651, 11, 47, 16, NULL, 'Alea abrud 10', 1, 87, 1351304974, 1, 99999999999, 1, 1, 1, NULL, '2022-07-16 11:48:11', '2022-07-16 11:48:11', 0, 'FePu9BA47L2TzSFwgGNo63TAK36E3BLRiJZqeoOS'),
(143, 1619700975, 11, 47, 16, NULL, 'Alea abrud 10', 1, 87, 1351304974, 1, 99999999999, 1, 1, 1, NULL, '2022-07-16 11:45:50', '2022-07-16 11:45:50', 0, 'C08d0Q0hNV5yfQbuxQphHFpH2kd8bgWlUwpLTIKJ');

-- --------------------------------------------------------

--
-- Table structure for table `returs`
--

DROP TABLE IF EXISTS `returs`;
CREATE TABLE IF NOT EXISTS `returs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `ammount` float NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `image1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `mentions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(4) DEFAULT 0,
  `confirm_enddate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `generalsetting_id` tinyint(4) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `is_visible` tinyint(4) DEFAULT NULL,
  `admin_type` tinyint(4) DEFAULT NULL,
  `page_type` text CHARACTER SET utf8 COLLATE utf8_romanian_ci DEFAULT NULL,
  `folder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `html`, `generalsetting_id`, `page_id`, `is_visible`, `admin_type`, `page_type`, `folder`, `position`) VALUES
(18, '\n                <div class=\"row ml-5 mr-5\">\n					<div class=\"col-lg-12\">\n						<article class=\"post single\">\n							<div class=\"post-media\">\n								<img src=\"../platform/frontend/assets/images/sections/http://wawto.ro/imagini/WAWTO.png\" alt=\"Post\">\n							</div><!-- End .post-media -->\n\n							<div class=\"post-body\">\n							<p>Clienti, Introducere :</p>\r\n<p>Clientii platformei wawto.ro sunt persoane fizice si juridice interesate sa achizitioneze componente si servicii auto moto de orice fel.Clientii vor accesa platformei wawto.ro introducand adresa de email si parola pentru crearea contului, apoi va avea acces la platforma unde il asteapta sute de furnizori.Pentru a intra in legatura cu acestia vor trebui sa completeze cerere de oferta care are anumite campuri obligatorii.Va trimite cererea de oferta avand doua optiuni cautare locala si nationala.Daca doreste sa afle in zona care se afla se conecteaza la cautare locala daca nu&nbsp; se afla in zona respectiva opteaza pentru cautare nationala.Astfel cererea trimisa odata va ajunge la toti furnizorii aflati in zona sau in intreaga tara.In cel mai scurt timp furnizorii vor vizualiza cerea dvs si o vor procesa cu rapiditate si veti primi ofertele pe email.Pe masura ce veti primi mai multe oferte veti alege cea mai buna oferta din punct de vedere finaciar cat si al termenului de livrare.Dupa ce veti alege cea mai buna oferta actionati butonul comanda va trebui sa confirmati modalitatea de livrare (ridicare personala,curier,sau prin logistica furnizorului)modalitatea de plata (card sau ramburs),iar apoi butonul de confirmare comanda.Furnizorul va pregati piesa si veti primi confirmarea livrarii.Urmeaza sa primiti produsele sau serviciile solicitate la domiciliu sau la sediu furnizorului.In cazul in care intampinati dificultati furnizorul nu respecta indicatiile sau livreaza altceva puteti accesa pagina de reclamati.Clientul nu plateste nici un comision si sa acorde un rating, sa confirme ca produsele si serviciile sunt in regula.</p>\r\n<p>-----------------------------------------------------------</p>\r\n<p>comisioane :</p>\r\n<p>Pentru partea de en detail comisionul este de 5% 4% la anvelope jante 5%, accesorii 5%, servicii 5%, scule si echipamente 5% asigurari 5%, tractari 5%.Clientul nu plateste nici un comision pe platforma wawto.ro.Pentru partea de en-gros comisionul este de 3%, 2,5% la anvelope jante 3%, accesorii 3%, servicii 3%, scule si echipamente 3% asigurari 3%, tractari 3%.</p>\r\n<p>-------------------------------------------------------------</p>\r\n<p>Drepturi: Au dreptul de a beneficia de comenzi in mod egal in functie de comenzile pe le primesc de la clienti, au dreptul sa-si primeasca plata pentru marfurile si serviciile prestate in max 5 zile lucratoare de la confirmarea receptiei de la client.</p>\r\n<p>--------------------------------------------------------------</p>\r\n<p>Obligatii: De a raspunde la solicitarile clientilor cat mai rapid posibil de a intocmi oferte serioase reale, de a respecta termenii si conditiile pe care le au, de a livra produsele conform ofertei intocmite in termenul stabilit, de asi achita comisioanele pe platforma wawto.ro in max 5 zile lucratoare din momentul achitarii contravalorii marfurilor sau serviciilor de catre client.Au obligatie de asigura garantie pentru marfurile si serviciile prestate conform legii.Au obligativitatea de asi plati lunar taxa de folosire a platformei wawto.ro.</p>\r\n<p>-------------------------------------------------------------</p>\r\n<p>Introducere la furnizori:&nbsp;</p>\r\n<p>Platforma wawto.ro ofera furnizorilor de componente si servicii auto posibilitatea de a accesa o piata online unde poate avea acces la solicitarile clientilor si isi pot vinde produsele si serviciile.Inscrierea se va face pe baza documentelor, copie certificat firma, copie ci administrator, copie dovada de platitor tva daca este cazul.Inscrierea se face in baza unei analize asupra bonitatii si seriozitatii solicitantului.In momentul in care ati trimis confirmarea veti completa formularul de inscriere, urmand sa primiti contractul de asociere.Veti primi contractul si il veti semna si stampila si il veti incarca in cont.Dupa care puteti avea acces la clientii din categoriile la care v-ati inscris ex vulcanizare, piese auto, etc.La inscrierea pe platforma wawto.ro trebuie sa specificati in ce domeniu va asociati sau ce domeniu de activitate aveti de ex: piese auto, piese camioane, etc.Solicitarile de la clienti se vor gasi in solicitari de oferta la sectiunea SOLICITARI OFERTE PRET.Veti raspunde la solicitarile pe care le veti considera de interes pentru dvs, completand o oferta care trebuie sa fie ferma cu pret corespunzator, termen de livrare cu valabilitatea ofertei si de rezervarea a piesei ca atat cat e valabila oferta.</p>\r\n<p>--------------------------------------------------------------</p>\r\n<p>Drepturile clientilor:</p>\r\n<p>Clienti platformei wawto.ro sunt persoane fizice si juridice care pot acesa platforma prin introducerea adresei de email si a nr de telefon putand sa achizitioneze componente si servicii auto moto fara a plati comision pe platforma.Platforma wawto.ro nu percepe comision pentru clienti.Deasemeni clienti au dreptul de a beneficia de componente si servicii de calitate conform solicitarilor lor beneficiind de garantie conform legislatiei in vigoare.Au dreptul de a putea returna produsul in starea initiala in termen de 30 zile conform legislatiei in vigoare.Au dreptul la asistenta din partea platformei wawto.ro.</p>\r\n<p>--------------------------------------------------------------</p>\r\n<p>Codul de comportament:</p>\r\n<p>Clientii platformei wawto.ro vor respecta legislatia in vigoare, vor avea un comportament civilizat, decent, bazat pe dialog si respect reciproc.Nu sunt admise mesaje cu caracter obscen, injurios.Asfel de derapaje pot fi sanctionate cu excluderea din platforma wawto.ro sau scaderea ratingului</p>\r\n<p>-------------------------------------------------------------</p>\r\n<p>Conditii de securitate:</p>\r\n<p>Platforma wawto.ro asigura securizarea datelor din contul clientilor cat si furnizorilor.Securizarea se asigura prin criptarea datelor.Este interzisa lasarea datelor personale clientilor in cererea de oferta pentru a va putea securitatea.Clarificarile se fac prin operatorul de servicii wawto.ro</p>\r\n<p>--------------------------------------------------------------</p>\r\n<p>Clienti Plati:</p>\r\n<p>&nbsp;</p>\r\n<p>Clientii platformei wawto.ro persoane fizice si juridice, pot efectua platile pentru produsele achizitionate dupa platforma wawto.ro in urmatoarele moduri: Ordin de plata, card, ramburs sau numerar direct la sediu.</p>\r\n<p>-------------------------------------------------------------</p>\r\n<p>Funtionalitatea platformei wawto.ro:</p>\r\n<p>Platforma wawto.ro este o piata online unde clienti si furnizorii se intalnesc in timp real.Din perspectiva clientului platforma functioneaza pe baza contului deschis in cadrul platformei prin completarea cererii de oferta, acceptarea ofertei corespunzatoare si eliberarea si confirmarea comenzii.De asemeni trebuie confirmata adresa de livrare modalitatea de livrare si sistemul de plata.In cazul in care intampinati probleme cu navigatia accesati chatul sau telefonati la numarul afisat.In cazul in care aveti probleme cu furnizorii ne trimiteti un mesaj prin pagina de contact al sitului wawto.ro.</p>\r\n<p>-------------------------------------------------------------</p>\n\n								\n								</div><!-- End .post-content -->\n\n							</div><!-- End .post-body -->\n						</article><!-- End .post -->\n\n						<hr class=\"mt-2 mb-1\">', 1, 8, NULL, 1, NULL, 'http://wawto.ro/imagini', NULL),
(17, '\n                <div class=\"row ml-5 mr-5\">\n					<div class=\"col-lg-12\">\n						<article class=\"post single\">\n							<div class=\"post-media\">\n								<img src=\"../platform/frontend/assets/images/sections/http://wawto.ro/imagini/WAWTO.png\" alt=\"Post\">\n							</div><!-- End .post-media -->\n\n							<div class=\"post-body\">\n							<p>&nbsp;Suntem o echipa formata din it-sti si manageri in domeniul auto&nbsp; care activeaza in domeniul auto de peste 30 ani si ne propunem sa dezvoltam un site la nivel international in domeniul componentelor si serviciilor auto, care sa raspunda in cel mai scurt timp solicitarilor clientilor atat persoane fizice cat si juridice.Idea a luat nastere ca urmare a deficientelor constatate pe piata interna a termenilor de livrare foarte lungi cat si a barierelor impuse de pandemia covid.Ne propunem sa ne conectam cu toti operatorii in domeniu de pe intreg mapamondul astfel orice reper sa fie indentificat in max 48 ore pe Platforma wawto.ro.De asemenea pentru piata en-gros ne propunem sa intermediem si sa asiguram fluxuri de marfuri din orice tara.</p>\n\n								\n								</div><!-- End .post-content -->\n\n							</div><!-- End .post-body -->\n						</article><!-- End .post -->\n\n						<hr class=\"mt-2 mb-1\">', 1, 6, NULL, 1, NULL, 'http://wawto.ro/imagini', NULL),
(19, '\n                <div class=\"row ml-5 mr-5\">\n					<div class=\"col-lg-12\">\n						<article class=\"post single\">\n							<div class=\"post-media\">\n								<img src=\"../platform/frontend/assets/images/sections/http://wawto.ro/imagini/0219551-ANPC.jpg\" alt=\"Post\">\n							</div><!-- End .post-media -->\n\n							<div class=\"post-body\">\n							<h1 class=\"entry-title\" style=\"margin: 0px; padding: 50px 72px 0px; font-family: Arial, Helvetica, sans-serif; box-sizing: border-box; font-size: 32px; color: #363636; font-weight: normal; line-height: 1.2; position: relative; word-break: normal;\">Autoritatea Nationala pentru Protectia Consumatorilor 0219551 &ndash; Telefonul Consumatorilor</h1>\n\n								\n								</div><!-- End .post-content -->\n\n							</div><!-- End .post-body -->\n						</article><!-- End .post -->\n\n						<hr class=\"mt-2 mb-1\">', 1, 9, NULL, 1, NULL, 'http://wawto.ro/imagini', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `generalsetting_id` tinyint(4) DEFAULT NULL,
  `is_visible` tinyint(4) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `page_type` text DEFAULT NULL,
  `folder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `html`, `image`, `link`, `page_id`, `generalsetting_id`, `is_visible`, `type`, `page_type`, `folder`) VALUES
(7, NULL, 'trak.jpg', 'https://www.wawto.ro', 0, 1, 1, NULL, 'home', 'home-1'),
(5, NULL, 'car1.jpg', 'https://www.wawto.ro', 0, 1, 1, NULL, 'home', 'home-1'),
(6, NULL, 'truckk.jpg', 'https://www.wawto.ro', 0, 1, 1, NULL, 'home', 'home-1');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `generalsetting_Id` tinyint(4) NOT NULL,
  `subcat_title` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `generalsetting_Id`, `subcat_title`, `position`) VALUES
(9, 7, 1, 'Auto&Moto', 1),
(21, 8, 1, 'Anvelope camioane', 4),
(20, 8, 1, 'Anvelope industriale', 5),
(13, 7, 1, 'Autoutilitare pana in 3,5 tone', 2),
(14, 7, 1, 'Autoutilitare pana in 7,5 tone', 3),
(16, 7, 1, 'Autocamioane peste 7,5 tone', 8),
(17, 7, 1, 'Transport calatori', 9),
(18, 7, 1, 'Remorci si semiremorci', 10),
(19, 8, 1, 'Anvelope autoturisme si suv-uri', 1),
(22, 8, 1, 'Anvelope stivuitoare', 6),
(23, 8, 1, 'Anvelope agricole', 7),
(24, 8, 1, 'Anvelope moto si atv-uri', 2),
(25, 8, 1, 'Anvelope autoutiliare pana in 7,5 tone', 3),
(26, 9, 1, 'Jante auto si suv-uri', 7),
(27, 9, 1, 'Jante moto si atv-uri', 7),
(28, 9, 1, 'Jante industriale', 8),
(29, 9, 1, 'Jante camioane', 3),
(30, 9, 1, 'Jante stivuitor', 4),
(31, 9, 1, 'Jante agricole', 5),
(32, 9, 1, 'Janta autoutilitare', 8),
(33, 7, 1, 'Utilaje industriale / agricole', 23),
(34, 13, 1, 'Service auto', 22),
(35, 13, 1, 'Service moto si atv-uri', 23),
(36, 13, 1, 'Service camioane', 24),
(37, 13, 1, 'Service utilaje industriale / agricole', 25),
(38, 13, 1, 'Service autoutilitare', 24),
(39, 10, 1, 'VULCANIZARE AUTO SI SUV-URI', 27),
(40, 12, 1, 'Asigurari auto / moto', 28),
(41, 13, 1, 'Service autocare / microbuze', 29),
(42, 13, 1, 'Service mobil', 30),
(43, 11, 1, 'Tractari auto si agabaritice', 31),
(44, 14, 1, 'Accesorii auto / moto / camioane', 32),
(45, 15, 1, 'Scule si echipamente auto', 33),
(46, 10, 1, 'Vulcanizare moto / atv', 34),
(47, 10, 1, 'Vulcanizare mobila', 35),
(48, 10, 1, 'Vulcanizare autoutilitare / camioane', 36),
(49, 10, 1, 'Vulcanizare utilaje industriale / agricole', 37),
(50, 8, 1, 'Roti complete', 38);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `facebook_id` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rural_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrator_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_status` int(1) DEFAULT 0,
  `verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wawto_status` int(1) DEFAULT 0,
  `user_type` int(1) DEFAULT NULL,
  `account_type` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valability` datetime DEFAULT current_timestamp(),
  `role` int(1) DEFAULT NULL,
  `many_employees` int(1) DEFAULT NULL,
  `key_words` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `personal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=879 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `facebook_avatar`, `name`, `email`, `user_phone`, `user_address`, `user_region`, `user_city`, `rural_name`, `administrator_name`, `cui`, `registration_number`, `iban`, `bank`, `profile_image`, `profile_image1`, `profile_image2`, `profile_image3`, `password`, `remember_token`, `verification_status`, `verification_token`, `wawto_status`, `user_type`, `account_type`, `created_at`, `updated_at`, `valability`, `role`, `many_employees`, `key_words`, `parent`, `personal_code`, `lat`, `lon`) VALUES
(78, NULL, NULL, 'Slavisa TEst', 'slavisa@slavisa.com', '07543385602', 'Viilor Pitesti', '47', '16', 'Ciganesti Topoloveni', 'RusIoangabriel', 'RO207205531', '2021/J/1234512341', 'ROIBN5464654845461', 'ING', 'man_2.jpg', 'newCat.jpg', 'new-jacket-women-1.jpg', 'man_5.jpg', '$2y$10$Bd4i2VCbmX7mwA0qk.xS6O/KxwFGsdLQwT/L5f9p2yJSGgoYZkK5.', 'qJ7MNFumyVcBpnXDpNgT6MZqOiMC47FCgNNIglIRcI8mUvjJ5LGzGmm1aB1B', 1, NULL, 1, 1, 1, '2022-06-23 23:36:43', '2022-07-06 07:36:35', '2022-12-24 02:36:43', 0, 1, 'slavisaberca69@gmail.com Slavisa Berca 0754338560 RO20720553 2021/J/123451234', NULL, '1762744582', NULL, NULL),
(77, NULL, NULL, 'Wawto Administrator', 'contact@wawto.ro', '000000000000000000', 'Splaiul unirii nr 450', '12', '16', 'Tiganesti Topoloveni', 'RusIoangabriel', 'RO20720553', '2021/J/123451234', 'ROIBN546465484546', 'ING', '02.jpg', '02.jpg', '05.jpg', 'man_4.jpg', '$2y$10$EeSdW1sTFxe8OUAcwZ797u0GHmcGmHNoZIPqCXSl9KaZyCv/HF7me', 'GUrOfUsygAzgxmgMf0NsWCHkIzFu2hIAjVeFT2kAjzb0ywFY2BQfOuiwEXJj', 1, NULL, 1, 1, 1, '2022-06-23 23:36:43', '2022-07-19 12:03:25', '2022-12-24 02:36:43', 1, 1, 'slavisaberca69@gmail.com Slavisa Berca 0754338560 RO20720553 2021/J/123451234', NULL, '1762744581', NULL, NULL),
(90, '1019198409035571', NULL, 'Slavisa Berca', 'stf411@icloud.com', '0754338567', 'Viilor Numarul 5', '48', '51', 'Țigănești topoloveni', NULL, NULL, NULL, NULL, NULL, '02.jpg', NULL, NULL, NULL, '$2y$10$T4YNLukjNJhHwC9k9X042uQP8MMThwx.ybOnNwF2PCqecxNvLJj.q', 'jJIZC25MEDNzRBJw53TOfMpvRD6Eee8An0ynw4LemPuxPzE2Vp3Ic0QOl9eO', 1, NULL, 1, 2, 2, '2022-07-03 18:18:43', '2022-07-05 05:20:26', '2022-07-03 21:18:43', NULL, NULL, '1837780816, Slavisa Berca, 1837780816', NULL, '1837780816', NULL, NULL),
(89, NULL, NULL, 'Wawto Incognito', 'contactberca@wawto.ro', '0754338560', 'Splaiul unirii nr 450', '12', '16', 'Tiganesti Topoloveni', 'RusIoangabriel', 'RO207205531', '2021/J/1234512341', 'ROIBN5464654845461', 'ING', '02.jpg', '02.jpg', '05.jpg', 'man_4.jpg', '$2y$10$EeSdW1sTFxe8OUAcwZ797u0GHmcGmHNoZIPqCXSl9KaZyCv/HF7me', 'yAcuOgZo25hfMes7lqMPhfWftlF5qASAE8ZYIcV4IFMTS4iIOKCacpUinCQJ', 1, NULL, 1, 1, 1, '2022-06-23 23:36:43', '2022-07-01 04:44:22', '2022-12-24 02:36:43', 1, 1, 'slavisaberca69@gmail.com Slavisa Berca 0754338560 RO20720553 2021/J/123451234', NULL, '1762744581', NULL, NULL),
(87, '104727768212859793879', NULL, 'Berca slavisa', 'slavisaberca69@gmail.com', '0754338561', 'Alea abrud 10', '47', '16', NULL, 'Marian', 'RO2072055411wawto', '56788mmm', 'mmmm', 'ING', '05.jpg', '09.jpg', '02.jpg', 'slide-02.jpg', '$2y$10$p6.wlun.G84ZbR4zD3oaMe949h7dit.LUtT07dwZroUejV7JRS7YO', 's9S3RrQ6dEPvtCgHEBhCgmK5vtqNkc8uEkmO64KKAYmnLK1WN70WEP0t7ETv', 1, NULL, 1, 1, 1, '2022-07-03 07:57:12', '2022-07-04 05:08:22', '2022-07-03 10:57:12', NULL, NULL, '1351304974, Berca slavisa, 1351304974', NULL, '1351304974', NULL, NULL),
(91, '108855782896560481527', NULL, 'RUS IOAN', 'rusioangabriel@gmail.com', '0751267320', 'splaiul unirii nr 450 complex autovit stand c1 c2', '12', '9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$G41A12Tjok/oATpSB8A3su9vmcTN5JSVUNCJM4PDyk4vIAw4mSvCi', 'Ujz1DNpMaNAaEM3dqs0xUscf1PeHNbAT1ekAgApfALUpu1Fv7QpFsB0EndOD', 1, NULL, 1, 1, 1, '2022-07-04 08:33:24', '2022-07-04 08:49:32', '2022-07-04 11:33:24', NULL, NULL, '553538935, Rus ioan Gabriel, 553538935', NULL, '553538935', NULL, NULL),
(92, NULL, NULL, 'AMG SILVER CONSTRUCT SRL', 'rusioangabriel@ymail.com', '0724850153', 'SPLAIUL UNIRII ,nr 450,COMPLEX AUTOVIT,STAND C1', '12', '9', NULL, 'Rus Ioan Gabriel', '12345', 'J40/1234/2022', '111111111122222222333333344444444555555', 'TEST TEST', 'c496_body_pro___81175_zoom.jpg', '20210603_154809_jpg-100445-1500x1500.jpg', '20210603_154824_jpg-100444-380x380.jpg', '20210603_154836_jpg-100446-1500x1500.jpg', '$2y$10$msWnjX/lRZAy9nHHLfT2O.dlUqUg6EFarW35vQ9/LI1fRnqVlVgJe', 'dw78XU2PCz0lAChpn0HPTYwwy0qGWKetrdz672Pr5IS024iOzLChJSznxUIb', 1, '', 1, 1, 1, '2022-07-06 08:34:48', '2022-07-06 08:40:29', '2023-01-06 11:34:47', NULL, 0, 'rusioangabriel@ymail.com AMG SILVER CONSTRUCT SRL 0724850153 12345 J40/1234/2022', NULL, '2037194517', NULL, NULL),
(93, NULL, NULL, 'Slavisa Comm', 'slavisa@slavisa.comm', '07543385602', 'Viilor Pitesti', '47', '16', 'Ciganesti Topoloveni', 'RusIoangabriel', 'RO207205531', '2021/J/1234512341', 'ROIBN5464654845461', 'ING', 'man_2.jpg', 'newCat.jpg', 'new-jacket-women-1.jpg', 'man_5.jpg', '$2y$10$Bd4i2VCbmX7mwA0qk.xS6O/KxwFGsdLQwT/L5f9p2yJSGgoYZkK5.', '1q0cxufMq1kumKFvsaf7YhU3ITJ3V63UbV3nQEQ3gXBmID2MRIqjrFqRDsOi', 1, NULL, 1, 1, 1, '2022-06-23 23:36:43', '2022-07-06 07:36:35', '2022-12-24 02:36:43', 0, 1, 'slavisaberca69@gmail.com Slavisa Berca 0754338560 RO20720553 2021/J/123451234', NULL, '1762744582', NULL, NULL),
(94, NULL, NULL, 'Slavisa Comma', 'slavisa@slavisa.comma', '07543385602', 'Viilor Pitesti', '47', '16', 'Ciganesti Topoloveni', 'RusIoangabriel', 'RO207205531', '2021/J/1234512341', 'ROIBN5464654845461', 'ING', 'man_2.jpg', 'newCat.jpg', 'new-jacket-women-1.jpg', 'man_5.jpg', '$2y$10$Bd4i2VCbmX7mwA0qk.xS6O/KxwFGsdLQwT/L5f9p2yJSGgoYZkK5.', '1q0cxufMq1kumKFvsaf7YhU3ITJ3V63UbV3nQEQ3gXBmID2MRIqjrFqRDsOi', 1, NULL, 1, 1, 1, '2022-06-23 23:36:43', '2022-07-06 07:36:35', '2022-12-24 02:36:43', 0, 1, 'slavisaberca69@gmail.com Slavisa Berca 0754338560 RO20720553 2021/J/123451234', NULL, '1762744582', NULL, NULL),
(878, NULL, NULL, 'Ideea Connect SRL', 'aureloctavianlazar@gmail.com', '0764717187', 'Adresa din arges', '48', '46', NULL, 'Octavian', '22058631', 'J23/1828/2007', 'RO43 BTRL 0480 1202 E648 41XX', 'Transilvania', '', 'OIP.jpg', 'OIP.jpg', 'OIP.jpg', '$2y$10$lMplKWXbg5MjVYT9x.FixumKgS9dpJGbbwF3kSf3d6aFFMAQGZV9O', NULL, 1, '', 1, 1, 1, '2022-10-24 18:45:17', '2022-10-24 18:45:17', '2023-04-24 21:45:17', 1, 1, 'aureloctavianlazar@gmail.com Ideea Connect SRL 0764717187 22058631 J23/1828/2007', NULL, '1387780180', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
