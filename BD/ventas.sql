-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2020 a las 13:58:39
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(50) NOT NULL,
  `categorias` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id` int(20) NOT NULL,
  `numerof` varchar(50) NOT NULL,
  `codigo` varchar(38) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categorias` varchar(20) NOT NULL,
  `promocion` varchar(25) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `numeroguia` varchar(25) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(15) NOT NULL,
  `codigo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `caracteristica` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `codigo`, `nombre`, `caracteristica`, `estado`, `precio`, `cantidad`) VALUES
(1, '344', 'cargador', 'sdasd', 'usado', 2.593, '25'),
(2, '01', 'david', 'sww', 'wdwd', 1.5, '5'),
(3, 'retr', 'david', 'hfgjhvf', 'nuevo', 152256000, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `caracteristica` varchar(200) NOT NULL,
  `precioVenta` float NOT NULL,
  `precioDolar` float(5,2) NOT NULL,
  `existencia` varchar(50) NOT NULL,
  `categorias` varchar(25) NOT NULL,
  `promocion` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `caracteristica`, `precioVenta`, `precioDolar`, `existencia`, `categorias`, `promocion`, `foto`) VALUES
(19, 'A1', 'AUDIFONOS AURICULARES', 'Audifonos Auriculares Manos Libres Samsung S3 S4 S5 S6 S7 S7', 52.5, 2.50, '3', 'telefono', 'N/P', 'foto/Audifonos Samsung 2.jpg'),
(20, 'A2', 'Audifonos Monster Beats ', 'Audifonos Monster Beats Dr.dre Pc Mp3 Mp4 Celular 3.5mm', 35.7, 1.70, '9', 'áudio', 'N/P', 'foto/áudifonos beat.jpg'),
(23, 'A4', 'Conector Adaptador Convertidor Plug Jack ', ' Conector Adaptador Convertidor Plug Jack  6.5 A Mini Jack 3.5', 17.85, 0.85, '40', 'áudio', 'N/P', 'foto/conector  mini jack.jpg'),
(24, 'A5', ' Conector Adaptador Convertidor Plug ', 'Conector Adaptador Convertidor Plug Mini Jack 3.5 A Jack 6.5 ', 17.85, 0.85, '6', 'áudio', 'N/P', 'foto/conector plu jack.jpg'),
(25, 'A6', ' Conectores Adaptador Plug 2 ', ' Conectores Adaptador Plug 2 Rca A Jack 6.5mm Mono ', 17.85, 0.85, '6', 'áudio', 'N/P', 'foto/conector plu jack.jpg'),
(26, 'A7', ' Conectores Adaptador Plug ', '  Conectores Adaptador Plug  2 Rca A Mini Jack 3.5mm Estereo ', 17.85, 0.85, '6', 'áudio', 'N/P', 'foto/conector plu jack.jpg'),
(27, 'A8', ' Cable Red Router Modem', 'Cable Red Router Modem Utp Rj45 + 1 Cable Rj11 Telefono ', 31.5, 1.50, '6', 'cable de RED', 'N/P', 'foto/cable de red combo.jpg'),
(28, 'A9', ' Cable Usb 3 En 1', ' Cable Usb 3 En 1 Cargador iPhone 3 4 5 5s 6 Mayor Detal ', 42, 2.00, '4', 'telefono', 'N/P', 'foto/cable usb 3 en 1.jpg'),
(29, 'A10', 'Cable Usb Plano ', 'Cable Usb Plano 1m Telefono Android Samsung Mini S3 S4 \r\n', 25.2, 1.20, '14', 'telefono', 'N/P', 'foto/cable usb plano.jpg'),
(30, 'A11', ' Cable Usb ', ' Cable Usb Carga Datos Samsung Huawei Blu Lg Htc 1.5m Hwin', 35.7, 1.70, '3', 'telefono', 'N/P', 'foto/12787309_1392334240845501_1336734809_o-1.jpg'),
(31, 'A12', 'Cable Otg', ' Cable Otg Mircro Usb Macho A Usb Hembra Tablet ', 17.85, 0.85, '7', 'laptop', 'N/P', 'foto/cable otg.jpg'),
(32, 'A13', ' Cable Sata Datos Y Corriente ', 'Cable Sata Datos Y Corriente  Disco Duro Dvr Blu Ray ', 37.8, 1.80, '21', 'pc', 'N/P', 'foto/Cable Sata.jpg'),
(33, 'A14', ' CABLE PC MONITOR TV  ', ' Cable Poder Corriente Cpu Computadora Tv Monitor Impresora ', 37.8, 1.80, '4', 'pc', 'N/P', 'foto/cable de poder.jpg'),
(34, 'A15', ' CABLE Disco Duro Dvr Blu Ray ', ' 3 Cable Sata Datos Disco Duro Dvr Blu Ray ', 12.6, 0.60, '37', 'pc', 'N/P', 'foto/Cable Sata.jpg'),
(35, 'A16', ' CARGADOR ', ' Cargador Pared Cubo Taco Telefono Samsung iPhone Huawei 1a \r\n', 35.7, 1.70, '7', 'telefono', 'N/P', 'foto/CARGADOR SANSUMG.jpg'),
(36, 'A17', ' CARGADOR + CABLE ', ' Cargador Samsung S3 S4 S5 S7 2a Usb Microusb \r\n', 52.5, 2.00, '4', 'telefono', 'A', 'foto/CARGADOR SANSUMG.jpg'),
(39, 'A20', 'PIN CARGA S3MINI', 'Pin De Carga Samsung S3 Mini I8190 I8200 L710 S7562 ', 150, 5.00, '15', 'telefono', 'N/P', 'foto/PIN DE CARGA DE SAMSUNG GALAXY S3.jpg'),
(40, 'A21', ' PIN CARGA S3 GRANDE ', 'Pin De Carga Samsung Galaxy S3 I9300 I9308 I939 I535 ', 105, 5.00, '15', 'telefono', 'N/P', 'foto/pin de carga samsung s3.jpg'),
(41, 'A22', 'PIN CARGA ZTE KISS MAX LI', 'Pin De Carga Zte A410 Kiss Max 2 Ii 5 Pines', 150, 5.00, '34', 'telefono', 'N/P', 'foto/pin de carga zte.jpg'),
(42, 'A23', 'Usb Multipuertos ', 'Hub Usb Multipuertos 4 En 1 Hwin Laptop Pc', 63, 3.00, '14', 'pc', 'N/P', 'foto/Hub USB.jpg'),
(43, 'A24', 'Estaño', 'Estaño Yaxun 0.3mm Flux 1.2% 37pb 63sn 12 Metros', 84, 4.00, '3', 'servicio técnico  ', 'N/P', 'foto/estaño.jpg'),
(44, 'A25', 'HILO COBRE RECONTRUIR PISTAS', '2 Hilo Cobre Yaxun 0.1mm Reconstruccion Pista Celular 10mts', 21, 1.00, '22', 'servicio técnico  ', 'N/P', 'foto/hilo cobre.jpg'),
(45, 'A26', 'FLUX EN PASTA SOLDAR DESOLDAR', 'Flux Pasta Para Soldar Desoldar Yaxun Yx20 150gr', 63, 3.00, '1', 'servicio técnico  ', 'N/P', 'foto/flux pasta para soldar.jpg'),
(46, 'A27', 'LIMPIADOR LCD MICAS PANTALLAS', 'Limpiador De Mica Pantalla Lcd Monitor Plasma Laptop', 42, 2.00, '4', 'servicio técnico  ', 'N/P', 'foto/Limpiador.jpg'),
(47, 'A28', 'MEMORIA RAM LAPTOP', 'Memoria Ram Laptop 1gb Ddr2 2rx16 5300s 666mhz', 63, 3.00, '3', 'laptop', 'N/P', 'foto/memoria ram ddr2.jpg'),
(48, 'A29', 'Memoria Ram Laptop', 'Memoria Ram Laptop 1gb Ddr3 Pc3 1rx8 10600s 1333mhz', 84, 4.00, '8', 'TABLET', 'N/P', 'foto/memoria ram.jpg'),
(49, 'A30', 'Memoria Ram Laptop ', 'Memoria Ram Laptop 2gb Ddr3 Pc3 1rx8 12800s 1600mhz', 126, 6.00, '7', 'laptop', 'A', 'foto/memoria ram ddr3  2gb.jpg'),
(50, 'A31', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E5700 3.0ghz 2mb 800 775 Intel', 157.5, 7.50, '2', 'pc', 'N/P', 'foto/PROCESADOR INTEL E5700.jpg'),
(51, 'A32', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E5200 775 2.5ghz 2mb 800 Intel', 84, 4.00, '1', 'pc', 'N/P', 'foto/procesador intel E5200.jpg'),
(52, 'A33', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E2140 1.6ghz 1mb 800 775 Intel', 42, 2.00, '2', 'pc', 'N/P', 'foto/procesador intel E2140.jpg'),
(53, 'A34', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E5300 2.6ghz 2mb 800 775 Intel', 94.5, 4.50, '1', 'pc', 'N/P', 'foto/procesador intel e5300.jpg'),
(54, 'A35', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E2160 1.8ghz 1mb 800 775 Intel', 42, 2.00, '1', 'pc', 'N/P', 'foto/PROCESADOR INTEL E2160.jpg'),
(55, 'A36', 'PROCESADOR PC 775', 'Procesador Dual-core Pentium E2180 2ghz 1mb 800 775 Intel', 42, 2.00, '0', 'pc', 'N/P', 'foto/PROCESADOR E2180.jpg'),
(56, 'A37', 'PROCESADOR LAPTOP', 'Procesador Laptop Mobile Amd Sempron Sms3500hax4cm', 84, 4.00, '1', 'laptop', 'N/P', 'foto/Procesador Laptop MOBILE AMD SEMPRON SMS3500HAX4CM.jpg'),
(57, 'A38', 'Procesador Laptop', 'Procesador Laptop Amd Turion 64x2 Tmrm70dam22gg', 105, 5.00, '0', 'laptop', 'N/P', 'foto/Procesador Laptop AMD TURION 64X2 TMRM70DAM22GG.jpg'),
(58, 'A39', 'PROCESADOR LAPTOP', 'Procesador Laptop Amd Athlon Amp360sgr22gm', 150, 5.00, '1', 'laptop', 'N/P', 'foto/Procesador Laptop AMD ATHLON AMP360SGR22GM.jpg'),
(59, 'A40', 'PROCESADOR LAPTOP', 'Procesador Laptop Intel® Celeron® 560 Sla2d Ppga478', 105, 5.00, '1', 'laptop', 'N/P', 'foto/PROCESADOR SLA2D.jpg'),
(60, 'A41', 'PROCESADOR LAPTOP', 'Procesador Laptop Intel® Core2 Duo T2300e Pbga479/ppga478', 84, 4.00, '1', 'laptop', 'N/P', 'foto/Procesador Laptop Intel® Core2 Duo T5250 Ppga478.jpg'),
(61, 'A42', 'PROCESADOR LAPTOP', 'Procesador Laptop Intel® Core2 Duo T5250 Ppga478', 84, 4.00, '1', 'laptop', 'N/P', 'foto/procesador T5250.jpg'),
(62, 'A43', 'PROCESADOR LAPTOP', 'Procesador Laptop Amd Athlon Amgtf20hax4dn', 168, 8.00, '1', 'laptop', 'N/P', 'foto/Procesador Laptop AMD ATHLON AMGTF20HAX4DN.jpg'),
(63, 'A44', 'Pantalla Laptop ', 'Pantalla Laptop Lenovo Sl500 Hp F700 F500 Dv6000 Acer 5315', 1.05, 50.00, '3', 'laptop', 'N/P', 'foto/pantalla-laptop-lenovo-sl500-hp-f700-f500-dv6000-acer-5315-D_NQ_NP_668521-MLV29330159432_022019-F.jpg'),
(64, 'A45', 'Pantalla Laptop', 'Pantalla Laptop 10.2 Pulgadas 30 Pines Siragon Lm C100', 315, 15.00, '1', 'laptop', 'N/P', 'foto/pantalla Minilaptop Siragon  lm c100.jpg'),
(65, 'A46', 'PANTALLA DE TELÉFONO ', 'Pantalla Huawei G7300', 150000, 5.00, '1', 'telefono', 'N/P', 'foto/Pantalla Huawei G7300.jpg'),
(66, 'A47', 'Pantalla Laptop', 'Pantalla Laptop Canaima', 168, 8.00, '2', 'laptop', 'N/P', 'foto/pantalla laptop canaima c3 c4.jpg'),
(67, 'A48', 'PANTALLA DE TELEFONO ', 'Pantalla Blu Dash 3.5 Ii D352u Incluye Instalacion', 252, 12.00, '1', 'telefono', 'N/P', 'foto/Pantalla Blu Dash 3.5 Ii D352u Incluye Instalacion.jpg'),
(68, 'A49', 'PANTALLA DE TELEFONO ', 'Pantalla Lcd Nokia C205.1 Rm725', 52.5, 2.50, '1', 'telefono', 'N/P', 'foto/Pantalla Lcd Nokia C205.1 Rm725.jpg'),
(69, 'A50', 'PANTALLA DE TELEFONO ', 'Pantalla Lcd Para Teléfono Samsung Corby Gt B3210', 63, 3.00, '1', 'telefono', 'N/P', 'foto/Pantalla Lcd Para Teléfono Samsung Corby Gt B3210.jpg'),
(70, 'A51', 'FLEX DISCO DURO', 'Flex Disco Duro Canaima Laptop', 42, 2.00, '4', 'laptop', 'N/P', 'foto/flex-de-disco-duro-sata-compatible-con-canaime-D_NQ_NP_935767-MLV29707666758_032019-Q.jpg'),
(71, 'A52', 'DISCO DURO LAPTOP', 'Disco Duro 320gb Sata Laptop 2.5', 231, 11.00, '5', 'laptop', 'N/P', 'foto/disco-duro-320gb-sata-laptop-25-5400rpm-sellado-D_NQ_NP_688197-MLV31370576870_072019-F.jpg'),
(73, 'A3', 'Cable De Audio Auxiliar', 'Cable De Audio Auxiliar 3.5mm Plug A Plug Punta Dorada', 21, 1.00, '6', 'áudio', 'N/P', 'foto/cable auxiliar.jpg'),
(74, 'A18', 'PIN CARGA S1', 'Pin De Carga Samsung Galaxy S1 I9000 I9001 I9003 7 Pines', 105, 5.00, '21', 'telefono', 'N/P', 'foto/PIN DE CARGA DE SAMSUNG GALAXY S1.jpg'),
(75, 'A19', 'Pin De Carga', 'Pin De Carga Samsung Galaxy S2 I9100 Micro Usb 7 Pines', 105, 5.00, '26', 'telefono', 'N/P', 'foto/Pin De Carga Samsung Galaxy S2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_producto`, `cantidad`, `id_venta`) VALUES
(16, 20, 1, 52),
(17, 19, 2, 53),
(18, 29, 2, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `cedula`, `usuario`, `clave`, `rol`) VALUES
(2, 'jesus david', 'henriquez rodriguez', '27820278', 'je.david99', '123', 'admin'),
(17, 'Jofer', 'Herrera', '22511545', 'Jherrera', '22511545', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(50, '2019-10-29 21:07:52', '35.70'),
(51, '2019-11-07 20:15:35', '25.20'),
(52, '2020-01-09 17:12:03', '35.70'),
(53, '2020-02-18 00:58:22', '105.00'),
(54, '2020-02-18 01:55:12', '0.00'),
(55, '2020-02-18 01:56:30', '50.40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasfinal`
--

CREATE TABLE `ventasfinal` (
  `id` int(11) NOT NULL,
  `factura` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estatud` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `precioVenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `total` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventasfinal`
--
ALTER TABLE `ventasfinal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `ventasfinal`
--
ALTER TABLE `ventasfinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
