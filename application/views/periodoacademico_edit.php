<?php echo form_open('periodoacademico/save_edit') ?>
<?php echo form_hidden('idperiodoacademico',$periodoacademico['idperiodoacademico']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
    
  <tr>
      <td>Nombre largo:</td>
      <td><?php
 
$eys_arrinput=array('namelargo'=>'nombrelargo','value'=>$periodoacademico['nombrelargo'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>

<tr>
      <td>Nombre corto:</td>
      <td><?php
 
$eys_arrinput=array('namecorto'=>'nombrecorto','value'=>$periodoacademico['nombrecorto'], "style"=>"width:500px");
 echo form_input($eys_arrinput); ?></td>
  </tr>


<tr>
      <td>Fecha de Inicia:</td>
<td><?php echo form_input('fechainicio',  (isset($evento['fechainicio']) ? date('Y-m-d H:i:s', strtotime($periodoacademico['fechainicio'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>


<tr>
      <td>Fecha de fin:</td>
<td><?php echo form_input('fechafin',  (isset($evento['fechafin']) ? date('Y-m-d H:i:s', strtotime($periodoacademico['fechafin'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>



<tr>
<td> Depart/carrara:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $periodoacademico['iddepartamento']);  ?></td>
</tr>



 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('periodoacademico','Atras') ?></td>
 </tr>
</table>
<?php echo form_close(); ?>
