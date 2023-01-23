<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>

<div id="eys-nav-i">
	<ul>
		<li> <?php echo anchor('catedra', 'Home'); ?></li>
	</ul>
</div>


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">

             <div class="col-md-12">
                 <h3>Lista de catedras 
        	</h3>
       	     </div>


<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Estado:</label>
	<?php
		$options= array(0=>'--Select--');
		foreach ($catedra_estados as $row){
			$options[$row->idcatedra_estado]= $row->nombre;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idcatedra_estado",$options, 0,array('onchange'=>'filtra_catedra()'));  
		?>
	</div>
	</div>


<div id="filtro"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>IDcatedra</th>
 <th>Nombre</th>
 <th>Fecha</th>
 <th>Estado</th>
 <th>Institucion</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>



<script type="text/javascript">

$(document).ready(function(){

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('catedra/catedra_data')?>', type: 'GET'},});

});




$('#show_data').on('click','.item_ver',function(){

	var id= $(this).data('idcatedra');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});



$('#show_data').on('click','.item_ver2',function(){

	var id= $(this).data('idcatedra2');
	var retorno= $(this).data('retorno2');
	window.location.href = retorno+'/'+id;

});




var idcatedra_estado=0;
function filtra_catedra()
{
       var idcatedra_estado = $('select[name=idcatedra_estado]').val();

//	var idpersona = document.getElementById("filtro").innerHTML;
       
var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('catedra/catedra_data')?>', type: 'GET',data:{idcatedra_estado:idcatedra_estado}},});
}





</script>

