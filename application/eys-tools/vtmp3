<?php echo form_open('sexo/save_edit') ?>
<?php echo form_hidden('idsexo',$sexo['idsexo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id sexo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idsexo',$sexo['idsexo'],array('placeholder'=>'Idsexo')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$sexo['nombre'],array('placeholder'=>'Nombre sexo')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('sexo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
