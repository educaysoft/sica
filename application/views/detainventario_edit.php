<?php echo form_open('detainventario/save_edit') ?>
<?php echo form_hidden('iddetainventario',$detainventario['iddetainventario']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id detainventario</td>
     <td><?php 


$eys_arrinput=array('name'=>'iddetainventario','value'=>$detainventario['iddetainventario'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $detainventario['idpersona']);  ?></td>
</tr>

<tr>
<td> Operadora:</td>
<td><?php
$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, $detainventario['idarticulo']);  ?></td>
</tr>

<tr>
      <td>Número:</td>
      <td><?php echo form_input( array("name"=>'numero',"id"=>'numero',"value"=>$detainventario['numero'],'type'=>'text','placeholder'=>'numero')); ?></td>
  </tr>


<tr>
<td> Estado del detainventario:</td>
<td><?php
$options= array('--Select--');
foreach ($inventarios as $row){
	$options[$row->idinventario]= $row->nombre;
}

 echo form_dropdown("idinventario",$options, $detainventario['idinventario']);  ?></td>
</tr>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('detainventario','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
