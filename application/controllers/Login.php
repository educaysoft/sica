<?php

//session_start(); //we need to start session in order to access it through CI

Class Login extends CI_Controller {

public function __construct() {
parent::__construct();


// Load database
	$this->load->model('login_model');
	$this->load->model('perfil_model');
	$this->load->model('acceso_model');
	$this->load->model('modulo_model');
	$this->load->model('nivelacceso_model');
//$this->load->model('programa_model');
}

// Show login page
public function index() {
	
	 $this->load->view('template/page_header.php');
	 $this->load->view('login_form');
	 $this->load->view('template/page_footer.php');
}

// Show registration page
public function user_registration_show() {
 	//$data['programa_list'] = $this->programa_model->list_programa()->result();
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
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
$this->form_validation->set_rules('idperfil', 'Perfil', 'trim|required|xss_clean');
$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
 	$data['programa_list'] = $this->programa_model->list_programa()->result();
	 $this->load->view('template/page_header.php');
$this->load->view('registration_form',$data);
	 $this->load->view('template/page_footer.php');
} else {
$datau = array('email' => $this->input->post('email'),'password' => $this->input->post('password'),'idpersona'=>0,'idperfil'=>1);

$datap = array('cedula'=>$this->input->post('cedula'),'nombres'=>$this->input->post('nombres'),'apellidos'=>$this->input->post('apellidos'));
$datap+=['foto'=>"fotos/".$this->input->post('cedula').".jpg"];
$datap+=['pdf'=>"pdfs/".$this->input->post('cedula').".pdf"];
$datap+=["idgenero"=>1];
$datap+=["idestadocivil"=>1];
$datap+=["idtiposangre"=>1];
$datap+=["idnacionalidad"=>1];

$dataa=array('idprograma'=>$this->input->post("idprograma"));

$result = $this->login_model->registration_insert($datap,$datau,$dataa);
if ($result == TRUE) {
		$data['message_display'] = 'Registration Successfully !';
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form', $data);
	 	$this->load->view('template/page_footer.php');
} else {
	$data['perfiles']= $this->perfil_model->lista_perfiles()->result();
	$data['message_display'] = 'Username already exist!';
 	//$data['programa_list'] = $this->programa_model->list_programa()->result();
	 $this->load->view('template/page_header.php');
//$this->load->view('registration_form', $data);
$this->load->view('registration_form',$data);
	 $this->load->view('template/page_footer.php');
}
}
}

// Check for user login process
public function user_login_process() {

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
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
} else {

	// ======================================================================
	// Recuperando el correo y el password del formulario login en un arreglo
	// ======================================================================	
	
	$data = array(
	'email' => $this->input->post('email'),
	'password' => $this->input->post('password')
	);

	// =========================================================================
	// Verificando que el correo y password estén registrado en la base de datos
	// ==========================================================================
	$result = $this->login_model->login($data);


if ($result == TRUE) {
	$email = $this->input->post('email');
	$result = $this->login_model->read_user_information($email);
	if ($result != false) {
	// Se busca la información del dueño del usuario.
		$result2 = $this->login_model->get_persona($result[0]->idpersona);
		if ($result2 != false) {
			$session_data = array(
				'email' => $result[0]->email,
				'elusuario' => $result2[0]->apellidos." ".$result2[0]->nombres,
				'cedula' => $result2[0]->cedula,
				'foto' => $result2[0]->foto,
				'pdf' => $result2[0]->pdf,
				'inicio'=>$result[0]->inicio,
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
				$elnivelacceso = $this->nivelacceso_model->nivelacceso($row->idnivelacceso);
				if($elnivelacceso)
				{
					$create=$elnivelacceso[0]->create;
					$read=$elnivelacceso[0]->read;
					$update=$elnivelacceso[0]->update;
					$delete=$elnivelacceso[0]->delete;
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
