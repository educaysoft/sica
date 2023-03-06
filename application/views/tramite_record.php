<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($tramite))
{
?>
        <li> <?php echo anchor('tramite/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tramite/siguiente/'.$tramite['idtramite'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tramite/anterior/'.$tramite['idtramite'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tramite/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tramite/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tramite/edit/'.$tramite['idtramite'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tramite/delete/'.$tramite['idtramite'],'Delete'); ?></li>
        <li> <?php echo anchor('tramite/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tramite/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idtramite',$tramite['idtramite']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idtramite",  "name"=>'idtramite','value'=>$tramite['idtramite'],"disabled"=>"disabled",'placeholder'=>'Idtramites','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$tramite['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$tramite['detalle'],$textarea_options); 
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
            <b>Seguimiento al tramite: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('ubicaciontramite/add/') ?>">Nueva ubicación</a><a class="btn btn-danger" href="<?php echo base_url('tramite/reportepdf/'.$tramite['idtramite']) ?>">Reporte</a>
        </div>
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatau">
	 <thead>
	 <tr>
	 <th>idubica</th>
	 <th>idtramite</th>
	 <th>ubicacion</th>
	 <th>Responsable</th>
	 <th>fecha</th>
	 <th>hora</th>
	 <th>detalle</th>
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
	var idtramite=document.getElementById("idtramite").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('tramite/ubicacion_data')?>', type: 'GET',data:{idtramite:idtramite}},});


});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicaciontramite');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamotramite');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
