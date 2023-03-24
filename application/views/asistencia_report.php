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
foreach ($sesioneventos as $row){
  echo "<th>". $row->fecha."<br>" . $row->temacorto." </th>";
}
  echo "<th> % </th>";
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
    foreach ($sesioneventos as $row1){
      if(isset($arrasistencia[$row1->fecha])){
	      $x=$j*10;
	      $k=$j+150;
	     // echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". $arrasistencia[$row1->fecha]."</td>";
	  //    echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". $arrasistencia[$row1->fecha]."</td>";

      if($arrasistencia[$row1->fecha][0]==1)   //puntual
		{
echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>'.$arrasistencia[$row1->fecha][1]."</td>";
		}

     if($arrasistencia[$row1->fecha][0]==2)   //puntual
		{
echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>'.$arrasistencia[$row1->fecha][1]."</td>";
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
      $resu=round(($asi/($asi+$aus))*100,2);
      echo "<td>".$resu."</td>";
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
          echo "<td style='color:green'>". $arrasistencia[$row1->fecha][0]."</td>";
	  $asi=$asi+1;
      }else{
           echo "<td style='color:red'>falta</td>";
	  $aus=$aus+1;
      }
    } 
      $resu=round(($asi/($asi+$aus))*100,2);
      echo "<td>".$resu."</td>";
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





