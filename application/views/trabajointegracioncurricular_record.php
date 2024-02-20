<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?><idem style="font-size:large" id="idtrabajointegracioncurricular"><?php echo $trabajointegracioncurricular['idtrabajointegracioncurricular']; ?></idem></h3>
	    <ul>
<?php
if(isset($trabajointegracioncurricular))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if($row["modulo"]["id"]==16) //modulo trabajointegracioncurricular
			{
				$numero=$j; //el inidice del arreglo donde estan los permisos
				$permitir=1; //indicador de que si se encontro permisos
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}


?>

        <li> <?php echo anchor('trabajointegracioncurricular/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('trabajointegracioncurricular/siguiente/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'siguiente'); ?></li>
        <li> <?php echo anchor('trabajointegracioncurricular/anterior/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('trabajointegracioncurricular/elultimo/', 'Último'); ?></li>
	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('trabajointegracioncurricular/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>

        <li> <?php echo anchor('trabajointegracioncurricular/edit/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'],'Edit'); ?></li>
	<?php } ?>

	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>

        <li style="border-right:1px solid green"> <?php echo anchor('trabajointegracioncurricular/delete/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'],'Delete'); ?></li>
	<?php } ?>
	
	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
		<li> <?php echo anchor('trabajointegracioncurricular/listar/','Listar'); ?></li>
	<?php } ?>



        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
		<li> <?php echo anchor('trabajointegracioncurricular/reportepdf/'.$trabajointegracioncurricular['idtipodocu'],'reportepdf'); ?></li>


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


<?php echo form_open('trabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('idtrabajointegracioncurricular',$trabajointegracioncurricular['idtrabajointegracioncurricular']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipodocu/elprimero/', 'Tipo trabajointegracioncurricular'); ?> :</label>
     	<?php 
	$options= array("NADA");
	foreach ($tipodocus as $row){
		$options[$row->idtipodocu]= $row->descripcion;
	}
	$arrdatos=array('name'=>'idtipodocu','value'=>$options[$trabajointegracioncurricular['idtipodocu']],"disabled"=>"disabled","style"=>"width:500px");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos) 
		?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('destinotrabajointegracioncurricular/elprimero/', 'Destino trabajointegracioncurricular'); ?> :</label>
     	<?php 
	$options= array("NADA");
	foreach ($destinotrabajointegracioncurriculars as $row){
		$options[$row->iddestinotrabajointegracioncurricular]= $row->nombre;
	}
	$arrdatos=array('name'=>'iddestinotrabajointegracioncurricular','value'=>$options[$trabajointegracioncurricular['iddestinotrabajointegracioncurricular']],"disabled"=>"disabled","style"=>"width:500px");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechaelaboracion',$trabajointegracioncurricular['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de subida:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechasubida',$trabajointegracioncurricular['fechasubida'],array('type'=>'date','placeholder'=>'fecha de carga','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('emisor/add/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'Emisor/emisores:') ?> </label>
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
    <label class="col-md-2 col-form-label"> <?php echo anchor('destinatario/add/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'Destinatarios/as:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($destinatarios as $row){
		$options[$row->idpersona]=$row->eldestinatario;
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
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('asunto',$trabajointegracioncurricular['asunto'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('descripcion',$trabajointegracioncurricular['descripcion'],$textarea_options); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <a href="<?php echo base_url(); ?>index.php/trabajointegracioncurricular/show_pdf/<?php echo $trabajointegracioncurricular['idtrabajointegracioncurricular']; ?>">Archivo_Pdf</a>   </label>
	<div class="col-md-10">
		<?php
      echo form_input('archivopdf',$trabajointegracioncurricular['archivopdf'],array("id"=>"archivopdf","disabled"=>"disabled",'placeholder'=>'Archivo php','style'=>'width:500px;')); 
 
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
			echo form_input('idordenador',$options[$trabajointegracioncurricular['idordenador']],array("id"=>"idordenador","disabled"=>"disabled"));
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
		echo form_input('iddirectorio',$options[$trabajointegracioncurricular['iddirectorio']],array("id"=>"iddirectorio", "disabled"=>"disabled")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estado del trabajointegracioncurricular:</label>
     	<?php 
$options= array("NADA");
foreach ($trabajointegracioncurricular_estados as $row){
	$options[$row->idtrabajointegracioncurricular_estado]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php


echo form_input('idtrabajointegracioncurricular_estado',$options[$trabajointegracioncurricular['idtrabajointegracioncurricular_estado']],array('id'=>'idtrabajointegracioncurricular_estado', "disabled"=>"disabled", 'style'=>"background-color:yellow;")); 
		?>
	</div> 
</div>




   

<?php echo form_close(); ?>



<script>
var inputval=document.getElementById("idtrabajointegracioncurricular_estado").value;
if (inputval == "NO CARGADO"){
	document.getElementById("idtrabajointegracioncurricular_estado").style.backgroundColor="red";
}else{

	document.getElementById("idtrabajointegracioncurricular_estado").style.backgroundColor="green";
}


function verpdf(){

var orde=document.getElementById("idordenador").value;
var dire=document.getElementById("iddirectorio").value;
var ordenador = "https://"+orde;
var ubicacion=dire;
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archi=document.getElementById("archivopdf").value;
var archivo =archi;
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


}





</script>



</body>







</html>
