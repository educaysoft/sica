<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($aula))
{
?>
        <li> <?php echo anchor('aula/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('aula/siguiente/'.$aula['idaula'], 'siguiente'); ?></li>
        <li> <?php echo anchor('aula/anterior/'.$aula['idaula'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('aula/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('aula/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('aula/edit/'.$aula['idaula'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('aula/delete/'.$aula['idaula'],'Delete'); ?></li>
        <li> <?php echo anchor('aula/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('aula/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idaula',$aula['idaula']) ?>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Id artículo:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("id"=>"idaula",  "name"=>'idaula','value'=>$aula['idaula'],"disabled"=>"disabled",'placeholder'=>'Idaulas','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php

  $eys_arrctl=array("name"=>'nombre','value'=>$aula['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
     <?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$aula['detalle'],$textarea_options); 
		?>
	</div> 
</div>
  


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('Joranadadocente/add', 'Uso'); ?>: </label>
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idaula</th>
	 <th>asignatura</th>
	 <th>horainicio</th>
	 <th>duracionminutos.</th>
	 <th>nombre</th>
	 <th>nivel.</th>
	 <th>paralelo.</th>
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
	var idaula=document.getElementById("idaula").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('aula/prestamo_data')?>', type: 'GET',data:{idaula:idaula}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idprestamoaula');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>


</body>









</html>
