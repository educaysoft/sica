<?php echo form_open('valorcriterioseguimientosilabo/save_edit') ?>
<?php echo form_hidden('idvalorcriterioseguimientosilabo',$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id valorcriterioseguimientosilabo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvalorcriterioseguimientosilabo',$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'],array('placeholder'=>'Idvalorcriterioseguimientosilabo')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$valorcriterioseguimientosilabo['nombre'],array('placeholder'=>'Nombre valorcriterioseguimientosilabo')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('valorcriterioseguimientosilabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
