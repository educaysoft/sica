<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('categoriadocente/save_edit') ?>
    <ul>
        <li> <?php echo anchor('categoriadocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('categoriadocente/anterior/'.$categoriadocente['idcategoriadocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('categoriadocente/siguiente/'.$categoriadocente['idcategoriadocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('categoriadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('categoriadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('categoriadocente/edit/'.$categoriadocente['idcategoriadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('categoriadocente/quitar/'.$categoriadocente['idcategoriadocente'],'Quitar'); ?></li>
        <li> <?php echo anchor('categoriadocente/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcategoriadocente',$categoriadocente['idcategoriadocente']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idcategoriadocente',$categoriadocente['idcategoriadocente'],array("disabled"=>"disabled",'placeholder'=>'Idcategoriadocentes')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$categoriadocente['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
