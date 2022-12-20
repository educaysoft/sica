<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($ingregre))
{
?>
        <li> <?php echo anchor('ingregre/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ingregre/anterior/'.$ingregre['idingregre'], 'anterior'); ?></li>
        <li> <?php echo anchor('ingregre/siguiente/'.$ingregre['idingregre'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ingregre/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ingregre/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ingregre/edit/'.$ingregre['idingregre'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ingregre/delete/'.$ingregre['idingregre'],'Delete'); ?></li>
        <li> <?php echo anchor('ingregre/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('ingregre/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('ingregre/save_edit') ?>
<?php echo form_hidden('idingregre',$ingregre['idingregre']) ?>
<table>
  <tr>
     <td>Id ingregre:</td>
     <td><?php echo form_input('idingregre',$ingregre['idingregre'],array("disabled"=>"disabled",'placeholder'=>'Idingregres')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$ingregre['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Fecha:</td>
     <td><?php echo form_input('fechaingregre',$ingregre['fechaingregre'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>

 
  <tr>
     <td>Valor:</td>
     <td><?php echo form_input('valor',$ingregre['valor'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Institucion:</td>
     <td><?php 
$options= array("NADA");
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

echo form_input('idinstitucion',$options[$ingregre['idinstitucion']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Tipo Ingr-Egres:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipoingregres as $row){
	$options[$row->idtipoingregre]= $row->nombre;
}

echo form_input('idtipoingregre',$options[$ingregre['idtipoingregre']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Detalle:</td>
     <td><?php echo form_input('detalle',$ingregre['detalle'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
