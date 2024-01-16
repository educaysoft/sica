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
    <label class="col-md-2 col-form-label">Id publicacion docente:</label>
	<div class="col-md-10">
     <?php 

     echo form_input('idpublicaciondocente',$publicaciondocente['idpublicaciondocente'],array("disabled"=>"disabled",'placeholder'=>'Idpublicaciondocentes'));
		?>
	</div> 
</div>
 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('iddocente',$options[$publicaciondocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px'));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('publicacion/actual/'.$publicaciondocente['idpublicacion'], 'Publicacion:'); ?></label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($publicacions as $row){
	$options[$row->idpublicacion]= $row->titulo;
}

echo form_input('idpublicacion',$options[$publicaciondocente['idpublicacion']],array("disabled"=>"disabled",'style'=>'width:500px'));

		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
