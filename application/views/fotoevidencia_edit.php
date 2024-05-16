<?php echo form_open('fotoevidencia/save_edit') ?>
<?php echo form_hidden('idfotoevidencia',$fotoevidencia['idfotoevidencia']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
 <tr>
      <td>Nombre:</td>
      <td><?php echo form_input('nombre',$fotoevidencia['nombre'],array('placeholder'=>'Nombre del ', "style"=>"width:500px")) ?></td>
  </tr>

<tr>
      <td>Detalle:</td>
<td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle del fotoevidencia" );    
      echo form_textarea('detalle',$fotoevidencia['detalle'],$textarea_options) ?></td>
  </tr>








 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('fotoevidencia','Atras') ?></td>
 </tr>



</table>
<?php echo form_close(); ?>
