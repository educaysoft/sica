<?php

class Foto extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('foto_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['foto']=$this->foto_model->foto(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('foto_record',$data);
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
	 	$this->load->view('foto_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idfoto' => $this->input->post('idfoto'),
	 	'descripcion' => $this->input->post('descripcion'),
	 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
	 	);
	 	$this->foto_model->save($array_item);
	 	redirect('foto');
 	}



public function edit()
{
	 	$data['foto'] = $this->foto_model->foto($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Foto";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('foto_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idfoto');
	 	$array_item=array(
		 	
		 	'idfoto' => $this->input->post('idfoto'),
		 	'descripcion' => $this->input->post('descripcion'),
		 	'detalle' => $this->input->post('detalle'),
	 	'archivo' => $this->input->post('archivo'),
	 	);
	 	$this->foto_model->update($id,$array_item);
	 	redirect('foto');
 	}



public function listar()
{
	
  $data['foto'] = $this->foto_model->lista_fotoes()->result();
  $data['title']="Foto";
	$this->load->view('template/page_header');		
  $this->load->view('foto_list',$data);
	$this->load->view('template/page_footer');
}

function foto_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->foto_model->lista_fotoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idfoto,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idfoto="'.$r->idfoto.'">Ver</a>');
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
	$data['foto'] = $this->foto_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Foto";
    $this->load->view('template/page_header');		
    $this->load->view('foto_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['foto'] = $this->foto_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Foto";
  
    $this->load->view('template/page_header');		
    $this->load->view('foto_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['foto_list']=$this->foto_model->lista_foto()->result();
	$data['foto'] = $this->foto_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Foto";
	$this->load->view('template/page_header');		
  $this->load->view('foto_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['foto_list']=$this->foto_model->lista_foto()->result();
	$data['foto'] = $this->foto_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Foto";
	$this->load->view('template/page_header');		
  $this->load->view('foto_record',$data);
	$this->load->view('template/page_footer');
}





}
