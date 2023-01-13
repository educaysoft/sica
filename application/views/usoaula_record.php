<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('usoaula/save_edit') ?>
    <ul>
<?php
if(isset($usoaula))
{
?>
 
        <li> <?php echo anchor('usoaula/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('usoaula/anterior/'.$usoaula['idusoaula'], 'anterior'); ?></li>
        <li> <?php echo anchor('usoaula/siguiente/'.$usoaula['idusoaula'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('usoaula/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('usoaula/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('usoaula/edit/'.$usoaula['idusoaula'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('usoaula/delete/'.$usoaula['idusoaula'],'Delete'); ?></li>
        <li> <?php echo anchor('usoaula/listar/'.$usoaula['idusoaula'],'Listar'); ?></li>
	<li> <?php echo anchor('usoaula/reportepdf/'.$usoaula['idusoaula'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('usoaula/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$usoaula['idusoaula']) ?>
<table>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('articulo/actual/'.$usoaula['idarticulo'], 'El artículo:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($articulos as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$usoaula['idarticulo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('persona/actual/'.$usoaula['idpersona'],'La persona: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos."  ".$row->nombres;
}

echo form_input('idpersona',$options[$usoaula['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de prestamo:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechaprestamo',$usoaula['fechaprestamo'],array('type'=>'date',"disabled"=>"disabled", 'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora pretamo:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horaprestamo','id'=>'horaprestamo',"type"=>"time",'value'=>$usoaula['horaprestamo'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha devolucion:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fechadevolucion',$usoaula['fechadevolucion'],array('type'=>'date',"disabled"=>"disabled",  'placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>


 <div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora devolucion:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horadevolucion','id'=>'horadevolucion',"type"=>"time",'value'=>$usoaula['horadevolucion'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 
		?>
	</div> 
</div>
  




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$usoaula['detalle'],$textarea_options); 


		?>
	</div> 
</div>

























<?php echo form_close(); ?>





</body>









</html>
