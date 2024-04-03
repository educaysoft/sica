<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($docenteactividadacademica))
{
?>
        <li> <?php echo anchor('docenteactividadacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('docenteactividadacademica/anterior/'.$docenteactividadacademica['iddocenteactividadacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('docenteactividadacademica/siguiente/'.$docenteactividadacademica['iddocenteactividadacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('docenteactividadacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('docenteactividadacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('docenteactividadacademica/edit/'.$docenteactividadacademica['iddocenteactividadacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('docenteactividadacademica/delete/'.$docenteactividadacademica['iddocenteactividadacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('docenteactividadacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('docenteactividadacademica/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('docenteactividadacademica/save_edit') ?>
<?php echo form_hidden('iddocenteactividadacademica',$docenteactividadacademica['iddocenteactividadacademica']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id Referenciasasigantura:</label>
	<div class="col-md-10">
     <?php 

     echo form_input('iddocenteactividadacademica',$docenteactividadacademica['iddocenteactividadacademica'],array("disabled"=>"disabled",'placeholder'=>'Iddocenteactividadacademicas'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($distributivodocentes as $row){
	$options[$row->iddistributivodocente]= $row->eldistributivodocente;
}


echo form_input('iddistributivodocente',$options[$docenteactividadacademica['iddistributivodocente']],array("disabled"=>"disabled",'style'=>'width:500px'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Actividad académica:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($actividadacademicas as $row){
	$options[$row->idactividadacademica]= $row->nombre;
}
echo form_input('idactividadacademica',$options[$docenteactividadacademica['idactividadacademica']],array("disabled"=>"disabled",'style'=>'width:500px'));
		?>
	</div> 
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Número de horas/semana</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control',"disabled"=>"disabled",  'style'=> 'width:500px;');    
     echo form_input('numerohoras',$docenteactividadacademica['numerohoras'],$textarea_options);
		?>
	</div> 
</div>



 <div class="form-group row">
<label class="col-md-2 col-form-label">Detalle</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control',"disabled"=>"disabled",  'style'=> 'width:500px;');    
     echo form_input('detalle',$docenteactividadacademica['detalle'],$textarea_options);
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
