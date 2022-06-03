<?php

Class Login extends CI_Controller {

public function __construct() {
parent::__construct();


// Load database
	$this->load->model('login_model');
	$this->load->model('perfil_model');
	$this->load->model('acceso_model');
	$this->load->model('modulo_model');
	$this->load->model('nivelacceso_model');
	$this->load->model('institucion_model');
      	$this->load->model('evento_model');
      	$this->load->model('pagina_model');
      	$this->load->model('asistencia_model');
//$this->load->model('programa_model');
}

// Show login page
public function index() {
	
	 $data['eventos']= $this->evento_model->lista_eventos_open()->result();
	 $this->load->view('template/page_header.php');
	 $this->load->view('login_form',$data);
	 $this->load->view('template/page_footer.php');
}

// Show registration page
public function user_registration_show() {
 	//$data['programa_list'] = $this->programa_model->list_programa()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones_con_inscripciones()->result();
	$data['eventos']= $this->evento_model->lista_eventos()->result();
	$this->load->view('template/page_header.php');
	//$this->load->view('registration_form',$data);
	$this->load->view('registration_form',$data);
	$this->load->view('template/page_footer.php');
}

// Validate and store registration data in database
public function new_user_registration() {

          // Check validation for user input in SignUp form
          $this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean');
          $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|xss_clean');
          $this->form_validation->set_rules('idevento', 'Evento', 'trim|required|xss_clean');
          $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
          if ($this->form_validation->run() == FALSE) {
           //	$data['programa_list'] = $this->programa_model->list_programa()->result();
            $data['eventos']= $this->evento_model->lista_eventos()->result();
            $data['instituciones']= $this->institucion_model->lista_instituciones()->result();
             $this->load->view('template/page_header.php');
          $this->load->view('registration_form',$data);
             $this->load->view('template/page_footer.php');
          } else {

            //hubicando la pagina con que inicia el usuario        
            $elevento= $this->evento_model->evento($this->input->post('idevento'))->row_array();
            $lapagina= $this->pagina_model->pagina($elevento['idpagina'])->row_array();

            if(isset($lapagina['ruta']))
            {
          $datausuario = array('idinstitucion'=>$this->input->post('idinstitucion'),'email' => $this->input->post('email'),'password' => $this->input->post('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>$lapagina["ruta"]);
            }else{

          $datausuario = array('email' => $this->input->post('email'),'password' => $this->input->post('password'),'idpersona'=>0,'idperfil'=>1,'inicio'=>'principal');
            }


          $datapersona = array('cedula'=>$this->input->post('cedula'),'nombres'=>$this->input->post('nombres'),'apellidos'=>$this->input->post('apellidos'));
          $datapersona+=['foto'=>"fotos/".$this->input->post('cedula').".png"];
          $datapersona+=['pdf'=>"pdfs/".$this->input->post('cedula').".pdf"];
          $datapersona+=["idgenero"=>1];
          $datapersona+=["idestadocivil"=>1];
          $datapersona+=["idtiposangre"=>1];
          $datapersona+=["idnacionalidad"=>1];

          // se suma un partipacipante
          $dataparticipante=array();
          $dataparticipante+=['idevento'=>$this->input->post("idevento"),'idpersona'=>0];
          //telefono
          $datatelefono=array('idpersona'=>0,'numero'=>$this->input->post('telefono'),'idoperadora'=>1,'idtelefono_estado'=>1);

          //correo
          $datacorreo=array('idpersona'=>0,'nombre'=>$this->input->post('email'),'idcorreo_estado'=>1);

	 $data['eventos']= $this->evento_model->lista_eventos_open()->result();
          $result = $this->login_model->registration_insert($datapersona,$datausuario,$dataparticipante,$datacorreo,$datatelefono);
          if ($result == TRUE) {
              $data['message_display'] = 'Registration Successfully !';
              $this->load->view('template/page_header.php');
              $this->load->view('login_form', $data);
              $this->load->view('template/page_footer.php');
          } else {
            $data['perfiles']= $this->perfil_model->lista_perfiles()->result();
            $data['message_display'] = 'Username already exist!';
            //$data['programa_list'] = $this->programa_model->list_programa()->result();
            $data['instituciones']= $this->institucion_model->lista_instituciones()->result();
            $data['eventos']= $this->evento_model->lista_eventos()->result();
             $this->load->view('template/page_header.php');
          //$this->load->view('registration_form', $data);
          $this->load->view('registration_form',$data);
             $this->load->view('template/page_footer.php');
          }
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
	'idevento' => $this->input->post('idevento'),
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
	$idevento = $this->input->post('idevento');
	$result = $this->login_model->read_user_information($email,$password,$idevento);
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


				$elmodulo = $this->modulo_model->modulo($row->idmodulo);
				if ($elmodulo != false)
				{
					$idmodulo=$elmodulo[0]->idmodulo;
					$nombre=$elmodulo[0]->nombre;
					$icono=$elmodulo[0]->icono;
					$modulo=$elmodulo[0]->modulo;
				}
				$elnivelacceso = $this->nivelacceso_model->nivelacceso($row->idnivelacceso)->row_array();
				if($elnivelacceso)
				{
					print_r($elnivelacceso);
					$create=$elnivelacceso['create'];
					$read=$elnivelacceso['read'];
					$update=$elnivelacceso['update'];
					$delete=$elnivelacceso['delete'];
				}

			
				$accesotmp = array(
				'modulo' =>array('id'=>$idmodulo,'nombre'=>$nombre,'icono'=>$icono,'modulo'=>$modulo),
				'nivelacceso' =>array('create'=>$create,'read'=>$read,'update'=>$update,'delete'=>$delete)
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
    $date = date('d-m-y');
    $asistencia=array('idpersona'=>$result[0]->idpersona,'idevento'=>$result[0]->idevento,'fecha'=>$date,'idtipoasistencia'=>1,'comentario'=>"INGRESO AL SISTEMA");
    $this->asistencia_model->save($asistencia);

		     $moduloinicio=	$this->session->userdata['logged_in']['inicio'];	
			redirect($moduloinicio); 
			//redirect('Portafolio'); 
		}
		//	redirect('aspirante/add'); 
		//	 $this->load->view('template/page_header.php');
		//$this->load->view('admin_page');
		//	 $this->load->view('template/page_footer.php');
		}
	} else {

	 $data['eventos']= $this->evento_model->lista_eventos_open()->result();
		$data = array('error_message' => '-Invalid Username or Password');
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
	
	 $data['eventos']= $this->evento_model->lista_eventos_open()->result();
	$sess_array = array(
			'email' => ''
			);

	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('template/page_header.php');
	$this->load->view('login_form', $data);
	$this->load->view('template/page_footer.php');
}

}

?>
