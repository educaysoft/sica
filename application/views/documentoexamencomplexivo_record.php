<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documentoexamencomplexivo) and !empty($documentoexamencomplexivo))
{
?>
        <li> <?php echo anchor('documentoexamencomplexivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/anterior/'.$documentoexamencomplexivo['iddocumentoexamencomplexivo'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/siguiente/'.$documentoexamencomplexivo['iddocumentoexamencomplexivo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentoexamencomplexivo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/edit/'.$documentoexamencomplexivo['iddocumentoexamencomplexivo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentoexamencomplexivo/delete/'.$documentoexamencomplexivo['iddocumentoexamencomplexivo'],'Delete'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/listar/','Listar'); ?></li>
        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('documentoexamencomplexivo/reportepdf/'.$documentoexamencomplexivo['iddocumentoexamencomplexivo'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documentoexamencomplexivo/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('documentoexamencomplexivo/save_edit') ?>
<?php echo form_hidden('iddocumentoexamencomplexivo',$documentoexamencomplexivo['iddocumentoexamencomplexivo']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documentoexamencomplexivo:</label>
	<div class="col-md-10">


     <?php echo form_input('iddocumentoexamencomplexivo',$documentoexamencomplexivo['iddocumentoexamencomplexivo'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentoexamencomplexivos')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>documento/actual/<?php echo $documentoexamencomplexivo['iddocumento']; ?> "   >Documento: &#x1F448;</a>  </label>
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

echo form_input('iddocumento',$options[$documentoexamencomplexivo['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>trabajointegracioncurricular/actual/<?php echo $documentoexamencomplexivo['idtrabajointegracioncurricular']; ?> "   >Trabajo integracion: &#x1F448;</a>  </label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($trabajointegracioncurriculars as $row){
	$options[$row->idtrabajointegracioncurricular]= $row->idtrabajointegracioncurricular." - ".$row->nombre;
}
echo form_input('idtrabajointegracioncurricular',$options[$documentoexamencomplexivo['idtrabajointegracioncurricular']],array("id"=>"idportafilio","disabled"=>"disabled", "style"=>"width:500px")); ?>
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
