<?php

class Nivelacceso extends CI_Controller{

  public function __construct(){
      parent::__construct();
   	$this->load->model('usuario_model');
      $this->load->model('nivelacceso_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	$data['nivelacceso'] = $this->nivelacceso_model->elultimo();
	//  	$data['nivelacceso']=$this->nivelacceso_model->nivelacceso(1)->row_array();
  		$data['title']="Niveles de acceso";
			$this->load->view('template/page_header');		
  		$this->load->view('nivelacceso_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nuevo Nivel de Acceso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('nivelacceso_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idnivelacceso' => $this->input->post('idnivelacceso'),
	 	'nombre' => $this->input->post('nombre'),
	 	'create' => $this->input->post('create'),
	 	'read' => $this->input->post('read'),
	 	'update' => $this->input->post('update'),
	 	'delete' => $this->input->post('delete'),
	 	'inicio' => $this->input->post('inicio'),
	 	);
	 	$this->nivelacceso_model->save($array_item);
	 	redirect('nivelacceso');
 	}



	public function edit()
	{
			$data['nivelacceso'] = $this->nivelacceso_model->nivelacceso($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar Nivelacceso";
			$this->load->view('template/page_header');		
			$this->load->view('nivelacceso_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idnivelacceso');
	 	$array_item=array(
		 	
		 	'idnivelacceso' => $this->input->post('idnivelacceso'),
		 	'nombre' => $this->input->post('nombre'),
	 	'create' => $this->input->post('create'),
	 	'read' => $this->input->post('read'),
	 	'update' => $this->input->post('update'),
	 	'delete' => $this->input->post('delete'),
	 	'inicio' => $this->input->post('inicio'),
	 	);
	 	$this->nivelacceso_model->update($id,$array_item);
	 	redirect('nivelacceso/actual/'.$id);
 	}



public function listar()
{
	
  $data['usuarios'] = $this->usuario_model->lista_usuarios1()->result();
  $data['nivelacceso'] = $this->nivelacceso_model->lista_nivelaccesos()->result();
  $data['title']="Nivelacceso";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacceso_list',$data);
	$this->load->view('template/page_footer');
}

function nivelacceso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nivelacceso_model->lista_nivelaccesos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnivelacceso,$r->nombre,$r->create,$r->read,$r->update,$r->delete,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('nivelacceso/actual').'"  data-idnivelacceso="'.$r->idnivelacceso.'">Ver</a>');
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
	$data['nivelacceso']=$this->nivelacceso_model->nivelacceso($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Nivelacceso";
    $this->load->view('template/page_header');		
    $this->load->view('nivelacceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }






public function elprimero()
{
	$data['nivelacceso'] = $this->nivelacceso_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Nivelacceso";
    $this->load->view('template/page_header');		
    $this->load->view('nivelacceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nivelacceso'] = $this->nivelacceso_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Nivelacceso";
  
    $this->load->view('template/page_header');		
    $this->load->view('nivelacceso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nivelacceso_list']=$this->nivelacceso_model->lista_nivelacceso()->result();
	$data['nivelacceso'] = $this->nivelacceso_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Nivelacceso";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacceso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nivelacceso_list']=$this->nivelacceso_model->lista_nivelacceso()->result();
	$data['nivelacceso'] = $this->nivelacceso_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Nivelacceso";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacceso_record',$data);
	$this->load->view('template/page_footer');
}





}
