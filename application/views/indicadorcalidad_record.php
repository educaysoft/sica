<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('indicadorcalidad/save_edit') ?>
    <ul>
        <li> <?php echo anchor('indicadorcalidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('indicadorcalidad/anterior/'.$indicadorcalidad['idindicadorcalidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('indicadorcalidad/siguiente/'.$indicadorcalidad['idindicadorcalidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('indicadorcalidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('indicadorcalidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('indicadorcalidad/edit/'.$indicadorcalidad['idindicadorcalidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('indicadorcalidad/quitar/'.$indicadorcalidad['idindicadorcalidad'],'Quitar'); ?></li>
        <li> <?php echo anchor('indicadorcalidad/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idindicadorcalidad',$indicadorcalidad['idindicadorcalidad']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idindicadorcalidad',$indicadorcalidad['idindicadorcalidad'],array("disabled"=>"disabled",'placeholder'=>'Idindicadorcalidads')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$indicadorcalidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
