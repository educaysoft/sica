<?php

class Tiporelacionpersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tiporelacionpersona_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['tiporelacionpersona']=$this->tiporelacionpersona_model->tiporelacionpersona(1)->row_array();
  		$data['title']="Lista de Tiporelacionpersonas";
			$this->load->view('template/page_header');		
  		$this->load->view('tiporelacionpersona_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva Tiporelacionpersona";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tiporelacionpersona_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtiporelacionpersona' => $this->input->post('idtiporelacionpersona'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiporelacionpersona_model->save($array_item);
	 	redirect('tiporelacionpersona');
 	}



public function edit()
{
	 	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->tiporelacionpersona($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Tiporelacionpersona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tiporelacionpersona_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtiporelacionpersona');
	 	$array_item=array(
		 	
		 	'idtiporelacionpersona' => $this->input->post('idtiporelacionpersona'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiporelacionpersona_model->update($id,$array_item);
	 	redirect('tiporelacionpersona');
 	}



public function listar()
{
	
  $data['tiporelacionpersona'] = $this->tiporelacionpersona_model->lista_tiporelacionpersonas()->result();
  $data['title']="Tiporelacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('tiporelacionpersona_list',$data);
	$this->load->view('template/page_footer');
}

function tiporelacionpersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tiporelacionpersona_model->lista_tiporelacionpersonas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtiporelacionpersona,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tiporelacionpersona/actual').'"   data-idtiporelacionpersona="'.$r->idtiporelacionpersona.'">Ver</a>');
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
	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->tiporelacionpersona($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Tiporelacionpersona";
    $this->load->view('template/page_header');		
    $this->load->view('tiporelacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tiporelacionpersona";
    $this->load->view('template/page_header');		
    $this->load->view('tiporelacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tiporelacionpersona";
  
    $this->load->view('template/page_header');		
    $this->load->view('tiporelacionpersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tiporelacionpersona_list']=$this->tiporelacionpersona_model->lista_tiporelacionpersona()->result();
	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tiporelacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('tiporelacionpersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tiporelacionpersona_list']=$this->tiporelacionpersona_model->lista_tiporelacionpersona()->result();
	$data['tiporelacionpersona'] = $this->tiporelacionpersona_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tiporelacionpersona";
	$this->load->view('template/page_header');		
  $this->load->view('tiporelacionpersona_record',$data);
	$this->load->view('template/page_footer');
}





}
