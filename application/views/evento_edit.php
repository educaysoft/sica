<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('evento/save_edit',array('id'=>'eys-form')); ?>


  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('evento', 'Cancelar'); ?></li>
    </ul>
</div>
<br>




<table>

<tr>
<td> Estado del evento:</td>
<td><?php
$options= array('--Select--');
foreach ($evento_estados as $row){
	$options[$row->idevento_estado]= $row->nombre;
}

 echo form_dropdown("idevento_estado",$options, $evento['idevento_estado']);  ?></td>
</tr>


<tr>
<td> Institución:</td>
<td><?php
$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, $evento['idinstitucion']);  ?></td>
</tr>



  <tr>
     <td>idevento:</td>
     <td><?php echo form_input(array("name"=>'idevento','id'=>'idevento','value'=>$evento['idevento'],'placeholder'=>'Ideventos')) ?></td>
  </tr>


  <tr>
     <td>Titulo:</td>
     <td><?php echo form_input(array("name"=>'titulo','id'=>'titulo','value'=>$evento['titulo'],'placeholder'=>'titulo')) ?></td>
  </tr>
 


 <tr>
      <td>Fecha de creación:</td>
      <td><?php echo form_input( array("name"=>'fechacreacion',"id"=>'fechacreacion',"value"=>$evento['fechacreacion'],'type'=>'date','placeholder'=>'fechacreacion')); ?></td>
  </tr>



 <tr>
      <td>Fecha de Inicia:</td>
<td><?php echo form_input('fechainicia',  (isset($evento['fechainicia']) ? date('Y-m-d H:i:s', strtotime($evento['fechainicia'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>




 <tr>
      <td>Fecha de finaliza:</td>
<td><?php echo form_input('fechafinaliza',  (isset($evento['fechafinaliza']) ? date('Y-m-d H:i:s', strtotime($evento['fechafinaliza'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>

<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('detalle',$evento['detalle'],$textarea_options ); ?></td>
 </tr>


<tr>
<td> Pagina:</td>
<td><?php
$options= array('--Select--');
foreach ($paginas as $row){
	$options[$row->idpagina]= $row->nombre;
}

 echo form_dropdown("idpagina",$options, $evento['idpagina']);  ?></td>
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



