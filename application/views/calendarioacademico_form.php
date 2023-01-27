<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("calendarioacademico/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Institucion:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($departamentos as $row){
		$options[$row->iddepartamento]= $row->nombre;
	}
	 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown($name="idperiodoacademico",$options, set_select('--Select--','default_value'),array('id'=>'idperiodoacademico'));  
		?>
	</div> 
</div>






 















<table>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("calendarioacademico","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>



  <script>



function get_periodoacademico() {
	var idperiodoacademico = $('select[name=idperiodoacademico]').val();
    $.ajax({
        url: "<?php echo site_url('calendarioacademico/get_periodoacademico') ?>",
        data: {idperiodoacademico: idperiodoacademico},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idperiodoacademico+'>'+data[i].nombrecorto+'</option>';
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


