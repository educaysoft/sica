<?php echo form_open('plantillacorreo/save_edit') ?>
<?php echo form_hidden('idplantillacorreo',$plantillacorreo['idplantillacorreo']) ?>
<h2> <?php echo $title; ?></h2>
<hr />
<table>
 
   <tr>
     <td>Id plantillacorreo</td>
     <td><?php 


$eys_arrinput=array('name'=>'idplantillacorreo','value'=>$plantillacorreo['idplantillacorreo'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput); ?></td>
  </tr> 
























































<tr>
  <td>Subject:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"subject","id" =>"subject");    
echo form_textarea('subject',$plantillacorreo['subject'],$textarea_options ); ?></td>
</tr>

<tr>
  <td>Head:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"head","id" =>"head");    
echo form_textarea('head',$plantillacorreo['head'],$textarea_options ); ?></td>
</tr>

<tr>
  <td>Body:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"body","id" =>"body");    
echo form_textarea('body',$plantillacorreo['body'],$textarea_options ); ?></td>
</tr>




<tr>
  <td>Foot:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"foot","id" =>"foot");    
echo form_textarea('foot',$plantillacorreo['foot'],$textarea_options ); ?></td>
</tr>





 <tr>
 <td colspan="2"> <hr><?php echo form_submit('submit', 'Guardar'); ?> <?php echo anchor('plantillacorreo','Atras') ?></td>
 </tr>










</table>
<?php echo form_close(); ?>
