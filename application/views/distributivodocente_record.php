<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($distributivodocente))
{
?>
   <li> <?php echo anchor('distributivodocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('distributivodocente/anterior/'.$distributivodocente['iddistributivodocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('distributivodocente/siguiente/'.$distributivodocente['iddistributivodocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('distributivodocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('distributivodocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('distributivodocente/edit/'.$distributivodocente['iddistributivodocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('distributivodocente/delete/'.$distributivodocente['iddistributivodocente'],'Delete'); ?></li>
        <li> <?php echo anchor('distributivodocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('distributivodocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('distributivodocente/save_edit') ?>
<?php echo form_hidden('iddistributivodocente',$distributivodocente['iddistributivodocente']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id horario docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('iddistributivodocente',$distributivodocente['iddistributivodocente'],array("id"=>"iddistributivodocente","disabled"=>"disabled",'placeholder'=>'Iddistributivodocentes')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente: </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('iddocente',$options[$distributivodocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Distributivo: </label>
	<div class="col-md-10">
     	<?php 
    $options= array("NADA");
    foreach ($distributivos as $row){
	      $options[$row->iddistributivo]= $row->eldistributivo;
    }
    echo form_input('iddistributivo',$options[$distributivodocente['iddistributivo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignaturas de docente<?php echo anchor('asignaturadocente/add', '(New)'); ?>: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddistributivodocente</th>
	 <th>idasignatura</th>
	 <th>nivel</th>
	 <th>Asignatura</th>
	 <th>Paralelo</th>
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
	var iddistributivodocente=document.getElementById("iddistributivodocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/asignaturadocente_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>

</body>









</html>
