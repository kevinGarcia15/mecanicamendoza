-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mecanicamendoza
CREATE DATABASE IF NOT EXISTS `mecanicamendoza` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mecanicamendoza`;

-- Dumping structure for table mecanicamendoza.balance_custumer_dbs
CREATE TABLE IF NOT EXISTS `balance_custumer_dbs` (
  `balance_custumer_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `active` double(11,2) NOT NULL,
  `balance` double(11,2) NOT NULL,
  `pasive` double(11,2) NOT NULL,
  `discont` double(11,2) NOT NULL DEFAULT '0.00',
  `otherExpenses` double(11,2) NOT NULL DEFAULT '0.00',
  `worksheet_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `balanceCreated_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`balance_custumer_id`),
  KEY `balance_custumer_dbs_worksheet_id_foreign` (`worksheet_id`),
  KEY `balance_custumer_dbs_client_id_foreign` (`client_id`),
  CONSTRAINT `balance_custumer_dbs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client_dbs` (`client_id`),
  CONSTRAINT `balance_custumer_dbs_worksheet_id_foreign` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet_dbs` (`worksheet_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.balance_custumer_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `balance_custumer_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `balance_custumer_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.brand_car_dbs
CREATE TABLE IF NOT EXISTS `brand_car_dbs` (
  `brand_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.brand_car_dbs: ~48 rows (approximately)
/*!40000 ALTER TABLE `brand_car_dbs` DISABLE KEYS */;
INSERT INTO `brand_car_dbs` (`brand_id`, `brand_name`, `created_at`, `updated_at`) VALUES
	(2, 'AGRALE', NULL, NULL),
	(3, 'ALFA ROMEO', NULL, NULL),
	(4, 'AUDI', NULL, NULL),
	(5, 'BMW', NULL, NULL),
	(6, 'CHERY', NULL, NULL),
	(7, 'CHEVROLET', NULL, NULL),
	(8, 'CHRYSLER', NULL, NULL),
	(9, 'CITROEN', NULL, NULL),
	(10, 'DACIA', NULL, NULL),
	(11, 'DAEWO', NULL, NULL),
	(12, 'DAIHATSU', NULL, NULL),
	(13, 'DODGE', NULL, NULL),
	(14, 'FERRARI', NULL, NULL),
	(15, 'FIAT', NULL, NULL),
	(16, 'FORD', NULL, NULL),
	(17, 'GALLOPER', NULL, NULL),
	(18, 'HEIBAO', NULL, NULL),
	(19, 'HONDA', NULL, NULL),
	(20, 'HYUNDAI', NULL, NULL),
	(21, 'ISUZU', NULL, NULL),
	(22, 'JAGUAR', NULL, NULL),
	(23, 'JEEP', NULL, NULL),
	(24, 'KIA', NULL, NULL),
	(25, 'LADA', NULL, NULL),
	(26, 'LAND ROVER', NULL, NULL),
	(27, 'LEXUS', NULL, NULL),
	(28, 'MASERATI', NULL, NULL),
	(29, 'MAZDA', NULL, NULL),
	(30, 'MERCEDES BENZ', NULL, NULL),
	(31, 'MG', NULL, NULL),
	(32, 'MINI', NULL, NULL),
	(33, 'MITSUBISHI', NULL, NULL),
	(34, 'NISSAN', NULL, NULL),
	(35, 'PEUGEOT', NULL, NULL),
	(36, 'PORSCHE', NULL, NULL),
	(37, 'RAM', NULL, NULL),
	(38, 'RENAULT', NULL, NULL),
	(39, 'ROVER', NULL, NULL),
	(40, 'SAAB', NULL, NULL),
	(41, 'SEAT', NULL, NULL),
	(42, 'SMART', NULL, NULL),
	(43, 'SSANGYONG', NULL, NULL),
	(44, 'SUBARU', NULL, NULL),
	(45, 'SUZUKI', NULL, NULL),
	(46, 'TATA', NULL, NULL),
	(47, 'TOYOTA', NULL, NULL),
	(48, 'VOLKSWAGEN', NULL, NULL),
	(49, 'VOLVO', NULL, NULL);
/*!40000 ALTER TABLE `brand_car_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.car_color_dbs
CREATE TABLE IF NOT EXISTS `car_color_dbs` (
  `color_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.car_color_dbs: ~11 rows (approximately)
/*!40000 ALTER TABLE `car_color_dbs` DISABLE KEYS */;
INSERT INTO `car_color_dbs` (`color_id`, `color_name`, `created_at`, `updated_at`) VALUES
	(1, ' BLANCO', NULL, NULL),
	(2, 'NEGRO', NULL, NULL),
	(3, 'PLATA', NULL, NULL),
	(4, 'GRIS', NULL, NULL),
	(5, 'AZUL', NULL, NULL),
	(6, 'ROJO', NULL, NULL),
	(7, 'BEIGE', NULL, NULL),
	(8, 'AMARILLO', NULL, NULL),
	(9, 'VERDE', NULL, NULL),
	(10, 'MORADO', NULL, NULL),
	(11, 'CORINTO', NULL, NULL);
/*!40000 ALTER TABLE `car_color_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.car_line_dbs
CREATE TABLE IF NOT EXISTS `car_line_dbs` (
  `line_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `line_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_car_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`line_id`),
  KEY `car_line_dbs_brand_car_id_foreign` (`brand_car_id`),
  CONSTRAINT `car_line_dbs_brand_car_id_foreign` FOREIGN KEY (`brand_car_id`) REFERENCES `brand_car_dbs` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=398 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.car_line_dbs: ~396 rows (approximately)
/*!40000 ALTER TABLE `car_line_dbs` DISABLE KEYS */;
INSERT INTO `car_line_dbs` (`line_id`, `line_name`, `brand_car_id`, `created_at`, `updated_at`) VALUES
	(2, 'MARRUA', 2, NULL, NULL),
	(3, '147', 3, NULL, NULL),
	(4, '156', 3, NULL, NULL),
	(5, '159', 3, NULL, NULL),
	(6, '166', 3, NULL, NULL),
	(7, 'BRERA', 3, NULL, NULL),
	(8, 'GIULIETTA', 3, NULL, NULL),
	(9, 'GT', 3, NULL, NULL),
	(10, 'GTV', 3, NULL, NULL),
	(11, 'MITO', 3, NULL, NULL),
	(12, 'SPIDER', 3, NULL, NULL),
	(13, 'A1', 4, NULL, NULL),
	(14, 'A3', 4, NULL, NULL),
	(15, 'A4', 4, NULL, NULL),
	(16, 'A5', 4, NULL, NULL),
	(17, 'A6', 4, NULL, NULL),
	(18, 'A7', 4, NULL, NULL),
	(19, 'A8', 4, NULL, NULL),
	(20, 'ALLROAD', 4, NULL, NULL),
	(21, 'Q3', 4, NULL, NULL),
	(22, 'Q5', 4, NULL, NULL),
	(23, 'Q7', 4, NULL, NULL),
	(24, 'R8', 4, NULL, NULL),
	(25, 'TT', 4, NULL, NULL),
	(26, 'SERIE1', 5, NULL, NULL),
	(27, 'SERIE3', 5, NULL, NULL),
	(28, 'SERIE5', 5, NULL, NULL),
	(29, 'SERIE6', 5, NULL, NULL),
	(30, 'SERIE7', 5, NULL, NULL),
	(31, 'X1', 5, NULL, NULL),
	(32, 'X3', 5, NULL, NULL),
	(33, 'X5', 5, NULL, NULL),
	(34, 'X6', 5, NULL, NULL),
	(35, 'Z3', 5, NULL, NULL),
	(36, 'Z4', 5, NULL, NULL),
	(37, 'FACE', 6, NULL, NULL),
	(38, 'FULWIN', 6, NULL, NULL),
	(39, 'QQ', 6, NULL, NULL),
	(40, 'SKIN', 6, NULL, NULL),
	(41, 'TIGGO', 6, NULL, NULL),
	(42, 'AGILE', 7, NULL, NULL),
	(43, 'ASTRA', 7, NULL, NULL),
	(44, 'ASTRA II', 7, NULL, NULL),
	(45, 'AVALANCHE', 7, NULL, NULL),
	(46, 'AVEO', 7, NULL, NULL),
	(47, 'BLAZER', 7, NULL, NULL),
	(48, 'CAMARO', 7, NULL, NULL),
	(49, 'CAPTIVA', 7, NULL, NULL),
	(50, 'CELTA', 7, NULL, NULL),
	(51, 'CLASSIC', 7, NULL, NULL),
	(52, 'COBALT', 7, NULL, NULL),
	(53, 'CORSA', 7, NULL, NULL),
	(54, 'CORSA CLASSIC', 7, NULL, NULL),
	(55, 'CORSA II', 7, NULL, NULL),
	(56, 'CORVETTE', 7, NULL, NULL),
	(57, 'CRUZE', 7, NULL, NULL),
	(58, 'MERIVA', 7, NULL, NULL),
	(59, 'MONTANA', 7, NULL, NULL),
	(60, 'ONIX', 7, NULL, NULL),
	(61, 'PRISMA', 7, NULL, NULL),
	(62, 'VECTRA', 7, NULL, NULL),
	(63, 'S-10', 7, NULL, NULL),
	(64, 'SILVERADO', 7, NULL, NULL),
	(65, 'SONIC', 7, NULL, NULL),
	(66, 'SPARK', 7, NULL, NULL),
	(67, 'SPIN', 7, NULL, NULL),
	(68, 'TRACKER', 7, NULL, NULL),
	(69, 'TRAILBLAZER', 7, NULL, NULL),
	(70, 'ZAFIRA', 7, NULL, NULL),
	(71, '300', 8, NULL, NULL),
	(72, 'CARAVAN', 8, NULL, NULL),
	(73, 'TOWN & COUNTRY', 8, NULL, NULL),
	(74, 'GRAND CARAVAN', 8, NULL, NULL),
	(75, 'CROSSFIRE', 8, NULL, NULL),
	(76, 'NEON', 8, NULL, NULL),
	(77, 'PT CRUISER', 8, NULL, NULL),
	(78, 'SEBRIG', 8, NULL, NULL),
	(79, 'BERLINGO', 9, NULL, NULL),
	(80, 'C3', 9, NULL, NULL),
	(81, 'C3 AIRCROSS', 9, NULL, NULL),
	(82, 'C3 PICASSO', 9, NULL, NULL),
	(83, 'C4 AIRCROSS', 9, NULL, NULL),
	(84, 'C4 LOUNGE', 9, NULL, NULL),
	(85, 'C4 PICASSO', 9, NULL, NULL),
	(86, 'C4 GRAND PICASSO', 9, NULL, NULL),
	(87, 'C5', 9, NULL, NULL),
	(88, 'C6', 9, NULL, NULL),
	(89, 'DS3', 9, NULL, NULL),
	(90, 'DS4', 9, NULL, NULL),
	(91, 'C15', 9, NULL, NULL),
	(92, 'JUMPER', 9, NULL, NULL),
	(93, 'SAXO', 9, NULL, NULL),
	(94, 'XSARA', 9, NULL, NULL),
	(95, 'XSARA PICASSO', 9, NULL, NULL),
	(96, 'PICK-UP', 10, NULL, NULL),
	(97, 'LANOS', 11, NULL, NULL),
	(98, 'LEGANZA', 11, NULL, NULL),
	(99, 'NUBIRA', 11, NULL, NULL),
	(100, 'MATIZ', 11, NULL, NULL),
	(101, 'TACUMA', 11, NULL, NULL),
	(102, 'DAMAS', 11, NULL, NULL),
	(103, 'LABO', 11, NULL, NULL),
	(104, 'MOVE', 12, NULL, NULL),
	(105, 'ROCKY', 12, NULL, NULL),
	(106, 'SIRION', 12, NULL, NULL),
	(107, 'TERIOS', 12, NULL, NULL),
	(108, 'MIRA', 12, NULL, NULL),
	(109, 'JOURNEY', 13, NULL, NULL),
	(110, 'RAM', 13, NULL, NULL),
	(111, '360', 14, NULL, NULL),
	(112, '430', 14, NULL, NULL),
	(113, '456', 14, NULL, NULL),
	(114, '575', 14, NULL, NULL),
	(115, '599', 14, NULL, NULL),
	(116, '612', 14, NULL, NULL),
	(117, 'CALIFORNIA', 14, NULL, NULL),
	(118, 'SUPERAMERICA', 14, NULL, NULL),
	(119, '500', 15, NULL, NULL),
	(120, 'BRAVA', 15, NULL, NULL),
	(121, 'BRAVO', 15, NULL, NULL),
	(122, 'DOBLO', 15, NULL, NULL),
	(123, 'DUCATO', 15, NULL, NULL),
	(124, 'FIORINO', 15, NULL, NULL),
	(125, 'FIORINO QUBO', 15, NULL, NULL),
	(126, 'IDEA', 15, NULL, NULL),
	(127, 'LINEA', 15, NULL, NULL),
	(128, 'MAREA', 15, NULL, NULL),
	(129, 'PALIO', 15, NULL, NULL),
	(130, 'PALIO ADVENTURE', 15, NULL, NULL),
	(131, 'PUNTO', 15, NULL, NULL),
	(132, 'QUBO', 15, NULL, NULL),
	(133, 'SIENA', 15, NULL, NULL),
	(134, 'GRAND SIENA', 15, NULL, NULL),
	(135, 'STILO', 15, NULL, NULL),
	(136, 'STRADA', 15, NULL, NULL),
	(137, 'UNO', 15, NULL, NULL),
	(138, 'UNO EVO', 15, NULL, NULL),
	(139, 'COURIER', 16, NULL, NULL),
	(140, 'ECOSPORT', 16, NULL, NULL),
	(141, 'ECOSPORT KD', 16, NULL, NULL),
	(142, 'ESCAPE', 16, NULL, NULL),
	(143, 'F100', 16, NULL, NULL),
	(144, 'FIESTA KD', 16, NULL, NULL),
	(145, 'FIESTA', 16, NULL, NULL),
	(146, 'FOCUS', 16, NULL, NULL),
	(147, 'FOCUS III', 16, NULL, NULL),
	(148, 'KA', 16, NULL, NULL),
	(149, 'KUGA', 16, NULL, NULL),
	(150, 'MONDEO', 16, NULL, NULL),
	(151, 'RANGER', 16, NULL, NULL),
	(152, 'S-MAX', 16, NULL, NULL),
	(153, 'TRANSIT', 16, NULL, NULL),
	(154, 'EXCEED', 17, NULL, NULL),
	(155, 'HB', 18, NULL, NULL),
	(156, 'ACCORD', 19, NULL, NULL),
	(157, 'CITY', 19, NULL, NULL),
	(158, 'CIVIC', 19, NULL, NULL),
	(159, 'CRV', 19, NULL, NULL),
	(160, 'FIT', 19, NULL, NULL),
	(161, 'HRV', 19, NULL, NULL),
	(162, 'LEGEND', 19, NULL, NULL),
	(163, 'PILOT', 19, NULL, NULL),
	(164, 'STREAM', 19, NULL, NULL),
	(165, 'ACCENT', 20, NULL, NULL),
	(166, 'ATOS PRIME', 20, NULL, NULL),
	(167, 'COUPE', 20, NULL, NULL),
	(168, 'ELANTRA', 20, NULL, NULL),
	(169, 'I 10', 20, NULL, NULL),
	(170, 'I 30', 20, NULL, NULL),
	(171, 'MATRIX', 20, NULL, NULL),
	(172, 'SANTA FE', 20, NULL, NULL),
	(173, 'SONATA', 20, NULL, NULL),
	(174, 'TERRACAN', 20, NULL, NULL),
	(175, 'TRAJET', 20, NULL, NULL),
	(176, 'TUCSON', 20, NULL, NULL),
	(177, 'VELOSTER', 20, NULL, NULL),
	(178, 'VERACRUZ', 20, NULL, NULL),
	(179, 'AMIGO', 21, NULL, NULL),
	(180, 'PICK-UP CABIAN SIMPLE', 21, NULL, NULL),
	(181, 'PICK-UP SPACE CAB', 21, NULL, NULL),
	(182, 'PICK-UP CABINA DOBLE', 21, NULL, NULL),
	(183, 'TROOPER', 21, NULL, NULL),
	(184, 'X-TYPE', 22, NULL, NULL),
	(185, 'XF', 22, NULL, NULL),
	(186, 'F-TYPE', 22, NULL, NULL),
	(187, 'S-TYPE', 22, NULL, NULL),
	(188, 'XJ', 22, NULL, NULL),
	(189, 'XK', 22, NULL, NULL),
	(190, 'CHEROKEE', 23, NULL, NULL),
	(191, 'COMPASS', 23, NULL, NULL),
	(192, 'GRAND CHEROKEE', 23, NULL, NULL),
	(193, 'PATRIOT', 23, NULL, NULL),
	(194, 'WRANGLER', 23, NULL, NULL),
	(195, 'CARENS', 24, NULL, NULL),
	(196, 'CARNIVAL', 24, NULL, NULL),
	(197, 'CERATO', 24, NULL, NULL),
	(198, 'MAGENTIS', 24, NULL, NULL),
	(199, 'MOHAVE', 24, NULL, NULL),
	(200, 'OPIRUS', 24, NULL, NULL),
	(201, 'PICANTO', 24, NULL, NULL),
	(202, 'RIO', 24, NULL, NULL),
	(203, 'RONDO', 24, NULL, NULL),
	(204, 'SPORTAGE', 24, NULL, NULL),
	(205, 'GRAND SPORTAGE', 24, NULL, NULL),
	(206, 'SORENTO', 24, NULL, NULL),
	(207, 'SOUL', 24, NULL, NULL),
	(208, 'PREGIO', 24, NULL, NULL),
	(209, 'AFALINA', 25, NULL, NULL),
	(210, 'SAMARA', 25, NULL, NULL),
	(211, 'DEFENDER', 26, NULL, NULL),
	(212, 'DISCOVERY', 26, NULL, NULL),
	(213, 'FREELANDER', 26, NULL, NULL),
	(214, 'RANGE ROVER', 26, NULL, NULL),
	(215, 'LS', 27, NULL, NULL),
	(216, 'GS', 27, NULL, NULL),
	(217, 'IS', 27, NULL, NULL),
	(218, 'QUATTROPORTE', 28, NULL, NULL),
	(219, 'COUPE', 28, NULL, NULL),
	(220, 'GRAND TURISMO', 28, NULL, NULL),
	(221, 'SPYDER', 28, NULL, NULL),
	(222, '323', 29, NULL, NULL),
	(223, '626', 29, NULL, NULL),
	(224, 'MPV', 29, NULL, NULL),
	(225, 'B 2500', 29, NULL, NULL),
	(226, 'B 2900', 29, NULL, NULL),
	(227, 'AMG', 30, NULL, NULL),
	(228, 'CLASE A', 30, NULL, NULL),
	(229, 'CLASE B', 30, NULL, NULL),
	(230, 'CLASE C', 30, NULL, NULL),
	(231, 'CLASE CL', 30, NULL, NULL),
	(232, 'CLASE CLA', 30, NULL, NULL),
	(233, 'CLASE CLC', 30, NULL, NULL),
	(234, 'CLASE CLK', 30, NULL, NULL),
	(235, 'CLASE CLS', 30, NULL, NULL),
	(236, 'CLASE E', 30, NULL, NULL),
	(237, 'CLASE G', 30, NULL, NULL),
	(238, 'CLASE GL', 30, NULL, NULL),
	(239, 'CLASE ML', 30, NULL, NULL),
	(240, 'CLASE S', 30, NULL, NULL),
	(241, 'CLASE SL', 30, NULL, NULL),
	(242, 'CLASE SLK', 30, NULL, NULL),
	(243, 'VIANO', 30, NULL, NULL),
	(244, 'MGF', 31, NULL, NULL),
	(245, 'COOPER', 32, NULL, NULL),
	(246, 'CANTER', 33, NULL, NULL),
	(247, 'L-200', 33, NULL, NULL),
	(248, 'LANCER', 33, NULL, NULL),
	(249, 'MONTERO', 33, NULL, NULL),
	(250, 'NATIVA', 33, NULL, NULL),
	(251, 'OUTLANDER', 33, NULL, NULL),
	(252, '350', 34, NULL, NULL),
	(253, '370Z', 34, NULL, NULL),
	(254, 'PATHFINDER', 34, NULL, NULL),
	(255, 'FRONTIER', 34, NULL, NULL),
	(256, 'MARCH', 34, NULL, NULL),
	(257, 'MURANO', 34, NULL, NULL),
	(258, 'NP300', 34, NULL, NULL),
	(259, 'PICK-UP', 34, NULL, NULL),
	(260, 'SENTRA', 34, NULL, NULL),
	(261, 'TEANA', 34, NULL, NULL),
	(262, 'TERRANO II', 34, NULL, NULL),
	(263, 'TIIDA', 34, NULL, NULL),
	(264, 'VERSA', 34, NULL, NULL),
	(265, 'X-TERRA', 34, NULL, NULL),
	(266, 'X-TRAIL', 34, NULL, NULL),
	(267, '106', 35, NULL, NULL),
	(268, '206', 35, NULL, NULL),
	(269, '207', 35, NULL, NULL),
	(270, '208', 35, NULL, NULL),
	(271, '306', 35, NULL, NULL),
	(272, '307', 35, NULL, NULL),
	(273, '308', 35, NULL, NULL),
	(274, '3008', 35, NULL, NULL),
	(275, '405', 35, NULL, NULL),
	(276, '406', 35, NULL, NULL),
	(277, '407', 35, NULL, NULL),
	(278, '408', 35, NULL, NULL),
	(279, '4008', 35, NULL, NULL),
	(280, '508', 35, NULL, NULL),
	(281, '5008', 35, NULL, NULL),
	(282, '607', 35, NULL, NULL),
	(283, '806', 35, NULL, NULL),
	(284, '807', 35, NULL, NULL),
	(285, 'RCZ', 35, NULL, NULL),
	(286, 'EXPERT', 35, NULL, NULL),
	(287, 'HOGGAR', 35, NULL, NULL),
	(288, 'PARTNER', 35, NULL, NULL),
	(289, 'BOXER', 35, NULL, NULL),
	(290, '911', 36, NULL, NULL),
	(291, 'BOXSTER', 36, NULL, NULL),
	(292, 'CAYENNE', 36, NULL, NULL),
	(293, 'CAYMAN', 36, NULL, NULL),
	(294, 'PANAMERA', 36, NULL, NULL),
	(295, '1500', 37, NULL, NULL),
	(296, '2500', 37, NULL, NULL),
	(297, 'CLIO MIO', 38, NULL, NULL),
	(298, 'CLIO L/NUEVA', 38, NULL, NULL),
	(299, 'CLIO 2', 38, NULL, NULL),
	(300, 'DUSTER', 38, NULL, NULL),
	(301, 'FLUENCE', 38, NULL, NULL),
	(302, 'KANGOO', 38, NULL, NULL),
	(303, 'KANGOO FURGON', 38, NULL, NULL),
	(304, 'KOLEOS', 38, NULL, NULL),
	(305, 'LAGUNA', 38, NULL, NULL),
	(306, 'LATITUDE', 38, NULL, NULL),
	(307, 'LOGAN', 38, NULL, NULL),
	(308, 'MEGANE', 38, NULL, NULL),
	(309, 'MEGANE II', 38, NULL, NULL),
	(310, 'MEGANE III', 38, NULL, NULL),
	(311, 'SANDERO', 38, NULL, NULL),
	(312, 'SANDERO STEPWAY', 38, NULL, NULL),
	(313, 'SCENIC', 38, NULL, NULL),
	(314, 'SYMBOL', 38, NULL, NULL),
	(315, 'TWINGO', 38, NULL, NULL),
	(316, 'TRAFIC', 38, NULL, NULL),
	(317, 'MASTER', 38, NULL, NULL),
	(318, 'LINEA 25', 39, NULL, NULL),
	(319, 'LINEA 45', 39, NULL, NULL),
	(320, 'LINEA 75', 39, NULL, NULL),
	(321, 'LINEA 9.3', 39, NULL, NULL),
	(322, 'LINEA 9.5', 39, NULL, NULL),
	(323, 'ALHAMBRA', 40, NULL, NULL),
	(324, 'ALTEA', 40, NULL, NULL),
	(325, 'CORDOBA', 40, NULL, NULL),
	(326, 'IBIZA', 40, NULL, NULL),
	(327, 'INCA FURGON', 40, NULL, NULL),
	(328, 'LEON', 40, NULL, NULL),
	(329, 'TOLEDO', 40, NULL, NULL),
	(330, 'FORTWO', 41, NULL, NULL),
	(331, 'ACTYON', 42, NULL, NULL),
	(332, 'KORANDO', 42, NULL, NULL),
	(333, 'KYRON', 42, NULL, NULL),
	(334, 'ISTANA', 42, NULL, NULL),
	(335, 'MUSSO', 42, NULL, NULL),
	(336, 'REXTON', 42, NULL, NULL),
	(337, 'STAVIC', 42, NULL, NULL),
	(338, 'IMPREZA', 43, NULL, NULL),
	(339, 'LEGACY', 43, NULL, NULL),
	(340, 'OUTBACK', 43, NULL, NULL),
	(341, 'TRIBECA', 43, NULL, NULL),
	(342, 'XV', 43, NULL, NULL),
	(343, 'FORESTER', 43, NULL, NULL),
	(344, 'FUN', 44, NULL, NULL),
	(345, 'GRAND VITARA', 44, NULL, NULL),
	(346, 'SWIFT', 44, NULL, NULL),
	(347, 'JIMNY', 44, NULL, NULL),
	(348, '207 TELCOLINE', 45, NULL, NULL),
	(349, 'SUMO', 46, NULL, NULL),
	(350, '86', 47, NULL, NULL),
	(351, 'AVENSIS', 47, NULL, NULL),
	(352, 'CAMRY', 47, NULL, NULL),
	(353, 'COROLLA', 47, NULL, NULL),
	(354, 'CORONA', 47, NULL, NULL),
	(355, 'ETIOS', 47, NULL, NULL),
	(356, 'ETIOS CROSS', 47, NULL, NULL),
	(357, 'HILUX', 47, NULL, NULL),
	(358, 'LAND CRUISER', 47, NULL, NULL),
	(359, 'PRIUS', 47, NULL, NULL),
	(360, 'RAV 4', 47, NULL, NULL),
	(361, 'AMAROK', 48, NULL, NULL),
	(362, 'BORA', 48, NULL, NULL),
	(363, 'CADDY', 48, NULL, NULL),
	(364, 'CROSSFOX', 48, NULL, NULL),
	(365, 'FOX', 48, NULL, NULL),
	(366, 'GOL', 48, NULL, NULL),
	(367, 'GOL TREND', 48, NULL, NULL),
	(368, 'GOLF', 48, NULL, NULL),
	(369, 'MULTIVAN', 48, NULL, NULL),
	(370, 'THE BEETLE', 48, NULL, NULL),
	(371, 'NEW BEETLE', 48, NULL, NULL),
	(372, 'PASSAT', 48, NULL, NULL),
	(373, 'CC', 48, NULL, NULL),
	(374, 'POLO', 48, NULL, NULL),
	(375, 'SANTANA', 48, NULL, NULL),
	(376, 'SAVEIRO', 48, NULL, NULL),
	(377, 'SCIROCCO', 48, NULL, NULL),
	(378, 'SHARAN', 48, NULL, NULL),
	(379, 'SURAN', 48, NULL, NULL),
	(380, 'TIGUAN', 48, NULL, NULL),
	(381, 'TOUAREG', 48, NULL, NULL),
	(382, 'TRANSPORTER', 48, NULL, NULL),
	(383, 'UP', 48, NULL, NULL),
	(384, 'VENTO', 48, NULL, NULL),
	(385, 'VOYAGE', 48, NULL, NULL),
	(386, 'C30', 49, NULL, NULL),
	(387, 'C70', 49, NULL, NULL),
	(388, 'S40', 49, NULL, NULL),
	(389, 'S60', 49, NULL, NULL),
	(390, 'S80', 49, NULL, NULL),
	(391, 'V40', 49, NULL, NULL),
	(392, 'V50', 49, NULL, NULL),
	(393, 'V60', 49, NULL, NULL),
	(394, 'V70', 49, NULL, NULL),
	(395, 'XC60', 49, NULL, NULL),
	(396, 'XC70', 49, NULL, NULL),
	(397, 'XC90', 49, NULL, NULL);
/*!40000 ALTER TABLE `car_line_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.client_dbs
CREATE TABLE IF NOT EXISTS `client_dbs` (
  `client_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dpi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_balance` double(11,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.client_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `client_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_07_17_205410_create_client_dbs_table', 1),
	(5, '2020_07_17_210144_create_brand_car_dbs_table', 1),
	(6, '2020_07_17_210326_create_car_color_dbs_table', 1),
	(7, '2020_07_17_211426_create_car_line_dbs_table', 1),
	(8, '2020_07_17_213230_create_vehicle_dbs_table', 1),
	(9, '2020_07_17_213700_create_worksheet_dbs_table', 1),
	(10, '2020_07_17_214340_create_work_to_do_dbs_table', 1),
	(11, '2020_07_17_214724_create_replacement_dbs_table', 1),
	(12, '2020_07_30_212530_create_balance_custumer_dbs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.replacement_dbs
CREATE TABLE IF NOT EXISTS `replacement_dbs` (
  `remplacement_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `worksheet_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`remplacement_id`),
  KEY `replacement_dbs_worksheet_id_foreign` (`worksheet_id`),
  CONSTRAINT `replacement_dbs_worksheet_id_foreign` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet_dbs` (`worksheet_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.replacement_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `replacement_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `replacement_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `rol`, `is_enabled`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super Usuario', 'mecanicamendoza163@gmail.com', 'Master', 1, '2020-08-07 20:35:00', '$2y$10$RXacnJqKX0bAgXoeHYrPAeDYZyS0JFBI4xLhpMirzhvo79tnAAkrm', '4dlhL9soNFGJ3Y5JRQRWRxGG4T3ChEaD9LdUG5KFksd3IRW2exOOmHoeSH0v', '2020-08-07 20:35:10', '2020-08-08 02:38:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.vehicle_dbs
CREATE TABLE IF NOT EXISTS `vehicle_dbs` (
  `vehicle_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plateNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` int(11) NOT NULL,
  `color_id` bigint(20) unsigned NOT NULL,
  `line_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vehicle_id`),
  UNIQUE KEY `vehicle_dbs_platenumber_unique` (`plateNumber`),
  KEY `vehicle_dbs_color_id_foreign` (`color_id`),
  KEY `vehicle_dbs_line_id_foreign` (`line_id`),
  CONSTRAINT `vehicle_dbs_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `car_color_dbs` (`color_id`),
  CONSTRAINT `vehicle_dbs_line_id_foreign` FOREIGN KEY (`line_id`) REFERENCES `car_line_dbs` (`line_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.vehicle_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `vehicle_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.worksheet_dbs
CREATE TABLE IF NOT EXISTS `worksheet_dbs` (
  `worksheet_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusWorksheet` tinyint(1) NOT NULL DEFAULT '1',
  `users_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `vehicle_id` bigint(20) unsigned NOT NULL,
  `workSheetCreated_at` timestamp NULL DEFAULT NULL,
  `workSheetUpdated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`worksheet_id`),
  UNIQUE KEY `worksheet_dbs_code_unique` (`code`),
  KEY `worksheet_dbs_users_id_foreign` (`users_id`),
  KEY `worksheet_dbs_client_id_foreign` (`client_id`),
  KEY `worksheet_dbs_vehicle_id_foreign` (`vehicle_id`),
  CONSTRAINT `worksheet_dbs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client_dbs` (`client_id`),
  CONSTRAINT `worksheet_dbs_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `worksheet_dbs_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle_dbs` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.worksheet_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `worksheet_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `worksheet_dbs` ENABLE KEYS */;

-- Dumping structure for table mecanicamendoza.work_to_do_dbs
CREATE TABLE IF NOT EXISTS `work_to_do_dbs` (
  `worktodo_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusWork` tinyint(1) NOT NULL DEFAULT '1',
  `worksheet_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`worktodo_id`),
  KEY `work_to_do_dbs_worksheet_id_foreign` (`worksheet_id`),
  CONSTRAINT `work_to_do_dbs_worksheet_id_foreign` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet_dbs` (`worksheet_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mecanicamendoza.work_to_do_dbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `work_to_do_dbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_to_do_dbs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
