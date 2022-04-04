<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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


<div style="display:flex; flex-direction: column;   width: 60%; margin: auto;">



	<?php
		foreach ($cursos as $row){
	?>	
<div style="margin: auto; padding: 10px; width: 100%; ">
<div style="border:1px solid green;">
		<div class="header">
		<h1> <?php echo $row->nombre ?></h1>
	  	<p>Aprenda a programación en C++</p>
		</div>

	<div class="contentg" style="display: flex; width: 100%; padding: 10px;">
		<div class="contentr" style="width:50%;" >
	  		<h1>Descripción del curso</h1>
			<i class='fas fa-clock-o'></i> &nbsp;Horas: <?php echo $row->duracion ?></br>
			<i class='fas fa-money'></i>&nbsp; Costo: : Sin costo</br>
		</div>

		<div class="contentl" style="width:50%;">
	 		<?php echo anchor('curso/iniciar/'.$row->idcurso,'iniciar'); ?>
		</div>
	</div>
</div>
</div>


<?php } ?>

</div>


</body>
</html>



</div>
