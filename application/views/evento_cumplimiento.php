<style>
th,td{font-size:12px;
}

</style>





<?php echo form_open('evento/save_edit') ?>
<?php echo form_hidden('idevento',$evento['idevento'],array('name'=>'idevento')) ?>






<div style="display:flex; flex-direction:row;  border:2px red solid;justify-content: space-evenly;">



<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Temas programados(silabo): </b>
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatat" width="700" >
	 <thead>
	 <tr>
	 <th>Sesion</th>
	 <th>Unidad</th>
	 <th>idtema</th>
	 <th>idieva</th>
	 <th width="60%">tema a tratar</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>







<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Sesiones dictadas: </b>
        </div>
        
    </div>
</div>

	<table class="table table-striped table-bordered table-hover"  id="mydatal">
	 <thead>
	 <tr>
	 <th>sesion</th>
	 <th>unidad</th>
	 <th  width="60">fecha</th>
	 <th>inicio</th>
	 <th>termino</th>
	 <th>Eval</th>
	 <th>tema tratado</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>







<?php echo form_close(); ?>



<script type="text/javascript">

$(document).ready(function(){
	var idevento=<?php echo $evento['idevento']; ?>;
  	var idsilabo=<?php echo $evento['idsilabo']; ?>;

	var mytablat= $('#mydatat').DataTable({pageLength:50,"ajax":{url: '<?php echo site_url('tema/tema_silabo2')?>', type: 'GET',data:{idsilabo:idsilabo}},
 
	
	
	});


	var mytablaf= $('#mydatal').DataTable({pageLength:50,"ajax": {url: '<?php echo site_url('evento/evento_fechas2')?>', type: 'GET',data:{idevento:idevento}},

	
       "rowCallback": function(row, data, index){
	if (data[5] >1) {
        	$("td:eq(0)", row).css('background-color','#99ff9c')
        	$("td:eq(1)", row).css('background-color','#99ff9c')
        	$("td:eq(2)", row).css('background-color','#99ff9c')
        	$("td:eq(3)", row).css('background-color','#99ff9c')
        	$("td:eq(4)", row).css('background-color','#99ff9c')
        	$("td:eq(5)", row).css('background-color','#99ff9c')
        	$("td:eq(6)", row).css('background-color','#99ff9c')
    	}
       }
    
	
	
	});
});

















/*
$("#btn_update").on("click", function(){

	var f=$('#show_data').data(fecha);
	var idsesionevento=document.getElementById("idsesionevento_edit").value;
	var idevento=document.getElementById("idevento_edit").value;
	var fecha=document.getElementById("fecha_edit").value;
	var idtema=document.getElementById("idtema_edit").value;
	var temacorto=document.getElementById("temacorto_edit").value;
	var ponderacion=document.getElementById("ponderacion_edit").value;
	var horainicio=document.getElementById("horainicio_edit").value;
	var horafin=document.getElementById("horafin_edit").value;
	var idmodoevaluacion=document.getElementById("idmodoevaluacion_edit").value;
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idsesionevento:idsesionevento,idevento:idevento, fecha:fecha,idtema:idtema,temacorto:temacorto,ponderacion:ponderacion,horainicio:horainicio,horafin:horafin,idmodoevaliuacion:idmodoevaluacion},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
	$("#Modal_Edit").modal("hide");
        alert("Se guardo con exito");
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
    return false;

});

 */






</script>

</body>


</html>
