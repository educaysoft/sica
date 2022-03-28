<?php

class Pagina extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('pagina_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['pagina']=$this->pagina_model->elultimo();
		$data['title']="Lista de paginaes";
		$this->load->view('template/page_header');
		$this->load->view('pagina_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva pagina";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pagina_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'ruta' => $this->input->post('ruta'),
	 	);
	 	$this->pagina_model->save($array_item);
	 	redirect('pagina');
 	}



public function edit()
{
	 	$data['pagina'] = $this->pagina_model->pagina($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar pagina";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('pagina_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpagina');
	 	$array_item=array(
		 	
		 	'idpagina' => $this->input->post('idpagina'),
		 	'nombre' => $this->input->post('nombre'),
		 	'ruta' => $this->input->post('ruta'),
	 	);
	 	$this->pagina_model->update($id,$array_item);
	 	redirect('pagina');
 	}


 	public function delete()
 	{
 		$data=$this->pagina_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('pagina/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Pagina";
	$this->load->view('template/page_header');		
  $this->load->view('pagina_list',$data);
	$this->load->view('template/page_footer');
}



function pagina_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->pagina_model->lista_paginaes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpagina,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idpagina="'.$r->idpagina.'">Ver</a>');
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
	$data['pagina'] = $this->pagina_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Pagina";
    $this->load->view('template/page_header');		
    $this->load->view('pagina_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['pagina'] = $this->pagina_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Pagina";
  
    $this->load->view('template/page_header');		
    $this->load->view('pagina_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pagina_list']=$this->pagina_model->lista_pagina()->result();
	$data['pagina'] = $this->pagina_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Pagina";
	$this->load->view('template/page_header');		
  $this->load->view('pagina_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pagina_list']=$this->pagina_model->lista_pagina()->result();
	$data['pagina'] = $this->pagina_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Pagina";
	$this->load->view('template/page_header');		
  $this->load->view('pagina_record',$data);
	$this->load->view('template/page_footer');
}

}
