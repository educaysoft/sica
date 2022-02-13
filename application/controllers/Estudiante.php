<?php

class Estudiante extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('estudiante_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['estudiante']=$this->estudiante_model->lista_estudiantes()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			
		$data['title']="Lista de estudiantes";
		$this->load->view('template/page_header');
		$this->load->view('estudiante_record',$data);
		$this->load->view('estudiante_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Nueva Estudiante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estudiante_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idestudiante' => $this->input->post('idestudiante'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechadesde' => $this->input->post('fechadesde'),
			'fechahasta' => $this->input->post('fechahasta'),
	 	);
	 	$this->estudiante_model->save($array_item);
	 	redirect('estudiante');
 	}



public function edit()
{
	 	$data['estudiante'] = $this->estudiante_model->estudiante($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Estudiante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estudiante_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestudiante');
	 	$array_item=array(
		 	
		 	'idestudiante' => $this->input->post('idestudiante'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->estudiante_model->update($id,$array_item);
	 	redirect('estudiante');
 	}


 	public function delete()
 	{
 		$data=$this->estudiante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estudiante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estudiantes";
	$this->load->view('template/page_header');		
  $this->load->view('estudiante_list',$data);
	$this->load->view('template/page_footer');
}



function estudiante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estudiante_model->lista_estudiantesB();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestudiante,$r->elestudiante,$r->lacarrera,$r->fechadesde,$r->fechahasta,
				$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idpersona.'">'.$r->cantidad.'</a>',
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestudiante="'.$r->idestudiante.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}








public function elprimero()
{


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();


	$data['estudiante'] = $this->estudiante_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Estudiante";
    $this->load->view('template/page_header');		
    $this->load->view('estudiante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estudiante'] = $this->estudiante_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Estudiante";
  
    $this->load->view('template/page_header');		
    $this->load->view('estudiante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
	$data['estudiante'] = $this->estudiante_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Estudiante";
	$this->load->view('template/page_header');		
  $this->load->view('estudiante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estudiante_list']=$this->estudiante_model->lista_estudiante()->result();
	$data['estudiante'] = $this->estudiante_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Estudiante";
	$this->load->view('template/page_header');		
  $this->load->view('estudiante_record',$data);
	$this->load->view('template/page_footer');
}




}
