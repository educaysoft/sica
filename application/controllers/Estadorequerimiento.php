<?php

class Estadorequerimiento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadorequerimiento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadorequerimiento']=$this->estadorequerimiento_model->elultimo();
		$data['title']="Lista de estadorequerimientoes";
		$this->load->view('template/page_header');
		$this->load->view('estadorequerimiento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadorequerimiento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadorequerimiento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadorequerimiento_model->save($array_item);
	 	redirect('estadorequerimiento');
 	}



public function edit()
{
	 	$data['estadorequerimiento'] = $this->estadorequerimiento_model->estadorequerimiento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadorequerimiento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadorequerimiento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadorequerimiento');
	 	$array_item=array(
		 	
		 	'idestadorequerimiento' => $this->input->post('idestadorequerimiento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadorequerimiento_model->update($id,$array_item);
	 	redirect('estadorequerimiento');
 	}


 	public function delete()
 	{
 		$this->estadorequerimiento_model->delete($this->uri->segment(3));
	 	redirect('estadorequerimiento/elultimo');
 	}


public function listar()
{
	
  $data['title']="Estadorequerimiento";
	$this->load->view('template/page_header');		
  $this->load->view('estadorequerimiento_list',$data);
	$this->load->view('template/page_footer');
}



function estadorequerimiento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadorequerimiento_model->lista_estadorequerimientoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadorequerimiento,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadorequerimiento="'.$r->idestadorequerimiento.'">Ver</a>');
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
	$data['estadorequerimiento'] = $this->estadorequerimiento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadorequerimiento";
    $this->load->view('template/page_header');		
    $this->load->view('estadorequerimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadorequerimiento'] = $this->estadorequerimiento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadorequerimiento";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadorequerimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadorequerimiento_list']=$this->estadorequerimiento_model->lista_estadorequerimiento()->result();
	$data['estadorequerimiento'] = $this->estadorequerimiento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadorequerimiento";
	$this->load->view('template/page_header');		
  $this->load->view('estadorequerimiento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadorequerimiento_list']=$this->estadorequerimiento_model->lista_estadorequerimiento()->result();
	$data['estadorequerimiento'] = $this->estadorequerimiento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadorequerimiento";
	$this->load->view('template/page_header');		
  $this->load->view('estadorequerimiento_record',$data);
	$this->load->view('template/page_footer');
}

}
