<?php echo form_open('prestamoarticulo/save_edit') ?>
<?php echo form_hidden('idprestamoarticulo',$prestamoarticulo['idprestamoarticulo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id prestamoarticulo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idprestamoarticulo','value'=>$prestamoarticulo['idprestamoarticulo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
<td> Articulo:</td>
<td><?php
$options= array('--Select--');
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

 echo form_dropdown("idarticulo",$options, $prestamoarticulo['idarticulo']);  ?></td>
</tr>


<tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $prestamoarticulo['idpersona']);  ?></td>
</tr>




 <tr>
      <td>Fecha prestamo :</td>
      <td><?php echo form_input( array("name"=>'fechaprestamo',"id"=>'fechaprestamo',"value"=>$prestamoarticulo['fechaprestamo'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
     <td>Hora prestamo:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'horaprestamo','id'=>'horaprestamo',"type"=>"time",'value'=>$prestamoarticulo['horaprestamo'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>




 <tr>
      <td>Fecha devolucion :</td>
      <td><?php echo form_input( array("name"=>'fechadevolucion',"id"=>'fechadevolucion',"value"=>$prestamoarticulo['fechadevolucion'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
     <td>Hora devolucion:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'horadevolucion','id'=>'horadevolucion',"type"=>"time",'value'=>$prestamoarticulo['horadevolucion'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>




<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle","id" =>"detalle");    
echo form_textarea('detalle',$prestamoarticulo['detalle'],$textarea_options ); ?></td>
 </tr>




















 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('prestamoarticulo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
