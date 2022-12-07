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
                 <h3>Fechacalendaria - Listar 
			  
        	</h3>
       	     </div>



<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Silabo:</label>
	<?php
		$options= array('--Select--');
		foreach ($fechacalendarias as $row){
			$options[$row->idunidadsilabo]= $row->elsilabo;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idsilabo",$options[$filtro], set_select('--Select--','default_value'),array('onchange'=>'filtra_silabo'));  
		?>
	</div>
	</div>




<div id="filtro"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>Silabo</th>
 <th>UnidadSilabo</th>
 <th>ID</th>
 <th>Descripción del fechacalendaria</th>
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

	var idunidadsilabo = document.getElementById("filtro").innerHTML;
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('fechacalendaria/fechacalendaria_data')?>', type: 'GET',data:{idunidadsilabo:idunidadsilabo}},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('idfechacalendaria');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

