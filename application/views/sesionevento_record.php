<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('sesionevento/save_edit') ?>
    <ul>
<?php
if(isset($sesionevento))
{
?>
 
        <li> <?php echo anchor('sesionevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('sesionevento/anterior/'.$sesionevento['idsesionevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('sesionevento/siguiente/'.$sesionevento['idsesionevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('sesionevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('sesionevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('sesionevento/edit/'.$sesionevento['idsesionevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('sesionevento/delete/'.$sesionevento['idsesionevento'],'Delete'); ?></li>
        <li> <?php echo anchor('sesionevento/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('sesionevento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$sesionevento['idevento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php

    echo form_input('idevento',$sesionevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Evento </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$sesionevento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema programado: ( <?php echo anchor('tema/actual/'.$sesionevento['idtema'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($temas as $row){
	$options[$row->idtema]= $row->nombrecorto;
}

echo form_input('idtema',$options[$sesionevento['idtema']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de la sesión:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$sesionevento['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>






 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema a tratar(largo):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('tema',$sesionevento['tema'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema a tratar(corto):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('temacorto',$sesionevento['temacorto'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ponderacion:</label>
	<div class="col-md-10">
		<?php

    echo form_input('ponderacion',$sesionevento['ponderacion'],array("disabled"=>"disabled",'placeholder'=>'ponderacion')); 

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora inicio:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time",'value'=>$sesionevento['horainicio'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora fin:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time",'value'=>$sesionevento['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modo de evaluación: </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

echo form_input('idmodoevaluacion',$options[$sesionevento['idmodoevaluacion']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>




<?php echo form_close(); ?>





</body>









</html>
