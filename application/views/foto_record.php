<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($foto))
{
?>
        <li> <?php echo anchor('foto/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('foto/siguiente/'.$foto['idfoto'], 'siguiente'); ?></li>
        <li> <?php echo anchor('foto/anterior/'.$foto['idfoto'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('foto/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('foto/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('foto/edit/'.$foto['idfoto'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('foto/delete/'.$foto['idfoto'],'Delete'); ?></li>
        <li> <?php echo anchor('foto/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('foto/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>



<div style="width: 100%; display: flex; flex-direction: row;">

<div style="width: 80%;"> 


<?php echo form_hidden('idfoto',$foto['idfoto']) ?>
<table>

  <tr>
     <td>Id Institucion:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idfoto','value'=>$foto['idfoto'],"disabled"=>"disabled",'placeholder'=>'Idfotos','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Detalle:</td>
      <td><?php


  $eys_arrctl=array("name"=>'detalle','value'=>$foto['detalle'],"disabled"=>"disabled",'placeholder'=>'Detalle','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  
<tr>
      <td>Descripción:</td>
      <td><?php


  $eys_arrctl=array("name"=>'descripcion','value'=>$foto['descripcion'],"disabled"=>"disabled",'placeholder'=>'Descripción','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

 <tr>
      <td>Archivo:</td>
      <td><?php


  $eys_arrctl=array("name"=>'archivo','value'=>$foto['archivo'],"disabled"=>"disabled",'placeholder'=>'Archivo','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>  
   

</table>
<?php echo form_close(); ?>
</div>
<div>

<?php
echo "<img src='". base_url().$foto['archivo']."'>"
?>
</div>



</div>

</body>









</html>
