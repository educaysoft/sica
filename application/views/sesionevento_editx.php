<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('sesionevento/save_editx',array('id'=>'eys-form')); ?>
  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li>  <a href="javascript:{}"  onclick="history.back()" > volver atrás</a></li>
    </ul>
</div>
<br>
<?php echo form_hidden('idsesionevento',$sesionevento['idsesionevento']) ?>





<div class="form-group row">
<label class="col-md-2 col-form-label">Id sesionevento:</label>
<div class="col-md-10">
<?php
$eys_arrinput=array('name'=>'idsesionevento','value'=>$sesionevento['idsesionevento'],'readonly'=>'true', "style"=>"width:500px");
echo form_input($eys_arrinput);

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_dropdown("idevento",$options, $sesionevento['idevento']); 

?>
</div>
</div>


<?php

 $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
   date_default_timezone_set('America/Guayaquil');
    $fecha = $sesionevento['fecha']; // date("Y-m-d");
    $horai=  $sesionevento['horainicio']; //  date("H:i:s");


$sesiondictada= array();
foreach ($sesioneventos as $row){
	$sesiondictada[$row->fecha]= $row->idsesionevento;
}


	$sesionactual=0;
	$sesiontotal=0;

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $sesiones=array();
     $i=1;
    do {
	
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){    //verifica si la fecha esta en el horario.
			$lahorai=$row->horainicio;
			$duracionminutos=$row->duracionminutos;
			$lahoraf=strtotime(' +'.$duracionminutos.' minute',strtotime($lahorai));
			//$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
		//	if($sesionactual==0){
		//	if(!isset($sesiondictada[$fechasesion]))
		//	{
		//		$fecha=$fechasesion;
		//	}}
			
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}
			
			$sesiontotal=$sesiontotal+1;
			$i=$i+1;
		}
	}
		$fechasesion=date("Y-m-d",strtotime($fechasesion."+ 1 days")); 

    }while(strtotime($fechasesion)<=strtotime($calendarioacademico[0]->fechahasta));


	$eldia="No encontrado";	
    	$lahorai="00:00:00";
    	$lahoraf="00:00:00";

	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fecha))];
		//$echo $dia. " = ".$row->nombre."\n";
		if($row->nombre==$dia ){
			$eldia=$dia;
			$lahorai=$row->horainicio;
			$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
		}
	}
	//die();

    	$horaf= date("H:i:s",strtotime(' + 2 hours'));



?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha:</label>
<div class="col-md-10">
<?php

	echo form_input( array("name"=>'fecha',"id"=>'fecha',"readonly"=>"true","value"=>$sesionevento['fecha'],'type'=>'date','placeholder'=>'fecha')); echo $eldia." (sesión # ".$sesionactual.")";

?>
</div>
</div>

 



<div class="form-group row">
<label class="col-md-2 col-form-label">idtema:</label>
<div class="col-md-10">

<?php
$idunidadsilabo=0;
$numerosesion=0;
$options= array('--Select--');
foreach ($temas as $row){
	if($row->idtema==$sesionevento['idtema']){
		$idunidadsilabo=$row->idunidadsilabo;
		$numerosesion=$row->numerosesion;
	}	
}

$eys_arrinput=array('name'=>'idtema','value'=>$sesionevento['idtema'], "style"=>"width:500px");
echo form_input($eys_arrinput);
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Unidad:</label>
<div class="col-md-10">
<?php
$options= array();
foreach ($unidadsilabos as $row){
	$options[$row->idunidadsilabo]="Unidad: ".$row->unidad;
}
// $primero= reset($options);
 
 echo form_dropdown("idunidadsilabo",$options,$idunidadsilabo, array('id'=>'idunidadsilabo'));  
?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Número de sesión:</label>
<div class="col-md-10">
<?php
$eys_arrinput=array('name'=>'numerosesion','value'=>$numerosesion, "style"=>"width:500px");
echo form_input($eys_arrinput);

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Tema:</label>
<div class="col-md-10">
<?php

  
$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20','maxlength'=>'50','style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"temacorto");    
echo form_textarea('temacorto',$sesionevento['temacorto'],$textarea_options ); 
?><div id="textarea_feedback"></div>
</div>
</div>







<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"tema","id" =>"tema");    
echo form_textarea('tema',$sesionevento['tema'],$textarea_options ); 

?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"19:00:00",'value'=>$sesionevento['horainicio'], "style"=>"width:500px");
echo form_input($eys_arrinput); echo $lahorai;

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php

	if($sesionevento['horafin']=="00:00:00"){
   		date_default_timezone_set('America/Guayaquil');
    		$date = date("Y-m-d");
    		$sesionevento['horafin']= date("H:i:s");
     }
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time","step"=>1,"min"=>"07:00:00","max"=>"22:00:00",'value'=>$sesionevento['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); echo $lahoraf;


?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluacion:</label>
<div class="col-md-10">
<?php

     
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

echo form_dropdown("idmodoevaluacion",$options, $sesionevento['idmodoevaluacion']);

?>
</div>
</div>





<?php echo form_close(); ?>


<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Temas dictados: </b>
        </div>
        <div class="pull-right">
            
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>Sesion</th>
	 <th>Unidad</th>
	 <th>idtema</th>
	 <th>tema</th>
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


<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
            <td>$320,800</td>
        </tr>
        <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>63</td>
            <td>2011/07/25</td>
            <td>$170,750</td>
        </tr>
        <tr>
            <td>Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009/01/12</td>
            <td>$86,000</td>
        </tr>
        <tr>
            <td>Bradley Greer</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>41</td>
            <td>2012/10/13</td>
            <td>$132,000</td>
        </tr>
        <tr>
            <td>Dai Rios</td>
            <td>Personnel Lead</td>
            <td>Edinburgh</td>
            <td>35</td>
            <td>2012/09/26</td>
            <td>$217,500</td>
        </tr>
        <tr>
            <td>Jenette Caldwell</td>
            <td>Development Lead</td>
            <td>New York</td>
            <td>30</td>
            <td>2011/09/03</td>
            <td>$345,000</td>
        </tr>
        <tr>
            <td>Yuri Berry</td>
            <td>Chief Marketing Officer (CMO)</td>
            <td>New York</td>
            <td>40</td>
            <td>2009/06/25</td>
            <td>$675,000</td>
        </tr>
        <tr>
            <td>Caesar Vance</td>
            <td>Pre-Sales Support</td>
            <td>New York</td>
            <td>21</td>
            <td>2011/12/12</td>
            <td>$106,450</td>
        </tr>
        <tr>
            <td>Doris Wilder</td>
            <td>Sales Assistant</td>
            <td>Sidney</td>
            <td>23</td>
            <td>2010/09/20</td>
            <td>$85,600</td>
        </tr>
        <tr>
            <td>Angelica Ramos</td>
            <td>Chief Executive Officer (CEO)</td>
            <td>London</td>
            <td>47</td>
            <td>2009/10/09</td>
            <td>$1,200,000</td>
        </tr>
        <tr>
            <td>Gavin Joyce</td>
            <td>Developer</td>
            <td>Edinburgh</td>
            <td>42</td>
            <td>2010/12/22</td>
            <td>$92,575</td>
        </tr>
        <tr>
            <td>Jennifer Chang</td>
            <td>Regional Director</td>
            <td>Singapore</td>
            <td>28</td>
            <td>2010/11/14</td>
            <td>$357,650</td>
        </tr>
        <tr>
            <td>Brenden Wagner</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>28</td>
            <td>2011/06/07</td>
            <td>$206,850</td>
        </tr>
        <tr>
            <td>Fiona Green</td>
            <td>Chief Operating Officer (COO)</td>
            <td>San Francisco</td>
            <td>48</td>
            <td>2010/03/11</td>
            <td>$850,000</td>
        </tr>
        <tr>
            <td>Shou Itou</td>
            <td>Regional Marketing</td>
            <td>Tokyo</td>
            <td>20</td>
            <td>2011/08/14</td>
            <td>$163,000</td>
        </tr>
        <tr>
            <td>Michelle House</td>
            <td>Integration Specialist</td>
            <td>Sidney</td>
            <td>37</td>
            <td>2011/06/02</td>
            <td>$95,400</td>
        </tr>
        <tr>
            <td>Suki Burks</td>
            <td>Developer</td>
            <td>London</td>
            <td>53</td>
            <td>2009/10/22</td>
            <td>$114,500</td>
        </tr>
        <tr>
            <td>Prescott Bartlett</td>
            <td>Technical Author</td>
            <td>London</td>
            <td>27</td>
            <td>2011/05/07</td>
            <td>$145,000</td>
        </tr>
        <tr>
            <td>Gavin Cortez</td>
            <td>Team Leader</td>
            <td>San Francisco</td>
            <td>22</td>
            <td>2008/10/26</td>
            <td>$235,500</td>
        </tr>
        <tr>
            <td>Martena Mccray</td>
            <td>Post-Sales support</td>
            <td>Edinburgh</td>
            <td>46</td>
            <td>2011/03/09</td>
            <td>$324,050</td>
        </tr>
        <tr>
            <td>Unity Butler</td>
            <td>Marketing Designer</td>
            <td>San Francisco</td>
            <td>47</td>
            <td>2009/12/09</td>
            <td>$85,675</td>
        </tr>
        <tr>
            <td>Howard Hatfield</td>
            <td>Office Manager</td>
            <td>San Francisco</td>
            <td>51</td>
            <td>2008/12/16</td>
            <td>$164,500</td>
        </tr>
        <tr>
            <td>Hope Fuentes</td>
            <td>Secretary</td>
            <td>San Francisco</td>
            <td>41</td>
            <td>2010/02/12</td>
            <td>$109,850</td>
        </tr>
        <tr>
            <td>Vivian Harrell</td>
            <td>Financial Controller</td>
            <td>San Francisco</td>
            <td>62</td>
            <td>2009/02/14</td>
            <td>$452,500</td>
        </tr>
        <tr>
            <td>Timothy Mooney</td>
            <td>Office Manager</td>
            <td>London</td>
            <td>37</td>
            <td>2008/12/11</td>
            <td>$136,200</td>
        </tr>
        <tr>
            <td>Jackson Bradshaw</td>
            <td>Director</td>
            <td>New York</td>
            <td>65</td>
            <td>2008/09/26</td>
            <td>$645,750</td>
        </tr>
        <tr>
            <td>Olivia Liang</td>
            <td>Support Engineer</td>
            <td>Singapore</td>
            <td>64</td>
            <td>2011/02/03</td>
            <td>$234,500</td>
        </tr>
        <tr>
            <td>Bruno Nash</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>38</td>
            <td>2011/05/03</td>
            <td>$163,500</td>
        </tr>
        <tr>
            <td>Sakura Yamamoto</td>
            <td>Support Engineer</td>
            <td>Tokyo</td>
            <td>37</td>
            <td>2009/08/19</td>
            <td>$139,575</td>
        </tr>
        <tr>
            <td>Thor Walton</td>
            <td>Developer</td>
            <td>New York</td>
            <td>61</td>
            <td>2013/08/11</td>
            <td>$98,540</td>
        </tr>
        <tr>
            <td>Finn Camacho</td>
            <td>Support Engineer</td>
            <td>San Francisco</td>
            <td>47</td>
            <td>2009/07/07</td>
            <td>$87,500</td>
        </tr>
        <tr>
            <td>Serge Baldwin</td>
            <td>Data Coordinator</td>
            <td>Singapore</td>
            <td>64</td>
            <td>2012/04/09</td>
            <td>$138,575</td>
        </tr>
        <tr>
            <td>Zenaida Frank</td>
            <td>Software Engineer</td>
            <td>New York</td>
            <td>63</td>
            <td>2010/01/04</td>
            <td>$125,250</td>
        </tr>
        <tr>
            <td>Zorita Serrano</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>56</td>
            <td>2012/06/01</td>
            <td>$115,000</td>
        </tr>
        <tr>
            <td>Jennifer Acosta</td>
            <td>Junior Javascript Developer</td>
            <td>Edinburgh</td>
            <td>43</td>
            <td>2013/02/01</td>
            <td>$75,650</td>
        </tr>
        <tr>
            <td>Cara Stevens</td>
            <td>Sales Assistant</td>
            <td>New York</td>
            <td>46</td>
            <td>2011/12/06</td>
            <td>$145,600</td>
        </tr>
        <tr>
            <td>Hermione Butler</td>
            <td>Regional Director</td>
            <td>London</td>
            <td>47</td>
            <td>2011/03/21</td>
            <td>$356,250</td>
        </tr>
        <tr>
            <td>Lael Greer</td>
            <td>Systems Administrator</td>
            <td>London</td>
            <td>21</td>
            <td>2009/02/27</td>
            <td>$103,500</td>
        </tr>
        <tr>
            <td>Jonas Alexander</td>
            <td>Developer</td>
            <td>San Francisco</td>
            <td>30</td>
            <td>2010/07/14</td>
            <td>$86,500</td>
        </tr>
        <tr>
            <td>Shad Decker</td>
            <td>Regional Director</td>
            <td>Edinburgh</td>
            <td>51</td>
            <td>2008/11/13</td>
            <td>$183,000</td>
        </tr>
        <tr>
            <td>Michael Bruce</td>
            <td>Javascript Developer</td>
            <td>Singapore</td>
            <td>29</td>
            <td>2011/06/27</td>
            <td>$183,000</td>
        </tr>
        <tr>
            <td>Donna Snider</td>
            <td>Customer Support</td>
            <td>New York</td>
            <td>27</td>
            <td>2011/01/25</td>
            <td>$112,000</td>
        </tr>
    </tbody>
</table>
<script>
  var idtema=<?php echo $sesionevento['idtema']; ?>;

$(document).ready(function(){
  	var idsilabo=<?php echo $evento['idsilabo']; ?>;

	var mytablat= $('#mydatac').DataTable({pageLength:50,"ajax":{url: '<?php echo site_url('tema/tema_silabo')?>', type: 'GET',data:{idsilabo:idsilabo}},
{
       "rowCallback": function(row, data, index){
if (data[2] == 90) {
        $("td:eq(0)", row).css('background-color','#99ff9c')
    }


       }
    }






	});	
		


		
});


$(document).ready(function() {
    var text_max = 50;
    $('#textarea_feedback').html('Quedan ' + text_max + ' caracteres');

    $('#temacorto').keyup(function() {
        var text_length = $('#temacorto').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html('Quedan ' + text_remaining + ' caracteres');
    });
});
</script>
 <script>
 var table = $('#example').DataTable({
       "rowCallback": function(row, data, index){
if (data[3] == 66) {
        console.log('data[3] ==66');
        $("td:eq(0)", row).css('background-color','#99ff9c')
    }


       }
    });


    </script>
