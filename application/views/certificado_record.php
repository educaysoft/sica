<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
   <ul>
<?php
if(isset($certificado))
{
?>
        <li> <?php echo anchor('certificado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('certificado/siguiente/'.$certificado['idcertificado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('certificado/anterior/'.$certificado['idcertificado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('certificado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('certificado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('certificado/edit/'.$certificado['idcertificado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('certificado/delete/'.$certificado['idcertificado'],'Delete'); ?></li>
        <li> <?php echo anchor('certificado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('certificado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idcertificado',$certificado['idcertificado']) ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Id certificado:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'idcertificado','value'=>$certificado['idcertificado'],"disabled"=>"disabled",'placeholder'=>'Idcertificados','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Propietario:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'propietario','value'=>$certificado['propietario'],"disabled"=>"disabled",'placeholder'=>'Ipropietario','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Archivo:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'archivo','value'=>$certificado['archivo'],"disabled"=>"disabled",'placeholder'=>'Direccion y nombre del archivo','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ubicación:</label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'ubicacion','value'=>$certificado['ubicacion'],"disabled"=>"disabled",'placeholder'=>'Ubicación del archivo de certificado','style'=>'width:600px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Ubicación:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'evento','value'=>$certificado['evento'],"disabled"=>"disabled",'placeholder'=>'Evento del certificado','style'=>'width:600px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$certificado['idevento'], 'Evento:'); ?></label>
<div class="col-md-10">
<?php

$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$certificado['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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

echo form_input('idtipodocu',$options[$certificado['idtipodocu']],array("disabled"=>"disabled",'style'=>'width:500px;'));
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

		echo form_input('iddocumento',$options[$certificado['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label"> Ancho x(296.67):</label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'ancho_x','value'=>$certificado['ancho_x'],"disabled"=>"disabled",'placeholder'=>'Ancho del certificado','style'=>'width:600px;');
		 echo form_input($eys_arrctl); 
		?>
	</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Alto  Y(210.56): </label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'alto_y','value'=>$certificado['alto_y'],"disabled"=>"disabled",'placeholder'=>'Alto del certificado y','style'=>'width:600px;');
 echo form_input($eys_arrctl);

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label"> tamaña fuente nombre(20): </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'size_nombre','value'=>$certificado['size_nombre'],"disabled"=>"disabled",'placeholder'=>'tamaño fuente nombre','style'=>'width:600px;');
 echo form_input($eys_arrctl); 

?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label"> posi nombre X: </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_nomb_x','value'=>$certificado['posi_nomb_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de nombre en x','style'=>'width:600px;');
 echo form_input($eys_arrctl); 

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">posi nombre Y(115 mm) : </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_nomb_y','value'=>$certificado['posi_nomb_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de nombre en y','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label"> posi fecha X : </label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'posi_fecha_x','value'=>$certificado['posi_fecha_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de fecha en x','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">posi fecha Y(115 mm): </label>
<div class="col-md-10">
<?php

  $eys_arrctl=array("name"=>'posi_fecha_y','value'=>$certificado['posi_fecha_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de fecha en y','style'=>'width:600px;');
 echo form_input($eys_arrctl);
?>
</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">posi codigo X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'posi_codigo_x','value'=>$certificado['posi_codigo_x'],"disabled"=>"disabled",'placeholder'=>'Posicion de codigo en x','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">posi codigo Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'posi_codigo_y','value'=>$certificado['posi_codigo_y'],"disabled"=>"disabled",'placeholder'=>'Posicion de codigo en y','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>








<div class="form-group row">
	<label class="col-md-2 col-form-label">firma1 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma1_x','value'=>$certificado['firma1_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma1 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma1_y','value'=>$certificado['firma1_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>






<div class="form-group row">
	<label class="col-md-2 col-form-label">firma2 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma2_x','value'=>$certificado['firma2_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma2 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma2_y','value'=>$certificado['firma2_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>










<div class="form-group row">
	<label class="col-md-2 col-form-label">firma3 X: </label>
	<div class="col-md-10">
		<?php
		  $eys_arrctl=array("name"=>'firma3_x','value'=>$certificado['firma3_x'],"disabled"=>"disabled",'placeholder'=>'Posicion x de la primera firma ','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">firma3 Y(115 mm): </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'firma3_y','value'=>$certificado['firma3_y'],"disabled"=>"disabled",'placeholder'=>'Posición y de la primera firma','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>






















<div class="form-group row">
    <label class="col-md-2 col-form-label"> TExto1:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('texto1',$certificado['texto1'],$textarea_options); 
		?>
	</div> 
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">posicion x texto1: </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'posi_texto1_x','value'=>$certificado['posi_texto1_x'],"disabled"=>"disabled",'placeholder'=>'Posición x','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2 col-form-label">posicion y texto1: </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'posi_texto1_y','value'=>$certificado['posi_texto1_y'],"disabled"=>"disabled",'placeholder'=>'Posición y','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">ancho texto 1: </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'ancho_texto1','value'=>$certificado['ancho_texto1'],"disabled"=>"disabled",'placeholder'=>'Ancho','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Alto texto1: </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'alto_texto1','value'=>$certificado['alto_texto1'],"disabled"=>"disabled",'placeholder'=>'Alto','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>


<div class="form-group row">
	<label class="col-md-2 col-form-label">tamaño de fuente: </label>
	<div class="col-md-10">
		<?php
		 $eys_arrctl=array("name"=>'font_size_texto1','value'=>$certificado['font_size_texto1'],"disabled"=>"disabled",'placeholder'=>'tamaño de fuente','style'=>'width:600px;');
		 echo form_input($eys_arrctl);
		?>
	</div>
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Head para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correohead',$certificado['correohead'],$textarea_options); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Subject:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correosubject',$certificado['correosubject'],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foot para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('correofoot',$certificado['correofoot'],$textarea_options); 
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>



</html>
