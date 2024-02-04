<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('documentosilabo/save_edit') ?>
    <ul>
<?php
if(isset($documentosilabo))
{
?>
 
        <li> <?php echo anchor('documentosilabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentosilabo/anterior/'.$documentosilabo['iddocumentosilabo'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentosilabo/siguiente/'.$documentosilabo['iddocumentosilabo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentosilabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentosilabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentosilabo/edit/'.$documentosilabo['iddocumentosilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentosilabo/delete/'.$documentosilabo['iddocumentosilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('documentosilabo/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('documentosilabo/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idsilabo',$documentosilabo['idsilabo']) ?>


 




<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('silabo/actual/'.$documentosilabo['idsilabo'],'Id silabo:'); ?> </label>
	<div class="col-md-10">
	<?php
      echo form_input('idsilabo',$documentosilabo['idsilabo'],array("disabled"=>"disabled",'placeholder'=>'Idsilabos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del silabo:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}
echo form_input('idsilabo',$options[$documentosilabo['idsilabo']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipodocu/elprimero/', 'Tipo documento'); ?> :</label>
     	<?php 
	$options= array("NADA");
	foreach ($tipodocus as $row){
		$options[$row->idtipodocu]= $row->descripcion;
	}
	$arrdatos=array('name'=>'idtipodocu','value'=>$options[$documentosilabo['idtipodocu']],"disabled"=>"disabled","style"=>"width:500px");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$documentosilabo['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentosilaboes','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('nombre',$options[$documentosilabo['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 


<?php echo form_close(); ?>





<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
             <div class="col-md-12 margin-tb">
        <div class="pull-left">
                 <b>Lista de documentos del silabo </b>
       	     </div>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>Iddocumentosilabo</th>
 <th>silabo</th>
 <th>documento</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>










<script type="text/javascript">

$(document).ready(function(){

	var idsilabo=<?php echo $documentosilabo['idsilabo']; ?>; 
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documentosilabo/documentosilabo_data')?>', type: 'GET',data:{idsilabo:idsilabo}},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('iddocumentosilabo');

var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;


});


</script>





</body>









</html>
