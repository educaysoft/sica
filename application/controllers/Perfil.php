<?php

class Perfil extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('perfil_model');
}

public function index(){
  $data['perfil']=$this->perfil_model->perfil(1)->row_array();

 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Perfiles";
	$this->load->view('template/page_header');		
  	$this->load->view('perfil_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nuevo Perfil";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('perfil_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idperfil' => $this->input->post('idpefil'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->perfil_model->save($array_item);
	 	redirect('perfil');
 	}



public function edit()
{
	 	$data['perfil'] = $this->perfil_model->perfil($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('perfil_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idperfil');
	 	$array_item=array(
		 	
		 	'idperfil' => $this->input->post('idpefil'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->perfil_model->update($id,$array_item);
	 	redirect('perfil');
 	}


public function listar()
{
	
  $data['perfil_list'] = $this->perfil_model->lista_perfiles()->result();
  $data['title']="Perfil";
	$this->load->view('template/page_header');		
  $this->load->view('perfil_list',$data);
	$this->load->view('template/page_footer');
}

function perfil_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->perfil_model->lista_perfiles();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idperfil,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idperfil="'.$r->idperfil.'">Ver</a>');
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
	$data['perfil'] = $this->perfil_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Perfil";
    $this->load->view('template/page_header');		
    $this->load->view('perfil_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['perfil'] = $this->perfil_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Perfil";
  
    $this->load->view('template/page_header');		
    $this->load->view('perfil_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['perfil_list']=$this->perfil_model->lista_perfil()->result();
	$data['perfil'] = $this->perfil_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Perfil";
	$this->load->view('template/page_header');		
  $this->load->view('perfil_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['perfil_list']=$this->perfil_model->lista_perfil()->result();
	$data['perfil'] = $this->perfil_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Perfil";
	$this->load->view('template/page_header');		
  $this->load->view('perfil_record',$data);
	$this->load->view('template/page_footer');
}













}
