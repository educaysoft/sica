<?php

class Fotoevidencia extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('fotoevidencia_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['fotoevidencia']=$this->fotoevidencia_model->elultimo();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('fotoevidencia_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('fotoevidencia_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idfotoevidencia' => $this->input->post('idfotoevidencia'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
		 	'fechatomada' => $this->input->post('fechatomada'),
	 	);
	 	$this->fotoevidencia_model->save($array_item);
	 	redirect('fotoevidencia');
 	}



public function edit()
{
	 	$data['fotoevidencia'] = $this->fotoevidencia_model->fotoevidencia($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Fotoevidencia";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('fotoevidencia_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idfotoevidencia');
	 	$array_item=array(
		 	
		 	'idfotoevidencia' => $this->input->post('idfotoevidencia'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
		 	'fechatomada' => $this->input->post('fechatomada'),
	 	);
	 	$this->fotoevidencia_model->update($id,$array_item);
	 	redirect('fotoevidencia');
 	}



public function listar()
{
	
  $data['title']="Fotoevidencia";
	$this->load->view('template/page_header');		
  $this->load->view('fotoevidencia_list',$data);
	$this->load->view('template/page_footer');
}

function fotoevidencia_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->fotoevidencia_model->lista_fotoevidencias();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idfotoevidencia,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('fotoevidencia/actual').'"  data-idfotoevidencia="'.$r->idfotoevidencia.'">Ver</a>');
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
	$data['fotoevidencia'] = $this->fotoevidencia_model->fotoevidencia($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Fotoevidencia";
    $this->load->view('template/page_header');		
    $this->load->view('fotoevidencia_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['fotoevidencia'] = $this->fotoevidencia_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Fotoevidencia";
    $this->load->view('template/page_header');		
    $this->load->view('fotoevidencia_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['fotoevidencia'] = $this->fotoevidencia_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Fotoevidencia";
  
    $this->load->view('template/page_header');		
    $this->load->view('fotoevidencia_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['fotoevidencia_list']=$this->fotoevidencia_model->lista_fotoevidencia()->result();
	$data['fotoevidencia'] = $this->fotoevidencia_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Fotoevidencia";
	$this->load->view('template/page_header');		
  $this->load->view('fotoevidencia_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['fotoevidencia_list']=$this->fotoevidencia_model->lista_fotoevidencia()->result();
	$data['fotoevidencia'] = $this->fotoevidencia_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Fotoevidencia";
	$this->load->view('template/page_header');		
  $this->load->view('fotoevidencia_record',$data);
	$this->load->view('template/page_footer');
}




	public function fotoevidencia_1()
	{
	  $this->load->view('fotoevidencias/fotoevidencia-1');
	}





}
