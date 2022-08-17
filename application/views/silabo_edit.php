<?php echo form_open('silabo/save_edit') ?>
<?php echo form_hidden('idsilabo',$silabo['idsilabo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del silabo:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombre','value'=>$silabo['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion","id" =>"descripcion");    
echo form_textarea('descripcion',$silabo['descripcion'],$textarea_options ); 
?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración(horas):</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'duracion','value'=>$silabo['duracion'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Page detalle:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'linkdetalle','value'=>$silabo['linkdetalle'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('silabo','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
