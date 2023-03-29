<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>

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

?>









<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
	     <p><?php echo $evento['titulo']; ?> </p>
	     <p><?php echo $evento['detalle']; ?> </p>
                 <h3>Reporte de asistencia </h3>
       	     </div>

<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th># </th>
 <th>Participante</th>
<?php

foreach ($sesiones as $row){
  echo "<th>". $row['fecha']."<br> Sesión #:" . $row['sesion']." </th>";
}

//foreach ($sesioneventos as $row){
//  echo "<th>". $row->fecha."<br> Sesión #:" . $row->numerosesion." </th>";
//}

  echo "<th>".$sesiontotal." = 100% </th>";
$asi=0;
$aus=0;
?>
 </tr>
 </thead>

 <tbody id="show_data">
<?php
echo "<tr>";
$id=0;
$persona="";
$i=0;
$j=0;
foreach ($asistencia as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrasistencia[$id]."</td>";
    foreach ($sesiones as $row1){
      if(isset($arrasistencia[$row1->fecha])){
	      $x=255;
	      $k=255;

      if($arrasistencia[$row1->fecha][0]==1)   //puntual
		{
echo "<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>'.$arrasistencia[$row1->fecha][1]."</td>";
		}

     if($arrasistencia[$row1->fecha][0]==2)   //atraseo
		{
echo "<td style='color:black;"." background-color:rgb(".$x.",".$k.", 255); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>'.$arrasistencia[$row1->fecha][1]."</td>";
		}





	      $j=$j+5;
	  $asi=$asi+1;
      }else{
	      $x=$j*10;
	      $k=$j+150;
           echo "<td style='color:red;"." background-color:rgb(".$x.",".$k.",66); '>falta</td>";
	      $j=$j+5;
	  $aus=$aus+1;
      }
    }
      $resu=round(($asi/($sesiontotal))*100,2);
      echo "<td>".$asi." = ".$resu."%</td>";
      echo "</tr>";
$asi=0;
$aus=0;
$j=0;
   }
    $arrasistencia=array();
    $id=$row->idpersona;
    $arrasistencia[$row->idpersona]=$row->lapersona;
    $arrasistencia[$row->fecha]=array($row->idtipoasistencia,$row->hora);
  }else{

    $arrasistencia[$row->fecha]=array($row->idtipoasistencia,$row->hora);

  }
}
  $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrasistencia[$id]."</td>";
    foreach ($sesioneventos as $row1){
      if(isset($arrasistencia[$row1->fecha])){
          echo "<td style='color:black'>". $arrasistencia[$row1->fecha][0]."</td>";
	  $asi=$asi+1;
      }else{
           echo "<td style='color:red'>falta</td>";
	  $aus=$aus+1;
      }
    } 
    $resu=round(($asi/($sesiontotal))*100,2);
      echo "<td>".$asi." = ".$resu."%</td>";
      echo "</tr>";
$j=0;
$asi=0;
$aus=0;

?>

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>





