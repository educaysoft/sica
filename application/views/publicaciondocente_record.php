<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($publicaciondocente))
{
?>
        <li> <?php echo anchor('publicaciondocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('publicaciondocente/anterior/'.$publicaciondocente['idpublicaciondocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('publicaciondocente/siguiente/'.$publicaciondocente['idpublicaciondocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('publicaciondocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('publicaciondocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('publicaciondocente/edit/'.$publicaciondocente['idpublicaciondocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('publicaciondocente/delete/'.$publicaciondocente['idpublicaciondocente'],'Delete'); ?></li>
        <li> <?php echo anchor('publicaciondocente/listar/','Listar'); ?></li>
        <li> <?php echo anchor('publicaciondocente/reportepdf/','Reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('publicaciondocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('publicaciondocente/save_edit') ?>
<?php echo form_hidden('idpublicaciondocente',$publicaciondocente['idpublicaciondocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id Referenciasasigantura:</label>
	<div class="col-md-10">
     <?php 

     echo form_input('idpublicaciondocente',$publicaciondocente['idpublicaciondocente'],array("disabled"=>"disabled",'placeholder'=>'Idpublicaciondocentes'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Asignatura:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->nombre;
}

echo form_input('iddocente',$options[$publicaciondocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Tipo de referencias:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($tipopublicaciondocentes as $row){
	$options[$row->idtipopublicaciondocente]= $row->nombre;
}

echo form_input('idtipopublicaciondocente',$options[$publicaciondocente['idtipopublicaciondocente']],array("disabled"=>"disabled",'style'=>'width:500px'));

		?>
	</div> 
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Titulo</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    

     echo form_textarea('titulo',$publicaciondocente['titulo'],$textarea_options);

		?>
	</div> 
</div>



 
<div class="form-group row">
<label class="col-md-2 col-form-label"><a href="<?php echo $publicaciondocente['url']; ?>"> Dirección web:</a></label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    

     echo form_textarea('url',$publicaciondocente['url'],$textarea_options);

		?>
	</div> 
</div>




<?php echo form_close(); ?>





</body>









</html>