<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("fotoevidencia/save", array('id'=>'eys-form')); ?>
<?php echo form_hidden("idfotoevidencia"); 


	date_default_timezone_set('America/Guayaquil');
	$fecha = date("Y-m-d");

?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre :</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo",'style'=>'width:500px;'));

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle :</label>
	<div class="col-md-10">
		<?php

$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle" );    
	
 echo form_textarea("detalle","", $textarea_options); 


		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha tomada :</label>
	<div class="col-md-10">
		<?php

echo form_input(array("name"=>"fechatomada","id"=>"fechatomada","value"=>$fecha,"type"=>"date"));  

		?>
	</div> 
</div>







<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('fotoevidencia', 'Cancelar'); ?></li>
	</ul>
</div>


</table>
<?php echo form_close();?>

