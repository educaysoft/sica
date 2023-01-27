<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('pais/save_edit') ?>
    <ul>
        <li> <?php echo anchor('pais/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pais/anterior/'.$pais['idpais'], 'anterior'); ?></li>
        <li> <?php echo anchor('pais/siguiente/'.$pais['idpais'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pais/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pais/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pais/edit/'.$pais['idpais'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pais/delete/'.$pais['idpais'],'Delete'); ?></li>
        <li> <?php echo anchor('pais/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idpais',$pais['idpais']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idpais',$pais['idpais'],array("disabled"=>"disabled",'placeholder'=>'Idpaiss')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$pais['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
