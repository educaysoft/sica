
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("sesionevento/save") ?>


<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$idevento, 'Evento:'); ?> </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de la sesión:</label>
<div class="col-md-10">
<?php

 $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
   date_default_timezone_set('America/Guayaquil');
    $fecha = date("Y-m-d");
    $horai= date("H:i:s");

	$sesiondictada= array();
	foreach ($sesionevento as $row){
		$sesiondictada[$row->fecha]= $row->idsesionevento;
	}

	$sesionactual=0;
	$sesiontotal=0;

	$f = strtotime($evento['fechainicia']);

    $d = date( "j", $f);
    $m = date("n", $f);
    $a = date("Y", $f);

if(checkdate($m,$d,$a)){
 $fechasesion= $evento['fechainicia'];

	$f = strtotime($evento['fechafinaliza']);   //Chequendo que la fecha de finalizacion estes ingresada

    $d = date( "j", $f);
    $m = date("n", $f);
    $a = date("Y", $f);

	if(checkdate($m,$d,$a)){
		 $fechahasta= $evento['fechafinaliza'];
	}else{

		 $fechahasta= $calendarioacademico[0]->fechahasta; // sin no esta la fecha de fin en el evento se toma del calendario
	}



}else{   // sin no estan ingresadas las fecha en el evento se toma del calendario asignado

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $fechahasta=$calendarioacademico[0]->fechahasta;
}
 $sesiones=array();
     $i=1;
    do {
	
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){    //verifica si la fecha esta en el horario.
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
			if($sesionactual==0){
			if(!isset($sesiondictada[$fechasesion]))
			{
				$fecha=$fechasesion;
			}}
			
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}
			
			$sesiontotal=$sesiontotal+1;
			$i=$i+1;
		}
	}
		$fechasesion=date("Y-m-d",strtotime($fechasesion."+ 1 days")); 

    }while(strtotime($fechasesion)<=strtotime($fechahasta));


	$eldia="No encontrado";	
    	$lahorai="00:00:00";
    	$lahoraf="00:00:00";

	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fecha))];
		//$echo $dia. " = ".$row->nombre."\n";
		if($row->nombre==$dia ){
			$eldia=$dia;
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			//$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
		}
	}
	//die();

    	$horaf= date("H:i:s",strtotime(' + 2 hours'));
 	echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"true",  "type"=>"date","value"=>$fecha)); echo $eldia; 

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema dictados:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}
 echo form_dropdown("idtema",$options,$fecha, array('id'=>'idtema'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad:</label>
<div class="col-md-10">
<?php
$options= array();
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]="Unidad: ".$row->unidad;
}
 $primero= reset($options);
 
 echo form_dropdown("idunidadsilabo",$options,$primero, array('id'=>'idunidadsilabo'));  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Número de sesión:</label>
<div class="col-md-10">
<?php
 //print_r($sesionevento);
 //echo form_input("numerosesion",$sesionevento[0]->nsesion+1, array("readonly"=>"true","placeholder"=>"Numero de sesion"));
 echo form_input("numerosesion",$sesionactual, array("readonly"=>"true","placeholder"=>"Numero de sesion")); echo "/".$sesiontotal;

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema nombre(corto):</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4','maxlength'=> '50',   'cols' => '20', 'style'=> 'width:50%;height:100px;',"maxlength"=>200, "placeholder"=>"Descripción corta del tema","id"=>"temacorto" );    
 echo form_textarea("temacorto","", $textarea_options);  

?><div id="textarea_feedback"></div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tema descripción:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Descripción larga del tema" );    
 echo form_textarea("tema","", $textarea_options);  

?>
</div>
</div>










<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horainicio","id"=>"horainicio","type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00" ,"value"=>$horai)); echo $lahorai;  
 //echo form_input(array("name"=>"horainicio","id"=>"horainicio","readonly"=>"true","type"=>"time","value"=>$horai)); echo $lahorai;  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php
 $horaf="";
 echo form_input(array("name"=>"horafin","id"=>"horafin",  "type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00", "value"=>$horaf));  echo $lahoraf;
// echo form_input(array("name"=>"horafin","id"=>"horafin","readonly"=>"true",   "type"=>"time","value"=>$horaf));  echo $lahoraf;

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluación:</label>
<div class="col-md-10">
<?php
$options= array();
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre."(Porderación=".$row->ponderacion.")";
}

 $primero= reset($options);
 echo form_dropdown("idmodoevaluacion",$options,$primero,array('id'=>'idmodoevaluacion'));  
?>
</div>
</div>




<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?> <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás"></td>
</tr>

</table>
<?php echo form_close();?>

<script>

	$(document).ready(()=>{
	  var idevento= <?php echo $idevento; ?>;
	  if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     

$(document).ready(function() {
    var text_max = 50;
    $('#textarea_feedback').html('Quedan ' + text_max + ' caracteres');

    $('#temacorto').keyup(function() {
        var text_length = $('#temacorto').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html('Quedan ' + text_remaining + ' caracteres');
    });
});


</script>
