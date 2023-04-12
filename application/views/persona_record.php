<div id="eys-nav-i">
<span style="text-align: left; font-size:large;"> <?php echo $title;  ?></span><idem style="font-size:large" id="idpersona"><?php echo $persona['idpersona']; ?></idem></span> <?php echo ($persona['eliminado']==1)? '<span style="font-size:large">ELIMINADO</span>':'<span style="font-size:large">ACTIVO</span>'; ?>

<?php
if(isset($persona))
{

	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("evento"==$row["modulo"]["nombre"]);
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}

?>


<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>
<ul>

        <li> <?php echo anchor('persona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('persona/siguiente/'.$persona['idpersona'], 'siguiente'); ?></li>
        <li> <?php echo anchor('persona/anterior/'.$persona['idpersona'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('persona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('persona/edit/'.$persona['idpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('persona/quitar/'.$persona['idpersona'],'Quitar'); ?></li>
        <li> <?php echo anchor('persona/listar/','Listar'); ?></li>

	<?php } ?>
<?php 
}else{
?>

        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('persona/save_edit') ?>
<?php echo form_hidden('idpersona',$persona['idpersona']) ?>


 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Cédula:</label>
	<div class="col-md-10">
	<?php
      		echo form_input('cedula',$persona['cedula'],array("disabled"=>"disabled",'placeholder'=>'cedula')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Apellido:</label>
	<div class="col-md-10">
	<?php
     		 echo form_input('apellidos',$persona['apellidos'],array("disabled"=>"disabled",'placeholder'=>'apellidos')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
	<?php
      echo form_input('nombres',$persona['nombres'],array("disabled"=>"disabled",'placeholder'=>'nombres')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de nacimiento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechanacimiento',$persona['fechanacimiento'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento')) ;

	?>
	</div> 
</div> 

<div class="form-group row">
<label class="col-md-2 col-form-label"> Sexo: </label>
	<div class="col-md-10">
     	<?php 
	$options= array("NADA");
	foreach ($sexos as $row){
		$options[$row->idsexo]= $row->nombre;
	}
	echo form_input('idsexo',$options[$persona['idsexo']],array("disabled"=>"disabled",'style'=>'width:600px;'));
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('correo/add/'.$persona['idpersona'], 'Correo:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($correos as $row){
		$options[$row->idcorreo]=$row->nombre;
	}
 echo form_multiselect('correo[]',$options,(array)set_value('idcorreo', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('telefono/add', 'Teléfono:'); ?>:</label>
	<div class="col-md-10">
	<?php

 	$options = array();
  	foreach ($telefonos as $row){
		$options[$row->idtelefono]=$row->numero;
	}
 echo form_multiselect('telefono[]',$options,(array)set_value('idtelefono', ''), array('style'=>'width:500px')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('nacionalidadpersona/add', 'Nacionalidad :'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($nacionalidadpersonas as $row){
		$options[$row->idnacionalidadpersona]=$row->lanacionalidad;
	}
 echo form_multiselect('nacionalidadpersona[]',$options,(array)set_value('idnacionalidadpersona', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('paispersona/add', 'Pais resicencia:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($paispersonas as $row){
		$options[$row->idpaispersona]=$row->elpais;
	}
 echo form_multiselect('paispersona[]',$options,(array)set_value('idpaispersona', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('provinciapersona/add', 'Provincia resicencia:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($provinciapersonas as $row){
		$options[$row->idprovinciapersona]=$row->laprovincia;
	}
 echo form_multiselect('provinciapersona[]',$options,(array)set_value('idprovinciapersona', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fofo:</label>
	<div class="col-md-10">
	<?php
      echo form_input('foto',$persona['foto'],array("disabled"=>"disabled",'placeholder'=>'foto'));

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
            <b>Estudios realizados: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('estudio/add/'.$persona['idpersona']) ?>">Nueva estudio</a><a class="btn btn-danger" href="<?php echo base_url('docente/reportepdf/'.$persona['idpersona']) ?>">Reporte</a>
        </div>
    </div>
</div>



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






<div class="form-group row" >

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Documentos subidos: </b>

        </div>
    </div>
</div>






	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddocu</th>
	 <th>idpersona</th>
	 <th>titulo</th>
	 <th>elabor.</th>
	 <th>archvo.</th>
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
	var idpersona=document.getElementById("idpersona").innerHTML;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('persona/documento_data')?>', type: 'GET',data:{idpersona:idpersona}},});
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('docente/estudio_data')?>', type: 'GET',data:{idpersona:idpersona}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


$('#show_datae').on('click','.item_vere',function(){
var id= $(this).data('idestudio');
var retorno= $(this).data('retornoe');
window.location.href = retorno+'/'+id;
});





</script>



</body>









</html>
