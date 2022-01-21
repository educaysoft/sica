<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($emisor))
{
?>
        <li> <?php echo anchor('emisor/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('emisor/anterior/'.$emisor['idemisor'], 'anterior'); ?></li>
        <li> <?php echo anchor('emisor/siguiente/'.$emisor['idemisor'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('emisor/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('emisor/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('emisor/edit/'.$emisor['idemisor'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('emisor/delete/'.$emisor['idemisor'],'Delete'); ?></li>
        <li> <?php echo anchor('emisor/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('emisor/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('emisor/save_edit') ?>
<?php echo form_hidden('iddocumento',$emisor['iddocumento']) ?>
<table>

<tr>
     <td>Id Emisor:</td>
     <td><?php echo form_input('idemisor',$emisor['idemisor'],array("disabled"=>"disabled",'placeholder'=>'Idemisors')) ?></td>
  </tr>
<tr>
 




<tr>
     <td>Id Documento:</td>
     <td><?php echo form_input('iddocumento',$emisor['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos')) ?></td>
  </tr>
<tr>
     <td>Documento:</td>
     <td><?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

echo form_input('iddocumento',$options[$emisor['iddocumento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$emisor['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idemisores')) ?></td>
  </tr>
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$emisor['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  








</table>
<?php echo form_close(); ?>





</body>









</html>
