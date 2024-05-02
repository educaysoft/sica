<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("sexo/save") ?>
<?php echo form_hidden("idsexo")  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
<?php echo form_input("nombre","", array("placeholder"=>"Descripcion de sexo"));  ?>

	</div> 
</div> 


<div class="form-group row">
colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("sexo","Atras") ?>

</div> 


<?php echo form_close();?>

