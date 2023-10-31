<?php echo form_open('miembroareaacademica/save_edit') ?>
<?php echo form_hidden('idmiembroareaacademica',$miembroareaacademica['idmiembroareaacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id miembroareaacademica</td>
     <td><?php 


$eys_arrinput=array('name'=>'idmiembroareaacademica','value'=>$miembroareaacademica['idmiembroareaacademica'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $miembroareaacademica['idpersona']);  ?></td>
</tr>

<tr>
<td> Institucion:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicoes as $row){
	$options[$row->idperiodoacademico]= $row->nombre;
}

 echo form_dropdown("idperiodoacademico",$options, $miembroareaacademica['idperiodoacademico']);  ?></td>
</tr>

<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input( array("name"=>'fechainscripcion',"id"=>'fechainscripcion',"value"=>$miembroareaacademica['fechainscripcion'],'type'=>'date','placeholder'=>'fechainscripcion')); ?></td>
  </tr>

 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('miembroareaacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
