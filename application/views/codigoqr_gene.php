<?php

require('QR/phpqrcode/qrlib.php') ;
$archivo=  'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
QRcode::png($codigoqr['contenido'],$archivo,$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
