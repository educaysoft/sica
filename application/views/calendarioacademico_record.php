<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($calendarioacademico))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("calendarioacademico"==$row["modulo"]["modulo"])
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}
?>
<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>
<ul>
        <li> <?php echo anchor('calendarioacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('calendarioacademico/siguiente/'.$calendarioacademico['idcalendarioacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('calendarioacademico/anterior/'.$calendarioacademico['idcalendarioacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('calendarioacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('calendarioacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('calendarioacademico/edit/'.$calendarioacademico['idcalendarioacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('calendarioacademico/delete/'.$calendarioacademico['idcalendarioacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('calendarioacademico/listar/'.$calendarioacademico['idperiodoacademico'],'Listar'); ?></li>
        <li> <?php echo anchor('calendarioacademico/reportepdf/'.$calendarioacademico['idperiodoacademico'],'reportepdf'); ?></li>
        <li> <?php echo anchor('calendarioacademicounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('distributivo/','Distributivo'); ?></li>
		<li> <?php echo anchor('calendarioacademico/paginaweb/'.$calendarioacademico['idcalendarioacademico'],' web'); ?></li>

	<?php } ?>
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
      echo form_input('idcalendarioacademico',$calendarioacademico['idcalendarioacademico'],array("id"=>"idcalendarioacademico","disabled"=>"disabled"));
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
    <label class="col-md-2 col-form-label"> Nombre: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombre',$calendarioacademico['nombre'],array('placeholder'=>'Nombre corto del periodoacademico',"disabled"=>"disabled","style"=>"width:500px;"));

	?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechadesde',$calendarioacademico['fechadesde'],array('placeholder'=>'Fecha en que inicia el calendario',"disabled"=>"disabled","style"=>"width:500px;")); 

?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$calendarioacademico['fechahasta'],array('placeholder'=>'Fecha en que finaliza el calendario',"disabled"=>"disabled","style"=>"width:500px;")); 

?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('fechacalendario/add', 'Fechas'); ?>: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

	<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
	    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
		    <b>Fecha planificadas: </b>

        <div class="pull-right">
<a class="btn btn-danger" href="<?php echo base_url('calendarioacademico/genpagina/'.$calendarioacademico['idcalendarioacademico']) ?>">Generar página</a>
		</div>
		</div>
	    </div>
	</div>

	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idcal</th>
	 <th>idfecha</th>
	 <th>fecha</th>
	 <th>actividad.</th>
	 <th>estado.</th>
	 <th>color.</th>
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
    var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('calendarioacademico/fecha_data')?>', type: 'GET',data:{idcalendarioacademico:idcalendarioacademico}},
           "rowCallback": function(row, data, index){
        	$("td:eq(0)", row).css('background-color',data[5])
        	$("td:eq(1)", row).css('background-color',data[5])
        	$("td:eq(2)", row).css('background-color',data[5])
        	$("td:eq(3)", row).css('background-color',data[5])
        	$("td:eq(4)", row).css('background-color',data[5])
        	$("td:eq(5)", row).css('background-color',data[5])
        	$("td:eq(6)", row).css('background-color',data[5])
       }
 
    
    
    
    });
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idfechacalendario');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>
