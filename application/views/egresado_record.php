<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($egresado))
{
?>
        <li> <?php echo anchor('egresado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('egresado/anterior/'.$egresado['idegresado'], 'anterior'); ?></li>
        <li> <?php echo anchor('egresado/siguiente/'.$egresado['idegresado'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('egresado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('egresado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('egresado/edit/'.$egresado['idegresado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('egresado/delete/'.$egresado['idegresado'],'Delete'); ?></li>
        <li> <?php echo anchor('egresado/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('egresado/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('egresado/save_edit') ?>
<?php echo form_hidden('idegresado',$egresado['idegresado']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id egresado:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idegresado',$egresado['idegresado'],array("disabled"=>"disabled",'placeholder'=>'Idegresados'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id trabajointegracioncurricular:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idtrabajointegracioncurricular',$egresado['idtrabajointegracioncurricular'],array("disabled"=>"disabled",'placeholder'=>'Idtrabajointegracioncurriculars'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('trabajointegracioncurricular/actual/'.$egresado['idtrabajointegracioncurricular'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->nombre;
}
echo form_input('idtrabajointegracioncurricular',$options[$egresado['idtrabajointegracioncurricular']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id egresado:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idegresado',$egresado['idegresado'],array("disabled"=>"disabled",'placeholder'=>'Idegresadoes'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Egresado:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}
echo form_input('idegresado',$options[$egresado['idestudiante']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>
