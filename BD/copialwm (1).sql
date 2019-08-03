-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-08-2019 a las 02:51:08
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.1.22

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
-- Estructura de tabla para la tabla `tbl_asignaturas`
--

DROP TABLE IF EXISTS `tbl_asignaturas`;
CREATE TABLE IF NOT EXISTS `tbl_asignaturas` (
  `asignaturaID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAsignatura` varchar(45) DEFAULT NULL,
  `CursoID` int(11) DEFAULT NULL,
  PRIMARY KEY (`asignaturaID`),
  KEY `CursoID` (`CursoID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_asignaturas`
--

INSERT INTO `tbl_asignaturas` (`asignaturaID`, `nombreAsignatura`, `CursoID`) VALUES
(1, 'Matematicas', 2),
(2, 'Español', 2),
(3, 'Estudios Sociales', 2),
(4, 'Civica', 1),
(5, 'Ciencias Naturales', 3);

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
(4, 7),
(5, 7);

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
-- Estructura de tabla para la tabla `tbl_cursosxjornada`
--

DROP TABLE IF EXISTS `tbl_cursosxjornada`;
CREATE TABLE IF NOT EXISTS `tbl_cursosxjornada` (
  `JornadaID` int(11) DEFAULT NULL,
  `CursoID` int(11) DEFAULT NULL,
  KEY `JornadaID` (`JornadaID`),
  KEY `CursoID` (`CursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cursosxjornada`
--

INSERT INTO `tbl_cursosxjornada` (`JornadaID`, `CursoID`) VALUES
(1, 1),
(2, 1),
(2, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_docentes`
--

INSERT INTO `tbl_docentes` (`DocenteID`, `usuarioID`) VALUES
(1, 9),
(2, 10),
(3, 11),
(4, 12),
(5, 13),
(6, 14),
(7, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estudiantes`
--

DROP TABLE IF EXISTS `tbl_estudiantes`;
CREATE TABLE IF NOT EXISTS `tbl_estudiantes` (
  `EstudianteID` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioID` int(11) DEFAULT NULL,
  `SeccionID` int(11) NOT NULL,
  `JornadaID` int(11) NOT NULL,
  PRIMARY KEY (`EstudianteID`),
  KEY `usuarioID` (`usuarioID`),
  KEY `SeccionID` (`SeccionID`),
  KEY `JornadaID` (`JornadaID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estudiantes`
--

INSERT INTO `tbl_estudiantes` (`EstudianteID`, `usuarioID`, `SeccionID`, `JornadaID`) VALUES
(1, 16, 0, 0),
(6, 21, 1, 1),
(7, 22, 0, 0),
(8, 23, 3, 2);

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
(1, 6),
(3, 7),
(2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_jornadas`
--

DROP TABLE IF EXISTS `tbl_jornadas`;
CREATE TABLE IF NOT EXISTS `tbl_jornadas` (
  `JornadaID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreJornada` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`JornadaID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_jornadas`
--

INSERT INTO `tbl_jornadas` (`JornadaID`, `nombreJornada`) VALUES
(1, 'Matutina'),
(2, 'Vespertina');

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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
(44, 'Cierre de sesion', 'El usuario con correo: maverick@gmail.com ha cerrado sesion', '2019-08-02', '20:06:12', '::1', 23);

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
(23, 'xasmxlsx', 'mcxlal', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 16220, 'Gráfico Medición de la aceleración de la gravedad en la UNAH (1).xlsx', 4);

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
(1, 1),
(2, 1),
(3, 1),
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
(15, 0),
(16, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0);

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
  `correo` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `Cedula` int(10) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `telefono` int(8) NOT NULL,
  `tipoUsuarioID` int(11) DEFAULT NULL,
  `DepartamentoID` int(11) DEFAULT NULL,
  `MunicipioID` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuarioID`),
  KEY `tipoUsuarioID` (`tipoUsuarioID`),
  KEY `DepartamentoID` (`DepartamentoID`),
  KEY `MunicipioID` (`MunicipioID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usuarioID`, `nombre`, `apellido`, `correo`, `password`, `Cedula`, `FechaNacimiento`, `telefono`, `tipoUsuarioID`, `DepartamentoID`, `MunicipioID`) VALUES
(2, 'Adan', 'Murillo', 'asd@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 801199604, '2019-07-27', 88888888, 1, NULL, NULL),
(10, 'alan', 'sadk', 'alan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 101010, '2019-07-16', 65656, 2, 2, 1),
(9, 'Sdfjfs', 'Nkdsfk', 'jnkdj@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 121232, '2019-07-18', 2312123, 2, 1, 1),
(16, 'Adan', 'Young', 'adan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 21521231, '2019-07-26', 1542, 3, 1, 1),
(11, 'Jsad', 'Dasj', 'ahsdj@gmail.hn', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 121542, '2019-07-09', 214545, 2, 1, 3),
(12, 'Sldljh', 'Kdjka', 'hfdaskd@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4545312, '2019-07-17', 1212154, 2, 1, 3),
(13, 'Hfajkd', 'Jdakdj', 'akdja@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 54233, '2019-07-18', 11154223, 2, 1, 1),
(14, 'Skjfjsk', 'Nsakdjk', 'kask@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 55412, '2019-07-18', 2154125, 2, 1, 3),
(15, 'Jaakdj', 'Dnajsdnk', 'kdakas@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 21545, '2019-07-10', 1514513, 2, 1, 2),
(21, 'Adan', 'Murillo', 'jm@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 11454, '1996-01-05', 511514, 3, 1, 2),
(22, 'Luis', 'Irias', 'Luis@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5565262, '2019-04-11', 51523, 3, 1, 2),
(23, 'Maverick', 'Bustillo', 'maverick@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2151516, '2019-07-17', 15151521, 3, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
