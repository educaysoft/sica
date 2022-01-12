<?php
class Persona extends  CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	 	$this->load->model('persona_model');
	 	$this->load->model('genero_model');
	 	$this->load->model('estadocivil_model');
	 	$this->load->model('tiposangre_model');
	}
	
	public function index(){
	 	$data['persona_list'] = $this->persona_model->list_persona()->result();
 		$data['title'] = "Listados de Personas";
	 	$this->load->view('template/page_header.php');
 		$this->load->view('persona_list',$data);
	 	$this->load->view('template/page_footer.php');
 	}
	function persona_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	 	$data0 = $this->persona_model->list_persona();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array(
				$r->idpersona,
				$r->cedula,
				$r->pasaporte,
				$r->nombres,
				$r->fecha_naci,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-idpersona="'.$r->idpersona.'" data-cedula="'.$r->cedula.'" data-pasaporte="'.$r->pasaporte.'" data-nombre="'.$r->nombres.'" data-fecha_naci="'.$r->fecha_naci.'">Edit</a> <a href="javascript:void(0);" class="btn-danger btn-sm item_delete" data-idpersona="'.$r->idpersona.'">Delete</a>' );
		}

	//	print_r($data);
	//       die();	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}


	 public function add()
 	{	 
	 	$data['genero_list'] = $this->genero_model->list_genero()->result();
	 	$data['estadocivil_list'] = $this->estadocivil_model->list_estadocivil()->result();
	 	$data['tiposangre_list'] = $this->tiposangre_model->list_tiposangre()->result();
		$data['title'] = "Nueva Persona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('persona_form',$data);
	 	$this->load->view('template/page_footer');
	}
	public function  save()
	{
	 	$array_item=array(
		 	'cedula' => $this->input->post('cedula'),
		 	'pasaporte' => $this->input->post('pasaporte'),
		 	'nombres' => $this->input->post('nombres'),
		 	'fecha_naci' => $this->input->post('fecha_naci'),
		 	'idgenero' => $this->input->post('idgenero'),
		 	'idestadocivil' => $this->input->post('idestadocivil'),
		 	'idtiposangre' => $this->input->post('idtiposangre'),
	 	);
	 	$this->load->model('persona_model');
	 	$this->persona_model->save($array_item);
	 	redirect('persona');
 	}

	public function save_edit()
	{
 		$id = $this->input->post('idpersona');
 		$array_persona = array(
 			'cedula' => $this->input->post('cedula'),
 			'pasaporte' => $this->input->post('pasaporte'),
 			'nombres' => $this->input->post('nombres'),
 			'fecha_naci' => $this->input->post('fecha_naci'),
 			'idgenero' => $this->input->post('idgenero'),
 			'idtiposangre' => $this->input->post('idtiposangre'),
 			'idestadocivil' => $this->input->post('idestadocivil')
 		);
 		$this->load->model('persona_model');
 		$this->persona_model->update($id,$array_persona);
 		redirect('persona');
 	}

 	public function edit(){
	 	$data['persona'] = $this->persona_model->product($this->uri->segment(3))->row_array();
 	 	$data['genero_list'] = $this->genero_model->list_genero()->result();
	 	$data['estadocivil_list'] = $this->estadocivil_model->list_estadocivil()->result();
	 	$data['tiposangre_list'] = $this->tiposangre_model->list_tiposangre()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('persona_edit',$data);
	 	$this->load->view('template/page_footer');
 	}

 	public function delete()
 	{
 		$data=$this->persona_model->delete();
 		echo json_encode($data);
	//	$db['default']['db_debug']=FALSE
 	}
}
