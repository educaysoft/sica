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
    <label class="col-md-2 col-form-label"> idasignaturadocente:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idasignaturadocente',$asignaturadocente['idasignaturadocente'],array("id"=>"idasignaturadocente","disabled"=>"disabled",'placeholder'=>'Idasignaturadocentes'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>distributivodocente/actual/<?php echo $asignaturadocente['iddistributivodocente']; ?> "   >Distri_Docente: &#x1F448;</a>     </label>
	<div class="col-md-10">
	<?php
	$options= array("NADA");
	foreach ($distributivodocentes as $row){
		$options[$row->iddistributivodocente]= $row->eldistributivodocente;
	}

echo form_input('eldistributivodocente',$options[$asignaturadocente['iddistributivodocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));
echo form_input('iddistributivodocente',$asignaturadocente['iddistributivodocente'],array('style'=>'display:none; width:500px;'));

		?>
	</div> 
</div>

 

<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>asignatura/actual/<?php echo $asignaturadocente['idasignatura']; ?> "   >Asignatura: &#x1F448;</a>         </label>
	<div class="col-md-10">
	<?php
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]= $row->area.' - '.$row->nombre;
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
    <label class="col-md-2 col-form-label"> Estado:</label>
	<div class="col-md-10">
	<?php
    $options= array("NADA");
    foreach ($estadoasignaturadocentes as $row){
	      $options[$row->idestadoasignaturadocente]= $row->nombre;
    }
    echo form_input('idestadoasignaturadocente',$options[$asignaturadocente['idestadoasignaturadocente']],array("disabled"=>"disabled",'style'=>'width:500px;'));

		?>
	</div> 
</div>




<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">


<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Horario semanal</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('jornadadocente/add/'.$asignaturadocente['idasignaturadocente']) ?>">Nueva hora</a>
        </div>
    </div>
</div>



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



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Eventos-cursos:</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('evento/add/') ?>">Crear un evento</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idevento</th>
	 <th>evento</th>
	 <th>Classroom</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data1">
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
	var idasignaturadocente=document.getElementById("idasignaturadocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('asignaturadocente/jornadadocente_data')?>', type: 'GET',data:{idasignaturadocente:idasignaturadocente}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/evento_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});


});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idjornadadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
