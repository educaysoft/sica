<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("fechacalendaria/save") ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Silabo:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}

 echo form_dropdown($name="idsilabo",$options, set_select('--Select--','default_value'),array('id'=>'idsilabo','onchange'=>'get_periodoacademico()'));  
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad silabo:</label>
<div class="col-md-10">
    <div class="form-group">
         <select class="form-control" id="idperiodoacademico" name="idperiodoacademico" required>
                 <option>No Selected</option>
          </select>
    </div>

</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
 echo form_input("actividad","", array("placeholder"=>"Nombre de fechacalendaria",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
 echo form_input("detalle","", array("placeholder"=>"Nombre de fechacalendaria",'style'=>'width:500px;'));
		?>
	</div> 
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha impartida:</label>
<div class="col-md-10">
<?php


 echo form_input(array("name"=>"fechaimpartida","id"=>"fechaimpartida","type"=>"date"));  

?>
</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración (minutos):</label>
	<div class="col-md-10">
		<?php
 echo form_input("duracionminutos","", array("placeholder"=>"Duracion en minutos",'style'=>'width:100px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número de sesión:</label>
	<div class="col-md-10">
		<?php
 echo form_input("numerosesion","", array("placeholder"=>"número de sesión",'style'=>'width:50px;'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Videotutorial:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($instituciones as $row){
		$options[$row->idinstitucion]= $row->nombre;
	}
	 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>


<table>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("fechacalendaria","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>



  <script>



function get_periodoacademico() {
	var idsilabo = $('select[name=idsilabo]').val();
    $.ajax({
        url: "<?php echo site_url('fechacalendaria/get_periodoacademico') ?>",
        data: {idsilabo: idsilabo},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idperiodoacademico+'>'+data[i].nombre+'</option>';
        }
        $('#idperiodoacademico').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


  </script>


