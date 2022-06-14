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


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">

             <div class="col-md-12">
                 <h3>Lista de eventos 
        	</h3>
       	     </div>


<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Estado:</label>
	<?php
		$options= array('--Select--');
		foreach ($evento_estado as $row){
			$options[$row->idevento_estado]= $row->nombre;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idevento_estado",$options, set_select('--Select--','default_value'),array('onchange'=>'filtra_evento()'));  
		?>
	</div>
	</div>


<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>IDevento</th>
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

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_data')?>', type: 'GET'},});

});




$('#show_data').on('click','.item_ver',function(){

	var id= $(this).data('idevento');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;

});



var idestado_evento=0;
function filtra_evento()
{

idestado_evento = $('select[name=idestado_evento]').val();


var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('evento/evento_data')?>', type: 'GET',data:{idestado_evento:idestado_evento}},});
}





</script>

