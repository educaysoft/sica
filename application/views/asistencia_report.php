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
foreach ($fechaeventos as $row){
  echo "<th>". $row->fecha."<br>" . $row->tema." </th>";
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
    foreach ($fechaeventos as $row1){
      if(isset($arrasistencia[$row1->fecha])){
	      $x=$j*10;
	      $k=$j+150;
	     // echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". $arrasistencia[$row1->fecha]."</td>";
	      echo "<td style='color:green;"." background-color:rgb(".$x.",".$k.", 66); '>". $arrasistencia[$row1->fecha]."</td>";
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
    $arrasistencia[$row->fecha]=$row->idtipoasistencia;
  }else{

    $arrasistencia[$row->fecha]=$row->idtipoasistencia;

  }
}
  $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrasistencia[$id]."</td>";
    foreach ($fechaeventos as $row1){
      if(isset($arrasistencia[$row1->fecha])){
          echo "<td style='color:green'>". $arrasistencia[$row1->fecha]."</td>";
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





