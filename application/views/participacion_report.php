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
                 <h3>Reporte de participación 	</h3>
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
$sum=0;
$can=0;
?>
 </tr>
 </thead>

 <tbody id="show_data">
<?php
echo "<tr>";
$id=0;
$persona="";
$i=0;
foreach ($participacion as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrparticipacion[$id]."</td>";
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){
          echo "<td>". $arrparticipacion[$row1->fecha]."</td>";
	  $sum=$sum+ $arrparticipacion[$row1->fecha];
	  $can=$can+1;
      }else{
           echo "<td>0</td>";
	  $sum=$sum+ 0;
	  $can=$can+1;

      }
    }

      $resu=round(($sum/($can)),2);
      echo "<td>".$resu."</td>";
      echo "</tr>";
	$sum=0;
	$can=0;
   }
    $arrparticipacion=array();
    $id=$row->idpersona;
    $arrparticipacion[$row->idpersona]=$row->nombres;
    $arrparticipacion[$row->fecha]=$row->porcentaje;
  }else{
    $arrparticipacion[$row->fecha]=$row->porcentaje;
  }
}
  $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrparticipacion[$id]."</td>";
    foreach ($fechaeventos as $row1){
      if(isset($arrparticipacion[$row1->fecha])){
          echo "<td>". $arrparticipacion[$row1->fecha]."</td>";
	  $sum=$sum+ $arrparticipacion[$row1->fecha];
	  $can=$can+1;
      }else{
           echo "<td>0</td>";
	  $sum=$sum+ 0;
	  $can=$can+1;
      }
    } 
      $resu=round(($sum/($can)),2);
      echo "<td>".$resu."</td>";
      echo "</tr>";
	$sum=0;
	$can=0;


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





