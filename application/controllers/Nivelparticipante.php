<?php

class Nivelparticipante extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('nivelparticipante_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['nivelparticipante']=$this->nivelparticipante_model->nivelparticipante(1)->row_array();
		$data['title']="Lista de nivelparticipantees";
		$this->load->view('template/page_header');
		$this->load->view('nivelparticipante_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva nivelparticipante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('nivelparticipante_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idnivelparticipante' => $this->input->post('idnivelparticipante'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->nivelparticipante_model->save($array_item);
	 	redirect('nivelparticipante');
 	}



public function edit()
{
	 	$data['nivelparticipante'] = $this->nivelparticipante_model->nivelparticipante($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar nivelparticipante";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('nivelparticipante_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idnivelparticipante');
	 	$array_item=array(
		 	
		 	'idnivelparticipante' => $this->input->post('idnivelparticipante'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->nivelparticipante_model->update($id,$array_item);
	 	redirect('nivelparticipante');
 	}


 	public function delete()
 	{
 		$data=$this->nivelparticipante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('nivelparticipante/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Nivelparticipante";
	$this->load->view('template/page_header');		
  $this->load->view('nivelparticipante_list',$data);
	$this->load->view('template/page_footer');
}



function nivelparticipante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nivelparticipante_model->lista_nivelparticipantes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnivelparticipante,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idnivelparticipante="'.$r->idnivelparticipante.'">Ver</a>');
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
	$data['nivelparticipante'] = $this->nivelparticipante_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Nivelparticipante";
    $this->load->view('template/page_header');		
    $this->load->view('nivelparticipante_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nivelparticipante'] = $this->nivelparticipante_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Nivelparticipante";
  
    $this->load->view('template/page_header');		
    $this->load->view('nivelparticipante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nivelparticipante_list']=$this->nivelparticipante_model->lista_nivelparticipante()->result();
	$data['nivelparticipante'] = $this->nivelparticipante_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Nivelparticipante";
	$this->load->view('template/page_header');		
  $this->load->view('nivelparticipante_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nivelparticipante_list']=$this->nivelparticipante_model->lista_nivelparticipante()->result();
	$data['nivelparticipante'] = $this->nivelparticipante_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Nivelparticipante";
	$this->load->view('template/page_header');		
  $this->load->view('nivelparticipante_record',$data);
	$this->load->view('template/page_footer');
}

}
