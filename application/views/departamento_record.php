<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('departamento/save_edit') ?>
    <ul>
        <li> <?php echo anchor('departamento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('departamento/anterior/'.$departamento['iddepartamento'], 'anterior'); ?></li>
        <li> <?php echo anchor('departamento/siguiente/'.$departamento['iddepartamento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('departamento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamento/edit/'.$departamento['iddepartamento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamento/delete/'.$departamento['iddepartamento'],'Delete'); ?></li>
        <li> <?php echo anchor('departamento/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('iddepartamento',$departamento['iddepartamento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad/Facultad:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($unidades as $row){
	$options[$row->idunidad]= $row->nombre;
}

echo form_input('idunidad',$options[$departamento['idunidad']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddepartamento',$departamento['iddepartamento'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentos'));

		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
      echo form_input('nombre',$departamento['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre','style'=>'width:500px;'));

		?>
	</div> 
</div> 

  


<tr>
      <td>Iniciales:</td>
      <td><?php echo form_input('iniciales',$departamento['iniciales'],array('placeholder'=>'Iniciales de la departamento')) ?></td>
  </tr>





<?php echo form_close(); ?>





</body>









</html>
