<!DOCTYPE html>
<html
>
<head>

<link href="http://www.w3schools.com/lib/w3.css" rel="stylesheet" />

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


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
	$miasistencia[$row->fecha]= $row->tipoasistencia;
}

$miparticipacion= array();
foreach ($participacion as $row){
	$miparticipacion[$row->fecha]= $row->porcentaje;
}


?>



    <div class="hero-image">
    <div class="hero-text">
 <center><img src="http://educaysoft.org/sica/logoutlvte.png" alt="Italian Trulli"></center>
      <h1><?php  echo $evento['titulo'];?></h1>

  <!---  <button><a href="http://educaysoft.org/sica/MTI/doc/_build/html/admision.html"> Mas información</a></button> -->
  <button><a href="<?php echo $curso['linkdetalle']; ?>"> Mas información</a></button>
    </div>
    </div>

<div style="width:100%; margin:auto; padding:10px;" >
      <div style="border:2px solid green; width:60%; margin:auto; padding:10px; " >
	      <div style="width:100%">
		  <p><?php echo $evento["detalle"];?></p>
	      </div>

	      <div style="width:100%">
		  <p><?php echo $this->session->userdata['logged_in']['elusuario'];?></p>
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





      <center>  <h2>Detalle de los eventos</h2></center>



	<div class="container" style="border:2px solid red; font-size: 20px; width:100%; background: gray; padding:5px;">
        <div style="display: flex; flex-direction: row;" >

          <div class="col-md-auto">
              <i class='fa fa-bars'></i>
          </div>

          <div class="col-sm-4">	
            <span>EVENTO</span> 
          </div>

          <div class="col-sm-3">
            <span>FECHA </span>
          </div>

          <div class="col-sm-3">
            <span>ASISTENCIA</span>
	 </div>

          <div class="col-sm-3">
            <span>NIVEL DE <br>RENDIMIENTO</span>
          </div>


        </div>
	</div>

















      <?php
      foreach($fechaeventos as  $row)
      {

      ?>

      <div class="container" style="font-size: 20px; width:100%; background: yellow; padding:5px;">
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

          <div class="col-sm-3">
		<?php
	      if(isset($miasistencia[$row->fecha]))				
	 	{
               echo "<span>".$miasistencia[$row->fecha]."</span>";
	      }else{
               echo "<span>"." "."</span>";
	      }
		?>
          </div>

          <div class="col-sm-3">
	 <?php
	      if(isset($miparticipacion[$row->fecha]))				
	 	{
               echo "<span>".$miparticipacion[$row->fecha]."</span>";
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

<div style='position:fixed; left:0; bottom:0; width:100%; text-align:center; background-color:red;' >
  <?php
       
        //echo anchor("evento/listar_participantes/".$evento['idevento'],'Imprimir certificado');
        echo anchor("curso/iniciar?idcurso=".$evento['idcurso']."&idevento=".$evento['idevento'],'Iniciar el curso');


?>
</div>
</body>
</html>
