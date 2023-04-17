<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('ubicacionfuncionario/save_edit') ?>
    <ul>
<?php
if(isset($ubicacionfuncionario))
{
?>
 
        <li> <?php echo anchor('ubicacionfuncionario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ubicacionfuncionario/anterior/'.$ubicacionfuncionario['idubicacionfuncionario'], 'anterior'); ?></li>
        <li> <?php echo anchor('ubicacionfuncionario/siguiente/'.$ubicacionfuncionario['idubicacionfuncionario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ubicacionfuncionario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ubicacionfuncionario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ubicacionfuncionario/edit/'.$ubicacionfuncionario['idubicacionfuncionario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ubicacionfuncionario/delete/'.$ubicacionfuncionario['idubicacionfuncionario'],'Delete'); ?></li>
        <li> <?php echo anchor('ubicacionfuncionario/listar/'.$ubicacionfuncionario['idubicacionfuncionario'],'Listar'); ?></li>
	<li> <?php echo anchor('ubicacionfuncionario/reportepdf/'.$ubicacionfuncionario['idubicacionfuncionario'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('ubicacionfuncionario/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$ubicacionfuncionario['idubicacionfuncionario']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('unidad/actual/'.$ubicacionfuncionario['idunidad'], 'La unidad:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$ubicacionfuncionario['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('articulo/actual/'.$ubicacionfuncionario['idarticulo'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$ubicacionfuncionario['idarticulo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$ubicacionfuncionario['idpersona'],'La persona: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$ubicacionfuncionario['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha ubicación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$ubicacionfuncionario['fecha'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$ubicacionfuncionario['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
