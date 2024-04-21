<?php echo form_open('portafolio/save_edit') ?>
<?php echo form_hidden('idportafolio',$portafolio['idportafolio']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id portafolio</td>
     <td><?php 


$eys_arrinput=array('name'=>'idportafolio','value'=>$portafolio['idportafolio'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 



 
 <tr>
<td> Persona:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}

 echo form_dropdown("idpersona",$options, $portafolio['idpersona']);  ?></td>
</tr>

<tr>
<td> Periodo académico:</td>
<td><?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}

 echo form_dropdown("idperiodoacademico",$options, $portafolio['idperiodoacademico']);  ?></td>
</tr>

<tr>
    <td>Ordenador destino:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($ordenadores as $row){
      $options[$row->idordenador]= $row->nombre;
    }
     echo form_dropdown($name="idordenador",$options, $documento['idordenador'],array('onchange'=>'get_directorio()',"id"=>"idordenador"));  ?></td>
</tr>



<tr>
    <td>Directorio:</td>

    <td>
<div class="form-group">
                    <select class="form-control" id="iddirectorio" name="iddirectorio" required>
                        <option>No Selected</option>
<?php
    $options= array('--Select--');
    foreach ($directorios as $row){
	    if($documento['iddirectorio']==$row->iddirectorio)
		{
	    echo '<option selected="selected"  value="'.$row->iddirectorio.'">'.$row->ruta.'</option>'; 
	    }else{
	    echo '<option value="'.$row->iddirectorio.'">'.$row->ruta.'</option>'; 
	    }
    }
?>

                    </select>
                  </div>



</td>

</tr>



 
 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('portafolio','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
