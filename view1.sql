CREATE VIEW `emisor1` AS select `emisor`.`iddocumento` AS `iddocumento`,`emisor`.`idpersona` AS `idpersona`,`documento`.`asunto` AS `asunto`,`persona`.`nombres` AS `nombres` from ((`emisor` join `documento`) join `persona`) where ((`emisor`.`iddocumento` = `documento`.`iddocumento`) and (`emisor`.`idpersona` = `persona`.`idpersona`)); 




