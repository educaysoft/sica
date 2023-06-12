<?php echo form_open('proceso/save_edit') ?>
<?php echo form_hidden('idproceso',$proceso['idproceso']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$proceso['nombre'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del proceso" );    
      echo form_textarea('detalle',$proceso['detalle'],$textarea_options) ?></td>
  </tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $proceso['idinstitucion']);  ?></td>
</tr>

<tr>
<td> Solicitante:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $proceso['idpersona']);  ?></td>
</tr>


<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $proceso['iddocumento']);  ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('proceso','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
