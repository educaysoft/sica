use educayso_facae;
CREATE TABLE `ubicaciondocente` (
  `idubicaciondocente` int(11) NOT NULL auto_increment primary key,
  `iddocente` int(11) DEFAULT NULL,
  `fechaubicacion` date DEFAULT NULL,
  `idunidad` int(11) DEFAULT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

