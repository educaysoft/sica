<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipodocumentodocumento) and !empty($tipodocumentodocumento))
{
?>
        <li> <?php echo anchor('tipodocumentodocumento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/anterior/'.$tipodocumentodocumento['idtipodocumentodocumento'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/siguiente/'.$tipodocumentodocumento['idtipodocumentodocumento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipodocumentodocumento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/edit/'.$tipodocumentodocumento['idtipodocumentodocumento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipodocumentodocumento/delete/'.$tipodocumentodocumento['idtipodocumentodocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/listar/','Listar'); ?></li>
        <li> <?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('tipodocumentodocumento/reportepdf/'.$tipodocumentodocumento['idtipodocumentodocumento'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipodocumentodocumento/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('tipodocumentodocumento/save_edit') ?>
<?php echo form_hidden('idtipodocumentodocumento',$tipodocumentodocumento['idtipodocumentodocumento']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id tipodocumentodocumento:</label>
	<div class="col-md-10">


     <?php echo form_input('idtipodocumentodocumento',$tipodocumentodocumento['idtipodocumentodocumento'],array("disabled"=>"disabled",'placeholder'=>'Idtipodocumentodocumentos')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>documento/actual/<?php echo $tipodocumentodocumento['iddocumento']; ?> "   >Documento: &#x1F448;</a>  </label>
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

echo form_input('iddocumento',$options[$tipodocumentodocumento['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>tipodocumento/actual/<?php echo $tipodocumentodocumento['idtipodocumento']; ?> "   >Tipo documento: &#x1F448;</a>  </label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($tipodocumentos as $row){
	$options[$row->idtipodocumento]= $row->idtipodocumento." - ".$row->nombre;
}
echo form_input('idtipodocumento',$options[$tipodocumentodocumento['idtipodocumento']],array("id"=>"idportafilio","disabled"=>"disabled", "style"=>"width:500px")); ?>
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
