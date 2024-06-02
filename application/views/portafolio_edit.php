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
     echo form_dropdown($name="idordenador",$options, $portafolio['idordenador'],array('onchange'=>'get_directorio()',"id"=>"idordenador"));  ?></td>
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

    <script>

function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
    $.ajax({
        url: "<?php echo site_url('documento/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'POST',
	    async : false,
        dataType : 'json',
        success: function(data){
        console.log(data); // Depuración: Imprimir datos recibidos
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddirectorio+'>'+data[i].ruta+'</option>';
        }
        $('#iddirectorio').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
        console.log(xhr.responseText); // Añadir más información de depuración  
      }

    })

}

</script>



