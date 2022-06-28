<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($participanteestado))
{
?>
        <li> <?php echo anchor('participanteestado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('participanteestado/siguiente/'.$participanteestado['idparticipanteestado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('participanteestado/anterior/'.$participanteestado['idparticipanteestado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('participanteestado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('participanteestado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('participanteestado/edit/'.$participanteestado['idparticipanteestado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('participanteestado/delete/'.$participanteestado['idparticipanteestado'],'Delete'); ?></li>
        <li> <?php echo anchor('participanteestado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('participanteestado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('participanteestado/save_edit') ?>
<?php echo form_hidden('idparticipanteestado',$participanteestado['idparticipanteestado']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idparticipanteestado',$participanteestado['idparticipanteestado'],array("disabled"=>"disabled",'placeholder'=>'Idparticipanteestados'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$participanteestado['nombre'],array('placeholder'=>'Nombre del participanteestado')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



