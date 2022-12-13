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
                 <h3>Lista de oficios 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>

<font size="2" face="Courier New">
<table width="100%" class="table table-striped table-bordered table-hover" id="mydatac"  >
 <thead>
 <tr>
 <th>ID</th>
 <th>Propietario</th>
 <th>archivo</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</font>
</div>
</div>
 </div> 





<script type="text/javascript">

$(document).ready(function(){

	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('oficio/oficio_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){

let ubicacion=$(this).data('ubicacion');
let archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
//window.location.href = "http://localhost/facae/index.php/oficio";
//window.location.href = "http://congresoutlvte.org/facped/Repositorio/Oficios/Oficio de Xiomara Grueso Guerrero.pdf";
//alert(certi);

window.location.href = certi;

});


</script>

