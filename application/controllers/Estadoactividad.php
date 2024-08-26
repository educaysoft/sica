<?php

class Estadoactividad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadoactividad_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadoactividad']=$this->estadoactividad_model->estadoactividad(1)->row_array();
		$data['title']="Lista de estadoactividades";
		$this->load->view('template/page_header');
		$this->load->view('estadoactividad_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadoactividad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadoactividad_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestadoactividad' => $this->input->post('idestadoactividad'),
	 	'nombre' => $this->input->post('nombre'),
		 	'color' => $this->input->post('color'),
	 	);
	 	$this->estadoactividad_model->save($array_item);
	 	redirect('estadoactividad');
 	}



public function edit()
{
	 	$data['estadoactividad'] = $this->estadoactividad_model->estadoactividad($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadoactividad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadoactividad_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadoactividad');
	 	$array_item=array(
		 	
		 	'idestadoactividad' => $this->input->post('idestadoactividad'),
		 	'nombre' => $this->input->post('nombre'),
		 	'color' => $this->input->post('color'),
	 	);
	 	$this->estadoactividad_model->update($id,$array_item);
	 	redirect('estadoactividad');
 	}


 	public function delete()
 	{
 		$data=$this->estadoactividad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadoactividad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estadoactividad";
	$this->load->view('template/page_header');		
  $this->load->view('estadoactividad_list',$data);
	$this->load->view('template/page_footer');
}



function estadoactividad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadoactividad_model->lista_estadoactividads();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadoactividad,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadoactividad="'.$r->idestadoactividad.'">Ver</a>');
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
	$data['estadoactividad'] = $this->estadoactividad_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadoactividad";
    $this->load->view('template/page_header');		
    $this->load->view('estadoactividad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadoactividad'] = $this->estadoactividad_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadoactividad";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadoactividad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadoactividad_list']=$this->estadoactividad_model->lista_estadoactividad()->result();
	$data['estadoactividad'] = $this->estadoactividad_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadoactividad";
	$this->load->view('template/page_header');		
  $this->load->view('estadoactividad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadoactividad_list']=$this->estadoactividad_model->lista_estadoactividad()->result();
	$data['estadoactividad'] = $this->estadoactividad_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadoactividad";
	$this->load->view('template/page_header');		
  $this->load->view('estadoactividad_record',$data);
	$this->load->view('template/page_footer');
}

}
