<?php

class Estado_portafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estado_portafolio_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['estado_portafolio']=$this->estado_portafolio_model->estado_portafolio(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('estado_portafolio_record',$data);
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
	 	$this->load->view('estado_portafolio_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestado_portafolio' => $this->input->post('idestado_portafolio'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estado_portafolio_model->save($array_item);
	 	redirect('estado_portafolio');
 	}



public function edit()
{
	 	$data['estado_portafolio'] = $this->estado_portafolio_model->estado_portafolio($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Estado_portafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estado_portafolio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestado_portafolio');
	 	$array_item=array(
		 	
		 	'idestado_portafolio' => $this->input->post('idestado_portafolio'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estado_portafolio_model->update($id,$array_item);
	 	redirect('estado_portafolio');
 	}



public function listar()
{
	
  $data['estado_portafolio'] = $this->estado_portafolio_model->lista_estado_portafolioes()->result();
  $data['title']="Estado_portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('estado_portafolio_list',$data);
	$this->load->view('template/page_footer');
}

function estado_portafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estado_portafolio_model->lista_estado_portafolioes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestado_portafolio,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestado_portafolio="'.$r->idestado_portafolio.'">Ver</a>');
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
	$data['estado_portafolio'] = $this->estado_portafolio_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estado_portafolio";
    $this->load->view('template/page_header');		
    $this->load->view('estado_portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estado_portafolio'] = $this->estado_portafolio_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estado_portafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('estado_portafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estado_portafolio_list']=$this->estado_portafolio_model->lista_estado_portafolio()->result();
	$data['estado_portafolio'] = $this->estado_portafolio_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estado_portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('estado_portafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estado_portafolio_list']=$this->estado_portafolio_model->lista_estado_portafolio()->result();
	$data['estado_portafolio'] = $this->estado_portafolio_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estado_portafolio";
	$this->load->view('template/page_header');		
  $this->load->view('estado_portafolio_record',$data);
	$this->load->view('template/page_footer');
}





}
