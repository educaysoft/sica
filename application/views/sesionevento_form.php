<div>
<div id="eys-nav-i">
<?php echo $title;  ?>
<?php echo form_open('sesionevento/save',array('id'=>'eys-form')); ?>
  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li>  <a href="javascript:{}"  onclick="history.back()" > volver atrás</a></li>
    </ul>
</div>
<br>

<?php

if(isset($temasprevios))
{
	
$nombrecortotema= array();
$nombrelargotema= array();
$secuenciatema= array();
$idunidadsilaboa= array();

foreach ($temasprevios as $row){
	$nombrecortotema[$row->numerosesion]=$row->nombrecorto;
	$nombrelargotema[$row->numerosesion]=$row->nombrelargo;
	$secuenciatema[$row->numerosesion]=$row->secuencia;
	$idunidadsilaboa[$row->numerosesion]=$row->idunidadsilabo;
}
}


?>





<?php
	$dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
	date_default_timezone_set('America/Guayaquil');
	$fecha = date("Y-m-d");
	$horai= date("H:i:s");
	$sesiondictada= array();
	$numerosesiondictada= array();
	$k=1;
	foreach ($sesionevento as $row){
		$sesiondictada[$row->fecha]= $row->idsesionevento;
		$numerosesiondictada[$k]= $row->idsesionevento;
		$k=$k+1;
	}

	$sesionactual=0;
	$sesiontotal=0;
	$f = strtotime($evento['fechainicia']);
	$d = date("j", $f);
	$m = date("n", $f);
	$a = date("Y", $f);

if(checkdate($m,$d,$a)){
 	$fechasesion= $evento['fechainicia'];
	//Chequeando que la fecha de finalizacion este ingresada
	$f = strtotime($evento['fechafinaliza']);   
    	$d = date( "j", $f);
    	$m = date("n", $f);
    	$a = date("Y", $f);
	if(checkdate($m,$d,$a)){
		 $fechahasta= $evento['fechafinaliza'];
	}else{
		// sin no esta la fecha de fin en el evento se toma del calendario
		$fechahasta= $calendarioacademico[0]->fechahasta; 	
	}
}else{   // sin no estan ingresadas las fecha en el evento se toma del calendario asignado

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $fechahasta=$calendarioacademico[0]->fechahasta;
}
 $sesiones=array();
     $i=1;
    do {
        $entro=0;	
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){    //verifica si la fecha esta en el horario.
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
			if($sesionactual==0){
			if(!isset($sesiondictada[$fechasesion]) && !isset($numerosesiondictada[$i]) )
			{
				$fecha=$fechasesion; // La nueva fecha
			}}
			
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}

		//	if(isset($sesiondictada[$fechasesion]))
		//	{
				$sesiontotal=$sesiontotal+1;
				$i=$i+1;
				$entro=1;
		//	}
		}
	}
	if($entro==0){
		if(isset($sesiondictada[$fechasesion])){

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

    	$horaf= date("H:i:s",strtotime(' + 2 hours'));

?>






















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






<?php
//Buscar el tema si ya se planifico en el silabo	
	$idunidadsilabo=1;
$numerosesion=0;
$idtema=0;
$nombretema="";
$options= array('--Select--');
foreach ($temas as $row){
	if($row->numerosesion==$sesionactual){
		$idunidadsilabo=$row->idunidadsilabo;
		$idtema=$row->idtema;
		$nombretema=$row->nombrecorto;
		$descripciontema=$row->nombrecorto;
		$secuenciatema=$row->nombrecorto;
		$numerosesion=$row->numerosesion;
	}	
}








?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Número de sesión:</label>
<div class="col-md-10"tem>
<?php
 //print_r($sesionevento);
 //echo form_input("numerosesion",$sesionevento[0]->nsesion+1, array("readonly"=>"true","placeholder"=>"Numero de sesion"));
 echo form_input("numerosesion",$sesionactual, array("readonly"=>"true","placeholder"=>"Numero de sesion")); echo "/".$sesiontotal;

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]="Unidad: ".$row->unidad;
}
 $primero= reset($options);
 
 echo form_dropdown("idunidadsilabo",$options,$primero, array('id'=>'idunidadsilabo'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema :</label>
<div class="col-md-10">
<?php

 if($idtema>0){

		$nombrecortotema=$nombretema;
		$nombrelargotema=$descripciontema;
		$secuenciatema=$secuenciatema;
		$idunidadsilabo=$idunidadsilabo;
 }else{
	 if(isset($temasprevios)){
 		if(isset($nombrecortotema[$sesionactual])){
			$nombrecortotema=$nombrecortotema[$sesionactual];
			$nombrelargotema=$nombrelargotema[$sesionactual];
			$secuenciatema=$secuenciatema[$sesionactual];
			$idunidadsilabo=$idunidadsilaboa[$sesionactual];
		}else{
			$nombrecortotema="";
			$nombrelargotema="";
			$secuenciatema="";
			$idunidadsilabo=1;

		}
	 }else{
		$nombrecortotema="";
		$nombrelargotema="";
		$secuenciatema="";
	 }
 }

$textarea_options = array('name'=>'temacorto','class' => 'form-control','rows' => '4','maxlength'=> '100',   'cols' => '20', 'style'=> 'width:50%;height:100px;','value'=>$nombrecortotema,  "placeholder"=>"Descripción corta del tema","id"=>"temacorto" );    
 echo form_textarea($textarea_options);  

?><div id="textarea_feedback"></div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>

<div class="col-md-10">
<?php
    
$textarea_options = array('name'=>'tema','class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;','value'=>$nombrelargotema, "placeholder"=>"Descripción larga del tema" );    
 echo form_textarea( $textarea_options);  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Secuencia:</label>

<div class="col-md-10">
<?php
    
$textarea_options = array('name'=>'secuencia','class' => 'form-control','rows' => '8',   'cols' => '20', 'style'=> 'width:50%;height:200px;','value'=>$secuenciatema, "placeholder"=>"Lista de actividades que va a realizar en esta clases para lograr los objetivos de aprendizaje" );    
 echo form_textarea( $textarea_options);  

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




<div style="border:solid 1px red; padding:10px 5px 5px 20px; margin:5px 50px 5px -20px; background-color:#F0F8FF;">


<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de la sesión:</label>
<div class="col-md-10">
<?php
 	echo form_input(array("name"=>"fecha","id"=>"fecha","readonly"=>"true",  "type"=>"date","value"=>$fecha)); echo $eldia; 

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

</div>







<?php echo form_close();?>

<div class="form-group row" >
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Temas programados en el silabo: </b>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>Sesion</th>
	 <th>Unidad</th>
	 <th>idtema</th>
	 <th>tema</th>
	 <th>Detalle</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>

</div>


<script>
  var idtema=<?php echo $idtema; ?>;

$(document).ready(function(){
  	var idsilabo=<?php echo $evento['idsilabo']; ?>;

	var mytablat= $('#mydatac').DataTable({pageLength:50,"ajax":{url: '<?php echo site_url('tema/tema_silabo')?>', type: 'GET',data:{idsilabo:idsilabo}},

       "rowCallback": function(row, data, index){
	if (data[2] == idtema) {
        	$("td:eq(0)", row).css('background-color','#99ff9c')
        	$("td:eq(1)", row).css('background-color','#99ff9c')
        	$("td:eq(2)", row).css('background-color','#99ff9c')
        	$("td:eq(3)", row).css('background-color','#99ff9c')
        	$("td:eq(4)", row).css('background-color','#99ff9c')
    	}
       }
    

	});	



   var text_max = 100;
    $('#textarea_feedback').html('Quedan ' + text_max + ' caracteres');

    $('#temacorto').keyup(function() {
        var text_length = $('#temacorto').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html('Quedan ' + text_remaining + ' caracteres');
    });



		
});




	$(document).ready(()=>{
	  var idevento= <?php echo $idevento; ?>;
	  if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
	  }
	});     

	$(document).ready(()=>{
	  var idunidadsilabo= <?php echo $idunidadsilabo; ?>;
	  if(idunidadsilabo>0){
		    $('#idunidadsilabo option[value="'+idunidadsilabo+'"]').attr('selected','selected');
	  }
	});     








</script>
