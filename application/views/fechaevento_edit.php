<?php echo form_open('fechaevento/save_edit') ?>
<?php echo form_hidden('idfechaevento',$fechaevento['idfechaevento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id fechaevento</td>
     <td><?php 


$eys_arrinput=array('name'=>'idfechaevento','value'=>$fechaevento['idfechaevento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 


<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $fechaevento['idevento']);  ?></td>
</tr>

 
 <tr>
      <td>Fecha :</td>
      <td><?php echo form_input( array("name"=>'fecha,"id"=>'fecha,"value"=>$documento['fecha'],'type'=>'date','placeholder'=>'fecha')); ?></td>
  </tr>
 

<tr>
  <td>Tema a tratar:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"tema");    
echo form_textarea('tema',$documento['tema'],$textarea_options ); ?></td>
 </tr>










 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('fechaevento','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
