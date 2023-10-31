<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodoaprendizaje))
{
?>
        <li> <?php echo anchor('metodoaprendizaje/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodoaprendizaje/siguiente/'.$metodoaprendizaje['idmetodoaprendizaje'], 'siguiente'); ?></li>
        <li> <?php echo anchor('metodoaprendizaje/anterior/'.$metodoaprendizaje['idmetodoaprendizaje'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodoaprendizaje/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodoaprendizaje/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodoaprendizaje/edit/'.$metodoaprendizaje['idmetodoaprendizaje'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodoaprendizaje/delete/'.$metodoaprendizaje['idmetodoaprendizaje'],'Delete'); ?></li>
        <li> <?php echo anchor('metodoaprendizaje/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodoaprendizaje/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('metodoaprendizaje/save_edit') ?>
<?php echo form_hidden('idmetodoaprendizaje',$metodoaprendizaje['idmetodoaprendizaje']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idmetodoaprendizaje',$metodoaprendizaje['idmetodoaprendizaje'],array("disabled"=>"disabled",'placeholder'=>'Idmetodoaprendizajes'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$metodoaprendizaje['nombre'],array('placeholder'=>'Nombre del metodoaprendizaje')); 

	?>
	</div> 
</div> 
   

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripcion del método:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('descripcion',$metodoaprendizaje['descripcion'],$textarea_options); 
		?>
	</div> 
</div>


<?php echo form_close(); ?>



