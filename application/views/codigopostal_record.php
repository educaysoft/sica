<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('codigopostal/save_edit') ?>
    <ul>
        <li> <?php echo anchor('codigopostal/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('codigopostal/anterior/'.$codigopostal['idcodigopostal'], 'anterior'); ?></li>
        <li> <?php echo anchor('codigopostal/siguiente/'.$codigopostal['idcodigopostal'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('codigopostal/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('codigopostal/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('codigopostal/edit/'.$codigopostal['idcodigopostal'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('codigopostal/delete/'.$codigopostal['idcodigopostal'],'Delete'); ?></li>
        <li> <?php echo anchor('codigopostal/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcodigopostal',$codigopostal['idcodigopostal']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idcodigopostal',$codigopostal['idcodigopostal'],array("disabled"=>"disabled",'placeholder'=>'Idcodigopostals')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$codigopostal['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
