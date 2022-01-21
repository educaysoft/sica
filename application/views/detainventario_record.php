<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($detainventario))
{
?>
        <li> <?php echo anchor('detainventario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('detainventario/anterior/'.$detainventario['iddetainventario'], 'anterior'); ?></li>
        <li> <?php echo anchor('detainventario/siguiente/'.$detainventario['iddetainventario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('detainventario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('detainventario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('detainventario/edit/'.$detainventario['iddetainventario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('detainventario/delete/'.$detainventario['iddetainventario'],'Delete'); ?></li>
        <li> <?php echo anchor('detainventario/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('detainventario/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('detainventario/save_edit') ?>
<?php echo form_hidden('iddetainventario',$detainventario['iddetainventario']) ?>
<table>
  <tr>
     <td>Id detainventario:</td>
     <td><?php echo form_input('iddetainventario',$detainventario['iddetainventario'],array("disabled"=>"disabled",'placeholder'=>'Iddetainventarios')) ?></td>
  </tr>
 
 
<tr>
     <td>Responsable:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$detainventario['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  


  
<tr>
     <td>Articulo:</td>
     <td><?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$detainventario['idarticulo']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Inventario:</td>
     <td><?php 
$options= array("NADA");
foreach ($inventarios as $row){
	$options[$row->idinventario]= $row->nombre;
}

echo form_input('idinventario',$options[$detainventario['idinventario']],array("disabled"=>"disabled")) ?></td>
  </tr>

<tr>
     <td>Ubicación del bien:</td>
     <td><?php echo form_input('ubicacion',$detainventario['ubicacion'],array("disabled"=>"disabled",'placeholder'=>'Ubicacion')) ?></td>
  </tr>

<tr>
     <td>Detalle del esado del bien:</td>
     <td><?php echo form_input('descripcion',$detainventario['descripcion'],array("disabled"=>"disabled",'placeholder'=>'Descripcion')) ?></td>
  </tr>
</table>
<?php echo form_close(); ?>





</body>









</html>
