<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($publicacion))
{
?>
        <li> <?php echo anchor('publicacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('publicacion/anterior/'.$publicacion['idpublicacion'], 'anterior'); ?></li>
        <li> <?php echo anchor('publicacion/siguiente/'.$publicacion['idpublicacion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('publicacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('publicacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('publicacion/edit/'.$publicacion['idpublicacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('publicacion/delete/'.$publicacion['idpublicacion'],'Delete'); ?></li>
        <li> <?php echo anchor('publicacion/listar/','Listar'); ?></li>
        <li> <?php echo anchor('publicacion/reportepdf/','Reportepdf'); ?></li>

		<li> <?php echo anchor('publicacion/genpagina/19','generar web'); ?></li>
		<li> <?php echo anchor('publicacion/paginaweb',' web'); ?></li>
<?php 
}else{
?>

        <li> <?php echo anchor('publicacion/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('publicacion/save_edit') ?>
<?php echo form_hidden('idpublicacion',$publicacion['idpublicacion']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id Referenciasasigantura:</label>
	<div class="col-md-10">
     <?php 

     echo form_input('idpublicacion',$publicacion['idpublicacion'],array("disabled"=>"disabled",'placeholder'=>'Idpublicacions'));
		?>
	</div> 
</div>
 





<div class="form-group row">
    <label class="col-md-2 col-form-label">Tipo de referencias:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tipopublicacions as $row){
	$options[$row->idtipopublicacion]= $row->nombre;
}

echo form_input('idtipopublicacion',$options[$publicacion['idtipopublicacion']],array("disabled"=>"disabled",'style'=>'width:500px'));

		?>
	</div> 
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Titulo</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    

     echo form_textarea('titulo',$publicacion['titulo'],$textarea_options);

		?>
	</div> 
</div>



 
<div class="form-group row">
<label class="col-md-2 col-form-label"><a href="<?php echo $publicacion['url']; ?>"> Dirección web:</a></label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    

     echo form_textarea('url',$publicacion['url'],$textarea_options);

		?>
	</div> 
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha publicación</label>
	<div class="col-md-10">
		<?php


      		 echo form_input('fechapublicacion',$publicacion['fechapublicacion'],array('type'=>'date','placeholder'=>'fechapublicacion','style'=>'width:500px;')) 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('publicaciondocente/add/'.$publicacion['idpublicacion'], 'Docente Autor:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($publicaciondocentes as $row){
		$options[$row->iddocente]=$row->eldocente;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idpublicaciondocente[]',$options,(array)set_value('idpublicaciondocente', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
