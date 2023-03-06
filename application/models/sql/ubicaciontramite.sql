use educayso_facae;
CREATE TABLE `ubicaciontramite` (
  `idubicaciontramite` int(11) NOT NULL auto_increment primary key,
  `idtramite` int(11) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `iddepartamento` int(11) DEFAULT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

