<?php echo form_open('indicadorcalidad/save_edit') ?>
<?php echo form_hidden('idindicadorcalidad',$indicadorcalidad['idindicadorcalidad']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id indicadorcalidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idindicadorcalidad',$indicadorcalidad['idindicadorcalidad'],array('placeholder'=>'Idindicadorcalidad')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$indicadorcalidad['nombre'],array('placeholder'=>'Nombre indicadorcalidad')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('indicadorcalidad','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
