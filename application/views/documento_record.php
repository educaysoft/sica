<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	    <ul>
<?php
if(isset($documento))
{


$j=0;
		$numero=$j;
if(isset($this->session->userdata['acceso'])){
  foreach($this->session->userdata['acceso'] as $row)
	    {
		if("documento"==$row["modulo"]["nombre"]);
		{
			$numero=$j;
		}	
		$j=$j+1;
	    } 
}



?>

        <li> <?php echo anchor('documento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documento/siguiente/'.$documento['iddocumento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('documento/anterior/'.$documento['iddocumento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documento/elultimo/', 'Último'); ?></li>
	<?php
       
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('o/add', 'Nuevo'); ?></li>
	<?php } ?>
        <li> <?php echo anchor('documento/edit/'.$documento['iddocumento'],'Edit'); ?></li>

        <li style="border-right:1px solid green"> <?php echo anchor('documento/delete/'.$documento['iddocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('documento/listar/','Listar'); ?></li>
        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('documento/save_edit') ?>
<?php echo form_hidden('iddocumento',$documento['iddocumento']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipodocu/elprimero/', 'Tipo documento'); ?> :</label>
     	<?php 
	$options= array("NADA");
	foreach ($tipodocus as $row){
		$options[$row->idtipodocu]= $row->descripcion;
	}
	$arrdatos=array('name'=>'idtipodocu','value'=>$options[$documento['idtipodocu']],"disabled"=>"disabled","style"=>"width:500px");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos) 
		?>
	</div> 
</div> 

<div class="form-group row">
  <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      		echo form_input('iddocumento',$documento['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'iddocumentos','style'=>'width:500px;')) 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechaelaboracion',$documento['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('emisor/add', 'Emisor/emisores:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($emisores as $row){
		$options[$row->idpersona]=$row->elemisor;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idemisor[]',$options,(array)set_value('idemisor', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('destinatario/add', 'Destinatarios/as:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($destinatarios as $row){
		$options[$row->idpersona]=$row->nombres;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('iddestinatario[]',$options,(array)set_value('iddestinatario',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('asunto',$documento['asunto'],$textarea_options); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <a href="<?php echo base_url(); ?>index.php/documento/show_pdf/<?php echo $documento['iddocumento']; ?>">Archivo_Pdf</a>   </label>
	<div class="col-md-10">
		<?php
      echo form_input('archivopdf',$documento['archivopdf'],array("disabled"=>"disabled",'placeholder'=>'Archivo php','style'=>'width:500px;')); 
 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ordenador:</label>
     	<?php 
	$options= array("NADA");
	foreach ($ordenadores as $row){
		$options[$row->idordenador]= $row->nombre;
	}

	?>
	<div class="col-md-10">
		<?php
			echo form_input('idordenador',$options[$documento['idordenador']],array("disabled"=>"disabled"));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Directorio:</label>
     	<?php 
	$options= array("NADA");
	foreach ($directorios as $row){
		$options[$row->iddirectorio]= $row->ruta;
	}
	?>
	<div class="col-md-10">
		<?php
		echo form_input('iddirectorio',$options[$documento['iddirectorio']],array("disabled"=>"disabled")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estado del documento:</label>
     	<?php 
$options= array("NADA");
foreach ($documento_estados as $row){
	$options[$row->iddocumento_estado]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php


echo form_input('iddocumento_estado',$options[$documento['iddocumento_estado']],array('id'=>'iddocumento_estado', "disabled"=>"disabled", 'style'=>"background-color:yellow;")); 
		?>
	</div> 
</div>




   

<?php echo form_close(); ?>



<script>
var inputval=document.getElementById("iddocumento_estado").value;
if (inputval == "NO CARGADO"){
	document.getElementById("iddocumento_estado").style.backgroundColor="red";
}else{

	document.getElementById("iddocumento_estado").style.backgroundColor="green";
}


function verpdf(){

var orde=document.getElementById("idordenador").innerHTML;
var dire=document.getElementById("iddirectorio").innerHTML;
alert(orde);
alert(dire);
var ordenador = "https://"+orde;
var ubicacion=dire;
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


}




</script>



</body>







</html>
