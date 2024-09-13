<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipocalidad/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipocalidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipocalidad/anterior/'.$tipocalidad['idtipocalidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipocalidad/siguiente/'.$tipocalidad['idtipocalidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipocalidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipocalidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipocalidad/edit/'.$tipocalidad['idtipocalidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipocalidad/quitar/'.$tipocalidad['idtipocalidad'],'Quitar'); ?></li>
        <li> <?php echo anchor('tipocalidad/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipocalidad',$tipocalidad['idtipocalidad']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idtipocalidad',$tipocalidad['idtipocalidad'],array("disabled"=>"disabled",'placeholder'=>'Idtipocalidads')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$tipocalidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
