<?php

class Departamento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      	$this->load->model('departamento_model');
  	$this->load->model('unidad_model');
  	$this->load->model('unidad_model');
}

public function index(){
  $data['departamento']=$this->departamento_model->departamento(1)->row_array(); 
  $data['unidades']= $this->unidad_model->lista_unidades()->result();
 // print_r($data['usuario_list']);
  $data['title']="Lista de Departamentos";
	$this->load->view('template/page_header');		
    $this->load->view('departamento_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
	$data['unidades']= $this->unidad_model->lista_unidades()->result();
	$data['title']="Nuevo Departamento";
 	$this->load->view('template/page_header');		
 	$this->load->view('departamento_form',$data);
 	$this->load->view('template/page_footer');
}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idunidad' => $this->input->post('idunidad'),
		 	'nombre' => $this->input->post('nombre'),
			
	 	);
	 	$this->departamento_model->save($array_item);
	 	redirect('departamento');
 	}



public function edit()
{
	 	$data['departamento'] = $this->departamento_model->departamento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('departamento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamento');
	 	$array_item=array(
		 	
		 	'iddepartamento' => $this->input->post('iddepartamento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->departamento_model->update($id,$array_item);
	 	redirect('departamento');
 	}





public function listar()
{
  $data['departamento_list'] = $this->departamento_model->lista_departamentoB()->result();
  $data['title']="Departamento";
	$this->load->view('template/page_header');		
  $this->load->view('departamento_list',$data);
	$this->load->view('template/page_footer');
}

function unidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->unidad_model->lista_unidadesB();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddepartamento,$r->launidad,$r->nombre,$r->cantidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idunidad="'.$r->idunidad.'">Ver</a>');
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
  $data['departamento']=$this->departamento_model->departamento(1)->row_array(); 
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  if(!empty($data))
  {
    $data['title']="Departamento";
    $this->load->view('template/page_header');		
    $this->load->view('departamento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['departamento']=$this->departamento_model->departamento(1)->row_array(); 
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  if(!empty($data))
  {
    $data['title']="Departamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('departamento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['unidad_list']=$this->unidad_model->lista_unidad()->result();
$data['departamento'] = $this->departamento_model->siguiente($this->uri->segment(3))->row_array();
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['title']="Departamento";
	$this->load->view('template/page_header');		
  $this->load->view('departamento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['unidad_list']=$this->unidad_model->lista_unidad()->result();
	$data['departamento'] = $this->departamento_model->anterior($this->uri->segment(3))->row_array();
  	$data['unidades']= $this->unidad_model->lista_unidades()->result();
  $data['title']="Departamento";
	$this->load->view('template/page_header');		
  $this->load->view('departamento_record',$data);
	$this->load->view('template/page_footer');
}










}
