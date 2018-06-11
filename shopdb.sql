-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-05-2018 a las 10:59:33
-- Versión del servidor: 5.7.22
-- Versión de PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT 'Desconocido',
  `precio_venta` double NOT NULL DEFAULT '0',
  `disponibles` int(4) NOT NULL DEFAULT '0',
  `marca` varchar(100) NOT NULL DEFAULT 'Desconocida',
  `id_proveedor` int(11) NOT NULL DEFAULT '0',
  `id_categoria` int(4) NOT NULL DEFAULT '0',
  `descripcion` text,
  `fecha_agregado` date NOT NULL,
  `imagen_1` varchar(200) DEFAULT NULL,
  `imagen_2` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombre`, `precio_venta`, `disponibles`, `marca`, `id_proveedor`, `id_categoria`, `descripcion`, `fecha_agregado`, `imagen_1`, `imagen_2`) VALUES
(1, 'Cepillo', 60, 9, 'Desconocida', 1, 1, 'Un peine ultra fino ideal para cabello rebelde', '2018-05-02', NULL, NULL),
(2, 'Iphone x', 20000, 0, 'Apple', 1, 2, 'Bienvenido al futuro. Con pantalla Super Retina de 5.8 pulgadas, el iPhone X es todo pantalla. Pero no es una pantalla cualquiera, es la primer pantalla OLED que está a la altura de los estándares Apple. Diseño elegante, resistente al agua y polvo, con el vidrio más resistente usado hasta ahora y acero inoxidable de calidad quirúrgica. Carga inalámbrica en la base AirPower. Con iOS 11 y Chip A11 Bionic se logra un samartphone rápido y eficiente, el más inteligente e intuitivo. Su revolucionaria cámara TrueDepth, no solo aporta nuevas funcionalidades para tomar fotos y selfies con calidad de estudio, sino hace posible el mapeo facial adaptativo para el más preciso Face ID, donde tu cara es tu contraseña. Tienes que probarlo, aunque después nada volverá a ser igual. Encuéntralo en Amigo Kit y Planes Telcel.', '2018-05-14', 'https://www.telcel.com/content/dam/telcelcom/dispositivos/Apple/iPhone_X/imagenes/gris/frontal.jpg/_jcr_content/renditions/cq5dam.web.827.1600.jpeg', NULL),
(3, 'Laptop Dell Inspiron 5550', 13000, 1, 'Dell', 1, 3, 'laptop de 15\" con un acabado brillante y opciones como cámara infrarroja y pantalla táctil FHD para crear una PC que refleje lo que le interesa.\r\n\r\nCreado para complementarlo.\r\nTomar y llevar: su Inspiron está diseñada para ser portátil, lo que le permite mantenerse productivo y en contacto donde sea que esté. Es delgada, con solo 23,3 mm, y tiene un diseño liviano y fácil de abrir.\r\n \r\n\r\nElegantemente diseñada: abrir su laptop añadirá belleza al escritorio, gracias al elegante reposamanos con pulido tipo cerámica. Además, el teclado iluminado opcional con montaje en la parte inferior hace que la escritura sea más cómoda.\r\n\r\n\r\nCaracterísticas de alto nivel, extras fuera de serie.\r\nVisualización que se adapta a usted: disfrute de una visualización en una pantalla grande de 15 pulgadas, ideal para proyectos o para transmitir videos.\r\n \r\n\r\nSu plan de respaldo: aumente el almacenamiento a medida que crezcan las bibliotecas. Almacene música, películas y archivos en discos con la unidad de DVD.\r\n \r\n\r\nTan potente como lo desee: gracias a los gráficos discretos GDDR5 de 4 GB disponibles y a los procesadores Intel® Core™ hasta de 7.ª generación, puede disfrutar de un rendimiento rápido y con capacidad de respuesta que le permite reproducir su música y videos sin problemas, a la vez que ejecuta otros programas en segundo plano.\r\n', '2018-05-17', 'http://i.dell.com/sites/imagecontent/products/PublishingImages/inspiron-15-5567-laptop/laptop-inspiron-15-5000-FoggyNight-Intel-polaris-pdp-01.jpg', NULL),
(4, 'Balón de fútbol', 100, 10, 'Sin marca', 1, 5, 'Un balón de fútbol de cuero ideal para esos partidos amistosos.', '2018-05-17', NULL, NULL),
(5, 'Playera Lacoste tipo polo', 120, 12, 'Lacoste', 1, 9, 'Con está playera podrás lucirte entre las personas por su simplicidad y estar a la moda\r\n\r\nColor: azul\r\nTallas: Chica y Mediana', '2018-05-17', 'https://http2.mlstatic.com/playera-lacoste-tipo-polo-color-azul-rey-regular-fit-D_NQ_NP_645841-MLM27126504113_042018-O.webp', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(4) NOT NULL,
  `nombre` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
  `disponible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `disponible`) VALUES
(0, 'Sin categoría', 'En esta categoría se encuentran los artículos donde no tienen ninguna categoría pero se encuentran disponibles para su venta.', 1),
(1, 'Belleza', 'Categoría Belleza', 1),
(2, 'Celulares', 'Todo tipo de celulares.', 1),
(3, 'Computación', 'Todo tipo de computadoras', 1),
(4, 'Consola y videojuegos', 'Categoría de videojuegos', 1),
(5, 'Deportes', 'Encuentra todo tipo de cosas deportivas', 1),
(6, 'Electrodomésticos', 'Categoría de electrodomésticos', 1),
(7, 'Hogar', 'Encuentra cosas para tu hogar', 1),
(8, 'Juguestes, niños y bebés', 'Todo tipo de cosas para nños', 1),
(9, 'Moda', 'Encuentra lo que hoy está de moda en esta sección\r\n', 1),
(10, 'Salud y bienestar', 'Sección salud y bienestar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id_pais` char(4) CHARACTER SET utf8 NOT NULL,
  `id_estado` char(4) CHARACTER SET utf8 NOT NULL,
  `id_ciudad` char(4) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de ciudes';

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_pais`, `id_estado`, `id_ciudad`, `nombre`) VALUES
('0', '0', '0', ''),
('1', '1', '1', 'Saltillo'),
('2', '1', '1', 'Houston'),
('3', '1', '1', 'Brasilia'),
('1', '2', '1', 'Monterrey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `id_ciudad` char(4) NOT NULL,
  `id_colonia` char(4) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de colonias';

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`, `nombre`) VALUES
('0', '0', '0', '0', ''),
('1', '1', '1', '1', 'Zona Centro'),
('2', '1', '1', '1', 'Pasadena'),
('3', '1', '1', '1', 'SHCS'),
('1', '2', '1', '1', 'Guadalupe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importe` double NOT NULL,
  `iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasarticulos`
--

CREATE TABLE `comprasarticulos` (
  `id_compraArticulo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `precio_compra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `id_ciudad` char(4) NOT NULL,
  `id_colonia` char(4) NOT NULL,
  `calle` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `numero` varchar(5) NOT NULL,
  `interior` varchar(2) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de direcciones';

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `id_pais`, `id_estado`, `id_ciudad`, `id_colonia`, `calle`, `numero`, `interior`) VALUES
(0, '0', '0', '0', '0', '', '', ''),
(1, '1', '2', '1', '1', 'calle', '123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_pais` char(4) NOT NULL,
  `id_estado` char(4) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de estados';

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_pais`, `id_estado`, `nombre`) VALUES
('0', '0', ''),
('1', '1', 'Coahuila'),
('2', '1', 'Texas'),
('3', '1', 'Distrito Federal'),
('1', '2', 'Nuevo León');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(4) NOT NULL,
  `tipo_descuento` enum('porciento','cantidad','') COLLATE latin1_spanish_ci NOT NULL DEFAULT 'porciento',
  `descuento` int(11) NOT NULL DEFAULT '5',
  `id_articulo` int(11) NOT NULL,
  `inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `finaliza` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `tipo_descuento`, `descuento`, `id_articulo`, `inicio`, `finaliza`) VALUES
(1, 'porciento', 5, 1, '2018-05-17 16:13:00', '2018-05-17 17:49:00'),
(2, 'porciento', 5, 4, '2018-05-18 16:04:22', '2018-05-18 16:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id_pais` char(4) CHARACTER SET utf8 NOT NULL,
  `codigo` varchar(2) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de paises';

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre`) VALUES
('0', '', ''),
('1', '', 'México'),
('2', '', 'Estados Unidos'),
('3', '', 'Brasil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `descripcion`) VALUES
('0', 'Usuario normal'),
('1', 'Encargado de almacén'),
('2', 'Moderador'),
('3', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `nombre` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_direccion`, `nombre`, `telefono`) VALUES
(1, 1, 'Proovedor S.A. de C.V.', '8441231234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `paterno` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `materno` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `genero` enum('M','F') CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `id_direccion` int(10) NOT NULL DEFAULT '0',
  `correo` varchar(160) CHARACTER SET utf8 NOT NULL,
  `contrasena` varchar(120) CHARACTER SET utf8 NOT NULL,
  `id_permiso` char(1) COLLATE latin1_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `paterno`, `materno`, `genero`, `telefono`, `id_direccion`, `correo`, `contrasena`, `id_permiso`) VALUES
(1, 'Fulatio', 'Rodriguez', 'Perez', 'M', NULL, 0, 'correo@gmail.com', '$2y$10$77soTnCfEiuHF7G3kvPQNOzzp96Zwvr1rgrZbsrnEsueFttzCcXq2', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `importe` double DEFAULT NULL,
  `iva` double NOT NULL DEFAULT '0',
  `realizada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_usuario`, `fecha`, `importe`, `iva`, `realizada`) VALUES
(1, 1, '2018-05-17 05:00:00', 10, 200, 1),
(2, 1, '2018-05-18 05:00:00', 0, 0, 0),
(3, 1, '2018-05-18 16:27:32', 13120, 1312, 0),
(13, 1, '2018-05-18 17:00:27', 13120, 1312, 0),
(14, 1, '2018-05-18 17:07:00', 20000, 2000, 0),
(15, 1, '2018-05-18 17:12:20', 13000, 1300, 0),
(16, 1, '2018-05-18 17:14:02', 13000, 1300, 0),
(17, 1, '2018-05-18 17:23:31', 20000, 2000, 0),
(18, 1, '2018-05-18 17:53:48', 20000, 2000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasarticulos`
--

CREATE TABLE `ventasarticulos` (
  `id_ventaArticulo` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventasarticulos`
--

INSERT INTO `ventasarticulos` (`id_ventaArticulo`, `id_articulo`, `id_venta`) VALUES
(1, 4, 1),
(2, 4, 1),
(3, 4, 1),
(4, 2, 1),
(5, 3, 1),
(6, 3, 1),
(7, 5, 1),
(8, 5, 1),
(9, 5, 1),
(10, 4, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1),
(14, 4, 2),
(15, 5, 3),
(16, 5, 13),
(17, 3, 13),
(18, 2, 14),
(19, 3, 15),
(20, 3, 16),
(21, 2, 17),
(22, 2, 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `articulosCategoriaFK` (`id_categoria`),
  ADD KEY `articulosProveedoresFK` (`id_proveedor`) USING BTREE;

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `carritoArticulosFK` (`id_carrito`),
  ADD KEY `carritoUsuariosFK` (`id_carrito`),
  ADD KEY `carritoArticuloFK` (`id_articulo`),
  ADD KEY `carritoUsuarioFK` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id_ciudad`,`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `ciudadesEstadosFK` (`id_pais`,`id_estado`);

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id_colonia`,`id_ciudad`,`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `coloniasCiudadesFK` (`id_pais`,`id_estado`,`id_ciudad`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `comprasUsuariosFK` (`id_usuario`),
  ADD KEY `comprasProveedoresFK` (`id_proveedor`);

--
-- Indices de la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  ADD PRIMARY KEY (`id_compraArticulo`),
  ADD KEY `comprasArticulosArticulosFK` (`id_articulo`),
  ADD KEY `comprasarticulosCompra` (`id_compra`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `direccionColoniasFK` (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`) USING BTREE;

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`,`id_pais`) USING BTREE,
  ADD KEY `id_pais` (`id_pais`) USING BTREE;

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `descuentosArticulosFK` (`id_oferta`),
  ADD KEY `descuentoArticuloFK` (`id_articulo`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `proveedoresDireccionesFK` (`id_direccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuariosDireccionesFK` (`id_direccion`) USING BTREE,
  ADD KEY `usuariosPermisosFK` (`id_permiso`) USING BTREE;

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventasUsuariosFK` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  ADD PRIMARY KEY (`id_ventaArticulo`),
  ADD KEY `ventasarticulosArticuloFK` (`id_articulo`),
  ADD KEY `ventasarticulosVenta` (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  MODIFY `id_compraArticulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  MODIFY `id_ventaArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `FK_articulos_proveedores` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `articulosCategoriaFK` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carritoArticuloFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `carritoUsuarioFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `ciudadesEstadosFK` FOREIGN KEY (`id_pais`,`id_estado`) REFERENCES `estados` (`id_pais`, `id_estado`);

--
-- Filtros para la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD CONSTRAINT `coloniasCiudadesFK` FOREIGN KEY (`id_pais`,`id_estado`,`id_ciudad`) REFERENCES `ciudades` (`id_pais`, `id_estado`, `id_ciudad`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `comprasProveedoresFK` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `comprasUsuarioFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `comprasarticulos`
--
ALTER TABLE `comprasarticulos`
  ADD CONSTRAINT `comprasArticulosArticulosFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `comprasarticulosCompra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direccionColoniasFK` FOREIGN KEY (`id_pais`,`id_estado`,`id_ciudad`,`id_colonia`) REFERENCES `colonias` (`id_pais`, `id_estado`, `id_ciudad`, `id_colonia`);

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estadosPaisesFK` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`);

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `descuentoArticuloFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedoresDireccionesFK` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuariosDireccionesFK` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`),
  ADD CONSTRAINT `usuariosPermisosFK` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventasUsuariosFK` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `ventasarticulos`
--
ALTER TABLE `ventasarticulos`
  ADD CONSTRAINT `ventasarticulosArticuloFK` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`),
  ADD CONSTRAINT `ventasarticulosVenta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
