
<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("participacion/save",array('id'=>'eys-form')); ?>
<br>


<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento','onchange'=>'get_participantes()'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha:</label>
<div class="col-md-10">
<?php
 echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Participantes:</label>
<div class="col-md-10">

         <select class="form-control" id="idpersona" name="idpersona" multiple required size="10" onChange='get_participacion()'>
                 <option>No Selected</option>
          </select>
  </div>
</div>





<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo participación:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($tipoparticipacions as $row){
	$options[$row->idtipoparticipacion]= $row->nombre;
}
 echo form_dropdown("idtipoparticipacion",$options, set_select('--Select--','default_value'),array("id"=>"idtipoparticipacion"));
?>
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

<div id="eys-nav-i">
	<ul>
		<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('documento', 'Cancelar'); ?></li>
	</ul>
</div>


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

        if(data.length>1){

          for(i=0; i<data.length; i++){
            html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
          }
          document.getElementById("comentario").value="";
          document.getElementById("porcentaje").value="";
        }else{

        for(i=0; i<data.length; i++){
          html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
          document.getElementById("comentario").value=data[i].comentario;
          document.getElementById("porcentaje").value=data[i].porcentaje;
        }
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
