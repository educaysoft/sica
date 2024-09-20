<?php echo form_open('criterioseguimientosilabo/save_edit') ?>
<?php echo form_hidden('idcriterioseguimientosilabo',$criterioseguimientosilabo['idcriterioseguimientosilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id criterioseguimientosilabo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idcriterioseguimientosilabo',$criterioseguimientosilabo['idcriterioseguimientosilabo'],array('placeholder'=>'Idcriterioseguimientosilabo')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$criterioseguimientosilabo['nombre'],array('placeholder'=>'Nombre criterioseguimientosilabo')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('criterioseguimientosilabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
