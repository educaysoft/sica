<?php echo form_open('visitante/save_edit2'); ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
  <label class="col-md-2 col-form-label">Id Visita :</label>
	<div class="col-md-10">
		<?php
	$eys_arrinput=array('name'=>'idvisitante','value'=>$visitante['idvisitante'],'id'=>'idvisitante','readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
		?>
	</div> 
</div>

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
  <label class="col-md-2 col-form-label"> Funcionario :</label>
	<div class="col-md-10">
		<?php

 
$options= array('--Select--');
foreach ($funcionarios as $row){
	$options[$row->idfuncionario]= $row->elfuncionario;
}

 echo form_dropdown("idfuncionario",$options, $visitante['idfuncionario']);  


?>
</div>
</div>




<div class="form-group row">
  <label class="col-md-2 col-form-label"> Persona :</label>
	<div class="col-md-10">
		<?php

 
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona.":". $row->apellidos." ".$row->nombres]= $row->apellidos." ".$row->nombres;
	if($row->idpersona==$visitante['idpersona'])
	{
		$indice=$row->idpersona.":". $row->apellidos." ".$row->nombres;
	}
}

 echo form_dropdown("idpersona",$options, $indice,array('id'=>'idpersona'));  


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
    
$textarea_options = array('class' => 'form-control','rows' => '4','id'=>'motivo','cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Motivo de la visita");    
 echo form_textarea("motivo",$visitante['motivo'], $textarea_options);  

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Ruta firma</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"rutafirma","id"=>"rutafirma","type"=>"text",'value'=>$visitante['rutafirma'],"style"=>"width:600px"));   
?>
</div>
</div>









<table>
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('visitante','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>


 <script>

 function  firmar()
 {
   idvisitante=document.getElementById('idvisitante').value;
   motivo =document.getElementById('motivo').value;   
   idpersona =document.getElementById('idpersona').value;   
   fecha =document.getElementById('fecha').value;   

//window.location.href="https://repositorioutlvte.org/firmadigital.php?idvisitante="+idvisitante+"&motivo='"+motivo+"'";
	window.location.href="https://repositorioutlvte.org/firmadigital.php?idpersona="+idpersona+"&motivo="+motivo+"&fecha="+fecha+"&idvisitante="+idvisitante;

 }



</script>
