<?php echo form_open('publicacion/save_edit') ?>
<?php echo form_hidden('idpublicacion',$publicacion['idpublicacion']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id publicacion</td>
     <td><?php 


$eys_arrinput=array('name'=>'idpublicacion','value'=>$publicacion['idpublicacion'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 

<tr>
<td> Tipo de publicación:</td>
<td><?php
$options= array('--Select--');
foreach ($tipopublicacions as $row){
	$options[$row->idtipopublicacion]= $row->nombre;
}

 echo form_dropdown("idtipopublicacion",$options, $publicacion['idtipopublicacion']);  ?></td>
</tr>

<tr>
      <td>Titulo:</td>
<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;'); ?>    
      <td><?php echo form_textarea('titulo',$publicacion['titulo'],$textarea_options);    ?></td>
  </tr>

<tr>
      <td>Dirección web:</td>

<?php $textarea_options = array('class' => 'form-control','rows' => '4', 'cols' => '20', 'style'=> 'width:500px;height:100px;',"name"=>'url',"id"=>'url',"value"=>$publicacion['url'],); ?>    
      <td><?php echo form_textarea($textarea_options); ?></td>
  </tr>

<tr>
      <td>Fecha publicacion:</td>
      <td><?php echo form_input( array("name"=>'fechapublicacion',"id"=>'fechapublicacion',"value"=>$publicacion['fechapublicacion'],'type'=>'date','placeholder'=>'fechapublicacion')); ?></td>
  </tr>

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('publicacion','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
