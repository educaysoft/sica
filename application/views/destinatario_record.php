<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($destinatario))
{
?>
        <li> <?php echo anchor('destinatario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('destinatario/anterior/'.$destinatario['iddestinatario'], 'anterior'); ?></li>
        <li> <?php echo anchor('destinatario/siguiente/'.$destinatario['iddestinatario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('destinatario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('destinatario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('destinatario/edit/'.$destinatario['iddestinatario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('destinatario/delete/'.$destinatario['iddestinatario'],'Delete'); ?></li>
        <li> <?php echo anchor('destinatario/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('destinatario/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('destinatario/save_edit') ?>
<?php echo form_hidden('iddestinatario',$destinatario['iddestinatario']) ?>
<table>


<tr>
     <td>Id Destinatario:</td>
     <td><?php echo form_input('iddestinatario',$destinatario['iddestinatario'],array("disabled"=>"disabled",'placeholder'=>'Iddestinatarios')) ?></td>
  </tr>
<tr>
 

<tr>
     <td>Id Documento:</td>
     <td><?php echo form_input('iddocumento',$destinatario['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos')) ?></td>
  </tr>
<tr>
     <td>Documento:</td>
     <td><?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

echo form_input('iddocumento',$options[$destinatario['iddocumento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>

     <td>Idpersona:</td>
     <td><?php echo form_input('idpersona',$destinatario['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Iddestinatarios')) ?></td>

<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

echo form_input('nombre',$options[$destinatario['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  








</table>
<?php echo form_close(); ?>





</body>









</html>
