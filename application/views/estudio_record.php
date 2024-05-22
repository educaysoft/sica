<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudio))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("evento"==$row["modulo"]["nombre"]);
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}
?>
   <li> <?php echo anchor('estudio/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('estudio/anterior/'.$estudio['idestudio'], 'anterior'); ?></li>
   <li> <?php echo anchor('estudio/siguiente/'.$estudio['idestudio'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('estudio/elultimo/', 'Último'); ?></li>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>
        <li> <?php echo anchor('estudio/edit/'.$estudio['idestudio'],'Edit'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('estudio/delete/'.$estudio['idestudio'],'Delete'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li> <?php echo anchor('estudio/listar/','Listar'); ?></li>
	<?php } ?>


<?php 
}else{
?>

        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudio/save_edit') ?>
<?php echo form_hidden('idestudio',$estudio['idestudio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Estudio: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idestudio',$estudio['idestudio'],array("disabled"=>"disabled",'placeholder'=>'Idestudios'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Persona: </label>
     	<?php 
	$options= array("NADA");
	foreach ($personas as $row){
		$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
	}
?>
	<div class="col-md-10">
     	<?php 
	echo form_input('idpersona',$options[$estudio['idpersona']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Institución: </label>
     	<?php 
	$options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
     	<?php 
    echo form_input('idinstitucion',$options[$estudio['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:600px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nivel estudio: </label>
     	<?php 
    $options= array("NADA");
    foreach ($nivelestudios as $row){
	      $options[$row->idnivelestudio]= $row->nombre;
    }
?>
	<div class="col-md-10">
     	<?php 
    echo form_input('idnivelestudio',$options[$estudio['idnivelestudio']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



  



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo: </label>
	<div class="col-md-10">
     	<?php 
       echo form_input('titulo',$estudio['titulo'],array("disabled"=>"disabled",'type'=>'text','placeholder'=>'Titulo obtenido','style'=>'width:600px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de registro: </label>
	<div class="col-md-10">
     	<?php 
      		 echo form_input('fecharegistro',$estudio['fecharegistro'],array("disabled"=>"disabled",'type'=>'date','placeholder'=>'Titulo obtenido','style'=>'width:600px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número registro: </label>
	<div class="col-md-10">
     	<?php 
 	      echo form_input('numeroregistro',$estudio['numeroregistro'],array("disabled"=>"disabled",'type'=>'text','placeholder'=>'Titulo obtenido','style'=>'width:500px;'));
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('pertinencia/add/'.$estudio['idestudio'], 'Pertinencia:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($pertinencias as $row){
		$options[$row->idestudio]=$row->eldepartamento;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idpertinencia[]',$options,(array)set_value('idpertinencia', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Campo detallado: </label>
	<div class="col-md-10">
     	<?php 
       echo form_input('campodetallado',$estudio['campodetallado'],array("disabled"=>"disabled",'type'=>'text','placeholder'=>'Titulo obtenido','style'=>'width:600px;')); 
		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
