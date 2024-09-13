<?php echo form_open('tipocalidad/save_edit') ?>
<?php echo form_hidden('idtipocalidad',$tipocalidad['idtipocalidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id tipocalidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idtipocalidad',$tipocalidad['idtipocalidad'],array('placeholder'=>'Idtipocalidad')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$tipocalidad['nombre'],array('placeholder'=>'Nombre tipocalidad')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipocalidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
