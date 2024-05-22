<?php echo form_open('afinidadtitulo/save_edit') ?>
<?php echo form_hidden('idafinidadtitulo',$afinidadtitulo['idafinidadtitulo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id afinidadtitulo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idafinidadtitulo',$afinidadtitulo['idafinidadtitulo'],array('placeholder'=>'Idafinidadtitulo')); ?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
       echo form_input('nombre',$afinidadtitulo['nombre'],array('placeholder'=>'Nombre afinidadtitulo')); ?>
	</div> 
</div> 


<table> 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('afinidadtitulo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
