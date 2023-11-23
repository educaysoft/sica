<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($movilidadalumno))
{
?>
        <li> <?php echo anchor('movilidadalumno/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('movilidadalumno/anterior/'.$movilidadalumno['idmovilidadalumno'], 'anterior'); ?></li>
        <li> <?php echo anchor('movilidadalumno/siguiente/'.$movilidadalumno['idmovilidadalumno'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('movilidadalumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('movilidadalumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('movilidadalumno/edit/'.$movilidadalumno['idmovilidadalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('movilidadalumno/delete/'.$movilidadalumno['idmovilidadalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('movilidadalumno/listar/','Listar'); ?></li>
        <li> <?php echo anchor('movilidadalumno/reportepdf/'.$movilidadalumno['idpersona'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('movilidadalumno/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('movilidadalumno/save_edit') ?>
<?php echo form_hidden('idmovilidadalumno',$movilidadalumno['idmovilidadalumno']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idpersona',$movilidadalumno['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idmovilidadalumnos')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idmovilidadalumno',$movilidadalumno['idmovilidadalumno'],array("id"=>"idmovilidadalumno","disabled"=>"disabled",'placeholder'=>'Idmovilidadalumnos')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Alumno: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$movilidadalumno['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Desde: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($departamentofuente as $row){
	$options[$row->iddepartamentofuente]= $row->eldepartamento;
}

echo form_input('iddepartamentofuente',$options[$movilidadalumno['iddepartamentofuente']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Hasta: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($departamentodestino as $row){
	$options[$row->iddepartamentodestino]= $row->eldepartamento;
}

echo form_input('iddepartamentodestino',$options[$movilidadalumno['iddepartamentodestino']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tipo: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($tipomovilidadalumno as $row){
	$options[$row->idtipomovilidadalumno]= $row->nombre;
}

echo form_input('idtipomovilidadalumno',$options[$movilidadalumno['idtipomovilidadalumno']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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
            <b>Etapa de la movilidadalumno: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('etapamovilidadalumno/add/'.$movilidadalumno['idmovilidadalumno']) ?>">Nueva etapa</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatad">
	 <thead>
	 <tr>
	 <th>idetapa</th>
	 <th>idmovilidadalumno</th>
	 <th>etapa</th>
	 <th>fechadesde</th>
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
	var idmovilidadalumno=document.getElementById("idmovilidadalumno").value;
	var mytablaf= $('#mydatad').DataTable({"ajax": {url: '<?php echo site_url('movilidadalumno/etapamovilidadalumno_data')?>', type: 'GET',data:{idmovilidadalumno:idmovilidadalumno}},});


});






$('#show_datae').on('click','.item_vere',function(){
var id= $(this).data('idestudio');
var retorno= $(this).data('retornoe');
window.location.href = retorno+'/'+id;
});




$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retornos');
window.location.href = retorno+'/'+id;
});





</script>


</body>









</html>
