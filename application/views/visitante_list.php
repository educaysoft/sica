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
		<li> <?php echo anchor('visitante', 'Home'); ?></li>
	</ul>
</div>



<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Lista de visitas 
			  
        	</h3>
       	     </div>

<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Por Persona:</label>
	<?php
		$options= array('--Select--');
		foreach ($personas as $row){
			$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'),array('onchange'=>'filtra_visitante()'));  
		?>
	</div>
	</div>


<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>idvisitante</th>
 <th>Oficina</th>
 <th>persona</th>
 <th>motivo</th>
 <th>fecha</th>
 <th>hora</th>
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

function filtra_visitante()
{

idpersona = $('select[name=idpersona]').val();


var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('visitante/visitante_dataxpersona')?>', type: 'GET',data:{idpersona:idpersona}},});
}




$(document).ready(function(){

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('visitante/visitante_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idvisitante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

