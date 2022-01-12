<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($portafoliomodelo))
{
?>
        <li> <?php echo anchor('portafoliomodelo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafoliomodelo/siguiente/'.$portafoliomodelo['idportafoliomodelo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('portafoliomodelo/anterior/'.$portafoliomodelo['idportafoliomodelo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafoliomodelo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafoliomodelo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafoliomodelo/edit/'.$portafoliomodelo['idportafoliomodelo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafoliomodelo/delete/'.$portafoliomodelo['idportafoliomodelo'],'Delete'); ?></li>
        <li> <?php echo anchor('portafoliomodelo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafoliomodelo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idportafoliomodelo',$portafoliomodelo['idportafoliomodelo']) ?>
<table>

  <tr>
     <td>Id Portafoliomodelo:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idportafoliomodelo','value'=>$portafoliomodelo['idportafoliomodelo'],"disabled"=>"disabled",'placeholder'=>'Idportafoliomodelos','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$portafoliomodelo['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
