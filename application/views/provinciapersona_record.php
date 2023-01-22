<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($provinciapersona))
{
?>
   <li> <?php echo anchor('provinciapersona/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('provinciapersona/anterior/'.$provinciapersona['idprovinciapersona'], 'anterior'); ?></li>
   <li> <?php echo anchor('provinciapersona/siguiente/'.$provinciapersona['idprovinciapersona'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('provinciapersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('provinciapersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('provinciapersona/edit/'.$provinciapersona['idprovinciapersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('provinciapersona/delete/'.$provinciapersona['idprovinciapersona'],'Delete'); ?></li>
        <li> <?php echo anchor('provinciapersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('provinciapersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('provinciapersona/save_edit') ?>
<?php echo form_hidden('idprovinciapersona',$provinciapersona['idprovinciapersona']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idprovinciapersona',$provinciapersona['idprovinciapersona'],array("disabled"=>"disabled",'placeholder'=>'Idprovinciapersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$provinciapersona['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Pais residencia:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($paises as $row){
	      $options[$row->idpais]= $row->nombre;
    }
    echo form_input('idpais',$options[$provinciapersona['idpais']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$provinciapersona['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
