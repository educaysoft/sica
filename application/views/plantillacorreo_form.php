<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("plantillacorreo/save") ?>
<?php echo form_hidden("idplantillacorreo")  ?>














<div class="form-group row">
<label class="col-md-2 col-form-label">Subject:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"subject",'id'=>'subject' );    
 echo form_textarea("subject","", $textarea_options); 
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Head:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"head",'id'=>'head' );    
 echo form_textarea("head","", $textarea_options); 
?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Body:</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"body",'id'=>'body' );    
 echo form_textarea("body","", $textarea_options); 
?>
</div>
</div>











<div class="form-group row">
<label class="col-md-2 col-form-label">Foot :</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"foot",'id'=>'foot' );    
 echo form_textarea("foot","", $textarea_options); 
?>
</div>
</div>


<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("plantillacorreo","Atras") ?> </td>
</tr>
</table>
<?php echo form_close();?>

	 <script>

function get_tipodocu() {
	var idtipodocu = $('select[name=idtipodocu]').val();
    $.ajax({
        url: "<?php echo site_url('tipodocu/get_tipodocu') ?>",
        data: {idtipodocu: idtipodocu},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddocumento+'>'+data[i].asunto+'</option>';
        }
        $('#iddocumento').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}






</script>


