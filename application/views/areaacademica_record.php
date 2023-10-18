<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('areaacademica/save_edit') ?>
    <ul>
        <li> <?php echo anchor('areaacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('areaacademica/anterior/'.$areaacademica['idareaacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('areaacademica/siguiente/'.$areaacademica['idareaacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('areaacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('areaacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('areaacademica/edit/'.$areaacademica['idareaacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('areaacademica/delete/'.$areaacademica['idareaacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('areaacademica/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idareaacademica',$areaacademica['idareaacademica']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id área:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idareaacademica',$areaacademica['idareaacademica'],array("disabled"=>"disabled","id"=>"idareaacademica",'placeholder'=>'Idareaacademicas')); 
	?>
	</div> 
</div>

 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripctión:</label>
	<div class="col-md-10">
	<?php

     echo form_input('nombre',$areaacademica['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')); 
	?>
	</div> 
</div>


 



<?php echo form_close(); ?>

<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Miembros del área académica: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('miembroareaacademica/add/'.$areaacademica['idareaacademica']) ?>">Nuevo miembro</a><a class="btn btn-danger" href="<?php echo base_url('docente/reportepdf/'.$areaacademica['idareaacademica']) ?>">Reporte</a>
        </div>
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
 <th>ID</th>
 <th>periodo</th>
 <th>miebro</th>
 <th>area</th>
 <th>Desde</th>
 <th>Hasta</th>
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



<script type="text/javascript">

$(document).ready(function(){
	var idareaacademica=document.getElementById("idareaacademica").value;
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('miembroareaacademica/miembroareaacademica_data')?>', type: 'GET',data:{idareaacademica:idareaacademica}},});


});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>




</body>









</html>
