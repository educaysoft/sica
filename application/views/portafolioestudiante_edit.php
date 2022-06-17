<?php echo form_open('portafolioestudiante/save_edit') ?>
<?php echo form_hidden('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id portafolioestudiante</td>
     <td><?php 


$eys_arrinput=array('name'=>'idportafolioestudiante','value'=>$portafolioestudiante['idportafolioestudiante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $portafolioestudiante['idpersona']);  ?></td>
</tr>

<tr>
<td> Operadora:</td>
<td><?php
$options= array('--Select--');
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

 echo form_dropdown("idoperadora",$options, $portafolioestudiante['idoperadora']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input( array("name"=>'numero',"id"=>'numero',"value"=>$portafolioestudiante['numero'],'type'=>'text','placeholder'=>'numero')); ?></td>
  </tr>



<tr>
<td> Documento:</td>
<td><?php
$options= array('--Select--');
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

 echo form_dropdown("iddocumento",$options, $portafolioestudiante['iddocumento']);  ?></td>
</tr>


<tr>
<td> Estado del portafolioestudiante:</td>
<td><?php
$options= array('--Select--');
foreach ($portafolioestudiante_estados as $row){
	$options[$row->idportafolioestudiante_estado]= $row->nombre;
}

 echo form_dropdown("idportafolioestudiante_estado",$options, $portafolioestudiante['idportafolioestudiante_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafolioestudiante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
