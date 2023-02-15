<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudio))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("evento"==$row["modulo"]["nombre"]);
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}
?>
   <li> <?php echo anchor('estudio/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('estudio/anterior/'.$estudio['idestudio'], 'anterior'); ?></li>
   <li> <?php echo anchor('estudio/siguiente/'.$estudio['idestudio'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('estudio/elultimo/', 'Último'); ?></li>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>
        <li> <?php echo anchor('estudio/edit/'.$estudio['idestudio'],'Edit'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('estudio/delete/'.$estudio['idestudio'],'Delete'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li> <?php echo anchor('estudio/listar/','Listar'); ?></li>
	<?php } ?>


<?php 
}else{
?>

        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudio/save_edit') ?>
<?php echo form_hidden('idestudio',$estudio['idestudio']) ?>
<table>
  <tr>
     <td>Id Estudio:</td>
     <td><?php echo form_input('idestudio',$estudio['idestudio'],array("disabled"=>"disabled",'placeholder'=>'Idestudios')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$estudio['idpersona']],array("disabled"=>"disabled",'style'=>'width:600px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
    echo form_input('idinstitucion',$options[$estudio['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:600px;')) ?></td>
 </tr>
  


<tr>
     <td>Nivel estudio:</td>
     <td><?php 


    $options= array("NADA");
    foreach ($nivelestudios as $row){
	      $options[$row->idnivelestudio]= $row->nombre;
    }
    echo form_input('idnivelestudio',$options[$estudio['idnivelestudio']],array("disabled"=>"disabled",'style'=>'width:500px;')); 

	?>
	</td> 
</tr>



  


<tr>
      <td>Titulo:</td>
      <td><?php echo form_input('titulo',$estudio['titulo'],array("disabled"=>"disabled",'type'=>'text','placeholder'=>'Titulo obtenido','style'=>'width:600px;')) ?></td>
</tr>


<tr>
      <td>Fecha de registro:</td>
      <td><?php echo form_input('fecharegistro',$estudio['fecharegistro'],array("disabled"=>"disabled",'type'=>'date','placeholder'=>'Titulo obtenido','style'=>'width:600px;')) ?></td>
</tr>

<tr>
      <td>Número registro:</td>
      <td><?php echo form_input('numeroregistro',$estudio['numeroregistro'],array("disabled"=>"disabled",'type'=>'text','placeholder'=>'Titulo obtenido','style'=>'width:500px;')) ?></td>
</tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
