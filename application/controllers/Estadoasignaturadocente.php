<?php

class Estadoasignaturadocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadoasignaturadocente_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadoasignaturadocente']=$this->estadoasignaturadocente_model->estadoasignaturadocente(1)->row_array();
		$data['title']="Lista de estadoasignaturadocentees";
		$this->load->view('template/page_header');
		$this->load->view('estadoasignaturadocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadoasignaturadocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadoasignaturadocente_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestadoasignaturadocente' => $this->input->post('idestadoasignaturadocente'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadoasignaturadocente_model->save($array_item);
	 	redirect('estadoasignaturadocente');
 	}



public function edit()
{
	 	$data['estadoasignaturadocente'] = $this->estadoasignaturadocente_model->estadoasignaturadocente($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadoasignaturadocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadoasignaturadocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadoasignaturadocente');
	 	$array_item=array(
		 	
		 	'idestadoasignaturadocente' => $this->input->post('idestadoasignaturadocente'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadoasignaturadocente_model->update($id,$array_item);
	 	redirect('estadoasignaturadocente');
 	}


 	public function delete()
 	{
 		$data=$this->estadoasignaturadocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadoasignaturadocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estadoasignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('estadoasignaturadocente_list',$data);
	$this->load->view('template/page_footer');
}



function estadoasignaturadocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadoasignaturadocente_model->lista_estadoasignaturadocentes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadoasignaturadocente,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadoasignaturadocente="'.$r->idestadoasignaturadocente.'">Ver</a>');
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
	$data['estadoasignaturadocente'] = $this->estadoasignaturadocente_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadoasignaturadocente";
    $this->load->view('template/page_header');		
    $this->load->view('estadoasignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadoasignaturadocente'] = $this->estadoasignaturadocente_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadoasignaturadocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadoasignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadoasignaturadocente_list']=$this->estadoasignaturadocente_model->lista_estadoasignaturadocente()->result();
	$data['estadoasignaturadocente'] = $this->estadoasignaturadocente_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadoasignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('estadoasignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadoasignaturadocente_list']=$this->estadoasignaturadocente_model->lista_estadoasignaturadocente()->result();
	$data['estadoasignaturadocente'] = $this->estadoasignaturadocente_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadoasignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('estadoasignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}

}
