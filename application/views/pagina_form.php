<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("pagina/save") ?>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de pagina",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ruta:</label>
	<div class="col-md-10">
		<?php
 echo form_input("ruta","", array("placeholder"=>"Ruta de la pagina",'style'=>'width:500px;'));
		?>
	</div> 
</div>
<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("pagina","Atras") ?> </td>
</tr>
</table>
<?php echo form_close();?>

