<?php

class Portafolioestado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('portafolioestado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['portafolioestado']=$this->portafolioestado_model->portafolioestado(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('portafolioestado_record',$data);
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
	 	$this->load->view('portafolioestado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idportafolioestado' => $this->input->post('idportafolioestado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafolioestado_model->save($array_item);
	 	redirect('portafolioestado');
 	}



public function edit()
{
	 	$data['portafolioestado'] = $this->portafolioestado_model->portafolioestado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Portafolioestado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafolioestado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafolioestado');
	 	$array_item=array(
		 	
		 	'idportafolioestado' => $this->input->post('idportafolioestado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->portafolioestado_model->update($id,$array_item);
	 	redirect('portafolioestado');
 	}



public function listar()
{
	
  $data['portafolioestado'] = $this->portafolioestado_model->lista_portafolioestadoes()->result();
  $data['title']="Portafolioestado";
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestado_list',$data);
	$this->load->view('template/page_footer');
}

function portafolioestado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->portafolioestado_model->lista_portafolioestadoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafolioestado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idportafolioestado="'.$r->idportafolioestado.'">Ver</a>');
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
	$data['portafolioestado'] = $this->portafolioestado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Portafolioestado";
    $this->load->view('template/page_header');		
    $this->load->view('portafolioestado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafolioestado'] = $this->portafolioestado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Portafolioestado";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafolioestado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafolioestado_list']=$this->portafolioestado_model->lista_portafolioestado()->result();
	$data['portafolioestado'] = $this->portafolioestado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Portafolioestado";
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafolioestado_list']=$this->portafolioestado_model->lista_portafolioestado()->result();
	$data['portafolioestado'] = $this->portafolioestado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Portafolioestado";
	$this->load->view('template/page_header');		
  $this->load->view('portafolioestado_record',$data);
	$this->load->view('template/page_footer');
}





}
