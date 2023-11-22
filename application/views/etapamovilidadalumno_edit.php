<?php echo form_open('etapamovilidadalumno/save_edit') ?>
<?php echo form_hidden('idetapamovilidadalumno',$etapamovilidadalumno['idetapamovilidadalumno']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id etapamovilidadalumno</td>
     <td><?php 


$eys_arrinput=array('name'=>'idetapamovilidadalumno','value'=>$etapamovilidadalumno['idetapamovilidadalumno'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Movilidad:</td>
<td><?php
$options= array('--Select--');
foreach ($movilidadalumnos as $row){
	$options[$row->idmovilidadalumno]= $row->lapersona;
}

 echo form_dropdown("idmovilidadalumno",$options, $etapamovilidadalumno['idmovilidadalumno']);  ?></td>
</tr>

<tr>
<td> Etapa:</td>
<td><?php
$options= array('--Select--');
foreach ($etapamovilidads as $row){
	$options[$row->idetapamovilidad]= $row->nombre;
}

 echo form_dropdown("idetapamovilidad",$options, $etapamovilidadalumno['idetapamovilidad']);  ?></td>
</tr>

<tr>
      <td>Fecha :</td>
      <td><?php echo form_input( array("name"=>'fecha',"id"=>'fecha',"value"=>$etapamovilidadalumno['fecha'],'placeholder'=>'fecha',"type"=>"date")); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('etapamovilidadalumno','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
