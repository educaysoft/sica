<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($genero))
{
?>
        <li> <?php echo anchor('genero/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('genero/siguiente/'.$genero['idgenero'], 'siguiente'); ?></li>
        <li> <?php echo anchor('genero/anterior/'.$genero['idgenero'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('genero/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('genero/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('genero/edit/'.$genero['idgenero'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('genero/delete/'.$genero['idgenero'],'Delete'); ?></li>
        <li> <?php echo anchor('genero/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('genero/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idgenero',$genero['idgenero']) ?>
<table>

  <tr>
     <td>Id Institucion:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idgenero','value'=>$genero['idgenero'],"disabled"=>"disabled",'placeholder'=>'Idgeneros','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$genero['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
