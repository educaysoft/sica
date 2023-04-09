<?php echo form_open('visitante/save_edit') ?>
<?php echo form_hidden('idvisitante',$visitante['idvisitante']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
     <td>Id visitante</td>
     <td>
        <?php 
	$eys_arrinput=array('name'=>'idvisitante','value'=>$visitante['idvisitante'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?>
     </td>
  </tr> 


<div class="form-group row">
  <label class="col-md-2 col-form-label"> Oficina:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
 echo form_dropdown("iddepartamento",$options,$visitante['iddepartamento']);  
		?>
	</div> 
</div>




<div class="form-group row">
  <label class="col-md-2 col-form-label"> Persona :</label>
	<div class="col-md-10">
		<?php

 
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, $visitante['idpersona']);  


?>
</div>
</div>



<div class="form-group row">
  <label class="col-md-2 col-form-label"> Fecha :</label>
	<div class="col-md-10">
		<?php

	echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"true",  "type"=>"date","value"=>$visitante['fecha']));  
	 
?>
</div>
</div>


<div class="form-group row">
  <label class="col-md-2 col-form-label"> Hora :</label>
	<div class="col-md-10">
		<?php

	echo form_input(array("name"=>"hora","id"=>"hora","readonly"=>"true",  "type"=>"time","value"=>$visitante['hora']));  
	 
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Motivo de visita:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Motivo de la visita",'value'=>$visitante['motivo']);    
 echo form_textarea("motivo", $textarea_options);  

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label"><a href="https://repositorioutlvte.org/firmadigital.php">Ruta firma :</a></label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"rutafirma","id"=>"rutafirma","type"=>"text",'value'=>$visitante['rutafirma']));   

?>
</div>
</div>









<table>
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('visitante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
