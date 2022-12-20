<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
   <ul>
<?php
if(isset($oficio))
{
?>
        <li> <?php echo anchor('oficio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('oficio/siguiente/'.$oficio['idoficio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('oficio/anterior/'.$oficio['idoficio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('oficio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('oficio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('oficio/edit/'.$oficio['idoficio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('oficio/delete/'.$oficio['idoficio'],'Delete'); ?></li>
        <li> <?php echo anchor('oficio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('oficio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idoficio',$oficio['idoficio']) ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Id oficio:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'idoficio','value'=>$oficio['idoficio'],"disabled"=>"disabled",'placeholder'=>'Idoficios','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Propietario:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'propietario','value'=>$oficio['propietario'],"disabled"=>"disabled",'placeholder'=>'Ipropietario','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Archivo:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'archivo','value'=>$oficio['archivo'],"disabled"=>"disabled",'placeholder'=>'Direccion y nombre del archivo','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ubicación:</label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'ubicacion','value'=>$oficio['ubicacion'],"disabled"=>"disabled",'placeholder'=>'Ubicación del archivo de oficio','style'=>'width:600px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ubicación:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'evento','value'=>$oficio['evento'],"disabled"=>"disabled",'placeholder'=>'Evento del oficio','style'=>'width:600px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php

$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$oficio['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo documento:</label>
<div class="col-md-10">
<?php

$options= array("NADA");
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}

echo form_input('idtipodocu',$options[$oficio['idtipodocu']],array("disabled"=>"disabled",'style'=>'width:500px;'));
?>
</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
		<?php
		$options= array("NADA");
		foreach ($documentos as $row){
			$options[$row->iddocumento]= $row->asunto;
		}

		echo form_input('iddocumento',$options[$oficio['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label"> Ancho x(296.67):</label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'ancho_x','value'=>$oficio['ancho_x'],"disabled"=>"disabled",'placeholder'=>'Ancho del oficio','style'=>'width:600px;');
		 echo form_input($eys_arrctl); 
		?>
	</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Alto  Y(210.56): </label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'alto_y','value'=>$oficio['alto_y'],"disabled"=>"disabled",'placeholder'=>'Alto del oficio y','style'=>'width:600px;');
 echo form_input($eys_arrctl);

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> posi nombre X: </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_nomb_x','value'=>$oficio['posi_nomb_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de nombre en x','style'=>'width:600px;');
 echo form_input($eys_arrctl); 

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">posi nombre Y(115 mm) : </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_nomb_y','value'=>$oficio['posi_nomb_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de nombre en y','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> posi fecha X : </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_fecha_x','value'=>$oficio['posi_fecha_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de fecha en x','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">posi fecha Y(115 mm): </label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'posi_fecha_y','value'=>$oficio['posi_fecha_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de fecha en y','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">posi codigo X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'posi_codigo_x','value'=>$oficio['posi_codigo_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de codigo en x','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">posi codigo Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'posi_codigo_y','value'=>$oficio['posi_codigo_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de codigo en y','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>








<div class="form-group row">
	<label class="col-md-2 col-form-label">firma1 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma1_x','value'=>$oficio['firma1_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma1 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma1_y','value'=>$oficio['firma1_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>






<div class="form-group row">
	<label class="col-md-2 col-form-label">firma2 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma2_x','value'=>$oficio['firma2_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma2 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma2_y','value'=>$oficio['firma2_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>










<div class="form-group row">
	<label class="col-md-2 col-form-label">firma3 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma3_x','value'=>$oficio['firma3_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma3 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma3_y','value'=>$oficio['firma3_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>

































<div class="form-group row">
    <label class="col-md-2 col-form-label"> Head para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correohead',$oficio['correohead'],$textarea_options); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Subject:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correosubject',$oficio['correosubject'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foot para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correofoot',$oficio['correofoot'],$textarea_options); 
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>



</html>
