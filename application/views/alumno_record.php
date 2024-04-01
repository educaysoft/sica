<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($alumno))
{
?>
        <li> <?php echo anchor('alumno/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('alumno/anterior/'.$alumno['idalumno'], 'anterior'); ?></li>
        <li> <?php echo anchor('alumno/siguiente/'.$alumno['idalumno'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('alumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('alumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('alumno/edit/'.$alumno['idalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('alumno/delete/'.$alumno['idalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('alumno/listar/','Listar'); ?></li>
        <li> <?php echo anchor('alumno/reportepdf/'.$alumno['idpersona'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('alumno/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('alumno/save_edit') ?>
<?php echo form_hidden('idalumno',$alumno['idalumno']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idpersona',$alumno['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idalumnos')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">id Alumno: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idalumno',$alumno['idalumno'],array("id"=>"idalumno","disabled"=>"disabled",'placeholder'=>'Idalumnos')); 
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

echo form_input('idpersona',$options[$alumno['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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
            <b>Matrículas del  alumno: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('matricula/add/'.$alumno['idalumno']) ?>">Nueva matrícula</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatad">
	 <thead>
	 <tr>
	 <th>idmatricula</th>
	 <th>idalumno</th>
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
	var idalumno=document.getElementById("idalumno").value;
	var mytablaf= $('#mydatad').DataTable({"ajax": {url: '<?php echo site_url('alumno/matricula_data')?>', type: 'GET',data:{idalumno:idalumno}},});


});






$('#show_datae').on('click','.item_ver',function(){
var id= $(this).data('idmatricula');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});









</script>


</body>









</html>
