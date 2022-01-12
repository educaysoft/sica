<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($articulo))
{
?>
        <li> <?php echo anchor('articulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('articulo/siguiente/'.$articulo['idarticulo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('articulo/anterior/'.$articulo['idarticulo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('articulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('articulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('articulo/edit/'.$articulo['idarticulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('articulo/delete/'.$articulo['idarticulo'],'Delete'); ?></li>
        <li> <?php echo anchor('articulo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('articulo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idarticulo',$articulo['idarticulo']) ?>
<table>

  <tr>
     <td>Id artículo:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idarticulo','value'=>$articulo['idarticulo'],"disabled"=>"disabled",'placeholder'=>'Idarticulos','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php

  $eys_arrctl=array("name"=>'nombre','value'=>$articulo['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>



<tr>
      <td>Detalle:</td>
      <td><?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('detalle',$articulo['detalle'],$textarea_options); ?></td>
  </tr>


  <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
    echo form_input('idinstitucion',$options[$articulo['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
