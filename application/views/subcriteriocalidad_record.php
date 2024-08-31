<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('subcriteriocalidad/save_edit') ?>
    <ul>
        <li> <?php echo anchor('subcriteriocalidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('subcriteriocalidad/anterior/'.$subcriteriocalidad['idsubcriteriocalidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('subcriteriocalidad/siguiente/'.$subcriteriocalidad['idsubcriteriocalidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('subcriteriocalidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('subcriteriocalidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('subcriteriocalidad/edit/'.$subcriteriocalidad['idsubcriteriocalidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('subcriteriocalidad/quitar/'.$subcriteriocalidad['idsubcriteriocalidad'],'Quitar'); ?></li>
        <li> <?php echo anchor('subcriteriocalidad/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idsubcriteriocalidad',$subcriteriocalidad['idsubcriteriocalidad']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idsubcriteriocalidad',$subcriteriocalidad['idsubcriteriocalidad'],array("disabled"=>"disabled",'placeholder'=>'Idsubcriteriocalidads')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$subcriteriocalidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
