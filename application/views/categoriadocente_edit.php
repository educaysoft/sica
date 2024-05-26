<?php echo form_open('categoriadocente/save_edit') ?>
<?php echo form_hidden('idcategoriadocente',$categoriadocente['idcategoriadocente']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id categoriadocente:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idcategoriadocente',$categoriadocente['idcategoriadocente'],array('placeholder'=>'Idcategoriadocente')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$categoriadocente['nombre'],array('placeholder'=>'Nombre categoriadocente')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('categoriadocente','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
