<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudiante))
{
?>
        <li> <?php echo anchor('estudiante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estudiante/anterior/'.$estudiante['idestudiante'], 'anterior'); ?></li>
        <li> <?php echo anchor('estudiante/siguiente/'.$estudiante['idestudiante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estudiante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estudiante/edit/'.$estudiante['idestudiante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estudiante/delete/'.$estudiante['idestudiante'],'Delete'); ?></li>
        <li> <?php echo anchor('estudiante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudiante/save_edit') ?>
<?php echo form_hidden('idestudiante',$estudiante['idestudiante']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estudiante: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idestudiante',$estudiante['idestudiante'],array("id"=>"idestudiante","disabled"=>"disabled",'placeholder'=>'Idestudiantes')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona: </label>
	<div class="col-md-10">
     	<?php 


 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$estudiante['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
	<div class="col-md-10">
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$estudiante['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
	<div class="col-md-10">
     	<?php 


      echo form_input('fechadesde',$estudiante['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$estudiante['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estudio/add?idpersona='.$estudiante['idpersona'], 'Estudios:') ?> </label>
	<div class="col-md-10">
     	<?php 

	$options = array();
  	foreach ($estudios as $row){
		$options[$row->idpersona]=$row->nivel." - ".$row->lainstitucion;
	}

			 echo form_multiselect('idestudio[]',$options,(array)set_value('idestudio', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Matrículas del  estudiante: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('matricula/add/'.$estudiante['idestudiante']) ?>">Nueva matrícula</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatad">
	 <thead>
	 <tr>
	 <th>idmatricula</th>
	 <th>idestudiante</th>
	 <th>departamento</th>
	 <th>periodo</th>
	 <th>tipo</th>
	 <th>repetida</th>
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





<?php echo form_close(); ?>

<script type="text/javascript">

$(document).ready(function(){
	var idestudiante=document.getElementById("idestudiante").value;
	var mytablaf= $('#mydatad').DataTable({"ajax": {url: '<?php echo site_url('estudiante/matricula_data')?>', type: 'GET',data:{idestudiante:idestudiante}},});


});






$('#show_datae').on('click','.item_ver',function(){
var id= $(this).data('idmatricula');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});









</script>



</body>









</html>
