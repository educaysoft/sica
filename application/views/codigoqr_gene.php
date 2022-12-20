<?php

require basename(base_url().'QR/pqrcode/qrlib.php');
$archivo=base_url().'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
die();
//QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
