<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tema/save") ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombrecorto","", array("placeholder"=>"Nombre de tema",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombrelargo","", array("placeholder"=>"Nombre de tema",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<tr>
<td> Unidad del silabo: </td>
<td><?php 

$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]= $row->nombre;
}

 echo form_dropdown("idunidadsilabo",$options, set_select('--Select--','default_value'));  ?></td>
</tr>







</table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

