<?php echo form_open('asignatura/save_edit') ?>
<?php echo form_hidden('idasignatura',$asignatura['idasignatura']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$asignatura['nombre'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>

<tr>
      <td>Codigo:</td>
      <td><?php echo form_input('codigo',$asignatura['codigo'],array('placeholder'=>'Nombre Institucion')) ?></td>
  </tr>



<tr>
      <td>Creditos:</td>
      <td><?php echo form_input('creditos',$asignatura['creditos'],array('placeholder'=>'creditos de la asignatura')) ?></td>
  </tr>

<tr>
<td> Malla:</td>
<td><?php
$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]= $row->nombrecorto;
}

 echo form_dropdown("idmalla",$options, $asignatura['idmalla']);  ?></td>
</tr>



<tr>
<td> Área conocimiento:</td>
<td><?php
$options= array('--Select--');
foreach ($areaconocimientos as $row){
	$options[$row->idareaconocimiento]= $row->nombre;
}

 echo form_dropdown("idareaconocimiento",$options, $asignatura['idareaconocimiento']);  ?></td>
</tr>





<tr>
<td> Nivel:</td>
<td><?php
$options= array('--Select--');
foreach ($nivelacademicos as $row){
	$options[$row->idnivelacademico]= $row->nombre;
}
 echo form_dropdown("idnivelacademico",$options, $asignatura['idnivelacademico']);  ?></td>
</tr>


<tr>
  <td>Contenidos mínimos:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('contenidosminimos',$asignatura['contenidosminimos'],$textarea_options ); ?></td>
 </tr>

<tr>
  <td>Resultados de aprendizaje:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('resultadosaprendizaje',$asignatura['resultadosaprendizaje'],$textarea_options ); ?></td>
 </tr>




 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('asignatura','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
