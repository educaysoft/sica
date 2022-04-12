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



    <div class="hero-image">
    <div class="hero-text">
      <h1><?php  echo $evento['titulo'];?></h1>

    <button>Hire me</button>
    </div>
    </div>

<div style="width100%; margin:auto; padding:10px;" >
      <div style="width:60%; margin:auto; padding:10px; " >
      <div style="width:100%">
          <p><?php echo $evento["detalle"];?></p>


      </div>
          <i class='fa fa-clock-o blue-color'></i>
            <i class='fa fa-clock-o green-color'></i>
            <i class='fa fa-clock-o teal-color'></i>
            <i class='fa fa-clock-o yellow-color'></i>




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







      <section>
      <center>  <h2>Detalle de fecha</h2></center>

      <?php
      foreach($fechaeventos as  $row)
      {

      ?>

      <div class="container" style="font-size: 20px; width:100%; background: yellow; padding:5px;">
        <div style="display: flex; flex-direction: row;" >
          <div class="col-md-auto">
          <i class='<?php echo $row->icono; ?> red-color'></i>
          </div>

          <div class="col-sm-8">
            <span><?php   echo $row->tema; ?></span> 
          </div>
          <div class="col-sm-4">
            <span><?php   echo $row->fecha; ?></span>
          </div>
        </div>
      </div>
      <?php } ?>

      </section


      </div>
</div>
<div style="height:40px">

</div>

<div style='position:fixed; left:0; bottom:0; width:100%; text-align:center; background-color:red;' >
  <?php
       
        //echo anchor("evento/listar_participantes/".$evento['idevento'],'Imprimir certificado');
        echo anchor("curso/iniciar/".$evento['idcurso'],'Iniciar el curso');


?>
</div>
</body>
</html>
