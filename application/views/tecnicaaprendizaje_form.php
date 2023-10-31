<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tecnicaaprendizaje/save",array('id'=>'eys-form')); ?>
<?php echo form_hidden("idtecnicaaprendizaje")  ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Nombre del metodo:</label>
<div class="col-md-10">
<?php
echo form_input("nombre","", array("placeholder"=>"Nombre de tecnicaaprendizaje")); 
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

<div class="form-group row">
<label class="col-md-2 col-form-label">Metodo aprendizaje:</label>
<div class="col-md-10">
<?php
    $options= array('--Select--');
    foreach ($metodoapendizajes as $row){
      $options[$row->idmetodoaprendizaje]= $row->nombre;
    }
     echo form_dropdown("idmetodoaprendizaje",$options, set_select('--Select--','default_value'),array('id'=>'idmetodoaprendizaje')); 
?>
</div>
</div>




<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tecnicaaprendizaje","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

