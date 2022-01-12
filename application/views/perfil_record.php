<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('perfil/save_edit') ?>
    <ul>
        <li> <?php echo anchor('perfil/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('perfil/anterior/'.$perfil['idperfil'], 'anterior'); ?></li>
        <li> <?php echo anchor('perfil/siguiente/'.$perfil['idperfil'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('perfil/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('perfil/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('perfil/edit/'.$perfil['idperfil'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('perfil/delete/'.$perfil['idperfil'],'Delete'); ?></li>
        <li> <?php echo anchor('perfil/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idperfil',$perfil['idperfil']) ?>
<table>


 


  <tr>
     <td>Id Perfil:</td>
     <td><?php echo form_input('idperfil',$perfil['idperfil'],array("disabled"=>"disabled",'placeholder'=>'Idperfils')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('descripcion',$perfil['descripcion'],array("disabled"=>"disabled",'placeholder'=>'descripcion')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
