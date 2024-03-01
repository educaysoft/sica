<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipolector/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipolector/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipolector/anterior/'.$tipolector['idtipolector'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipolector/siguiente/'.$tipolector['idtipolector'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipolector/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipolector/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipolector/edit/'.$tipolector['idtipolector'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipolector/delete/'.$tipolector['idtipolector'],'Delete'); ?></li>
        <li> <?php echo anchor('tipolector/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipolector',$tipolector['idtipolector']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtipolector',$tipolector['idtipolector'],array("disabled"=>"disabled",'placeholder'=>'Idtipolectors')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tipolector['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
