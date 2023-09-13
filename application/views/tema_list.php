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
                 <h3>Tema - Listar 
			  
        	</h3>
       	     </div>



<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Silabo:</label>
	<?php
		$options= array('--Select--');
		foreach ($temas as $row){
			$options[$row->idunidadsilabo]= $row->elsilabo;
		}
		//print_r($options);
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
 <th>Descripción del tema</th>
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











<!--- MODAL ADD ---->

<form>
        <div class="modal fade" id="Modal_Edit" tabindex="-1"  role="dialog" arias-labelledby="exampleModalLabel" aria-hidden="true" >
                <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar tema</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">


                                        <div class="form-group row">
                                                <label class="col-md-2 col-form-label">idtema</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="idtema_edit" id="idtema_edit" class="form-control" placeholder="idtema">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nombre corto</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="nombrecorto_edit" id="nombrecorto_edit" class="form-control" placeholder="nombrecorto">
                                                </div>
                                        </div>

<div class="form-group row">
                                                <label class="col-md-2 col-form-label">Nombre largo</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="nombrelargo_edit" id="nombrelargo_edit" class="form-control" placeholder="nombrecorto">
                                                </div>
                                        </div>


                                        <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Objetivo aprendizaje</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="objetivoaprendizaje_edit" id="objetivoaprendizaje_edit" class="form-control" placeholder="Objetivo de aprendizaje">
                                                </div>
                                        </div>


                                        <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Experiencia</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="experiencia_edit" id="experiencia_edit" class="form-control" placeholder="Conocimiento previo">
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Reflexión:</label>
                                                <div class="col-md-10">
                                                        <input type="text" name="reflexion_edit" id="reflexion_edit" class="form-control" placeholder="reflexion">
                                                </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-md-2 col-form-label"> Secuencia:</label>
                                        <div class="col-md-10">
                                        <?php
                                        $textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"comentario",'id'=>'secuencia_edit' );
                                        echo form_textarea("secuencia_edit","",$textarea_options);

                                        ?>
                                        </div>
                                        </div>


<div class="form-group row">
                                        <label class="col-md-2 col-form-label"> Aprendizaje Autonomo:</label>
                                        <div class="col-md-10">
                                        <?php
                                        $textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"comentario",'id'=>'aprendizajeautonomo_edit' );
                                        echo form_textarea("aprendizajeautonomo_edit","",$textarea_options);

                                        ?>
                                        </div>
                                        </div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Unidad silabo:</label>
        <div class="col-md-10">
                <?php

$options= array('--Select--');
foreach ($unidadsilabos as $row){
        $options[$row->idunidadsilabo]= $row->nombre;
}

 echo form_dropdown("idunidadsilabo_edit",$options, $tema['idunidadsilabo']);
                ?>
        </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
        <div class="col-md-10">
                <?php
$eys_arrinput=array('name'=>'duracionminutos_edit','value'=>$tema['duracionminutos'], "style"=>"width:100px");
 echo form_input($eys_arrinput);
                ?>
        </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
        <div class="col-md-10">
                <?php
$eys_arrinput=array('name'=>'numerosesioni_edit','value'=>$tema['numerosesion'], "style"=>"width:50px");
 echo form_input($eys_arrinput);
                ?>
        </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Video tutorial:</label>
        <div class="col-md-10">
                <?php

$options= array('--Select--');
foreach ($videotutoriales as $row){
        $options[$row->idvideotutorial]= $row->nombre;
}

 echo form_dropdown("idvideotutorial_edit",$options, $tema['idvideotutorial']);
                ?>
        </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Link presentación:</label>
        <div class="col-md-10">
        <?php
        $textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Link presentacion" );
        echo form_textarea('linkpresentacion_edit',$tema['linkpresentacion'],$textarea_options );
        ?>
        </div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluacion:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($modoevaluacions as $row){
        $options[$row->idmodoevaluacion]= $row->nombre;
}

echo form_dropdown("idmodoevaluacion_edit",$options, $tema['idmodoevaluacion']);
?>
</div>
</div>







                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="submit" id="btn_update" class="btn btn-primary">Guardar</button>
                                </div>
                        </div>

                </div>
        </div>


</form>


























<script type="text/javascript">

$(document).ready(function(){

	var idunidadsilabo = document.getElementById("filtro").innerHTML;
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('tema/tema_data')?>', type: 'GET',data:{idunidadsilabo:idunidadsilabo}},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('idtema');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


$('#show_data').on('click','.item_update',function(){

	get_tema();

});

function get_tema() {
	var id= $(this).data('idtema');
    $.ajax({
        url: "<?php echo site_url('tema/get_tema') ?>",
        data: {idtema:idtema,nombrecorto:nombrecorto,nombrelargo:nombrelargo},
        method: 'GET',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var comentario="";
        var i;
        $('#Modal_Edit').modal('show');
      if(data.length!=1){
          $('[name="idtema_edit"]').val(0);
          $('[name="nombrecorto_edit"]').val("");
          $('[name="nombrelargo_edit"]').val(nombrelargo);

          $('[name="objetivoaprendizaje_edit"]').val(objetivoaprendizaje);
          $('[name="experiencia_edit"]').val(idpersona);
          $('[name="reflexion_edit"]').val("");
          $('[name="secuencia_edit"]').val("");
          $('[name="aprendizajeautonomo_edit"]').val("");
        }else{
          $('[name="idtema_edit"]').val(data[0].idtema);
          $('[name="nombrecorto_edit"]').val(data[0].nombrecorto);
          $('[name="nombrelargo_edit"]').val(data[0].nombrelargo);
          $('[name="objetivoaprendizaje_edit"]').val(data[0].objetivoaprendizaje);
          $('[name="experiencia_edit"]').val(data[0].experiencia);
          $('[name="reflexion_edit"]').val(data[0].reflexion);
          $('[name="secuencia_edit"]').val(data[0].secuencia);
          $('[name="aprendizajeautonomo_edit"]').val(data[0].aprendizajeautonomo);
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




























//function save_nota() {
$("#btn_update").on("click", function(){
        var f = document.getElementById("idtema");
        var nombrecorto=document.getElementById("nombrecorto_edit").value;
        var nombrelargo=document.getElementById("nombrelargo_edit").value;
        var objetivoaprendizaje=document.getElementById("objetivoaprendizaje_edit").value;
        var experiencia=document.getElementById("experiencia_edit").value;
        var reflexion=document.getElementById("reflexion_edit").value;
        var secuencia=document.getElementById("secuencia_edit").value;
        var aprendizajeautonomo=document.getElementById("aprendizajeautonomo_edit").value;
        var idunidadsilabo=document.getElementById("idunidadsilabo_edit").value;
        var duracionminutos=document.getElementById("duracionminutos_edit").value;
        var numerosesion=document.getElementById("numerosesion_edit").value;
        var idvideoturorial=document.getElementById("idvideoturorial_edit").value;
        var linkpresentacion=document.getElementById("linkpresentacion_edit").value;
        var idmodoevaluacion=document.getElementById("idmodoevaluacion_edit").value;
    $.ajax({
        url: "<?php echo site_url('tema/save_tema') ?>",
        data: {idtema:idtema,nombrecorto:nombrecorto,nombrelargo:nombrelargo,objetivoaprendizaje:objetivoaprendizaje,experiencia:experiencia, reflexion:reflexion,secuencia:secuencia,aprendizajeautonomo:aprendizajeautonomo,idunidadsilabo:idunidadsilabo,duracionminutos:duracionminutos,numerosesion:numerosesion,idvideoturorial:idvideotutorial,linkpresentacion:linkpresentacion,idmodoevaluacion:idmodoevaluacion},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        get_participantes2();
        $("#Modal_Edit").modal("hide");
        alert("Se guardo con exito");
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
    return false;

});















</script>

