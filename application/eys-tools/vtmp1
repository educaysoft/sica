<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($cinturon))
{
?>

    <li> <?php echo anchor('cinturon/elprimero/', 'primero'); ?></li>
    <li> <?php echo anchor('cinturon/anterior/'.$cinturon['idcinturon'], 'anterior'); ?></li>
    <li> <?php echo anchor('cinturon/siguiente/'.$cinturon['idcinturon'], 'siguiente'); ?></li>
    <li style="border-right:1px solid green"><?php echo anchor('cinturon/elultimo/', 'Último'); ?></li>
    <li> <?php echo anchor('cinturon/add', 'Nuevo'); ?></li>
    <li> <?php echo anchor('cinturon/edit/'.$cinturon['idcinturon'],'Edit'); ?></li>
    <li style="border-right:1px solid green"> <?php echo anchor('cinturon/delete/'.$cinturon['idcinturon'],'Delete'); ?></li>
    <li> <?php echo anchor('cinturon/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cinturon/add', 'Nuevo'); ?></li>
<?php
}
?>


    </ul>
</div>
<br>


<?php echo form_hidden('idcinturon',$cinturon['idcinturon']) ?>
<table>





<tr>
     <td>Artículo:</td>
     <td><?php 
$options= array("NADA");
foreach ($articuloes as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$cinturon['idarticulo']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 


  <tr>
     <td>Id Unidad:</td>
     <td><?php echo form_input('idcinturon',$cinturon['idcinturon'],array("disabled"=>"disabled",'placeholder'=>'Idcinturons')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Color:</td>
     <td><?php echo form_input('color',$cinturon['color'],array("disabled"=>"disabled",'placeholder'=>'Color')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
