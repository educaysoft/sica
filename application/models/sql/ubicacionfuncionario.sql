use educayso_facae;
drop table ubicacionfuncionario;
CREATE TABLE `ubicacionfuncionario` (
  `idubicacionfuncionario` int(11) NOT NULL auto_increment primary key,
  `idfuncionario` int(11) DEFAULT 0,
  `fechaingreso` date,
  `fechasalida` date,
  `iddepartamento` int(11) DEFAULT 0,
  `detalle` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

