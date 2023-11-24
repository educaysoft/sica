<!DOCTYPE html>
<html>
<head>
	<title>Signature Pad - HTML5 - jQuery Mobile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	<style type="text/css">
		#div_signcontract{ width: 99%; }
		.popupHeader{ margin: 10px; }
	</style>

	
</head>
<body>

	<br />
<b>Warning</b>:  Undefined array key "idvisitante" in <b>/home/reposito/public_html/firmadigital.php</b> on line <b>24</b><br />
<br />
<b>Warning</b>:  Undefined array key "fecha" in <b>/home/reposito/public_html/firmadigital.php</b> on line <b>25</b><br />
<br />
<b>Warning</b>:  Undefined array key "idpersona" in <b>/home/reposito/public_html/firmadigital.php</b> on line <b>26</b><br />
<br />
<b>Warning</b>:  Undefined array key 1 in <b>/home/reposito/public_html/firmadigital.php</b> on line <b>28</b><br />
<br />
<b>Warning</b>:  Undefined array key "motivo" in <b>/home/reposito/public_html/firmadigital.php</b> on line <b>29</b><br />

	<div data-role="page">
		<div data-role="header">
			<h1>Firma de visitas</h1>
		</div><!-- /header -->
		<div id="page" data-role="content">
			<a href="#divPopUpSignContract" data-rel="popup" data-position-to="window" data-role="button" data-inline="true">Abrir Pad para firmar</a>
		</div>	
		<div data-role="popup" id="divPopUpSignContract">
			<div data-role="header" data-theme="b">
				<a data-role="button" data-rel="back" data-transition="slide" class="ui-btn-right" onclick="closePopUp()"> Close </a>
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

		<input id="btnSaveSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Guardar la firma" onclick="signatureSave()" />

	</div>	

<script type="text/javascript">
		var isSign = false;
		var leftMButtonDown = false;
		
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
				$('img').attr('id','saveSignature');
				
				closePopUp();
			} else {
				alert('Please sign');
			}
		}
		
		function closePopUp() {
			jQuery('#divPopUpSignContract').popup('close');
			jQuery('#divPopUpSignContract').popup('close');
		}
	
function signatureSave(){

        var canvas = document.getElementById("canvas");
        // save canvas image as data url (png format by default)
        var dataURL = canvas.toDataURL("image/png");
        var imgdata = dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
	var namefile=nombredearchivo();

	var idvisitante='';
	var motivo='';
        //ajax call to save image inside folder}
        $.ajax({
            url: './saveSignature.php',
            data: {
	    imgdata:imgdata,namefile:namefile,motivo:motivo,idvisitante:idvisitante
                   },
            type: 'post',
            success: function (response) {   
             //  console.log(response);

		window.location.href = "https://educaysoft.org/sica/visitante/actual/"+idvisitante;
            //   $('#saveSignature').attr('src', response)

        }
	});
};

   function nombredearchivo()
 {
	var indice='';
     var fecha='';
	const persona='';

	 if(persona.length>0)
	 {
	    //  var persona1=persona.options[0].text;
	      var persona2=persona.split(/\W+/);
	      var initial="";
	      for( var i=0; i<persona2.length; i++)
	       {
		initial=initial+persona2[i].toUpperCase().charAt(0);
	       }
	       namefile=fecha+"-"+initial+'-'+indice.padStart(6,"0")+".png";
	       alert(namefile);
	       return namefile;
	 }
 
 };




/*
        document.getElementById("saveSignature").src = dataURL;
	alert(imgdata);
        var data = new FormData();
	data.append('imgdata',imgdata);
        var ajax = new XMLHttpRequest();
        ajax.open("POST",'./saveSignature.php');
        ajax.setRequestHeader('Content-Type', 'application/upload');
        ajax.send(data); 
	ajax.onreadystatechange = function (oEvent) {
	    if (ajax.readyState === 4) {
		if (ajax.status === 200) {
		  console.log(ajax.responseText)
		} else {
		   console.log("Error", ajax.statusText);
		}
	    }
	};
*/

 //   };

		function init_Sign_Canvas() {
			isSign = false;
			leftMButtonDown = false;
			
			//Set Canvas width
			var sizedWindowWidth = $(window).width();
			if(sizedWindowWidth > 700)
				sizedWindowWidth = $(window).width() / 2;
			else if(sizedWindowWidth > 400)
				sizedWindowWidth = sizedWindowWidth - 100;
			else
				sizedWindowWidth = sizedWindowWidth - 50;
			 
			 $("#canvas").width(sizedWindowWidth);
			 $("#canvas").height(200);
			 $("#canvas").css("border","1px solid #000");
			
			 var canvas = $("#canvas").get(0);
			
			 canvasContext = canvas.getContext('2d');

			 if(canvasContext)
			 {
				 canvasContext.canvas.width  = sizedWindowWidth;
				 canvasContext.canvas.height = 200;

				 canvasContext.fillStyle = "#fff";
				 canvasContext.fillRect(0,0,sizedWindowWidth,200);
				 
				 canvasContext.moveTo(50,150);
				 canvasContext.lineTo(sizedWindowWidth-50,150);
				 canvasContext.stroke();
				
				 canvasContext.fillStyle = "#000";
				 canvasContext.font="20px Arial";
				 canvasContext.fillText("x",40,155);
			 }
			 // Bind Mouse events
			 $(canvas).on('mousedown', function (e) {
				 if(e.which === 1) { 
					 leftMButtonDown = true;
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.moveTo(x, y);
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 $(canvas).on('mouseup', function (e) {
				 if(leftMButtonDown && e.which === 1) {
					 leftMButtonDown = false;
					 isSign = true;
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 // draw a line from the last point to this one
			 $(canvas).on('mousemove', function (e) {
				 if(leftMButtonDown == true) {
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.lineTo(x,y);
					 canvasContext.stroke();
				 }
				 e.preventDefault();
				 return false;
			 });
			 
			 //bind touch events
			 $(canvas).on('touchstart', function (e) {
				leftMButtonDown = true;
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.moveTo(x, y);
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchmove', function (e) {
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.lineTo(x,y);
				canvasContext.stroke();
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchend', function (e) {
				if(leftMButtonDown) {
					leftMButtonDown = false;
					isSign = true;
				}
			 
			 });
		}
	</script>


</body>
</html>	

