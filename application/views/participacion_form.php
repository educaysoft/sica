
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("participacion/save") ?>
<table>

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
<td> fecha : </td>
<td><?php echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  ?></td>
</tr>









<tr>
    <td>Participantes:</td>
    <td>
    <div class="form-group">
         <select class="form-control" id="idpersona" name="idpersona" multiple required size="10" onChange='get_participacion()'>
                 <option>No Selected</option>
          </select>
    </div>

</td>

</tr>








<tr>
<td> Tipo de participacion: </td>
<td><?php 

$options= array('--Select--');
foreach ($tipoparticipacions as $row){
	$options[$row->idtipoparticipacion]= $row->nombre;
}

 echo form_dropdown("idtipoparticipacion",$options, set_select('--Select--','default_value'),array("id"=>"idtipoparticipacion"));  ?></td>
</tr
<tr>
<td> Comentario: </td>
<td><?php echo form_input(array("name"=>"comentario","id"=>"comentario","type"=>"text"));  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("participacion","Atrás") ?> </td>
</tr>





</table>
<?php echo form_close();?>



  <script>
function get_participantes() {
	var idevento = $('select[name=idevento]').val();
    $.ajax({
        url: "<?php echo site_url('participacion/get_participantes') ?>",
        data: {idevento:idevento},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
	document.getElementById('idpersona').setAttribute('size',"'"+data.length+"'");
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


function get_participacion() {
	var fecha = document.getElementById("fecha").value;
	var idevento=document.getElementById("idevento").value;
//	var idpersona= $('select[name=idpersona]').val();
	var idpersona=document.getElementById("idpersona").value;
	alert(idpersona);
    $.ajax({
        url: "<?php echo site_url('participacion/get_participacionp') ?>",
        data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].tipoparticipacion+'</option>';
	document.getElementById("comentario").value=data[i].comentario;
        }
        $('#idtipoparticipacion').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




function get_participacion2() {
	var fecha = document.getElementById("fecha").value;
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();


    $.ajax({
        url: "<?php echo site_url('participacion/get_participacion') ?>",
        data: {idevento : idevento, fecha : fecha, idpersona : idpersona},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}



</script>
