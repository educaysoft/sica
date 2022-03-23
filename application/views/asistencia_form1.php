
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("asistencia/save") ?>
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
<td><?php echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  ?><p id="Ver" onclick="get_asistencia()">Ver</p>   </td>
</tr>

 
</table>

    <div class="form-group" id="participantes">

<table id="myTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Participante</th>
            <th>Tipo Asistencia</th>
            <th>Comentario</th>
        </tr>    
     </thead>
    <tbody></tbody>
</table>


    </div>


















<?php echo form_close();?>



  <script>





function get_participantes() {
	var idevento = $('select[name=idevento]').val();
	var myTable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    $.ajax({
        url: "<?php echo site_url('asistencia/get_participantes') ?>",
        data: {idevento:idevento},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;



        for(i=0; i<data.length; i++){
		let row = myTable.insertRow();
		let cell1 = row.insertCell(0);
		let cell2 = row.insertCell(1);
		let cell3 = row.insertCell(2);
		let cell4 = row.insertCell(3);


		cell1.innerHTML = i+1;
		cell2.innerHTML = data[i].nombres;
		cell3.innerHTML = "" 
		cell4.innerHTML = "";



        }


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


function get_asistencia() {
	var fecha = document.getElementById("fecha").value;
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();
	var mydiv = document.getElementById('participantes');
	mydiv.innerHTML='<table id="myTable"> <thead> <tr> <th>#</th> <th>Participante</th> <th>Tipo Asistencia</th>          <th>Comentario</th> </tr> </thead> <tbody></tbody></table>';


	
		var myTable = document.getElementById('myTable').getElementsByTagName('tbody')[0];
    $.ajax({
        url: "<?php echo site_url('asistencia/get_asistencia') ?>",
        data: {idevento:idevento,fecha:fecha},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;
        for(i=0; i<data.length; i++){
       
		let row = myTable.insertRow();
		let cell1 = row.insertCell(0);
		let cell2 = row.insertCell(1);
		let cell3 = row.insertCell(2);
		let cell4 = row.insertCell(3);


		cell1.innerHTML = i+1;
		cell2.innerHTML = data[i].lapersona;
		cell3.innerHTML = data[i].tipoasistencia;
		cell4.innerHTML = data[i].comentario;

	}


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




function get_asistencia2() {
	var fecha = document.getElementById("fecha").value;
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();


    $.ajax({
        url: "<?php echo site_url('asistencia/get_asistencia') ?>",
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
