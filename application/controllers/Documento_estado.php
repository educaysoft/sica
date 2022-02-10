<?php

class Documento_estado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('documento_estado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['documento_estado']=$this->documento_estado_model->documento_estado(1)->row_array();
		$data['title']="Lista de documento_estadoes";
		$this->load->view('template/page_header');
		$this->load->view('documento_estado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva documento_estado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documento_estado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'iddocumento_estado' => $this->input->post('iddocumento_estado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->documento_estado_model->save($array_item);
	 	redirect('documento_estado');
 	}



public function edit()
{
	 	$data['documento_estado'] = $this->documento_estado_model->documento_estado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar documento_estado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documento_estado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumento_estado');
	 	$array_item=array(
		 	
		 	'iddocumento_estado' => $this->input->post('iddocumento_estado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->documento_estado_model->update($id,$array_item);
	 	redirect('documento_estado');
 	}


 	public function delete()
 	{
 		$data=$this->documento_estado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documento_estado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Documento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('documento_estado_list',$data);
	$this->load->view('template/page_footer');
}



function documento_estado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documento_estado_model->lista_documento_estadoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumento_estado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iddocumento_estado="'.$r->iddocumento_estado.'">Ver</a>');
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
	$data['documento_estado'] = $this->documento_estado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Documento_estado";
    $this->load->view('template/page_header');		
    $this->load->view('documento_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['documento_estado'] = $this->documento_estado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Documento_estado";
  
    $this->load->view('template/page_header');		
    $this->load->view('documento_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['documento_estado_list']=$this->documento_estado_model->lista_documento_estado()->result();
	$data['documento_estado'] = $this->documento_estado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Documento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('documento_estado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['documento_estado_list']=$this->documento_estado_model->lista_documento_estado()->result();
	$data['documento_estado'] = $this->documento_estado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Documento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('documento_estado_record',$data);
	$this->load->view('template/page_footer');
}

}
