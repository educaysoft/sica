
<script>

 async function save_masive(correo,cedula,nombres,apellidos,telefono) {
	document.write("---- entro --- ");
	var idevento = 31;
	var idinstitucion=1;
	var email=correo;
	var password=cedula;
     $.ajax({
        url: "<?php echo site_url('login/carga_masiva_save'); ?>",
        data: {password:password, email:email, cedula:cedula, nombres:nombres, apellidos:apellidos, telefono:telefono, idevento:idevento,idinstitucion:idinstitucion},
        method: 'GET',
	async : false,
        dataType : 'json',
	crossDomain:  true,
        success: function(data){
        var html = '';
        var i;
	document.write(data);

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
	document.write(xhr.status+" -  "+thrownError );
      }
    });
}


</script>



<?php

	$arhivo=base_url()."csv/Armada04.csv";

	$csvFile = file($arhivo);
	$data=[];
	echo "cargando el archivo Ñ";
	foreach($csvFile as $line)
	{
		$data[] =str_getcsv($line);
	}	
	$data1=array();
	$data2=array();
	$i=0;
	$cab=array();
	foreach($data as $row){
		if($i==0){
			$cab=$row;
		}else{
		 $data1[$cab[0]]=$row[0];
		 $data1[$cab[1]]=$row[1];
		 $data1[$cab[2]]=$row[2];
		 $data1[$cab[3]]=$row[3];
		 $data1[$cab[4]]=$row[4];
		 array_push($data2,$data1);
		}
	   $i=$i+1;

	}
//llenado 	
	echo "\n Cargo el archivo";
	$i=0;
	foreach($data2 as $row){
        $cedula0=str_replace("-","",$row['cedula']);
        $cedula1=str_replace("O","0",$cedula0);
	$cedula2=str_pad($cedula1,10,'0',STR_PAD_LEFT);


        $movil0=str_replace("-","",$row['movil']);
        $movil1=str_replace("O","0",$movil0);
	$movil2=str_pad($movil1,10,'0',STR_PAD_LEFT);

       if($i>399){
	echo $row['correo']." - ".$cedula2." - ".$row['nombres']." - ".$row['apellidos']." - ".$movil2."<br>";	 
    	echo "<script> save_masive(`".$row['correo']."`,`".$cedula2."`,`".$row['nombres']."`,`".$row['apellidos']."`,`".$movil2."`); </script>";
	sleep(1);
       }
	$i=$i+1;
	if($i==610)
	{
	break;
	}
	}

	echo "\n ".$i;



?>














