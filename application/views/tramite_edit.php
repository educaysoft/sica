<?php echo form_open('tramite/save_edit') ?>
<?php echo form_hidden('idtramite',$tramite['idtramite']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$tramite['nombre'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del tramite" );    
      echo form_textarea('detalle',$tramite['detalle'],$textarea_options) ?></td>
  </tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $tramite['idinstitucion']);  ?></td>
</tr>






 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tramite','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
