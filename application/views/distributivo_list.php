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
  <div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
	    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
		    <b>Lista de Distributivos: </b>

		</div>
	    </div>
	</div>


<div id="filtro"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatao">
 <thead>
 <tr>
 <th>iddistributivo</th>
 <th>Periodo</th>
 <th>Departamento/Carrera</th>
 <th>distributivo</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data_o">

 </tbody>
</table>
</div>
</div>
</div>




<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
	    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
		    <b>Lista de Distributivos- CULMINADOS: </b>

		</div>
	    </div>
	</div>


<div id="filtro"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>iddistributivo</th>
 <th>Periodo</th>
 <th>Departamento/Carrera</th>
 <th>distributivo</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data_c">

 </tbody>
</table>
</div>
</div>
</div>






<script type="text/javascript">

$(document).ready(function(){

	var idperiodoacademico = document.getElementById("filtro").innerHTML;
	var mytabla1= $('#mydatao').DataTable({"ajax": {url: '<?php echo site_url('distributivo/distributivo_data_open')?>', type: 'GET',data:{idperiodoacademico:idperiodoacademico}},});
	var mytabla2= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivo/distributivo_data_close')?>', type: 'GET',data:{idperiodoacademico:idperiodoacademico}},});

});

$('#show_data_o').on('click','.item_ver',function(){

var id= $(this).data('iddistributivo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

