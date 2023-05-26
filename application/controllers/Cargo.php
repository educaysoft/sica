<?php

class Cargo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('cargo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['cargo']=$this->cargo_model->cargo(1)->row_array();
		$data['title']="Lista de cargoes";
		$this->load->view('template/page_header');
		$this->load->view('cargo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva cargo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cargo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcargo' => $this->input->post('idcargo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cargo_model->save($array_item);
	 	redirect('cargo');
 	}



public function edit()
{
	 	$data['cargo'] = $this->cargo_model->cargo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar cargo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cargo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcargo');
	 	$array_item=array(
		 	
		 	'idcargo' => $this->input->post('idcargo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cargo_model->update($id,$array_item);
	 	redirect('cargo');
 	}


 	public function delete()
 	{
 		$data=$this->cargo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cargo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Cargo";
	$this->load->view('template/page_header');		
  $this->load->view('cargo_list',$data);
	$this->load->view('template/page_footer');
}



function cargo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cargo_model->lista_cargos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcargo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcargo="'.$r->idcargo.'">Ver</a>');
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
	$data['cargo'] = $this->cargo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Cargo";
    $this->load->view('template/page_header');		
    $this->load->view('cargo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cargo'] = $this->cargo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Cargo";
  
    $this->load->view('template/page_header');		
    $this->load->view('cargo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cargo_list']=$this->cargo_model->lista_cargo()->result();
	$data['cargo'] = $this->cargo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Cargo";
	$this->load->view('template/page_header');		
  $this->load->view('cargo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cargo_list']=$this->cargo_model->lista_cargo()->result();
	$data['cargo'] = $this->cargo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Cargo";
	$this->load->view('template/page_header');		
  $this->load->view('cargo_record',$data);
	$this->load->view('template/page_footer');
}

}
