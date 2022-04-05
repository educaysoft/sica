<html>
<head>

<link href="http://www.w3schools.com/lib/w3.css" rel="stylesheet" />
<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
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
</style>


</head>

<body>
<div class="header">
  <h1>EVENTO</h1>
  <p><?php  echo $evento['titulo'];?></p>
</div>
<div style="width:100%; margin:auto; padding:10px;" >
<div style="width:60%">
<p><?php echo $evento["detalle"];?></p>
<form class="w3-container"
<p>
<label for="first_name">Fecha de inicio:</label>
  <input type="text" name="first_name" value="<?php   echo $evento['fechainicia']; ?>">
</p>


<p>
<label for="first_name">Fecha de finalización:</label>
  <input type="text" name="first_name" value="<?php   echo $evento['fechafinaliza']; ?>">


</p>
</form>
</div>
</div>
<div style='position:fixed; left:0; bottom:0; width:100%; text-align:center; background-color:red;' >
  <?php echo anchor("evento/listar_participantes/".$evento['idevento'],'Imprimir certificado'); ?>
</div>
</body>
</html>
