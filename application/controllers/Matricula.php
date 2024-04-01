<?php

class Matricula extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('alumno_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('repeticion_model');
  	  $this->load->model('matricula_model');
  	  $this->load->model('periodoacademico_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['matricula']=$this->matricula_model->lista_matriculas()->row_array();
  		$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
  		$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
		$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
		$data['title']="Lista de matriculas";
		$this->load->view('template/page_header');
		$this->load->view('matricula_record',$data);
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
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
			$data['title']="Nueva Matricula";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$this->load->view('template/page_header');		
			$this->load->view('matricula_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idmatricula' => $this->input->post('idmatricula'),
		'idalumno' => $this->input->post('idalumno'),
		'iddepartamento' => $this->input->post('iddepartamento'),
		'idrepeticion' => $this->input->post('idrepeticion'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->matricula_model->save($array_item);
	 	redirect('matricula');
 	}



	public function edit()
	{
			$data['matricula'] = $this->matricula_model->matricula($this->uri->segment(3))->row_array();
			$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar Matricula";
			$this->load->view('template/page_header');		
			$this->load->view('matricula_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idmatricula');
	 	$array_item=array(
		 	
		 	'idmatricula' => $this->input->post('idmatricula'),
			'idalumno' => $this->input->post('idalumno'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'repeticion' => $this->input->post('repeticion'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->matricula_model->update($id,$array_item);
	 	redirect('matricula');
 	}


 	public function delete()
 	{
 		$data=$this->matricula_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('matricula/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Matriculas";
		$this->load->view('template/page_header');		
		$this->load->view('matricula_list',$data);
		$this->load->view('template/page_footer');
	}



function matricula_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->matricula_model->lista_matriculasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmatricula,$r->laalumno,$r->ladepartamento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('matricula/actual').'"   data-idmatricula="'.$r->idmatricula.'">Ver</a>');
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


  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
	$data['matricula'] = $this->matricula_model->matricula($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Matricula";
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
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

  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();

	$data['matricula'] = $this->matricula_model->elprimero();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Matricula";
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{


	$data['matricula'] = $this->matricula_model->elultimo();
  	$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

  if(!empty($data))
  {
    $data['title']="Matricula";
  
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['matricula_list']=$this->matricula_model->lista_matricula()->result();
	$data['matricula'] = $this->matricula_model->siguiente($this->uri->segment(3))->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

$data['title']="Matricula";
	$this->load->view('template/page_header');		
  $this->load->view('matricula_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['matricula_list']=$this->matricula_model->lista_matricula()->result();
	$data['matricula'] = $this->matricula_model->anterior($this->uri->segment(3))->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['repeticions']= $this->repeticion_model->lista_repeticions()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

  	$data['title']="Matricula";
	$this->load->view('template/page_header');		
  	$this->load->view('matricula_record',$data);
	$this->load->view('template/page_footer');
}




}
