<?php

require $_SERVER["DOCUMENT_ROOT"].'QR/pqrcode/qrlib.php');
$archivo=base_url().'QR/codigosqr/'.$codigoqr['filename'];
echo $archivo;
die();
//QRcode::png($codigoqr['contenido'],$codigoqr['filename'],$codigoqr['level'],$codigoqr['tamanio'],$codigoqr['framesize']);



?>
