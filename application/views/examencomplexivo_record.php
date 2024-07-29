<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?><idem style="font-size:large" id="idexamencomplexivo"><?php echo $examencomplexivo['idexamencomplexivo']; ?></idem></h3>
	    <ul>
<?php
if(isset($examencomplexivo))
{
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if($row["modulo"]["id"]==16) //modulo examencomplexivo
			{
				$numero=$j; //el inidice del arreglo donde estan los permisos
				$permitir=1; //indicador de que si se encontro permisos
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}


?>

        <li> <?php echo anchor('examencomplexivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('examencomplexivo/siguiente/'.$examencomplexivo['idexamencomplexivo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('examencomplexivo/anterior/'.$examencomplexivo['idexamencomplexivo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('examencomplexivo/elultimo/', 'Último'); ?></li>
	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('examencomplexivo/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>

        <li> <?php echo anchor('examencomplexivo/edit/'.$examencomplexivo['idexamencomplexivo'],'Edit'); ?></li>
	<?php } ?>

	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>

        <li style="border-right:1px solid green"> <?php echo anchor('examencomplexivo/delete/'.$examencomplexivo['idexamencomplexivo'],'Delete'); ?></li>
	<?php } ?>
	
	<?php
	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
		<li> <?php echo anchor('examencomplexivo/listar/','Listar'); ?></li>
	<?php } ?>

		<li> <?php echo anchor('examencomplexivo/genpagina/19','generar web'); ?></li>
		<li> <?php echo anchor('examencomplexivo/paginaweb',' web'); ?></li>


		<li> <?php echo anchor('examencomplexivo/genpagina2/19','generar egresado'); ?></li>
		<li> <?php echo anchor('examencomplexivo/paginaweb2',' web2'); ?></li>
		<li> <?php echo anchor('examencomplexivo/reportepdf/'.$examencomplexivo['idexamencomplexivo'],'reportepdf'); ?></li>
        
		


<?php 
}else{
?>

        <li> <?php echo anchor('/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('examencomplexivo/save_edit') ?>
<?php echo form_hidden('idexamencomplexivo',$examencomplexivo['idexamencomplexivo']) ?>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre/TituloAsunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('nombre',$examencomplexivo['nombre'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resumen:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('resumen',$examencomplexivo['resumen'],$textarea_options); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('egresado/add2/'.$examencomplexivo['idexamencomplexivo'], 'egresado/s:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($egresados as $row){
		$options[$row->idegresado]=$row->elegresado;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idegresado[]',$options,(array)set_value('idegresado', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tutorexamencomplexivo/add/'.$examencomplexivo['idexamencomplexivo'], 'tutorexamencomplexivoes') ?> </label>
     	<?php 
	$options=array();
  	foreach ($tutorexamencomplexivoes as $row){
		$options[$row->idpersona]=$row->eltutorexamencomplexivo;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('idtutorexamencomplexivo[]',$options,(array)set_value('idtutorexamencomplexivo',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechacreacion',$examencomplexivo['fechacreacion'],array('type'=>'date','placeholder'=>'fechacreacion','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora Creación:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('horacreacion',$examencomplexivo['horacreacion'],array('type'=>'date','placeholder'=>'fecha de carga','style'=>'width:500px;')) 
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
            <b>Documentos del examencomplexivo: </b>
        </div>
        <div class="pull-right">
       <a class="btn btn-danger" href="<?php echo base_url('documentoexamencomplexivo/add/'.$examencomplexivo['idexamencomplexivo']) ?>">Nuevo documento</a> 
<div class="col-md-10">


	
</div>
        </div>
    </div>
</div>
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddopo</th>
	 <th>iddocu</th>
	 <th>tipo</th>
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



<script>



$(document).ready(function(){
	var idexamencomplexivo=document.getElementById("idexamencomplexivo").innerHTML;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('examencomplexivo/documento_data')?>', type: 'GET',data:{idexamencomplexivo:idexamencomplexivo}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumentoexamencomplexivo');
var retorno= $(this).data('retorno1');
window.location.href = retorno+'/'+id;
});

$('#show_data').on('click','.item_doc',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno2');
window.location.href = retorno+'/'+id;
});



$('#show_data').on('click','.docu_ver',function(){


var ordenador = "https://"+$(this).data('ordenador');
var ubicacion = $(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;

});



















function verpdf(){

var orde=document.getElementById("idordenador").value;
var dire=document.getElementById("iddirectorio").value;
var ordenador = "https://"+orde;
var ubicacion=dire;
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archi=document.getElementById("archivopdf").value;
var archivo =archi;
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;


}





</script>



</body>







</html>
