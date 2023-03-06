<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('ubicaciondocente/save_edit') ?>
    <ul>
<?php
if(isset($ubicaciondocente))
{
?>
 
        <li> <?php echo anchor('ubicaciondocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ubicaciondocente/anterior/'.$ubicaciondocente['idubicaciondocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('ubicaciondocente/siguiente/'.$ubicaciondocente['idubicaciondocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ubicaciondocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ubicaciondocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ubicaciondocente/edit/'.$ubicaciondocente['idubicaciondocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ubicaciondocente/delete/'.$ubicaciondocente['idubicaciondocente'],'Delete'); ?></li>
        <li> <?php echo anchor('ubicaciondocente/listar/'.$ubicaciondocente['idubicaciondocente'],'Listar'); ?></li>
	<li> <?php echo anchor('ubicaciondocente/reportepdf/'.$ubicaciondocente['idubicaciondocente'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('ubicaciondocente/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$ubicaciondocente['idubicaciondocente']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('unidad/actual/'.$ubicaciondocente['idunidad'], 'La unidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$ubicaciondocente['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tramite/actual/'.$ubicaciondocente['idtramite'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($tramites as $row){
	$options[$row->idtramite]= $row->nombre;
}

echo form_input('idtramite',$options[$ubicaciondocente['idtramite']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$ubicaciondocente['idpersona'],'La persona: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$ubicaciondocente['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha ubicación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$ubicaciondocente['fecha'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$ubicaciondocente['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
