<?php

class Nivelacademico extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('nivelacademico_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['nivelacademico']=$this->nivelacademico_model->nivelacademico(1)->row_array();
		$data['title']="Lista de nivelacademicoes";
		$this->load->view('template/page_header');
		$this->load->view('nivelacademico_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva nivelacademico";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('nivelacademico_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idnivelacademico' => $this->input->post('idnivelacademico'),
	 	'nombre' => $this->input->post('nombre'),
	 	'numero' => $this->input->post('numero'),
	 	);
	 	$this->nivelacademico_model->save($array_item);
	 	redirect('nivelacademico');
 	}



public function edit()
{
	 	$data['nivelacademico'] = $this->nivelacademico_model->nivelacademico($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar nivelacademico";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('nivelacademico_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idnivelacademico');
	 	$array_item=array(
		 	
		 	'idnivelacademico' => $this->input->post('idnivelacademico'),
		 	'nombre' => $this->input->post('nombre'),
	 		'numero' => $this->input->post('numero'),
	 	);
	 	$this->nivelacademico_model->update($id,$array_item);
	 	redirect('nivelacademico');
 	}


 	public function delete()
 	{
 		$data=$this->nivelacademico_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('nivelacademico/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Nivelacademico";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacademico_list',$data);
	$this->load->view('template/page_footer');
}



function nivelacademico_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nivelacademico_model->lista_nivelacademicos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnivelacademico,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idnivelacademico="'.$r->idnivelacademico.'">Ver</a>');
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
	$data['nivelacademico'] = $this->nivelacademico_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Nivelacademico";
    $this->load->view('template/page_header');		
    $this->load->view('nivelacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nivelacademico'] = $this->nivelacademico_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Nivelacademico";
  
    $this->load->view('template/page_header');		
    $this->load->view('nivelacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nivelacademico_list']=$this->nivelacademico_model->lista_nivelacademico()->result();
	$data['nivelacademico'] = $this->nivelacademico_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Nivelacademico";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacademico_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nivelacademico_list']=$this->nivelacademico_model->lista_nivelacademico()->result();
	$data['nivelacademico'] = $this->nivelacademico_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Nivelacademico";
	$this->load->view('template/page_header');		
  $this->load->view('nivelacademico_record',$data);
	$this->load->view('template/page_footer');
}

}
