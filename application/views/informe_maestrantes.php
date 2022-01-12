<html>
<head>

<style>


th, td {
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-spacing: 3;
padding:4px;
}

</style>

</head>

<body>

<div style="width: 90%; margin:auto; display: flex; flex-direction: column; ">
<div  style=" width: 100%; padding:8px;  margin-top:0; display: flex; flex-direction: row; ">
  
   	<div class="media-left">
    		<a href=" <?php echo base_url(); ?>index.php/mti"> <img src="<?php echo base_url(); ?>images/logo.png" wide="80" height="80" alt="Formget logo"></a>  
    </div>    
		<div class="media-left" style=" display:table-cell; vertical-align:middle; padding: 0 0 0 1cm;" >
			<h4 > UNIVERSIDAD TÉCNICA LUIS VARGAS TORRES DE ESMERALDAS <br> DIRECCIÓN DE INVESTIGACIÓN <br> MAESTRÍA EN TECNOLOGÍA DE LA INFORMACIÓN</h4>
		</div>
 	</div>

<div>
<h2> <?php echo $title; ?></h2>
<hr />
<br/>
<br>


<table style="table-layout:fixed; border:1px solid purple;border-collapse:collapse;">
 <thead>
 <tr>
 <th>#</th>
 <th>Maestrante</th>
 <th>Correo</th>
 <th>Telefono</th>
 <th>Estado</th>
 </tr>
 </thead>
 <tbody>
 <?php
$i=1;

foreach ($maestrante_list as $list) { ?>
 <tr>
 <td><?php echo $i; ?></td>
 <td><?php echo $list->maestrante?></td>
 <td><?php echo $list->correo?></td>
 <td><?php echo $list->telefono?></td>
 <td><?php echo $list->estado?></td>
 </tr>
 <?php
  $i=$i+1;  
 } ?> 
 </tbody>
</table>
</div>
</div>
