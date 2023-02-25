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
        <li> <?php echo anchor('distributivo/reportepdf/'.$distributivo['iddistributivo'],'reportepdf'); ?></li>
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
<label class="col-md-2 col-form-label"> <?php echo anchor('departamento/actual/'.$distributivo['iddepartamento'], 'Departamento - carrera'); ?>: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php
echo form_input('iddepartamento',$options[$distributivo['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> ( <?php echo anchor('periodoacademico/actual/'.$distributivo['idperiodoacademico'], 'Periodo :'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->elperiodoacademico;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$distributivo['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
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
            <b>Los docentes: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('distributivodocente/add/'.$distributivo['iddistributivo']) ?>">Agregar docente</a>
        </div>
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddistributivo</th>
	 <th>iddisdoce</th>
	 <th>iddocente</th>
	 <th>eldocente</th>
	 <th>#asigna</th>
	 <th>horas</th>
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
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivo/docente_data')?>', type: 'GET',data:{iddistributivo:iddistributivo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddistributivodocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>
