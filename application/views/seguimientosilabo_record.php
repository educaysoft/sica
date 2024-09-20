<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('seguimientosilabo/save_edit') ?>
    <ul>
<?php
if(isset($seguimientosilabo))
{
?>
 
        <li> <?php echo anchor('seguimientosilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/anterior/'.$seguimientosilabo['idseguimientosilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/siguiente/'.$seguimientosilabo['idseguimientosilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('seguimientosilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/edit/'.$seguimientosilabo['idseguimientosilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('seguimientosilabo/delete/'.$seguimientosilabo['idseguimientosilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('seguimientosilabo/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idsilabo',$seguimientosilabo['idsilabo']) ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id silabo: ( <?php echo anchor('silabo/actual/'.$seguimientosilabo['idsilabo'], 'Ver'); ?>):</label>
	<div class="col-md-10">
	<?php
      echo form_input('idsilabo',$seguimientosilabo['idsilabo'],array("disabled"=>"disabled",'placeholder'=>'Idsilabos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del silabo:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}
echo form_input('idsilabo',$options[$seguimientosilabo['idsilabo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> id Unidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idseguimientosilabo',$seguimientosilabo['idseguimientosilabo'],array("id"=>"idseguimientosilabo","disabled"=>"disabled",'placeholder'=>'unidad','style'=>'width:500px;'));
		?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> No. de la unidad:</label>
	<div class="col-md-10">
	<?php
      echo form_input('unidad',$seguimientosilabo['unidad'],array("disabled"=>"disabled",'placeholder'=>'unidad','style'=>'width:500px;'));
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre Unidad:</label>
	<div class="col-md-10">
	<?php


$textarea_options = array("disabled"=>"disabled",'class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('nombre',$seguimientosilabo['nombre'],$textarea_options); 

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
            <b>Temas de la Unidad: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('tema/add/'.$seguimientosilabo['idseguimientosilabo']); ?>">Nuevo tema</a><a class="btn btn-danger" onclick='reportepdf()' >Reporte</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idseguimientosilabo</th>
	 <th>idtema</th>
	 <th>unidad</th>
	 <th>sesión</th>
	 <th>tema(nombre corto)</th>
	 <th>duracion</th>
	 <th>idvideoturorial</th>
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
	var idseguimientosilabo=document.getElementById("idseguimientosilabo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('seguimientosilabo/tema_data')?>', type: 'GET',data:{idseguimientosilabo:idseguimientosilabo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idtema');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
