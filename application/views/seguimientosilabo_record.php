<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('seguimientosilabo/save_edit') ?>
    <ul>
<?php
if(isset($seguimientosilabo))
{
?>
 
        <li> <?php echo anchor('seguimientosilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/anterior/'.$seguimientosilabo['idseguimientosilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/siguiente/'.$seguimientosilabo['idseguimientosilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('seguimientosilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/edit/'.$seguimientosilabo['idseguimientosilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('seguimientosilabo/delete/'.$seguimientosilabo['idseguimientosilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('seguimientosilabo/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('seguimientosilabo/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$seguimientosilabo['idevento']) ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento: ( <?php echo anchor('evento/actual/'.$seguimientosilabo['idevento'], 'Ver'); ?>):</label>
	<div class="col-md-10">
	<?php
      echo form_input('idevento',$seguimientosilabo['idevento'],array("disabled"=>"disabled",'placeholder'=>'Idsilabos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del evento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
         echo form_input('idevento',$options[$seguimientosilabo['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Criterio seguimiento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($criterioseguimientosilabos as $row){
	$options[$row->idcriterioseguimientosilabo]= $row->nombre;
}
         echo form_input('idcriterioseguimientosilabo',$options[$seguimientosilabo['idcriterioseguimientosilabo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Criterio seguimiento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($valorcriterioseguimientosilabos as $row){
	$options[$row->idvalorcriterioseguimientosilabo]= $row->nombre;
}
         echo form_input('idvalorcriterioseguimientosilabo',$options[$seguimientosilabo['idvalorcriterioseguimientosilabo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>

 











 
 
  








<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idseguimientosilabo=document.getElementById("idseguimientosilabo").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('seguimientosilabo/tema_data')?>', type: 'GET',data:{idseguimientosilabo:idseguimientosilabo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idtema');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
