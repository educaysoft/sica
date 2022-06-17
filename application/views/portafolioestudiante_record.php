<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($portafolioestudiante) and !empty($portafolioestudiante))
{
?>
        <li> <?php echo anchor('portafolioestudiante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/anterior/'.$portafolioestudiante['idportafolioestudiante'], 'anterior'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/siguiente/'.$portafolioestudiante['idportafolioestudiante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafolioestudiante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/edit/'.$portafolioestudiante['idportafolioestudiante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafolioestudiante/delete/'.$portafolioestudiante['idportafolioestudiante'],'Delete'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/listar/','Listar'); ?></li>
        <li> <?php echo anchor('portafolioestudiante/reportepdf/'.$portafolioestudiante['idportafolioestudiante'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafolioestudiante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('portafolioestudiante/save_edit') ?>
<?php echo form_hidden('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id portafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('idportafolioestudiante',$portafolioestudiante['idportafolioestudiante'],array("disabled"=>"disabled",'placeholder'=>'Idportafolioestudiantes')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Estudiante:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

echo form_input('idestudiante',$options[$portafolioestudiante['idestudiante']],array("disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Descripción del documeto:</label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($portafoliomodelos as $row){
	$options[$row->idportafoliomodelo]= $row->nombre;
}
echo form_input('idportafoliomodelo',$options[$portafolioestudiante['idportafoliomodelo']],array("disabled"=>"disabled", "style"=>"width:500px")); ?>

	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">  Certificado (<?php echo "<a onclick='verpdf()'>Ver</a>" ?>) :</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
if(!isset($participante['iddocumento'])){
echo form_input('nmdocumento',"",array("id"=>"nmdocumento","disabled"=>"disabled","style"=>"width:500px")) ;
}else{
echo form_input('nmdocumento',$options[$participante['iddocumento']],array("id"=>"nmdocumento","disabled"=>"disabled","style"=>"width:500px"));
}
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado del documemento:</label>
	<div class="col-md-10">

     <?php 
$options= array("NADA");
foreach ($estado_portafolios as $row){
	$options[$row->idestado_portafolio]= $row->nombre;
}

echo form_input('idestado_portafolio',$options[$portafolioestudiante['idestado_portafolio']],array("disabled"=>"disabled", "style"=>"width:500px")); 
?>

	</div> 
</div> 



<?php echo form_close(); ?>





</body>









</html>
