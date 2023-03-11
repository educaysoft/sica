<div id="eys-nav-i">
<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idreactivo"><?php echo $reactivo['idreactivo']; ?></idem></div>
    <ul>
<?php
if(isset($reactivo))
{
?>
        <li> <?php echo anchor('reactivo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('reactivo/siguiente/'.$reactivo['idreactivo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('reactivo/anterior/'.$reactivo['idreactivo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('reactivo/elultimo/', 'Último'); ?></li>
<?php
if(isset($reactivo))
{
?>
        <li> <?php echo anchor('reactivo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('reactivo/edit/'.$reactivo['idreactivo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('reactivo/delete/'.$reactivo['idreactivo'],'Delete'); ?></li>
        <li> <?php echo anchor('reactivo/listar/','Listar'); ?></li>
        <li> <?php echo anchor('pregunta/','Pregunas'); ?></li>
        <li> <?php echo anchor('respuesta/','Respuestas'); ?></li>
        <li> <?php echo anchor('reactivo/imprimir/'.$reactivo['idreactivo'],'Imprimir'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('reactivo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('reactivo/save_edit') ?>
<?php echo form_hidden('idreactivo',$reactivo['idreactivo']) ?>





<?php echo form_close(); ?>

<script type="text/javascript">

$(document).ready(function(){
	var idreactivo=document.getElementById("idreactivo").innerHTML;
	var mytablaf= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('reactivo/reactivo_pregunta')?>', type: 'GET',data:{idreactivo:idreactivo}},});

	var mytablaf= $('#mydatar').DataTable({"ajax": {url: '<?php echo site_url('reactivo/reactivo_respuesta')?>', type: 'GET',data:{idreactivo:idreactivo}},});



});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idsesionevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});



</script>



</body>





</html>
