<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tema/save") ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Silabo:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}

 echo form_dropdown($name="idsilabo",$options, set_select('--Select--','default_value'),array('id'=>'idsilabo','onchange'=>'get_unidadsilabo()'));  
		?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad silabo:</label>
<div class="col-md-10">
    <div class="form-group">
         <select class="form-control" id="idunidadsilabo" name="idunidadsilabo" required>
                 <option>No Selected</option>
          </select>
    </div>

</div>
</div>










<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre corto:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombrecorto","", array("placeholder"=>"Nombre de tema",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre largo:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombrelargo","", array("placeholder"=>"Nombre de tema",'style'=>'width:500px;'));
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
	foreach ($videotutoriales as $row){
		$options[$row->idvideotutorial]= $row->nombre;
	}
	 echo form_dropdown("idvideotutorial",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Link presentación:</label>
	<div class="col-md-10">
	<?php
 echo form_input("linkpresentacion","", array("placeholder"=>"Link presentación",'style'=>'width:500px;'));
	?>
	</div> 
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluación:</label>
<div class="col-md-10">
<?php
$options= array();
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre."(Porderación=".$row->ponderacion.")";
}

 $primero= reset($options);
 echo form_dropdown("idmodoevaluacion",$options,$primero,array('id'=>'idmodoevaluacion'));  
?>
</div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Aula :</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($aulas as $row){
		$options[$row->idaula]= $row->nombre;
	}
	 echo form_dropdown("idaula",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div>




<table>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>



  <script>



function get_unidadsilabo() {
	var idsilabo = $('select[name=idsilabo]').val();
    $.ajax({
        url: "<?php echo site_url('tema/get_unidadsilabo') ?>",
        data: {idsilabo: idsilabo},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idunidadsilabo+'>'+data[i].nombre+'</option>';
        }
        $('#idunidadsilabo').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


  </script>


