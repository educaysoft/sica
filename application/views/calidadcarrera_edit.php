<?php echo form_open('calidadcarrera/save_edit') ?>
<?php echo form_hidden('idcalidadcarrera',$calidadcarrera['idcalidadcarrera']) ?>
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

 echo form_dropdown("idinstitucion",$options, $calidadcarrera['idinstitucion']);  ?></td>
</tr>

 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$calidadcarrera['nombre'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del calidadcarrera" );    
      echo form_textarea('detalle',$calidadcarrera['detalle'],$textarea_options) ?></td>
  </tr>

    <td>Archivo:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del calidadcarrera" );    
      echo form_textarea('archivo',$calidadcarrera['archivo'],$textarea_options) ?></td>
  </tr>








<tr>
<td> proceso:</td>
<td><?php
$options= array('--Select--');
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

 echo form_dropdown("idproceso",$options, $calidadcarrera['idproceso']);  ?></td>
</tr>

<tr>
      <td>Orden:</td>
      <td><?php echo form_input('orden',$calidadcarrera['orden'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('calidadcarrera','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
