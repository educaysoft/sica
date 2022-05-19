<?php

class Tipoasistencia extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoasistencia_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tipoasistencia']=$this->tipoasistencia_model->elultimo();
		$data['title']="Lista de tipoasistenciaes";
		$this->load->view('template/page_header');
		$this->load->view('tipoasistencia_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tipoasistencia";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoasistencia_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoasistencia_model->save($array_item);
	 	redirect('tipoasistencia');
 	}



public function edit()
{
	 	$data['tipoasistencia'] = $this->tipoasistencia_model->tipoasistencia($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoasistencia";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoasistencia_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoasistencia');
	 	$array_item=array(
		 	
		 	'idtipoasistencia' => $this->input->post('idtipoasistencia'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoasistencia_model->update($id,$array_item);
	 	redirect('tipoasistencia');
 	}


 	public function delete()
 	{
 		$data=$this->tipoasistencia_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('tipoasistencia/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="tipoasistencia";
	$this->load->view('template/page_header');		
  $this->load->view('tipoasistencia_list',$data);
	$this->load->view('template/page_footer');
}



function tipoasistencia_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoasistencia_model->lista_tipoasistenciaes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoasistencia,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipoasistencia="'.$r->idtipoasistencia.'">Ver</a>');
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
	$data['tipoasistencia'] = $this->tipoasistencia_model->elprimero();
  if(!empty($data))
  {
    $data['title']="tipoasistencia";
    $this->load->view('template/page_header');		
    $this->load->view('tipoasistencia_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoasistencia'] = $this->tipoasistencia_model->elultimo();
  if(!empty($data))
  {
    $data['title']="tipoasistencia";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoasistencia_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoasistencia_list']=$this->tipoasistencia_model->lista_tipoasistencia()->result();
	$data['tipoasistencia'] = $this->tipoasistencia_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="tipoasistencia";
	$this->load->view('template/page_header');		
  $this->load->view('tipoasistencia_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoasistencia_list']=$this->tipoasistencia_model->lista_tipoasistencia()->result();
	$data['tipoasistencia'] = $this->tipoasistencia_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="tipoasistencia";
	$this->load->view('template/page_header');		
  $this->load->view('tipoasistencia_record',$data);
	$this->load->view('template/page_footer');
}

}
