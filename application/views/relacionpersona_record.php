<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($relacionpersona))
{
?>
        <li> <?php echo anchor('relacionpersona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('relacionpersona/anterior/'.$relacionpersona['idrelacionpersona'], 'anterior'); ?></li>
        <li> <?php echo anchor('relacionpersona/siguiente/'.$relacionpersona['idrelacionpersona'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('relacionpersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('relacionpersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('relacionpersona/edit/'.$relacionpersona['idrelacionpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('relacionpersona/delete/'.$relacionpersona['idrelacionpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('relacionpersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('relacionpersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('relacionpersona/save_edit') ?>
<?php echo form_hidden('idrelacionpersona',$relacionpersona['idrelacionpersona']) ?>
<table>
  <tr>
     <td>Id Relacionpersona:</td>
     <td><?php echo form_input('idrelacionpersona',$relacionpersona['idrelacionpersona'],array("disabled"=>"disabled",'placeholder'=>'Idrelacionpersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$relacionpersona['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 



 
  


  
<tr>
     <td>Estado del Relacionpersona:</td>
     <td><?php 
$options= array("NADA");
foreach ($tiporelacionpersonas as $row){
	$options[$row->idtiporelacionpersona]= $row->nombre;
}

echo form_input('idtiporelacionpersona',$options[$relacionpersona['idtiporelacionpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
