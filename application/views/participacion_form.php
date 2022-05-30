<h2> <?php echo $title; ?>(<?php echo anchor('participacion/reporte/'.$eventos[0]->idevento, 'Reporte'); ?>)</h2>
<hr/>
<?php echo form_open(); ?>
<br>


<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php
//print_r($eventos);
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento','onchange'=>'get_participantes()'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha evaluacion:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($fechaeventos as $row){
	$options[$row->idfechaevento]= $row->fecha." - ".$row->tema;
}
 echo form_dropdown("idfechaevento",$options, set_select('--Select--','default_value'),array('id'=>'idfechaevento','onchange'=>'get_participantes2()'));  

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Participantes:</label>
<div class="col-md-10">

         <select class="form-control" id="idpersona" name="idpersona" multiple="multiple" required size="30" style="height: 100%;" onChange='get_participacion()'>
                 <option>No Selected</option>
          </select>
  </div>
</div>







<div class="form-group row">
<label class="col-md-2 col-form-label"> % de participación:</label>
<div class="col-md-10">
<?php
echo form_input(array("name"=>"porcentaje","id"=>"porcentaje","type"=>"text"));

?>

</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label"> Comentario:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"comentario",'id'=>'comentario' );
echo form_textarea("comentario","",$textarea_options);

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo participacion:</label>
<div class="col-md-10">
<?php
//print_r($tipoparticipacions);
$options= array('--Select--');
foreach ($tipoparticipacion as $row){
	$options[$row->idtipoparticipacion]= $row->nombre;
}
 echo form_dropdown("idtipoparticipacion",$options, set_select('--Select--','default_value'),array('id'=>'idtipoparticipacion'));  

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label"> % ayuda:</label>
<div class="col-md-10">
<?php
echo '<table><tr><td>';
echo form_input(array("name"=>"ayuda","id"=>"ayuda","type"=>"text"));
echo '</td><td><span style="font-size:20px;" id="demo" onclick="save_nota()">Guardar nota.</span></td></tr></table>';

?>

</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label"> persona:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"selpersona","id"=>"selpersona","type"=>"text", 'style'=> 'width:50%;'));  

?>
</div>
</div>




<?php echo form_close();?>



<script>


	$(document).ready(()=>{
	  var idevento= <?php echo $idevento; ?>;
	  if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     







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
	//document.getElementById('idpersona').setAttribute('size',"'"+data.length*2+"'");

        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].idpersona+'>'+data[i].nombres+'</option>';
        }
        $('#idpersona').html(html);

	var select = document.getElementById('idpersona');
	select.size = select.length;  
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}



function get_participantes2() {
	var idevento = $('select[name=idevento]').val();
	var f = document.getElementById("idfechaevento");
  	var arrtmp=f.options[f.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var fecha=x[0];
    if(fecha=="--Select--"){
      alert("debe seleccionar una fecha");
   }else{
    $.ajax({
        url: "<?php echo site_url('participacion/get_participantes2') ?>",
        data: {idevento:idevento,fecha:fecha},
        method: 'POST',
	      async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        var l=data.length+1;
        document.getElementById('idpersona').setAttribute('size',"'"+l+"'");
        for(i=0; i<data.length; i++){
		if(data[i].porcentaje!=" "){
			html += '<option style="color:green;"  value='+data[i].idpersona+'>'+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].porcentaje+'</option>';
		}else{
			html += '<option style="color:red;" value='+data[i].idpersona+'>'+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].porcentaje+'</option>';
		}
        }
        $('#idpersona').html(html);


        var select = document.getElementById('idpersona');
        select.size = select.length;  
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
}
}





function get_participacion() {
	var f = document.getElementById("idfechaevento");
  var fecha=f.options[f.selectedIndex].text;
	var idevento=document.getElementById("idevento").value;
//	var idpersona= $('select[name=idpersona]').val();
	var idpersona=document.getElementById("idpersona").value;
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

        if(data.length!=1){

  //        for(i=0; i<data.length; i++){
  //          html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
  //        }
          document.getElementById("comentario").value="";
	  document.getElementById("selpersona").value=data[i].lapersona;
          document.getElementById("porcentaje").value="";
          document.getElementById("ayuda").value="";
        }else{

 //       for(i=0; i<data.length; i++){
//          html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
          document.getElementById("comentario").value=data[0].comentario;
          document.getElementById("porcentaje").value=data[0].porcentaje;
          document.getElementById("ayuda").value=data[0].ayuda;
//        }
        }
//        $('#idtipoparticipacion').html(html);
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
        get_participantes2();
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




function save_nota() {
	var f = document.getElementById("idfechaevento");
  	var arrtmp=f.options[f.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var fecha=x[0];
	var idevento=document.getElementById("idevento").value;
//	var idtipoparticipacion=document.getElementById("idtipoparticipacion").value;
	var porcentaje=document.getElementById("porcentaje").value;
	var comentario=document.getElementById("comentario").value;
	var ayuda=document.getElementById("ayuda").value;
	var idtipoparticipacion=document.getElementById("idtipoparticipacion").value;
	var idpersona= $('select[name=idpersona]').val();
	var p = document.getElementById("idpersona");
  var idpersona=p.options[p.selectedIndex].value;
      alert(fecha);
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idevento:idevento, fecha:fecha,porcentaje:porcentaje,comentario:comentario,idpersona:idpersona,idtipoparticipacion:idtipoparticipacion, ayuda:ayuda},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        get_participantes2();
        alert("Se guardo con exito");
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}








</script>
