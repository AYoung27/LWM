-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-09-2019 a las 18:49:08
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `copialwm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_anuncios`
--

DROP TABLE IF EXISTS `tbl_anuncios`;
CREATE TABLE IF NOT EXISTS `tbl_anuncios` (
  `anuncioID` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(800) DEFAULT NULL,
  `nivelID` int(11) DEFAULT NULL,
  PRIMARY KEY (`anuncioID`),
  KEY `nivelID` (`nivelID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_anuncios`
--

INSERT INTO `tbl_anuncios` (`anuncioID`, `Descripcion`, `nivelID`) VALUES
(1, 'este es un anuncio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignaturas`
--

DROP TABLE IF EXISTS `tbl_asignaturas`;
CREATE TABLE IF NOT EXISTS `tbl_asignaturas` (
  `asignaturaID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAsignatura` varchar(45) DEFAULT NULL,
  `CursoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`asignaturaID`),
  KEY `CursoID` (`CursoID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_asignaturas`
--

INSERT INTO `tbl_asignaturas` (`asignaturaID`, `nombreAsignatura`, `CursoID`) VALUES
(1, 'Matematicas', 2),
(2, 'Español', 2),
(3, 'Estudios Sociales', 2),
(4, 'Civica', 1),
(5, 'Ciencias Naturales', 3),
(6, 'Fisica', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignaturasxdocente`
--

DROP TABLE IF EXISTS `tbl_asignaturasxdocente`;
CREATE TABLE IF NOT EXISTS `tbl_asignaturasxdocente` (
  `asignaturaID` int(11) DEFAULT NULL,
  `docenteID` int(11) DEFAULT NULL,
  KEY `asignaturaID` (`asignaturaID`),
  KEY `docenteID` (`docenteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_asignaturasxdocente`
--

INSERT INTO `tbl_asignaturasxdocente` (`asignaturaID`, `docenteID`) VALUES
(1, 7),
(2, 7),
(3, 7),
(5, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_calificaciones`
--

DROP TABLE IF EXISTS `tbl_calificaciones`;
CREATE TABLE IF NOT EXISTS `tbl_calificaciones` (
  `calificacionID` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` float DEFAULT NULL,
  `parcialID` int(11) DEFAULT NULL,
  `asignaturaID` int(11) DEFAULT NULL,
  `estudianteID` int(11) NOT NULL,
  PRIMARY KEY (`calificacionID`),
  KEY `parcialID` (`parcialID`),
  KEY `asignaturaID` (`asignaturaID`),
  KEY `estudianteID` (`estudianteID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_calificaciones`
--

INSERT INTO `tbl_calificaciones` (`calificacionID`, `calificacion`, `parcialID`, `asignaturaID`, `estudianteID`) VALUES
(1, 60.5, 1, 2, 10),
(2, 87.6, 2, 2, 10),
(3, 100, 3, 2, 10),
(4, 75.6, 1, 1, 11),
(5, 87.5, 2, 1, 11),
(6, 85.4, 3, 1, 11),
(7, 96.3, 1, 3, 10),
(8, 97.3, 2, 3, 10),
(9, 82, 3, 3, 10),
(10, 65.4, 1, 1, 10),
(11, 78.6, 2, 1, 10),
(12, 78.6, 3, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cursos`
--

DROP TABLE IF EXISTS `tbl_cursos`;
CREATE TABLE IF NOT EXISTS `tbl_cursos` (
  `CursoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CursoID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cursos`
--

INSERT INTO `tbl_cursos` (`CursoID`, `nombreCurso`) VALUES
(1, 'Septimo'),
(2, 'octavo'),
(3, 'noveno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamentos`
--

DROP TABLE IF EXISTS `tbl_departamentos`;
CREATE TABLE IF NOT EXISTS `tbl_departamentos` (
  `DepartamentoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDepartamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`DepartamentoID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_departamentos`
--

INSERT INTO `tbl_departamentos` (`DepartamentoID`, `nombreDepartamento`) VALUES
(1, 'Francisco Morazan'),
(2, 'Atlantida'),
(3, 'Colon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_docentes`
--

DROP TABLE IF EXISTS `tbl_docentes`;
CREATE TABLE IF NOT EXISTS `tbl_docentes` (
  `DocenteID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  PRIMARY KEY (`DocenteID`),
  KEY `usuarioID` (`usuarioID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_docentes`
--

INSERT INTO `tbl_docentes` (`DocenteID`, `usuarioID`) VALUES
(5, 13),
(6, 14),
(7, 15),
(8, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes`
--

DROP TABLE IF EXISTS `tbl_estudiantes`;
CREATE TABLE IF NOT EXISTS `tbl_estudiantes` (
  `EstudianteID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `SeccionID` int(11) NOT NULL,
  PRIMARY KEY (`EstudianteID`),
  KEY `usuarioID` (`usuarioID`),
  KEY `SeccionID` (`SeccionID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estudiantes`
--

INSERT INTO `tbl_estudiantes` (`EstudianteID`, `usuarioID`, `SeccionID`) VALUES
(10, 26, 3),
(11, 27, 3),
(12, 30, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantesxcurso`
--

DROP TABLE IF EXISTS `tbl_estudiantesxcurso`;
CREATE TABLE IF NOT EXISTS `tbl_estudiantesxcurso` (
  `CursoID` int(11) DEFAULT NULL,
  `estudianteID` int(11) DEFAULT NULL,
  KEY `CursoID` (`CursoID`),
  KEY `estudianteID` (`estudianteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estudiantesxcurso`
--

INSERT INTO `tbl_estudiantesxcurso` (`CursoID`, `estudianteID`) VALUES
(2, 10),
(2, 11),
(2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `Evento` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Direccion_IP_Usuario` varchar(20) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LogID`),
  KEY `UsuarioID` (`UsuarioID`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_log`
--

INSERT INTO `tbl_log` (`LogID`, `Evento`, `Descripcion`, `Fecha`, `Hora`, `Direccion_IP_Usuario`, `UsuarioID`) VALUES
(1, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-07-27', '18:23:26', '::1', 2),
(2, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-07-27', '18:23:32', '::1', 2),
(3, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-07-27', '19:41:26', '::1', 2),
(4, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-07-27', '21:25:00', '::1', 2),
(5, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-07-27', '21:25:09', '::1', 2),
(6, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: adan@gmail.com', '2019-07-27', '21:26:24', '::1', 16),
(7, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-07-27', '22:12:34', '::1', 2),
(8, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-07-29', '14:28:00', '::1', 2),
(9, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jm@gmail.com', '2019-07-29', '15:04:05', '::1', 18),
(10, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jm@gmail.com', '2019-07-29', '15:08:40', '::1', 19),
(11, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jy@gmail.com', '2019-07-29', '15:11:42', '::1', 20),
(12, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jm@gmail.com', '2019-07-29', '15:14:10', '::1', 21),
(13, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-07-29', '17:04:27', '::1', 2),
(14, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-29', '17:04:37', '::1', 15),
(15, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-29', '17:13:21', '::1', 15),
(16, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-29', '17:13:27', '::1', 15),
(17, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-29', '20:43:56', '::1', 15),
(18, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-29', '20:44:07', '::1', 15),
(19, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-29', '21:11:02', '::1', 15),
(20, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-29', '21:11:11', '::1', 15),
(21, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: Luis@gmail.com', '2019-07-29', '21:44:58', '::1', 22),
(22, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: maverick@gmail.com', '2019-07-29', '21:50:54', '::1', 23),
(23, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-29', '22:07:20', '::1', 15),
(24, 'Inicio de sesion', 'El usuario con correo: maverick@gmail.com ha iniciado sesion', '2019-07-29', '22:08:17', '::1', 23),
(25, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-07-29', '22:59:42', '::1', 23),
(26, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-29', '22:59:50', '::1', 15),
(27, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-30', '07:30:18', '::1', 15),
(28, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-30', '07:32:42', '::1', 15),
(29, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-30', '07:32:59', '::1', 15),
(30, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-30', '07:34:14', '::1', 15),
(31, 'Inicio de sesion', 'El usuario con correo: maverick@gmail.com ha iniciado sesion', '2019-07-30', '07:34:21', '::1', 23),
(32, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-07-30', '07:35:30', '::1', 23),
(33, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-30', '07:49:24', '::1', 15),
(34, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-30', '07:50:46', '::1', 15),
(35, 'Inicio de sesion', 'El usuario con correo: maverick@gmail.com ha iniciado sesion', '2019-07-30', '07:50:55', '::1', 23),
(36, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-07-30', '07:52:03', '::1', 23),
(37, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-07-30', '09:44:27', '::1', 15),
(38, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-07-30', '09:48:24', '::1', 15),
(39, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-02', '10:22:16', '::1', 15),
(40, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-02', '12:42:44', '::1', 15),
(41, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-02', '12:52:15', '::1', 2),
(42, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-02', '13:19:55', '::1', 2),
(43, 'Inicio de sesion', 'El usuario con correo: maverick@gmail.com ha iniciado sesion', '2019-08-02', '20:05:45', '::1', 23),
(44, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-08-02', '20:06:12', '::1', 23),
(45, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '10:32:53', '::1', 15),
(46, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '10:46:04', '::1', 15),
(47, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '10:46:21', '::1', 2),
(48, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '11:05:35', '::1', 2),
(49, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '11:05:55', '::1', 2),
(50, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '11:11:49', '::1', 2),
(51, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '11:12:11', '::1', 15),
(52, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '11:47:04', '::1', 15),
(53, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '11:47:11', '::1', 2),
(54, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '13:08:29', '::1', 2),
(55, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '13:11:06', '::1', 2),
(56, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jkl@gmail.com', '2019-08-04', '16:22:27', '::1', 24),
(57, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: cc@gmail.com', '2019-08-04', '16:27:25', '::1', 25),
(58, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '17:46:40', '::1', 2),
(59, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '17:46:46', '::1', 15),
(60, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '17:47:04', '::1', 15),
(61, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '17:47:49', '::1', 2),
(62, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: luis20111944@gmail.com', '2019-08-04', '17:48:57', '::1', 26),
(63, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: jm2796.jm@gmail.com', '2019-08-04', '17:53:02', '::1', 27),
(64, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '17:53:35', '::1', 2),
(65, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '17:53:43', '::1', 15),
(66, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '18:26:37', '::1', 15),
(67, 'Inicio de sesion', 'El usuario con correo: maverick@gmail.com ha iniciado sesion', '2019-08-04', '18:26:43', '::1', 23),
(68, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-08-04', '18:35:18', '::1', 23),
(69, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '18:35:23', '::1', 2),
(70, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: yound1996@gmail.com', '2019-08-04', '18:38:11', '::1', 28),
(71, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: yound1996@gmail.com', '2019-08-04', '18:40:22', '::1', 29),
(72, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: yound1996@gmail.com', '2019-08-04', '18:41:06', '::1', 30),
(73, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '18:42:24', '::1', 2),
(74, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '18:43:17', '::1', 2),
(75, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '18:43:31', '::1', 2),
(76, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '18:45:25', '::1', 2),
(77, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '18:45:34', '::1', 15),
(78, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '19:30:47', '::1', 15),
(79, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-04', '19:32:37', '::1', 30),
(80, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-04', '20:00:58', '::1', 30),
(81, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '20:01:04', '::1', 15),
(82, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '20:01:29', '::1', 15),
(83, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-04', '20:01:36', '::1', 2),
(84, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-04', '20:48:22', '::1', 2),
(85, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-04', '21:39:42', '::1', 2),
(86, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-04', '21:39:51', '::1', 30),
(87, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-04', '22:08:44', '::1', 30),
(88, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '22:08:54', '::1', 15),
(89, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '22:10:25', '::1', 15),
(90, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-04', '22:10:34', '::1', 30),
(91, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-04', '22:20:42', '::1', 30),
(92, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-04', '22:20:50', '::1', 15),
(93, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-04', '22:22:26', '::1', 15),
(94, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-04', '22:22:34', '::1', 30),
(95, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-04', '22:29:19', '::1', 30),
(96, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-05', '05:51:13', '::1', 2),
(97, 'Nuevo registro', 'Se ha registrado un nuevo docente con correo: aYoung@algo.hn', '2019-08-05', '06:38:35', '::1', 31),
(98, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-05', '06:38:54', '::1', 2),
(99, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-05', '06:43:14', '::1', 2),
(100, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-05', '06:43:33', '::1', 2),
(101, 'Eliminar producto', 'El usuario con correo:  ha eliminado un producto ', '2019-08-05', '06:43:42', '::1', 2),
(102, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-05', '06:44:38', '::1', 2),
(103, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-05', '06:44:46', '::1', 15),
(104, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-05', '06:50:57', '::1', 15),
(105, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-05', '07:45:52', '::1', 2),
(106, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-05', '07:57:40', '::1', 2),
(107, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-05', '07:59:15', '::1', 2),
(108, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-05', '08:13:51', '::1', 15),
(109, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-05', '08:21:28', '::1', 15),
(110, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-05', '08:21:33', '::1', 15),
(111, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-05', '08:30:59', '::1', 15),
(112, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-05', '08:31:06', '::1', 30),
(113, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-05', '08:35:12', '::1', 30),
(114, 'Inicio de sesion', 'El usuario con correo: yound1996@gmail.com ha iniciado sesion', '2019-08-05', '08:40:58', '::1', 30),
(115, 'Cierre de sesion', 'El usuario con correo: yound1996@gmail.com ha cerrado sesion', '2019-08-05', '08:42:46', '::1', 30),
(116, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-05', '08:42:57', '::1', 15),
(117, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-05', '08:46:14', '::1', 15),
(118, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-19', '13:25:43', '::1', 15),
(119, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-19', '15:44:30', '::1', 15),
(120, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-19', '17:28:03', '::1', 15),
(121, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-20', '20:52:27', '::1', 15),
(122, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-21', '20:29:08', '::1', 15),
(123, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-22', '19:43:45', '::1', 2),
(124, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-22', '19:43:55', '::1', 2),
(125, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-22', '19:48:03', '::1', 2),
(126, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-23', '11:43:46', '::1', 15),
(127, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-23', '11:44:50', '::1', 15),
(128, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-23', '11:44:59', '::1', 15),
(129, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-23', '11:46:27', '::1', 15),
(130, 'Inicio de sesion', 'El usuario con correo: asd@gmail.com ha iniciado sesion', '2019-08-23', '11:46:36', '::1', 2),
(131, 'Cierre de sesion', 'El usuario con correo: asd@gmail.com ha cerrado sesion', '2019-08-23', '11:46:48', '::1', 2),
(132, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-23', '11:46:55', '::1', 15),
(133, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-23', '11:47:59', '::1', 15),
(134, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-23', '11:48:05', '::1', 15),
(135, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-23', '20:15:33', '::1', 15),
(136, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-23', '20:15:50', '::1', 15),
(137, 'Cierre de sesion', 'El usuario con correo: kdakas@gmail.com ha cerrado sesion', '2019-08-24', '08:20:39', '::1', 15),
(138, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-24', '08:20:45', '::1', 15),
(139, 'Inicio de sesion', 'El usuario con correo: kdakas@gmail.com ha iniciado sesion', '2019-08-26', '16:43:20', '::1', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

DROP TABLE IF EXISTS `tbl_municipios`;
CREATE TABLE IF NOT EXISTS `tbl_municipios` (
  `MunicipioID` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMunicipio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`MunicipioID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_municipios`
--

INSERT INTO `tbl_municipios` (`MunicipioID`, `NombreMunicipio`) VALUES
(1, 'Distrito Central'),
(2, 'Ojojona'),
(3, 'Santa Ana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nivelanuncio`
--

DROP TABLE IF EXISTS `tbl_nivelanuncio`;
CREATE TABLE IF NOT EXISTS `tbl_nivelanuncio` (
  `nivelID` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nivelID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_nivelanuncio`
--

INSERT INTO `tbl_nivelanuncio` (`nivelID`, `descripcion`) VALUES
(1, 'Alto'),
(2, 'Medio'),
(3, 'Bajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parciales`
--

DROP TABLE IF EXISTS `tbl_parciales`;
CREATE TABLE IF NOT EXISTS `tbl_parciales` (
  `parcialID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreParcial` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`parcialID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_parciales`
--

INSERT INTO `tbl_parciales` (`parcialID`, `nombreParcial`) VALUES
(1, 'Primer Parcial'),
(2, 'Segundo Parcial'),
(3, 'Tercer Parcial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursosestudiantiles`
--

DROP TABLE IF EXISTS `tbl_recursosestudiantiles`;
CREATE TABLE IF NOT EXISTS `tbl_recursosestudiantiles` (
  `recursoID` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(250) NOT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `tamaño` int(11) NOT NULL,
  `nombreArchivo` varchar(250) DEFAULT NULL,
  `asignaturaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`recursoID`),
  KEY `asignaturaID` (`asignaturaID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_recursosestudiantiles`
--

INSERT INTO `tbl_recursosestudiantiles` (`recursoID`, `Titulo`, `Descripcion`, `tipo`, `tamaño`, `nombreArchivo`, `asignaturaID`) VALUES
(17, '', 'descripcion sobre esto', 'application/pdf', 1365473, '1', 4),
(18, 'archivo', 'pdf', 'application/pdf', 1397540, '1', 4),
(19, 'algo', 'algo', 'application/pdf', 93390, '1', 4),
(20, 'archivo', 'algo', 'application/pdf', 93390, 'Maverick_Bustillo_Tarea2.pdf', 4),
(21, 'dwed', 'adsda', 'application/x-zip-compressed', 21330, 'Plungin_MW.zip', 4),
(22, 'dajskd', 'mmdkasd', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1017177, 'BET.docx', 4),
(23, 'xasmxlsx', 'mcxlal', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 16220, 'Gráfico Medición de la aceleración de la gravedad en la UNAH (1).xlsx', 4),
(24, 'archivo', 'descripcion', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1017177, 'BET.docx', 1),
(25, 'archivo', 'descripcion', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 194786, '7.2.2.6 Lab - Configuring and Modifying Standard IPv4 ACLs.docx', 1),
(26, 'archivo', 'descripcion sobre esto', 'application/pdf', 1397540, '357958107-Ondas-mecanicas.pdf', 1),
(27, 'weds', 'algo', 'application/pdf', 353680, 'Oscilaciones_Parte_I.pdf', 2),
(28, 'titulo', 'descripcion de esto', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 17885, 'canvas Educacion.docx', 1),
(29, 'weds', 'descripcion sobre esto', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 128815, 'informe-pendulo-de-fisica-1.docx', 1),
(30, 'archivo', 'descripcion sobre esto', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 17887, 'CCNA Routing and Switching.docx', 2),
(31, 'titulo', 'descripcion', 'application/pdf', 93390, 'Maverick_Bustillo_Tarea2.pdf', 1),
(32, 'algo', 'descripcion sobre esto', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 19295, 'PPP.docx', 2),
(33, 'titulo', 'algo', 'application/x-zip-compressed', 1031640, 'Subir.zip', 1),
(34, 'archivo', 'descripcion sobre esto', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 194786, '7.2.2.6 Lab - Configuring and Modifying Standard IPv4 ACLs.docx', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_secciones`
--

DROP TABLE IF EXISTS `tbl_secciones`;
CREATE TABLE IF NOT EXISTS `tbl_secciones` (
  `SeccionID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSeccion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`SeccionID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_secciones`
--

INSERT INTO `tbl_secciones` (`SeccionID`, `nombreSeccion`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_seccionesxcurso`
--

DROP TABLE IF EXISTS `tbl_seccionesxcurso`;
CREATE TABLE IF NOT EXISTS `tbl_seccionesxcurso` (
  `SeccionID` int(11) DEFAULT NULL,
  `CursoID` int(11) DEFAULT NULL,
  KEY `SeccionID` (`SeccionID`),
  KEY `CursoID` (`CursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_seccionesxcurso`
--

INSERT INTO `tbl_seccionesxcurso` (`SeccionID`, `CursoID`) VALUES
(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sesion`
--

DROP TABLE IF EXISTS `tbl_sesion`;
CREATE TABLE IF NOT EXISTS `tbl_sesion` (
  `UsuarioID` int(11) DEFAULT NULL,
  `Estado` int(1) DEFAULT NULL,
  KEY `UsuarioID` (`UsuarioID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_sesion`
--

INSERT INTO `tbl_sesion` (`UsuarioID`, `Estado`) VALUES
(2, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 1),
(16, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipousuario`
--

DROP TABLE IF EXISTS `tbl_tipousuario`;
CREATE TABLE IF NOT EXISTS `tbl_tipousuario` (
  `tipoUsuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipoUsuarioID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipousuario`
--

INSERT INTO `tbl_tipousuario` (`tipoUsuarioID`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `usuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Cedula` int(15) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `telefono` int(12) NOT NULL,
  `tipoUsuarioID` int(11) DEFAULT NULL,
  `DepartamentoID` int(11) DEFAULT NULL,
  `MunicipioID` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuarioID`),
  KEY `tipoUsuarioID` (`tipoUsuarioID`),
  KEY `DepartamentoID` (`DepartamentoID`),
  KEY `MunicipioID` (`MunicipioID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usuarioID`, `nombre`, `apellido`, `correo`, `password`, `Cedula`, `FechaNacimiento`, `telefono`, `tipoUsuarioID`, `DepartamentoID`, `MunicipioID`) VALUES
(2, 'Adan', 'Murillo', 'asd@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 801199604, '2019-07-27', 88888888, 1, NULL, NULL),
(13, 'Hfajkd', 'Jdakdj', 'akdja@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 54233, '2019-07-18', 11154223, 2, 1, 1),
(14, 'Alvaro', 'Gonzales', 'kask@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 55412, '2019-07-18', 2154125, 2, 1, 3),
(15, 'Roberto', 'Castillo', 'kdakas@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 21545, '2019-07-10', 1514513, 2, 1, 2),
(24, 'Adan', 'Young', 'jkl@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2515215, '2019-08-08', 455456, 2, 1, 2),
(26, 'Fernando', 'Irias', 'luis20111944@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 212112, '2019-08-21', 1212152, 3, 2, 2),
(27, 'Josue', 'Young', 'jm2796.jm@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2322323, '2019-08-15', 12123232, 3, 1, 3),
(30, 'Adan', 'Murillo', 'yound1996@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 21212, '2019-08-16', 12154154, 3, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
