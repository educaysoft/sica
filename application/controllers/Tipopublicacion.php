<?php

class Tipopublicacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipopublicacion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipopublicacion']=$this->tipopublicacion_model->tipopublicacion(1)->row_array();
		$data['title']="Lista de tipopublicaciones";
		$this->load->view('template/page_header');
		$this->load->view('tipopublicacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipopublicacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipopublicacion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtipopublicacion' => $this->input->post('idtipopublicacion'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipopublicacion_model->save($array_item);
	 	redirect('tipopublicacion');
 	}



public function edit()
{
	 	$data['tipopublicacion'] = $this->tipopublicacion_model->tipopublicacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipopublicacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipopublicacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipopublicacion');
	 	$array_item=array(
		 	
		 	'idtipopublicacion' => $this->input->post('idtipopublicacion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipopublicacion_model->update($id,$array_item);
	 	redirect('tipopublicacion');
 	}


 	public function delete()
 	{
 		$data=$this->tipopublicacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipopublicacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tipopublicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicacion_list',$data);
	$this->load->view('template/page_footer');
}



function tipopublicacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipopublicacion_model->lista_tipopublicacions();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipopublicacion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipopublicacion="'.$r->idtipopublicacion.'">Ver</a>');
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
	$data['tipopublicacion'] = $this->tipopublicacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipopublicacion";
    $this->load->view('template/page_header');		
    $this->load->view('tipopublicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipopublicacion'] = $this->tipopublicacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipopublicacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipopublicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipopublicacion_list']=$this->tipopublicacion_model->lista_tipopublicacion()->result();
	$data['tipopublicacion'] = $this->tipopublicacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipopublicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipopublicacion_list']=$this->tipopublicacion_model->lista_tipopublicacion()->result();
	$data['tipopublicacion'] = $this->tipopublicacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipopublicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipopublicacion_record',$data);
	$this->load->view('template/page_footer');
}

}
