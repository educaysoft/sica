<?php

class Genero extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('genero_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['genero']=$this->genero_model->genero(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('genero_record',$data);
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
	 	$this->load->view('genero_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idgenero' => $this->input->post('idgenero'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->genero_model->save($array_item);
	 	redirect('genero');
 	}



public function edit()
{
	 	$data['genero'] = $this->genero_model->genero($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Genero";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('genero_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idgenero');
	 	$array_item=array(
		 	
		 	'idgenero' => $this->input->post('idgenero'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->genero_model->update($id,$array_item);
	 	redirect('genero');
 	}



public function listar()
{
	
  $data['genero'] = $this->genero_model->lista_generoes()->result();
  $data['title']="Genero";
	$this->load->view('template/page_header');		
  $this->load->view('genero_list',$data);
	$this->load->view('template/page_footer');
}

function genero_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->genero_model->lista_generoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idgenero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idgenero="'.$r->idgenero.'">Ver</a>');
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
	$data['genero'] = $this->genero_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Genero";
    $this->load->view('template/page_header');		
    $this->load->view('genero_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['genero'] = $this->genero_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Genero";
  
    $this->load->view('template/page_header');		
    $this->load->view('genero_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['genero_list']=$this->genero_model->lista_genero()->result();
	$data['genero'] = $this->genero_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Genero";
	$this->load->view('template/page_header');		
  $this->load->view('genero_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['genero_list']=$this->genero_model->lista_genero()->result();
	$data['genero'] = $this->genero_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Genero";
	$this->load->view('template/page_header');		
  $this->load->view('genero_record',$data);
	$this->load->view('template/page_footer');
}





}
