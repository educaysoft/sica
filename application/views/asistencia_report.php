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
                 <h3>Reporte de participación 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
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
?>
 </tr>
 </thead>

 <tbody id="show_data">
<?php
echo "<tr>";
$id=0;
$persona="";
$i=0;
foreach ($asistencia as $row){
  if($id!=$row->idpersona)
  {
   if($id>0){
    $i=$i+1;
    echo "<tr><td>". $i."</td>";
    echo "<td>". $arrasistencia[$id]."</td>";
    foreach ($fechaeventos as $row1){
      if(isset($arrasistencia[$row1->fecha])){
          echo "<td>". $arrasistencia[$row1->fecha]."</td>";
      }else{
           echo "<td>0</td>";
      }
    }
      echo "</tr>";
   }
    $arrasistencia=array();
    $id=$row->idpersona;
    $arrasistencia[$row->idpersona]=$row->nombres;
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
          echo "<td>". $arrasistencia[$row1->fecha]."</td>";
      }else{
           echo "<td>0</td>";
      }
    } 
      echo "</tr>";


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





