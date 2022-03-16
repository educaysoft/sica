<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('perfil/save_edit') ?>
    <ul>
        <li> <?php echo anchor('perfil/elprimero/', 'elprimero'); ?></li>
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


 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     	<?php
	 echo form_input('idperfil',$perfil['idperfil'],array("disabled"=>"disabled",'placeholder'=>'Idperfils','style'=>'width:500px;'));
 	?>
	</div> 
</div> 
 
 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     	<?php 
	echo form_input('nombre',$perfil['nombre'],array("disabled"=>"disabled",'placeholder'=>'descripcion del perfil','style'=>'width:500px;')); 
	?>

	</div> 
</div> 

  








</table>
<?php echo form_close(); ?>





</body>









</html>
