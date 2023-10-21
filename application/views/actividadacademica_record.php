<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($actividadacademica))
{
?>
        <li> <?php echo anchor('actividadacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('actividadacademica/anterior/'.$actividadacademica['idactividadacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('actividadacademica/siguiente/'.$actividadacademica['idactividadacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('actividadacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('actividadacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('actividadacademica/edit/'.$actividadacademica['idactividadacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('actividadacademica/delete/'.$actividadacademica['idactividadacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('actividadacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('actividadacademica/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('actividadacademica/save_edit') ?>
<?php echo form_hidden('idactividadacademica',$actividadacademica['idactividadacademica']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id Referenciasasigantura:</label>
	<div class="col-md-10">
     <?php 

     echo form_input('idactividadacademica',$actividadacademica['idactividadacademica'],array("disabled"=>"disabled",'placeholder'=>'Idactividadacademicas'));
		?>
	</div> 
</div>
 





<div class="form-group row">
    <label class="col-md-2 col-form-label">Tipo de referencias:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tipoactividadacademicas as $row){
	$options[$row->idtipoactividadacademica]= $row->nombre;
}

echo form_input('idtipoactividadacademica',$options[$actividadacademica['idtipoactividadacademica']],array("disabled"=>"disabled",'style'=>'width:500px'));

		?>
	</div> 
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Nombre:</label>
	<div class="col-md-10">
		<?php
       $eys_arrinput=array('name'=>'nombre','value'=>$actividadacademica['nombre'], "style"=>"width:500px");
     echo form_input($eys_arrinput);

		?>
	</div> 
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Item-codigo:</label>
	<div class="col-md-10">
		<?php
       $eys_arrinput=array('name'=>'item','value'=>$actividadacademica['item'], "style"=>"width:500px");
     echo form_input($eys_arrinput);

		?>
	</div> 
</div>

 





<?php echo form_close(); ?>





</body>









</html>
