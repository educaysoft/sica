<?php

echo "Cargando archivo.....";


  if(isset($_FILES['files']['name'])){
// Count total files
	$countfiles = count($_FILES['files']['name']);

	$upload_location =  $_SERVER["DOCUMENT_ROOT"]."/Repositorio/";

	$count = 0;
	for($i=0;$i < $countfiles;$i++){

  		 // File name
   		$filename = $_FILES['files']['name'][$i];
   		$filename = $_POST["archivopdf"];
   		// File path
   		$path = $upload_location.$filename;

   		// file extension
   		$file_extension = pathinfo($path, PATHINFO_EXTENSION);
   		$file_extension = strtolower($file_extension);

   		// Valid file extensions
   		$valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   		// Check extension
   		if(in_array($file_extension,$valid_ext)){

      			// Upload file
      			if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
        		$count += 1;
      			} 
   		}

}
  }else{

 echo "No existe archivo para cargar";
  }

?>

