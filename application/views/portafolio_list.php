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

<?php $id=$idpersona; ?>


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Lista de portafolios 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>


	<div id="eys-nav-i">
	<ul>
    		<li> <?php echo anchor('portafolio', 'Home'); ?></li>
	</ul>
       	</div>
<br>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>idporta</th>
 <th>idperiodo</th>
 <th>idpersona</th>
 <th>periodo</th>
 <th>persona</th>
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
	var idpersona="<?php echo $id; ?>";
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafolio/portafolio_data')?>', type: 'GET', data:{idpersona:idpersona}},});

});

$('#show_data').on('click','.item_ver',function(){
	var id= $(this).data('idportafolio');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;
});


$('#show_datap').on('click','.docu_ver',function(){

var ordenador = "https://"+$(this).data('ordenador');
var ubicacion = $(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;

});




</script>

