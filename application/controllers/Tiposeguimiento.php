<?php

class Tiposeguimiento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tiposeguimiento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tiposeguimiento']=$this->tiposeguimiento_model->elultimo();
		$data['title']="Lista de tiposeguimientoes";
		$this->load->view('template/page_header');
		$this->load->view('tiposeguimiento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tiposeguimiento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tiposeguimiento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiposeguimiento_model->save($array_item);
	 	redirect('tiposeguimiento');
 	}



public function edit()
{
	 	$data['tiposeguimiento'] = $this->tiposeguimiento_model->tiposeguimiento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tiposeguimiento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tiposeguimiento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtiposeguimiento');
	 	$array_item=array(
		 	
		 	'idtiposeguimiento' => $this->input->post('idtiposeguimiento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiposeguimiento_model->update($id,$array_item);
	 	redirect('tiposeguimiento');
 	}


 	public function delete()
 	{
 		$data=$this->tiposeguimiento_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('tiposeguimiento/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="tiposeguimiento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposeguimiento_list',$data);
	$this->load->view('template/page_footer');
}



function tiposeguimiento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tiposeguimiento_model->lista_tiposeguimientoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtiposeguimiento,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtiposeguimiento="'.$r->idtiposeguimiento.'">Ver</a>');
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
	$data['tiposeguimiento'] = $this->tiposeguimiento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="tiposeguimiento";
    $this->load->view('template/page_header');		
    $this->load->view('tiposeguimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tiposeguimiento'] = $this->tiposeguimiento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="tiposeguimiento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tiposeguimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tiposeguimiento_list']=$this->tiposeguimiento_model->lista_tiposeguimiento()->result();
	$data['tiposeguimiento'] = $this->tiposeguimiento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="tiposeguimiento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposeguimiento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tiposeguimiento_list']=$this->tiposeguimiento_model->lista_tiposeguimiento()->result();
	$data['tiposeguimiento'] = $this->tiposeguimiento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="tiposeguimiento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposeguimiento_record',$data);
	$this->load->view('template/page_footer');
}

}
