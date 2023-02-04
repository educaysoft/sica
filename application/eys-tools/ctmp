<?php

class Participanteestado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('participanteestado_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['participanteestado']=$this->participanteestado_model->participanteestado(1)->row_array();
		$data['title']="Lista de participanteestadoes";
		$this->load->view('template/page_header');
		$this->load->view('participanteestado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva participanteestado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('participanteestado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idparticipanteestado' => $this->input->post('idparticipanteestado'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->participanteestado_model->save($array_item);
	 	redirect('participanteestado');
 	}



public function edit()
{
	 	$data['participanteestado'] = $this->participanteestado_model->participanteestado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar participanteestado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('participanteestado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idparticipanteestado');
	 	$array_item=array(
		 	
		 	'idparticipanteestado' => $this->input->post('idparticipanteestado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->participanteestado_model->update($id,$array_item);
	 	redirect('participanteestado');
 	}


 	public function delete()
 	{
 		$data=$this->participanteestado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('participanteestado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Participanteestado";
	$this->load->view('template/page_header');		
  $this->load->view('participanteestado_list',$data);
	$this->load->view('template/page_footer');
}



function participanteestado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->participanteestado_model->lista_participanteestados();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idparticipanteestado,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idparticipanteestado="'.$r->idparticipanteestado.'">Ver</a>');
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
	$data['participanteestado'] = $this->participanteestado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Participanteestado";
    $this->load->view('template/page_header');		
    $this->load->view('participanteestado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['participanteestado'] = $this->participanteestado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Participanteestado";
  
    $this->load->view('template/page_header');		
    $this->load->view('participanteestado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['participanteestado_list']=$this->participanteestado_model->lista_participanteestado()->result();
	$data['participanteestado'] = $this->participanteestado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Participanteestado";
	$this->load->view('template/page_header');		
  $this->load->view('participanteestado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['participanteestado_list']=$this->participanteestado_model->lista_participanteestado()->result();
	$data['participanteestado'] = $this->participanteestado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Participanteestado";
	$this->load->view('template/page_header');		
  $this->load->view('participanteestado_record',$data);
	$this->load->view('template/page_footer');
}

}
