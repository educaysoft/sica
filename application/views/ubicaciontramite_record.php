<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('ubicaciontramite/save_edit') ?>
    <ul>
<?php
if(isset($ubicaciontramite))
{
?>
 
        <li> <?php echo anchor('ubicaciontramite/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ubicaciontramite/anterior/'.$ubicaciontramite['idubicaciontramite'], 'anterior'); ?></li>
        <li> <?php echo anchor('ubicaciontramite/siguiente/'.$ubicaciontramite['idubicaciontramite'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ubicaciontramite/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ubicaciontramite/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ubicaciontramite/edit/'.$ubicaciontramite['idubicaciontramite'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ubicaciontramite/delete/'.$ubicaciontramite['idubicaciontramite'],'Delete'); ?></li>
        <li> <?php echo anchor('ubicaciontramite/listar/'.$ubicaciontramite['idubicaciontramite'],'Listar'); ?></li>
	<li> <?php echo anchor('ubicaciontramite/reportepdf/'.$ubicaciontramite['idubicaciontramite'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('ubicaciontramite/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$ubicaciontramite['idubicaciontramite']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('unidad/actual/'.$ubicaciontramite['idunidad'], 'La unidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$ubicaciontramite['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('articulo/actual/'.$ubicaciontramite['idarticulo'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$ubicaciontramite['idarticulo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$ubicaciontramite['idpersona'],'La persona: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$ubicaciontramite['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha ubicación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$ubicaciontramite['fecha'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$ubicaciontramite['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
