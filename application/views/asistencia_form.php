
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("asistencia/save") ?>
<table>

<tr>
<td> fecha : </td>
<td><?php echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  ?></td>
</tr>





<tr>
<td> Evento: </td>
<td><?php 

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento','onchange'=>'get_participantes()'));  ?></td>
</tr>



<tr>
    <td>Participantes:</td>
    <td>
    <div class="form-group">
         <select class="form-control" id="idpersona" name="idpersona" multiple required>
                 <option>No Selected</option>
          </select>
    </div>

</td>

</tr>








<tr>
<td> Tipo de asistencia: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipoasistencias as $row){
	$options[$row->idtipoasistencia]= $row->nombre;
}

 echo form_dropdown("idtipoasistencia",$options, set_select('--Select--','default_value'));  ?></td>
</tr
<tr>
<td> Comentario: </td>
<td><?php echo form_input(array("name"=>"comentario","id"=>"comentario","type"=>"text"));  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asistencia","Atrás") ?> </td>
</tr>





</table>
<?php echo form_close();?>



  <script>
function get_participantes() {
	var idevento = $('select[name=idevento]').val();
    $.ajax({
        url: "<?php echo site_url('asistencia/get_participantes') ?>",
        data: {idevento: idevento},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idpersona+'>'+data[i].nombres+'</option>';
        }
        $('#idpersona').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}



</script>
