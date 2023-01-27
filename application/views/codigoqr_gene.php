<?php

require('QR/phpqrcode/qrlib.php') ;
$archivo=  'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
