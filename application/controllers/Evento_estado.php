<?php

class Evento_estado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('evento_estado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['evento_estado']=$this->evento_estado_model->evento_estado(1)->row_array();
		$data['title']="Lista de evento_estadoes";
		$this->load->view('template/page_header');
		$this->load->view('evento_estado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva evento_estado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('evento_estado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idevento_estado' => $this->input->post('idevento_estado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->evento_estado_model->save($array_item);
	 	redirect('evento_estado');
 	}



public function edit()
{
	 	$data['evento_estado'] = $this->evento_estado_model->evento_estado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar evento_estado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('evento_estado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idevento_estado');
	 	$array_item=array(
		 	
		 	'idevento_estado' => $this->input->post('idevento_estado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->evento_estado_model->update($id,$array_item);
	 	redirect('evento_estado');
 	}


 	public function delete()
 	{
 		$data=$this->evento_estado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('evento_estado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Evento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('evento_estado_list',$data);
	$this->load->view('template/page_footer');
}



function evento_estado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->evento_estado_model->lista_evento_estados();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idevento_estado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idevento_estado="'.$r->idevento_estado.'">Ver</a>');
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
	$data['evento_estado'] = $this->evento_estado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Evento_estado";
    $this->load->view('template/page_header');		
    $this->load->view('evento_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['evento_estado'] = $this->evento_estado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Evento_estado";
  
    $this->load->view('template/page_header');		
    $this->load->view('evento_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['evento_estado_list']=$this->evento_estado_model->lista_evento_estado()->result();
	$data['evento_estado'] = $this->evento_estado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Evento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('evento_estado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['evento_estado_list']=$this->evento_estado_model->lista_evento_estado()->result();
	$data['evento_estado'] = $this->evento_estado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Evento_estado";
	$this->load->view('template/page_header');		
  $this->load->view('evento_estado_record',$data);
	$this->load->view('template/page_footer');
}

}
