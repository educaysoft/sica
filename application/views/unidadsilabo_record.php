<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('unidadsilabo/save_edit') ?>
    <ul>
<?php
if(isset($unidadsilabo))
{
?>
 
        <li> <?php echo anchor('unidadsilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('unidadsilabo/anterior/'.$unidadsilabo['idunidadsilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('unidadsilabo/siguiente/'.$unidadsilabo['idunidadsilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('unidadsilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('unidadsilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('unidadsilabo/edit/'.$unidadsilabo['idunidadsilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('unidadsilabo/delete/'.$unidadsilabo['idunidadsilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('unidadsilabo/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('unidadsilabo/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idsilabo',$unidadsilabo['idsilabo']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> No. de la unidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('unidad',$unidadsilabo['unidad'],array("disabled"=>"disabled",'placeholder'=>'unidad','style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
      echo form_input('nombre',$unidadsilabo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre','style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id silabo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idsilabo',$unidadsilabo['idsilabo'],array("disabled"=>"disabled",'placeholder'=>'Idsilabos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del silabo:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}
echo form_input('idsilabo',$options[$unidadsilabo['idsilabo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id videotutorial:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idvideotutorial',$unidadsilabo['idvideotutorial'],array("disabled"=>"disabled",'placeholder'=>'Idunidadsilaboes','style'=>'width:500px;'));
		?>
	</div> 
</div> 



 
 
  








<?php echo form_close(); ?>





</body>









</html>
