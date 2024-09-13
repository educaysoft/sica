<?php echo form_open('calidadcarrera/save_edit') ?>
<?php echo form_hidden('idcalidadcarrera',$calidadcarrera['idcalidadcarrera']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $calidadcarrera['iddepartamento']);  ?></td>
</tr>

 <tr>
      <td>Nombre:</td>
      <td><?php  
  
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del calidadcarrera" );    
   echo form_textarea('nombre',$calidadcarrera['nombre'],$textarea_options) ?></td>
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
<td> criteriocalidad:</td>
<td><?php
$options= array('--Select--');
foreach ($criteriocalidads as $row){
	$options[$row->idcriteriocalidad]= $row->nombre;
}

 echo form_dropdown("idcriteriocalidad",$options, $calidadcarrera['idcriteriocalidad']);  ?></td>
</tr>

<tr>
<td> subcriteriocalidad:</td>
<td><?php
$options= array('--Select--');
foreach ($subcriteriocalidads as $row){
	$options[$row->idsubcriteriocalidad]= $row->nombre;
}

 echo form_dropdown("idsubcriteriocalidad",$options, $calidadcarrera['idsubcriteriocalidad']);  ?></td>
</tr>


<tr>
<td> indicadorcalidad:</td>
<td><?php
$options= array('--Select--');
foreach ($indicadorcalidads as $row){
	$options[$row->idindicadorcalidad]= $row->nombre;
}

 echo form_dropdown("idindicadorcalidad",$options, $calidadcarrera['idindicadorcalidad']);  ?></td>
</tr>


<tr>
<td> tipocalidad:</td>
<td><?php
$options= array('--Select--');
foreach ($tipocalidads as $row){
	$options[$row->idtipocalidad]= $row->nombre;
}

 echo form_dropdown("idtipocalidad",$options, $calidadcarrera['idtipocalidad']);  ?></td>
</tr>



<tr>
      <td>Codigo:</td>
      <td><?php echo form_input('codigo',$calidadcarrera['codigo'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('calidadcarrera','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
