<?php

class Instructor extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('instructor_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['instructor']=$this->instructor_model->lista_instructores()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			
		$data['title']="Lista de instructors";
		$this->load->view('template/page_header');
		$this->load->view('instructor_record',$data);
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
		$data['title']="Nueva Instructor";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('instructor_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idinstructor' => $this->input->post('idinstructor'),
			'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->instructor_model->save($array_item);
	 	redirect('instructor');
 	}



public function edit()
{
	 	$data['instructor'] = $this->instructor_model->instructor($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Instructor";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('instructor_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idinstructor');
	 	$array_item=array(
		 	
		 	'idinstructor' => $this->input->post('idinstructor'),
			'idpersona' => $this->input->post('idpersona'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'fechainscripcion' => $this->input->post('fechainscripcion'),
	 	);
	 	$this->instructor_model->update($id,$array_item);
	 	redirect('instructor');
 	}


 	public function delete()
 	{
 		$data=$this->instructor_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('instructor/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Instructors";
	$this->load->view('template/page_header');		
  $this->load->view('instructor_list',$data);
	$this->load->view('template/page_footer');
}



function instructor_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->instructor_model->lista_instructorsB();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idinstructor,$r->elinstructor,$r->lacarrera,$r->fechadesde,$r->fechahasta,
				$r->href='<a href="javascript:void(0);" class="item_ver" data-doctos="'.$r->idpersona.'">'.$r->cantidad.'</a>',
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idinstructor="'.$r->idinstructor.'">Ver</a>');
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


	$data['instructor'] = $this->instructor_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Instructor";
    $this->load->view('template/page_header');		
    $this->load->view('instructor_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['instructor'] = $this->instructor_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Instructor";
  
    $this->load->view('template/page_header');		
    $this->load->view('instructor_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['instructor_list']=$this->instructor_model->lista_instructor()->result();
	$data['instructor'] = $this->instructor_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  

$data['title']="Instructor";
	$this->load->view('template/page_header');		
  $this->load->view('instructor_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['instructor_list']=$this->instructor_model->lista_instructor()->result();
	$data['instructor'] = $this->instructor_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Instructor";
	$this->load->view('template/page_header');		
  $this->load->view('instructor_record',$data);
	$this->load->view('template/page_footer');
}




}
