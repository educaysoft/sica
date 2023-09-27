<?php

Class Login extends CI_Controller {

public function __construct() {
parent::__construct();


// Load database
	$this->load->model('login_model');
	$this->load->model('persona_model');
	$this->load->model('perfil_model');
	$this->load->model('acceso_model');
	$this->load->model('modulo_model');
	$this->load->model('nivelacceso_model');
	$this->load->model('institucion_model');
      $this->load->model('sexo_model');
      $this->load->model('pais_model');
      	$this->load->model('evento_model');
      	$this->load->model('pagina_model');
      	$this->load->model('asistencia_model');
//$this->load->model('programa_model');
}

// Show login page
public function index() {
	
	 $data['eventos']= $this->evento_model->lista_eventos_open(0)->result();
	 $this->load->view('template/page_header.php');
	 $this->load->view('login_form',$data);
	 $this->load->view('template/page_footer.php');
}

// Show registration page
public function registro() {

        if($this->input->get('idevento') ){
		$data['eventos']= $this->evento_model->lista_eventos_open($this->input->get('idevento'))->result();
	}else{	
		$data['eventos']= $this->evento_model->lista_eventos_open(54)->result();
	}
  	$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	$data["paises"]= $this->pais_model->lista_paises()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$this->load->view('template/page_header.php');
	//$this->load->view('registration_form',$data);
	$this->load->view('registration_form',$data);
//	$this->load->view('template/page_footer.php');
}



public function validarcorreo()
{
        if($this->input->get('idevento') ){
		$data['eventos']= $this->evento_model->lista_eventos_open($this->input->get('idevento'))->result();
		$data['idevento']=$this->input->get('idevento'); 
	}else{	
		$data['eventos']= $this->evento_model->lista_eventos_open(54)->result();
		$data['idevento']=54; 

	}
	$this->load->view('template/page_header.php');
	$this->load->view('validarcorreo_form',$data);
//	$this->load->view('template/page_footer.php');

}


public function user_registration_show()
{
 $this->validarcorreo();
}



// Show registration page
public function registro_postulacion_MTI() {
 	//$data['programa_list'] = $this->programa_model->list_programa()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones_con_inscripciones()->result();
	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$this->load->view('template/page_header.php');
	//$this->load->view('registration_form',$data);
	$this->load->view('registration_form_maestria_postulacion',$data);
	$this->load->view('template/page_footer.php');
}



// Show registration page
public function registrate() {
 	//$data['programa_list'] = $this->programa_model->list_programa()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones_con_inscripciones()->result();
	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$this->load->view('template/page_header.php');
	//$this->load->view('registrate',$data);
	$this->load->view('registrate',$data);
	$this->load->view('template/page_footer.php');
}



// Validate and store registration data in database
public function new_user_registration() {
 
          // Check validation for user input in SignUp form
          $this->form_validation->set_rules('cedula', 'Cedula', 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');
          $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean');
          $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|xss_clean');
          $this->form_validation->set_rules('idevento', 'Evento', 'trim|required|xss_clean');
          $this->form_validation->set_rules('idsexo', 'Sexo', 'trim|required|xss_clean');
          $this->form_validation->set_rules('idpais', 'Pais', 'trim|required|xss_clean');
          $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
          $this->form_validation->set_rules('fechanacimiento', 'Fechanacimiento', 'trim|required|xss_clean');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
          if ($this->form_validation->run() == FALSE) {
            $data['eventos']= $this->evento_model->lista_eventos()->result();
  	    $data["sexos"]= $this->sexo_model->lista_sexos()->result();
  	    $data["paises"]= $this->pais_model->lista_paises()->result();
            $this->load->view('template/page_header.php');
            $this->load->view('registration_form',$data);
            $this->load->view('template/page_footer.php');
          } else {
	//Definiento de donde es llama la funcion
	//1=javascrip   0=php
	if($this->input->post('fuente')==1 || $this->input->post('fuente')==0)
	{
		$fuente=$this->input->post('fuente');
	}
	else
	{
		$fuente=0;
	}
            //hubicando la pagina con que inicia el usuario        
            $elevento= $this->evento_model->evento($this->input->post('idevento'))->row_array();
            $lapagina= $this->pagina_model->pagina($elevento['idpagina'])->row_array();

            if(isset($lapagina['ruta']))
            {
		    $idinstitucion=1; //Universidad tecnica luis varga torres
          $datausuario = array('idinstitucion'=>$idinstitucion,'email' => $this->input->post('email'),'password' => $this->input->post('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>$lapagina["ruta"],'idpagina'=>47);
            }else{

            $lapagina= $this->pagina_model->pagina(47)->row_array();
          $datausuario = array('email' => $this->input->post('email'),'password' => $this->input->post('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>$lapagina["ruta"]);
            }


          $datapersona = array('cedula'=>$this->input->post('cedula'),'nombres'=>$this->input->post('nombres'),'apellidos'=>$this->input->post('apellidos'));
          $datapersona+=['foto'=>"fotos/".$this->input->post('cedula').".png"];
          $datapersona+=['pdf'=>"pdfs/".$this->input->post('cedula').".pdf"];
          $datapersona+=["idsexo"=>$this->input->post('idsexo')];
          $datapersona+=["fechanacimiento"=>$this->input->post('fechanacimiento')];
          $datapersona+=["idestadocivil"=>1];
          $datapersona+=["idtiposangre"=>1];
          $datapersona+=["idnacionalidad"=>1];

          // se suma un partipacipante
          $dataparticipante=array();
          $dataparticipante+=['idevento'=>$this->input->post("idevento"),'idpersona'=>0,'idparticipanteestado'=>1];
          //telefono
          $datatelefono=array('idpersona'=>0,'numero'=>$this->input->post('telefono'),'idoperadora'=>1,'idtelefono_estado'=>1);

          //paispersona
          $datapaispersona=array('idpersona'=>0,'idpais'=>$this->input->post('idpais'),'fechadesde'=>$this->input->get('fechanacimiento'));

          //correo
          $datacorreo=array('idpersona'=>0,'nombre'=>$this->input->post('email'),'idcorreo_estado'=>1);

	 $data['eventos']= $this->evento_model->lista_eventos_open(0)->result();
          $result = $this->login_model->registration_insert($datapersona,$datausuario,$dataparticipante,$datacorreo,$datatelefono,$datapaispersona);
          if ($result >0) {
		if($fuente==0)  
		{
			$idpersona=$result;
  			date_default_timezone_set('America/Guayaquil');
    			$date = date("Y-m-d");
    			$hora= date("H:i:s");
    			$asistencia=array('idpersona'=>$idpersona,'fecha'=>$date,'hora'=>$hora,'idtipoasistencia'=>1,'comentario'=>"INGRESO AL SISTEMA",'idevento'=>$dataparticipante['idevento']);
			$paracorreo=array('correo'=>$datacorreo['nombre'],'mensaje'=>"Mensaje entregado");
			$data['elcorreo']=$datacorreo['nombre'];
			$data['elmensaje']="Mensaje entregado";
			$data['idevento']=$dataparticipante['idevento'];
    			$idasistencia=$this->asistencia_model->save($asistencia);
			if($idasistencia !=1 && $idasistencia !=0 && $idasistencia >1)
			{
				$data['title']="Su registro se realiza de forma exitosa";
				$data['idasistencia']= $idasistencia;
				$data['retornar']= $_SERVER['HTTP_REFERER'];  //(empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


				 $this->load->view('template/page_header.php');
				$this->load->view('asistencia_geolocal',$data);
				$this->load->view('template/page_footer.php');
			}




//            		$data['message_display'] = 'Registration Successfully !';
  //           		$this->load->view('template/page_header.php');
    //          		$this->load->view('login_form', $data);
      //       		$this->load->view('template/page_footer.php');
		}else{
			echo json_encode(array('resultado'=>$result));
		}
          } else {
		if($fuente==0)  
		{
            		$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
            		$data['message_display'] = 'Username already exist!';
            		//$data['programa_list'] = $this->programa_model->list_programa()->result();
  			$data["sexos"]= $this->sexo_model->lista_sexos()->result();
  			$data["paises"]= $this->pais_model->lista_paises()->result();
            		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
            		$data['eventos']= $this->evento_model->lista_eventos()->result();
             		$this->load->view('template/page_header.php');
         		 //$this->load->view('registration_form', $data);
          		$this->load->view('registration_form',$data);
             		$this->load->view('template/page_footer.php');
		}else{
			echo json_encode(array('resultado'=>$result));
		}
          }
          }
}


//======proceso de cargo en lote
//
//

// Validate and store registration data in database
public function carga_masiva_save() {

	if(!$this->persona_model->existe($this->input->get('cedula')))
	{
	 
            $elevento= $this->evento_model->evento($this->input->get('idevento'))->row_array();
            $lapagina= $this->pagina_model->pagina($elevento['idpagina'])->row_array();

            if(isset($lapagina['ruta']))
            {
          $datausuario = array('idinstitucion'=>$this->input->get('idinstitucion'),'email' => $this->input->get('email'),'password' => $this->input->get('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>$lapagina["ruta"]);
            }else{
          $datausuario = array('email' => $this->input->get('email'),'password' => $this->input->get('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>'principal');
            }

          $datapersona = array('cedula'=>$this->input->get('cedula'),'nombres'=>$this->input->get('nombres'),'apellidos'=>$this->input->get('apellidos'));
          $datapersona+=['foto'=>"fotos/".$this->input->get('cedula').".png"];
          $datapersona+=['pdf'=>"pdfs/".$this->input->get('cedula').".pdf"];
         $datapersona+=["idsexo"=>$this->input->get('idsexo')];
          $datapersona+=["fechanacimiento"=>$this->input->get('fechanacimiento')];
          $datapersona+=["idestadocivil"=>1];
          $datapersona+=["idtiposangre"=>1];
          $datapersona+=["idnacionalidad"=>1];

          // se suma un partipacipante
          $dataparticipante=array();
          $dataparticipante+=['idevento'=>$this->input->get("idevento"),'idpersona'=>0];
          //telefono
          $datatelefono=array('idpersona'=>0,'numero'=>$this->input->get('telefono'),'idoperadora'=>1,'idtelefono_estado'=>1);

          //paispersona
          $datapaispersona=array('idpersona'=>0,'idpais'=>$this->input->get('idpais'),'fechadesde'=>$this->input->get('fechanacimiento'));

          //correo
          $datacorreo=array('idpersona'=>0,'nombre'=>$this->input->get('email'),'idcorreo_estado'=>1);

	 $data['eventos']= $this->evento_model->lista_eventos_open($this->input->get('idevento'))->result();
          $result = $this->login_model->registration_insert($datapersona,$datausuario,$dataparticipante,$datacorreo,$datatelefono,$datapaispersona);
          if ($result == TRUE) {
		echo json_encode(array('resultado'=>'TRUE'));
          } else {
		echo json_encode(array('resultado'=>'FALSE'));
	  }
	}else{

		echo json_encode(array('resultado'=>'FALSE2'));

	}

}
























// Check for user login process

public function user_login_process() {


	$data['eventos']= $this->evento_model->lista_eventos()->result();

	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
			redirect('principal');
	//	 $this->load->view('template/page_header.php');
	//	$this->load->view('admin_page');
	//	 $this->load->view('template/page_footer.php');
		}else{
		 	$this->load->view('template/page_header.php');
			$this->load->view('login_form',$data);
	 		$this->load->view('template/page_footer.php');
		}
	} else {

	// ======================================================================
	// Recuperando el correo y el password del formulario login en un arreglo
	// ======================================================================	
	
	$data = array(
//	'idevento' => $this->input->post('idevento'),
	'email' => $this->input->post('email'),
	'password' => $this->input->post('password')
	);

	// =========================================================================
	// Verificando que el correo y password estén registrado en la base de datos
	// ==========================================================================
	$result = $this->login_model->login($data);


if ($result == TRUE) {
	$email = $this->input->post('email');
	$password = $this->input->post('password');
//	$idevento = $this->input->post('idevento');
//	$result = $this->login_model->read_user_information($email,$password,$idevento);
	$result = $this->login_model->read_user_information($email,$password);
	if ($result != false) {
	// Se busca la información del dueño del usuario.
		$result2 = $this->login_model->get_persona($result[0]->idpersona);
		if ($result2 != false) {
      			$resulti = $this->institucion_model->get_institucion($result[0]->idinstitucion);
			$session_data = array(
				'email' => $result[0]->email,
				'idusuario' => $result[0]->idusuario,
				'idpersona' => $result2[0]->idpersona,
				'elusuario' => $result2[0]->apellidos." ".$result2[0]->nombres,
				'cedula' => $result2[0]->cedula,
				'foto' => "fotos/".$result2[0]->cedula.".png",
				'pdf' => $result2[0]->pdf,
				'inicio'=>$result[0]->inicio,
				'institucion'=>$resulti[0]->nombre,
				);
		}	
		
		$result3 = $this->acceso_model->get_usuario($result[0]->idusuario);

		if ($result3 != false) {
			$accesos = array();
			foreach($result3 as $row)
			{
				$elmodulo = $this->modulo_model->arrmodulo($row->idmodulo);
				if ($elmodulo != false)
				{
					$idmodulo=$elmodulo[0]->idmodulo;
					$nombre=$elmodulo[0]->nombre;
					$icono=$elmodulo[0]->icono;
					$modulo=$elmodulo[0]->modulo;
					$funcion=$elmodulo[0]->funcion;
				}
				$elnivelacceso = $this->nivelacceso_model->nivelacceso($row->idnivelacceso)->row_array();
				if($elnivelacceso)
				{
			//		print_r($elnivelacceso);
					$create=$elnivelacceso['create'];
					$read=$elnivelacceso['read'];
					$update=$elnivelacceso['update'];
					$delete=$elnivelacceso['delete'];
					$navegar=$elnivelacceso['navegar'];
				}

			
				$accesotmp = array(
				'modulo' =>array('id'=>$idmodulo,'nombre'=>$nombre,'icono'=>$icono,'modulo'=>$modulo,'funcion'=>$funcion),
				'nivelacceso' =>array('create'=>$create,'read'=>$read,'update'=>$update,'delete'=>$delete,'navegar'=>$navegar)
				);
				array_push($accesos,$accesotmp);
			}	
		}

		// Add user data in session
		$this->session->set_userdata('logged_in', $session_data);
		
//		$acceso=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	//	$acceso=array(1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

		$this->session->set_userdata('acceso', $accesos);
		
		if($this->session->userdata['logged_in']['email']=="admin@educaysoft.org")
		{
			redirect('Principal'); 
		}else{		
   			date_default_timezone_set('America/Guayaquil');
    			$date = date("Y-m-d");
    			$hora= date("H:i:s");
    			$asistencia=array('idpersona'=>$result[0]->idpersona,'fecha'=>$date,'hora'=>$hora,'idtipoasistencia'=>1,'comentario'=>"INGRESO AL SISTEMA");
    			$idasistencia=$this->asistencia_model->save($asistencia);
			if($idasistencia !=1 && $idasistencia !=0 && $idasistencia >1)
			{
				$data['title']="Uste esta visualizando Documentos por registro";
				$data['idasistencia']= $idasistencia;

				 $this->load->view('template/page_header.php');
				$this->load->view('asistencia_geolocal',$data);
				$this->load->view('template/page_footer.php');
			}
		   	  $moduloinicio=$this->session->userdata['logged_in']['inicio'];	
	//		echo $moduloinicio;
	//		die();
			redirect($moduloinicio."/".$result[0]->idpersona); 
		}
		//	redirect('aspirante/add'); 
		//	 $this->load->view('template/page_header.php');
		//$this->load->view('admin_page');
		//	 $this->load->view('template/page_footer.php');
		}
	} else {

		$data = array('error_message' => '-Invalid Username or Password');
	 	$data['eventos']= $this->evento_model->lista_eventos_open(0)->result();
		$this->load->view('template/page_header.php');
		$this->load->view('login_form', $data);
		$this->load->view('template/page_footer.php');
	}
}
}
//==========================
// Logout from admin page
// =========================
public function logout() {

// Removing session data
	
	 $data['eventos']= $this->evento_model->lista_eventos_open(0)->result();
	$sess_array = array(
			'email' => ''
			);

	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('template/page_header.php');
	$this->load->view('login_form', $data);
	$this->load->view('template/page_footer.php');
}

public function carga_masiva(){
//	header("Access-Control-Allow-Origin: *");
////	header("Access-Control-Allow-Credentials: true ");
//	header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
//	header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('template/page_header.php');
	echo "paso por aqui";
	$this->load->view('login_carga_masiva', $data);
	$this->load->view('template/page_footer.php');
}


public function save_geolocalizacion()
{

	$update_array=array('longitud'=>$_GET['longitud'],'latitud'=>$_GET['latitud']);
	$idasistencia= $_GET['idasistencia'];

    $this->asistencia_model->update($idasistencia,$update_array);
	echo json_encode(array("exito"=>1));

}



}

?>


