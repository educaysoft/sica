<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($categoria))
{
?>
        <li> <?php echo anchor('categoria/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('categoria/siguiente/'.$categoria['idcategoria'], 'siguiente'); ?></li>
        <li> <?php echo anchor('categoria/anterior/'.$categoria['idcategoria'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('categoria/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('categoria/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('categoria/edit/'.$categoria['idcategoria'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('categoria/delete/'.$categoria['idcategoria'],'Delete'); ?></li>
        <li> <?php echo anchor('categoria/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('categoria/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idcategoria',$categoria['idcategoria']) ?>
<table>

  <tr>
     <td>Id Categoria:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idcategoria','value'=>$categoria['idcategoria'],"disabled"=>"disabled",'placeholder'=>'Idcategorias','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$categoria['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
