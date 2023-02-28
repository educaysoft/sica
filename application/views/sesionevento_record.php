<div id="eys-nav-i">

	<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idisesionevento"><?php echo $sesionevento['idsesionevento']; ?></idem></div>

<?php
	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if($row["modulo"]["id"]==25) //modulo documento
			{
				$numero=$j; //el inidice del arreglo donde estan los permisos
				$permitir=1; //indicador de que si se encontro permisos
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}




?>
 
<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ 

if(isset($sesionevento))
{
?>
    <ul>
        <li> <?php echo anchor('sesionevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('sesionevento/anterior/'.$sesionevento['idsesionevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('sesionevento/siguiente/'.$sesionevento['idsesionevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('sesionevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('sesionevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('sesionevento/edit/'.$sesionevento['idsesionevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('sesionevento/delete/'.$sesionevento['idsesionevento'],'Delete'); ?></li>
        <li> <?php echo anchor('sesionevento/listar/'.$sesionevento['idevento'],'Listar'); ?></li>
	<li> <?php echo anchor('sesionevento/reportepdf/'.$sesionevento['idevento'], 'Reportepdf'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('sesionevento/add', 'Nuevo'); ?></li>


    </ul>
<?php
}
?>


<?php
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$sesionevento['idevento']) ?>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php

    echo form_input('idevento',$sesionevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('evento/actual/'.$sesionevento['idevento'], 'Evento:'); ?> </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$sesionevento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">   <?php echo anchor('tema/actual/'.$sesionevento['idtema'],'Tema silabo: '); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}

echo form_input('idtema',$options[$sesionevento['idtema']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>













<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de la sesión:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$sesionevento['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>






 
  




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema tratado(corto):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array("disabled"=>"disabled",'class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('temacorto',$sesionevento['temacorto'],$textarea_options); 


		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Tema tratado(largo):</label>
	<div class="col-md-10">
		<?php

$textarea_options = array("disabled"=>"disabled",'class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('tema',$sesionevento['tema'],$textarea_options); 


		?>
	</div> 
</div>







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora inicio:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horainicio','id'=>'horainicio',"type"=>"time",'value'=>$sesionevento['horainicio'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Hora fin:</label>
	<div class="col-md-10">
		<?php
     $eys_arrinput=array('name'=>'horafin','id'=>'horafin',"type"=>"time",'value'=>$sesionevento['horafin'], "style"=>"width:500px");
     echo form_input($eys_arrinput); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Modo de evaluación: </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->ponderacion." - ".$row->nombre;
}

echo form_input('idmodoevaluacion',$options[$sesionevento['idmodoevaluacion']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>








<?php echo form_close(); ?>





</body>









</html>
