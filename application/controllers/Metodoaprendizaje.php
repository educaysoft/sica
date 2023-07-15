<?php

class Metodoaprendizaje extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('metodoaprendizaje_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['metodoaprendizaje']=$this->metodoaprendizaje_model->metodoaprendizaje(1)->row_array();
		$data['title']="Lista de metodoaprendizajees";
		$this->load->view('template/page_header');
		$this->load->view('metodoaprendizaje_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva metodoaprendizaje";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('metodoaprendizaje_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idmetodoaprendizaje' => $this->input->post('idmetodoaprendizaje'),
	 	'nombre' => $this->input->post('nombre'),
	 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->metodoaprendizaje_model->save($array_item);
	 	redirect('metodoaprendizaje');
 	}



public function edit()
{
	 	$data['metodoaprendizaje'] = $this->metodoaprendizaje_model->metodoaprendizaje($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar metodoaprendizaje";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('metodoaprendizaje_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmetodoaprendizaje');
	 	$array_item=array(
		 	
		 	'idmetodoaprendizaje' => $this->input->post('idmetodoaprendizaje'),
		 	'nombre' => $this->input->post('nombre'),
	 		'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->metodoaprendizaje_model->update($id,$array_item);
	 	redirect('metodoaprendizaje');
 	}


 	public function delete()
 	{
 		$data=$this->metodoaprendizaje_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('metodoaprendizaje/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Metodoaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizaje_list',$data);
	$this->load->view('template/page_footer');
}



function metodoaprendizaje_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->metodoaprendizaje_model->lista_metodoaprendizajes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmetodoaprendizaje,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmetodoaprendizaje="'.$r->idmetodoaprendizaje.'">Ver</a>');
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
	$data['metodoaprendizaje'] = $this->metodoaprendizaje_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Metodoaprendizaje";
    $this->load->view('template/page_header');		
    $this->load->view('metodoaprendizaje_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['metodoaprendizaje'] = $this->metodoaprendizaje_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Metodoaprendizaje";
  
    $this->load->view('template/page_header');		
    $this->load->view('metodoaprendizaje_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['metodoaprendizaje_list']=$this->metodoaprendizaje_model->lista_metodoaprendizaje()->result();
	$data['metodoaprendizaje'] = $this->metodoaprendizaje_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Metodoaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizaje_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['metodoaprendizaje_list']=$this->metodoaprendizaje_model->lista_metodoaprendizaje()->result();
	$data['metodoaprendizaje'] = $this->metodoaprendizaje_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Metodoaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizaje_record',$data);
	$this->load->view('template/page_footer');
}

}
