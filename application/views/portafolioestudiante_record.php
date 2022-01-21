<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($portafolioestudiante))
{
?>
        <li> <?php echo anchor('portafolioestudiante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/anterior/'.$portafolioestudiante['idportafolioestudiante'], 'anterior'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/siguiente/'.$portafolioestudiante['idportafolioestudiante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafolioestudiante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/edit/'.$portafolioestudiante['idportafolioestudiante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafolioestudiante/delete/'.$portafolioestudiante['idportafolioestudiante'],'Delete'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafolioestudiante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('portafolioestudiante/save_edit') ?>
<?php echo form_hidden('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante']) ?>
<table>
  <tr>
     <td>Id portafolioestudiante:</td>
     <td><?php echo form_input('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante'],array("disabled"=>"disabled",'placeholder'=>'Idportafolioestudiantes')) ?></td>
  </tr>
 
 
<tr>
     <td>Estudiante:</td>
     <td><?php 
$options= array("NADA");
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

echo form_input('idestudiante',$options[$portafolioestudiante['idestudiante']],array("disabled"=>"disabled", "style"=>"width:500px")) ?></td>
  </tr>
 
 
  
<tr>
     <td>Descripción del documento:</td>
     <td><?php 
$options= array("NADA");
foreach ($portafoliomodelos as $row){
	$options[$row->idportafoliomodelo]= $row->nombre;
}

echo form_input('idportafoliomodelo',$options[$portafolioestudiante['idportafoliomodelo']],array("disabled"=>"disabled", "style"=>"width:500px")) ?></td>
  </tr>


<tr>
     <td>Estado del documento:</td>
     <td><?php 
$options= array("NADA");
foreach ($estado_portafolios as $row){
	$options[$row->idestado_portafolio]= $row->nombre;
}

echo form_input('idestado_portafolio',$options[$portafolioestudiante['idestado_portafolio']],array("disabled"=>"disabled", "style"=>"width:500px")) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
