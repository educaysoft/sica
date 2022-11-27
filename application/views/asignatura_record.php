<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($asignatura))
{
?>
        <li> <?php echo anchor('asignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('asignatura/siguiente/'.$asignatura['idasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('asignatura/anterior/'.$asignatura['idasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('asignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignatura/edit/'.$asignatura['idasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignatura/delete/'.$asignatura['idasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('asignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idasignatura',$asignatura['idasignatura']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id asignatura:</label>
	<div class="col-md-10">
      <?php

  $eys_arrctl=array("name"=>'idasignatura','value'=>$asignatura['idasignatura'],"disabled"=>"disabled",'placeholder'=>'Idasignaturas','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Código:</label>
	<div class="col-md-10">
      <?php

  $eys_arrctl=array("name"=>'codigo','value'=>$asignatura['codigo'],"disabled"=>"disabled",'placeholder'=>'Código','style'=>'width:500px;');
 echo form_input($eys_arrctl);
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
      <?php
  $eys_arrctl=array("name"=>'nombre','value'=>$asignatura['nombre'],"disabled"=>"disabled",'placeholder'=>'Nombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Malla: ( <?php echo anchor('malla/actual/'.$asignatura['idmalla'], 'Ver'); ?>):</label>
	<div class="col-md-10">
      <?php
    $options= array("NADA");
    foreach ($mallas as $row){
	      $options[$row->idmalla]= $row->nombrecorto;
    }
    echo form_input('idmalla',$options[$asignatura['idmalla']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nivel:</label>
	<div class="col-md-10">
      <?php

    $options= array("NADA");
    foreach ($nivelacademicos as $row){
	      $options[$row->idnivelacademico]= $row->nombre;
    }
    echo form_input('idnivelacademico',$options[$asignatura['idnivelacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 

	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docentes:</label>
	<div class="col-md-10">
      <?php
 	$options = array();
  	foreach ($docentes as $row){
		$options[$row->iddocente]=$row->eldocente;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('iddocente[]',$options,(array)set_value('iddocente', ''), array('style'=>'width:500px')); 
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resultados Aprendizaje:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('resultadosaprendizaje',$asignatura['resultadosaprendizaje'],$textarea_options);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Contenidos mínimos:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('contenidosminimos',$asignatura['contenidosminimos'],$textarea_options);
	?>
	</div> 
</div>




<?php echo form_close(); ?>





</body>









</html>
