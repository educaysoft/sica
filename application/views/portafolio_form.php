<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("portafolio/save") ?>
<?php echo form_hidden("idportafolio")  ?>
<table>


<tr>
<td> Persona: </td>
<td><?php 

$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}

 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Periodo académico: </td>
<td><?php 

$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<div class="form-group row">
<label class="col-md-2 col-form-label">Ordenador destino:</label>
<div class="col-md-10">
<?php

    $options= array('--Select--');
    foreach ($ordenadores as $row){
      $options[$row->idordenador]= $row->nombre;
    }
     echo form_dropdown($name="idordenador",$options, set_select('--Select--','default_value'),array('id'=>'idordenador','onchange'=>'get_directorio()'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Directorio:</label>
<div class="col-md-10">
    <div class="form-group">
         <select class="form-control" id="iddirectorio" name="iddirectorio" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>








<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("portafolio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

