<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('catedra/save_edit',array('id'=>'eys-form')); ?>


  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('catedra', 'Cancelar'); ?></li>
    </ul>
</div>
<br>




<table>

<tr>
<td> Tipo de catedra:</td>
<td><?php
$options= array('--Select--');
foreach ($tipocatedras as $row){
	$options[$row->idtipocatedra]= $row->nombre;
}

 echo form_dropdown("idtipocatedra",$options, $catedra['idtipocatedra']);  ?></td>
</tr>


<tr>
<td> Estado del catedra:</td>
<td><?php
$options= array('--Select--');
foreach ($catedra_estados as $row){
	$options[$row->idcatedra_estado]= $row->nombre;
}

 echo form_dropdown("idcatedra_estado",$options, $catedra['idcatedra_estado']);  ?></td>
</tr>


<tr>
<td> Institución:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $catedra['idinstitucion']);  ?></td>
</tr>



  <tr>
     <td>idcatedra:</td>
     <td><?php echo form_input(array("name"=>'idcatedra','id'=>'idcatedra','value'=>$catedra['idcatedra'],'placeholder'=>'Idcatedras')) ?></td>
  </tr>


  <tr>
     <td>Titulo:</td>
  <td><?php 
	$textarea_options = array('class' => 'form-control','rows' => '2',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Título" );    
	echo form_textarea('titulo',$catedra['titulo'],$textarea_options ); 
?></td>
  </tr>
 


 <tr>
      <td>Fecha de Inicia:</td>
<td><?php echo form_input('fechainicia',  (isset($catedra['fechainicia']) ? date('Y-m-d H:i:s', strtotime($catedra['fechainicia'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>




 <tr>
      <td>Fecha de finaliza:</td>
<td><?php echo form_input('fechafinaliza',  (isset($catedra['fechafinaliza']) ? date('Y-m-d H:i:s', strtotime($catedra['fechafinaliza'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>

<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('detalle',$catedra['detalle'],$textarea_options ); ?></td>
 </tr>


<tr>
<td> Pagina:</td>
<td><?php
$options= array('--Select--');
foreach ($paginas as $row){
	$options[$row->idpagina]= $row->nombre;
}

 echo form_dropdown("idpagina",$options, $catedra['idpagina']);  ?></td>
</tr>



<tr>
     <td>Duración:</td>
     <td><?php echo form_input(array("name"=>'duracion','id'=>'duracion','value'=>$catedra['duracion'],'placeholder'=>'Duración')) ?></td>
  </tr>

<tr>
     <td>Costo:</td>
     <td><?php echo form_input(array("name"=>'costo','id'=>'costo','value'=>$catedra['costo'],'placeholder'=>'Costo')) ?></td>
  </tr>



<tr>
<td> Silabo:</td>
<td><?php
$options= array('--Select--');
foreach ($silabos as $row){
	$options[$row->idsilabo]= $row->nombre;
}

 echo form_dropdown("idsilabo",$options, $catedra['idsilabo']);  ?></td>
</tr>



   

</table>
<?php echo form_close(); ?>

   <script>
  async function nombredearchivo()
{
 indice=document.getElementById("idcatedra").value;
 fecha=document.getElementById("fechacreacion").value;
 var emisor=document.getElementById("idemisor");
if(emisor.length>0)
{
     var emisor1=emisor.options[0].text;
     var emisor2=emisor1.split(/\W+/);
     var initial="";
     for( var i=0; i<emisor2.length; i++)
      {
       initial=initial+emisor2[i].toUpperCase().charAt(0);
      }
      initial=fecha+"-"+initial+'-'+indice.padStart(6,"0")+".pdf";
//      alert(initial);
      document.getElementById("archivopdf").value=initial;
}

};

    async function cargaarchivo(url)
{
    
    let formData = new FormData(); 
//    formData.append("filepdf", filepdf.files[0]);
formData.append("filepdf",document.getElementById('filepdf').files[02]);
formData.append("archivopdf",document.getElementById('archivopdf').value);

    await fetch(url, {method: "POST", body: formData}); 
  alert('The file has been uploaded successfully.');

};


//=====================
//
// Upload file
function uploadFiles(url) {

  var totalfiles = document.getElementById('files').files.length;

  alert("hola");
  if(totalfiles > 0 ){

    var formData = new FormData();

    // Read selected files
    for (var index = 0; index < totalfiles; index++) {
      formData.append("files[]", document.getElementById('files').files[index]);
    }
      formData.append("archivopdf", document.getElementById('archivopdf').value);
     alert(document.getElementById('archivopdf').value);
    var xhttp = new XMLHttpRequest();

    // Set POST method and ajax file path
    xhttp.open("POST", url, true);

    // call on request changes state
    xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {

          var response = this.responseText;

          alert(response + " File uploaded.");

       }
    };

    // Send request with data
    xhttp.send(formData);

  }else{
    alert("Please select a file");
  }

}







</script>



