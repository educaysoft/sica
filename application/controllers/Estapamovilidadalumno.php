<?php

class Estapamovilidadalumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('alumno_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('estapamovilidadalumno_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['estapamovilidadalumno']=$this->estapamovilidadalumno_model->lista_estapamovilidadalumnos()->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  	$data['estapamovilidadalumnos']= $this->estapamovilidadalumno_model->lista_estapamovilidadalumnos()->result();
			
		$data['title']="Lista de estapamovilidadalumnos";
		$this->load->view('template/page_header');
		$this->load->view('estapamovilidadalumno_record',$data);
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
			$data['title']="Nueva Estapamovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('estapamovilidadalumno_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idestapamovilidadalumno' => $this->input->post('idestapamovilidadalumno'),
		'idalumno' => $this->input->post('idalumno'),
		'iddepartamento' => $this->input->post('iddepartamento'),
		'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->estapamovilidadalumno_model->save($array_item);
	 	redirect('estapamovilidadalumno');
 	}



	public function edit()
	{
			$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->estapamovilidadalumno($this->uri->segment(3))->row_array();
			$data['alumnos']= $this->alumno_model->lista_alumnosA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title'] = "Actualizar Estapamovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('estapamovilidadalumno_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idestapamovilidadalumno');
	 	$array_item=array(
		 	
		 	'idestapamovilidadalumno' => $this->input->post('idestapamovilidadalumno'),
			'idalumno' => $this->input->post('idalumno'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechadesde' => $this->input->post('fechadesde'),
	 	);
	 	$this->estapamovilidadalumno_model->update($id,$array_item);
	 	redirect('estapamovilidadalumno');
 	}


 	public function delete()
 	{
 		$data=$this->estapamovilidadalumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estapamovilidadalumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Estapamovilidadalumnos";
		$this->load->view('template/page_header');		
		$this->load->view('estapamovilidadalumno_list',$data);
		$this->load->view('template/page_footer');
	}



function estapamovilidadalumno_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estapamovilidadalumno_model->lista_estapamovilidadalumnosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestapamovilidadalumno,$r->laalumno,$r->ladepartamento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('estapamovilidadalumno/actual').'"   data-idestapamovilidadalumno="'.$r->idestapamovilidadalumno.'">Ver</a>');
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


	$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->estapamovilidadalumno($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Estapamovilidadalumno";
    $this->load->view('template/page_header');		
    $this->load->view('estapamovilidadalumno_record',$data);
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


	$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->elprimero();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Estapamovilidadalumno";
    $this->load->view('template/page_header');		
    $this->load->view('estapamovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->elultimo();
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
    $data['title']="Estapamovilidadalumno";
  
    $this->load->view('template/page_header');		
    $this->load->view('estapamovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estapamovilidadalumno_list']=$this->estapamovilidadalumno_model->lista_estapamovilidadalumno()->result();
	$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->siguiente($this->uri->segment(3))->row_array();
  	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Estapamovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('estapamovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estapamovilidadalumno_list']=$this->estapamovilidadalumno_model->lista_estapamovilidadalumno()->result();
	$data['estapamovilidadalumno'] = $this->estapamovilidadalumno_model->anterior($this->uri->segment(3))->row_array();
 	$data['alumnos']= $this->alumno_model->lista_alumnos()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Estapamovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('estapamovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}




}
