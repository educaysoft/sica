<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($evento))
{
?>
	<li> <?php echo anchor('evento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evento/siguiente/'.$evento['idevento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evento/anterior/'.$evento['idevento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evento/edit/'.$evento['idevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evento/delete/'.$evento['idevento'],'Delete'); ?></li>
        <li> <?php echo anchor('evento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('evento/listar_participantes/'.$evento['idevento'],'Participantes'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('evento/save_edit') ?>
<?php echo form_hidden('idevento',$evento['idevento']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php


echo form_input('idevento',$evento['idevento'],array("disabled"=>"disabled",'placeholder'=>'ideventos','style'=>'width:500px;'))

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('evento_estado/add', 'Evento estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($evento_estados as $row){
	      $options[$row->idevento_estado]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idevento_estado','value'=>$options[$evento['idevento_estado']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>

	</div> 
</div>





 <div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('institucion/add', 'Institucion:') ?> </label>
 

     <?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$evento['idinstitucion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo del evento:</label>
	<div class="col-md-10">
     <?php echo form_input('titulo',$evento['titulo'],array("disabled"=>"disabled",'placeholder'=>'titulo','style'=>'width:500px;')) 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de creación:</label>
	<div class="col-md-10">

      <?php echo form_input('fechacreacion',$evento['fechacreacion'],array('type'=>'date','placeholder'=>'fechacreacion','style'=>'width:500px;')) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fechainicia',$evento['fechainicia'],array('type'=>'date', 'placeholder'=>'fechainicia','style'=>'width:500px;')) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de finaliza:</label>
	<div class="col-md-10">
      <?php echo form_input('fechafinaliza',$evento['fechafinaliza'],array('type'=>'date', 'placeholder'=>'fechafinaliza','style'=>'width:500px;')) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Participantes ( <?php echo anchor('evento/add', 'New'); ?>):</label>
      <?php
 	$options = array();
  	foreach ($participantes as $row){
		$options[$row->idpersona]=$row->nombres;
	}

	?>
	<div class="col-md-10">
	<?php
	echo form_multiselect('idparticipante[]',$options,(array)set_value('idparticipante', ''), array('style'=>'width:500px')); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detalle',$evento['detalle'],$textarea_options);
	?>
	</div> 
</div>

<?php echo form_close(); ?>





</body>









</html>
