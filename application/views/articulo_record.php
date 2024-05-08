<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($articulo))
{
?>
        <li> <?php echo anchor('articulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('articulo/siguiente/'.$articulo['idarticulo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('articulo/anterior/'.$articulo['idarticulo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('articulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('articulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('articulo/edit/'.$articulo['idarticulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('articulo/delete/'.$articulo['idarticulo'],'Delete'); ?></li>
        <li> <?php echo anchor('articulo/listar/','Listar'); ?></li>
        <li> <?php echo anchor('articulo/genpagina/1','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('articulo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idarticulo',$articulo['idarticulo']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idarticulo",  "name"=>'idarticulo','value'=>$articulo['idarticulo'],"disabled"=>"disabled",'placeholder'=>'Idarticulos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$articulo['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$articulo['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foto:</label>
	<div class="col-md-10">
 <img src="https://repositorioutlvte.org/Repositorio/articulos/articulo<?php echo $articulo['idarticulo']; ?>.jpg" alt="articulo" width="400" height="300"> 
  

	</div> 
</div>



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12"	style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
		<?php echo anchor('ubicacionarticulo/add/'.$articulo['idarticulo'], 'Ubicación'); ?>:
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatau">
	 <thead>
	 <tr>
	 <th>idubicacionarticulo</th>
	 <th>idarticulo</th>
	 <th>launidad</th>
	 <th>Responsable</th>
	 <th>fecha</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datau">
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
  	<div class="col-12"  style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
 <?php echo anchor('prestamoarticulo/add', 'Prestamo'); ?>:
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idprestamoarticulo</th>
	 <th>idarticulo</th>
	 <th>lapersona</th>
	 <th>fechaprestamo.</th>
	 <th>horaprestamo.</th>
	 <th>fechadevolucion.</th>
	 <th>horadevolucion.</th>
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
	var idarticulo=document.getElementById("idarticulo").value;

	var mytablaf= $('#mydatau').DataTable({"ajax": {url: '<?php echo site_url('articulo/ubicacion_data')?>', type: 'GET',data:{idarticulo:idarticulo}},});


	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('articulo/prestamo_data')?>', type: 'GET',data:{idarticulo:idarticulo}},});
});

$('#show_datau').on('click','.item_ver',function(){
var id= $(this).data('idubicacionarticulo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoarticulo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
