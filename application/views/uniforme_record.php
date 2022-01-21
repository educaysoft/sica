<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($uniforme))
{
?>

    <li> <?php echo anchor('uniforme/elprimero/', 'primero'); ?></li>
    <li> <?php echo anchor('uniforme/anterior/'.$uniforme['iduniforme'], 'anterior'); ?></li>
    <li> <?php echo anchor('uniforme/siguiente/'.$uniforme['iduniforme'], 'siguiente'); ?></li>
    <li style="border-right:1px solid green"><?php echo anchor('uniforme/elultimo/', 'Último'); ?></li>
    <li> <?php echo anchor('uniforme/add', 'Nuevo'); ?></li>
    <li> <?php echo anchor('uniforme/edit/'.$uniforme['iduniforme'],'Edit'); ?></li>
    <li style="border-right:1px solid green"> <?php echo anchor('uniforme/delete/'.$uniforme['iduniforme'],'Delete'); ?></li>
    <li> <?php echo anchor('uniforme/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('uniforme/add', 'Nuevo'); ?></li>
<?php
}
?>


    </ul>
</div>
<br>


<?php echo form_hidden('iduniforme',$uniforme['iduniforme']) ?>
<table>





<tr>
     <td>Artículo:</td>
     <td><?php 
$options= array("NADA");
foreach ($articuloes as $row){
	$options[$row->idarticulo]= $row->nombre;
}

echo form_input('idarticulo',$options[$uniforme['idarticulo']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 


  <tr>
     <td>Id Unidad:</td>
     <td><?php echo form_input('iduniforme',$uniforme['iduniforme'],array("disabled"=>"disabled",'placeholder'=>'Iduniformes')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Color:</td>
     <td><?php echo form_input('color',$uniforme['color'],array("disabled"=>"disabled",'placeholder'=>'Color')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
