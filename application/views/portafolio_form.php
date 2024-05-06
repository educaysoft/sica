<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("portafolio/save") ?>
<?php echo form_hidden("idportafolio")  ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
    <?php 
    $options= array('--Select--');
    foreach ($personas as $row){
	    $options[$row->idpersona]= $row->lapersona;
    }
     echo form_dropdown("idpersona",$options, set_select('--Select--','default_value'));  ?>
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
    echo form_dropdown("idperiodoacademico",$options, set_select('--Select--','default_value'));  ?></td>
	</div> 
</div>



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



<div id="eys-nav-i">
	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('portafolio', 'Cancelar'); ?></li>
	</ul>
</div>



<?php echo form_close();?>

