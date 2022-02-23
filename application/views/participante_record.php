<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('participante/save_edit') ?>
    <ul>
<?php
if(isset($participante))
{
?>
 
        <li> <?php echo anchor('participante/primero/', 'primero'); ?></li>
        <li> <?php echo anchor('participante/anterior/'.$participante['idevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('participante/siguiente/'.$participante['idevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('participante/ultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('participante/edit/'.$participante['idevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('participante/delete/'.$participante['idevento'],'Delete'); ?></li>
        <li> <?php echo anchor('participante/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$participante['idevento']) ?>
<table>

<tr>
     <td>Id Evento:</td>
     <td><?php echo form_input('idevento',$participante['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')) ?></td>
  </tr>
<tr>
     <td>Evento:</td>
     <td><?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$participante['idevento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$participante['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idparticipantees')) ?></td>
  </tr>
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

echo form_input('nombre',$options[$participante['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  

<tr>
     <td>Certificado:</td>
     <td><?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
if($participante['iddocumento']==NULL){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$participante['iddocumento']],array("disabled"=>"disabled"));
}
 ?></td>
  </tr>






</table>
<?php echo form_close(); ?>





</body>









</html>
