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
    <label class="col-md-2 col-form-label"> <?php echo anchor('estadogestion/add', 'Gestion estado:') ?> </label>
     <?php 
	
    $options= array("NADA");
    foreach ($estadogestion as $row){
	      $options[$row->idestadogestion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idestadogestion','value'=>$options[$gestion['idestadogestion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>

	</div> 
</div>





 <div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('institucion/add', 'Institucion:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$gestion['idinstitucion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo del gestion:</label>
	<div class="col-md-10">
     <?php echo form_input('detallecorto',$gestion['detallecorto'],array("disabled"=>"disabled",'placeholder'=>'detallecorto','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fechagestion',$gestion['fechagestion'],array('type'=>'date', 'placeholder'=>'fechagestion','style'=>'width:500px;')) ?>
	</div> 
</div>











<div class="form-group row">
    <label class="col-md-2 col-form-label"> Participantes ( <?php echo anchor('persona/add', 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($personas as $row){
		$options[$row->idpersona]=$row->nombres;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idpersona[]',$options,(array)set_value('idpersona', ''), array('style'=>'width:500px')); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle largo:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detallelargo',$gestion['detallelargo'],$textarea_options);
	?>
	</div> 
</div>















<?php echo form_close(); ?>





</body>









</html>
