<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("curso/save") ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del curso:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de curso",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración del curso:</label>
	<div class="col-md-10">
		<?php
 echo form_input("duracion","", array("placeholder"=>"Duracion del  curso"));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Link detalle:</label>
	<div class="col-md-10">
		<?php
 echo form_input("linkdetalle","", array("placeholder"=>"Link de detalle"));
		?>
	</div> 
</div>



</table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("curso","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

