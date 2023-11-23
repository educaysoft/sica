<?php echo form_open('movilidadalumno/save_edit') ?>
<?php echo form_hidden('idmovilidadalumno',$movilidadalumno['idmovilidadalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id movilidadalumno</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmovilidadalumno','value'=>$movilidadalumno['idmovilidadalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $movilidadalumno['idpersona']);  ?></td>
</tr>

<tr>
<td> Desde:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentofuente as $row){
	$options[$row->iddepartamentofuente]= $row->eldepartamento;
}

 echo form_dropdown("iddepartamentofuente",$options, $movilidadalumno['iddepartamentofuente']);  ?></td>
</tr>

<tr>
<td> Hasta:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentodestino as $row){
	$options[$row->iddepartamentodestino]= $row->eldepartamento;
}

 echo form_dropdown("iddepartamentodestino",$options, $movilidadalumno['iddepartamentodestino']);  ?></td>
</tr>


<tr>
<td> Tipo movilidad:</td>
<td><?php
$options= array('--Select--');
foreach ($tipomovilidadalumno as $row){
	$options[$row->idtipomovilidadalumno]= $row->nombre;
}

 echo form_dropdown("idtipomovilidadalumno",$options, $movilidadalumno['idtipomovilidadalumno']);  ?></td>
</tr>






 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('movilidadalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
