<?php

class Indicadoracademico extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('indicadoracademico_model');
      $this->load->model('distributivo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['indicadoracademico']=$this->indicadoracademico_model->indicadoracademico(1)->row_array();
		$data['title']="Lista de indicadoracademicoes";
		$this->load->view('template/page_header');
		$this->load->view('indicadoracademico_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva indicadoracademico";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('indicadoracademico_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idindicadoracademico' => $this->input->post('idindicadoracademico'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->indicadoracademico_model->save($array_item);
	 	redirect('indicadoracademico');
 	}



public function edit()
{
	 	$data['indicadoracademico'] = $this->indicadoracademico_model->indicadoracademico($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar indicadoracademico";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('indicadoracademico_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idindicadoracademico');
	 	$array_item=array(
		 	
		 	'idindicadoracademico' => $this->input->post('idindicadoracademico'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->indicadoracademico_model->update($id,$array_item);
	 	redirect('indicadoracademico');
 	}


 	public function delete()
 	{
 		$data=$this->indicadoracademico_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('indicadoracademico/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Indicadoracademico";
	$this->load->view('template/page_header');		
  $this->load->view('indicadoracademico_list',$data);
	$this->load->view('template/page_footer');
}



function indicadoracademico_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->indicadoracademico_model->lista_indicadoracademicos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idindicadoracademico,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idindicadoracademico="'.$r->idindicadoracademico.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}





	public function indicador1pdf()
	{
		$iddistributivo=$this->uri->segment(3);
		$data['docentes']=$this->indicadoracademico_model->indicador1($iddistributivo)->result();
		$data['distributivo'] =$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('indicadoracademico_pdf1',$data);
	}








public function elprimero()
{
	$data['indicadoracademico'] = $this->indicadoracademico_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Indicadoracademico";
    $this->load->view('template/page_header');		
    $this->load->view('indicadoracademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['indicadoracademico'] = $this->indicadoracademico_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Indicadoracademico";
  
    $this->load->view('template/page_header');		
    $this->load->view('indicadoracademico_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['indicadoracademico_list']=$this->indicadoracademico_model->lista_indicadoracademico()->result();
	$data['indicadoracademico'] = $this->indicadoracademico_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Indicadoracademico";
	$this->load->view('template/page_header');		
  $this->load->view('indicadoracademico_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['indicadoracademico_list']=$this->indicadoracademico_model->lista_indicadoracademico()->result();
	$data['indicadoracademico'] = $this->indicadoracademico_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Indicadoracademico";
	$this->load->view('template/page_header');		
  $this->load->view('indicadoracademico_record',$data);
	$this->load->view('template/page_footer');
}

}
