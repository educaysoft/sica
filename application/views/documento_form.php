<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open("documento/save",array('id'=>'eys-form')); ?>

<ul>
    <li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    <li> <?php echo anchor('documento', 'Cancelar'); ?></li>
</ul>

</div>
<br>



<?php echo form_hidden("iddocumento")  ?>
<table>
<tr>
    <td> Tipo de documento:</td>
    <td><?php
    $options= array('--Select--');
    foreach ($tipodocus as $row){
      $options[$row->idtipodocu]= $row->descripcion;
    }
     echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'));  ?></td>
</tr>




<tr>
<td> fecha elaboracion </td>
<td><?php echo form_input(array("name"=>"fechaelaboracion","id"=>"fechaelaboracion","type"=>"date"));  ?></td>
</tr>

<tr>
<td> Fecha Recepcion </td>
<td><?php echo form_input(array("name"=>"fechaentrerecep","id"=>"fechaentrerecep","type"=>"date"));  ?></td>
</tr>

<tr>
<td> asunto </td>
<td><?php 
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"asunto" );    
    
 echo form_textarea("asunto","", $textarea_options)  ?></td>
</tr>



<tr>
<td> archivo_pdf </td>


<td>
<div style="display: inline-block";>

<div style="float: left;">
<?php
     echo form_input(array("name"=>"archivopdf","id"=>"archivopdf"));

?>
</div>
<div style="float: left;">
<?php 

$upload_data = array('type' => 'file','name' => 'archivopdf','id' => 'archivopdf');
echo form_upload($upload_data );?>
</div>
<div style="float: left;">
<?php 
$url= base_url()."index.php/documento/loadpdf2";

$js='onClick="cargaarchivo(\''.$url.'\')"';     
echo form_button("carga","cargar a directorio",$js); ?>
</div> 
</div>
 </td>
</tr>

<tr>
<td> Observacion </td>
<td><?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"observacion" );    
    
 echo form_textarea("observacion","", $textarea_options)  ?></td>
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
