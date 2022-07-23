<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($portafolioestado))
{
?>
        <li> <?php echo anchor('portafolioestado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafolioestado/siguiente/'.$portafolioestado['idportafolioestado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('portafolioestado/anterior/'.$portafolioestado['idportafolioestado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafolioestado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafolioestado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafolioestado/edit/'.$portafolioestado['idportafolioestado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafolioestado/delete/'.$portafolioestado['idportafolioestado'],'Delete'); ?></li>
        <li> <?php echo anchor('portafolioestado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafolioestado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idportafolioestado',$portafolioestado['idportafolioestado']) ?>
<table>

  <tr>
     <td>Id Portafolioestado:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idportafolioestado','value'=>$portafolioestado['idportafolioestado'],"disabled"=>"disabled",'placeholder'=>'Idportafolioestados','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$portafolioestado['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
