<?php echo form_open('sesionevento/save_edit') ?>
<?php echo form_hidden('idsesionevento',$sesionevento['idsesionevento']) ?>
<h2> <?php echo $title; ?></h2>
<hr />



<div class="form-group row">
<label class="col-md-2 col-form-label">Id sesionevento:</label>
<div class="col-md-10">
<?php
$eys_arrinput=array('name'=>'idsesionevento','value'=>$sesionevento['idsesionevento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput);

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

echo form_dropdown("idevento",$options, $sesionevento['idevento']); 

?>
</div>
</div>


<?php

 $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
   date_default_timezone_set('America/Guayaquil');
    $fecha = $sesionevento['fecha']; // date("Y-m-d");
    $horai=  $sesionevento['horainicio']; //  date("H:i:s");


$sesiondictada= array();
foreach ($sesioneventos as $row){
	$sesiondictada[$row->fecha]= $row->idsesionevento;
}


	$sesionactual=0;
	$sesiontotal=0;

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $sesiones=array();
     $i=1;
    do {
	
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){    //verifica si la fecha esta en el horario.
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			//$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
		//	if($sesionactual==0){
		//	if(!isset($sesiondictada[$fechasesion]))
		//	{
		//		$fecha=$fechasesion;
		//	}}
			
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}
			
			$sesiontotal=$sesiontotal+1;
			$i=$i+1;
		}
	}
		$fechasesion=date("Y-m-d",strtotime($fechasesion."+ 1 days")); 

    }while(strtotime($fechasesion)<=strtotime($calendarioacademico[0]->fechahasta));


	$eldia="No encontrado";	
    	$lahorai="00:00:00";
    	$lahoraf="00:00:00";

	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fecha))];
		//$echo $dia. " = ".$row->nombre."\n";
		if($row->nombre==$dia ){
			$eldia=$dia;
			$lahorai=$row->horainicio;
			$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
		}
	}
	//die();

    	$horaf= date("H:i:s",strtotime(' + 2 hours'));



?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha:</label>
<div class="col-md-10">
<?php

	echo form_input( array("name"=>'fecha',"id"=>'fecha',"readonly"=>"true","value"=>$sesionevento['fecha'],'type'=>'date','placeholder'=>'fecha')); echo $eldia." (sesión # ".$sesionactual.")";

?>
</div>
</div>

 




<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('tema/actual/'.$sesionevento['idtema'], 'Temas tratados:'); ?>:</label>
<div class="col-md-10">
<select class="form-control" id="idtema" name="idtema" multiple="multiple" required  size="8" style="height:100%,">
<?php

$options= array('--Select--');
foreach ($temas as $row){
	echo "<option value='".$row->idtema."'>"."Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto."</option>";
	if($row->idtema==$sesionevento['idtema'])
		$unidad=$row->unidad;
}
?>
</select>

</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema:</label>
<div class="col-md-10">
<?php

  
$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20','maxlength'=>'50','style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"temacorto");    
echo form_textarea('temacorto',$sesionevento['temacorto'],$textarea_options ); 
?><div id="textarea_feedback"></div>
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
 
 echo form_dropdown("idunidadsilabo",$options,$unidad, array('id'=>'idunidadsilabo'));  
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"tema");    
echo form_textarea('tema',$sesionevento['tema'],$textarea_options ); 

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00",'value'=>$sesionevento['horainicio'], "style"=>"width:500px");
echo form_input($eys_arrinput); echo $lahorai;

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php

	if($sesionevento['horafin']=="00:00:00"){
   		date_default_timezone_set('America/Guayaquil');
    		$date = date("Y-m-d");
    		$sesionevento['horafin']= date("H:i:s");
     }
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00",'value'=>$sesionevento['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); echo $lahoraf;


?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluacion:</label>
<div class="col-md-10">
<?php

     
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

echo form_dropdown("idmodoevaluacion",$options, $sesionevento['idmodoevaluacion']);

?>
</div>
</div>




<table>
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">  </td>
 </tr>
</table>
<?php echo form_close(); ?>

<script>
  var idtema=<?php echo $sesionevento['idtema']; ?>;
 $("#idtema option[value='" + idtema + "']").prop("selected", true);

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
