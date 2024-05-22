<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('afinidadtitulo/save_edit') ?>
    <ul>
        <li> <?php echo anchor('afinidadtitulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('afinidadtitulo/anterior/'.$afinidadtitulo['idafinidadtitulo'], 'anterior'); ?></li>
        <li> <?php echo anchor('afinidadtitulo/siguiente/'.$afinidadtitulo['idafinidadtitulo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('afinidadtitulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('afinidadtitulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('afinidadtitulo/edit/'.$afinidadtitulo['idafinidadtitulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('afinidadtitulo/quitar/'.$afinidadtitulo['idafinidadtitulo'],'Quitar'); ?></li>
        <li> <?php echo anchor('afinidadtitulo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idafinidadtitulo',$afinidadtitulo['idafinidadtitulo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">

     <?php echo form_input('idafinidadtitulo',$afinidadtitulo['idafinidadtitulo'],array("disabled"=>"disabled",'placeholder'=>'Idafinidadtitulos')) ?>
 
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
 
     <?php echo form_input('nombre',$afinidadtitulo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?>

	</div> 
</div> 

  








<?php echo form_close(); ?>





</body>









</html>
