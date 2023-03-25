<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($password))
{
?>
        <li> <?php echo anchor('password/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('password/anterior/'.$password['idpassword'], 'anterior'); ?></li>
        <li> <?php echo anchor('password/siguiente/'.$password['idpassword'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('password/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('password/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('password/edit/'.$password['idpassword'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('password/delete/'.$password['idpassword'],'Delete'); ?></li>
        <li> <?php echo anchor('password/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('password/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('password/save_edit') ?>
<?php echo form_hidden('idpassword',$password['idpassword']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Password Id:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idpassword',$password['idpassword'],array("disabled"=>"disabled",'placeholder'=>'Idpasswords','style'=>'width:500px')); 
	?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Password:</label>
	<div class="col-md-10">
	<?php
      echo form_input('password',$password['password'],array("disabled"=>"disabled",'placeholder'=>'password')); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Usuario:</label>
	<div class="col-md-10">
	<?php
 
$options= array("NADA");
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

echo form_input('idusuario',$options[$password['idusuario']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 
 



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$password['idevento'], 'Evento:'); ?> </label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$password['idevento']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> OnOff:</label>
	<div class="col-md-10">
	<?php
      echo form_input('onoff',$password['onoff'],array("disabled"=>"disabled",'placeholder'=>'onoff')); 
	?>
	</div> 
</div>
 
<div class="form-group row">
    <label class="col-md-2 col-form-label">Fechaon:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechaon',$password['fechaon'],array("disabled"=>"disabled",'placeholder'=>'onoff')); 
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Fecha off:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fechaoff',$password['fechaoff'],array("disabled"=>"disabled",'placeholder'=>'onoff')); 
	?>
	</div> 
</div>




<?php echo form_close(); ?>





</body>









</html>
