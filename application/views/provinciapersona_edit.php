<?php echo form_open('provinciapersona/save_edit') ?>
<?php echo form_hidden('idprovinciapersona',$provinciapersona['idprovinciapersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id provinciapersona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idprovinciapersona','value'=>$provinciapersona['idprovinciapersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $provinciapersona['idpersona']);  ?></td>
</tr>

<tr>
<td> Tipo documento:</td>
<td><?php
$options= array('--Select--');
foreach ($paises as $row){
	$options[$row->idpais]= $row->nombre;
}

 echo form_dropdown("idpais",$options, $provinciapersona['idpais']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechadesde',"id"=>'fechadesde',"value"=>$provinciapersona['fechadesde'],'placeholder'=>'fechadesde',"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('provinciapersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
