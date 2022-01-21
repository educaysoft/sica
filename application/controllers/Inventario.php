<?php

class Inventario extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('inventario_model');
  	$this->load->model('institucion_model');
}

public function index(){

  	$data['inventario']=$this->inventario_model->inventario(1)->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Inventarioes";
	$this->load->view('template/page_header');		
 	 $this->load->view('inventario_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nueva Inventario";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('inventario_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idinventario' => $this->input->post('idinventario'),
		 	'nombre' => $this->input->post('nombre'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'fechaelaboracion' => $this->input->post('fechaelaboracion'),
	 	);
	 	$this->inventario_model->save($array_item);
	 	redirect('inventario');
 	}



public function edit()
{
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	 	$data['inventario'] = $this->inventario_model->inventario($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Inventario";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('inventario_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idinventario');
	 	$array_item=array(
		 	
		 	'idinventario' => $this->input->post('idinventario'),
		 	'nombre' => $this->input->post('nombre'),
			'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->inventario_model->update($id,$array_item);
	 	redirect('inventario');
 	}

public function listar()
{
  $data['inventario'] = $this->inventario_model->lista_inventarioesA()->result();
  $data['title']="Inventario";
	$this->load->view('template/page_header');		
  $this->load->view('inventario_list',$data);
	$this->load->view('template/page_footer');
}

function inventario_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->inventario_model->lista_inventarioesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idinventario,$r->lainstitucion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idinventario="'.$r->idinventario.'">Ver</a>');
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
	$data['inventario'] = $this->inventario_model->elprimero();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Inventario";
    $this->load->view('template/page_header');		
    $this->load->view('inventario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['inventario'] = $this->inventario_model->elultimo();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Inventario";
  
    $this->load->view('template/page_header');		
    $this->load->view('inventario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['inventario_list']=$this->inventario_model->lista_inventario()->result();
	$data['inventario'] = $this->inventario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Inventario";
	$this->load->view('template/page_header');		
  $this->load->view('inventario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['inventario_list']=$this->inventario_model->lista_inventario()->result();
	$data['inventario'] = $this->inventario_model->anterior($this->uri->segment(3))->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Inventario";
	$this->load->view('template/page_header');		
  $this->load->view('inventario_record',$data);
	$this->load->view('template/page_footer');
}








}
