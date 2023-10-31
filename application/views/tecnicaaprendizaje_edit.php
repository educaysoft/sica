<?php echo form_open('tecnicaaprendizaje/save_edit') ?>
<?php echo form_hidden('idtecnicaaprendizaje',$tecnicaaprendizaje['idtecnicaaprendizaje']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id tecnicaaprendizaje</td>
     <td><?php 


$eys_arrinput=array('name'=>'idtecnicaaprendizaje','value'=>$tecnicaaprendizaje['idtecnicaaprendizaje'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
  <tr>
      <td>Nombre:</td>
      <td><?php
 
$eys_arrinput=array('name'=>'nombre','value'=>$tecnicaaprendizaje['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
  <td>Descripcion:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion","id" =>"descripcion");    
echo form_textarea('descripcion',$tecnicaaprendizaje['descripcion'],$textarea_options ); ?></td>
</tr>



<tr>
<td> Metodo aprendizaje:</td>
<td><?php
$options= array('--Select--');
foreach ($metodoaprendizaje as $row){
	$options[$row->idmetodoaprendizaje]= $row->nombre;
}

 echo form_dropdown("idmetodoaprendizaje",$options, $tecnicaaprendizaje['idmetodoaprendizaje'],array('id'=>'idmetodoaprendizaje'));  ?></td>
</tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('tecnicaaprendizaje','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
