use educayso_facae;
CREATE TABLE `ubicacionarticulo` (
  `idubicacionarticulo` int(11) NOT NULL auto_increment primary key,
  `idarticulo` int(11) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `iddepartamento` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

