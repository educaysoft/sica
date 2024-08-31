<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("sexo/save", array('id'=>'eys-form')); ?>
<?php echo form_hidden("idsexo");  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Sexo:</label>
	<div class="col-md-10">
<?php echo form_input("idsexo","", array("placeholder"=>"Id sexo"));  ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
<?php echo form_input("nombre","", array("placeholder"=>"Descripcion de sexo"));  ?>
	</div> 
</div> 

<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('persona', 'Cancelar'); ?></li>
	</ul>
</div>
 


<?php echo form_close();?>

