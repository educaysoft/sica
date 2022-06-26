<?php echo form_open('curso/save_edit') ?>
<?php echo form_hidden('idcurso',$curso['idcurso']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del curso:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'nombre','value'=>$curso['nombre'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Asunto:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion","id" =>"descripcion");    
echo form_textarea('descripcion',$curso['descripcion'],$textarea_options ); 
?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración(horas):</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'duracion','value'=>$curso['duracion'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Page detalle:</label>
	<div class="col-md-10">
		<?php
$eys_arrinput=array('name'=>'linkdetalle','value'=>$curso['linkdetalle'], "style"=>"width:500px");
 echo form_input($eys_arrinput);
		?>
	</div> 
</div>


 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('curso','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
