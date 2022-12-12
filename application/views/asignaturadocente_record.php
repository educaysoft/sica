<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($asignaturadocente))
{
?>
   <li> <?php echo anchor('asignaturadocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('asignaturadocente/anterior/'.$asignaturadocente['idasignaturadocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('asignaturadocente/siguiente/'.$asignaturadocente['idasignaturadocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('asignaturadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignaturadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignaturadocente/edit/'.$asignaturadocente['idasignaturadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignaturadocente/delete/'.$asignaturadocente['idasignaturadocente'],'Delete'); ?></li>
        <li> <?php echo anchor('asignaturadocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('asignaturadocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('asignaturadocente/save_edit') ?>
<?php echo form_hidden('idasignaturadocente',$asignaturadocente['idasignaturadocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> id Horario docente:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idasignaturadocente',$asignaturadocente['idasignaturadocente'],array("id"=>"idasignaturadocente","disabled"=>"disabled",'placeholder'=>'Idasignaturadocentes'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Horario docente <?php echo anchor('horariodocente/actual/'.$asignaturadocente['idhorariodocente'] , '(Ver)'); ?>:</label>
	<div class="col-md-10">
	<?php
	$options= array("NADA");
	foreach ($horariodocentes as $row){
		$options[$row->idhorariodocente]= $row->elhorariodocente;
	}

echo form_input('idhorariodocente',$options[$asignaturadocente['idhorariodocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));

		?>
	</div> 
</div>

 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asignatura:</label>
	<div class="col-md-10">
	<?php
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]= $row->nombre;
    }
    echo form_input('idasignatura',$options[$asignaturadocente['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Paralelo:</label>
	<div class="col-md-10">
	<?php
    $options= array("NADA");
    foreach ($paralelos as $row){
	      $options[$row->idparalelo]= $row->nombre;
    }
    echo form_input('idparalelo',$options[$asignaturadocente['idparalelo']],array("disabled"=>"disabled",'style'=>'width:500px;'));

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Horario: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idasignaturadocente</th>
	 <th>idjornadadocente</th>
	 <th>nombre</th>
	 <th>horainicio</th>
	 <th>duracion</th>
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
	var idasignaturadocente=document.getElementById("idasignaturadocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('asignaturadocente/jornadadocente_data')?>', type: 'GET',data:{idasignaturadocente:idasignaturadocente}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idjornadadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
