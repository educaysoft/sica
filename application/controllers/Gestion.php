<?php

class Gestion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('gestion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['gestion']=$this->gestion_model->elultimo();
		$data['title']="Lista de gestiones";
		$this->load->view('template/page_header');
		$this->load->view('gestion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva gestion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('gestion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->gestion_model->save($array_item);
	 	redirect('gestion');
 	}



public function edit()
{
	 	$data['gestion'] = $this->gestion_model->gestion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar gestion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('gestion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idgestion');
	 	$array_item=array(
		 	
		 	'idgestion' => $this->input->post('idgestion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->gestion_model->update($id,$array_item);
	 	redirect('gestion');
 	}


 	public function delete()
 	{
 		$this->gestion_model->delete($this->uri->segment(3));
	 	redirect('gestion/elultimo');
 	}


public function listar()
{
	
  $data['title']="Gestion";
	$this->load->view('template/page_header');		
  $this->load->view('gestion_list',$data);
	$this->load->view('template/page_footer');
}



function gestion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->gestion_model->lista_gestiones();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idgestion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idgestion="'.$r->idgestion.'">Ver</a>');
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
	$data['gestion'] = $this->gestion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Gestion";
    $this->load->view('template/page_header');		
    $this->load->view('gestion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['gestion'] = $this->gestion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Gestion";
  
    $this->load->view('template/page_header');		
    $this->load->view('gestion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['gestion_list']=$this->gestion_model->lista_gestion()->result();
	$data['gestion'] = $this->gestion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Gestion";
	$this->load->view('template/page_header');		
  $this->load->view('gestion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['gestion_list']=$this->gestion_model->lista_gestion()->result();
	$data['gestion'] = $this->gestion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Gestion";
	$this->load->view('template/page_header');		
  $this->load->view('gestion_record',$data);
	$this->load->view('template/page_footer');
}

}
