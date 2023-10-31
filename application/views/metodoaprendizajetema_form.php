<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("metodoaprendizajetema/save") ?>
<?php echo form_hidden("idmetodoaprendizajetema")  ?>
<table>


<tr>
<td> Tema: </td>
<td><?php 

$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]=$row->nombrecorto;
}

 echo form_dropdown("idtema",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> Metodo aprendizaje: </td>
<td><?php 

$options= array('--Select--');
foreach ($metodoaprendizajes as $row){
	$options[$row->idmetodoaprendizaje]=$row->nombre;

}

 echo form_dropdown("idmetodoaprendizaje",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("metodoaprendizajetema","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

