<?php

class Correo_estado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('correo_estado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['correo_estado']=$this->correo_estado_model->correo_estado(1)->row_array();
		$data['title']="Lista de correo_estadoes";
		$this->load->view('template/page_header');
		$this->load->view('correo_estado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva correo_estado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('correo_estado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcorreo_estado' => $this->input->post('idcorreo_estado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->correo_estado_model->save($array_item);
	 	redirect('correo_estado');
 	}



public function edit()
{
	 	$data['correo_estado'] = $this->correo_estado_model->correo_estado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar correo_estado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('correo_estado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcorreo_estado');
	 	$array_item=array(
		 	
		 	'idcorreo_estado' => $this->input->post('idcorreo_estado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->correo_estado_model->update($id,$array_item);
	 	redirect('correo_estado');
 	}


 	public function delete()
 	{
 		$data=$this->correo_estado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('correo_estado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Correo_estado";
	$this->load->view('template/page_header');		
  $this->load->view('correo_estado_list',$data);
	$this->load->view('template/page_footer');
}



function correo_estado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->correo_estado_model->lista_correo_estados();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcorreo_estado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcorreo_estado="'.$r->idcorreo_estado.'">Ver</a>');
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
	$data['correo_estado'] = $this->correo_estado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Correo_estado";
    $this->load->view('template/page_header');		
    $this->load->view('correo_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['correo_estado'] = $this->correo_estado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Correo_estado";
  
    $this->load->view('template/page_header');		
    $this->load->view('correo_estado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['correo_estado_list']=$this->correo_estado_model->lista_correo_estado()->result();
	$data['correo_estado'] = $this->correo_estado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Correo_estado";
	$this->load->view('template/page_header');		
  $this->load->view('correo_estado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['correo_estado_list']=$this->correo_estado_model->lista_correo_estado()->result();
	$data['correo_estado'] = $this->correo_estado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Correo_estado";
	$this->load->view('template/page_header');		
  $this->load->view('correo_estado_record',$data);
	$this->load->view('template/page_footer');
}

}
