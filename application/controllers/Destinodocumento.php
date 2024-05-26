<?php

class Destinodocumento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('destinodocumento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['destinodocumento']=$this->destinodocumento_model->destinodocumento(1)->row_array();
		$data['title']="Lista de destinodocumentoes";
		$this->load->view('template/page_header');
		$this->load->view('destinodocumento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva destinodocumento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('destinodocumento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'iddestinodocumento' => $this->input->post('iddestinodocumento'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->destinodocumento_model->save($array_item);
	 	redirect('destinodocumento');
 	}



public function edit()
{
	 	$data['destinodocumento'] = $this->destinodocumento_model->destinodocumento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar destinodocumento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('destinodocumento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddestinodocumento');
	 	$array_item=array(
		 	
		 	'iddestinodocumento' => $this->input->post('iddestinodocumento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->destinodocumento_model->update($id,$array_item);
	 	redirect('destinodocumento');
 	}


// 	public function delete()
 //	{
 //		$data=$this->destinodocumento_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
//	 	redirect('destinodocumento/elprimero');
 //	}


public function listar()
{
	
  $data['title']="Destinodocumento";
	$this->load->view('template/page_header');		
  $this->load->view('destinodocumento_list',$data);
	$this->load->view('template/page_footer');
}



function destinodocumento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->destinodocumento_model->lista_destinodocumentos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddestinodocumento,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('destinodocumento/actual').'" data-iddestinodocumento="'.$r->iddestinodocumento.'">Ver</a>');
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
	$data['destinodocumento'] = $this->destinodocumento_model->destinodocumento($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Destinodocumento";
    		$this->load->view('template/page_header');		
    		$this->load->view('destinodocumento_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
	$data['destinodocumento'] = $this->destinodocumento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Destinodocumento";
    $this->load->view('template/page_header');		
    $this->load->view('destinodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['destinodocumento'] = $this->destinodocumento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Destinodocumento";
  
    $this->load->view('template/page_header');		
    $this->load->view('destinodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['destinodocumento_list']=$this->destinodocumento_model->lista_destinodocumento()->result();
	$data['destinodocumento'] = $this->destinodocumento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Destinodocumento";
	$this->load->view('template/page_header');		
  $this->load->view('destinodocumento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['destinodocumento_list']=$this->destinodocumento_model->lista_destinodocumento()->result();
	$data['destinodocumento'] = $this->destinodocumento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Destinodocumento";
	$this->load->view('template/page_header');		
  $this->load->view('destinodocumento_record',$data);
	$this->load->view('template/page_footer');
}

}
