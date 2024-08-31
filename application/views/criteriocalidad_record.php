<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('criteriocalidad/save_edit') ?>
    <ul>
        <li> <?php echo anchor('criteriocalidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('criteriocalidad/anterior/'.$criteriocalidad['idcriteriocalidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('criteriocalidad/siguiente/'.$criteriocalidad['idcriteriocalidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('criteriocalidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('criteriocalidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('criteriocalidad/edit/'.$criteriocalidad['idcriteriocalidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('criteriocalidad/quitar/'.$criteriocalidad['idcriteriocalidad'],'Quitar'); ?></li>
        <li> <?php echo anchor('criteriocalidad/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcriteriocalidad',$criteriocalidad['idcriteriocalidad']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idcriteriocalidad',$criteriocalidad['idcriteriocalidad'],array("disabled"=>"disabled",'placeholder'=>'Idcriteriocalidads')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$criteriocalidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
