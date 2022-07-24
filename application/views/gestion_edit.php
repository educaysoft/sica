<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('gestion/save_edit',array('id'=>'eys-form')); ?>


  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('gestion', 'Cancelar'); ?></li>
    </ul>
</div>
<br>




<table>




<tr>
<td> Departamento:</td>
<td><?php
$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

 echo form_dropdown("iddepartamento",$options, $gestion['iddepartamento']);  ?></td>
</tr>



  <tr>
     <td>idgestion:</td>
     <td><?php echo form_input(array("name"=>'idgestion','id'=>'idgestion','value'=>$gestion['idgestion'],'placeholder'=>'Idgestions')) ?></td>
  </tr>


  
 


 <tr>
      <td>Fecha de gestion:</td>
<td><?php echo form_input('fechagestion',  (isset($gestion['fechagestion']) ? date('Y-m-d H:i:s', strtotime($gestion['fechagestion'])) : ""), 'class="form-control  datetime" id="start_date" autocomplete="off"'); ?></td>
  </tr>




 

<tr>
  <td>Detalle:</td>
  <td><?php 
  
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Detalle" );    
echo form_textarea('detalle',$gestion['detalle'],$textarea_options ); ?></td>
 </tr>












<tr>
<td> Requerimiento:</td>
<td><?php
$options= array('--Select--');
foreach ($requerimientos as $row){
	$options[$row->idrequerimiento]= $row->nombre;
}

 echo form_dropdown("idrequerimiento",$options, $gestion['idrequerimiento']);  ?></td>
</tr>



   

</table>
<?php echo form_close(); ?>

   <script>
  async function nombredearchivo()
{
 indice=document.getElementById("idgestion").value;
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



