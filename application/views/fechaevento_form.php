
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("fechaevento/save") ?>
<table>


<tr>
<td> Evento: </td>
<td><?php 

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
<td> Fecha de evento : </td>
<td><?php echo form_input(array("name"=>"fecha","id"=>"fecha","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Tema a tratar: </td>
<td><?php 
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("tema","", $textarea_options)  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("fechaevento","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

