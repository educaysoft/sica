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
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $prestamoarticulo['idevento']);  ?></td>
</tr>

 
 <tr>
      <td>Fecha :</td>
      <td><?php echo form_input( array("name"=>'fecha',"id"=>'fecha',"value"=>$prestamoarticulo['fecha'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
<td> Tema:</td>
<td><?php
$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}

 echo form_dropdown("idtema",$options, $prestamoarticulo['idtema']);  ?></td>
</tr>






<tr>
  <td>Tema a tratar(nombre largo):</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"tema");    
echo form_textarea('tema',$prestamoarticulo['tema'],$textarea_options ); ?></td>
 </tr>


<tr>
  <td>Tema a tratar(nombre corto):</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"temacorto");    
echo form_textarea('temacorto',$prestamoarticulo['temacorto'],$textarea_options ); ?></td>
 </tr>


<tr>
     <td>Ponderacion:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'ponderacion','value'=>$prestamoarticulo['ponderacion'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>


<tr>
     <td>Hora inicio:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time",'value'=>$prestamoarticulo['horainicio'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>

<tr>
     <td>Hora fin:</td>
     <td><?php 
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time",'value'=>$prestamoarticulo['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); ?></td>
</tr>



<tr>
<td> Modo de evaluacion:</td>
<td><?php
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

 echo form_dropdown("idmodoevaluacion",$options, $prestamoarticulo['idmodoevaluacion']);  ?></td>
</tr>







 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('prestamoarticulo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
