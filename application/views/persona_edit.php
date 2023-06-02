<?php echo form_open('persona/save_edit') ?>
<?php echo form_hidden('idpersona',$persona['idpersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
$eys_arrinput=array('name'=>'idpersona','value'=>$persona['idpersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo persona:</label>
	<div class="col-md-10">
	<?php
$options= array('--Select--');
foreach ($tipopersonas as $row){
	$options[$row->idtipopersona]= $row->nombre;
}
 echo form_dropdown("idtipopersona",$options, $persona['idtipopersona']);  
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cedula:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'cedula','value'=>$persona['cedula'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombres:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'nombres','value'=>$persona['nombres'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Apellidos:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'apellidos','value'=>$persona['apellidos'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha nacimiento:</label>
	<div class="col-md-10">
	<?php
       echo form_input( array("name"=>'fechanacimiento',"id"=>'fechanacimiento',"value"=>$persona['fechanacimiento'],'type'=>'date','placeholder'=>'fechanacimiento')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Archivo de foto:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'foto','value'=>$persona['foto'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Sexo:</label>
	<div class="col-md-10">
	<?php
$options= array('--Select--');
foreach ($sexos as $row){
	$options[$row->idsexo]= $row->nombre;
}
 echo form_dropdown("idsexo",$options, $persona['idsexo']);  
	?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('pais/add', 'Pais resicencia:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($paispersonas as $row){
		$options[$row->idpaispersona]=$row->elpais;
	}
 echo form_multiselect('paispersona[]',$options,(array)set_value('idpaispersona', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>



<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('persona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
