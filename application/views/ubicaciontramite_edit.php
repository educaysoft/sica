<?php echo form_open('ubicaciontramite/save_edit') ?>
<?php echo form_hidden('idubicaciontramite',$ubicaciontramite['idubicaciontramite']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id ubicaciontramite</td>
     <td><?php 


$eys_arrinput=array('name'=>'idubicaciontramite','value'=>$ubicaciontramite['idubicaciontramite'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
<td> Articulo:</td>
<td><?php
$options= array('--Select--');
foreach ($tramites as $row){
	$options[$row->idtramite]= $row->nombre;
}

 echo form_dropdown("idtramite",$options, $ubicaciontramite['idtramite']);  ?></td>
</tr>


<tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $ubicaciontramite['idpersona']);  ?></td>
</tr>




 <tr>
      <td>Fecha prestamo :</td>
      <td><?php echo form_input( array("name"=>'fecha',"id"=>'fecha',"value"=>$ubicaciontramite['fecha'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
     <td>Hora prestamo:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'hora','id'=>'hora',"type"=>"time",'value'=>$ubicaciontramite['hora'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>




 
 

<tr>
     <td>Hora devolucion:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'horadevolucion','id'=>'horadevolucion',"type"=>"time",'value'=>$ubicaciontramite['horadevolucion'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>




<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle","id" =>"detalle");    
echo form_textarea('detalle',$ubicaciontramite['detalle'],$textarea_options ); ?></td>
 </tr>




















 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('ubicaciontramite','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
