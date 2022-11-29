<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('participante/save_edit') ?>
    <ul>
<?php
if(isset($participante))
{
?>
 
        <li> <?php echo anchor('participante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('participante/anterior/'.$participante['idparticipante'], 'anterior'); ?></li>
        <li> <?php echo anchor('participante/siguiente/'.$participante['idparticipante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('participante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('participante/edit/'.$participante['idparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('participante/delete/?idparticipante='.$participante['idparticipante'].'&idevento='.$participante['idevento'],'Delete'); ?></li>
        <li> <?php echo anchor('participante/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$participante['idevento']) ?>
<table>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Id evento:</label>
	<div class="col-md-10">
		<?php
    echo form_input('idevento',$participante['idevento'],array("id"=>"idevento","disabled"=>"disabled",'placeholder'=>'Ideventos'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Evento:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
echo form_input('idevento',$options[$participante['idevento']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
		<?php
     echo form_input('idpersona',$participante['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idparticipantees',"style"=>"width:500px")); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Persona:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('nombre',$options[$participante['idpersona']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 
 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documento:</label>
	<div class="col-md-10">
		<?php
     echo form_input('iddocumento',$participante['iddocumento'],array("id"=>"iddocumento","disabled"=>"disabled",'placeholder'=>'Iddocumento',"style"=>"width:500px")); 
		?>
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
    <label class="col-md-2 col-form-label">Estado de la participacion:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($participanteestado as $row){
	$options[$row->idparticipanteestado]= $row->nombre;
}
echo form_input('idparticipanteestado',$options[$participante['idparticipanteestado']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Grupo letra:</label>
	<div class="col-md-10">
		<?php
     echo form_input('grupoletra',$participante['grupoletra'],array("id"=>"grupoletra","disabled"=>"disabled",'placeholder'=>'Grupo',"style"=>"width:500px")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechas ( <?php echo anchor('fechaevento/add/'.$evento['idevento'], 'New'); ?>):</label>
	<div class="col-md-10">
	<div class="row justify-content-center">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idevento</th>
	 <th>fecha</th>
	 <th>tema</th>
	 <th>Asis</th>
	 <th>Long</th>
	 <th>Lati</th>
	 <th>Parti</th>
	 <th>Pagos</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>





<?php echo form_close(); ?>


<script type="text/javascript">



$(document).ready(function(){
	var idevento=document.getElementById("idevento").value;
	var idpersona=document.getElementById("idpersona").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechasAsisPartPago')?>', type: 'GET',data:{idevento:idevento,idpersona:idpersona}},});
});




function verpdf(){

var iddocumento=document.getElementById("iddocumento").value;
    $.ajax({
        url: "<?php echo site_url('documento/get_documentoA') ?>",
        data: {iddocumento: iddocumento},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
		var dire=data[i].ruta;
		var orde=data[i].elordenador; 
		var archi=data[i].archivopdf;
        }

	var ordenador = "https://"+orde;
	var ubicacion=dire;
	if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        	ubicacion = ordenador+"/"+ubicacion;
	}else{
		ubicacion = ordenador+ubicacion;
	}
	var archivo =archi;
	var certi= ubicacion.trim()+archivo.trim();
	window.location.href = certi;

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })









}




</script>



</body>









</html>
