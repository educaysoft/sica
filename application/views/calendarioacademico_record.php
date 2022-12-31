<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($calendarioacademico))
{
?>
        <li> <?php echo anchor('calendarioacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('calendarioacademico/siguiente/'.$calendarioacademico['idcalendarioacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('calendarioacademico/anterior/'.$calendarioacademico['idcalendarioacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('calendarioacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('calendarioacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('calendarioacademico/edit/'.$calendarioacademico['idcalendarioacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('calendarioacademico/delete/'.$calendarioacademico['idcalendarioacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('calendarioacademico/listar/'.$calendarioacademico['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('calendarioacademicounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('calendarioacademico/panel/','Panel'); ?></li>

<?php 
}else{
?>
        <li> <?php echo anchor('calendarioacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('calendarioacademico/save_edit') ?>
<?php echo form_hidden('idcalendarioacademico',$calendarioacademico['idcalendarioacademico']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idcalendarioacademico',$calendarioacademico['idcalendarioacademico'],array("disabled"=>"disabled"));
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
	echo form_input('',$options[$calendarioacademico['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;'));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo : ( <?php echo anchor('periodoacademico/actual/'.$calendarioacademico['idperiodoacademico'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     	<?php 
	$options=array();
  	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto;
	}
	?>
		<?php

    echo form_input('idperiodoacademico',$options[$calendarioacademico['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechas del calendario: </label>
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
	var idcalendarioacademico=document.getElementById("idcalendarioacademico").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('calendarioacademico/fecha_data')?>', type: 'GET',data:{idpersona:idpersona}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idfechacalendario');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>
