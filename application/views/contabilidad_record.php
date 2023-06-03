<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($contabilidad))
{
?>
        <li> <?php echo anchor('contabilidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('contabilidad/anterior/'.$contabilidad['idcontabilidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('contabilidad/siguiente/'.$contabilidad['idcontabilidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('contabilidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('contabilidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('contabilidad/edit/'.$contabilidad['idcontabilidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('contabilidad/delete/'.$contabilidad['idcontabilidad'],'Delete'); ?></li>
        <li> <?php echo anchor('contabilidad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('contabilidad/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('contabilidad/save_edit') ?>
<?php echo form_hidden('idcontabilidad',$contabilidad['idcontabilidad']) ?>
<table>
  <tr>
     <td>Id contabilidad:</td>
     <td><?php echo form_input('idcontabilidad',$contabilidad['idcontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Idcontabilidads')) ?></td>
  </tr>
 
 
<tr>
     <td>Beneficiario:</td>
     <td><?php 
$options= array("NADA");
foreach ($beneficiarios as $row){
	$options[$row->idbeneficiario]= $row->elbeneficiario;
}

echo form_input('idbeneficiario',$options[$contabilidad['idbeneficiario']],array("disabled"=>"disabled",'style'=> 'width:500px;')) ?></td>
  </tr>


<tr>
     <td>Fecha:</td>
     <td><?php echo form_input('fechacontabilidad',$contabilidad['fechacontabilidad'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>

 
  <tr>
     <td>Valor:</td>
     <td><?php echo form_input('valor',$contabilidad['valor'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Pagador:</td>
     <td><?php 
$options= array("NADA");
foreach ($pagadores as $row){
	$options[$row->idpagador]= $row->elpagador;
}

echo form_input('idpagador',$options[$contabilidad['idpagador']],array("disabled"=>"disabled",'style'=> 'width:500px;')) ?></td>
  </tr>





<tr>
     <td>Detalle:</td>
<td>
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',"disabled"=>"disabled", 'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$contabilidad['detalle'],$textarea_options); 

?></td>
  </tr>



<div class="form-group row">
	<label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
		<?php
		$options= array("NADA");
		foreach ($documentos as $row){
			$options[$row->iddocumento]= $row->asunto;
		}

		echo form_input('iddocumento',$options[$certificado['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div>
</div>




</table>
<?php echo form_close(); ?>





</body>









</html>
