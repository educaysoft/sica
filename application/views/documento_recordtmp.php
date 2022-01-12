<html>


<body>

<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
        <li> <?php echo anchor('ordinador/primero/', 'primero'); ?></li>
        <li> <?php echo anchor('ordinador/anterior/'.$ordinador['idordinador'], 'anterior'); ?></li>
        <li> <?php echo anchor('ordinador/siguiente/'.$ordinador['idordinador'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ordinador/ultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ordinador/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ordinador/edit/'.$ordinador['idordinador'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ordinador/delete/'.$ordinador['idordinador'],'Delete'); ?></li>
        <li> <?php echo anchor('ordinador/listar/','Listar'); ?></li>
        <li> <?php echo anchor('ordinador/canvas/'.$ordinador['archivopdf'],'Ver PDF'); ?></li>
    </ul>
</div>
<br>
<br>


<?php echo form_open('ordinador/save_edit') ?>
<?php echo form_hidden('idordinador',$ordinador['idordinador']) ?>
<table>

  <tr>
     <td>Tido de ordinador:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

echo form_input('idtipodocu',$options[$ordinador['idtipodocu']],array("disabled"=>"disabled")) ?></td>
  </tr>
 


  <tr>
     <td>idordinador:</td>
     <td><?php echo form_input('idordinador',$ordinador['idordinador'],array("disabled"=>"disabled",'placeholder'=>'Idordinadors')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$ordinador['nombre'],array('placeholder'=>'Nombre del ordenador')) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
