<?php echo form_open('tipodocumento/save_edit') ?>
<?php echo form_hidden('idtipodocumento',$tipodocumento['idtipodocumento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id tipodocumento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idtipodocumento',$tipodocumento['idtipodocumento'],array('placeholder'=>'Idtipodocumento')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$tipodocumento['nombre'],array('placeholder'=>'Nombre tipodocumento')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tipodocumento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
