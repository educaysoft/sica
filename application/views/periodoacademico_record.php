<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($periodoacademico))
{
?>
        <li> <?php echo anchor('periodoacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('periodoacademico/siguiente/'.$periodoacademico['idperiodoacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('periodoacademico/anterior/'.$periodoacademico['idperiodoacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('periodoacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('periodoacademico/add', 'Nuevo'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('periodoacademico/edit/'.$periodoacademico['idperiodoacademico'],'Edit'); ?></li>
   <!---     <li style="border-right:1px solid green"> <?php echo anchor('periodoacademico/delete/'.$periodoacademico['idperiodoacademico'],'Delete'); ?></li>  --->
        <li> <?php echo anchor('periodoacademico/listar/','Listar'); ?></li>
        <li> <?php echo anchor('calendarioacademico/','Calendario'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('periodoacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('periodoacademico/save_edit') ?>
<?php echo form_hidden('idperiodoacademico',$periodoacademico['idperiodoacademico']) ?>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Periodo acad.: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idperiodoacademico',$periodoacademico['idperiodoacademico'],array("id"=>"idperiodoacademico", "disabled"=>"disabled"));
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrecorto',$periodoacademico['nombrecorto'],array('placeholder'=>'Nombre corto del periodoacademico'));

	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('nombrelargo',$periodoacademico['nombrelargo'],array('placeholder'=>'Nombre largo del periodoacademico'));
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio: </label>
	<div class="col-md-10">
     	<?php 

       echo form_input('fechainicio',$periodoacademico['fechainicio'],array('placeholder'=>'Fecha en que inicia el periodoacademico')); 

?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha finaliza: </label>
	<div class="col-md-10">
     	<?php 
echo form_input('fechafin',$periodoacademico['fechafin'],array('placeholder'=>'Fecha en que finaliza el periodoacademico')); 
?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label" > Lista de silabos : </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>iddocente</th>
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
	var idperiodoacademico=document.getElementById("idperiodoacademico").value;
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('periodoacademico/silabo_data')?>', type: 'GET',data:{idperiodoacademico:idperiodoacademico}},});


});








$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retornos');
window.location.href = retorno+'/'+id;
});





</script>

</body>
