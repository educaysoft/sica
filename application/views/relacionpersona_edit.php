<?php echo form_open('relacionpersona/save_edit') ?>
<?php echo form_hidden('idrelacionpersona',$relacionpersona['idrelacionpersona']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id relacionpersona</td>
     <td><?php 


$eys_arrinput=array('name'=>'idrelacionpersona','value'=>$relacionpersona['idrelacionpersona'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $relacionpersona['idpersona']);  ?></td>
</tr>






<tr>
<td> Estado del relacionpersona:</td>
<td><?php
$options= array('--Select--');
foreach ($tiporelacionpersonas as $row){
	$options[$row->idtiporelacionpersona]= $row->nombre;
}

 echo form_dropdown("idtiporelacionpersona",$options, $relacionpersona['idtiporelacionpersona']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('relacionpersona','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
