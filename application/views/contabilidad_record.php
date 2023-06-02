<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($contabilidad))
{
?>
        <li> <?php echo anchor('contabilidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('contabilidad/anterior/'.$contabilidad['idcontabilidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('contabilidad/siguiente/'.$contabilidad['idcontabilidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('contabilidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('contabilidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('contabilidad/edit/'.$contabilidad['idcontabilidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('contabilidad/delete/'.$contabilidad['idcontabilidad'],'Delete'); ?></li>
        <li> <?php echo anchor('contabilidad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('contabilidad/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('contabilidad/save_edit') ?>
<?php echo form_hidden('idcontabilidad',$contabilidad['idcontabilidad']) ?>
<table>
  <tr>
     <td>Id contabilidad:</td>
     <td><?php echo form_input('idcontabilidad',$contabilidad['idcontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Idcontabilidads')) ?></td>
  </tr>
 
 
<tr>
     <td>Beneficiario:</td>
     <td><?php 
$options= array("NADA");
foreach ($beneficiarios as $row){
	$options[$row->idbeneficiario]= $row->apellidos." ".$row->nombres;
}

echo form_input('idbeneficiario',$options[$contabilidad['idbeneficiario']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Fecha:</td>
     <td><?php echo form_input('fechacontabilidad',$contabilidad['fechacontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>

 
  <tr>
     <td>Valor:</td>
     <td><?php echo form_input('valor',$contabilidad['valor'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Pagador:</td>
     <td><?php 
$options= array("NADA");
foreach ($pagadores as $row){
	$options[$row->idpagador]= $row->nombre;
}

echo form_input('idpagador',$options[$contabilidad['idpagador']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Tipo Ingr-Egres:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipocontabilidads as $row){
	$options[$row->idtipocontabilidad]= $row->nombre;
}

echo form_input('idtipocontabilidad',$options[$contabilidad['idtipocontabilidad']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Detalle:</td>
     <td><?php echo form_input('detalle',$contabilidad['detalle'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
