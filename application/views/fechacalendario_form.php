<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("fechacalendario/save") ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Calendario académico:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($calendarioacademicos as $row){
	$options[$row->idcalendarioacademico]= $row->elcalendarioacademico;
}

 echo form_dropdown($name="idcalendarioacademico",$options, set_select('--Select--','default_value'),array('id'=>'idcalendarioacademico'));  
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Actividad realizada:</label>
	<div class="col-md-10">
		<?php
 echo form_input("actividad","", array("placeholder"=>"Nombre de fechacalendario",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle de actividad:</label>
	<div class="col-md-10">
		<?php
 echo form_input("detalle","", array("placeholder"=>"Nombre de fechacalendario",'style'=>'width:500px;'));
		?>
	</div> 
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha calendaria:</label>
<div class="col-md-10">
<?php


 echo form_input(array("name"=>"fechacalendario","id"=>"fechacalendario","type"=>"date"));  

?>
</div>
</div>











<table>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("fechacalendario","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>



  <script>



function get_calendarioacademico() {
	var idcalendarioacademico = $('select[name=idcalendarioacademico]').val();
    $.ajax({
        url: "<?php echo site_url('fechacalendario/get_calendarioacademico') ?>",
        data: {idcalendarioacademico: idcalendarioacademico},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idcalendarioacademico+'>'+data[i].nombrecorto+'</option>';
        }
        $('#idcalendarioacademico').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


  </script>


