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
    foreach ($estadorequerimiento as $row){
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
    <label class="col-md-2 col-form-label"> Fecha de solicitud:</label>
	<div class="col-md-10">
      <?php echo form_input('fecharequerimiento',$requerimiento['fecharequerimiento'],array('type'=>'date', 'placeholder'=>'fecharequerimiento','style'=>'width:500px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona solicita:</label>
      <?php
 	$options = array();
  	foreach ($personas as $row){
		$options[$row->idpersona]=$row->apellidos." ".$row->nombres;
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
	echo form_textarea('detallelargo',$requerimiento['detallelargo'],$textarea_options);
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Gestión ( <?php echo anchor('gestion/add/'.$requerimiento['idrequerimiento'], 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($gestions as $row){
		$options[$row->idgestion]=$row->fechagestion." :: ". $row->detalle;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idgestion[]',$options,(array)set_value('idgestion', ''), array('style'=>'width:500px')); 
	?>

	</div> 
</div>









<?php echo form_close(); ?>





<form>
	<div class="modal fade" id="Modal_Edit" tabindex="-1"  role="dialog" arias-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar notas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


				<div class="form-group row">
				    <label class="col-md-2 col-form-label"> Requerimiento:</label>
					<div class="col-md-10">
					<?php
				    $options= array('--Select--');
				    foreach ($requerimientos as $row){
				      $options[$row->idrequerimiento]= $row->detallecorto;
				    }
				     echo form_dropdown("idrequerimiento",$options, set_select('--Select--','default_value'));  
						?>
					</div> 
				</div>


				<div class="form-group row">
				    <label class="col-md-2 col-form-label"> Fecha de gestion:</label>
					<div class="col-md-10">
					<?php
				 echo form_input(array("name"=>"fechagestion","id"=>"fechagestion","type"=>"date"));  
						?>
					</div> 
				</div>


				<div class="form-group row">
				    <label class="col-md-2 col-form-label"> Detalle del gestion:</label>
					<div class="col-md-10">
					<?php
				    
				$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"De que manera esta gestionando el requerimiento" );    
				    
				 echo form_textarea("detalle","", $textarea_options); 
						?>
					</div> 
				</div>


				<div class="form-group row">
				    <label class="col-md-2 col-form-label"> Departamento:</label>
					<div class="col-md-10">
					<?php
				    $options= array('--Select--');
				    foreach ($departamentos as $row){
				      $options[$row->iddepartamento]= $row->nombre;
				    }
				     echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  
						?>
					</div> 
				</div>

										


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="submit" id="btn_update" class="btn btn-primary">Guardar</button>
				</div>
			</div>

		</div>
	</div>


</form>






</body>









</html>
