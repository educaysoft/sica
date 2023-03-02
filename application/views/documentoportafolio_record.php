<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documentoportafolio) and !empty($documentoportafolio))
{
?>
        <li> <?php echo anchor('documentoportafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentoportafolio/anterior/'.$documentoportafolio['iddocumentoportafolio'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentoportafolio/siguiente/'.$documentoportafolio['iddocumentoportafolio'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentoportafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentoportafolio/edit/'.$documentoportafolio['iddocumentoportafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentoportafolio/delete/'.$documentoportafolio['iddocumentoportafolio'],'Delete'); ?></li>
        <li> <?php echo anchor('documentoportafolio/listar/','Listar'); ?></li>
        <li> <?php echo anchor('documentoportafolio/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('documentoportafolio/reportepdf/'.$documentoportafolio['iddocumentoportafolio'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('documentoportafolio/save_edit') ?>
<?php echo form_hidden('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documentoportafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentoportafolios')); ?>
 
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

echo form_input('iddocumento',$options[$documentoportafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Id portafolio:</label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($portafolios as $row){
	$options[$row->idportafolio]= $row->lapersona." - ".$row->elperiodo;
}
echo form_input('idportafolio',$options[$documentoportafolio['idportafolio']],array("id"=>"idportafilio","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>













<?php echo form_close(); ?>







</body>









</html>
