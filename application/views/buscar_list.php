<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<div id="eys-nav-i"><ul>
        <li> <?php echo anchor('perfil/add', 'primero'); ?></li>
        <li><a href="#">anterior</a></li>
        <li><a href="#">siguiente</a></li>
        <li><a href="#">ultimo</a></li>
        <li><?php echo anchor('documento/edit/'.$documento['iddocumento'],'Edit'); ?></li>
        <li><?php echo anchor('documento/delete/'.$documento['iddocumento'],'Delete'); ?></li>
        <li><a href="#">buscar</a></li>
    </ul></div>

<br>
<br>


<?php echo form_open('documento/save_edit') ?>
<?php echo form_hidden('iddocumento',$documento['iddocumento']) ?>
<table>
  
  <tr>
     <td>iddocumento:</td>
     <td><?php echo form_input('iddocumento',$documento['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos')) ?></td>
  </tr>
 
 <tr>
      <td>Fecha Elaboracion:</td>
      <td><?php echo form_input('fechaelaboracion',$documento['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion')) ?></td>
  </tr>

  <tr>
      <td>Fecha Recepcion:</td>
      <td><?php echo form_input('fechaentrerecep',$documento['fechaentrerecep'],array('type'=>'date', 'placeholder'=>'fechaentrerecep')) ?></td>
  </tr>
 
  <tr>
      <td>Asunto:</td>
      <td><?php echo form_textarea('asunto',$documento['asunto'],array('placeholder'=>'asunto')) ?></td>
  </tr>


  <tr>
     <td>Archivo_Pdf</td>
     <td><?php echo form_textarea('archivopdf',$documento['archivopdf'],array('placeholder'=>'archivopdf')) ?></td>
  </tr> 
   <tr>
      <td>Observacion:</td>
      <td><?php echo form_textarea('observacion',$documento['observacion'],array('placeholder'=>'observacion')) ?></td>
  </tr>

 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Update Item!'); ?> <?php echo anchor('documento','Back') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>





</body>









</html>
