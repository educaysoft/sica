<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipomodulo/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipomodulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipomodulo/anterior/'.$tipomodulo['idtipomodulo'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipomodulo/siguiente/'.$tipomodulo['idtipomodulo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipomodulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipomodulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipomodulo/edit/'.$tipomodulo['idtipomodulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipomodulo/quitar/'.$tipomodulo['idtipomodulo'],'Quitar'); ?></li>
        <li> <?php echo anchor('tipomodulo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipomodulo',$tipomodulo['idtipomodulo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idtipomodulo',$tipomodulo['idtipomodulo'],array("disabled"=>"disabled",'placeholder'=>'Idtipomodulos')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$tipomodulo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
