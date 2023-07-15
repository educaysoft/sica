<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodoaprendizajetema))
{
?>
        <li> <?php echo anchor('metodoaprendizajetema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/anterior/'.$metodoaprendizajetema['idmetodoaprendizajetema'], 'anterior'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/siguiente/'.$metodoaprendizajetema['idmetodoaprendizajetema'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodoaprendizajetema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/edit/'.$metodoaprendizajetema['idmetodoaprendizajetema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodoaprendizajetema/delete/'.$metodoaprendizajetema['idmetodoaprendizajetema'],'Delete'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodoaprendizajetema/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('metodoaprendizajetema/save_edit') ?>
<?php echo form_hidden('idmetodoaprendizajetema',$metodoaprendizajetema['idmetodoaprendizajetema']) ?>
<table>
  <tr>
     <td>Id Metodoaprendizajetema:</td>
     <td><?php echo form_input('idmetodoaprendizajetema',$metodoaprendizajetema['idmetodoaprendizajetema'],array("disabled"=>"disabled",'placeholder'=>'Idmetodoaprendizajetemas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($temas as $row){
	$options[$row->idtema]= $row->nombrecorto;
}

echo form_input('idtema',$options[$metodoaprendizajetema['idtema']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Metodo:</td>
     <td><?php 
$options= array("NADA");
foreach ($metodoaprendizajes as $row){
	$options[$row->idmetodoaprendizaje]= $row->nombre;
}

echo form_input('idmetodoaprendizaje',$options[$metodoaprendizajetema['idmetodoaprendizaje']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  


  








</table>
<?php echo form_close(); ?>





</body>









</html>
