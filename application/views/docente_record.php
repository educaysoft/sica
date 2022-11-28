<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($docente))
{
?>
        <li> <?php echo anchor('docente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('docente/anterior/'.$docente['iddocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('docente/siguiente/'.$docente['iddocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('docente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('docente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('docente/edit/'.$docente['iddocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('docente/delete/'.$docente['iddocente'],'Delete'); ?></li>
        <li> <?php echo anchor('docente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('docente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('docente/save_edit') ?>
<?php echo form_hidden('iddocente',$docente['iddocente']) ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id Docente: </label>
     	<?php 


      echo form_input('iddocente',$docente['iddocente'],array("id"=>"iddocente","disabled"=>"disabled",'placeholder'=>'Iddocentes')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente: </label>
     	<?php 


 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$docente['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>



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
echo form_input('iddepartamento',$options[$docente['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde: </label>
     	<?php 


      echo form_input('fechadesde',$docente['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechahasta',$docente['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estudio/add', 'Estudios:') ?> </label>
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
    <label class="col-md-2 col-form-label"> Silabos presentados: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>periodo</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
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
	var iddocente=document.getElementById("iddocente").value;
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('docente/silabo_data')?>', type: 'GET',data:{iddocente:iddocente}},});


});





$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





</script>


</body>









</html>
