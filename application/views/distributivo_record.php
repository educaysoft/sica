<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($distributivo))
{
?>
        <li> <?php echo anchor('distributivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('distributivo/siguiente/'.$distributivo['iddistributivo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('distributivo/anterior/'.$distributivo['iddistributivo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('distributivo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('distributivo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('distributivo/edit/'.$distributivo['iddistributivo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('distributivo/delete/'.$distributivo['iddistributivo'],'Delete'); ?></li>
        <li> <?php echo anchor('distributivo/listar/'.$distributivo['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('distributivo/reportepdf/'.$distributivo['idperiodoacademico'],'reportepdf'); ?></li>
        <li> <?php echo anchor('distributivounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('distributivo/','Distributivo'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('distributivo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('distributivo/save_edit') ?>
<?php echo form_hidden('iddistributivo',$distributivo['iddistributivo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddistributivo',$distributivo['iddistributivo'],array("id"=>"iddistributivo","disabled"=>"disabled"));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Institucion:</label>
	<div class="col-md-10">
	<?php
	$options= array("NADA");
	foreach ($instituciones as $row){
		$options[$row->idinstitucion]= $row->nombre;
	}
	echo form_input('',$options[$distributivo['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo : ( <?php echo anchor('periodoacademico/actual/'.$distributivo['idperiodoacademico'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$distributivo['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('fechacalendario/add', 'Fechas'); ?>: </label>
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idcalendario</th>
	 <th>idfecha</th>
	 <th>fecha</th>
	 <th>actividad.</th>
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
	var iddistributivo=document.getElementById("iddistributivo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivo/fecha_data')?>', type: 'GET',data:{iddistributivo:iddistributivo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idfechacalendario');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>
