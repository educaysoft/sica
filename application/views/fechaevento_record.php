<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('fechaevento/save_edit') ?>
    <ul>
<?php
if(isset($fechaevento))
{
?>
 
        <li> <?php echo anchor('fechaevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('fechaevento/anterior/'.$fechaevento['idfechaevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('fechaevento/siguiente/'.$fechaevento['idfechaevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('fechaevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('fechaevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('fechaevento/edit/'.$fechaevento['idfechaevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('fechaevento/delete/'.$fechaevento['idfechaevento'],'Delete'); ?></li>
        <li> <?php echo anchor('fechaevento/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('fechaevento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$fechaevento['idevento']) ?>
<table>

<tr>
     <td>Id Evento:</td>
     <td><?php echo form_input('idevento',$fechaevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')) ?></td>
  </tr>
<tr>
     <td>Evento:</td>
     <td><?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$fechaevento['idevento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$fechaevento['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idfechaeventoes')) ?></td>
  </tr>
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

echo form_input('nombre',$options[$fechaevento['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  

<tr>
     <td>Certificado:</td>
     <td><?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
if(!isset($fechaevento['iddocumento'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$fechaevento['iddocumento']],array("disabled"=>"disabled"));
}
 ?></td>
  </tr>






</table>
<?php echo form_close(); ?>





</body>









</html>
