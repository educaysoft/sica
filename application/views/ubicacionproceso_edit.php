<?php echo form_open('ubicacionproceso/save_edit') ?>
<?php echo form_hidden('idubicacionproceso',$ubicacionproceso['idubicacionproceso']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id ubicacionproceso</td>
     <td><?php 


$eys_arrinput=array('name'=>'idubicacionproceso','value'=>$ubicacionproceso['idubicacionproceso'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
<td> Articulo:</td>
<td><?php
$options= array('--Select--');
foreach ($procesos as $row){
	$options[$row->idproceso]= $row->nombre;
}

 echo form_dropdown("idproceso",$options, $ubicacionproceso['idproceso']);  ?></td>
</tr>


<tr>
<td> Departamento:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]=$row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $ubicacionproceso['iddepartamento']);  ?></td>
</tr>



<tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $ubicacionproceso['idpersona']);  ?></td>
</tr>




 <tr>
      <td>Fecha ubicacion :</td>
      <td><?php echo form_input( array("name"=>'fecha',"id"=>'fecha',"value"=>$ubicacionproceso['fecha'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
     <td>Hora ubicaicon:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'hora','id'=>'hora',"type"=>"time",'value'=>$ubicacionproceso['hora'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>


<tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($estadoprocesos as $row){
	$options[$row->idestadoproceso]=$row->nombre;
}

 echo form_dropdown("idestadoproceso",$options, $ubicacionproceso['idestadoproceso']);  ?></td>
</tr>

 
 






<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle","id" =>"detalle");    
echo form_textarea('detalle',$ubicacionproceso['detalle'],$textarea_options ); ?></td>
 </tr>




















 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('ubicacionproceso','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
