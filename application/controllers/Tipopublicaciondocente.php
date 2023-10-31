<?php

class Tipopublicaciondocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipopublicaciondocente_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipopublicaciondocente']=$this->tipopublicaciondocente_model->tipopublicaciondocente(1)->row_array();
		$data['title']="Lista de tipopublicaciondocentees";
		$this->load->view('template/page_header');
		$this->load->view('tipopublicaciondocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipopublicaciondocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipopublicaciondocente_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipopublicaciondocente' => $this->input->post('idtipopublicaciondocente'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipopublicaciondocente_model->save($array_item);
	 	redirect('tipopublicaciondocente');
 	}



public function edit()
{
	 	$data['tipopublicaciondocente'] = $this->tipopublicaciondocente_model->tipopublicaciondocente($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipopublicaciondocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipopublicaciondocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipopublicaciondocente');
	 	$array_item=array(
		 	
		 	'idtipopublicaciondocente' => $this->input->post('idtipopublicaciondocente'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipopublicaciondocente_model->update($id,$array_item);
	 	redirect('tipopublicaciondocente');
 	}


 	public function delete()
 	{
 		$data=$this->tipopublicaciondocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipopublicaciondocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipopublicaciondocente";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicaciondocente_list',$data);
	$this->load->view('template/page_footer');
}



function tipopublicaciondocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipopublicaciondocente_model->lista_tipopublicaciondocentes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipopublicaciondocente,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipopublicaciondocente="'.$r->idtipopublicaciondocente.'">Ver</a>');
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
	$data['tipopublicaciondocente'] = $this->tipopublicaciondocente_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipopublicaciondocente";
    $this->load->view('template/page_header');		
    $this->load->view('tipopublicaciondocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipopublicaciondocente'] = $this->tipopublicaciondocente_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipopublicaciondocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipopublicaciondocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipopublicaciondocente_list']=$this->tipopublicaciondocente_model->lista_tipopublicaciondocente()->result();
	$data['tipopublicaciondocente'] = $this->tipopublicaciondocente_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipopublicaciondocente";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipopublicaciondocente_list']=$this->tipopublicaciondocente_model->lista_tipopublicaciondocente()->result();
	$data['tipopublicaciondocente'] = $this->tipopublicaciondocente_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipopublicaciondocente";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}

}
