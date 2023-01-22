<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($cantonpersona))
{
?>
   <li> <?php echo anchor('cantonpersona/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('cantonpersona/anterior/'.$cantonpersona['idcantonpersona'], 'anterior'); ?></li>
   <li> <?php echo anchor('cantonpersona/siguiente/'.$cantonpersona['idcantonpersona'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('cantonpersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cantonpersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cantonpersona/edit/'.$cantonpersona['idcantonpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cantonpersona/delete/'.$cantonpersona['idcantonpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('cantonpersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cantonpersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('cantonpersona/save_edit') ?>
<?php echo form_hidden('idcantonpersona',$cantonpersona['idcantonpersona']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idcantonpersona',$cantonpersona['idcantonpersona'],array("disabled"=>"disabled",'placeholder'=>'Idcantonpersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$cantonpersona['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Pais residencia:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($paises as $row){
	      $options[$row->idpais]= $row->nombre;
    }
    echo form_input('idpais',$options[$cantonpersona['idpais']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$cantonpersona['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
