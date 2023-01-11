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
        <li> <?php echo anchor('prestamoarticulo/listar/'.$prestamoarticulo['idprestamoarticulo'],'Listar'); ?></li>
	<li> <?php echo anchor('prestamoarticulo/reportepdf/'.$prestamoarticulo['idprestamoarticulo'], 'Reportepdf'); ?></li>

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


<?php echo form_hidden('idevento',$prestamoarticulo['idprestamoarticulo']) ?>
<table>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('articulo/actual/'.$prestamoarticulo['idarticulo'], 'Evento:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$prestamoarticulo['idarticulo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$prestamoarticulo['idpersona'],'Tema silabo: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$prestamoarticulo['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de prestamo:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechaprestamo',$prestamoarticulo['fechaprestamo'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha devolucion:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechadevolucion',$prestamoarticulo['fechadevolucion'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>


 
  




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$prestamoarticulo['detalle'],$textarea_options); 


		?>
	</div> 
</div>










<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora pretamo:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horaprestamo','id'=>'horaprestamo',"type"=>"time",'value'=>$prestamoarticulo['horaprestamo'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora devolucion:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horadevolucion','id'=>'horadevolucion',"type"=>"time",'value'=>$prestamoarticulo['horadevolucion'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 
		?>
	</div> 
</div>












<?php echo form_close(); ?>





</body>









</html>
