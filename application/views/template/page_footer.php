<div class="album py-5 bg-light">

   <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <div class="col">
          <div class="card shadow-sm">
          <a  href='http://educaysoft.org/sica/curso/cursosparadocentes2023_2'><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><image href="images/CapacitacionDocente.jpg" height="100%" width="100%"/>  </svg></a>

            <div class="card-body">
              <p class="card-text"><font color="blue">Capacitación a Docentes.</font><br><b>"Carrera en Tecnología de la Información".</b></p>
          <p>Director de carrera:<a href="http://www.utelvt.edu.ec/sitioweb/index.php/decano-ingenieria-y-tecnologias">  Ing. Stalin Francis.</a></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://congresoutlvte.org/facae/2021/'"  >Sitio</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Mapa</button>
                </div>
                <small class="text-muted">nov/2023</small>
              </div>
            </div>
          </div>
        </div>



        <div class="col">
          <div class="card shadow-sm">
          <a  href='http://educaysoft.org/sica/curso/cursosparaestudiantes2023_2'><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><image href="images/CapacitacionEstudiante.jpg" height="100%" width="100%"/>  </svg></a>

            <div class="card-body">
              <p class="card-text"><font color="blue">Capacitación a Estudiantes.</font><br><b>"Carrera en Tecnología de la Información".</b></p>
          <p>Director de carrera:<a href="http://www.utelvt.edu.ec/sitioweb/index.php/decano-ingenieria-y-tecnologias">  Ing. Stalin Francis.</a></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='https://congresoutlvte.org/facae/2021/'"  >Sitio</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Mapa</button>
                </div>
                <small class="text-muted">nov/2023</small>
              </div>
            </div>
          </div>
        </div>



 </div>
    </div>
  </div>




</div>
</div>
</main>


   	<?php if(!isset($this->session->userdata['logged_in']) ){ ?>

<!-- Footer -->

<footer id="eys-footer" style="background-color: #f0f0f0; padding: 20px;"> 
<div style="display: flex; flex-wrap: wrap; justify-content: space-around; align-items: center; max-width: 1200px; margin: 0 auto;">
    <div style="flex: 1; margin-bottom: 20px;">
      <h2 style="color: black; font-size: 20px; font-weight: bold;">Contactanos:</h2>
      <p style="color: black; font-size: 14px;">Dirección: Ciudadela Nuevos Horizontes:</p>
      <p style="color: black; font-size: 14px;">Correo: <a href="mailto:educacioncontinua@utelvt.edu.ec">educacioncontinua@utelvt.edu.ec</a></p>
    </div>
    <div style="flex: 1; text-align: center; margin-bottom: 20px;">
      <a href="https://utelvt.edu.ec/sitioweb/"><img src="<?php echo base_url(); ?>images/logo.png" alt="Logo UTELVT" style="height: 80px;"></a>
      <p style="color: black; font-size: 14px; margin-top: 10px;">Visitas: <script src="<?php echo base_url(); ?>misvisitas.php"></script></p>
    </div>
    <div style="flex: 1; text-align: center;">
      <ul style="list-style-type: none; padding: 0;">
        <li><a href="https://educaysoft.org/sica/MTI/doc/_build/html/" style="color: black; font-size: 14px;">Maestría en Tecnología de la Información</a></li>
      </ul>
    </div>
  </div>
</footer>







<!--
<footer id="eys-footer"    >
  <div style="margin-top:10px; height: 100%; width: 30%; display: flex; flex-direction:column;  ">
    <div >      
        <p style="color: black;font-size:20px;font-weight:bold;">Contactanos:</p>
    </div>
    <div style="color: black;font-size:20px;width: 100%;">
      <p style="font-size: 1vw;">Dirección: Ciudadela Nuevos Horizontes:</p>
      <p style="font-size: 1vw;">Correo: educacioncontinua@utelvt.edu.ec</p>
</div>   
 </div>
 <div style="  height:100%; width:30%; display:flex; justify-content: center; flex-direction: column; ">
     <div style="width: 100%;  height: 100%;text-align:center; ">
     <a href="https://utelvt.edu.ec/sitioweb/"> <img src="<?php echo base_url(); ?>images/logo.png" alt="logo utelvt" style="height: 100%;"></a>
    </div>
<div style="width: 100%;text-align:center;">
Visitas:<br> <script src="<?php echo base_url(); ?>misvisitas.php"></script> 
</div>
 </div>

<div style="color: black; height: 100%; width: 30%; display:flex; justify-content: center;  ">
    <ul style="margin:0; padding:0;" class="icons">
    <li><a href="https://educaysoft.org/sica/MTI/doc/_build/html/">Maestría en Tecnología de la Información</a></li>
    </ul>
</div>
</footer>
--->

<!-- Footer -->

   	<?php } ?>

<script>

$(document).ready(function() {
  var footerHeight = $('#eys-footer').outerHeight();
  $('body').css('padding-bottom', footerHeight + 'px');
});


function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}

function mostrar() {

 <?php  
   $amenu=array();                               
                                                  
 if(isset($this->session->userdata['acceso'])){
                    
   foreach($this->session->userdata['acceso'] as $row)
       {
       $id=$row["modulo"]["id"];                        
       $nombre=$row["modulo"]["nombre"];            
       $icono=$row["modulo"]["icono"];              
       $modulo=$row["modulo"]["modulo"];                     
       array_push($amenu,[$id,$nombre,$icono,$modulo]);      
       } 
 }

    $js_array = json_encode($amenu);
    echo "var modulos = ". $js_array . ";\n";
         ?>        



   document.getElementById("sidebar").style.width = "10%";
  
   document.getElementById("eys-principal").style.width="90%";
//  document.getElementById("eys-contenido-g").style.marginLeft = "300px";
    document.getElementById("abrir").style.display = "none";
    document.getElementById("cerrar").style.display = "inline";

   for(var i=0; i<modulos.length;i++){

      document.getElementById(modulos[i][0]).innerHTML="<img src=\"<?php echo base_url(); ?>assets/iconos/"+modulos[i][2]+".png\" wide=\"49\" height=\"50\" alt=\"Formget logo\"> - "+modulos[i][2];
  }
}

function ocultar() {
 <?php  
                                                  
 if(isset($this->session->userdata['acceso'])){
   $amenu=array();                               
                    
   foreach($this->session->userdata['acceso'] as $row)
       {
       $id=$row["modulo"]["id"];                        
       $nombre=$row["modulo"]["nombre"];            
       $icono=$row["modulo"]["icono"];              
       $modulo=$row["modulo"]["modulo"];                     
       array_push($amenu,[$id,$nombre,$icono,$modulo]);      
       } 
 }

    $js_array = json_encode($amenu);
    echo "var modulos = ". $js_array . ";\n";
         ?>        


    document.getElementById("sidebar").style.width = "5%";
    document.getElementById("eys-principal").style.width="95%";
  //  document.getElementById("eys-contenido-g").style.marginLeft = "5%";
    document.getElementById("abrir").style.display = "inline";
    document.getElementById("cerrar").style.display = "none";

   for(var i=0; i<modulos.length;i++){

      document.getElementById(modulos[i][0]).innerHTML="<img src=\"<?php echo base_url(); ?>assets/iconos/"+modulos[i][2]+".png\" wide=\"49\" height=\"50\" alt=\"Formget logo\">";
  }





}

document.getElementById("eys-principal").style.width="95%";
</script>


</body>

</html>
