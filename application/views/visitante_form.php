	<div id="eys-nav-i">
	<div style="text-align: left; font-size:large"> <?php echo $title  ?></div>
<?php echo form_open('visitante/save',array('id'=>'eys-form')); ?>
  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li>  <a href="javascript:{}"  onclick="history.back()" > volver atrás</a></li>
    </ul>
</div>

<br>


<div class="form-group row">
  <label class="col-md-2 col-form-label"> Oficina:</label>
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
  <label class="col-md-2 col-form-label">Visitante (<?php echo anchor('persona/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}
 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 



<div class="form-group row">
  <label class="col-md-2 col-form-label"> Fecha :</label>
	<div class="col-md-10">
		<?php

   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
    $hora= date("H:i:s");

	echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"true",  "type"=>"date","value"=>$fecha));  
	 
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora :</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"hora","id"=>"hora","type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00" ,"value"=>$hora));   

?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Motivo de visita:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Motivo de la visita" );    
 echo form_textarea("motivo","", $textarea_options);  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label"><a href="https://repositorioutlvte.org/firmadigital.php">Ruta firma :</a></label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"rutafirma","id"=>"rutafirma","type"=>"text"));   

?>
</div>
</div>


<!----
<div class="form-group row">
  <label class="col-md-2 col-form-label"> Firma :</label>
	<div class="col-md-10">
<img src="https://repositorioutlvte.org/Repositorio/firmas/6283d98adb149b69e19a1dfc7d76c93f.png"/>

</div>
</div>

--->



 




<?php echo form_close();?>






