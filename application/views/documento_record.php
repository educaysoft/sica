<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('documento/save_edit') ?>
    <ul>
        <li> <?php echo anchor('documento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documento/siguiente/'.$documento['iddocumento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('documento/anterior/'.$documento['iddocumento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documento/edit/'.$documento['iddocumento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documento/delete/'.$documento['iddocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('documento/listar/','Listar'); ?></li>
        <li> <?php echo anchor('documento/canvas/'.$documento['archivopdf'],'Ver PDF'); ?></li>
    </ul>
</div>
<br>


<?php echo form_hidden('iddocumento',$documento['iddocumento']) ?>
<table>

  <tr>
     <td>Tido de documento:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipodocus as $row){
	$options[$row->idtipodocu]= $row->descripcion;
}
$arrdatos=array('name'=>'idtipodocu','value'=>$options[$documento['idtipodocu']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?></td>
  </tr>
 


  <tr>
     <td>iddocumento:</td>
     <td><?php echo form_input('iddocumento',$documento['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'iddocumentos','style'=>'width:500px;')) ?></td>
  </tr>
 
 <tr>
      <td>Fecha Elaboracion:</td>
      <td><?php echo form_input('fechaelaboracion',$documento['fechaelaboracion'],array('type'=>'date','placeholder'=>'fechaelaboracion','style'=>'width:500px;')) ?></td>
  </tr>

  <tr>
      <td>Fecha Recepcion:</td>
      <td><?php echo form_input('fechaentrerecep',$documento['fechaentrerecep'],array('type'=>'date', 'placeholder'=>'fechaentrerecep','style'=>'width:500px;')) ?></td>
  </tr>

  <tr>
      <td> <?php echo anchor('emisor/add', 'Emisor/emisores:') ?></td>
      <td><?php
 	$options = array();
  	foreach ($emisores as $row){
		$options[$row->idpersona]=$row->elemisor;
	}


 echo form_multiselect('idemisor[]',$options,(array)set_value('idemisor', ''), array('style'=>'width:500px')); ?></td>
  </tr>


  <tr>
      <td>Destinatarios/as:</td>
      <td><?php
	$options=array();
  	foreach ($destinatarios as $row){
		$options[$row->idpersona]=$row->nombres;
	}


 echo form_multiselect('iddestinatario[]',$options,(array)set_value('iddestinatario',''), array('style'=>'width:500px;')); ?></td>
  </tr>


 
  <tr>
      <td>Asunto:</td>
      <td><?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('asunto',$documento['asunto'],$textarea_options); ?></td>
  </tr>


  <tr>
     <td><a href="<?php echo base_url(); ?>index.php/documento/show_pdf/<?php echo $documento['iddocumento']; ?>">Archivo_Pdf</a></td>
     <td><?php 
     
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500;height:100px;');    
     
echo form_textarea('archivopdf',$documento['archivopdf'],$textarea_options) ?></td>
  </tr> 




   <tr>
      <td>Observacion:</td>
      <td><?php echo form_textarea('observacion',$documento['observacion'],array('placeholder'=>'observacion')) ?></td>
  </tr>

</table>
<?php echo form_close(); ?>





</body>









</html>
