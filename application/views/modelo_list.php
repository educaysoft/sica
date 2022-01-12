<div class="container">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Persona 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  <div class="float-right"><a href="javascript:void(0)" onclick="$('#Modal_Add').modal('show');"> Add New</a></div>
        	</h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydata">
 <thead>
 <tr>
 <th>ID</th>
 <th>CEDULA</th>
 <th>PASAPORTE</th>
 <th>NOMBRES</th>
 <th>NACIMIENTO</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>



 <!-- MODAL ADD -->
     <form>
     <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Cedula:</label>
                             <div class="col-md-10">
                               <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Cedula del Persona">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Nombres:</label>
                             <div class="col-md-10">
                               <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres del Persona">
                             </div>
                         </div>
 
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Pasaporte:</label>
                             <div class="col-md-10">
                               <input type="text" name="pasaporte" id="pasaporte" class="form-control" placeholder="Pasaporte">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Fecha nacimiento:</label>
                             <div class="col-md-10">
                               <input type="date" name="fecha_naci" id="fecha_naci" class="form-control" placeholder="Fecha de nacimiento:">
                             </div>
                         </div>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                   </div>
                 </div>
               </div>
             </div>
             </form>
         <!--END MODAL ADD-->

 <!-- MODAL EDIT -->
         <form>
             <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Editar persona</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
 
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">id:</label>
                             <div class="col-md-10">
                               <input type="text" name="idpersona_edit" id="idpersona_edit" class="form-control" placeholder="id de la persona" readonly>
                             </div>
                         </div>
  
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Cedula:</label>
                             <div class="col-md-10">
                               <input type="text" name="cedula_edit" id="cedula_edit" class="form-control" placeholder="Cedula del Persona" >
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Nombres:</label>
                             <div class="col-md-10">
                               <input type="text" name="nombres_edit" id="nombres_edit" class="form-control" placeholder="Nombres del Persona">
                             </div>
                         </div>
                         <div class="form-group row">
                             <label class="col-md-2 col-form-label">Pasaporte:</label>
                             <div class="col-md-10">
                               <input type="text" name="pasaporte_edit" id="pasaporte_edit" class="form-control" placeholder="Apellidos del Persona">
                             </div>
                         </div>
                          <div class="form-group row">
                             <label class="col-md-2 col-form-label">Fecha nacimiento:</label>
                             <div class="col-md-10">
                               <input type="date" name="fecha_naci_edit" id="fecha_naci_edit" class="form-control" placeholder="Fecha de nacimiento:">
                             </div>
                         </div>

                     <div class="form-group row">
                         <label class="col-md-2 col-form-label"> Genero: </label>
                         <div class="col-md-10">
                         <select id="idgenero_edit" name="idgenero_edit" class="form-control" noedit>
                       <option value='0'> NO ASIGNADO </option>
                         <?php
                          foreach($generos as $genero){
                                 echo "<option value='".$genero['idgenero']."'>".$genero['elgenero']."</option>";
                         }
                         ?>
                         </select>
                         </div>
                         </div>




                  </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                   </div>
                 </div>
               </div>
             </div>
             </form>
         <!--END MODAL EDIT-->


 <!--MODAL DELETE-->
          <form>
             <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Borrar persona</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                        <strong>Are you sure to delete this record?</strong>
                   </div>
                   <div class="modal-footer">
                     <input  name="idpersona_delete" id="idpersona_delete" class="form-control">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                     <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>

                   </div>
			<div>
                     <span id="delete-error" ></span>
			</div>
                 </div>
               </div>
             </div>
             </form>
         <!--END MODAL DELETE-->




<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" />
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
-->
<script type="text/javascript">
$(document).ready(function(){
//	show_persona();

	var mytabla= $('#mydata').DataTable({"ajax": {url: '<?php echo site_url('persona/persona_data')?>', type: 'GET'},});
  //Save product
         $('#btn_save').on('click',function(){
             var cedula = $('#cedula').val();
             var pasaporte = $('#pasaporte').val();
             var nombres = $('#nombres').val();
             var fecha_naci = $('#fecha_naci').val();
             $.ajax({
                 type : "POST",
                 url  : "<?php echo site_url('persona/save')?>",
                 dataType : "JSON",
                 data : {cedula:cedula,pasaporte:pasaporte,nombres:nombres,fecha_naci:fecha_naci},
                 success: function(data){
                     $('[name="cedula"]').val("");
                     $('[name="pasaporte"]').val("");
                     $('[name="nombres"]').val("");
                     $('[name="fecha_naci"]').val("");
                     $('#Modal_Add').modal('hide');
                  mytabla.ajax.reload(null,false);
                 }
	     });
	     return false;
	 });





   //get data for update record                                                           
         $('#show_data').on('click','.item_edit',function(){                                   
             var idpersona = $(this).data('idpersona');                                        
             var cedula = $(this).data('cedula');                                              
             var pasaporte = $(this).data('pasaporte');                                              
             var nombres = $(this).data('nombres');                                            
             var fecha_naci= $(this).data('fecha_naci');                               
             $('#Modal_Edit').modal('show');                                                   
             $('[name="idpersona_edit"]').val(idpersona);                                      
             $('[name="cedula_edit"]').val(cedula);                                            
             $('[name="pasaporte_edit"]').val(pasaporte);                                      
             $('[name="nombres_edit"]').val(nombres);                                          
             $('[name="fecha_naci_edit"]').val(fecha_naci);
         });

     $("#btn_update").on("click", function(){
                 var idpersona= $('#idpersona_edit').val();
                 var cedula= $('#cedula_edit').val();
                 var nombres=$('#nombres_edit').val();
                 var pasaporte=$('#pasaporte_edit').val();
                 var fecha_naci=$('#fecha_naci_edit').val();
                 $.ajax({type:"POST",url:"<?php echo site_url('persona/update')?>", dataType: "JSON", data:{idpersona:idpersona,cedula:cedula, nombres:nombres, pasaporte:pasaporte, fecha_naci:fecha_naci}, success: function(data){ 
                         $('[name="idpersona_edit"]').val("");
                         $('[name="cedula_edit"]').val("");
                         $('[name="nombres_edit"]').val("");
                         $('[name="pasaporte_edit"]').val("");
                         $('[name="fecha_naci_edit"]').val("");
                         $("#Modal_Edit").modal("hide"); mytabla.ajax.reload(null,false);}, error: function( jqXhr, textStatus, errorThrown ){
         console.log( errorThrown ); $("#Modal_Edit").modal("hide");} 
                 });
                 return false; 
         });

	 $('#show_data').on('click','.item_delete',function(){
		 var idpersona = $(this).data('idpersona');
		 document.getElementById('delete-error').innerHTML = "";
		 $('#Modal_Delete').modal('show');
		 $('[name="idpersona_delete"]').val(idpersona);
	 });



 //delete record to database
    $('#btn_delete').on('click',function(){
             var idpersona = $('#idpersona_delete').val();
             $.ajax({
                 type : "POST", url  : "<?php echo site_url('persona/delete')?>", dataType : "JSON", data : {idpersona:idpersona},
                 success: function(data){ $('[name="idpersona_delete"]').val(""); $('#Modal_Delete').modal('hide'); mytabla.ajax.reload(null,false);},
			 error: function( jqXhr,textStatus, errorThrown){ console.log( errorThrown); $('#delete-error').css('color', 'red'); $('#delete-error').html('Error');
			
			 }
             });
             return false;
         });

});
</script>

