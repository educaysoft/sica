<?php echo form_open('subcriteriocalidad/save_edit') ?>
<?php echo form_hidden('idsubcriteriocalidad',$subcriteriocalidad['idsubcriteriocalidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id subcriteriocalidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idsubcriteriocalidad',$subcriteriocalidad['idsubcriteriocalidad'],array('placeholder'=>'Idsubcriteriocalidad')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$subcriteriocalidad['nombre'],array('placeholder'=>'Nombre subcriteriocalidad')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('subcriteriocalidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
