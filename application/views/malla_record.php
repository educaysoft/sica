<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($malla))
{
?>
        <li> <?php echo anchor('malla/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('malla/siguiente/'.$malla['idmalla'], 'siguiente'); ?></li>
        <li> <?php echo anchor('malla/anterior/'.$malla['idmalla'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('malla/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('malla/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('malla/edit/'.$malla['idmalla'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('malla/delete/'.$malla['idmalla'],'Delete'); ?></li>
        <li> <?php echo anchor('malla/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('malla/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('malla/save_edit') ?>
<?php echo form_hidden('idmalla',$malla['idmalla']) ?>

<div class="form-group row">
<label class="col-md-2 col-form-label"> Depart-Carrera: </label>
     	<?php 

$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

	?>
	<div class="col-md-10">
		<?php
echo form_input('iddepartamento',$options[$malla['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id malla.: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idmalla',$malla['idmalla'],array("id"=>"idmalla","disabled"=>"disabled"));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrecorto',$malla['nombrecorto'],array('placeholder'=>'Nombre corto del malla'));

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrelargo',$malla['nombrelargo'],array('placeholder'=>'Nombre largo del malla'));
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechainicio',$malla['fechainicio'],array('placeholder'=>'Fecha en que inicia el malla')); 

?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza: </label>
	<div class="col-md-10">
     	<?php 
echo form_input('fechafin',$malla['fechafin'],array('placeholder'=>'Fecha en que finaliza el malla')); 
?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('asignatura/add/', 'Asignatura'); ?>  </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idmalla</th>
	 <th>idasig</th>
	 <th>idnivel</th>
	 <th>area</th>
	 <th>nombre</th>
	 <th>creditos</th>
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
	var idmalla=document.getElementById("idmalla").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('malla/asignatura_data')?>', type: 'GET',data:{idmalla:idmalla}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idasignatura');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>

