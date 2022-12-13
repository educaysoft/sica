<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("certificado/save") ?>
<?php echo form_hidden("idcertificado")  ?>




<div class="form-group row">
<label class="col-md-2 col-form-label">Propietario:</label>
<div class="col-md-10">
<?php
echo form_input("propietario","", array("placeholder"=>"Nombre de la Propietario")); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Archivo:</label>
<div class="col-md-10">
<?php
echo form_input("archivo","", array("placeholder"=>"Direccción y nombre dle archivo"));
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo de documento:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}
 echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu','onchange'=>'get_tipodocu()'));  
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo de documento:</label>
<div class="col-md-10">
    <div class="form-group">
         <select class="form-control" id="iddocumento" name="iddocumento" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ancho certi x(296.67):</label>
<div class="col-md-10">
<?php
echo form_input("ancho_x","", array("placeholder"=>"Ancho del certificado x"));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Alto certi y(210.56) :</label>
<div class="col-md-10">
<?php
echo form_input("alto_x","", array("placeholder"=>"Alto del certificado y"));
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Posi nombre  x(0.00)  :</label>
<div class="col-md-10">
<?php
echo form_input("posi_nomb_x","", array("placeholder"=>"Posicion del nombre en x"));
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Posi nombre  y(0.00)  :</label>
<div class="col-md-10">
<?php
echo form_input("posi_nomb_y","", array("placeholder"=>"Posicion del nombre en y")); 
?>
</div>
</div>





<div class="form-group row">
<label class="col-md-2 col-form-label">Posi codigo  x(0.00):</label>
<div class="col-md-10">
<?php
echo form_input("posi_codigo_x","", array("placeholder"=>"Posicion del codigore en x")); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Posi codigo  y(65.00):</label>
<div class="col-md-10">
<?php
echo form_input("posi_codigo_y","", array("placeholder"=>"Posicion del codigore en y")); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Posi fecha  x(0.00): </label>
<div class="col-md-10">
<?php
echo form_input("posi_fecha_x","", array("placeholder"=>"Posicion del fechare en x"));
?>
</div>
</div>





<div class="form-group row">
<label class="col-md-2 col-form-label"> Posi fecha  y(165.00):</label>
<div class="col-md-10">
<?php
echo form_input("posi_fecha_y","", array("placeholder"=>"Posicion del fechare en y")); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Head del correo:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correohead",'id'=>'correohead' );    
 echo form_textarea("correohead","", $textarea_options); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Subject:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correosubject",'id'=>'correosubject' );    
 echo form_textarea("correosubject","", $textarea_options); 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Foot del correo:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"correofoot",'id'=>'correofoot' );    
 echo form_textarea("correofoot","", $textarea_options); 
?>
</div>
</div>


<table>
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


