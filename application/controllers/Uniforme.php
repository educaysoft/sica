<?php

class Uniforme extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('uniforme_model');
  		$this->load->model('articulo_model');
  	  $this->load->model('institucion_model');
}

public function index(){

  	$data['uniforme']=$this->uniforme_model->uniforme(1)->row_array();
  	$data['articulos']= $this->articulo_model->lista_articuloes()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Uniformees";
	$this->load->view('template/page_header');		
 	 $this->load->view('uniforme_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['articulos']= $this->articulo_model->lista_articuloes()->result();
		$data['title']="Nueva Uniforme";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('uniforme_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iduniforme' => $this->input->post('iduniforme'),
		 	'color' => $this->input->post('color'),
			'idarticulo' => $this->input->post('idarticulo'),
	 	);
	 	$this->uniforme_model->save($array_item);
	 	redirect('uniforme');
 	}



public function edit()
{
	 	$data['uniforme'] = $this->uniforme_model->uniforme($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articuloes()->result();
 	 	$data['title'] = "Actualizar Uniforme";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('uniforme_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iduniforme');
	 	$array_item=array(
		 	
		 	'iduniforme' => $this->input->post('iduniforme'),
		 	'color' => $this->input->post('color'),
			'idarticulo' => $this->input->post('idarticulo'),
	 	);
	 	$this->uniforme_model->update($id,$array_item);
	 	redirect('uniforme');
 	}

public function listar()
{
	
  $data['uniforme'] = $this->uniforme_model->lista_uniformeesA()->result();
  $data['title']="Uniforme";
	$this->load->view('template/page_header');		
  $this->load->view('uniforme_list',$data);
	$this->load->view('template/page_footer');
}

function uniforme_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->uniforme_model->lista_uniformeesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iduniforme,$r->elarticulo,$r->color,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-iduniforme="'.$r->iduniforme.'">Ver</a>');
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
	$data['uniforme'] = $this->uniforme_model->elprimero();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  if(!empty($data))
  {
    $data['title']="Uniforme";
    $this->load->view('template/page_header');		
    $this->load->view('uniforme_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['uniforme'] = $this->uniforme_model->elultimo();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  if(!empty($data))
  {
    $data['title']="Uniforme";
  
    $this->load->view('template/page_header');		
    $this->load->view('uniforme_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['uniforme_list']=$this->uniforme_model->lista_uniforme()->result();
	$data['uniforme'] = $this->uniforme_model->siguiente($this->uri->segment(3))->row_array();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  	$data['title']="Uniforme";
	$this->load->view('template/page_header');		
  	$this->load->view('uniforme_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['uniforme_list']=$this->uniforme_model->lista_uniforme()->result();
	$data['uniforme'] = $this->uniforme_model->anterior($this->uri->segment(3))->row_array();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  	$data['title']="Uniforme";
	$this->load->view('template/page_header');		
  	$this->load->view('uniforme_record',$data);
	$this->load->view('template/page_footer');
}








}
