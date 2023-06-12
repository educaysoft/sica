<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($proceso))
{
?>
        <li> <?php echo anchor('proceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('proceso/siguiente/'.$proceso['idproceso'], 'siguiente'); ?></li>
        <li> <?php echo anchor('proceso/anterior/'.$proceso['idproceso'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('proceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('proceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('proceso/edit/'.$proceso['idproceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('proceso/delete/'.$proceso['idproceso'],'Delete'); ?></li>
        <li> <?php echo anchor('proceso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('proceso/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idproceso',$proceso['idproceso']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idproceso",  "name"=>'idproceso','value'=>$proceso['idproceso'],'placeholder'=>'Idprocesos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$proceso['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">   Solicitante:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$proceso['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$proceso['detalle'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label"> <button onclick='verpdf()'>Documento-:</button></label>
	<div class="col-md-10">
		<?php
		$options= array("NADA");
		foreach ($documentos as $row){
			$options[$row->iddocumento]= $row->asunto;
		}

		echo form_input('iddocumento',$options[$contabilidad['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div>
</div>



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Seguimiento al proceso: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('ubicacionproceso/add/') ?>">Nueva ubicación</a><a class="btn btn-danger" href="<?php echo base_url('proceso/reportepdf/'.$proceso['idproceso']) ?>">Reporte</a>
        </div>
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatau">
	 <thead>
	 <tr>
	 <th>idubica</th>
	 <th>idproceso</th>
	 <th>ubicacion</th>
	 <th>Responsable</th>
	 <th>fecha</th>
	 <th>hora</th>
	 <th>detalle</th>
	 <th>estado</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datau">
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
	var idproceso=document.getElementById("idproceso").value;
	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('proceso/ubicacion_data')?>', type: 'GET',data:{idproceso:idproceso}},});


});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionproceso');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoproceso');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
