<?php

class Tipoparticipacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoparticipacion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipoparticipacion']=$this->tipoparticipacion_model->elultimo();
		$data['title']="Lista de tipoparticipaciones";
		$this->load->view('template/page_header');
		$this->load->view('tipoparticipacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipoparticipacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoparticipacion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoparticipacion_model->save($array_item);
	 	redirect('tipoparticipacion');
 	}



public function edit()
{
	 	$data['tipoparticipacion'] = $this->tipoparticipacion_model->tipoparticipacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoparticipacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoparticipacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoparticipacion');
	 	$array_item=array(
		 	
		 	'idtipoparticipacion' => $this->input->post('idtipoparticipacion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoparticipacion_model->update($id,$array_item);
	 	redirect('tipoparticipacion');
 	}


 	public function delete()
 	{
 		$data=$this->tipoparticipacion_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('tipoparticipacion/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="tipoparticipacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipoparticipacion_list',$data);
	$this->load->view('template/page_footer');
}



function tipoparticipacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoparticipacion_model->lista_tipoparticipaciones();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoparticipacion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipoparticipacion="'.$r->idtipoparticipacion.'">Ver</a>');
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
	$data['tipoparticipacion'] = $this->tipoparticipacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="tipoparticipacion";
    $this->load->view('template/page_header');		
    $this->load->view('tipoparticipacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoparticipacion'] = $this->tipoparticipacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="tipoparticipacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoparticipacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoparticipacion_list']=$this->tipoparticipacion_model->lista_tipoparticipacion()->result();
	$data['tipoparticipacion'] = $this->tipoparticipacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="tipoparticipacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipoparticipacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoparticipacion_list']=$this->tipoparticipacion_model->lista_tipoparticipacion()->result();
	$data['tipoparticipacion'] = $this->tipoparticipacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="tipoparticipacion";
	$this->load->view('template/page_header');		
  $this->load->view('tipoparticipacion_record',$data);
	$this->load->view('template/page_footer');
}

}
