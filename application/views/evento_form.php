<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open("evento/save",array('id'=>'eys-form')); ?>

<ul>
    <li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    <li> <?php echo anchor('evento', 'Cancelar'); ?></li>
</ul>

</div>
<br>



<?php echo form_hidden("idevento")  ?>
<table>
<tr>
    <td> Estado del evento:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($evento_estados as $row){
      $options[$row->idevento_estado]= $row->nombre;
    }
     echo form_dropdown("idevento_estado",$options, set_select('--Select--','default_value'));  ?></td>
</tr>

<tr>
    <td> Institucion:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($instituciones as $row){
      $options[$row->idinstitucion]= $row->nombre;
    }
     echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>


<tr>
<td> Título del evento: </td>
<td><?php echo form_input("titulo","", array("placeholder"=>"Título del evento"))  ?></td>
</tr>




<tr>
<td> fecha creacion </td>
<td><?php echo form_input(array("name"=>"fechacreacion","id"=>"fechacreacion","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Fecha Inicia </td>
<td><?php echo form_input(array("name"=>"fechainicia","id"=>"fechainicia","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Fecha Finaliza </td>
<td><?php echo form_input(array("name"=>"fechafinaliza","id"=>"fechafinaliza","type"=>"date"));  ?></td>
</tr>


<tr>
<td> Detalle </td>
<td><?php 
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto" );    
    
 echo form_textarea("detalle","", $textarea_options)  ?></td>
</tr>






</table>
<?php echo form_close();?>
    
     <script>
    async function cargaarchivo(url)
{

    let formData = new FormData(); 
    formData.append("file", archivopdf.files[0]);
    await fetch(url, {method: "POST", body: formData}); 
  alert('The file has been uploaded successfully.');

};
</script>
