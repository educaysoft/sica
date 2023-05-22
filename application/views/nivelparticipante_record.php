<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($nivelparticipante))
{
?>
        <li> <?php echo anchor('nivelparticipante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('nivelparticipante/siguiente/'.$nivelparticipante['idnivelparticipante'], 'siguiente'); ?></li>
        <li> <?php echo anchor('nivelparticipante/anterior/'.$nivelparticipante['idnivelparticipante'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('nivelparticipante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nivelparticipante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nivelparticipante/edit/'.$nivelparticipante['idnivelparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nivelparticipante/delete/'.$nivelparticipante['idnivelparticipante'],'Delete'); ?></li>
        <li> <?php echo anchor('nivelparticipante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('nivelparticipante/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('nivelparticipante/save_edit') ?>
<?php echo form_hidden('idnivelparticipante',$nivelparticipante['idnivelparticipante']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipoevento/add', 'Tipo evento:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($tipoeventos as $row){
	      $options[$row->idtipoevento]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idtipoevento','value'=>$options[$nivelparticipante['idtipoevento']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idnivelparticipante',$nivelparticipante['idnivelparticipante'],array("disabled"=>"disabled",'placeholder'=>'Idnivelparticipantes'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$nivelparticipante['nombre'],array('placeholder'=>'Nombre del nivelparticipante')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



