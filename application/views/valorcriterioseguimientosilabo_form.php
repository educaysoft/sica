<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("valorcriterioseguimientosilabo/save", array('id'=>'eys-form')); ?>
<?php echo form_hidden("idvalorcriterioseguimientosilabo");  ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Valorcriterioseguimientosilabo:</label>
	<div class="col-md-10">
<?php echo form_input("idvalorcriterioseguimientosilabo","", array("placeholder"=>"Id valorcriterioseguimientosilabo"));  ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
<?php echo form_input("nombre","", array("placeholder"=>"Descripcion de valorcriterioseguimientosilabo"));  ?>
	</div> 
</div> 

<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('persona', 'Cancelar'); ?></li>
	</ul>
</div>
 


<?php echo form_close();?>

