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

		<li> <?php echo anchor('distributivodocente/genpagina4/19','generar web'); ?></li>


        
		


<?php 
}else{
?>

        <li> <?php echo anchor('/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('trabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('idtrabajointegracioncurricular',$trabajointegracioncurricular['idtrabajointegracioncurricular']) ?>


 














<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre/TituloAsunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('nombre',$trabajointegracioncurricular['nombre'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resumen:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('resumen',$trabajointegracioncurricular['resumen'],$textarea_options); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('egresado/add/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'egresado/s:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($egresados as $row){
		$options[$row->idegresado]=$row->elegresado;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idegresado[]',$options,(array)set_value('idegresado', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('lector/add/'.$trabajointegracioncurricular['idtrabajointegracioncurricular'], 'Lectores') ?> </label>
     	<?php 
	$options=array();
  	foreach ($lectores as $row){
		$options[$row->idpersona]=$row->ellector;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('idlector[]',$options,(array)set_value('idlector',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('/add', 'Estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($estadotrabajointegracioncurriculars as $row){
	      $options[$row->idestadotrabajointegracioncurricular]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'id','value'=>$options[$trabajointegracioncurricular['idestadotrabajointegracioncurricular']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>

	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechacreacion',$trabajointegracioncurricular['fechacreacion'],array('type'=>'date','placeholder'=>'fechacreacion','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora Creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('horacreacion',$trabajointegracioncurricular['horacreacion'],array('type'=>'date','placeholder'=>'fecha de carga','style'=>'width:500px;')) 
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
