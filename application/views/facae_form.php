<html>
<head>

<style>

.eys-boton{
	background-color: skyblue;
	color: white; 
	border:none; 
	cursor: pointer; 
	padding: 20px; 
	margin-top: 20px;  
}
.dropdown {	
    position: relative;
    display: inline-block;
}

.dropdown-child {
    display: none;
    background-color: skyblue;
    min-width: 200px;
}

.dropdown-child a {
    color: blue;
    padding: 20px;
    text-decoration: none;
    display: block;
}



.dropdown:hover .dropdown-child {
    display: block;
}
</style>



</head>




<body>
<div  class="dropdown" >

			<button class="eys-boton" >Menu Principal</button>

			<div class="dropdown-child" >

						<ul>
							<li><a href="Cargarpdf"> Cargar pdf</a>                         </li>
							<li><a href="#"> Pagina 22 </a>                       </li>
						</ul>
			</div>
</div>


</body>


</html>
