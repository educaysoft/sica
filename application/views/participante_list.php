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
    	<label class="col-md-2 col-form-label"> Evento:</label>
	<?php
		$options= array('--Select--');
		foreach ($eventos as $row){
			$options[$row->idevento]= $row->titulo;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('onchange'=>'filtra_participante()'));  
		?>
	</div>
	</div>


<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>idparticipante</th>
 <th>evento</th>
 <th>participante</th>
 <th>grupo</th>
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

var idevento=0;
function filtra_participante()
{

idevento = $('select[name=idevento]').val();


var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('participante/participante_dataxevento')?>', type: 'GET',data:{idevento:idevento}},});
}




$(document).ready(function(){

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('participante/participante_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

