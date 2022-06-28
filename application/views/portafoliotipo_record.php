<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($portafoliotipo))
{
?>
        <li> <?php echo anchor('portafoliotipo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafoliotipo/siguiente/'.$portafoliotipo['idportafoliotipo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('portafoliotipo/anterior/'.$portafoliotipo['idportafoliotipo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafoliotipo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafoliotipo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafoliotipo/edit/'.$portafoliotipo['idportafoliotipo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafoliotipo/delete/'.$portafoliotipo['idportafoliotipo'],'Delete'); ?></li>
        <li> <?php echo anchor('portafoliotipo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafoliotipo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('portafoliotipo/save_edit') ?>
<?php echo form_hidden('idportafoliotipo',$portafoliotipo['idportafoliotipo']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idportafoliotipo',$portafoliotipo['idportafoliotipo'],array("disabled"=>"disabled",'placeholder'=>'Idportafoliotipos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$portafoliotipo['nombre'],array('placeholder'=>'Nombre del portafoliotipo')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



