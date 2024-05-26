<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('relaciondependencia/save_edit') ?>
    <ul>
        <li> <?php echo anchor('relaciondependencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('relaciondependencia/anterior/'.$relaciondependencia['idrelaciondependencia'], 'anterior'); ?></li>
        <li> <?php echo anchor('relaciondependencia/siguiente/'.$relaciondependencia['idrelaciondependencia'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('relaciondependencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('relaciondependencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('relaciondependencia/edit/'.$relaciondependencia['idrelaciondependencia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('relaciondependencia/quitar/'.$relaciondependencia['idrelaciondependencia'],'Quitar'); ?></li>
        <li> <?php echo anchor('relaciondependencia/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idrelaciondependencia',$relaciondependencia['idrelaciondependencia']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idrelaciondependencia',$relaciondependencia['idrelaciondependencia'],array("disabled"=>"disabled",'placeholder'=>'Idrelaciondependencias')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$relaciondependencia['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
