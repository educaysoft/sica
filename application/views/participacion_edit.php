<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('participacion/save_edit',array('id'=>'eys-form')); ?>


  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('evento', 'Cancelar'); ?></li>
    </ul>
</div>
<br>




<table>

<tr>
<td> Tipo de participacion:</td>
<td><?php
$options= array('--Select--');
foreach ($tipoparticipaciones as $row){
	$options[$row->idtipoparticipacion]= $row->nombre;
}

 echo form_dropdown("idtipoparticipacion",$options, $participacion['idtipoparticipacion']);  ?></td>
</tr>


<tr>
<td> Participante:</td>
<td><?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ". $row->nombres;
}

 echo form_dropdown("idpersona",$options, $participacion['idpersona']);  ?></td>
</tr>

<tr>
<td> Evento:</td>
<td><?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

 echo form_dropdown("idevento",$options, $participacion['idevento']);  ?></td>
</tr>



  


  <tr>
     <td>% participaciono:</td>
     <td><?php echo form_input(array("name"=>'porcentaje','id'=>'percentaje','value'=>$participacion['porcentaje'],'placeholder'=>'porcentaje')) ?></td>
  </tr>
 

  <tr>
     <td>% ayuda:</td>
     <td><?php echo form_input(array("name"=>'ayuda','id'=>'ayuda','value'=>$participacion['ayuda'],'placeholder'=>'ayuda')) ?></td>
  </tr>
 





 <tr>
      <td>Fecha :</td>
<td><?php echo form_input('fecha',  (isset($participacion['fecha']) ? date('Y-m-d H:i:s', strtotime($participacion['fecha'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>

<tr>
  <td>mensaje:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"mensaje" );    
echo form_textarea('comentario',$participacion['comentario'],$textarea_options ); ?></td>
 </tr>












   

</table>
<?php echo form_close(); ?>

   <script>
  async function nombredearchivo()
{
 indice=document.getElementById("idevento").value;
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



