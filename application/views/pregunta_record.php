<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($pregunta))
{
?>

        <li> <?php echo anchor('pregunta/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pregunta/anterior/'.$pregunta['idpregunta'], 'anterior'); ?></li>
        <li> <?php echo anchor('pregunta/siguiente/'.$pregunta['idpregunta'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pregunta/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pregunta/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pregunta/edit/'.$pregunta['idpregunta'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pregunta/delete/'.$pregunta['idpregunta'],'Delete'); ?></li>
        <li> <?php echo anchor('pregunta/listar/','Listar'); ?></li>
        <li> <?php echo anchor('respuesta/','Respuesta'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('pregunta/add', 'Nuevo'); ?></li>
<?php
}
?>




    </ul>
</div>
<br>


<?php echo form_hidden('idpregunta',$pregunta['idpregunta'],array('id'="idpregunta")) ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Reactivo:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($reactivos as $row){
	$options[$row->idreactivo]= $row->nombre;
}

echo form_input('idreactivo',$options[$pregunta['idreactivo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id de la pregunta:</label>
	<div class="col-md-10">
		<?php

     echo form_input('idpregunta',$pregunta['idpregunta'],array("disabled"=>"disabled",'placeholder'=>'Idpreguntas','style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 
 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id de la pregunta:</label>
	<div class="col-md-10">
		<?php
      echo form_input('pregunta',$pregunta['pregunta'],array("disabled"=>"disabled",'placeholder'=>'Pregunta','style'=>'width:500px;')); 
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
            <b>Respuestas: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('respuesta/add/'.$pregunta['idpregunta']) ?>">Nueva respuesta</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatar">
	 <thead>
	 <tr>
	 <th>idreactivo</th>
	 <th>idpregunta</th>
	 <th>idrespuesta</th>
	 <th>respuesta</th>
	 <th>acieto</th>
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
	var idpregunta=document.getElementById("idpregunta").innerHTML;

	var mytablaf= $('#mydatar').DataTable({"ajax": {url: '<?php echo site_url('reactivo/reactivo_respuesta2')?>', type: 'GET',data:{idpregunta:idpregunta}},});



});


$('#show_data1').on('click','.item_ver2',function(){
var id= $(this).data('idrespuesta');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>
</body>









</html>
