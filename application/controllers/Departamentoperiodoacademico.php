<?php
class Departamentoperiodoacademico extends CI_Controller{

	public function __construct(){
      		parent::__construct();
      		$this->load->model('departamentoperiodoacademico_model');
      		$this->load->model('departamento_model');
      		$this->load->model('periodoacademico_model');
	}

	public function index(){
  		$data['departamentos']= $this->departamento_model->lista_departamentoA()->result();
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->elultimo();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();

 		// print_r($data['departamentoperiodoacademico_list']);
  		$data['title']="Lista de Departamentoperiodoacademicoes";
		$this->load->view('template/page_header');		
  		$this->load->view('departamentoperiodoacademico_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['departamentos']= $this->departamento_model->lista_departamentoA()->result();
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->elultimo();
		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['title']="Nuevo departamento para el periodoacademico";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('departamentoperiodoacademico_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->departamentoperiodoacademico_model->save($array_item);
	 	redirect('departamentoperiodoacademico');
 	}



	public function edit()
	{
	 	$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->departamentoperiodoacademico($this->uri->segment(3))->row_array();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Departamentoperiodoacademico";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('departamentoperiodoacademico_edit',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamentoperiodoacademico');
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->departamentoperiodoacademico_model->update($id,$array_item);
	 	redirect('departamentoperiodoacademico');
 	}

	public function  save_edit2()
	{
		$id=$this->input->post('iddepartamentoperiodoacademico');
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	echo $this->departamentoperiodoacademico_model->update($id,$array_item);
 	}



 	public function delete()
 	{
 		$data=$this->departamentoperiodoacademico_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('departamentoperiodoacademico/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Unidades del asignatura";
		$this->load->view('template/page_header');		
		$this->load->view('departamentoperiodoacademico_list',$data);
		$this->load->view('template/page_footer');
	}



	function departamentoperiodoacademico_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));


			$data0 = $this->departamentoperiodoacademico_model->listar_departamentoperiodoacademico1();
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddepartamentoperiodoacademico,$r->unidad,$r->launidad,$r->elvideo,$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idasignatura="'.$r->iddepartamentoperiodoacademico.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}

	//===========================================================
	//Devuelve el primer registro de la tabla
	//===========================================================

	public function elprimero()
	{
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->elprimero();
	  if(!empty($data))
	  {
		    $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		    $data['title']="Departamentoperiodoacademico del departamento";
		    $this->load->view('template/page_header');		
		    $this->load->view('departamentoperiodoacademico_record',$data);
		    $this->load->view('template/page_footer');
	  }else{
		    $this->load->view('template/page_header');		
		    $this->load->view('registro_vacio');
		    $this->load->view('template/page_footer');
	  }
	}

	public function elultimo()
	{
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->elultimo();
	  if(!empty($data))
	  {
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	    $data['title']="Departamentoperiodoacademico del departamento";
	  
	    $this->load->view('template/page_header');		
	    $this->load->view('departamentoperiodoacademico_record',$data);
	    $this->load->view('template/page_footer');
	  }else{

	    $this->load->view('template/page_header');		
	    $this->load->view('registro_vacio');
	    $this->load->view('template/page_footer');
	  }
	}

	public function siguiente(){
	 // $data['departamentoperiodoacademico_list']=$this->departamentoperiodoacademico_model->lista_departamentoperiodoacademico()->result();
		$data['departamentoe']= $this->departamento_model->lista_departamentos()->result();
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->siguiente($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
	    $data['title']="Departamentoperiodoacademico del departamento";
	 // $data['title']="Correo";
		$this->load->view('template/page_header');		
	  $this->load->view('departamentoperiodoacademico_record',$data);
		$this->load->view('template/page_footer');
	}

	public function anterior(){
	 // $data['departamentoperiodoacademico_list']=$this->departamentoperiodoacademico_model->lista_departamentoperiodoacademico()->result();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['departamentoperiodoacademico'] = $this->departamentoperiodoacademico_model->anterior($this->uri->segment(3))->row_array();
	 // $data['title']="Correo";
	    $data['title']="Departamentoperiodoacademico del departamento";
		$this->load->view('template/page_header');		
	  $this->load->view('departamentoperiodoacademico_record',$data);
		$this->load->view('template/page_footer');
	}


}
