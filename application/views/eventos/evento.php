<!DOCTYPE html>
<html
>
<head>

<link href="http://www.w3schools.com/lib/w3.css" rel="stylesheet" />

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

 <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

<link href="../../../assets/dist/css/bootstrap.min.css" rel="stylesheet">



<style>
/* Style the body */
body,html {
  font-family: Arial;
  margin: 0;
  height:100%;
}

/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  font-size: 30px;
}

/* Page Content */
.content {padding:20px;}

    .blue-color {
        color:white;
    }
    .green-color {
        color:green;
    }
    .teal-color {
        color:teal;
    }
    .yellow-color {
    color:yellow;
    }
    .red-color {
        color:red;
    }



.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("http://educaysoft.org/sica/campus2.jpg");

  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Place text in the middle of the image */
 .hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
</style>


</head>

<body>

<?php 

$miasistencia= array();
foreach ($asistencia as $row){
	$miasistencia[$row->fecha]= $row->idtipoasistencia;
}
$miparticipacion= array();
$miayuda= array();
foreach ($participacion as $row){
	$miparticipacion[$row->fecha]= $row->porcentaje;
	$miayuda[$row->fecha]= $row->ayuda;
	
}



$mipago= array();
foreach ($pagoevento as $row){
	$mipago[$row->fecha]= $row->valor;
	
}





?>



    <div class="hero-image">
    <div class="hero-text">
 <center><img src="http://educaysoft.org/sica/logoutlvte.png" alt="Italian Trulli"></center>
      <h1><?php  echo $evento['titulo'];?></h1>

  <!---  <button><a href="http://educaysoft.org/sica/MTI/doc/_build/html/admision.html"> Mas información</a></button> -->
  <button><a href="<?php echo $silabo['linkdetalle']; ?>"> Mas información</a></button>
    </div>
    </div>

<div style="width:100%; margin:auto; padding:10px;" >
      <div style="border:2px solid green; width:80%; margin:auto; padding:10px; " >
	      <div style="margin: 10px; width:100%">
		 <h1 style="text-align: center; text-transform: uppercase; color: #4CAF50;">objetivos</h1>
		  <p style="text-indent: 50px; text-align: justify; letter-spacing:2px;"><?php echo $evento["detalle"];?></p>
	      </div>


	      <div class="container" style="font-size: 20px;width:100%; background: yellow;">
	      <div style="display: flex; flex-direction: row;" >
		  <div class="col-md-auto">
		      <i class='fa fa-clock-o red-color'></i>
		  </div>

		  <div class="col-sm-8">
		    <span>Fecha de inicio:</span> 
		  </div>
		  <div class="col-sm-4">
		    <span><?php   echo $evento['fechainicia']; ?></span>
		  </div>
	      </div>
	      </div>


	      <div class="container" style="font-size: 20px; width:100%; background: yellow;">
		<div style="display: flex; flex-direction: row;" >
		  <div class="col-md-auto">
		      <i class='fa fa-clock-o red-color'></i>
		  </div>

		  <div class="col-sm-8">
		    <span>Fecha de finalización:</span> 
		  </div>
		  <div class="col-sm-4">
		    <span><?php   echo $evento['fechafinaliza']; ?></span>
		  </div>
		</div>
	      </div>

	      <div class="container" style="font-size: 22px; width:100%; background: yellow;">
		<div style="display: flex; flex-direction: row;" >
		  <div class="col-md-auto">
		      <i class='fa fa-clock-o red-color'></i>
		  </div>

		  <div class="col-sm-8">
		    <span>Duración:</span> 
		  </div>
		  <div class="col-sm-4">
		    <span><?php   echo $evento['duracion']; ?></span>
		  </div>
		</div>
	      </div>

	      <div class="container" style="font-size: 20px; width:100%; background: yellow;">
		<div style="display: flex; flex-direction: row;" >
		  <div class="col-md-auto">
		      <i class='fa fa-money red-color'></i>
		  </div>

		  <div class="col-sm-8">
		    <span>Costo:</span> 
		  </div>
		  <div class="col-sm-4">
		    <span><?php   echo $evento['costo']; ?></span>
		  </div>
		</div>
	      </div>


	      <div style="width:100%; padding-top:5px;">
		  <p style="font-size:25px;"><b>Estudiante :</b> <?php echo $this->session->userdata['logged_in']['elusuario'] ." -- (". $this->session->userdata['logged_in']['email'].")";?></p>
	      </div>



	<div class="container" style="border:2px solid red; font-size: 15px; width:100%; background: gray; padding:3px;">
        <div style="display: flex; flex-direction: row;" >

          <div class="col-md-auto">
              <i class='fa fa-bars'></i>
          </div>

          <div class="col-sm-4">	
            <span>EVENTO</span> 
          </div>

          <div class="col-sm-3">
            <span>Fechas </span>
          </div>

          <div class="col-sm-1">
		<?php
           echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16"> <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg>';
		?>
	 </div>

          <div class="col-sm-1">
		<?php
           echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trophy" viewBox="0 0 16 16"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/></svg>';
		?>

          </div>
          <div class="col-sm-1">
	<?php
           echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/></svg>';
		?>

          </div>
          <div class="col-sm-1">
	<?php
           echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16"><path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/></svg>';
		?>

          </div>



        </div>
	</div>










      <?php
      foreach($sesioneventos as  $row)
      {

      ?>

      <div class="container" style="font-size: 15px; width:100%; background: yellow; padding:5px;">
        <div style="display: flex; flex-direction: row;" >
          <div class="col-md-auto">
		<?php if($row->idmodoevaluacion!=1) { ?>
<a href= "<?php echo base_url(); ?>curso/evaluar?idpersona=<?echo $this->session->userdata['logged_in']['idpersona']; ?>&idsilabo=<?php echo $evento['idsilabo']; ?>&idevento=<?php echo $evento['idevento']; ?>&idtema=<?php echo $row->idtema; ?>&fecha=<?php echo $row->fecha; ?> "   ><i class='fa fa-check'></i></a>
		<?php }else{ ?>
		  <i class='fa fa-folder-o'></i>
		<?php } ?>
          </div>

          <div class="col-sm-4">
            <span><?php   echo $row->tema; ?></span> 
          </div>
          <div class="col-sm-3">
            <span><?php   echo $row->fecha; ?></span>
          </div>

          <div class="col-sm-1">
		<?php
	      if(isset($miasistencia[$row->fecha]))				
	 	{

	        if($miasistencia[$row->fecha]==1)   //puntual
		{
echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>';
		}

	        if($miasistencia[$row->fecha]==2)   //atraso
		{
echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/><path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>';
		}


	        if($miasistencia[$row->fecha]==3)   //falta justificada
		{
echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/></svg>';
		}


	        if($miasistencia[$row->fecha]==4)   //falta injustificada
		{
echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/></svg>';
		}

	    //  echo "<i class='".$miasistencia[$row->fecha]."'></i>";
	      }else{
               echo "<span>"." "."</span>";
	      }
		?>
          </div>

          <div class="col-sm-1">
	 <?php
	      if(isset($miparticipacion[$row->fecha]))				
	 	{
               echo "<span>".$miparticipacion[$row->fecha]."</span>";
	      }else{
               echo "<span>"." "."</span>";
	      }
	?>
          </div>
	<div class="col-sm-1">
	 <?php
	      if(isset($miayuda[$row->fecha]))				
	 	{
               echo "<span>".$miayuda[$row->fecha]."</span>";
	      }else{
               echo "<span>"." "."</span>";
	      }
	?>
          </div>

<div class="col-sm-1">
	 <?php
	      if(isset($mipago[$row->fecha]))				
	 	{
               echo "<span>".$mipago[$row->fecha]."</span>";
	      }else{
               echo "<span>"." "."</span>";
	      }
	?>
          </div>



        </div>
      </div>
      <?php } ?>


<div class="container" style="border:2px solid red; font-size: 15px; width:100%; background: gray; padding:3px;">
        <div style="display: flex; flex-direction: row;" >

          <div class="col-md-auto">
              <i class='fa fa-bars'></i>
          </div>

          <div class="col-sm-4">	
            <span>TOTALES</span> 
          </div>

          <div class="col-sm-3">
            <span>Fechas </span>
          </div>

          <div class="col-sm-1">
            <span>Clases </span>
	 </div>

          <div class="col-sm-1">
            <span>Calificacion</span>
          </div>
          <div class="col-sm-1">
            <span>Ayuda</span>
          </div>
          <div class="col-sm-1">
            <span>Pago</span>

          </div>



        </div>
	</div>






      </div>








</div>







<div style="height:40px">

</div>

<div style='position:fixed; left:0; bottom:0; width:100%; text-align:center; background-color:red;font-size:40px;' >
       
<a href= "<?php echo base_url(); ?>curso/evaluar?idpersona=<?echo $this->session->userdata['logged_in']['idpersona']; ?>&idsilabo=<?php echo $evento['idsilabo']; ?>&idevento=<?php echo $evento['idevento']; ?>&idtema=<?php echo $sesioneventos[sizeof($sesioneventos)-1]->idtema; ?>&fecha=<?php echo $sesioneventos[sizeof($sesioneventos)-1]->fecha; ?> " ><span style="color:white;">Evaluar e imprimir certificado</span></a>

</div>
</body>
</html>
