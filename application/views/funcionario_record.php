<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($funcionario))
{
?>
        <li> <?php echo anchor('funcionario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('funcionario/anterior/'.$funcionario['idfuncionario'], 'anterior'); ?></li>
        <li> <?php echo anchor('funcionario/siguiente/'.$funcionario['idfuncionario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('funcionario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('funcionario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('funcionario/edit/'.$funcionario['idfuncionario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('funcionario/delete/'.$funcionario['idfuncionario'],'Delete'); ?></li>
        <li> <?php echo anchor('funcionario/listar/','Listar'); ?></li>
        <li> <?php echo anchor('funcionario/reportepdf/'.$funcionario['idpersona'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('funcionario/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('funcionario/save_edit') ?>
<?php echo form_hidden('idfuncionario',$funcionario['idfuncionario']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">id persona: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idpersona',$funcionario['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idfuncionarios')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label">id Funcionario: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idfuncionario',$funcionario['idfuncionario'],array("id"=>"idfuncionario","disabled"=>"disabled",'placeholder'=>'Idfuncionarios')); 
		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Funcionario: </label>
	<div class="col-md-10">
     	<?php 
 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$funcionario['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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

echo form_input('iddepartamento',$options[$funcionario['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

  



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('estudio/add/'.$funcionario['idpersona'], 'Estudios realizados:') ?> </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idpersona</th>
	 <th>idestudio</th>
	 <th>intitucion</th>
	 <th>nivel</th>
	 <th>titulo</th>
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
	 <th>idfuncionario</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
	 <th>periodo</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datas">
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
	var idfuncionario=document.getElementById("idfuncionario").value;
	var idpersona=document.getElementById("idpersona").value;
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('funcionario/silabo_data')?>', type: 'GET',data:{idfuncionario:idfuncionario}},});
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('funcionario/estudio_data')?>', type: 'GET',data:{idpersona:idpersona}},});


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
