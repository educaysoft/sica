<?php

class Unidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('unidad_model');
  	$this->load->model('institucion_model');
}

public function index(){

  	$data['unidad']=$this->unidad_model->unidad(1)->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Unidades";
	$this->load->view('template/page_header');		
 	 $this->load->view('unidad_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nueva Unidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('unidad_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'nombre' => $this->input->post('nombre'),
			'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->unidad_model->save($array_item);
	 	redirect('unidad');
 	}



public function edit()
{
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	 	$data['unidad'] = $this->unidad_model->unidad($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Unidad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('unidad_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$idunidad=$this->input->post('idunidad');
	 	$array_item=array(
		 	
		 	'nombre' => $this->input->post('nombre'),
			'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->unidad_model->update($id,$array_item);
	 	redirect('');
 	}

public function listar()
{
  $data['unidad'] = $this->unidad_model->lista_unidadesA()->result();
  $data['title']="Unidad";
	$this->load->view('template/page_header');		
  $this->load->view('unidad_list',$data);
	$this->load->view('template/page_footer');
}

function unidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->unidad_model->lista_unidadesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idunidad,$r->lainstitucion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-id="'.$r->idunidad.'">Ver</a>');
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
	$data['unidad'] = $this->unidad_model->elprimero();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Unidad";
    $this->load->view('template/page_header');		
    $this->load->view('unidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['unidad'] = $this->unidad_model->elultimo();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Unidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('unidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['unidad_list']=$this->unidad_model->lista_unidad()->result();
	$data['unidad'] = $this->unidad_model->siguiente($this->uri->segment(3))->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Unidad";
	$this->load->view('template/page_header');		
  $this->load->view('unidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['unidad_list']=$this->unidad_model->lista_unidad()->result();
	$data['unidad'] = $this->unidad_model->anterior($this->uri->segment(3))->row_array();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Unidad";
	$this->load->view('template/page_header');		
  $this->load->view('unidad_record',$data);
	$this->load->view('template/page_footer');
}








}
