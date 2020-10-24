-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 24-10-2020 a las 20:37:13
-- Versión del servidor: 5.6.38
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `prestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `black_list`
--

CREATE TABLE `black_list` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL DEFAULT 'Sin indicar',
  `phone` varchar(100) NOT NULL DEFAULT 'Sin indicar',
  `interest` int(11) NOT NULL DEFAULT '0',
  `start_month` date NOT NULL,
  `initial_loan` double NOT NULL DEFAULT '0',
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL DEFAULT 'Sin indicar',
  `phone` varchar(100) NOT NULL DEFAULT 'Sin indicar',
  `interest` float NOT NULL DEFAULT '0',
  `start_month` date NOT NULL,
  `initial_loan` float NOT NULL DEFAULT '0',
  `pending_interest` float NOT NULL DEFAULT '0',
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `id_customer`, `name`, `full_name`, `phone`, `interest`, `start_month`, `initial_loan`, `pending_interest`, `payment_status`, `updated_on`) VALUES
(1, '001-002', 'ALFREDO COLOMBIA', 'Undefined', 'Undefined', 0, '2020-10-12', 2580, 0, 'initial', '0000-00-00 00:00:00'),
(2, '001-003', 'MARTIN BUSQUEDA', 'Undefined', 'Undefined', 0, '2020-10-12', 1650, 0, 'initial', '0000-00-00 00:00:00'),
(3, '001-004', 'CLARY PRIMA', 'Undefined', 'Undefined', 0, '2020-10-12', 1400, 0, 'initial', '0000-00-00 00:00:00'),
(4, '001-005', 'JONAS', 'Undefined', 'Undefined', 0, '2020-10-12', 1840, 0, 'initial', '0000-00-00 00:00:00'),
(5, '001-006', 'NEURYS/YARIZA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(6, '001-007', 'SANDRA/DAYSI', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(7, '001-008', 'ZAIDA/NAIROBI', 'Undefined', 'Undefined', 10, '2020-10-12', 350, 0, 'initial', '0000-00-00 00:00:00'),
(8, '001-009', 'MARIBEL/PLD', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(9, '001-010', 'ROSANNA/TANIA', 'Undefined', 'Undefined', 0, '2020-10-12', 1380, 0, 'initial', '0000-00-00 00:00:00'),
(10, '001-011', 'MARIA/PERLITA', 'Undefined', 'Undefined', 8, '2020-10-12', 2750, 0, 'initial', '0000-00-00 00:00:00'),
(11, '001-012', 'WILKIN/LOCUTORIO', 'Undefined', 'Undefined', 0, '2020-10-12', 2000, 0, 'initial', '0000-00-00 00:00:00'),
(12, '001-013', 'AUGUSTO/PEDRO', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(13, '001-014', 'PRIMAVERA', 'Undefined', 'Undefined', 0, '2020-10-12', 3885, 0, 'initial', '0000-00-00 00:00:00'),
(14, '001-015', 'SAMBA', 'Undefined', 'Undefined', 0, '2020-10-12', 6000, 0, 'initial', '0000-00-00 00:00:00'),
(15, '001-016', 'AGRIPINO', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(16, '001-017', 'MANOLO', 'Undefined', 'Undefined', 0, '2020-10-12', 3500, 0, 'initial', '0000-00-00 00:00:00'),
(17, '001-018', 'CARMEN MOTA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(18, '001-019', 'RAMONA/CLEMENTE', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(19, '001-020', 'JOEL/ONEREYDI', 'Undefined', 'Undefined', 0, '2020-10-12', 400, 0, 'initial', '0000-00-00 00:00:00'),
(20, '001-021', 'RAFAELITO/GUILLERMINA', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(21, '001-022', 'LEO/PETRA', 'Undefined', 'Undefined', 10, '2020-10-12', 800, 0, 'initial', '0000-00-00 00:00:00'),
(22, '001-023', 'HENRY/PLD', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(23, '001-024', 'ANA/PATAKY', 'Undefined', 'Undefined', 0, '2020-10-12', 60, 0, 'initial', '0000-00-00 00:00:00'),
(24, '001-025', 'TEODORO REYES', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(25, '001-026', 'ANTOLINA ASCANIO', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(26, '001-027', 'TITAN/CUCHITA', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(27, '001-032', 'FABIOLA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(28, '001-033', 'DAVID/TOMAS', 'Undefined', 'Undefined', 10, '2020-10-12', 355, 0, 'initial', '0000-00-00 00:00:00'),
(29, '001-036', 'TANIA', 'Undefined', 'Undefined', 0, '2020-10-12', 250, 0, 'initial', '0000-00-00 00:00:00'),
(30, '001-037', 'DEYSI/CESAR', 'Undefined', 'Undefined', 10, '2020-10-12', 150, 0, 'initial', '0000-00-00 00:00:00'),
(31, '001-039', 'JORGELIN/NANI', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(32, '001-040', 'MALBIN/CESAR', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(33, '001-041', 'BLANCO/GABRIELIN', 'Undefined', 'Undefined', 0, '2020-10-12', 150, 0, 'initial', '0000-00-00 00:00:00'),
(34, '001-035', 'IRIS ROSARIO/MARCOS', 'Undefined', 'Undefined', 10, '2020-10-12', 200, 0, 'initial', '0000-00-00 00:00:00'),
(35, '001-038', 'MANUEL/MANOLO', 'Undefined', 'Undefined', 10, '2020-10-12', 50, 0, 'initial', '0000-00-00 00:00:00'),
(36, '001-043', 'JOSEFA', 'Undefined', 'Undefined', 0, '2020-10-12', 2590, 0, 'initial', '0000-00-00 00:00:00'),
(37, '001-044', 'MARTINEZ/CLARY', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(38, '001-045', 'YUBA', 'Undefined', 'Undefined', 0, '2020-10-12', 4900, 0, 'initial', '0000-00-00 00:00:00'),
(39, '001-047', 'HILARIO', 'Undefined', 'Undefined', 10, '2020-10-12', 1300, 0, 'initial', '0000-00-00 00:00:00'),
(40, '001-048', 'STWARD', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(41, '001-049', 'JORGE FELIZ/PLD', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(42, '001-050', 'BENCOSME', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(43, '001-051', 'LEANDRA/LEANDRA', 'Undefined', 'Undefined', 10, '2020-10-12', 1900, 0, 'initial', '0000-00-00 00:00:00'),
(44, '001-053', 'LANDER', 'Undefined', 'Undefined', 10, '2020-10-12', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(45, '001-054', 'PAULINA', 'Undefined', 'Undefined', 10, '2020-10-12', 750, 0, 'initial', '0000-00-00 00:00:00'),
(46, '001-056', 'RICHARD/ROSMERY', 'Undefined', 'Undefined', 10, '2020-10-12', 950, 0, 'initial', '0000-00-00 00:00:00'),
(47, '001-057', 'EVELYN/EVELYN', 'Undefined', 'Undefined', 10, '2020-10-12', 250, 0, 'initial', '0000-00-00 00:00:00'),
(48, '001-058', 'MORENA/ÑOÑO', 'Undefined', 'Undefined', 10, '2020-10-12', 2320, 0, 'initial', '0000-00-00 00:00:00'),
(49, '001-059', 'PERLITA', 'Undefined', 'Undefined', 0, '2020-10-12', 700, 0, 'initial', '0000-00-00 00:00:00'),
(50, '001-062', 'NANA/LUISA', 'Undefined', 'Undefined', 0, '2020-10-12', 2000, 0, 'initial', '0000-00-00 00:00:00'),
(51, '001-063', 'HILDA/FORTUNA', 'Undefined', 'Undefined', 10, '2020-10-12', 700, 0, 'initial', '0000-00-00 00:00:00'),
(52, '001-065', 'SARATHY', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(53, '001-066', 'ANNI/ZAFIRO', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(54, '001-068', 'HERMANA/ANTOLINA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(55, '001-069', 'EDGAR/MANOLO', 'Undefined', 'Undefined', 0, '2020-10-12', 680, 0, 'initial', '0000-00-00 00:00:00'),
(56, '001-067', 'MARGARITA/FEBRILLET', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(57, '001-071', 'CHULO/CLEMENTE', 'Undefined', 'Undefined', 0, '2020-10-12', 70, 0, 'initial', '0000-00-00 00:00:00'),
(58, '001-070', 'ANGEL/PAQUETERÍA', 'Undefined', 'Undefined', 0, '2020-10-12', 200, 0, 'initial', '0000-00-00 00:00:00'),
(59, '001-072', 'MIRIAM/MIGUEL', 'Undefined', 'Undefined', 10, '2020-10-12', 350, 0, 'initial', '0000-00-00 00:00:00'),
(60, '001-074', 'CARLUIS/COYOTE', 'Undefined', 'Undefined', 0, '2020-10-12', 2570, 0, 'initial', '0000-00-00 00:00:00'),
(61, '001-075', 'XIOMARA ST VIL', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(62, '001-076', 'LEANDRA/MADRE', 'Undefined', 'Undefined', 10, '2020-10-12', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(63, '001-078', 'YOMAIRA/EZEQUIEL', 'Undefined', 'Undefined', 0, '2020-10-12', 450, 0, 'initial', '0000-00-00 00:00:00'),
(64, '001-079', 'MARY/PELUQUERÍA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(65, '001-082', 'RONY/MADRE', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(66, '001-081', 'CHOWI/CHOWI', 'Undefined', 'Undefined', 10, '2020-10-12', 400, 0, 'initial', '0000-00-00 00:00:00'),
(67, '001-083', 'LUCY/UVILLA', 'Undefined', 'Undefined', 10, '2020-10-12', 800, 0, 'initial', '0000-00-00 00:00:00'),
(68, '001-086', 'YENNI/FAÑA', 'Undefined', 'Undefined', 10, '2020-10-12', 3500, 0, 'initial', '0000-00-00 00:00:00'),
(69, '001-087', 'WILMAN/YENNI', 'Undefined', 'Undefined', 8, '2020-10-12', 2000, 0, 'initial', '0000-00-00 00:00:00'),
(70, '001-090', 'ELIS/YENNI', 'Undefined', 'Undefined', 10, '2020-10-12', 1500, 0, 'initial', '0000-00-00 00:00:00'),
(71, '001-091', 'YINA/MANOLO', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(72, '001-092', 'VICKY/YINA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(73, '001-093', 'YOVANNI/FAÑA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(74, '001-094', 'RONNY VALDEZ', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(75, '001-098', 'GRISSEL/YERRI', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(76, '001-099', 'NUERA/CUCHITA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(77, '001-102', 'JAVI/ESPAÑOL', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(78, '001-103', 'MADRE/DAYPI', 'Undefined', 'Undefined', 10, '2020-10-12', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(79, '001-105', 'CORDERO/PETER', 'Undefined', 'Undefined', 10, '2020-10-12', 80, 0, 'initial', '0000-00-00 00:00:00'),
(80, '001-106', 'LINA/YOVANNI', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(81, '001-109', 'OSCAR JIMENEZ', 'Undefined', 'Undefined', 0, '2020-10-12', 670, 0, 'initial', '0000-00-00 00:00:00'),
(82, '001-110', 'MARIAESTELA/XIOMARA', 'Undefined', 'Undefined', 10, '2020-10-12', 600, 0, 'initial', '0000-00-00 00:00:00'),
(83, '001-111', 'SANTOS/VIDAL', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(84, '001-112', 'LIZA/LIZA', 'Undefined', 'Undefined', 10, '2020-10-12', 200, 0, 'initial', '0000-00-00 00:00:00'),
(85, '001-115', 'JOSÉ/GUILLERMINA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(86, '001-116', 'YERRI', 'Undefined', 'Undefined', 10, '2020-10-12', 160, 0, 'initial', '0000-00-00 00:00:00'),
(87, '001-118', 'RAUL/MILQUEYA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(88, '001-119', 'RAMÓN/PAULINA', 'Undefined', 'Undefined', 10, '2020-10-12', 700, 0, 'initial', '0000-00-00 00:00:00'),
(89, '001-120', 'HERMANA/SOLANGIE', 'Undefined', 'Undefined', 10, '2020-10-12', 1600, 0, 'initial', '0000-00-00 00:00:00'),
(90, '001-123', 'RAUL/STWARD', 'Undefined', 'Undefined', 10, '2020-10-12', 350, 0, 'initial', '0000-00-00 00:00:00'),
(91, '001-124', 'CAROLINA/ÑOÑÓ', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(92, '001-125', 'MERCEDES V/G', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(93, '001-127', 'YANI/ANGICAR', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(94, '001-128', 'CARLOS/AURIS', 'Undefined', 'Undefined', 10, '2020-10-12', 250, 0, 'initial', '0000-00-00 00:00:00'),
(95, '002-001', 'CELESTE/CELESTE', 'Undefined', 'Undefined', 0, '2020-10-12', 28470, 0, 'initial', '0000-00-00 00:00:00'),
(96, '003-001', 'CRISTINITA/CRISTINITA', 'Undefined', 'Undefined', 0, '2020-10-12', 12400, 0, 'initial', '0000-00-00 00:00:00'),
(97, '003-002', 'TEREZA/CRISTINITA', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(98, '004-001', 'AURIS/AURIS', 'Undefined', 'Undefined', 0, '2020-10-12', 12975, 0, 'initial', '0000-00-00 00:00:00'),
(99, '004-002', 'CARLOS/AURIS S/R', 'Undefined', 'Undefined', 0, '2020-10-12', 3700, 0, 'initial', '0000-00-00 00:00:00'),
(100, '005-001', 'NICOLAS/NOCOLAS', 'Undefined', 'Undefined', 0, '2020-10-12', 19155, 0, 'initial', '0000-00-00 00:00:00'),
(101, '006-001', 'CARLOS/BODEGA', 'Undefined', 'Undefined', 10, '2020-10-12', 1150, 0, 'initial', '0000-00-00 00:00:00'),
(102, '006-002', 'CUBANO/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 700, 0, 'initial', '0000-00-00 00:00:00'),
(103, '006-003', 'VIRTUDES/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(104, '006-004', 'AMIGA/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 600, 0, 'initial', '0000-00-00 00:00:00'),
(105, '006-005', 'BLADIMIR', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(106, '006-006', 'ALIDA/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(107, '006-007', 'LUCIA/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 350, 0, 'initial', '0000-00-00 00:00:00'),
(108, '006-008', 'FERMIN/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 600, 0, 'initial', '0000-00-00 00:00:00'),
(109, '006-009', 'JOSEFINA/CARLOS', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(110, '007-001', 'ELSA/ELSA', 'Undefined', 'Undefined', 0, '2020-10-12', 8220, 0, 'initial', '0000-00-00 00:00:00'),
(111, '008-001', 'PETRA/PETRA', 'Undefined', 'Undefined', 0, '2020-10-12', 4270, 0, 'initial', '0000-00-00 00:00:00'),
(112, '001-028', 'ALBA IRIS', 'Undefined', 'Undefined', 10, '2020-10-12', 500, 0, 'initial', '0000-00-00 00:00:00'),
(113, '009-001', 'MARITZA/MARITZA', 'Undefined', 'Undefined', 10, '2020-10-12', 1300, 0, 'initial', '0000-00-00 00:00:00'),
(114, '009-002', 'LA PAVA', 'Undefined', 'Undefined', 0, '2020-10-12', 200, 0, 'initial', '0000-00-00 00:00:00'),
(115, '009-003', 'ESTHER/MARITZA', 'Undefined', 'Undefined', 10, '2020-10-12', 400, 0, 'initial', '0000-00-00 00:00:00'),
(116, '009-004', 'EL ABUELO/MARITZA', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(117, '010-001', 'BERENICE/BERENICE', 'Undefined', 'Undefined', 10, '2020-10-12', 100, 0, 'initial', '0000-00-00 00:00:00'),
(118, '010-002', 'ALEJANDRA/BERENICE', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(119, '010-003', 'BETTY/BERENICE', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(120, '001-029', 'MARIA/LIZA', 'Undefined', 'Undefined', 10, '2020-10-12', 1500, 0, 'initial', '0000-00-00 00:00:00'),
(121, '011-001', 'ANGELA/ANGELA', 'Undefined', 'Undefined', 10, '2020-10-12', 150, 0, 'initial', '0000-00-00 00:00:00'),
(122, '011-002', 'RAMONA/ANGELA', 'Undefined', 'Undefined', 10, '2020-10-12', 550, 0, 'initial', '0000-00-00 00:00:00'),
(123, '011-003', 'AMIGA/ANGELA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(124, '011-004', 'JULIO/ANGELA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(125, '011-005', 'ANGELICA/ANGELA', 'Undefined', 'Undefined', 10, '2020-10-12', 1500, 0, 'initial', '0000-00-00 00:00:00'),
(126, '011-006', 'COMPAÑERA/ANGELICA', 'Undefined', 'Undefined', 10, '2020-10-12', 350, 0, 'initial', '0000-00-00 00:00:00'),
(127, '012-001', 'EDITA/EDITA', 'Undefined', 'Undefined', 0, '2020-10-12', 11330, 0, 'initial', '0000-00-00 00:00:00'),
(128, '012-002', 'YUNIOR/EDITA', 'Undefined', 'Undefined', 0, '2020-10-12', 2300, 0, 'initial', '0000-00-00 00:00:00'),
(129, '012-003', 'WENDY/EDITA', 'Undefined', 'Undefined', 0, '2020-10-12', 6720, 0, 'initial', '0000-00-00 00:00:00'),
(130, '013-001', 'SOLANGIE/DELIO', 'Undefined', 'Undefined', 10, '2020-10-12', 2165, 0, 'initial', '0000-00-00 00:00:00'),
(131, '013-002', 'MELLA/TRONCA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(132, '013-004', 'MELBIN/DELIO', 'Undefined', 'Undefined', 0, '2020-10-12', 575, 0, 'initial', '0000-00-00 00:00:00'),
(133, '013-005', 'ADA/MELLA', 'Undefined', 'Undefined', 10, '2020-10-12', 150, 0, 'initial', '0000-00-00 00:00:00'),
(134, '013-006', 'NANCY/MELLA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(135, '014-001', 'COMADRE INÉS', 'Undefined', 'Undefined', 0, '2020-10-12', 2750, 0, 'initial', '0000-00-00 00:00:00'),
(136, '014-002', 'NATY', 'Undefined', 'Undefined', 0, '2020-10-12', 7955, 0, 'initial', '0000-00-00 00:00:00'),
(137, '014-003', 'NANI/IRIS', 'Undefined', 'Undefined', 10, '2020-10-12', 300, 0, 'initial', '0000-00-00 00:00:00'),
(138, '014-004', 'IRIS/INÉS', 'Undefined', 'Undefined', 10, '2020-10-12', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(139, '014-005', 'CRIS/NANI IRIS', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(140, '014-006', 'YOCELIN/IRIS', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(141, '014-007', 'LICELOTE/MARCIA', 'Undefined', 'Undefined', 10, '2020-10-12', 1100, 0, 'initial', '0000-00-00 00:00:00'),
(142, '014-008', 'GRISOL/MARCIA', 'Undefined', 'Undefined', 10, '2020-10-12', 0, 0, 'initial', '0000-00-00 00:00:00'),
(143, '014-009', 'RICARDO/INES', 'Undefined', 'Undefined', 0, '2020-10-12', 2675, 0, 'initial', '0000-00-00 00:00:00'),
(144, '015-001', 'NOEMI/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 0, 0, 'initial', '0000-00-00 00:00:00'),
(145, '015-002', 'SOLANNY/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 0, 0, 'initial', '0000-00-00 00:00:00'),
(146, '015-003', 'YAJANIS/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 400, 0, 'initial', '0000-00-00 00:00:00'),
(147, '015-004', 'CRISTINA/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 150, 0, 'initial', '0000-00-00 00:00:00'),
(148, '015-005', 'RAMONA/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(149, '015-006', 'ZOILA/NOEMI', 'Undefined', 'Undefined', 10, '2020-10-13', 0, 0, 'initial', '0000-00-00 00:00:00'),
(150, '015-007', 'SUHEY/NOEMÍ', 'Undefined', 'Undefined', 10, '2020-10-13', 700, 0, 'initial', '0000-00-00 00:00:00'),
(151, '016-001', 'VIRITA/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 600, 0, 'initial', '0000-00-00 00:00:00'),
(152, '016-002', 'FEDERICA/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 650, 0, 'initial', '0000-00-00 00:00:00'),
(153, '016-003', 'ISIS/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 200, 0, 'initial', '0000-00-00 00:00:00'),
(154, '016-004', 'ELIDO/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 300, 0, 'initial', '0000-00-00 00:00:00'),
(155, '016-006', 'YOCELIN/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 100, 0, 'initial', '0000-00-00 00:00:00'),
(156, '016-007', 'LETICIA/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 350, 0, 'initial', '0000-00-00 00:00:00'),
(157, '016-008', 'FORTUNA/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 400, 0, 'initial', '0000-00-00 00:00:00'),
(158, '016-009', 'ANGEL/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 1615, 0, 'initial', '0000-00-00 00:00:00'),
(159, '016-010', 'JOSÉ/VIRITA', 'Undefined', 'Undefined', 10, '2020-10-13', 0, 0, 'initial', '0000-00-00 00:00:00'),
(161, '001-030', 'HNO LANDER', 'Undefined', 'Undefined', 10, '2020-10-13', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(162, '001-031', 'FAUSTO/PAQUETERÍA', 'Undefined', 'Undefined', 10, '2020-10-13', 500, 0, 'initial', '0000-00-00 00:00:00'),
(163, '001-060', 'JAÑICO', 'Undefined', 'Undefined', 10, '2020-10-13', 200, 0, 'initial', '0000-00-00 00:00:00'),
(164, '001-061', 'YAHAIRA/AMAURIS', 'Undefined', 'Undefined', 10, '2020-10-13', 0, 0, 'initial', '0000-00-00 00:00:00'),
(165, '001-064', 'ARELIS/SILDA', 'Undefined', 'Undefined', 10, '2020-10-13', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(166, '001-077', 'VERÓNICA/CLEMENTE', 'Undefined', 'Undefined', 10, '2020-10-13', 1000, 0, 'initial', '0000-00-00 00:00:00'),
(167, '001-001', 'JOSE MEDRANO', 'Undefined', 'Undefined', 10, '2020-10-24', 0, 0, 'initial', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `dete` datetime NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deposits`
--

INSERT INTO `deposits` (`id`, `id_customer`, `client`, `dete`, `amount`) VALUES
(1, '001-022', 'LEO/PETRA', '2020-10-24 14:57:25', 800),
(2, '001-105', 'CORDERO/PETER', '2020-10-24 14:59:20', 80),
(3, '001-113', 'AUGUSTO/PEDRO', '2020-10-24 15:38:34', 0),
(4, '001-001', 'JOSE MEDRANO', '2020-10-24 15:51:22', 0),
(5, '001-058', 'MORENA/ÑOÑO', '2020-10-24 16:30:43', 2320),
(6, '016-001', 'VIRITA/VIRITA', '2020-10-24 17:00:44', 600),
(7, '016-008', 'FORTUNA/VIRITA', '2020-10-24 17:05:16', 400),
(8, '016-009', 'ANGEL/VIRITA', '2020-10-24 17:09:36', 1615);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `global_information`
--

CREATE TABLE `global_information` (
  `id` int(11) NOT NULL,
  `loans` double NOT NULL,
  `paid_capital` double NOT NULL,
  `outstanding_capital` double NOT NULL,
  `interests` double NOT NULL,
  `pending_interest` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `client` varchar(50) NOT NULL,
  `dete` datetime NOT NULL,
  `outstanding_capital` float NOT NULL,
  `interest` float NOT NULL,
  `accrued_interest` float NOT NULL,
  `interest_paid` float NOT NULL,
  `pending_interest` float NOT NULL,
  `paid_capital` float NOT NULL,
  `increased_debt` float NOT NULL,
  `payment_month` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `information_month`
--

CREATE TABLE `information_month` (
  `id` int(11) NOT NULL,
  `id_ customer` varchar(10) NOT NULL,
  `borrowed_this_month` double NOT NULL,
  `outstanding_capital` double NOT NULL,
  `interest_month` double NOT NULL,
  `pending_interest` double NOT NULL,
  `interest_paid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lost_money`
--

CREATE TABLE `lost_money` (
  `id` int(11) NOT NULL,
  `lost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(10) NOT NULL,
  `client` varchar(50) NOT NULL,
  `dete` datetime NOT NULL,
  `outstanding_capital` float NOT NULL,
  `interest` float NOT NULL,
  `accrued_interest` float NOT NULL,
  `interest_paid` float NOT NULL,
  `pending_interest` float NOT NULL,
  `paid_capital` float NOT NULL,
  `increased_debt` float NOT NULL,
  `payment_month` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `id_customer`, `client`, `dete`, `outstanding_capital`, `interest`, `accrued_interest`, `interest_paid`, `pending_interest`, `paid_capital`, `increased_debt`, `payment_month`) VALUES
(1, '001-002', 'ALFREDO COLOMBIA', '2020-10-12 13:39:52', 2580, 0, 0, 0, 0, 2580, 0, 0),
(2, '001-003', 'MARTIN BUSQUEDA', '2020-10-12 13:41:19', 1650, 0, 0, 0, 0, 1650, 0, 0),
(3, '001-004', 'CLARY PRIMA', '2020-10-12 13:42:28', 1400, 0, 0, 0, 0, 1400, 0, 0),
(4, '001-005', 'JONAS', '2020-10-12 13:43:39', 1840, 0, 0, 0, 0, 1840, 0, 0),
(5, '001-006', 'NEURYS/YARIZA', '2020-10-12 13:46:13', 0, 0, 0, 0, 0, 0, 0, 0),
(6, '001-007', 'SANDRA/DAYSI', '2020-10-12 13:47:17', 0, 0, 0, 0, 0, 0, 0, 0),
(7, '001-008', 'ZAIDA/NAIROBI', '2020-10-12 13:48:54', 350, 35, 0, 0, 0, 350, 0, 0),
(8, '001-009', 'MARIBEL/PLD', '2020-10-12 14:30:57', 0, 0, 0, 0, 0, 0, 0, 0),
(9, '001-010', 'ROSANNA/TANIA', '2020-10-12 14:32:00', 1380, 0, 0, 0, 0, 1380, 0, 0),
(10, '001-011', 'MARIA/PERLITA', '2020-10-12 14:34:19', 2750, 220, 0, 0, 0, 2750, 0, 0),
(11, '001-012', 'WILKIN/LOCUTORIO', '2020-10-12 14:35:22', 2000, 0, 0, 0, 0, 2000, 0, 0),
(12, '001-013', 'AUGUSTO/PEDRO', '2020-10-12 14:36:03', 0, 0, 0, 0, 0, 0, 0, 0),
(13, '001-014', 'PRIMAVERA', '2020-10-12 14:37:16', 3885, 0, 0, 0, 0, 3885, 0, 0),
(14, '001-015', 'SAMBA', '2020-10-12 14:37:52', 6000, 0, 0, 0, 0, 6000, 0, 0),
(15, '001-016', 'AGRIPINO', '2020-10-12 14:38:28', 0, 0, 0, 0, 0, 0, 0, 0),
(16, '001-017', 'MANOLO', '2020-10-12 14:39:16', 3500, 0, 0, 0, 0, 3500, 0, 0),
(17, '001-018', 'CARMEN MOTA', '2020-10-12 14:39:45', 0, 0, 0, 0, 0, 0, 0, 0),
(18, '001-019', 'RAMONA/CLEMENTE', '2020-10-12 14:40:52', 0, 0, 0, 0, 0, 0, 0, 0),
(19, '001-020', 'JOEL/ONEREYDI', '2020-10-12 14:41:41', 400, 0, 0, 0, 0, 400, 0, 0),
(20, '001-021', 'RAFAELITO/GUILLERMINA', '2020-10-12 14:42:59', 300, 30, 0, 0, 0, 300, 0, 0),
(22, '001-023', 'HENRY/PLD', '2020-10-12 14:44:34', 300, 30, 0, 0, 0, 300, 0, 0),
(23, '001-024', 'ANA/PATAKY', '2020-10-12 14:45:15', 60, 0, 0, 0, 0, 60, 0, 0),
(24, '001-025', 'TEODORO REYES', '2020-10-12 14:45:49', 0, 0, 0, 0, 0, 0, 0, 0),
(25, '001-026', 'ANTOLINA ASCANIO', '2020-10-12 14:46:30', 0, 0, 0, 0, 0, 0, 0, 0),
(26, '001-027', 'TITAN/CUCHITA', '2020-10-12 14:47:36', 300, 30, 0, 0, 0, 300, 0, 0),
(27, '001-032', 'FABIOLA', '2020-10-12 14:49:00', 0, 0, 0, 0, 0, 0, 0, 0),
(28, '001-033', 'DAVID/TOMAS', '2020-10-12 14:50:05', 355, 36, 0, 0, 0, 355, 0, 0),
(29, '001-036', 'TANIA', '2020-10-12 14:55:20', 250, 0, 0, 0, 0, 250, 0, 0),
(30, '001-037', 'DEYSI/CESAR', '2020-10-12 14:56:17', 150, 15, 0, 0, 0, 150, 0, 0),
(31, '001-039', 'JORGELIN/NANI', '2020-10-12 14:57:34', 0, 0, 0, 0, 0, 0, 0, 0),
(32, '001-040', 'MALBIN/CESAR', '2020-10-12 14:58:20', 0, 0, 0, 0, 0, 0, 0, 0),
(33, '001-041', 'BLANCO/GABRIELIN', '2020-10-12 14:59:12', 150, 0, 0, 0, 0, 150, 0, 0),
(34, '001-035', 'IRIS ROSARIO/MARCOS', '2020-10-12 15:01:11', 200, 20, 0, 0, 0, 200, 0, 0),
(35, '001-038', 'MANUEL/MANOLO', '2020-10-12 15:02:52', 50, 5, 0, 0, 0, 50, 0, 0),
(36, '001-043', 'JOSEFA', '2020-10-12 15:04:21', 2590, 0, 0, 0, 0, 2590, 0, 0),
(37, '001-044', 'MARTINEZ/CLARY', '2020-10-12 15:05:12', 500, 50, 0, 0, 0, 500, 0, 0),
(38, '001-045', 'YUBA', '2020-10-12 16:56:27', 4900, 0, 0, 0, 0, 4900, 0, 0),
(39, '001-047', 'HILARIO', '2020-10-12 16:57:14', 1300, 130, 0, 0, 0, 1300, 0, 0),
(40, '001-048', 'STWARD', '2020-10-12 16:57:50', 0, 0, 0, 0, 0, 0, 0, 0),
(41, '001-049', 'JORGE FELIZ/PLD', '2020-10-12 16:58:32', 500, 50, 0, 0, 0, 500, 0, 0),
(42, '001-050', 'BENCOSME', '2020-10-12 16:59:03', 0, 0, 0, 0, 0, 0, 0, 0),
(43, '001-051', 'LEANDRA/LEANDRA', '2020-10-12 17:00:35', 1900, 190, 0, 0, 0, 1900, 0, 0),
(44, '001-053', 'LANDER', '2020-10-12 17:01:24', 1000, 100, 0, 0, 0, 1000, 0, 0),
(45, '001-054', 'PAULINA', '2020-10-12 17:02:41', 750, 75, 0, 0, 0, 750, 0, 0),
(46, '001-056', 'RICHARD/ROSMERY', '2020-10-12 17:04:07', 950, 95, 0, 0, 0, 950, 0, 0),
(47, '001-057', 'EVELYN/EVELYN', '2020-10-12 17:05:17', 250, 25, 0, 0, 0, 250, 0, 0),
(49, '001-059', 'PERLITA', '2020-10-12 17:07:32', 700, 0, 0, 0, 0, 700, 0, 0),
(50, '001-062', 'NANA/LUISA', '2020-10-12 17:08:25', 2000, 0, 0, 0, 0, 2000, 0, 0),
(51, '001-063', 'HILDA/FORTUNA', '2020-10-12 17:09:14', 700, 70, 0, 0, 0, 700, 0, 0),
(52, '001-065', 'SARATHY', '2020-10-12 17:10:15', 0, 0, 0, 0, 0, 0, 0, 0),
(53, '001-066', 'ANNI/ZAFIRO', '2020-10-12 17:10:45', 300, 30, 0, 0, 0, 300, 0, 0),
(54, '001-068', 'HERMANA/ANTOLINA', '2020-10-12 17:11:39', 0, 0, 0, 0, 0, 0, 0, 0),
(55, '001-069', 'EDGAR/MANOLO', '2020-10-12 17:13:41', 680, 0, 0, 0, 0, 680, 0, 0),
(56, '001-067', 'MARGARITA/FEBRILLET', '2020-10-12 17:14:23', 0, 0, 0, 0, 0, 0, 0, 0),
(57, '001-071', 'CHULO/CLEMENTE', '2020-10-12 17:15:21', 70, 0, 0, 0, 0, 70, 0, 0),
(58, '001-070', 'ANGEL/PAQUETERÍA', '2020-10-12 17:16:00', 200, 0, 0, 0, 0, 200, 0, 0),
(59, '001-072', 'MIRIAM/MIGUEL', '2020-10-12 17:17:40', 350, 35, 0, 0, 0, 350, 0, 0),
(60, '001-074', 'CARLUIS/COYOTE', '2020-10-12 17:20:40', 2570, 0, 0, 0, 0, 2570, 0, 0),
(61, '001-075', 'XIOMARA ST VIL', '2020-10-12 17:21:45', 300, 30, 0, 0, 0, 300, 0, 0),
(62, '001-076', 'LEANDRA/MADRE', '2020-10-12 17:22:20', 1000, 100, 0, 0, 0, 1000, 0, 0),
(63, '001-078', 'YOMAIRA/EZEQUIEL', '2020-10-12 17:23:21', 450, 0, 0, 0, 0, 450, 0, 0),
(64, '001-079', 'MARY/PELUQUERÍA', '2020-10-12 17:24:31', 0, 0, 0, 0, 0, 0, 0, 0),
(65, '001-082', 'RONY/MADRE', '2020-10-12 17:25:36', 0, 0, 0, 0, 0, 0, 0, 0),
(66, '001-081', 'CHOWI/CHOWI', '2020-10-12 17:29:51', 400, 40, 0, 0, 0, 400, 0, 0),
(67, '001-083', 'LUCY/UVILLA', '2020-10-12 17:30:38', 800, 80, 0, 0, 0, 800, 0, 0),
(68, '001-086', 'YENNI/FAÑA', '2020-10-12 17:31:52', 3500, 350, 0, 0, 0, 3500, 0, 0),
(69, '001-087', 'WILMAN/YENNI', '2020-10-12 17:33:18', 2000, 160, 0, 0, 0, 2000, 0, 0),
(70, '001-090', 'ELIS/YENNI', '2020-10-12 17:34:48', 1500, 150, 0, 0, 0, 1500, 0, 0),
(71, '001-091', 'YINA/MANOLO', '2020-10-12 17:35:24', 0, 0, 0, 0, 0, 0, 0, 0),
(72, '001-092', 'VICKY/YINA', '2020-10-12 17:36:49', 0, 0, 0, 0, 0, 0, 0, 0),
(73, '001-093', 'YOVANNI/FAÑA', '2020-10-12 17:37:23', 0, 0, 0, 0, 0, 0, 0, 0),
(74, '001-094', 'RONNY VALDEZ', '2020-10-12 17:37:59', 0, 0, 0, 0, 0, 0, 0, 0),
(75, '001-098', 'GRISSEL/YERRI', '2020-10-12 17:39:16', 0, 0, 0, 0, 0, 0, 0, 0),
(76, '001-099', 'NUERA/CUCHITA', '2020-10-12 17:39:54', 0, 0, 0, 0, 0, 0, 0, 0),
(77, '001-102', 'JAVI/ESPAÑOL', '2020-10-12 17:41:41', 0, 0, 0, 0, 0, 0, 0, 0),
(78, '001-103', 'MADRE/DAYPI', '2020-10-12 17:42:17', 1000, 100, 0, 0, 0, 1000, 0, 0),
(80, '001-106', 'LINA/YOVANNI', '2020-10-12 17:45:08', 0, 0, 0, 0, 0, 0, 0, 0),
(81, '001-109', 'OSCAR JIMENEZ', '2020-10-12 17:46:53', 670, 0, 0, 0, 0, 670, 0, 0),
(82, '001-110', 'MARIAESTELA/XIOMARA', '2020-10-12 17:47:51', 600, 60, 0, 0, 0, 600, 0, 0),
(83, '001-111', 'SANTOS/VIDAL', '2020-10-12 17:48:23', 500, 50, 0, 0, 0, 500, 0, 0),
(84, '001-112', 'LIZA/LIZA', '2020-10-12 20:59:52', 200, 20, 0, 0, 0, 200, 0, 0),
(85, '001-115', 'JOSÉ/GUILLERMINA', '2020-10-12 21:00:56', 0, 0, 0, 0, 0, 0, 0, 0),
(86, '001-116', 'YERRI', '2020-10-12 21:01:34', 160, 16, 0, 0, 0, 160, 0, 0),
(87, '001-118', 'RAUL/MILQUEYA', '2020-10-12 21:02:25', 0, 0, 0, 0, 0, 0, 0, 0),
(88, '001-119', 'RAMÓN/PAULINA', '2020-10-12 21:04:57', 700, 70, 0, 0, 0, 700, 0, 0),
(89, '001-120', 'HERMANA/SOLANGIE', '2020-10-12 21:05:56', 1600, 160, 0, 0, 0, 1600, 0, 0),
(90, '001-123', 'RAUL/STWARD', '2020-10-12 21:07:36', 350, 35, 0, 0, 0, 350, 0, 0),
(91, '001-124', 'CAROLINA/ÑOÑÓ', '2020-10-12 21:09:29', 0, 0, 0, 0, 0, 0, 0, 0),
(92, '001-125', 'MERCEDES V/G', '2020-10-12 21:10:17', 0, 0, 0, 0, 0, 0, 0, 0),
(93, '001-127', 'YANI/ANGICAR', '2020-10-12 21:12:03', 0, 0, 0, 0, 0, 0, 0, 0),
(94, '001-128', 'CARLOS/AURIS', '2020-10-12 21:12:56', 250, 25, 0, 0, 0, 250, 0, 0),
(95, '002-001', 'CELESTE/CELESTE', '2020-10-12 21:14:31', 28470, 0, 0, 0, 0, 28470, 0, 0),
(96, '003-001', 'CRISTINITA/CRISTINITA', '2020-10-12 21:15:42', 12400, 0, 0, 0, 0, 12400, 0, 0),
(97, '003-002', 'TEREZA/CRISTINITA', '2020-10-12 21:16:47', 300, 30, 0, 0, 0, 300, 0, 0),
(98, '004-001', 'AURIS/AURIS', '2020-10-12 21:17:28', 12975, 0, 0, 0, 0, 12975, 0, 0),
(99, '004-002', 'CARLOS/AURIS S/R', '2020-10-12 21:20:02', 3700, 0, 0, 0, 0, 3700, 0, 0),
(100, '005-001', 'NICOLAS/NOCOLAS', '2020-10-12 21:26:06', 19155, 0, 0, 0, 0, 19155, 0, 0),
(101, '006-001', 'CARLOS/BODEGA', '2020-10-12 21:27:13', 1150, 115, 0, 0, 0, 1150, 0, 0),
(102, '006-002', 'CUBANO/CARLOS', '2020-10-12 21:28:17', 700, 70, 0, 0, 0, 700, 0, 0),
(103, '006-003', 'VIRTUDES/CARLOS', '2020-10-12 21:29:01', 300, 30, 0, 0, 0, 300, 0, 0),
(104, '006-004', 'AMIGA/CARLOS', '2020-10-12 21:29:38', 600, 60, 0, 0, 0, 600, 0, 0),
(105, '006-005', 'BLADIMIR', '2020-10-12 21:30:28', 500, 50, 0, 0, 0, 500, 0, 0),
(106, '006-006', 'ALIDA/CARLOS', '2020-10-12 21:31:05', 500, 50, 0, 0, 0, 500, 0, 0),
(107, '006-007', 'LUCIA/CARLOS', '2020-10-12 21:31:55', 350, 35, 0, 0, 0, 350, 0, 0),
(108, '006-008', 'FERMIN/CARLOS', '2020-10-12 21:32:43', 600, 60, 0, 0, 0, 600, 0, 0),
(109, '006-009', 'JOSEFINA/CARLOS', '2020-10-12 21:33:28', 0, 0, 0, 0, 0, 0, 0, 0),
(110, '007-001', 'ELSA/ELSA', '2020-10-12 21:34:50', 8220, 0, 0, 0, 0, 8220, 0, 0),
(111, '008-001', 'PETRA/PETRA', '2020-10-12 21:35:59', 4270, 0, 0, 0, 0, 4270, 0, 0),
(112, '001-028', 'ALBA IRIS', '2020-10-12 21:37:18', 500, 50, 0, 0, 0, 500, 0, 0),
(113, '009-001', 'MARITZA/MARITZA', '2020-10-12 21:38:58', 1300, 130, 0, 0, 0, 1300, 0, 0),
(114, '009-002', 'LA PAVA', '2020-10-12 21:39:35', 200, 0, 0, 0, 0, 200, 0, 0),
(115, '009-003', 'ESTHER/MARITZA', '2020-10-12 21:40:43', 400, 40, 0, 0, 0, 400, 0, 0),
(116, '009-004', 'EL ABUELO/MARITZA', '2020-10-12 21:41:57', 300, 30, 0, 0, 0, 300, 0, 0),
(117, '010-001', 'BERENICE/BERENICE', '2020-10-12 21:42:58', 100, 10, 0, 0, 0, 100, 0, 0),
(118, '010-002', 'ALEJANDRA/BERENICE', '2020-10-12 21:43:51', 0, 0, 0, 0, 0, 0, 0, 0),
(119, '010-003', 'BETTY/BERENICE', '2020-10-12 21:44:36', 0, 0, 0, 0, 0, 0, 0, 0),
(120, '001-029', 'MARIA/LIZA', '2020-10-12 21:45:44', 1500, 150, 0, 0, 0, 1500, 0, 0),
(121, '011-001', 'ANGELA/ANGELA', '2020-10-12 21:47:23', 150, 15, 0, 0, 0, 150, 0, 0),
(122, '011-002', 'RAMONA/ANGELA', '2020-10-12 21:48:20', 550, 55, 0, 0, 0, 550, 0, 0),
(123, '011-003', 'AMIGA/ANGELA', '2020-10-12 21:48:52', 0, 0, 0, 0, 0, 0, 0, 0),
(124, '011-004', 'JULIO/ANGELA', '2020-10-12 21:49:26', 0, 0, 0, 0, 0, 0, 0, 0),
(125, '011-005', 'ANGELICA/ANGELA', '2020-10-12 21:50:02', 1500, 150, 0, 0, 0, 1500, 0, 0),
(126, '011-006', 'COMPAÑERA/ANGELICA', '2020-10-12 21:50:48', 350, 35, 0, 0, 0, 350, 0, 0),
(127, '012-001', 'EDITA/EDITA', '2020-10-12 21:51:30', 11330, 0, 0, 0, 0, 11330, 0, 0),
(128, '012-002', 'YUNIOR/EDITA', '2020-10-12 21:52:27', 2300, 0, 0, 0, 0, 2300, 0, 0),
(129, '012-003', 'WENDY/EDITA', '2020-10-12 21:53:05', 6720, 0, 0, 0, 0, 6720, 0, 0),
(130, '013-001', 'SOLANGIE/DELIO', '2020-10-12 21:54:20', 2165, 217, 0, 0, 0, 2165, 0, 0),
(131, '013-002', 'MELLA/TRONCA', '2020-10-12 21:54:58', 0, 0, 0, 0, 0, 0, 0, 0),
(132, '013-004', 'MELBIN/DELIO', '2020-10-12 21:55:45', 575, 0, 0, 0, 0, 575, 0, 0),
(133, '013-005', 'ADA/MELLA', '2020-10-12 21:56:22', 150, 15, 0, 0, 0, 150, 0, 0),
(134, '013-006', 'NANCY/MELLA', '2020-10-12 21:57:51', 0, 0, 0, 0, 0, 0, 0, 0),
(135, '014-001', 'COMADRE INÉS', '2020-10-12 21:59:26', 2750, 0, 0, 0, 0, 2750, 0, 0),
(136, '014-002', 'NATY', '2020-10-12 23:02:36', 7955, 0, 0, 0, 0, 7955, 0, 0),
(137, '014-003', 'NANI/IRIS', '2020-10-12 23:04:07', 300, 30, 0, 0, 0, 300, 0, 0),
(138, '014-004', 'IRIS/INÉS', '2020-10-12 23:40:46', 1000, 100, 0, 0, 0, 1000, 0, 0),
(139, '014-005', 'CRIS/NANI IRIS', '2020-10-12 23:41:54', 0, 0, 0, 0, 0, 0, 0, 0),
(140, '014-006', 'YOCELIN/IRIS', '2020-10-12 23:42:48', 0, 0, 0, 0, 0, 0, 0, 0),
(141, '014-007', 'LICELOTE/MARCIA', '2020-10-12 23:43:57', 1100, 110, 0, 0, 0, 1100, 0, 0),
(142, '014-008', 'GRISOL/MARCIA', '2020-10-12 23:44:29', 0, 0, 0, 0, 0, 0, 0, 0),
(143, '014-009', 'RICARDO/INES', '2020-10-12 23:45:56', 2675, 0, 0, 0, 0, 2675, 0, 0),
(144, '015-001', 'NOEMI/NOEMI', '2020-10-13 00:14:20', 0, 0, 0, 0, 0, 0, 0, 0),
(145, '015-002', 'SOLANNY/NOEMI', '2020-10-13 00:15:28', 0, 0, 0, 0, 0, 0, 0, 0),
(146, '015-003', 'YAJANIS/NOEMI', '2020-10-13 00:16:19', 400, 40, 0, 0, 0, 400, 0, 0),
(147, '015-004', 'CRISTINA/NOEMI', '2020-10-13 00:17:22', 150, 15, 0, 0, 0, 150, 0, 0),
(148, '015-005', 'RAMONA/NOEMI', '2020-10-13 00:17:58', 1000, 100, 0, 0, 0, 1000, 0, 0),
(149, '015-006', 'ZOILA/NOEMI', '2020-10-13 00:18:29', 0, 0, 0, 0, 0, 0, 0, 0),
(150, '015-007', 'SUHEY/NOEMÍ', '2020-10-13 00:19:15', 700, 70, 0, 0, 0, 700, 0, 0),
(151, '016-001', 'VIRITA/VIRITA', '2020-10-13 00:20:19', 0, 0, 0, 0, 0, 0, 0, 0),
(152, '016-002', 'FEDERICA/VIRITA', '2020-10-13 00:21:24', 650, 65, 0, 0, 0, 650, 0, 0),
(153, '016-003', 'ISIS/VIRITA', '2020-10-13 00:21:58', 200, 20, 0, 0, 0, 200, 0, 0),
(154, '016-004', 'ELIDO/VIRITA', '2020-10-13 00:22:33', 300, 30, 0, 0, 0, 300, 0, 0),
(155, '016-006', 'YOCELIN/VIRITA', '2020-10-13 00:23:39', 100, 10, 0, 0, 0, 100, 0, 0),
(156, '016-007', 'LETICIA/VIRITA', '2020-10-13 00:24:36', 350, 35, 0, 0, 0, 350, 0, 0),
(157, '016-008', 'FORTUNA/VIRITA', '2020-10-13 00:25:05', 0, 0, 0, 0, 0, 0, 0, 0),
(159, '016-010', 'JOSÉ/VIRITA', '2020-10-13 00:26:38', 0, 0, 0, 0, 0, 0, 0, 0),
(161, '001-030', 'HNO LANDER', '2020-10-13 13:48:07', 1000, 100, 0, 0, 0, 1000, 0, 0),
(162, '001-031', 'FAUSTO/PAQUETERÍA', '2020-10-13 13:55:41', 500, 50, 0, 0, 0, 500, 0, 0),
(163, '001-060', 'JAÑICO', '2020-10-13 14:37:14', 200, 20, 0, 0, 0, 200, 0, 0),
(164, '001-061', 'YAHAIRA/AMAURIS', '2020-10-13 14:38:52', 0, 0, 0, 0, 0, 0, 0, 0),
(165, '001-064', 'ARELIS/SILDA', '2020-10-13 14:40:28', 1000, 100, 0, 0, 0, 1000, 0, 0),
(166, '001-077', 'VERÓNICA/CLEMENTE', '2020-10-13 14:46:32', 1000, 100, 0, 0, 0, 1000, 0, 0),
(167, '001-117', 'YERRI/CHINITO', '2020-10-13 14:52:29', 0, 0, 0, 0, 0, 0, 0, 0),
(173, '001-022', 'LEO/PETRA', '2020-10-24 14:57:25', 800, 80, 0, 0, 0, 800, 0, 0),
(174, '001-105', 'CORDERO/PETER', '2020-10-24 14:59:20', 80, 8, 0, 0, 0, 80, 0, 0),
(176, '001-001', 'JOSE MEDRANO', '2020-10-24 15:51:22', 0, 0, 0, 0, 0, 0, 0, 0),
(177, '001-058', 'MORENA/ÑOÑO', '2020-10-24 16:30:43', 2320, 232, 0, 0, 0, 2320, 0, 0),
(178, '016-001', 'VIRITA/VIRITA', '2020-10-24 17:00:44', 600, 60, 0, 0, 0, 600, 0, 0),
(179, '016-008', 'FORTUNA/VIRITA', '2020-10-24 17:05:15', 400, 40, 0, 0, 0, 400, 0, 0),
(180, '016-009', 'ANGEL/VIRITA', '2020-10-24 17:09:36', 1615, 161.5, 0, 0, 0, 1615, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `update_database`
--

CREATE TABLE `update_database` (
  `id` int(11) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `update_database`
--

INSERT INTO `update_database` (`id`, `updated_date`) VALUES
(1, '2020-10-24 19:45:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `passw`, `status`, `register_date`) VALUES
(1, 'haroldtheking@gmail.com', '80d339c67ed4c732a9eb895d581a0f34', 1, '2020-09-27 20:30:09'),
(2, 'medrano', 'ca655a41d3f992e22c66cedca577d1da', 1, '2020-10-02 02:16:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `mount` double NOT NULL,
  `administrator` varchar(50) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wallet`
--

INSERT INTO `wallet` (`id`, `mount`, `administrator`, `updated`, `status`) VALUES
(1, 300, 'Jose Medrano', '2020-10-24 17:45:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `black_list`
--
ALTER TABLE `black_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `global_information`
--
ALTER TABLE `global_information`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `information_month`
--
ALTER TABLE `information_month`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lost_money`
--
ALTER TABLE `lost_money`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `update_database`
--
ALTER TABLE `update_database`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `black_list`
--
ALTER TABLE `black_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de la tabla `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `global_information`
--
ALTER TABLE `global_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `information_month`
--
ALTER TABLE `information_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lost_money`
--
ALTER TABLE `lost_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `update_database`
--
ALTER TABLE `update_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
