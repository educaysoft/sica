<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('valorcriterioseguimientosilabo/save_edit') ?>
    <ul>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/anterior/'.$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/siguiente/'.$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('valorcriterioseguimientosilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/edit/'.$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('valorcriterioseguimientosilabo/quitar/'.$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'],'Quitar'); ?></li>
        <li> <?php echo anchor('valorcriterioseguimientosilabo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idvalorcriterioseguimientosilabo',$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idvalorcriterioseguimientosilabo',$valorcriterioseguimientosilabo['idvalorcriterioseguimientosilabo'],array("disabled"=>"disabled",'placeholder'=>'Idvalorcriterioseguimientosilabos')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$valorcriterioseguimientosilabo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
