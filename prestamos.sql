-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-10-2020 a las 21:25:33
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
  `interest` int(11) NOT NULL DEFAULT '0',
  `start_month` date NOT NULL,
  `initial_loan` double NOT NULL DEFAULT '0',
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `id_customer`, `name`, `full_name`, `phone`, `interest`, `start_month`, `initial_loan`, `payment_status`, `updated_on`) VALUES
(1, '001-002', 'alfredo colombia', 'Not specifying', 'Not specifying', 0, '2018-09-01', 3250, 'pending', '0000-00-00 00:00:00'),
(2, '001-004', 'claris prima', 'Not specifying', 'Not specifying', 0, '2019-04-01', 3150, 'pending', '0000-00-00 00:00:00'),
(3, '001-005', 'jonas', 'Not specifying', 'Not specifying', 0, '2020-05-01', 2230, 'pending', '0000-00-00 00:00:00'),
(4, '001-003', 'martin busqueda', 'Not specifying', 'Not specifying', 0, '2018-09-01', 3000, 'pending', '0000-00-00 00:00:00'),
(5, '001-006', 'nuris yaritsa', 'Not specifying', 'Not specifying', 0, '2019-04-01', 200, 'pending', '0000-00-00 00:00:00'),
(6, '001-008', 'zaida nairoby', 'Not specifying', 'Not specifying', 0, '2019-08-01', 500, 'pending', '0000-00-00 00:00:00'),
(7, '001-011', 'maria perlita', 'Not specifying', 'Not specifying', 0, '2017-02-01', 2500, 'pending', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `dete` datetime NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deposits`
--

INSERT INTO `deposits` (`id`, `id_customer`, `client`, `dete`, `amount`) VALUES
(1, '001-002', 'alfredo colombia', '2018-10-10 00:00:00', 0),
(2, '001-002', 'alfredo colombia', '2018-11-10 00:00:00', 0),
(3, '001-002', 'alfredo colombia', '2018-12-10 00:00:00', 0),
(4, '001-002', 'alfredo colombia', '2019-01-10 00:00:00', 0),
(5, '001-002', 'alfredo colombia', '2019-02-10 00:00:00', 0),
(6, '001-002', 'alfredo colombia', '2019-03-10 00:00:00', 0),
(7, '001-002', 'alfredo colombia', '2019-04-10 00:00:00', 0),
(8, '001-002', 'alfredo colombia', '2019-05-10 00:00:00', 0),
(9, '001-002', 'alfredo colombia', '2019-06-10 00:00:00', 0),
(10, '001-002', 'alfredo colombia', '2019-07-24 00:00:00', 200),
(11, '001-002', 'alfredo colombia', '2019-08-10 00:00:00', 0),
(12, '001-002', 'alfredo colombia', '2019-09-10 00:00:00', 0),
(13, '001-002', 'alfredo colombia', '2019-10-10 00:00:00', 0),
(14, '001-002', 'alfredo colombia', '2019-11-10 00:00:00', 0),
(15, '001-002', 'alfredo colombia', '2019-12-10 00:00:00', 0),
(16, '001-002', 'alfredo colombia', '2020-01-10 00:00:00', 0),
(17, '001-002', 'alfredo colombia', '2020-02-10 00:00:00', 0),
(18, '001-002', 'alfredo colombia', '2020-03-10 00:00:00', 0),
(19, '001-002', 'alfredo colombia', '2020-04-10 00:00:00', 0),
(20, '001-002', 'alfredo colombia', '2020-05-27 00:00:00', 50),
(21, '001-002', 'alfredo colombia', '2020-06-03 00:00:00', 50),
(22, '001-002', 'alfredo colombia', '2020-07-02 00:00:00', 30),
(23, '001-002', 'alfredo colombia', '2020-08-21 00:00:00', 30),
(24, '001-002', 'alfredo colombia', '2020-06-17 00:00:00', 25),
(25, '001-002', 'alfredo colombia', '2020-07-10 00:00:00', 30),
(26, '001-002', 'alfredo colombia', '2020-08-30 00:00:00', 30),
(27, '001-002', 'alfredo colombia', '2020-06-19 00:00:00', 75),
(28, '001-002', 'alfredo colombia', '2020-07-19 00:00:00', 60),
(29, '001-002', 'alfredo colombia', '2020-09-05 00:00:00', 30),
(30, '001-005', 'jonas', '2020-06-04 00:00:00', 150),
(31, '001-003', 'martin busqueda', '2018-10-02 00:00:00', 150),
(32, '001-005', 'jonas', '2020-07-14 00:00:00', 100),
(33, '001-005', 'jonas', '2020-08-10 00:00:00', 0),
(34, '001-003', 'martin busqueda', '2018-11-02 00:00:00', 150),
(35, '001-005', 'jonas', '2020-09-02 00:00:00', 140),
(36, '001-003', 'martin busqueda', '2018-12-04 00:00:00', 150),
(37, '001-003', 'martin busqueda', '2019-01-03 00:00:00', 150),
(38, '001-003', 'martin busqueda', '2019-02-05 00:00:00', 150),
(39, '001-003', 'martin busqueda', '2019-03-05 00:00:00', 150),
(40, '001-004', 'claris prima', '2019-05-02 00:00:00', 150),
(41, '001-003', 'martin busqueda', '2019-04-02 00:00:00', 150),
(42, '001-004', 'claris prima', '2019-06-01 00:00:00', 200),
(43, '001-004', 'claris prima', '2019-07-01 00:00:00', 0),
(44, '001-003', 'martin busqueda', '2019-05-16 00:00:00', 150),
(45, '001-004', 'claris prima', '2019-08-01 00:00:00', 0),
(46, '001-004', 'claris prima', '2019-09-02 00:00:00', 200),
(47, '001-003', 'martin busqueda', '2019-06-12 00:00:00', 150),
(48, '001-004', 'claris prima', '2019-10-01 00:00:00', 150),
(49, '001-004', 'claris prima', '2019-11-01 00:00:00', 150),
(50, '001-004', 'claris prima', '2019-12-01 00:00:00', 150),
(51, '001-004', 'claris prima', '2020-01-10 00:00:00', 0),
(52, '001-004', 'claris prima', '2020-01-31 00:00:00', 150),
(53, '001-004', 'claris prima', '2020-02-28 00:00:00', 100),
(54, '001-004', 'claris prima', '2020-04-10 00:00:00', 0),
(55, '001-004', 'claris prima', '2020-05-02 00:00:00', 100),
(56, '001-004', 'claris prima', '2020-06-01 00:00:00', 100),
(57, '001-004', 'claris prima', '2020-07-10 00:00:00', 0),
(58, '001-004', 'claris prima', '2020-08-01 00:00:00', 100),
(59, '001-004', 'claris prima', '2019-06-25 00:00:00', 200),
(60, '001-004', 'claris prima', '2019-06-25 00:00:00', -100),
(61, '001-008', 'zaida nairoby', '2019-09-12 00:00:00', 50),
(62, '001-011', 'maria perlita', '2017-03-06 00:00:00', 250),
(63, '001-008', 'zaida nairoby', '2019-10-06 00:00:00', 50),
(64, '001-011', 'maria perlita', '2017-04-06 00:00:00', 250),
(65, '001-008', 'zaida nairoby', '2019-11-05 00:00:00', 50),
(66, '001-011', 'maria perlita', '2017-05-05 00:00:00', 250),
(67, '001-008', 'zaida nairoby', '2019-12-02 00:00:00', 50),
(68, '001-011', 'maria perlita', '2017-06-05 00:00:00', 350),
(69, '001-008', 'zaida nairoby', '2020-02-08 00:00:00', 50),
(70, '001-011', 'maria perlita', '2017-07-03 00:00:00', 350),
(71, '001-008', 'zaida nairoby', '2020-02-08 00:00:00', 50),
(72, '001-011', 'maria perlita', '2017-09-06 00:00:00', 350),
(73, '001-008', 'zaida nairoby', '2020-03-08 00:00:00', 50),
(74, '001-011', 'maria perlita', '2017-09-06 00:00:00', 350),
(75, '001-008', 'zaida nairoby', '2020-05-22 00:00:00', 50),
(76, '001-011', 'maria perlita', '2017-10-11 00:00:00', 350),
(77, '001-008', 'zaida nairoby', '2020-05-22 00:00:00', 50),
(78, '001-011', 'maria perlita', '2017-11-05 00:00:00', 350),
(79, '001-008', 'zaida nairoby', '2020-06-10 00:00:00', 50),
(80, '001-011', 'maria perlita', '2017-12-04 00:00:00', 350),
(81, '001-008', 'zaida nairoby', '2020-07-11 00:00:00', 50),
(82, '001-008', 'zaida nairoby', '2020-08-11 00:00:00', 150),
(83, '001-008', 'zaida nairoby', '2020-09-14 00:00:00', 90),
(84, '001-009', 'maribel pld', '2019-09-06 00:00:00', -150),
(85, '001-011', 'maria perlita', '2018-01-04 00:00:00', 350),
(86, '001-009', 'maribel pld', '2019-10-04 00:00:00', 15),
(87, '001-011', 'maria perlita', '2018-02-07 00:00:00', 350),
(88, '001-009', 'maribel pld', '2019-11-07 00:00:00', 15),
(89, '001-011', 'maria perlita', '2018-03-09 00:00:00', 350),
(90, '001-009', 'maribel pld', '2020-12-06 00:00:00', 165),
(91, '001-011', 'maria perlita', '2018-04-05 00:00:00', 350),
(92, '001-011', 'maria perlita', '2018-05-04 00:00:00', 300),
(93, '001-011', 'maria perlita', '2018-06-03 00:00:00', 400),
(94, '001-012', 'wilkin locutorio', '2020-04-21 00:00:00', 300),
(95, '001-011', 'maria perlita', '2018-07-05 00:00:00', 300),
(96, '001-011', 'maria perlita', '2018-08-02 00:00:00', 300),
(97, '001-012', 'wilkin locutorio', '2020-06-06 00:00:00', 300),
(98, '001-012', 'wilkin locutorio', '2020-07-20 00:00:00', 300),
(99, '001-011', 'maria perlita', '2018-08-30 00:00:00', 350),
(100, '001-012', 'wilkin locutorio', '2020-07-20 00:00:00', 200),
(101, '001-011', 'maria perlita', '2018-10-11 00:00:00', 100),
(102, '001-012', 'wilkin locutorio', '2020-09-04 00:00:00', 400),
(103, '001-011', 'maria perlita', '2018-11-06 00:00:00', 320),
(104, '001-011', 'maria perlita', '2018-12-04 00:00:00', 280),
(105, '001-011', 'maria perlita', '2019-01-04 00:00:00', 70),
(106, '001-011', 'maria perlita', '2019-02-05 00:00:00', 100),
(107, '001-011', 'maria perlita', '2019-03-05 00:00:00', 325),
(108, '001-011', 'maria perlita', '2019-04-05 00:00:00', 325),
(109, '001-011', 'maria perlita', '2019-05-07 00:00:00', 325),
(110, '001-011', 'maria perlita', '2019-06-04 00:00:00', 325),
(111, '001-011', 'maria perlita', '2019-07-02 00:00:00', 325),
(112, '001-011', 'maria perlita', '2019-08-02 00:00:00', 250),
(113, '001-011', 'maria perlita', '2019-09-05 00:00:00', 300),
(114, '001-011', 'maria perlita', '2019-10-04 00:00:00', 270),
(115, '001-011', 'maria perlita', '2019-11-05 00:00:00', 275),
(116, '001-011', 'maria perlita', '2019-12-03 00:00:00', 280),
(117, '001-011', 'maria perlita', '2020-01-08 00:00:00', 275),
(118, '001-011', 'maria perlita', '2020-02-04 00:00:00', 275),
(119, '001-011', 'maria perlita', '2020-03-03 00:00:00', 300),
(120, '001-011', 'maria perlita', '2020-04-04 00:00:00', 200),
(121, '001-011', 'maria perlita', '2020-05-06 00:00:00', 180),
(122, '001-011', 'maria perlita', '2020-06-06 00:00:00', 200),
(123, '001-011', 'maria perlita', '2020-07-02 00:00:00', 250),
(124, '001-011', 'maria perlita', '2020-08-03 00:00:00', 275),
(125, '001-011', 'maria perlita', '2020-09-03 00:00:00', 250),
(126, '001-011', 'maria perlita', '2017-05-05 00:00:00', -1000),
(127, '001-011', 'maria perlita', '2018-08-30 00:00:00', 0),
(128, '001-011', 'maria perlita', '2019-01-10 00:00:00', 30),
(129, '001-011', 'maria perlita', '2019-02-20 00:00:00', 750);

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
  `outstanding_capital` double NOT NULL,
  `interest` int(11) NOT NULL,
  `accrued_interest` double NOT NULL,
  `interest_paid` double NOT NULL,
  `pending_interest` double NOT NULL,
  `paid_capital` double NOT NULL,
  `increased_debt` double NOT NULL,
  `payment_month` double NOT NULL
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
  `outstanding_capital` double NOT NULL,
  `interest` int(11) NOT NULL,
  `accrued_interest` double NOT NULL,
  `interest_paid` double NOT NULL,
  `pending_interest` double NOT NULL,
  `paid_capital` double NOT NULL,
  `increased_debt` double NOT NULL,
  `payment_month` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `id_customer`, `client`, `dete`, `outstanding_capital`, `interest`, `accrued_interest`, `interest_paid`, `pending_interest`, `paid_capital`, `increased_debt`, `payment_month`) VALUES
(1774, '001-002', 'alfredo colombia', '2018-09-01 00:00:00', 3250, 0, 0, 0, 0, 0, 3250, 0),
(1775, '001-002', 'alfredo colombia', '2018-10-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1776, '001-002', 'alfredo colombia', '2018-11-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1777, '001-002', 'alfredo colombia', '2018-12-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1778, '001-002', 'alfredo colombia', '2019-01-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1779, '001-002', 'alfredo colombia', '2019-02-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1780, '001-002', 'alfredo colombia', '2019-03-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1781, '001-002', 'alfredo colombia', '2019-04-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1782, '001-002', 'alfredo colombia', '2019-05-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1783, '001-002', 'alfredo colombia', '2019-06-01 00:00:00', 3250, 0, 0, 0, 0, 0, 0, 0),
(1784, '001-002', 'alfredo colombia', '2019-07-01 00:00:00', 3050, 0, 0, 0, 0, 200, 0, 200),
(1785, '001-002', 'alfredo colombia', '2019-08-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1786, '001-002', 'alfredo colombia', '2019-09-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1787, '001-002', 'alfredo colombia', '2019-10-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1788, '001-002', 'alfredo colombia', '2019-11-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1789, '001-002', 'alfredo colombia', '2019-12-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1790, '001-002', 'alfredo colombia', '2020-01-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1791, '001-002', 'alfredo colombia', '2020-02-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1792, '001-002', 'alfredo colombia', '2020-03-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1793, '001-002', 'alfredo colombia', '2020-04-01 00:00:00', 3050, 0, 0, 0, 0, 0, 0, 0),
(1794, '001-002', 'alfredo colombia', '2020-05-01 00:00:00', 3000, 0, 0, 0, 0, 50, 0, 50),
(1795, '001-002', 'alfredo colombia', '2020-06-01 00:00:00', 2850, 0, 0, 0, 0, 150, 0, 150),
(1796, '001-002', 'alfredo colombia', '2020-07-01 00:00:00', 2730, 0, 0, 0, 0, 120, 0, 120),
(1797, '001-002', 'alfredo colombia', '2020-08-01 00:00:00', 2640, 0, 0, 0, 0, 90, 0, 90),
(1798, '001-004', 'claris prima', '2019-04-01 00:00:00', 3150, 0, 0, 0, 0, 0, 3150, 0),
(1799, '001-004', 'claris prima', '2019-05-01 00:00:00', 3000, 0, 0, 0, 0, 150, 0, 150),
(1800, '001-004', 'claris prima', '2019-06-01 00:00:00', 2700, 0, 0, 0, 0, 400, 100, 400),
(1801, '001-004', 'claris prima', '2019-07-01 00:00:00', 2700, 0, 0, 0, 0, 0, 0, 0),
(1802, '001-004', 'claris prima', '2019-08-01 00:00:00', 2700, 0, 0, 0, 0, 0, 0, 0),
(1803, '001-004', 'claris prima', '2019-09-01 00:00:00', 2500, 0, 0, 0, 0, 200, 0, 200),
(1804, '001-004', 'claris prima', '2019-10-01 00:00:00', 2350, 0, 0, 0, 0, 150, 0, 150),
(1805, '001-004', 'claris prima', '2019-11-01 00:00:00', 2200, 0, 0, 0, 0, 150, 0, 150),
(1806, '001-004', 'claris prima', '2019-12-01 00:00:00', 2050, 0, 0, 0, 0, 150, 0, 150),
(1807, '001-005', 'jonas', '2020-05-01 00:00:00', 2230, 0, 0, 0, 0, 0, 2230, 0),
(1808, '001-004', 'claris prima', '2020-01-01 00:00:00', 2050, 0, 0, 0, 0, 0, 0, 0),
(1809, '001-005', 'jonas', '2020-06-01 00:00:00', 2080, 0, 0, 0, 0, 150, 0, 150),
(1810, '001-004', 'claris prima', '2020-02-01 00:00:00', 1900, 0, 0, 0, 0, 150, 0, 150),
(1811, '001-005', 'jonas', '2020-07-01 00:00:00', 1980, 0, 0, 0, 0, 100, 0, 100),
(1812, '001-004', 'claris prima', '2020-03-01 00:00:00', 1800, 0, 0, 0, 0, 100, 0, 100),
(1813, '001-003', 'martin busqueda', '2018-09-01 00:00:00', 3000, 0, 0, 0, 0, 0, 3000, 0),
(1814, '001-005', 'jonas', '2020-08-01 00:00:00', 1980, 0, 0, 0, 0, 0, 0, 0),
(1815, '001-004', 'claris prima', '2020-04-01 00:00:00', 1800, 0, 0, 0, 0, 0, 0, 0),
(1816, '001-003', 'martin busqueda', '2018-10-01 00:00:00', 2850, 0, 0, 0, 0, 150, 0, 150),
(1817, '001-004', 'claris prima', '2020-05-01 00:00:00', 1700, 0, 0, 0, 0, 100, 0, 100),
(1818, '001-005', 'jonas', '2020-09-01 00:00:00', 1840, 0, 0, 0, 0, 140, 0, 140),
(1819, '001-003', 'martin busqueda', '2018-11-01 00:00:00', 2700, 0, 0, 0, 0, 150, 0, 150),
(1820, '001-004', 'claris prima', '2020-06-01 00:00:00', 1600, 0, 0, 0, 0, 100, 0, 100),
(1821, '001-003', 'martin busqueda', '2018-12-01 00:00:00', 2550, 0, 0, 0, 0, 150, 0, 150),
(1822, '001-004', 'claris prima', '2020-07-01 00:00:00', 1600, 0, 0, 0, 0, 0, 0, 0),
(1823, '001-003', 'martin busqueda', '2019-01-01 00:00:00', 2400, 0, 0, 0, 0, 150, 0, 150),
(1824, '001-003', 'martin busqueda', '2019-02-01 00:00:00', 2250, 0, 0, 0, 0, 150, 0, 150),
(1825, '001-004', 'claris prima', '2020-08-01 00:00:00', 1500, 0, 0, 0, 0, 100, 0, 100),
(1826, '001-003', 'martin busqueda', '2019-03-01 00:00:00', 2100, 0, 0, 0, 0, 150, 0, 150),
(1827, '001-003', 'martin busqueda', '2019-04-01 00:00:00', 1950, 0, 0, 0, 0, 150, 0, 150),
(1828, '001-006', 'nuris yaritsa', '2019-04-01 00:00:00', 200, 0, 20, 20, 0, 0, 200, 20),
(1829, '001-003', 'martin busqueda', '2019-05-01 00:00:00', 1800, 0, 0, 0, 0, 150, 0, 150),
(1830, '001-003', 'martin busqueda', '2019-06-01 00:00:00', 1650, 0, 0, 0, 0, 150, 0, 150),
(1831, '001-006', 'nuris yaritsa', '2019-05-01 00:00:00', 0, 20, 20, 20, 0, 200, 0, 220),
(1832, '001-008', 'zaida nairoby', '2019-08-01 00:00:00', 500, 0, 0, 0, 0, 0, 500, 0),
(1833, '001-008', 'zaida nairoby', '2019-09-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1834, '001-008', 'zaida nairoby', '2019-10-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1835, '001-008', 'zaida nairoby', '2019-11-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1836, '001-008', 'zaida nairoby', '2019-12-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1837, '001-008', 'zaida nairoby', '2020-01-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1838, '001-008', 'zaida nairoby', '2020-02-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1839, '001-008', 'zaida nairoby', '2020-03-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1840, '001-008', 'zaida nairoby', '2020-04-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1841, '001-008', 'zaida nairoby', '2020-05-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1842, '001-009', 'maribel pld', '2019-09-01 00:00:00', 150, 0, 15, 15, 0, -15, 300, 0),
(1843, '001-009', 'maribel pld', '2019-10-01 00:00:00', 150, 15, 15, 15, 0, 0, 0, 15),
(1844, '001-009', 'maribel pld', '2019-11-01 00:00:00', 150, 15, 15, 15, 0, 0, 0, 15),
(1845, '001-008', 'zaida nairoby', '2020-06-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1846, '001-008', 'zaida nairoby', '2020-07-01 00:00:00', 500, 50, 50, 50, 0, 0, 0, 50),
(1847, '001-008', 'zaida nairoby', '2020-08-01 00:00:00', 400, 50, 50, 50, 0, 100, 0, 150),
(1848, '001-009', 'maribel pld', '2019-12-01 00:00:00', 0, 15, 15, 15, 0, 150, 0, 165),
(1849, '001-008', 'zaida nairoby', '2020-09-01 00:00:00', 350, 40, 40, 40, 0, 50, 0, 90),
(1850, '001-011', 'maria perlita', '2017-02-01 00:00:00', 2500, 0, 0, 0, 0, 0, 2500, 0),
(1851, '001-011', 'maria perlita', '2017-03-01 00:00:00', 2500, 250, 250, 250, 0, 0, 0, 250),
(1852, '001-011', 'maria perlita', '2017-04-01 00:00:00', 2500, 250, 250, 250, 0, 0, 0, 250),
(1853, '001-011', 'maria perlita', '2017-05-01 00:00:00', 3500, 250, 250, 250, 0, 0, 1000, 250),
(1854, '001-011', 'maria perlita', '2017-06-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1855, '001-011', 'maria perlita', '2017-07-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1856, '001-011', 'maria perlita', '2017-08-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1857, '001-011', 'maria perlita', '2017-09-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1858, '001-011', 'maria perlita', '2017-10-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1859, '001-011', 'maria perlita', '2017-11-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1860, '001-011', 'maria perlita', '2017-12-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1861, '001-011', 'maria perlita', '2018-01-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1862, '001-011', 'maria perlita', '2018-02-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1863, '001-011', 'maria perlita', '2018-03-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1864, '001-011', 'maria perlita', '2018-04-01 00:00:00', 3500, 350, 350, 350, 0, 0, 0, 350),
(1865, '001-011', 'maria perlita', '2018-05-01 00:00:00', 3500, 350, 350, 300, 50, 0, 0, 300),
(1866, '001-011', 'maria perlita', '2018-06-01 00:00:00', 3500, 350, 400, 400, 0, 0, 0, 400),
(1867, '001-011', 'maria perlita', '2018-07-01 00:00:00', 3500, 350, 350, 300, 50, 0, 0, 300),
(1868, '001-011', 'maria perlita', '2018-08-01 00:00:00', 3500, 350, 400, 300, 100, 0, 0, 300),
(1869, '001-011', 'maria perlita', '2018-09-01 00:00:00', 3500, 350, 450, 350, 100, 0, 0, 350),
(1870, '001-011', 'maria perlita', '2018-10-01 00:00:00', 3500, 350, 450, 100, 350, 0, 0, 100),
(1871, '001-011', 'maria perlita', '2018-11-01 00:00:00', 3500, 350, 700, 320, 380, 0, 0, 320),
(1872, '001-011', 'maria perlita', '2018-12-01 00:00:00', 3500, 350, 730, 280, 450, 0, 0, 280),
(1873, '001-011', 'maria perlita', '2019-01-01 00:00:00', 3500, 350, 800, 100, 700, 0, 0, 100),
(1874, '001-011', 'maria perlita', '2019-02-01 00:00:00', 3500, 350, 1050, 850, 200, 0, 0, 850),
(1875, '001-011', 'maria perlita', '2019-03-01 00:00:00', 2750, 275, 550, 325, 225, 0, 0, 325),
(1876, '001-011', 'maria perlita', '2019-04-01 00:00:00', 2750, 275, 500, 325, 175, 0, 0, 325),
(1877, '001-011', 'maria perlita', '2019-05-01 00:00:00', 2750, 275, 450, 325, 125, 0, 0, 325),
(1878, '001-011', 'maria perlita', '2019-06-01 00:00:00', 2750, 275, 400, 325, 75, 0, 0, 325),
(1879, '001-011', 'maria perlita', '2019-07-01 00:00:00', 2750, 275, 350, 325, 25, 0, 0, 325),
(1880, '001-011', 'maria perlita', '2019-08-01 00:00:00', 2750, 275, 300, 250, 50, 0, 0, 250),
(1881, '001-011', 'maria perlita', '2019-09-01 00:00:00', 2750, 275, 325, 300, 25, 0, 0, 300),
(1882, '001-011', 'maria perlita', '2019-10-01 00:00:00', 2750, 275, 300, 270, 30, 0, 0, 270),
(1883, '001-011', 'maria perlita', '2019-11-01 00:00:00', 2750, 275, 305, 275, 30, 0, 0, 275),
(1884, '001-011', 'maria perlita', '2019-12-01 00:00:00', 2750, 275, 305, 280, 25, 0, 0, 280),
(1885, '001-011', 'maria perlita', '2020-01-01 00:00:00', 2750, 275, 300, 275, 25, 0, 0, 275),
(1886, '001-011', 'maria perlita', '2020-02-01 00:00:00', 2750, 275, 300, 275, 25, 0, 0, 275),
(1887, '001-011', 'maria perlita', '2020-03-01 00:00:00', 2750, 275, 300, 300, 0, 0, 0, 300),
(1888, '001-011', 'maria perlita', '2020-04-01 00:00:00', 2750, 275, 275, 200, 75, 0, 0, 200),
(1889, '001-011', 'maria perlita', '2020-05-01 00:00:00', 2750, 275, 350, 180, 170, 0, 0, 180),
(1890, '001-011', 'maria perlita', '2020-06-01 00:00:00', 2750, 275, 445, 200, 245, 0, 0, 200),
(1891, '001-011', 'maria perlita', '2020-07-01 00:00:00', 2750, 275, 520, 250, 270, 0, 0, 250),
(1892, '001-011', 'maria perlita', '2020-08-01 00:00:00', 2750, 275, 545, 275, 270, 0, 0, 275),
(1893, '001-011', 'maria perlita', '2020-09-01 00:00:00', 2750, 275, 545, 250, 295, 0, 0, 250),
(1894, '001-002', 'alfredo colombia', '2020-09-04 03:11:08', 2640, 0, 0, 0, 0, 0, 0, 0),
(1895, '001-002', 'alfredo colombia', '2020-10-04 03:11:08', 2640, 0, 0, 0, 0, 0, 0, 0),
(1896, '001-004', 'claris prima', '2020-09-04 03:11:08', 1500, 0, 0, 0, 0, 0, 0, 0),
(1897, '001-004', 'claris prima', '2020-10-04 03:11:08', 1500, 0, 0, 0, 0, 0, 0, 0),
(1898, '001-005', 'jonas', '2020-10-04 03:11:08', 1840, 0, 0, 0, 0, 0, 0, 0),
(1899, '001-011', 'maria perlita', '2020-10-04 03:11:08', 2500, 0, 0, 0, 0, 0, 0, 0),
(1900, '001-008', 'zaida nairoby', '2020-10-04 03:11:08', 350, 0, 0, 0, 0, 0, 0, 0);

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
(1, '2020-10-04 03:11:08');

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
(1, 0, 'Jose Medrano', '2020-10-08 19:24:51', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1901;

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
