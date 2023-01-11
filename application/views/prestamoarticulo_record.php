<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('prestamoarticulo/save_edit') ?>
    <ul>
<?php
if(isset($prestamoarticulo))
{
?>
 
        <li> <?php echo anchor('prestamoarticulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('prestamoarticulo/anterior/'.$prestamoarticulo['idprestamoarticulo'], 'anterior'); ?></li>
        <li> <?php echo anchor('prestamoarticulo/siguiente/'.$prestamoarticulo['idprestamoarticulo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('prestamoarticulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('prestamoarticulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('prestamoarticulo/edit/'.$prestamoarticulo['idprestamoarticulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('prestamoarticulo/delete/'.$prestamoarticulo['idprestamoarticulo'],'Delete'); ?></li>
        <li> <?php echo anchor('prestamoarticulo/listar/'.$prestamoarticulo['idevento'],'Listar'); ?></li>
	<li> <?php echo anchor('prestamoarticulo/reportepdf/'.$prestamoarticulo['idevento'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('prestamoarticulo/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$prestamoarticulo['idevento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php

    echo form_input('idevento',$prestamoarticulo['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('evento/actual/'.$prestamoarticulo['idevento'], 'Evento:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$prestamoarticulo['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('tema/actual/'.$prestamoarticulo['idtema'],'Tema silabo: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}

echo form_input('idtema',$options[$prestamoarticulo['idtema']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de la sesión:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$prestamoarticulo['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>






 
  




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema tratado(corto):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('temacorto',$prestamoarticulo['temacorto'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema tratado(largo):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('tema',$prestamoarticulo['tema'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ponderacion:</label>
	<div class="col-md-10">
		<?php

    echo form_input('ponderacion',$prestamoarticulo['ponderacion'],array("disabled"=>"disabled",'placeholder'=>'ponderacion')); 

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora inicio:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time",'value'=>$prestamoarticulo['horainicio'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora fin:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time",'value'=>$prestamoarticulo['horafin'], "style"=>"width:500px");
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

echo form_input('idmodoevaluacion',$options[$prestamoarticulo['idmodoevaluacion']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>








<?php echo form_close(); ?>





</body>









</html>
