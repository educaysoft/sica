<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('estadocivil/save_edit') ?>
    <ul>
        <li> <?php echo anchor('estadocivil/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadocivil/anterior/'.$estadocivil['idestadocivil'], 'anterior'); ?></li>
        <li> <?php echo anchor('estadocivil/siguiente/'.$estadocivil['idestadocivil'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadocivil/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadocivil/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadocivil/edit/'.$estadocivil['idestadocivil'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadocivil/delete/'.$estadocivil['idestadocivil'],'Delete'); ?></li>
        <li> <?php echo anchor('estadocivil/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idestadocivil',$estadocivil['idestadocivil']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idestadocivil',$estadocivil['idestadocivil'],array("disabled"=>"disabled",'placeholder'=>'Idestadocivils')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$estadocivil['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
