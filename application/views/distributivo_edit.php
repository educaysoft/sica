<?php echo form_open('distributivo/save_edit') ?>
<?php echo form_hidden('iddistributivo',$distributivo['iddistributivo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
 






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Institución:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $distributivo['idinstitucion']);  
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $distributivo['idperiodoacademico']);  
		?>
	</div> 
</div>


 








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('distributivo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
