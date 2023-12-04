<?php

class Departamentoalumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('alumno_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('departamentoalumno_model');
  	  $this->load->model('periodoacademico_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['departamentoalumno']=$this->departamentoalumno_model->lista_departamentoalumnos()->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  	$data['departamentoalumnos']= $this->departamentoalumno_model->lista_departamentoalumnos()->result();
			
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
		$data['title']="Lista de departamentoalumnos";
		$this->load->view('template/page_header');
		$this->load->view('departamentoalumno_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


	public function add()
	{
			$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title']="Nueva Departamentoalumno";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$this->load->view('template/page_header');		
			$this->load->view('departamentoalumno_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'iddepartamentoalumno' => $this->input->post('iddepartamentoalumno'),
		'idalumno' => $this->input->post('idalumno'),
		'iddepartamento' => $this->input->post('iddepartamento'),
		'fechadesde' => $this->input->post('fechadesde'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->departamentoalumno_model->save($array_item);
	 	redirect('departamentoalumno');
 	}



	public function edit()
	{
			$data['departamentoalumno'] = $this->departamentoalumno_model->departamentoalumno($this->uri->segment(3))->row_array();
			$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar Departamentoalumno";
			$this->load->view('template/page_header');		
			$this->load->view('departamentoalumno_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamentoalumno');
	 	$array_item=array(
		 	
		 	'iddepartamentoalumno' => $this->input->post('iddepartamentoalumno'),
			'idalumno' => $this->input->post('idalumno'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechadesde' => $this->input->post('fechadesde'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->departamentoalumno_model->update($id,$array_item);
	 	redirect('departamentoalumno');
 	}


 	public function delete()
 	{
 		$data=$this->departamentoalumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('departamentoalumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Departamentoalumnos";
		$this->load->view('template/page_header');		
		$this->load->view('departamentoalumno_list',$data);
		$this->load->view('template/page_footer');
	}



function departamentoalumno_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->departamentoalumno_model->lista_departamentoalumnosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddepartamentoalumno,$r->laalumno,$r->ladepartamento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('departamentoalumno/actual').'"   data-iddepartamentoalumno="'.$r->iddepartamentoalumno.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function actual()
{


  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();


	$data['departamentoalumno'] = $this->departamentoalumno_model->departamentoalumno($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Departamentoalumno";
    $this->load->view('template/page_header');		
    $this->load->view('departamentoalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{


  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();


	$data['departamentoalumno'] = $this->departamentoalumno_model->elprimero();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Departamentoalumno";
    $this->load->view('template/page_header');		
    $this->load->view('departamentoalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['departamentoalumno'] = $this->departamentoalumno_model->elultimo();
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Departamentoalumno";
  
    $this->load->view('template/page_header');		
    $this->load->view('departamentoalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['departamentoalumno_list']=$this->departamentoalumno_model->lista_departamentoalumno()->result();
	$data['departamentoalumno'] = $this->departamentoalumno_model->siguiente($this->uri->segment(3))->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Departamentoalumno";
	$this->load->view('template/page_header');		
  $this->load->view('departamentoalumno_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['departamentoalumno_list']=$this->departamentoalumno_model->lista_departamentoalumno()->result();
	$data['departamentoalumno'] = $this->departamentoalumno_model->anterior($this->uri->segment(3))->row_array();
 	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Departamentoalumno";
	$this->load->view('template/page_header');		
  $this->load->view('departamentoalumno_record',$data);
	$this->load->view('template/page_footer');
}




}
