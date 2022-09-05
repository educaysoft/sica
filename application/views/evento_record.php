<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($evento))
{
?>
	<li> <?php echo anchor('evento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evento/siguiente/'.$evento['idevento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evento/anterior/'.$evento['idevento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evento/edit/'.$evento['idevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evento/delete/'.$evento['idevento'],'Delete'); ?></li>
        <li> <?php echo anchor('evento/listar/','Eventos'); ?></li>
        <li> <?php echo anchor('evento/listar_participantes/'.$evento['idevento'],'Certificados'); ?></li>
        <li> <?php echo anchor('asistencia/add/'.$evento['idevento'],'Asistencias'); ?></li>
        <li> <?php echo anchor('participacion/add/'.$evento['idevento'],'Participacion'); ?></li>
        <li> <?php echo anchor('seguimiento/add/'.$evento['idevento'],'Seguimiento'); ?></li>
        <li> <?php echo anchor('pagoevento/add/'.$evento['idevento'],'Pagos'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('evento/save_edit') ?>
<?php echo form_hidden('idevento',$evento['idevento'],array('name'=>'idevento')) ?>


<!-----
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php

		echo form_input('idevento',$evento['idevento'],array("disabled"=>"disabled",'placeholder'=>'ideventos','style'=>'width:500px;'))

		?>
	</div> 
</div>

----->

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipoevento/add', 'Tipo evento:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($tipoeventos as $row){
	      $options[$row->idtipoevento]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idtipoevento','value'=>$options[$evento['idtipoevento']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>

	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('evento_estado/add', 'Evento estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($evento_estados as $row){
	      $options[$row->idevento_estado]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idevento_estado','value'=>$options[$evento['idevento_estado']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>

	</div> 
</div>





 <div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('institucion/add', 'Institucion:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$evento['idinstitucion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo del evento:</label>
	<div class="col-md-10">
     <?php echo form_input('titulo',$evento['titulo'],array("disabled"=>"disabled",'placeholder'=>'titulo','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fechainicia',$evento['fechainicia'],array('type'=>'date', 'placeholder'=>'fechainicia','style'=>'width:500px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechas ( <?php echo anchor('fechaevento/add/'.$evento['idevento'], 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($fechaeventos as $row){
		$options[$row->idfechaevento]=$row->fecha." :: ". $row->tema;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idfechaevento[]',$options,(array)set_value('idfechaevento', ''), array('style'=>'width:500px')); 
	?>

	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de finaliza:</label>
	<div class="col-md-10">
      <?php echo form_input('fechafinaliza',$evento['fechafinaliza'],array('type'=>'date', 'placeholder'=>'fechafinaliza','style'=>'width:500px;')) ?>
	</div> 
</div>



<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Ordenador - Listar 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>idevento</th>
 <th>fecha</th>
 <th>tema</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>



















<div class="form-group row">
    <label class="col-md-2 col-form-label"> Participantes ( <?php echo anchor('participante/add', 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($participantes as $row){
		$options[$row->idpersona]=$row->nombres;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idparticipante[]',$options,(array)set_value('idparticipante', ''), array('style'=>'width:500px')); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detalle',$evento['detalle'],$textarea_options);
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('certificado/add', 'Certificado modelo:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($certificados as $row){
		$options[$row->idcertificado]=$row->asunto;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idcertificado[]',$options,(array)set_value('idcertificado', ''), array('onChange="ver_certicado()"', 'style'=>'width:500px')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Pagina: </label>
 

     <?php 
    $options= array("NADA");
    foreach ($paginas as $row){
	      $options[$row->idpagina]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idpagina','value'=>$options[$evento['idpagina']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
     <?php echo form_input('duracion',$evento['duracion'],array("disabled"=>"disabled",'placeholder'=>'duracion','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
     <?php echo form_input('costo',$evento['costo'],array("disabled"=>"disabled",'placeholder'=>'costo','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('silabo/add', 'Silabo:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($silabos as $row){
	      $options[$row->idsilabo]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idsilabo','value'=>$options[$evento['idsilabo']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<?php echo form_close(); ?>



<script type="text/javascript">

$(document).ready(function(){
	var idevento = 39; // $('select[name=idevento]').val();
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechas')?>', type: 'GET',data:{idevento:idevento}},},});
});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idpersona');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>




</body>









</html>
