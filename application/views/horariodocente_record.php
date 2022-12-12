<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($horariodocente))
{
?>
   <li> <?php echo anchor('horariodocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('horariodocente/anterior/'.$horariodocente['idhorariodocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('horariodocente/siguiente/'.$horariodocente['idhorariodocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('horariodocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('horariodocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('horariodocente/edit/'.$horariodocente['idhorariodocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('horariodocente/delete/'.$horariodocente['idhorariodocente'],'Delete'); ?></li>
        <li> <?php echo anchor('horariodocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('horariodocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('horariodocente/save_edit') ?>
<?php echo form_hidden('idhorariodocente',$horariodocente['idhorariodocente']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id horario docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idhorariodocente',$horariodocente['idhorariodocente'],array("id"=>"idhorariodocente","disabled"=>"disabled",'placeholder'=>'Idhorariodocentes')); 
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

echo form_input('iddocente',$options[$horariodocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Periodo académico: </label>
	<div class="col-md-10">
     	<?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->nombrelargo;
    }
    echo form_input('idperiodoacademico',$options[$horariodocente['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignaturas de docente: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idhorariodocente</th>
	 <th>idasignatura</th>
	 <th>Asignatura</th>
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
	var idhorariodocente=document.getElementById("idhorariodocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('horariodocente/asignaturadocente_data')?>', type: 'GET',data:{idhorariodocente:idhorariodocente}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>

</body>









</html>
