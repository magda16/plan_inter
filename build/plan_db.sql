-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-06-2019 a las 01:02:50
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plan_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones`
--

CREATE TABLE `aplicaciones` (
  `id_aplicacion` int(11) NOT NULL,
  `id_demandante` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandantes`
--

CREATE TABLE `demandantes` (
  `id_demandante` int(11) NOT NULL,
  `nombre_apellido` varchar(250) NOT NULL,
  `direccion` text NOT NULL,
  `zona` varchar(25) NOT NULL,
  `telefono` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(75) NOT NULL,
  `nacionalidad` varchar(75) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `estado_civil` varchar(15) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `altura` decimal(10,0) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `DUI` varchar(25) NOT NULL,
  `NIT` varchar(25) NOT NULL,
  `licencia_arma` varchar(10) NOT NULL,
  `arma` varchar(3) NOT NULL,
  `curso_ansp` varchar(3) NOT NULL,
  `licencia_vehiculo` varchar(3) NOT NULL,
  `licencia_moto` varchar(3) NOT NULL,
  `vehico_propio` varchar(25) NOT NULL,
  `discapacidades` text NOT NULL,
  `personas_dependientes` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `ultimo_grado` text NOT NULL,
  `idiomas` text NOT NULL,
  `conocimientos` text NOT NULL,
  `habilidades_deztrezas` int(11) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `experiencia` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `municipio` varchar(75) NOT NULL,
  `departamento` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `demandantes`
--

INSERT INTO `demandantes` (`id_demandante`, `nombre_apellido`, `direccion`, `zona`, `telefono`, `email`, `fecha_nac`, `lugar_nac`, `nacionalidad`, `sexo`, `edad`, `estado_civil`, `peso`, `altura`, `estatura`, `DUI`, `NIT`, `licencia_arma`, `arma`, `curso_ansp`, `licencia_vehiculo`, `licencia_moto`, `vehico_propio`, `discapacidades`, `personas_dependientes`, `observaciones`, `ultimo_grado`, `idiomas`, `conocimientos`, `habilidades_deztrezas`, `ocupacion`, `experiencia`, `fecha_ingreso`, `municipio`, `departamento`) VALUES
(1, 'Mauricio Constanza', 'asdfasfdasf', 'urbana', '7881-3439', 'kjhskjdfhksdjfk@sdfsjdf.com', '1984-11-04', 'san vicente', 'salvadoreño', 'M', 34, 'Soltero', '200', '2', '2', '02557257-7', '0617-041184-103-5', 'no', 'no', 'no', 'si', 'si', 'si', 'no', 6, 'dsfsdsd', 'universidad', 'español,ingles', 'informatica', 1, 'ingeniero de sistemas informaticos', 5, '2019-06-08', 'San Vicente', 'San Vicente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `razon_social` text NOT NULL,
  `nombre_comercial` text NOT NULL,
  `nit` varchar(50) NOT NULL,
  `numero_patronal` varchar(50) NOT NULL,
  `numero_contribuyente` varchar(50) NOT NULL,
  `descrip_gral_act_econo` text NOT NULL,
  `descrip_espec_act_econo` text NOT NULL,
  `total_empleados` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `zona` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` varchar(25) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_oficna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `nombre_puesto` varchar(75) NOT NULL,
  `numero_plazas` int(11) NOT NULL,
  `salario` double NOT NULL,
  `forma_pago` varchar(50) NOT NULL,
  `periodo_pago` varchar(50) NOT NULL,
  `forma_contrato` varchar(50) NOT NULL,
  `prestaciones` text NOT NULL,
  `jornada_trabajo` varchar(50) NOT NULL,
  `horario_trabajo` varchar(150) NOT NULL,
  `periodo_prueba` varchar(50) NOT NULL,
  `discapacidad` varchar(50) NOT NULL,
  `descrip_puesto` text NOT NULL,
  `funciones` text NOT NULL,
  `experiencia_laboral` int(11) NOT NULL,
  `rango_edad` varchar(100) NOT NULL,
  `sexo` varchar(25) NOT NULL,
  `estado_civil` varchar(25) NOT NULL,
  `caracteristicas_personales` text NOT NULL,
  `documentos_requeridos` text NOT NULL,
  `otros_requerimientos` text NOT NULL,
  `disponibilidad` varchar(100) NOT NULL,
  `incorporacion` varchar(100) NOT NULL,
  `ultimo_grado` varchar(150) NOT NULL,
  `idioma_extranjero` text NOT NULL,
  `conocimientos` int(11) NOT NULL,
  `habilidades_destrezas` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_demandante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE `oficinas` (
  `id_oficina` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `responsable` text NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `dui` varchar(50) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `clave` varchar(75) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `id_oficina` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `dui`, `nit`, `usuario`, `clave`, `correo`, `id_oficina`, `estado`, `nivel`) VALUES
(1, 'Mauricio', 'Constanza', '0255725-7', '0617-041184-103-5', 'admin', 'admin', 'mauricioconstanza@gmail.com', 1, 'activo', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD PRIMARY KEY (`id_aplicacion`),
  ADD KEY `id_demandante` (`id_demandante`),
  ADD KEY `id_empresa` (`id_oferta`);

--
-- Indices de la tabla `demandantes`
--
ALTER TABLE `demandantes`
  ADD PRIMARY KEY (`id_demandante`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  ADD PRIMARY KEY (`id_oficina`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  MODIFY `id_aplicacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `demandantes`
--
ALTER TABLE `demandantes`
  MODIFY `id_demandante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
  MODIFY `id_oficina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD CONSTRAINT `aplicaciones_ibfk_1` FOREIGN KEY (`id_demandante`) REFERENCES `demandantes` (`id_demandante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aplicaciones_ibfk_2` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
