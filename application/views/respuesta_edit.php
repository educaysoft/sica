<?php echo form_open('respuesta/save_edit') ?>
<?php echo form_hidden('idrespuesta',$respuesta['idrespuesta']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

 	<tr>
	<td> Pregunta:</td>
	<td><?php
		$options= array('--Select--');
		foreach ($preguntas as $row){
			$options[$row->idpregunta]= $row->pregunta;
		}
 	echo form_dropdown("idpregunta",$options, $respuesta['idpregunta']);  ?></td>
	</tr>
  
  <tr>
      <td>Respuesta :</td>

<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('respuesta',$respuesta['respuesta'],$textarea_options);
       ?></td>
  </tr>


<tr>
	<td> Acierto:</td>
	<td><?php
		$options= array(1=>'Verdadero',0=>'Falso');
 	echo form_dropdown("acierto",$options, $respuesta['acierto']);  ?></td>
	</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('respuesta','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
