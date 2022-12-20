<?php

require('QR/phpqrcode/qrlib.php') ;
$archivo=  $_SERVER["DOCUMENT_ROOT"] .'/sica/QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
die();
//QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
