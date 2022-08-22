<?php echo form_open('tema/save_edit') ?>
<?php echo form_hidden('idtema',$tema['idtema']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombrecorto','value'=>$tema['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombrelargo','value'=>$tema['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad silabo:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]= $row->nombre;
}

 echo form_dropdown("idunidadsilabo",$options, $tema['idunidadsilabo']);  
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Video tutorial:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($videotutoriales as $row){
	$options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial",$options, $tema['idvideotutorial']);  
		?>
	</div> 
</div>


 








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tema','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
