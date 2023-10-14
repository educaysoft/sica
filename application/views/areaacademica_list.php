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
		<li> <?php echo anchor('persona', 'Home'); ?></li>
	</ul>
</div>

<br>


<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Areas académica: </b>
        </div>
        
    </div>
</div>



	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
 <th>ID</th>
 <th>descripcion</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datae">
	 </tbody>
	</table>
	</div>
	</div>
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
	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('areaacademica/areaacademica_data')?>', type: 'GET'},});
});

$('#show_datae').on('click','.item_ver',function(){
var id= $(this).data('idareaacademica');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


</script>

