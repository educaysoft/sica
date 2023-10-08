<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($telefono_estado))
{
?>
        <li> <?php echo anchor('telefono_estado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('telefono_estado/siguiente/'.$telefono_estado['idtelefono_estado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('telefono_estado/anterior/'.$telefono_estado['idtelefono_estado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('telefono_estado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('telefono_estado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('telefono_estado/edit/'.$telefono_estado['idtelefono_estado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('telefono_estado/delete/'.$telefono_estado['idtelefono_estado'],'Delete'); ?></li>
        <li> <?php echo anchor('telefono_estado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('telefono_estado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('telefono_estado/save_edit') ?>
<?php echo form_hidden('idtelefono_estado',$telefono_estado['idtelefono_estado']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtelefono_estado',$telefono_estado['idtelefono_estado'],array("disabled"=>"disabled",'placeholder'=>'Idtelefono_estados'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$telefono_estado['nombre'],array('placeholder'=>'Nombre del telefono_estado')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



