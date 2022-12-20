<?php echo form_open('ingregre/save_edit') ?>
<?php echo form_hidden('idingregre',$ingregre['idingregre']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id ingregre</td>
     <td><?php 


$eys_arrinput=array('name'=>'idingregre','value'=>$ingregre['idingregre'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $ingregre['idpersona']);  ?></td>
</tr>

<tr>
<td> Operadora:</td>
<td><?php
$options= array('--Select--');
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

 echo form_dropdown("idoperadora",$options, $ingregre['idoperadora']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input( array("name"=>'numero',"id"=>'numero',"value"=>$ingregre['numero'],'type'=>'text','placeholder'=>'numero')); ?></td>
  </tr>


<tr>
<td> Estado del ingregre:</td>
<td><?php
$options= array('--Select--');
foreach ($ingregre_estados as $row){
	$options[$row->idingregre_estado]= $row->nombre;
}

 echo form_dropdown("idingregre_estado",$options, $ingregre['idingregre_estado']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('ingregre','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
