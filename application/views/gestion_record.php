<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($gestion))
{
?>
	<li> <?php echo anchor('gestion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('gestion/siguiente/'.$gestion['idgestion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('gestion/anterior/'.$gestion['idgestion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('gestion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('gestion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('gestion/edit/'.$gestion['idgestion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('gestion/delete/'.$gestion['idgestion'],'Delete'); ?></li>
        <li> <?php echo anchor('gestion/listar/','Gestions'); ?></li>
        <li> <?php echo anchor('gestion/listar_personas/'.$gestion['idgestion'],'Certificados'); ?></li>
        <li> <?php echo anchor('asistencia/add/'.$gestion['idgestion'],'Asistencias'); ?></li>
        <li> <?php echo anchor('participacion/add/'.$gestion['idgestion'],'Participacion'); ?></li>
        <li> <?php echo anchor('seguimiento/add/'.$gestion['idgestion'],'Seguimiento'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadogestion/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('gestion/save_edit') ?>
<?php echo form_hidden('idgestion',$gestion['idgestion']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php

		echo form_input('idgestion',$gestion['idgestion'],array("disabled"=>"disabled",'placeholder'=>'idgestions','style'=>'width:500px;'))

		?>
	</div> 
</div>









 <div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('departamento/add', 'Departamento:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($departamentos as $row){
	      $options[$row->iddepartamento]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'iddepartamento','value'=>$options[$gestion['iddepartamento']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de la gestión:</label>
	<div class="col-md-10">
      <?php echo form_input('fechagestion',$gestion['fechagestion'],array('type'=>'date', 'placeholder'=>'fechagestion','style'=>'width:500px;')) ?>
	</div> 
</div>















<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle de la gestión:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detalle',$gestion['detalle'],$textarea_options);
	?>
	</div> 
</div>















<?php echo form_close(); ?>





</body>









</html>
