<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("asignaturadocente/save") ?>
<?php echo form_hidden("idasignaturadocente")  ?>




<div class="form-group row">
<label class="col-md-2 col-form-label">Distributivo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 

$options= array('--Select--');
foreach ($distributivos as $row){
	$options[$row->iddistributivo]= $row->eldistributivo;
}

echo form_dropdown("iddistributivo",$options, set_select('--Select--','default_value'),array('id'=>'iddistributivo','onchange'=>'get_docentes()')); 
?>

    </div>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Distributivo Docente:</label>
<div class="col-md-10">
    <div class="form-group">

   <select class="form-control" id="iddistributivodocente" name="iddistributivodocente" required>
                 <option>No Selected</option>
          </select>
    </div>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Malla:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 
$options= array('--Select--');
foreach ($mallas as $row){
	$options[$row->idmalla]=$row->nombrecorto;
}

 echo form_dropdown("idmalla",$options, set_select('--Select--','default_value'));  

?>
    </div>
</div>
</div>







<div class="form-group row">
<label class="col-md-2 col-form-label">Paralelo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 
$options= array('--Select--');
foreach ($asignaturas as $row){
	$options[$row->idasignatura]=$row->malla."-".$row->nombre;
}

 echo form_dropdown("idasignatura",$options, set_select('--Select--','default_value'));  

?>
    </div>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Paralelo:</label>
<div class="col-md-10">
    <div class="form-group">
<?php 

$options= array('--Select--');
foreach ($paralelos as $row){
	$options[$row->idparalelo]= $row->nombre;
}

echo form_dropdown("idparalelo",$options, set_select('--Select--','default_value')); 

?>
    </div>
</div>
</div>

<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("asignaturadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>


 <script>


function get_docentes() {
	var iddistributivo =4; // $('select[name=iddistributivo]').val();
    $.ajax({
        url: "<?php echo site_url('asignaturadocente/get_docentes') ?>",
        data: {iddistributivo:iddistributivo},
        method: 'GET',
	async : true,
        datatype : 'json',
        success: function(data){
        var html = '';
        var i
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddistributivodocente+'>'+data[i].eldocente+'</option>';
        }
        $('#iddistributivodocente').html(html);


        },
      error: function (xhr, ajaxoptions, thrownerror) {
        alert(xhr.status);
        alert(thrownerror);
      }
    })

}




</script>
