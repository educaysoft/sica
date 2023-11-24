<?php
$imagedata = base64_decode($_POST['imgdata']);
$filename = $_POST["namefile"]; // md5(uniqid(rand(), true));
//path where you want to upload image
$file = $_SERVER['DOCUMENT_ROOT'] . '/Repositorio/firmas/'.$filename;
$file2= 'https://'.$_SERVER["SERVER_NAME"]. '/Repositorio/firmas/'.$filename;
$imageurl  = $file; ///'http://***.com/images/'.$filename.'.png';
file_put_contents($file,$imagedata);

$url="https://educaysoft.org/sica/visitante/save_edit?idvisitante=".$_POST['idvisitante']."&motivo=".$_POST['motivo']."&rutafirma=".$file2; 
header("location:$url");

echo $imagedata;

?>
