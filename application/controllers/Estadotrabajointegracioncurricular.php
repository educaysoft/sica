<?php

class Estadotrabajointegracioncurricular extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadotrabajointegracioncurricular_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadotrabajointegracioncurricular']=$this->estadotrabajointegracioncurricular_model->estadotrabajointegracioncurricular(1)->row_array();
		$data['title']="Lista de estadotrabajointegracioncurriculares";
		$this->load->view('template/page_header');
		$this->load->view('estadotrabajointegracioncurricular_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadotrabajointegracioncurricular";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadotrabajointegracioncurricular_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestadotrabajointegracioncurricular' => $this->input->post('idestadotrabajointegracioncurricular'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadotrabajointegracioncurricular_model->save($array_item);
	 	redirect('estadotrabajointegracioncurricular');
 	}



public function edit()
{
	 	$data['estadotrabajointegracioncurricular'] = $this->estadotrabajointegracioncurricular_model->estadotrabajointegracioncurricular($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadotrabajointegracioncurricular";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadotrabajointegracioncurricular_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadotrabajointegracioncurricular');
	 	$array_item=array(
		 	
		 	'idestadotrabajointegracioncurricular' => $this->input->post('idestadotrabajointegracioncurricular'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadotrabajointegracioncurricular_model->update($id,$array_item);
	 	redirect('estadotrabajointegracioncurricular');
 	}


 	public function delete()
 	{
 		$data=$this->estadotrabajointegracioncurricular_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadotrabajointegracioncurricular/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estadotrabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('estadotrabajointegracioncurricular_list',$data);
	$this->load->view('template/page_footer');
}



function estadotrabajointegracioncurricular_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurriculars();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadotrabajointegracioncurricular,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadotrabajointegracioncurricular="'.$r->idestadotrabajointegracioncurricular.'">Ver</a>');
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
	$data['estadotrabajointegracioncurricular'] = $this->estadotrabajointegracioncurricular_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadotrabajointegracioncurricular";
    $this->load->view('template/page_header');		
    $this->load->view('estadotrabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadotrabajointegracioncurricular'] = $this->estadotrabajointegracioncurricular_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadotrabajointegracioncurricular";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadotrabajointegracioncurricular_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadotrabajointegracioncurricular_list']=$this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurricular()->result();
	$data['estadotrabajointegracioncurricular'] = $this->estadotrabajointegracioncurricular_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadotrabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('estadotrabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadotrabajointegracioncurricular_list']=$this->estadotrabajointegracioncurricular_model->lista_estadotrabajointegracioncurricular()->result();
	$data['estadotrabajointegracioncurricular'] = $this->estadotrabajointegracioncurricular_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadotrabajointegracioncurricular";
	$this->load->view('template/page_header');		
  $this->load->view('estadotrabajointegracioncurricular_record',$data);
	$this->load->view('template/page_footer');
}

}
