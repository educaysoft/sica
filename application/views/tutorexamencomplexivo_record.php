<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tutorexamencomplexivo))
{
?>
        <li> <?php echo anchor('tutorexamencomplexivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tutorexamencomplexivo/anterior/'.$tutorexamencomplexivo['idtutorexamencomplexivo'], 'anterior'); ?></li>
        <li> <?php echo anchor('tutorexamencomplexivo/siguiente/'.$tutorexamencomplexivo['idtutorexamencomplexivo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tutorexamencomplexivo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tutorexamencomplexivo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tutorexamencomplexivo/edit/'.$tutorexamencomplexivo['idtutorexamencomplexivo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tutorexamencomplexivo/delete/'.$tutorexamencomplexivo['idtutorexamencomplexivo'],'Delete'); ?></li>
        <li> <?php echo anchor('tutorexamencomplexivo/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('tutorexamencomplexivo/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('tutorexamencomplexivo/save_edit') ?>
<?php echo form_hidden('idtutorexamencomplexivo',$tutorexamencomplexivo['idtutorexamencomplexivo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id tutorexamencomplexivo:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idtutorexamencomplexivo',$tutorexamencomplexivo['idtutorexamencomplexivo'],array("disabled"=>"disabled",'placeholder'=>'Idtutorexamencomplexivos'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Documento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddocumento',$tutorexamencomplexivo['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$tutorexamencomplexivo['iddocumento'], 'Documento'); ?></label>

	<div class="col-md-10">
		<?php
	$options= array("NADA");
	foreach ($documentos as $row){
		$options[$row->iddocumento]= $row->asunto;
	}

$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('iddocumento',$options[$tutorexamencomplexivo['iddocumento']],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Idpersona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$tutorexamencomplexivo['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idtutorexamencomplexivos'));
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}
echo form_input('nombre',$options[$tutorexamencomplexivo['idpersona']],array("disabled"=>"disabled"));
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled",   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$tutorexamencomplexivo['detalle'],$textarea_options); 
		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
