<?php

class Tiempodedicacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tiempodedicacion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tiempodedicacion']=$this->tiempodedicacion_model->tiempodedicacion(1)->row_array();
		$data['title']="Lista de tiempodedicaciones";
		$this->load->view('template/page_header');
		$this->load->view('tiempodedicacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tiempodedicacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tiempodedicacion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtiempodedicacion' => $this->input->post('idtiempodedicacion'),
	 	'nombre' => $this->input->post('nombre'),
	 	'inicial' => $this->input->post('inicial'),
	 	);
	 	$this->tiempodedicacion_model->save($array_item);
	 	redirect('tiempodedicacion');
 	}



public function edit()
{
	 	$data['tiempodedicacion'] = $this->tiempodedicacion_model->tiempodedicacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tiempodedicacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tiempodedicacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtiempodedicacion');
	 	$array_item=array(
		 	
		 	'idtiempodedicacion' => $this->input->post('idtiempodedicacion'),
		 	'nombre' => $this->input->post('nombre'),
		 	'inicial' => $this->input->post('inicial'),
	 	);
	 	$this->tiempodedicacion_model->update($id,$array_item);
	 	redirect('tiempodedicacion');
 	}


 	public function delete()
 	{
 		$data=$this->tiempodedicacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tiempodedicacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tiempodedicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tiempodedicacion_list',$data);
	$this->load->view('template/page_footer');
}



function tiempodedicacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tiempodedicacion_model->lista_tiempodedicacions();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtiempodedicacion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('tiempodedicacion/actual').'"     data-idtiempodedicacion="'.$r->idtiempodedicacion.'">Ver</a>');
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
	$data['tiempodedicacion'] = $this->tiempodedicacion_model->tiempodedicacion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Tiempodedicacion";
    $this->load->view('template/page_header');		
    $this->load->view('tiempodedicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['tiempodedicacion'] = $this->tiempodedicacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tiempodedicacion";
    $this->load->view('template/page_header');		
    $this->load->view('tiempodedicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tiempodedicacion'] = $this->tiempodedicacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tiempodedicacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('tiempodedicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tiempodedicacion_list']=$this->tiempodedicacion_model->lista_tiempodedicacion()->result();
	$data['tiempodedicacion'] = $this->tiempodedicacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tiempodedicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tiempodedicacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tiempodedicacion_list']=$this->tiempodedicacion_model->lista_tiempodedicacion()->result();
	$data['tiempodedicacion'] = $this->tiempodedicacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tiempodedicacion";
	$this->load->view('template/page_header');		
  $this->load->view('tiempodedicacion_record',$data);
	$this->load->view('template/page_footer');
}

}
