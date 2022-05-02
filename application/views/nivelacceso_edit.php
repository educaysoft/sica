<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelacceso/save_edit") ?>
<?php echo form_hidden("idnivelacceso",$nivelacceso['idnivelacceso'])  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php 
    $eys_arrinput=array('name'=>'nombre','value'=>$nivelacceso['nombre'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>


<tr
<td> Crear: </td>
<td><?php 
    $eys_arrinput=array('name'=>'create','value'=>$nivelacceso['create'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>



<tr>
<td> Lectura </td>
<td><?php 
    $eys_arrinput=array('name'=>'read','value'=>$nivelacceso['read'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>



<tr>
<td> Actualizar: </td>
<td><?php 
    $eys_arrinput=array('name'=>'update','value'=>$nivelacceso['update'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>


<tr>
<td> Borrar: </td>
<td><?php 
    $eys_arrinput=array('name'=>'delete','value'=>$nivelacceso['delete'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>

<tr>
<td> Modulo de inicio: </td>
<td><?php 
    $eys_arrinput=array('name'=>'inicio','value'=>$nivelacceso['inicio'], "style"=>"width:500px");
    echo form_input($eys_arrinput);  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelacceso","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

