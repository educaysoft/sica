<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadodistributivo))
{
?>
        <li> <?php echo anchor('estadodistributivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadodistributivo/siguiente/'.$estadodistributivo['idestadodistributivo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadodistributivo/anterior/'.$estadodistributivo['idestadodistributivo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadodistributivo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadodistributivo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadodistributivo/edit/'.$estadodistributivo['idestadodistributivo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadodistributivo/delete/'.$estadodistributivo['idestadodistributivo'],'Delete'); ?></li>
        <li> <?php echo anchor('estadodistributivo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadodistributivo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadodistributivo/save_edit') ?>
<?php echo form_hidden('idestadodistributivo',$estadodistributivo['idestadodistributivo']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idestadodistributivo',$estadodistributivo['idestadodistributivo'],array("disabled"=>"disabled",'placeholder'=>'Idestadodistributivos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$estadodistributivo['nombre'],array('placeholder'=>'Nombre del estadodistributivo')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



