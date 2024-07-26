<?php echo form_open('formatoinstitucional/save_edit') ?>
<?php echo form_hidden('idformatoinstitucional',$formatoinstitucional['idformatoinstitucional']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $formatoinstitucional['idinstitucion']);  ?></td>
</tr>

 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$formatoinstitucional['nombre'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del formatoinstitucional" );    
      echo form_textarea('detalle',$formatoinstitucional['detalle'],$textarea_options) ?></td>
  </tr>

    <td>Archivo:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del formatoinstitucional" );    
      echo form_textarea('archivo',$formatoinstitucional['archivo'],$textarea_options) ?></td>
  </tr>








<tr>
<td> proceso:</td>
<td><?php
$options= array('--Select--');
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

 echo form_dropdown("idproceso",$options, $formatoinstitucional['idproceso']);  ?></td>
</tr>

<tr>
      <td>Orden:</td>
      <td><?php echo form_input('orden',$formatoinstitucional['orden'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('formatoinstitucional','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
