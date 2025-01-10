-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 04:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indicadorestlalpan`
--

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `ID` int(11) NOT NULL,
  `Departamento` varchar(150) DEFAULT NULL,
  `Contraseña` varchar(50) DEFAULT NULL,
  `VistaEspecial` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`ID`, `Departamento`, `Contraseña`, `VistaEspecial`) VALUES
(1, 'Alcaldía', 'contraseña123', 1),
(2, 'Secretaría Particular', 'contraseña123', 1),
(3, 'Subdirección de Control de Gestión', 'contraseña123', 1),
(4, 'Coordinación de la Unidad de Transparencia Acceso a la Información Pública Datos Personales y Archivos', 'contraseña123', 1),
(5, 'Jefatura de Unidad Departamental de Acceso a la Información Pública y Datos Personales', 'contraseña123', 1),
(6, 'Jefatura de Unidad Departamental de Archivos', 'contraseña123', 1),
(7, 'Dirección de Comunicación Social', 'contraseña123', 1),
(8, 'Líder Coordinador de Proyectos de Servicios Digitales', 'contraseña123', 1),
(9, 'Jefatura de Unidad Departamental de Comunicación', 'contraseña123', 1),
(10, 'Jefatura de Unidad Departamental de Difusión', 'contraseña123', 1),
(11, 'Dirección de la Unidad de Gestión Integral de Riesgos y Protección Civil', 'contraseña123', 1),
(12, 'Subdirección de Atención a Emergencias y Gestión de Riesgos', 'contraseña123', 1),
(13, 'Líder Coordinador de Proyectos de Mitigación de Riesgos', 'contraseña123', 1),
(14, 'Jefatura de Unidad Departamental de Dictaminación de Riesgos', 'contraseña123', 1),
(15, 'Jefatura de Unidad Departamental de Respuesta a Emergencias', 'contraseña123', 1),
(16, 'Dirección del Centro de Servicios y Atención Ciudadana', 'contraseña123', 1),
(17, 'Subdirección de Atención Ciudadana', 'contraseña123', 1),
(18, 'Enlace de Información y Seguimiento a Solicitudes de Servicios “A”', 'contraseña123', 1),
(19, 'Enlace de Información y Seguimiento a Solicitudes de Servicios “B”', 'contraseña123', 1),
(20, 'Subdirección de Ventanilla Única de Trámites', 'contraseña123', 1),
(21, 'Enlace de Atención Ciudadana “A”', 'contraseña123', 1),
(22, 'Enlace de Atención Ciudadana “B”', 'contraseña123', 1),
(23, 'Enlace de Atención Ciudadana “C”', 'contraseña123', 1),
(24, 'Enlace de Atención Ciudadana “D”', 'contraseña123', 1),
(25, 'Jefatura de la Oficina de Asesores y Coordinación Territorial', 'contraseña123', 1),
(26, 'Asesor “A”', 'contraseña123', 1),
(27, 'Asesor “B”', 'contraseña123', 1),
(28, 'Asesor “C”', 'contraseña123', 1),
(29, 'Subdirección Territorial A', 'contraseña123', 1),
(30, 'Jefatura de Unidad Departamental de Obras \"A\"', 'contraseña123', 1),
(31, 'Jefatura de Unidad Departamental de Servicios Urbanos \"A\"', 'contraseña123', 1),
(32, 'Líder Coordinador de Proyectos de Administración \"A\"', 'contraseña123', 1),
(33, 'Subdirección Territorial B', 'contraseña123', 1),
(34, 'Jefatura de Unidad Departamental de Obras \"B\"', 'contraseña123', 1),
(35, 'Jefatura de Unidad Departamental de Servicios Urbanos \"B\"', 'contraseña123', 1),
(36, 'Líder Coordinador de Proyectos de Administración \"B\"', 'contraseña123', 1),
(37, 'Subdirección Territorial C', 'contraseña123', 1),
(38, 'Jefatura de Unidad Departamental de Obras \"C\"', 'contraseña123', 1),
(39, 'Jefatura de Unidad Departamental de Servicios Urbanos \"C\"', 'contraseña123', 1),
(40, 'Líder Coordinador de Proyectos de Administración \"C\"', 'contraseña123', 1),
(41, 'Subdirección Territorial D', 'contraseña123', 1),
(42, 'Jefatura de Unidad Departamental de Obras \"D\"', 'contraseña123', 1),
(43, 'Jefatura de Unidad Departamental de Servicios Urbanos \"D\"', 'contraseña123', 1),
(44, 'Líder Coordinador de Proyectos de Administración \"D\"', 'contraseña123', 1),
(45, 'Subdirección Territorial E', 'contraseña123', 1),
(46, 'Jefatura de Unidad Departamental de Obras \"E\"', 'contraseña123', 1),
(47, 'Jefatura de Unidad Departamental de Servicios Urbanos \"E\"', 'contraseña123', 1),
(48, 'Líder Coordinador de Proyectos de Administración \"E\"', 'contraseña123', 1),
(49, 'Dirección de Planeación del Desarrollo', 'contraseña123', 1),
(50, 'Jefatura de Unidad Departamental de Planeación y Formulación de Proyectos de la Alcaldía', 'contraseña123', 1),
(51, 'Jefatura de Unidad Departamental de Apoyo Técnico y Evaluación de Programas con Reglas de Operación', 'contraseña123', 1),
(52, 'Dirección General de Asuntos Jurídicos y de Gobierno', 'contraseña123', 1),
(53, 'Dirección Jurídica', 'contraseña123', 1),
(54, 'Subdirección de Procedimientos de lo Contencioso', 'contraseña123', 1),
(55, 'Jefatura de Unidad Departamental de Amparos y Recuperación de la Vía Pública', 'contraseña123', 1),
(56, 'Jefatura de Unidad Departamental de Asuntos Civiles, Mercantiles y de Contencioso Administrativo', 'contraseña123', 1),
(57, 'Jefatura de Unidad Departamental de Contratos, Convenios y Permisos en Materia Administrativa', 'contraseña123', 1),
(58, 'Jefatura de Unidad Departamental de Enlace a Juzgados Cívicos, Registro Civil, Junta de Reclutamiento del Servicio Militar Nacional y Derechos Humanos', 'contraseña123', 1),
(59, 'Jefatura de Unidad Departamental de Asuntos Penales', 'contraseña123', 1),
(60, 'Subdirección de Juicios Laborales', 'contraseña123', 1),
(61, 'Subdirección de Verificación y Reglamentos', 'contraseña123', 1),
(62, 'Jefatura de Unidad Departamental de Apoyo Legal', 'contraseña123', 1),
(63, 'Jefatura de Unidad Departamental de Ejecución de Sanciones', 'contraseña123', 1),
(64, 'Subdirección de Calificaciones de Infracciones', 'contraseña123', 1),
(65, 'Jefatura de Unidad Departamental de Instrucción y Acuerdos Administrativos', 'contraseña123', 1),
(66, 'Jefatura de Unidad Departamental de Resoluciones y Cumplimientos', 'contraseña123', 1),
(67, 'Dirección de Gobierno y Vía Pública', 'contraseña123', 1),
(68, 'Subdirección de Gobierno', 'contraseña123', 1),
(69, 'Jefatura de Unidad Departamental de Giros Mercantiles y Espectáculos Públicos', 'contraseña123', 1),
(70, 'Jefatura de Unidad Departamental de Panteones', 'contraseña123', 1),
(71, 'Jefatura de Unidad Departamental de Tianguis y Vía Pública', 'contraseña123', 1),
(72, 'Jefatura de Unidad Departamental de Mercados y Concentraciones', 'contraseña123', 1),
(73, 'Dirección de Ordenamiento Territorial', 'contraseña123', 1),
(74, 'Jefatura de Unidad Departamental de Regularización Territorial', 'contraseña123', 1),
(75, 'Jefatura de Unidad Departamental de Colonias y Asentamientos Humanos Irregulares', 'contraseña123', 1),
(76, 'Jefatura de Unidad Departamental de Padrón Inmobiliario y Viviendas Irregulares', 'contraseña123', 1),
(77, 'Dirección de Seguridad Ciudadana y Construcción de la Paz', 'contraseña123', 1),
(78, 'Subdirección de Proyectos para la Construcción de la Paz', 'contraseña123', 1),
(79, 'Subdirección de Información y Control de Estadística y Tránsito', 'contraseña123', 1),
(80, 'Jefatura de Unidad Departamental de Incidencia y Estadística Delictiva', 'contraseña123', 1),
(81, 'Jefatura de Unidad Departamental de Control Operativo Policial', 'contraseña123', 1),
(82, 'Jefatura de Unidad Departamental de Seguridad Ciudadana y Tránsito', 'contraseña123', 1),
(83, 'Dirección General de Administración y Finanzas', 'contraseña123', 1),
(84, 'Subdirección de Seguimiento de Proyectos Administrativos y Control de Gestión', 'contraseña123', 1),
(85, 'Líder Coordinador de Proyectos de Gestión Documental', 'contraseña123', 1),
(86, 'Subdirección de Cumplimiento de Auditorias y Rendición de Cuentas', 'contraseña123', 1),
(87, 'Dirección de Modernización Administrativa y Tecnologías de la Información y Comunicaciones', 'contraseña123', 1),
(88, 'Jefatura de Unidad Departamental de Modernización Administrativa', 'contraseña123', 1),
(89, 'Subdirección de Tecnologías de la Información y Comunicaciones', 'contraseña123', 1),
(90, 'Jefatura de Unidad Departamental de Desarrollo de Sistemas', 'contraseña123', 1),
(91, 'Jefatura de Unidad Departamental de Soporte Técnico', 'contraseña123', 1),
(92, 'Dirección de Administración de Capital Humano', 'contraseña123', 1),
(93, 'Subdirección de Relaciones Laborales y Capacitación', 'contraseña123', 1),
(94, 'Jefatura de Unidad Departamental de Relaciones Laborales y Prestaciones', 'contraseña123', 1),
(95, 'Jefatura de Unidad Departamental de Capacitación y Desarrollo de Personal', 'contraseña123', 1),
(96, 'Subdirección de Nóminas y Registro de Personal', 'contraseña123', 1),
(97, 'Jefatura de Unidad Departamental de Registro y Movimientos de Personal', 'contraseña123', 1),
(98, 'Dirección de Autogenerados', 'contraseña123', 1),
(99, 'Líder Coordinador de Proyectos de Seguimiento e Informes', 'contraseña123', 1),
(100, 'Dirección de Finanzas', 'contraseña123', 1),
(101, 'Subdirección de Tesorería', 'contraseña123', 1),
(102, 'Subdirección de Contabilidad', 'contraseña123', 1),
(103, 'Jefatura de Unidad Departamental de Registro Contable', 'contraseña123', 1),
(104, 'Subdirección de Programación y Presupuesto', 'contraseña123', 1),
(105, 'Jefatura de Unidad Departamental de Control Presupuestal', 'contraseña123', 1),
(106, 'Dirección de Recursos Materiales y Servicios Generales', 'contraseña123', 1),
(107, 'Jefatura de Unidad Departamental de Almacenes e Inventarios', 'contraseña123', 1),
(108, 'Subdirección de Servicios Generales', 'contraseña123', 1),
(109, 'Jefatura de Unidad Departamental de Control Vehícular, Talleres y Combustible', 'contraseña123', 1),
(110, 'Jefatura de Unidad Departamental de Servicios Generales y Apoyo Logístico', 'contraseña123', 1),
(111, 'Subdirección de Adquisiciones', 'contraseña123', 1),
(112, 'Dirección General de Obras y Desarrollo Urbano', 'contraseña123', 1),
(113, 'Enlace de Seguimientos de Informes de Obras', 'contraseña123', 1),
(114, 'Líder Coordinador de Proyectos de Seguimiento a Solicitudes Específicas de Obra', 'contraseña123', 1),
(115, 'Dirección de Obras y Operación Hidráulica', 'contraseña123', 1),
(116, 'Subdirección de Obras', 'contraseña123', 1),
(117, 'Jefatura de Unidad Departamental de Mantenimiento a Edificios Públicos', 'contraseña123', 1),
(118, 'Jefatura de Unidad Departamental de Obras Viales', 'contraseña123', 1),
(119, 'Jefatura de Unidad Departamental de Planteles Educativos', 'contraseña123', 1),
(120, 'Líder Coordinador de Proyectos de Seguimiento de Infraestructura de Planteles Educativos', 'contraseña123', 1),
(121, 'Jefatura de Unidad Departamental de Construcción de Edificios Públicos', 'contraseña123', 1),
(122, 'Jefatura de Unidad Departamental de Control de Materiales y Equipo', 'contraseña123', 1),
(123, 'Jefatura de Unidad Departamental de Mantenimiento Menor', 'contraseña123', 1),
(124, 'Enlace de Trabajos de Mantenimiento por Administración', 'contraseña123', 1),
(125, 'Subdirección de Operación Hidráulica', 'contraseña123', 1),
(126, 'Jefatura de Unidad Departamental de Construcción de Obras para Saneamiento y Drenaje', 'contraseña123', 1),
(127, 'Jefatura de Unidad Departamental de Obras Hidráulicas', 'contraseña123', 1),
(128, 'Jefatura de Unidad Departamental de Operación de Agua, Saneamiento y Drenaje “A”', 'contraseña123', 1),
(129, 'Jefatura de Unidad Departamental de Operación de Agua, Saneamiento y Drenaje “B”', 'contraseña123', 1),
(130, 'Dirección de Desarrollo Urbano', 'contraseña123', 1),
(131, 'Subdirección de Permisos, Manifestaciones y Licencias', 'contraseña123', 1),
(132, 'Jefatura de Unidad Departamental de Manifestaciones y Licencias de Construcción', 'contraseña123', 1),
(133, 'Jefatura de Unidad Departamental de Alineamientos y Números Oficiales', 'contraseña123', 1),
(134, 'Dirección de Planeación y Control de Obras', 'contraseña123', 1),
(135, 'Jefatura de Unidad Departamental de Seguimiento a Auditorías de Obra Pública', 'contraseña123', 1),
(136, 'Subdirección de Proyectos de Construcción de Obras', 'contraseña123', 1),
(137, 'Jefatura de Departamental de Proyectos de Infraestructura', 'contraseña123', 1),
(138, 'Jefatura de Unidad Departamental de Concursos de Obras', 'contraseña123', 1),
(139, 'Subdirección de Administración de Obras', 'contraseña123', 1),
(140, 'Jefatura de Unidad Departamental de Contratos de Obras', 'contraseña123', 1),
(141, 'Jefatura de Unidad Departamental de Control y Avance Financiero de Obras', 'contraseña123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrousuarios`
--

CREATE TABLE `registrousuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DepartamentoID` int(11) NOT NULL,
  `Contraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrousuarios`
--

INSERT INTO `registrousuarios` (`ID`, `Nombre`, `Apellidos`, `Email`, `DepartamentoID`, `Contraseña`) VALUES
(1, 'manuelito', 'dummy', 'asd@gm.com', 1, '$2y$10$P0GEBNdA88vM9.PqMBAmKe9b4kGkQA22mOdoZKT7anZZqDPgfpmXy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registrousuarios`
--
ALTER TABLE `registrousuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DepartamentoID` (`DepartamentoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrousuarios`
--
ALTER TABLE `registrousuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrousuarios`
--
ALTER TABLE `registrousuarios`
  ADD CONSTRAINT `registrousuarios_ibfk_1` FOREIGN KEY (`DepartamentoID`) REFERENCES `departamentos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
