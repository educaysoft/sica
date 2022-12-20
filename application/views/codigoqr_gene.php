<?php

require  $_SERVER['SERVER_NAME']. '/QR/phpqrcode/qrlib.php';
$archivo=base_url().'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
die();
//QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
