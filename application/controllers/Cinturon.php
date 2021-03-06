<?php

class Cinturon extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('cinturon_model');
  		$this->load->model('articulo_model');
  	  $this->load->model('institucion_model');
}

public function index(){

  	$data['cinturon']=$this->cinturon_model->cinturon(1)->row_array();
  	$data['articulos']= $this->articulo_model->lista_articuloes()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Cinturones";
	$this->load->view('template/page_header');		
 	 $this->load->view('cinturon_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['articulos']= $this->articulo_model->lista_articuloes()->result();
		$data['title']="Nueva Cinturon";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cinturon_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcinturon' => $this->input->post('idcinturon'),
		 	'color' => $this->input->post('color'),
			'idarticulo' => $this->input->post('idarticulo'),
	 	);
	 	$this->cinturon_model->save($array_item);
	 	redirect('cinturon');
 	}



public function edit()
{
	 	$data['cinturon'] = $this->cinturon_model->cinturon($this->uri->segment(3))->row_array();
		$data['articulos']= $this->articulo_model->lista_articuloes()->result();
 	 	$data['title'] = "Actualizar Cinturon";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cinturon_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcinturon');
	 	$array_item=array(
		 	
		 	'idcinturon' => $this->input->post('idcinturon'),
		 	'color' => $this->input->post('color'),
			'idarticulo' => $this->input->post('idarticulo'),
	 	);
	 	$this->cinturon_model->update($id,$array_item);
	 	redirect('cinturon');
 	}

public function listar()
{
	
  $data['cinturon'] = $this->cinturon_model->lista_cinturonesA()->result();
  $data['title']="Cinturon";
	$this->load->view('template/page_header');		
  $this->load->view('cinturon_list',$data);
	$this->load->view('template/page_footer');
}

function cinturon_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cinturon_model->lista_cinturonesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcinturon,$r->elarticulo,$r->color,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcinturon="'.$r->idcinturon.'">Ver</a>');
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
	$data['cinturon'] = $this->cinturon_model->elprimero();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  if(!empty($data))
  {
    $data['title']="Cinturon";
    $this->load->view('template/page_header');		
    $this->load->view('cinturon_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cinturon'] = $this->cinturon_model->elultimo();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  if(!empty($data))
  {
    $data['title']="Cinturon";
  
    $this->load->view('template/page_header');		
    $this->load->view('cinturon_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cinturon_list']=$this->cinturon_model->lista_cinturon()->result();
	$data['cinturon'] = $this->cinturon_model->siguiente($this->uri->segment(3))->row_array();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  	$data['title']="Cinturon";
	$this->load->view('template/page_header');		
  	$this->load->view('cinturon_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cinturon_list']=$this->cinturon_model->lista_cinturon()->result();
	$data['cinturon'] = $this->cinturon_model->anterior($this->uri->segment(3))->row_array();
  	$data['articuloes']= $this->articulo_model->lista_articuloes()->result();
  	$data['title']="Cinturon";
	$this->load->view('template/page_header');		
  	$this->load->view('cinturon_record',$data);
	$this->load->view('template/page_footer');
}








}
