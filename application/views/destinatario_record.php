<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($destinatario))
{
?>
        <li> <?php echo anchor('destinatario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('destinatario/anterior/'.$destinatario['iddestinatario'], 'anterior'); ?></li>
        <li> <?php echo anchor('destinatario/siguiente/'.$destinatario['iddestinatario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('destinatario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('destinatario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('destinatario/edit/'.$destinatario['iddestinatario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('destinatario/delete/'.$destinatario['iddestinatario'],'Delete'); ?></li>
        <li> <?php echo anchor('destinatario/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('destinatario/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('destinatario/save_edit') ?>
<?php echo form_hidden('iddestinatario',$destinatario['iddestinatario']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id destinatario:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddestinatario',$destinatario['iddestinatario'],array("disabled"=>"disabled",'placeholder'=>'Iddestinatarios'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id Documento:</label>
	<div class="col-md-10">
		<?php
      echo form_input('iddocumento',$destinatario['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$destinatario['iddocumento'], 'Documento'); ?></label>

	<div class="col-md-10">
		<?php
	$options= array("NADA");
	foreach ($documentos as $row){
		$options[$row->iddocumento]= $row->asunto;
	}

$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('iddocumento',$options[$destinatario['iddocumento']],$textarea_options); 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Idpersona:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idpersona',$destinatario['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Iddestinatarios'));
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
echo form_input('nombre',$options[$destinatario['idpersona']],array("disabled"=>"disabled"));
		?>
	</div> 
</div>
 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',  "disabled"=>"disabled",   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$destinatario['detalle'],$textarea_options); 
		?>
	</div> 
</div>



<?php echo form_close(); ?>





</body>









</html>
