
</div>
</div>
<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}

function mostrar() {


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


<!-- Footer -->
<!------------
<div  id="eys-footer" >

<div >

<div>
    <p><b>Conocenos</b></p>
      <ul>
          <li>Mapa del sitio</li>
          <li>Contactanos</li>
          <li>Política de privacidad</li>
          <li><a href="https://www.facebook.com/UniversidadTecnicaLuisVargasTorres"><i class="fa fa-facebook" style="font-size:24px"></i></a> &nbsp; <a href="http://localhost/SICAPG/documentos/PROTOCOLO.pdf"><i class="fa fa-twitter" style="font-size:24px"></i></a> &nbsp;  <a href="https://www.facebook.com/UniversidadTecnicaLuisVargasTorres"><i class="fa fa-youtube" style="font-size:24px"></i></a>    </li>
      </ul>
</div>

<div style="text-align:center; vertical-align: middle;">
<a href=" <?php echo base_url(); ?>index.php/Principal"> <img src="<?php echo base_url(); ?>images/logo.png" width=100vw; height=100vh; alt="Formget logo"></a> 

</div>

      <div> 
        <p><b>Creadores</b></p>
         <ul style="margin:0; padding:0;" class="copyright"> 
            <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/educaysoft/index.php">EDUCAYSOFT</a></li> 
              <li> Universidad Técnica Luis Varga Torres</li>   
              <li>Agradecimiento</li>
              <li>Trabaja con nosotros</li>
          </ul>           
      </div>       
</div>
</div>
---->


</div>
<!-- Footer -->

</body>

</html>
