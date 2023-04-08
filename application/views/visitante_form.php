
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>




<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("visitante/save",array('id'=>'eys-form')) ?>

<div class="form-group row">
  <label class="col-md-2 col-form-label"> Evento:</label>
	<div class="col-md-10">
		<?php

$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
 echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 

<div class="form-group row">
  <label class="col-md-2 col-form-label">Visitante (<?php echo anchor('persona/add', 'Nuevo'); ?>):</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}
 echo form_dropdown("idpersona",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 




 



 



<div class="form-group row">
  <label class="col-md-2 col-form-label">Grupo</label>
	<div class="col-md-10">

  <div id="page" data-role="content">

<a href="#divPopUpSignContract" data-rel="<a href='https://www.jqueryscript.net/tags.php?/popup/'>popup</a>" data-position-to="window" data-role="button" data-inline="true">Open</a>

</div>



	</div> 
</div> 


<div data-role="popup" id="divPopUpSignContract">
<div data-role="header" data-theme="b"> <a data-role="button" data-rel="back" data-transition="slide" class="ui-btn-right" onclick="closePopUp()"> Close </a>
<p class="popupHeader">Sign Pad</p>
</div>
<div class="ui-content popUpHeight">
<div id="div_signcontract">
<canvas id="canvas">Canvas is not supported</canvas>
<div>
<input id="btnSubmitSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Submit Sign" onclick="fun_submit()" />
<input id="btnClearSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Clear" onclick="init_Sign_Canvas()" />
</div>
</div>
</div>
</div>









<div id="eys-nav-i">

	<ul>
   	 	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
    		<li> <?php echo anchor('visitante', 'Cancelar'); ?></li>
	</ul>
</div> 




<?php echo form_close();?>



<script type="text/javascript">
var isSign =false;
var leftMButtonDown =false;
jQuery(function(){
//Initialize sign pad
init_Sign_Canvas();
});
 
function fun_submit() {
if(isSign) {
var canvas = $("#canvas").get(0);
var imgData = canvas.toDataURL();
jQuery('#page').find('p').remove();
jQuery('#page').find('img').remove();
jQuery('#page').append(jQuery('<p>Your Sign:</p>'));
jQuery('#page').append($('<img/>').attr('src',imgData));
closePopUp();
}else {
alert('Please sign');
}
}
 
function closePopUp() {
jQuery('#divPopUpSignContract').popup('close');
jQuery('#divPopUpSignContract').popup('close');
}
 
function init_Sign_Canvas() {
isSign =false;
leftMButtonDown =false;
 
//Set Canvas width
var sizedWindowWidth =$('#div_signcontract').width();
if(sizedWindowWidth > 700)
sizedWindowWidth = $(window).width() / 2;
else if(sizedWindowWidth > 400)
sizedWindowWidth = sizedWindowWidth - 50;
else
sizedWindowWidth = sizedWindowWidth - 20;
  
 $("#canvas").width(sizedWindowWidth);
 $("#canvas").height(200);
 $("#canvas").css("border","1px solid #000");
 
 var canvas = $("#canvas").get(0);
 
 canvasContext = canvas.getContext('2d');
 
 if(canvasContext)
 {
 canvasContext.canvas.width  = sizedWindowWidth;
 canvasContext.canvas.height = 200;
 
 canvasContext.fillStyle ="#fff";
 canvasContext.fillRect(0,0,sizedWindowWidth,200);
  
 canvasContext.moveTo(50,150);
 canvasContext.lineTo(sizedWindowWidth-50,150);
 canvasContext.stroke();
 
 canvasContext.fillStyle ="#000";
 canvasContext.font="20px Arial";
 canvasContext.fillText("x",40,155);
 }
 
 $(canvas).on('vmousedown',function (e) {
 if(e.which === 1) {
 leftMButtonDown =true;
 canvasContext.fillStyle ="#000";
 var x = e.pageX - $(e.target).offset().left;
 var y = e.pageY - $(e.target).offset().top;
 canvasContext.moveTo(x, y);
 }
 e.preventDefault();
 return false;
 });
 
 $(canvas).on('vmouseup',function (e) {
 if(leftMButtonDown && e.which === 1) {
 leftMButtonDown =false;
 isSign =true;
 }
 e.preventDefault();
 return false;
 });
 
 // draw a line from the last point to this one
 $(canvas).bind('vmousemove',function (e) {
 if(leftMButtonDown ==true) {
 canvasContext.fillStyle ="#000";
 var x = e.pageX - $(e.target).offset().left;
 var y = e.pageY - $(e.target).offset().top;
 canvasContext.lineTo(x,y);
 canvasContext.stroke();
 }
 e.preventDefault();
 return false;
 });
}
</script>


