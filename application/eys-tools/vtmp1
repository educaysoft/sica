<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documentoportafolio) and !empty($documentoportafolio))
{
?>
        <li> <?php echo anchor('documentoportafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentoportafolio/anterior/'.$documentoportafolio['iddocumentoportafolio'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentoportafolio/siguiente/'.$documentoportafolio['iddocumentoportafolio'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentoportafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentoportafolio/edit/'.$documentoportafolio['iddocumentoportafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentoportafolio/delete/'.$documentoportafolio['iddocumentoportafolio'],'Delete'); ?></li>
        <li> <?php echo anchor('documentoportafolio/listar/','Listar'); ?></li>
        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
        <li> <?php echo anchor('documentoportafolio/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('documentoportafolio/reportepdf/'.$documentoportafolio['iddocumentoportafolio'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('documentoportafolio/save_edit') ?>
<?php echo form_hidden('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documentoportafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentoportafolios')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>documento/actual/<?php echo $documentoportafolio['iddocumento']; ?> "   >Documento: &#x1F448;</a>  </label>
	<div class="col-md-10">
     <?php 


	$elordenador='';
	$eldirectorio='';
	$archivopdf='';

$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
	$elordenador=$row->elordenador;
	$eldirectorio=$row->ruta;
	$archivopdf=$row->archivopdf;
}

echo form_input('iddocumento',$options[$documentoportafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>portafolio/actual/<?php echo $documentoportafolio['idportafolio']; ?> "   >Portafolio: &#x1F448;</a>  </label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($portafolios as $row){
	$options[$row->idportafolio]= $row->lapersona." - ".$row->elperiodo;
}
echo form_input('idportafolio',$options[$documentoportafolio['idportafolio']],array("id"=>"idportafilio","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Actividad académica:  </label>
	<div class="col-md-10">
  

<?php 

$options= array('--Select--');
foreach ($docenteactividadacademicas as $row){
	$options[$row->iddocenteactividadacademica]=$row->item." - ". $row->eldistributivodocente." - ".$row->nombreactividad." - (".$row->numerohoras.")";
}

 echo form_dropdown("iddocenteactividadacademica",$options,$documentoportafolio['iddocenteactividadacademica']);  ?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">Minutos ocupados:  </label>
	<div class="col-md-10">
<?php echo form_input("minutosocupados",$documentoportafolio['minutosocupados'], array("placeholder"=>"Minutos utilizados"))  ?>
	</div> 
</div>




<?php echo form_close(); ?>


<script>
function verpdf(){

	var orde='<?php echo $elordenador; ?>'; 
	var dire='<?php echo $eldirectorio; ?>';  
var ordenador = "https://"+orde;
var ubicacion=dire;
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archi='<?php echo $archivopdf; ?>';
var archivo =archi;
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


}




</script>


</body>









</html>
