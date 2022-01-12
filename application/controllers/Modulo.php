<?php

class Modulo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('modulo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['modulo']=$this->modulo_model->elmodulo(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('modulo_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nuevo módulo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('modulo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idmodulo' => $this->input->post('idmodulo'),
	 	'nombre' => $this->input->post('nombre'),
	 	'modulo' => $this->input->post('modulo'),
	 	'icono' => $this->input->post('icono'),
	 	'inicial' => $this->input->post('inicial'),
	 	);
	 	$this->modulo_model->save($array_item);
	 	redirect('modulo');
 	}



public function edit()
{
	 	$data['modulo'] = $this->modulo_model->modulo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Modulo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('modulo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmodulo');
	 	$array_item=array(
		 	
		 	'idmodulo' => $this->input->post('idmodulo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->modulo_model->update($id,$array_item);
	 	redirect('modulo');
 	}



public function listar()
{
	
  $data['modulo'] = $this->modulo_model->lista_modulos()->result();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_list',$data);
	$this->load->view('template/page_footer');
}

function modulo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->modulo_model->lista_modulos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmodulo,$r->nombre,$r->inicial,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmodulo="'.$r->idmodulo.'">Ver</a>');
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
	$data['modulo'] = $this->modulo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Modulo";
    $this->load->view('template/page_header');		
    $this->load->view('modulo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['modulo'] = $this->modulo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Modulo";
  
    $this->load->view('template/page_header');		
    $this->load->view('modulo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['modulo_list']=$this->modulo_model->lista_modulo()->result();
	$data['modulo'] = $this->modulo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['modulo_list']=$this->modulo_model->lista_modulo()->result();
	$data['modulo'] = $this->modulo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Modulo";
	$this->load->view('template/page_header');		
  $this->load->view('modulo_record',$data);
	$this->load->view('template/page_footer');
}





}
