<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("modulo/save_edit") ?>
<?php echo form_hidden("idmodulo")  ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id modulo:</label>
	<div class="col-md-10">
	<?php
 $eys_arrinput=array('name'=>'idmodulo','value'=>$modulo['idmodulo'], "style"=>"width:500px");
 echo form_input($eys_arrinput); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
 $eys_arrinput=array('name'=>'nombre','value'=>$modulo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modulo:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'modulo','value'=>$modulo['modulo'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Funcion:</label>
	<div class="col-md-10">
	<?php
 $eys_arrinput=array('name'=>'funcion','value'=>$modulo['funcion'], "style"=>"width:500px");
 echo form_input($eys_arrinput); 
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Icono:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'icono','value'=>$modulo['icono'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Inicial:</label>
	<div class="col-md-10">
	<?php
       $eys_arrinput=array('name'=>'inicial','value'=>$modulo['inicial'], "style"=>"width:500px");
      echo form_input($eys_arrinput); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
	<?php


	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion del formatoinstitucional" );    
 echo form_textarea('descripcion',$modulo['descripcion'],$textarea_options) 

?>

	</div> 
</div>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("modulo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

