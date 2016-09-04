-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-09-2016 a las 08:45:59
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) DEFAULT 'avatar.png',
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `foto`, `nombre`, `apellido`, `correo`) VALUES
(102, 'avatar.png', 'pedro', 'luis', 'p_l@gmail.com'),
(104, 'avatar.png', 'fran', 'medina', 'f_m@gmail.com'),
(105, 'avatar.png', 'jose', 'maria', 'j_mgmail.com'),
(106, 'avatar.png', 'sdsdsd', 'dsdsd', '9@gmail.com'),
(107, 'avatar.png', 'ddfd', 'fdfdd', 'fdfdf'),
(108, 'avatar.png', 'dssd', 'dsdsd', 'mmrr@gmail.com'),
(109, 'avatar.png', 'dsd', 'dsdsd', 'sdsdsdsds'),
(110, 'avatar.png', 'wewe', 'ewewe', 'ewewewee'),
(111, 'avatar.png', 'reeet', 'ododod', '6469@gmail.com'),
(112, 'avatar.png', 'jdjdj', 'hfhfhfhf', '56ryryh9@gmail.com'),
(113, 'avatar.png', 'peppwwp', 'wrwrwrwr', 'p_otyty@gmail.com'),
(114, 'avatar.png', 'hggh', 'yuyuyui', 'p_wewo@gmail.com'),
(115, 'avatar.png', 'erreer', 'rererer', '2223432@gmail.com'),
(116, 'avatar.png', 'ewee', 'nhhkk', 'p34wsfsf_o@gmail.com'),
(117, 'avatar.png', 'reerer', 'reeer', '9erere@gmail.com'),
(118, 'avatar.png', 'WEEWE', 'EWEWW', 'RWRWRSDSD'),
(119, 'avatar.png', 'ERERE', 'RERER', 'REREER'),
(120, 'avatar.png', 'sdss', 'YTYTY', '9sdssd@gmail.com'),
(121, 'avatar.png', 'reer', 'fs', 'p_454o@gmail.com'),
(122, 'avatar.png', 'erer', 'sfsff', '9wrwrwrwr@gmail.com'),
(123, 'avatar.png', 'pedro', 'gomez', 'p_oo@gmail.com'),
(124, 'avatar.png', 'jose', 'moron', 'j_m@gmail.com'),
(125, 'avatar.png', 'miguel', 'perez', 'm_o@gmail.com'),
(126, 'avatar.png', 'gerardo', 'parra', 'g_parra@gmail.com'),
(128, 'avatar.png', 'pablo', 'gimenez', 'p_gime@gmail.com'),
(129, 'avatar.png', 'muguel', 'peña', 'm_pe@gmail.com'),
(130, 'avatar.png', 'maria', 'peña', 'mm_p@gmail.com'),
(131, 'avatar.png', 'leonardo', 'parra', 'leo_p@gmail.com'),
(132, 'avatar.png', 'pablo', 'piña', 'p_pi@gmail.com'),
(133, 'avatar.png', 'maru', 'piña', 'm_piñ@gmail.com'),
(134, 'avatar.png', 'alexi', 'ortiz', 'a_o@gmail.com'),
(135, 'avatar.png', 'maite', 'lopez', 'ma_lo@gmail.com'),
(136, 'avatar.png', 'moreima', 'lopez', 'mo_lo@gmail.com'),
(138, 'avatar.png', 'perol', 'panto', 'p_pp@gmail.com'),
(139, 'avatar.png', 'dfs', 'sdsds', '93343434@gmail.com'),
(140, 'avatar.png', 'parra', 'mejeias', 'p_mir@gmail.com'),
(141, 'avatar.png', 'dss', '3434wrws', 'pwrwrwo@gmail.com'),
(142, 'avatar.png', 'wewrwwr', 'dswwdw', 'ssdsf'),
(143, 'avatar.png', 'wwewew', 'csccc', 'xzccca'),
(144, 'avatar.png', 'wewwwe', 'wewwe', 'sdsds'),
(145, 'avatar.png', 'eeeeeeee', 'eeeeeeee', 'eeeeeeee'),
(146, 'avatar.png', 'qqqqqqq', '11111111', 'qqqqqqq'),
(165, '942804.jpg', 'Roberth', 'Dniro', 'robeth_d@gmail.com'),
(166, '75800.jpg', 'Maria', 'Peña', 'p_osds@gmail.com'),
(186, '490949.jpg', 'Lenne', 'Ortiz', 'yamirokuay.lo@gmail.com'),
(187, '373451.jpg', 'Dady', 'Yankee', 'yankee@gmail.com'),
(189, '375767.jpg', 'Miguel', 'Azuaje', 'azueje_m@gmail.com'),
(190, 'avatar.png', 'Sdsdds', 'Cvcvcvvc', 'perererere_o@gmail.com'),
(191, '215180.jpg', 'Dssfsfs', 'Ddddvxvx', 'p_dsdssso@gmail.com'),
(192, '664100.jpg', 'Julian', 'Perez', 'p_j@gmail.com'),
(193, '353242.jpg', 'Juan', 'Gomez', 'juancho_g@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(2, 'lenne', 'ortiz', 'yamirokuay.lo@gmail.com', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
