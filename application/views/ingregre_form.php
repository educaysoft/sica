<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("ingregre/save") ?>
<?php echo form_hidden("idingregre")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha: </td>
<td><?php echo form_input("fechaingregre","", array("type"=>"date","placeholder"=>"fecha del ingregre"))  ?></td>
</tr>


<tr>
<td> valor: </td>
<td><?php echo form_input("valor","", array("placeholder"=>"valor del ingregre"))  ?></td>
</tr>

<tr>
<td> Institucion: </td>
<td><?php 

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Tipo Ingr-Egre: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipoingregres as $row){
	$options[$row->idtipoingregre]= $row->nombre;
}

 echo form_dropdown("idtipoingregre",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Detalle: </td>

<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del ingreso o egreso" );    
?>

 <td><?php echo form_textarea("detalle","", $textarea_options); ?></td>


</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("ingregre","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

