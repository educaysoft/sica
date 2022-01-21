<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('usuario/save_edit') ?>
    <ul>
        <li> <?php echo anchor('usuario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('usuario/anterior/'.$usuario['idusuario'], 'anterior'); ?></li>
        <li> <?php echo anchor('usuario/siguiente/'.$usuario['idusuario'],'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('usuario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('usuario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('usuario/edit/'.$usuario['idusuario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('usuario/delete/'.$usuario['idusuario'],'Delete'); ?></li>
        <li> <?php echo anchor('usuario/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idusuario',$usuario['idusuario']) ?>
<table>

<tr>
     <td>Institucion:</td>
     <td><?php 
$options= array("NADA");
foreach ($instituciones as $row){
	$options[$row->idinstitucion]=$row->nombre;
}

echo form_input('idinstitucion',$options[$usuario['idinstitucion']],array("disabled"=>"disabled")) ?></td>
  </tr>



<tr>
     <td>Personas:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."   ".$row->nombres;
}

echo form_input('idpersona',$options[$usuario['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
  <tr>
     <td>Perfil:</td>
     <td><?php 
$options= array("NADA");
foreach ($perfiles as $row){
	$options[$row->idperfil]= $row->nombre;
}

echo form_input('idperfil',$options[$usuario['idperfil']],array("disabled"=>"disabled")) ?></td>
  </tr>
 


  <tr>
     <td>Id Usuario:</td>
     <td><?php echo form_input('idusuario',$usuario['idusuario'],array("disabled"=>"disabled",'placeholder'=>'Idusuarios')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Contraseña:</td>
     <td><?php echo form_input('password',$usuario['password'],array("disabled"=>"disabled",'placeholder'=>'password')) ?></td>
  </tr>

  <tr>
     <td>Email:</td>
     <td><?php echo form_input('email',$usuario['email'],array("disabled"=>"disabled",'placeholder'=>'email')) ?></td>
  </tr>
  

<tr>
     <td>Modulo inicia:</td>
     <td><?php echo form_input('inicio',$usuario['inicio'],array("disabled"=>"disabled",'placeholder'=>'modulo')) ?></td>
  </tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
