<?php echo form_open('criteriocalidad/save_edit') ?>
<?php echo form_hidden('idcriteriocalidad',$criteriocalidad['idcriteriocalidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id criteriocalidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idcriteriocalidad',$criteriocalidad['idcriteriocalidad'],array('placeholder'=>'Idcriteriocalidad')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$criteriocalidad['nombre'],array('placeholder'=>'Nombre criteriocalidad')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('criteriocalidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
