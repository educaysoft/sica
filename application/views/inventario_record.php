<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($inventario))
{
?>

        <li> <?php echo anchor('inventario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('inventario/anterior/'.$inventario['idinventario'], 'anterior'); ?></li>
        <li> <?php echo anchor('inventario/siguiente/'.$inventario['idinventario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('inventario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('inventario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('inventario/edit/'.$inventario['idinventario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('inventario/delete/'.$inventario['idinventario'],'Delete'); ?></li>
        <li> <?php echo anchor('inventario/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('inventario/add', 'Nuevo'); ?></li>
<?php
}
?>




    </ul>
</div>
<br>


<?php echo form_hidden('idinventario',$inventario['idinventario']) ?>
<table>

<tr>
     <td>Institucion:</td>
     <td><?php 
$options= array("NADA");
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

echo form_input('idinstitucion',$options[$inventario['idinstitucion']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 


  <tr>
     <td>Id Inventario:</td>
     <td><?php echo form_input('idinventario',$inventario['idinventario'],array("disabled"=>"disabled",'placeholder'=>'Idinventarios')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Nombre:</td>
     <td><?php echo form_input('nombre',$inventario['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>


  
<tr>
      <td>Fecha Elaboracion:</td>
      <td><?php echo form_input('fechaelaboracion',$inventario['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion','style'=>'width:500px;')) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
