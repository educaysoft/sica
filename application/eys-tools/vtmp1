<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documentotrabajointegracioncurricular) and !empty($documentotrabajointegracioncurricular))
{
?>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/anterior/'.$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/siguiente/'.$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentotrabajointegracioncurricular/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/edit/'.$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentotrabajointegracioncurricular/delete/'.$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'],'Delete'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/listar/','Listar'); ?></li>
        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('documentotrabajointegracioncurricular/reportepdf/'.$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documentotrabajointegracioncurricular/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('documentotrabajointegracioncurricular/save_edit') ?>
<?php echo form_hidden('iddocumentotrabajointegracioncurricular',$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documentotrabajointegracioncurricular:</label>
	<div class="col-md-10">


     <?php echo form_input('iddocumentotrabajointegracioncurricular',$documentotrabajointegracioncurricular['iddocumentotrabajointegracioncurricular'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentotrabajointegracioncurriculars')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>documento/actual/<?php echo $documentotrabajointegracioncurricular['iddocumento']; ?> "   >Documento: &#x1F448;</a>  </label>
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

echo form_input('iddocumento',$options[$documentotrabajointegracioncurricular['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>trabajointegracioncurricular/actual/<?php echo $documentotrabajointegracioncurricular['idtrabajointegracioncurricular']; ?> "   >Trabajo integracion: &#x1F448;</a>  </label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}
echo form_input('idtrabajointegracioncurricular',$options[$documentotrabajointegracioncurricular['idtrabajointegracioncurricular']],array("id"=>"idportafilio","disabled"=>"disabled", "style"=>"width:500px")); ?>
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
