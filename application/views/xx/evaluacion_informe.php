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
<p> <?php echo $detalle; ?></p>
<hr />
<br/>
<br>


 <?php
$i=1;

foreach ($preguntas as $list) { ?>
 <div style="display: flex; flex-direction:row; padding: 10px;">
 <div><?php echo $i; ?></div>
 <div><?php echo $list->pregunta?></div>
 </div>


 <?php
	 	$respuestas = $res->respuestasxpregunta($list->idpregunta)->result();
   if(isset($respuestas))
   {
   $j=1;
foreach ($respuestas as $list2) { ?>
 <div style="display: flex; flex-direction:row;">
 <div style="margin-left: 20px;"><?php echo $j; ?></div>
 <div><?php echo $list2->respuesta?></div>
 </div>
 <?php
  $j=$j+1;  
 }} ?> 




<?php
  $i=$i+1;  
 } ?> 




</div>
</div>
