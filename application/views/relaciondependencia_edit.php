<?php echo form_open('relaciondependencia/save_edit') ?>
<?php echo form_hidden('idrelaciondependencia',$relaciondependencia['idrelaciondependencia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id relaciondependencia:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idrelaciondependencia',$relaciondependencia['idrelaciondependencia'],array('placeholder'=>'Idrelaciondependencia')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$relaciondependencia['nombre'],array('placeholder'=>'Nombre relaciondependencia')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('relaciondependencia','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
