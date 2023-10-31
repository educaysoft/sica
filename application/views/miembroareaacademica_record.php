<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($miembroareaacademica))
{
?>
        <li> <?php echo anchor('miembroareaacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/anterior/'.$miembroareaacademica['idmiembroareaacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/siguiente/'.$miembroareaacademica['idmiembroareaacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('miembroareaacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/edit/'.$miembroareaacademica['idmiembroareaacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('miembroareaacademica/delete/'.$miembroareaacademica['idmiembroareaacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('miembroareaacademica/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('miembroareaacademica/save_edit') ?>
<?php echo form_hidden('idmiembroareaacademica',$miembroareaacademica['idmiembroareaacademica']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id : </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idmiembroareaacademica',$miembroareaacademica['idmiembroareaacademica'],array("disabled"=>"disabled",'placeholder'=>'Idmiembroareaacademicas')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$miembroareaacademica['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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

echo form_input('idperiodoacademico',$options[$miembroareaacademica['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label"> <?php echo anchor('areaacademica/actual/'.$miembroareaacademica['idareaacademica'], 'Area Académica:'); ?>: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($areaacademicas as $row){
	$options[$row->idareaacademica]= $row->nombre;
}

echo form_input('idareaacademica',$options[$miembroareaacademica['idareaacademica']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 


      echo form_input('fechadesde',$miembroareaacademica['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$miembroareaacademica['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>









</html>



