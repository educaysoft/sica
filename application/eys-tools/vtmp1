<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($miembrocomisionacademica))
{
?>
        <li> <?php echo anchor('miembrocomisionacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('miembrocomisionacademica/anterior/'.$miembrocomisionacademica['idmiembrocomisionacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('miembrocomisionacademica/siguiente/'.$miembrocomisionacademica['idmiembrocomisionacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('miembrocomisionacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('miembrocomisionacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('miembrocomisionacademica/edit/'.$miembrocomisionacademica['idmiembrocomisionacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('miembrocomisionacademica/delete/'.$miembrocomisionacademica['idmiembrocomisionacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('miembrocomisionacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('miembrocomisionacademica/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('miembrocomisionacademica/save_edit') ?>
<?php echo form_hidden('idmiembrocomisionacademica',$miembrocomisionacademica['idmiembrocomisionacademica']) ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Miembrocomisionacademica: </label>
     	<?php 


      echo form_input('idmiembrocomisionacademica',$miembrocomisionacademica['idmiembrocomisionacademica'],array("disabled"=>"disabled",'placeholder'=>'Idmiembrocomisionacademicas')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona: </label>
     	<?php 


 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$miembrocomisionacademica['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Perido academico: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrelargo;
}

echo form_input('idperiodoacademico',$options[$miembrocomisionacademica['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label"> Comision Academica: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($comisionacademicas as $row){
	$options[$row->idcomisionacademica]= $row->nombre;
}

echo form_input('idcomisionacademica',$options[$miembrocomisionacademica['idcomisionacademica']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 


      echo form_input('fechadesde',$miembrocomisionacademica['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$miembrocomisionacademica['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>









</html>
