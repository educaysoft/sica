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
     <td>Ingregre:</td>
     <td><?php echo form_input('numero',$ingregre['numero'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Operadora:</td>
     <td><?php 
$options= array("NADA");
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

echo form_input('idoperadora',$options[$ingregre['idoperadora']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Estado del Telfono:</td>
     <td><?php 
$options= array("NADA");
foreach ($ingregre_estados as $row){
	$options[$row->idingregre_estado]= $row->nombre;
}

echo form_input('idingregre_estado',$options[$ingregre['idingregre_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
