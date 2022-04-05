<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("certificado/save") ?>
<?php echo form_hidden("idcertificado")  ?>
<table>





<tr>
<td> Propietario </td>
<td><?php echo form_input("propietario","", array("placeholder"=>"Nombre de la Propietario"))  ?></td>
</tr>


<tr>
<td> Archivo </td>
<td><?php echo form_input("archivo","", array("placeholder"=>"Direccción y nombre dle archivo"))  ?></td>
</tr>

<tr>
<td> Evento: </td>
<td><?php 

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Tipo de documento: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

 echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu','onchange'=>'get_tipodocu()'));  ?></td>
</tr>



<tr>

    <td>Documento:</td>
    <td>
    <div class="form-group">
         <select class="form-control" id="iddocumento" name="iddocumento" required>
                 <option>No Selected</option>
          </select>
    </div>

</td>






</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("certificado","Atras") ?> </td>
</tr>







</table>
<?php echo form_close();?>

	 <script>

function get_tipodocu() {
	var idtipodocu = $('select[name=idtipodocu]').val();
    $.ajax({
        url: "<?php echo site_url('tipodocu/get_tipodocu') ?>",
        data: {idtipodocu: idtipodocu},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddocumento+'>'+data[i].asunto+'</option>';
        }
        $('#iddocumento').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}






</script>


