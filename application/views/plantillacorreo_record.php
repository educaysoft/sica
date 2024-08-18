<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
   <ul>
<?php
if(isset($plantillacorreo))
{
?>
        <li> <?php echo anchor('plantillacorreo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('plantillacorreo/siguiente/'.$plantillacorreo['idplantillacorreo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('plantillacorreo/anterior/'.$plantillacorreo['idplantillacorreo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('plantillacorreo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('plantillacorreo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('plantillacorreo/edit/'.$plantillacorreo['idplantillacorreo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('plantillacorreo/delete/'.$plantillacorreo['idplantillacorreo'],'Delete'); ?></li>
        <li> <?php echo anchor('plantillacorreo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('plantillacorreo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idplantillacorreo',$plantillacorreo['idplantillacorreo']) ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Id plantillacorreo:</label>
<div class="col-md-10">
<?php
  $eys_arrctl=array("name"=>'idplantillacorreo','value'=>$plantillacorreo['idplantillacorreo'],"disabled"=>"disabled",'placeholder'=>'Idplantillacorreos','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
?>
</div>
</div>



























































<div class="form-group row">
    <label class="col-md-2 col-form-label"> Subject:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('subject',$plantillacorreo['subject'],$textarea_options); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Head para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('head',$plantillacorreo['head'],$textarea_options); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Body:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4', "disabled"=>"disabled",  'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('body',$plantillacorreo['body'],$textarea_options); 
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> Foot para enviar:</label>
	<div class="col-md-10">
		<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('foot',$plantillacorreo['foot'],$textarea_options); 
		?>
	</div> 
</div>







<?php echo form_close(); ?>





</body>



</html>
