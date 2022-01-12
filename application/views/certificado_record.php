<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
   <ul>
<?php
if(isset($certificado))
{
?>
        <li> <?php echo anchor('certificado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('certificado/siguiente/'.$certificado['idcertificado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('certificado/anterior/'.$certificado['idcertificado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('certificado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('certificado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('certificado/edit/'.$certificado['idcertificado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('certificado/delete/'.$certificado['idcertificado'],'Delete'); ?></li>
        <li> <?php echo anchor('certificado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('certificado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idcertificado',$certificado['idcertificado']) ?>
<table>

  <tr>
     <td>Id certificado:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idcertificado','value'=>$certificado['idcertificado'],"disabled"=>"disabled",'placeholder'=>'Idcertificados','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Propietario:</td>
      <td><?php


  $eys_arrctl=array("name"=>'propietario','value'=>$certificado['propietario'],"disabled"=>"disabled",'placeholder'=>'Ipropietario','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>


<tr>
      <td>Archivo:</td>
      <td><?php
  $eys_arrctl=array("name"=>'archivo','value'=>$certificado['archivo'],"disabled"=>"disabled",'placeholder'=>'Direccion y nombre del archivo','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
</tr>


<tr>
      <td>Ubicación:</td>
      <td><?php
  $eys_arrctl=array("name"=>'ubicacion','value'=>$certificado['ubicacion'],"disabled"=>"disabled",'placeholder'=>'Ubicación del archivo de certificado','style'=>'width:600px;');
 echo form_input($eys_arrctl) ?></td>
</tr>

<tr>
      <td>Evento:</td>
      <td><?php
  $eys_arrctl=array("name"=>'evento','value'=>$certificado['evento'],"disabled"=>"disabled",'placeholder'=>'Evento del certificado','style'=>'width:600px;');
 echo form_input($eys_arrctl) ?></td>
</tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
