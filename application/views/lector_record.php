<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($lector))
{
?>
        <li> <?php echo anchor('lector/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('lector/anterior/'.$lector['idlector'], 'anterior'); ?></li>
        <li> <?php echo anchor('lector/siguiente/'.$lector['idlector'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('lector/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('lector/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('lector/edit/'.$lector['idlector'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('lector/delete/'.$lector['idlector'],'Delete'); ?></li>
        <li> <?php echo anchor('lector/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('lector/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('lector/save_edit') ?>
<?php echo form_hidden('idlector',$lector['idlector']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id lector:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idlector',$lector['idlector'],array("disabled"=>"disabled",'placeholder'=>'Idlectors'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Documento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddocumento',$lector['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$lector['iddocumento'], 'Documento'); ?></label>

	<div class="col-md-10">
		<?php
	$options= array("NADA");
	foreach ($documentos as $row){
		$options[$row->iddocumento]= $row->asunto;
	}

$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('iddocumento',$options[$lector['iddocumento']],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Idpersona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$lector['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idlectors'));
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
echo form_input('nombre',$options[$lector['idpersona']],array("disabled"=>"disabled"));
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled",   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$lector['detalle'],$textarea_options); 
		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
