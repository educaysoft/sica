<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('maestrante/save_edit') ?>
    <ul>
        <li> <?php echo anchor('maestrante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('maestrante/anterior/'.$maestrante['idmaestrante'], 'anterior'); ?></li>
        <li> <?php echo anchor('maestrante/siguiente/'.$maestrante['idmaestrante'],'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('maestrante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('maestrante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('maestrante/edit/'.$maestrante['idmaestrante'],'Edit'); ?></li>
        <li> <?php echo anchor('maestrante/delete/'.$maestrante['idmaestrante'],'Delete'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('maestrante/estado/'.$maestrante['idmaestrante'],'Estado'); ?></li>
        <li> <?php echo anchor('maestrante/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idmaestrante',$maestrante['idmaestrante']) ?>
<table>
  <tr>
     <td>Id :</td>
     <td><?php echo form_input('idmaestrante',$maestrante['idmaestrante'],array("disabled"=>"disabled",'placeholder'=>'Idmaestrantes')) ?></td>
  </tr>
 

 <tr>
      <td>Cedula:</td>
      <td><?php


  $eys_arrctl=array("name"=>'cedula','value'=>$maestrante['cedula'],"disabled"=>"disabled",'placeholder'=>'Icedula','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>




<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos."  ".$row->nombres;
}
echo form_input('idpersona',$options[$maestrante['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 
  <tr>
     <td>Estado:</td>
     <td><?php 
$options= array("NADA");
foreach ($maestrante_estado as $row){
	$options[$row->idmaestrante_estado]= $row->nombre;
}

echo form_input('idmaestrante_estado',$options[$maestrante['idmaestrante_estado']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 
  <tr>
     <td>Maestria:</td>
     <td><?php 
$options= array("NADA");
foreach ($maestrias as $row){
	$options[$row->idmaestria]= $row->nombre;
}

echo form_input('idmaestria',$options[$maestrante['idmaestria']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 


</table>
<?php echo form_close(); ?>





</body>









</html>
