<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("contabilidad/save") ?>
<?php echo form_hidden("idcontabilidad")  ?>
<table>


<tr>
<td> Beneficiario: </td>
<td><?php 

$options= array('--Select--');
foreach ($beneficiarios as $row){
	$options[$row->idbeneficiario]= $row->elbeneficiario;
}

 echo form_dropdown("idbeneficiario",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Fecha: </td>
<td><?php echo form_input(array("name"=>"fechacontabilidad","id"=>"fechacontabilidad","type"=>"date","placeholder"=>"fecha del contabilidad"));  ?></td>
</tr>


<tr>
<td> valor: </td>
<td><?php echo form_input("valor","", array("placeholder"=>"valor del contabilidad"))  ?></td>
</tr>

<tr>
<td> Institucion: </td>
<td><?php 

$options= array('--Select--');
foreach ($pagadores as $row){
	$options[$row->idpagador]= $row->elpagador;
}

 echo form_dropdown("idpagador",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Detalle: </td>

<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del ingreso o egreso" );    
?>

 <td><?php echo form_textarea("detalle","", $textarea_options); ?></td>


</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("contabilidad","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

