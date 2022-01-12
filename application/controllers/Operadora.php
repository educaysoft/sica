<?php

class Operadora extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('operadora_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['operadora']=$this->operadora_model->operadora(1)->row_array();
  		$data['title']="Lista de Operadoras";
			$this->load->view('template/page_header');		
  		$this->load->view('operadora_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva Operadora";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('operadora_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idoperadora' => $this->input->post('idoperadora'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->operadora_model->save($array_item);
	 	redirect('operadora');
 	}



public function edit()
{
	 	$data['operadora'] = $this->operadora_model->operadora($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Operadora";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('operadora_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idoperadora');
	 	$array_item=array(
		 	
		 	'idoperadora' => $this->input->post('idoperadora'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->operadora_model->update($id,$array_item);
	 	redirect('operadora');
 	}



public function listar()
{
	
  $data['operadora'] = $this->operadora_model->lista_operadoraes()->result();
  $data['title']="Operadora";
	$this->load->view('template/page_header');		
  $this->load->view('operadora_list',$data);
	$this->load->view('template/page_footer');
}

function operadora_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->operadora_model->lista_operadoraes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idoperadora,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idoperadora="'.$r->idoperadora.'">Ver</a>');
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
	$data['operadora'] = $this->operadora_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Operadora";
    $this->load->view('template/page_header');		
    $this->load->view('operadora_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['operadora'] = $this->operadora_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Operadora";
  
    $this->load->view('template/page_header');		
    $this->load->view('operadora_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['operadora_list']=$this->operadora_model->lista_operadora()->result();
	$data['operadora'] = $this->operadora_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Operadora";
	$this->load->view('template/page_header');		
  $this->load->view('operadora_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['operadora_list']=$this->operadora_model->lista_operadora()->result();
	$data['operadora'] = $this->operadora_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Operadora";
	$this->load->view('template/page_header');		
  $this->load->view('operadora_record',$data);
	$this->load->view('template/page_footer');
}





}
