<?php

class Portafoliomodelo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('portafoliomodelo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['portafoliomodelo']=$this->portafoliomodelo_model->portafoliomodelo(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('portafoliomodelo_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva Institución";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafoliomodelo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafoliomodelo_model->save($array_item);
	 	redirect('portafoliomodelo');
 	}



public function edit()
{
	 	$data['portafoliomodelo'] = $this->portafoliomodelo_model->portafoliomodelo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Portafoliomodelo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafoliomodelo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafoliomodelo');
	 	$array_item=array(
		 	
		 	'idportafoliomodelo' => $this->input->post('idportafoliomodelo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafoliomodelo_model->update($id,$array_item);
	 	redirect('portafoliomodelo');
 	}



public function listar()
{
	
  $data['portafoliomodelo'] = $this->portafoliomodelo_model->lista_portafoliomodeloes()->result();
  $data['title']="Portafoliomodelo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliomodelo_list',$data);
	$this->load->view('template/page_footer');
}

function portafoliomodelo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->portafoliomodelo_model->lista_portafoliomodeloes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafoliomodelo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idportafoliomodelo="'.$r->idportafoliomodelo.'">Ver</a>');
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
	$data['portafoliomodelo'] = $this->portafoliomodelo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Portafoliomodelo";
    $this->load->view('template/page_header');		
    $this->load->view('portafoliomodelo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafoliomodelo'] = $this->portafoliomodelo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Portafoliomodelo";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafoliomodelo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafoliomodelo_list']=$this->portafoliomodelo_model->lista_portafoliomodelo()->result();
	$data['portafoliomodelo'] = $this->portafoliomodelo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Portafoliomodelo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliomodelo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafoliomodelo_list']=$this->portafoliomodelo_model->lista_portafoliomodelo()->result();
	$data['portafoliomodelo'] = $this->portafoliomodelo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Portafoliomodelo";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliomodelo_record',$data);
	$this->load->view('template/page_footer');
}





}
