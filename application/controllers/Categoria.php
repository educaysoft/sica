<?php

class Categoria extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('categoria_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['categoria']=$this->categoria_model->categoria(1)->row_array();
  		$data['title']="Lista de Empresas";
			$this->load->view('template/page_header');		
  		$this->load->view('categoria_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva Institución";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('categoria_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcategoria' => $this->input->post('idcategoria'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->categoria_model->save($array_item);
	 	redirect('categoria');
 	}



public function edit()
{
	 	$data['categoria'] = $this->categoria_model->categoria($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Categoria";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('categoria_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcategoria');
	 	$array_item=array(
		 	
		 	'idcategoria' => $this->input->post('idcategoria'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->categoria_model->update($id,$array_item);
	 	redirect('categoria');
 	}



public function listar()
{
	
  $data['categoria'] = $this->categoria_model->lista_categoriaes()->result();
  $data['title']="Categoria";
	$this->load->view('template/page_header');		
  $this->load->view('categoria_list',$data);
	$this->load->view('template/page_footer');
}

function categoria_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->categoria_model->lista_categoriaes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcategoria,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcategoria="'.$r->idcategoria.'">Ver</a>');
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
	$data['categoria'] = $this->categoria_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Categoria";
    $this->load->view('template/page_header');		
    $this->load->view('categoria_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['categoria'] = $this->categoria_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Categoria";
  
    $this->load->view('template/page_header');		
    $this->load->view('categoria_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['categoria_list']=$this->categoria_model->lista_categoria()->result();
	$data['categoria'] = $this->categoria_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Categoria";
	$this->load->view('template/page_header');		
  $this->load->view('categoria_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['categoria_list']=$this->categoria_model->lista_categoria()->result();
	$data['categoria'] = $this->categoria_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Categoria";
	$this->load->view('template/page_header');		
  $this->load->view('categoria_record',$data);
	$this->load->view('template/page_footer');
}





}
