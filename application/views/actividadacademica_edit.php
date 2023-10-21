<?php echo form_open('actividadacademica/save_edit') ?>
<?php echo form_hidden('idactividadacademica',$actividadacademica['idactividadacademica']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id actividadacademica</td>
     <td><?php 


$eys_arrinput=array('name'=>'idactividadacademica','value'=>$actividadacademica['idactividadacademica'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 

<tr>
<td> Topo de horas:</td>
<td><?php
$options= array('--Select--');
foreach ($tipoactividadacademicas as $row){
	$options[$row->idtipoactividadacademica]= $row->nombre;
}

 echo form_dropdown("idtipoactividadacademica",$options, $actividadacademica['idtipoactividadacademica']);  ?></td>
</tr>

<tr>
      <td>Nombre:</td>
	<?php $textarea_options = array('name' => 'nombre','value' => $actividadacademica['nombre'], 'style'=> 'width:500px;'); ?>    
      <td><?php echo form_textarea($textarea_options);    ?></td>
  </tr>

<tr>
      <td>Nombre:</td>
<?php $textarea_options = array('name' => 'item','value' => $actividadacademica['item'], 'style'=> 'width:500px;'); ?>    
      <td><?php echo form_input($textarea_options);    ?></td>
  </tr>


<tr>
      <td>Dirección web:</td>

<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;',"name"=>'url',"id"=>'url',"value"=>$actividadacademica['url'],); ?>    
      <td><?php echo form_textarea($textarea_options); ?></td>
  </tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('actividadacademica','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
