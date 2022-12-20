<?php

require $_SERVER["DOCUMENT_ROOT"].'QR/pqrcode/qrlib.php';
$archivo=  $_SERVER["DOCUMENT_ROOT"] .'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
die();
//QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
