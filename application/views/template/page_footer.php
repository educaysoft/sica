
</div>
</div>
</main>


   	<?php if(!isset($this->session->userdata['logged_in']) ){ ?>

<!-- Footer -->
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
<!-- Footer -->

   	<?php } ?>

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


</body>

</html>
