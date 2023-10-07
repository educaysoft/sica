<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($vinculopersona))
{
?>
        <li> <?php echo anchor('vinculopersona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('vinculopersona/anterior/'.$vinculopersona['idvinculopersona'], 'anterior'); ?></li>
        <li> <?php echo anchor('vinculopersona/siguiente/'.$vinculopersona['idvinculopersona'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('vinculopersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('vinculopersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('vinculopersona/edit/'.$vinculopersona['idvinculopersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('vinculopersona/delete/'.$vinculopersona['idvinculopersona'],'Delete'); ?></li>
        <li> <?php echo anchor('vinculopersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('vinculopersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('vinculopersona/save_edit') ?>
<?php echo form_hidden('idvinculopersona',$vinculopersona['idvinculopersona']) ?>
<table>
  <tr>
     <td>Id Vinculopersona:</td>
     <td><?php echo form_input('idvinculopersona',$vinculopersona['idvinculopersona'],array("disabled"=>"disabled",'placeholder'=>'Idvinculopersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$vinculopersona['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 



 
  <tr>
     <td>Vinculopersona:</td>
     <td><?php echo form_input('lapersona',$vinculopersona['lapersona'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>

<tr>
     <td>Vinculo:</td>
     <td><?php echo form_input('larelacion',$vinculopersona['larelacion'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>
  








</table>
<?php echo form_close(); ?>





</body>









</html>
