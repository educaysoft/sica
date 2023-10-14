<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($miembroareaacademica))
{
?>
        <li> <?php echo anchor('miembroareaacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/anterior/'.$miembroareaacademica['idmiembroareaacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/siguiente/'.$miembroareaacademica['idmiembroareaacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('miembroareaacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/edit/'.$miembroareaacademica['idmiembroareaacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('miembroareaacademica/delete/'.$miembroareaacademica['idmiembroareaacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('miembroareaacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('miembroareaacademica/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('miembroareaacademica/save_edit') ?>
<?php echo form_hidden('idmiembroareaacademica',$miembroareaacademica['idmiembroareaacademica']) ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Miembroareaacademica: </label>
     	<?php 


      echo form_input('idmiembroareaacademica',$miembroareaacademica['idmiembroareaacademica'],array("disabled"=>"disabled",'placeholder'=>'Idmiembroareaacademicas')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona: </label>
     	<?php 


 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$miembroareaacademica['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Perido academico: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrelargo;
}

echo form_input('idperiodoacademico',$options[$miembroareaacademica['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label"> Area Academica: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($areaacademicas as $row){
	$options[$row->idareaacademica]= $row->nombre;
}

echo form_input('idareaacademica',$options[$miembroareaacademica['idareaacademica']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 


      echo form_input('fechadesde',$miembroareaacademica['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$miembroareaacademica['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>







<?php echo form_close(); ?>


<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Estudios realizados: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('miembroareaacademica/add/'.$areaacademica['idareaacademica']) ?>">Nuevo miembro</a><a class="btn btn-danger" href="<?php echo base_url('docente/reportepdf/'.$persona['idpersona']) ?>">Reporte</a>
        </div>
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
 <th>ID</th>
 <th>periodo</th>
 <th>miebro</th>
 <th>area</th>
 <th>Desde</th>
 <th>Hasta</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datae">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>


</body>









</html>

<script type="text/javascript">

$(document).ready(function(){
	var idareaacademica=document.getElementById("idareaacademica").innerHTML;
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('miembroareaacademica/miembroareaacademica_data')?>', type: 'GET',data:{idareaacademica:idareaacademica}},});


});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>

