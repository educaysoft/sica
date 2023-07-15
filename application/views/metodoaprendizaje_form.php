<h2> <?php echo $title; ?> </h2>
<hr/>

<?php echo form_open("metodoaprendizaje/save",array('id'=>'eys-form')); ?>
<?php echo form_hidden("idmetodoaprendizaje")  ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Nombre del metodo:</label>
<div class="col-md-10">
<?php
echo form_input("nombre","", array("placeholder"=>"Nombre de metodoaprendizaje")); 
			?>
		</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Descripción:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'maxlength'=>'200', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto",'id'=>'asunto' );    
 echo form_textarea("descripcion","", $textarea_options); 
?><div id="textarea_feedback"></div>
</div>
</div>

<div id="eys-nav-i">
	<ul>
		<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('metodoaprendizaje', 'Cancelar'); ?></li>
	</ul>
</div>


<?php echo form_close();?>

