<?php echo form_open('reactivo/save_edit') ?>
<?php echo form_hidden('idreactivo',$reactivo['idreactivo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>




 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$reactivo['nombre'],array('placeholder'=>'Nombre Institucion','style'=>'width:500px;')) ?></td>
  </tr>
 <tr>
      <td>Detalle:</td>
      <td><?php

					$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:100%;height:100px;', "placeholder"=>"Detalle",'id'=>'detalle' );
					echo form_textarea("detalle",$reactivo['detalle'],$textarea_options);
	?></td>

  </tr>
 

<tr>
<td> Asignatura:</td>
<td><?php
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

 echo form_dropdown("idasignatura",$options, $reactivo['idasignatura']);  ?></td>
</tr>


<tr>
      <td>Fecha:</td>
      <td><?php echo form_input(array('name'=>'fecha',"id"=>'fecha',"value"=>$reactivo['fecha'],'type'=>'date','placeholder'=>'fecha')) ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('reactivo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>


<script>
	$(document).ready(()=>{


	 tinymce.init({
		 selector:'#detalle',
		 height:300

	});
 
	});     

</script>


