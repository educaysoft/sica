<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('fechaevento/save_edit') ?>
    <ul>
<?php
if(isset($fechaevento))
{
?>
 
        <li> <?php echo anchor('fechaevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('fechaevento/anterior/'.$fechaevento['idfechaevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('fechaevento/siguiente/'.$fechaevento['idfechaevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('fechaevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('fechaevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('fechaevento/edit/'.$fechaevento['idfechaevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('fechaevento/delete/'.$fechaevento['idfechaevento'],'Delete'); ?></li>
        <li> <?php echo anchor('fechaevento/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('fechaevento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$fechaevento['idevento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php

    echo form_input('idevento',$fechaevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')); 

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

echo form_input('idevento',$options[$fechaevento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema programado: ( <?php echo anchor('tema/actual/'.$fechaevento['idtema'], 'Ver'); ?>):</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($temas as $row){
	$options[$row->idtema]= $row->nombrecorto;
}

echo form_input('idtema',$options[$fechaevento['idtema']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de evento:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$fechaevento['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>






 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema a tratar(largo):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('tema',$fechaevento['tema'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema a tratar(corto):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('temacorto',$fechaevento['temacorto'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ponderacion:</label>
	<div class="col-md-10">
		<?php

    echo form_input('ponderacion',$fechaevento['ponderacion'],array("disabled"=>"disabled",'placeholder'=>'ponderacion')); 

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora inicio:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time",'value'=>$fechaevento['horainicio'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora fin:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time",'value'=>$fechaevento['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 
		?>
	</div> 
</div>



</table>
<?php echo form_close(); ?>





</body>









</html>
