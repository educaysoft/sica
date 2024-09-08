<?php echo form_open('tipomodulo/save_edit') ?>
<?php echo form_hidden('idtipomodulo',$tipomodulo['idtipomodulo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id tipomodulo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idtipomodulo',$tipomodulo['idtipomodulo'],array('placeholder'=>'Idtipomodulo')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$tipomodulo['nombre'],array('placeholder'=>'Nombre tipomodulo')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipomodulo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
