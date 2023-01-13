use educayso_facae;
CREATE TABLE `usoaula` (
  `idusoaula` int(11) NOT NULL auto_increment primary key,
  `idaula` int(11) DEFAULT NULL,
  `idevento` int(11) DEFAULT NULL,
  `fechadesde` date DEFAULT NULL,
  `fechahasta` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

