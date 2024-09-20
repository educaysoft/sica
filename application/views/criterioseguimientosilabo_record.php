<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('criterioseguimientosilabo/save_edit') ?>
    <ul>
        <li> <?php echo anchor('criterioseguimientosilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('criterioseguimientosilabo/anterior/'.$criterioseguimientosilabo['idcriterioseguimientosilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('criterioseguimientosilabo/siguiente/'.$criterioseguimientosilabo['idcriterioseguimientosilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('criterioseguimientosilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('criterioseguimientosilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('criterioseguimientosilabo/edit/'.$criterioseguimientosilabo['idcriterioseguimientosilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('criterioseguimientosilabo/quitar/'.$criterioseguimientosilabo['idcriterioseguimientosilabo'],'Quitar'); ?></li>
        <li> <?php echo anchor('criterioseguimientosilabo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcriterioseguimientosilabo',$criterioseguimientosilabo['idcriterioseguimientosilabo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idcriterioseguimientosilabo',$criterioseguimientosilabo['idcriterioseguimientosilabo'],array("disabled"=>"disabled",'placeholder'=>'Idcriterioseguimientosilabos')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$criterioseguimientosilabo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
