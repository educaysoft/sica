use educayso_facae;
drop table prestamoarticulo;
CREATE TABLE `prestamoarticulo` (
  `idprestamoarticulo` int(11) NOT NULL auto_increment primary key,
  `idarticulo` int(11) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `fechaprestamo` date DEFAULT NULL,
  `fechadevolucion` date DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `horaprestamo` time DEFAULT NULL,
  `horadevolucion` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

