<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("password/save_edit") ?>
<?php echo form_hidden("idpassword",$password['idpassword'])  ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id password:</label>
	<div class="col-md-10">
	<?php
$eys_arrinput=array('name'=>'idpassword','value'=>$password['idpassword'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Password:</label>
	<div class="col-md-10">
	<?php
$eys_arrinput=array('name'=>'password','value'=>$password['password'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Usuario:</label>
	<div class="col-md-10">
	<?php
$options= array('--Select--');
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

 echo form_dropdown("idusuario",$options,$password['idusuario']);  
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Evento:</label>
	<div class="col-md-10">
	<?php



$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento",$options,$password['idevento']);  
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">OnOff:</label>
	<div class="col-md-10">
	<?php
$eys_arrinput=array('name'=>'onoff','value'=>$password['onoff'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); 
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha On:</label>
	<div class="col-md-10">
	<?php
       echo form_input( array("name"=>'fechaon',"id"=>'fechaon',"value"=>$password['fechaon'],'type'=>'date','placeholder'=>'fechanaon')); 
	?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha Off:</label>
	<div class="col-md-10">
	<?php
       echo form_input( array("name"=>'fechaoff',"id"=>'fechaoff',"value"=>$password['fechaoff'],'type'=>'date','placeholder'=>'fechanaon')); 
	?>
	</div> 
</div>

<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("password","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>
