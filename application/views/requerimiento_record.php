<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($requerimiento))
{
?>
	<li> <?php echo anchor('requerimiento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('requerimiento/siguiente/'.$requerimiento['idrequerimiento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('requerimiento/anterior/'.$requerimiento['idrequerimiento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('requerimiento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('requerimiento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('requerimiento/edit/'.$requerimiento['idrequerimiento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('requerimiento/delete/'.$requerimiento['idrequerimiento'],'Delete'); ?></li>
        <li> <?php echo anchor('requerimiento/listar/','Requerimientos'); ?></li>
        <li> <?php echo anchor('requerimiento/listar_personas/'.$requerimiento['idrequerimiento'],'Certificados'); ?></li>
        <li> <?php echo anchor('asistencia/add/'.$requerimiento['idrequerimiento'],'Asistencias'); ?></li>
        <li> <?php echo anchor('participacion/add/'.$requerimiento['idrequerimiento'],'Participacion'); ?></li>
        <li> <?php echo anchor('seguimiento/add/'.$requerimiento['idrequerimiento'],'Seguimiento'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadorequerimiento/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('requerimiento/save_edit') ?>
<?php echo form_hidden('idrequerimiento',$requerimiento['idrequerimiento']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php

		echo form_input('idrequerimiento',$requerimiento['idrequerimiento'],array("disabled"=>"disabled",'placeholder'=>'idrequerimientos','style'=>'width:500px;'))

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estadorequerimiento/add', 'Requerimiento estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($estadorequerimientos as $row){
	      $options[$row->idestadorequerimiento]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idestadorequerimiento','value'=>$options[$requerimiento['idestadorequerimiento']],"disabled"=>"disabled", "style"=>"width:500px");
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
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$requerimiento['idinstitucion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo del requerimiento:</label>
	<div class="col-md-10">
     <?php echo form_input('detallecorto',$requerimiento['detallecorto'],array("disabled"=>"disabled",'placeholder'=>'detallecorto','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fecharequerimiento',$requerimiento['fecharequerimiento'],array('type'=>'date', 'placeholder'=>'fecharequerimiento','style'=>'width:500px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechas ( <?php echo anchor('fecharequerimiento/add/'.$requerimiento['idrequerimiento'], 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($fecharequerimientos as $row){
		$options[$row->idfecharequerimiento]=$row->fecha." :: ". $row->tema;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idfecharequerimiento[]',$options,(array)set_value('idfecharequerimiento', ''), array('style'=>'width:500px')); 
	?>

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
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detalle',$requerimiento['detalle'],$textarea_options);
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('certificado/add', 'Certificado modelo:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($certificados as $row){
		$options[$row->idcertificado]=$row->asunto;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idcertificado[]',$options,(array)set_value('idcertificado', ''), array('onChange="ver_certicado()"', 'style'=>'width:500px')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Pagina: </label>
 

     <?php 
    $options= array("NADA");
    foreach ($paginas as $row){
	      $options[$row->idpagina]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idpagina','value'=>$options[$requerimiento['idpagina']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
     <?php echo form_input('duracion',$requerimiento['duracion'],array("disabled"=>"disabled",'placeholder'=>'duracion','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
     <?php echo form_input('costo',$requerimiento['costo'],array("disabled"=>"disabled",'placeholder'=>'costo','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('curso/add', 'Curso:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($cursos as $row){
	      $options[$row->idcurso]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idcurso','value'=>$options[$requerimiento['idcurso']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
