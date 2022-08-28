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
  color: white;
  font-size: 30px;
}

/* Page Content */
.content {padding:20px;}

    .blue-color {
        color:blue;
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
	$miasistencia[$row->fecha]="bi bi-person-check"; // $row->tipoasistencia;
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
	      <div style="width:100%">
		  <p><?php echo $evento["detalle"];?></p>
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
            <span>Asistencia</span>
	 </div>

          <div class="col-sm-1">
            <span>Activ. y<br>Partici.</span>
          </div>
          <div class="col-sm-1">
            <span>AYUDA</span>
          </div>
          <div class="col-sm-1">
            <span>Pago</span>
          </div>



        </div>
	</div>










      <?php
      foreach($fechaeventos as  $row)
      {

      ?>

      <div class="container" style="font-size: 15px; width:100%; background: yellow; padding:5px;">
        <div style="display: flex; flex-direction: row;" >
          <div class="col-md-auto">
		  <i class='fa fa-folder-o'></i>
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
            //   echo "<span>".$miasistencia[$row->fecha]."</span>";
			//
echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>';



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



      </div>
</div>
<div style="height:40px">

</div>

<div style='position:fixed; left:0; bottom:0; width:100%; text-align:center; background-color:red;font-size:40px;' >
  <?php
       
        //echo anchor("evento/listar_participantes/".$evento['idevento'],'Imprimir certificado');
        echo anchor("curso/iniciar?idpersona=".$this->session->userdata['logged_in']['idpersona']."&idsilabo=".$evento['idsilabo']."&idevento=".$evento['idevento'],'Iniciar el curso e imprimir certificado');


?>
</div>
</body>
</html>
