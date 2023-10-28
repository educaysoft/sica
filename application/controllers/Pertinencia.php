<?php

class Pertinencia extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('pertinencia_model');
      $this->load->model('persona_model');
      $this->load->model('documento_model');
}

	public function index(){
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
 		// $data['pertinencia']=$this->pertinencia_model->pertinencia(1)->row_array();
		$data['pertinencia'] = $this->pertinencia_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Pertinenciaes";
		$this->load->view('template/page_header');		
  		$this->load->view('pertinencia_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{

		if($this->uri->segment(3)){
			$data['documentos']= $this->documento_model->lista_documentosA($this->uri->segment(3))->result();
		}else{
			$data['documentos']= $this->documento_model->lista_documentosA(0)->result();
		}


		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['title']="Nuevo Pertinencia";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pertinencia_form',$data);
	 	$this->load->view('template/page_footer');
	}


public function listar()
{
	
  $data['list'] = $this->pertinencia_model->lista_pertinencia1()->result();
  $data['title']="Pertinenciaes de documento";
	$this->load->view('template/page_header');		
  $this->load->view('pertinencia_list',$data);
	$this->load->view('template/page_footer');
}






	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$this->pertinencia_model->save($array_item);
	 	redirect('pertinencia');
 	}



public function edit()
{

	 	$data['pertinencia'] = $this->pertinencia_model->pertinencia($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('pertinencia_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpertinencia');
	 	$array_item=array(

		 	'idpersona' => $this->input->post('idpersona'),
		 	'iddocumento' => $this->input->post('iddocumento'),
	 	);
	 	$result=$this->pertinencia_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Pertinencia no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->pertinencia_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('pertinencia/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pertinencia'] = $this->pertinencia_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pertinencia del documento";
    $this->load->view('template/page_header');		
    $this->load->view('pertinencia_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pertinencia'] = $this->pertinencia_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pertinencia del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('pertinencia_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pertinencia_list']=$this->pertinencia_model->lista_pertinencia()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pertinencia'] = $this->pertinencia_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Pertinencia del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('pertinencia_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pertinencia_list']=$this->pertinencia_model->lista_pertinencia()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['pertinencia'] = $this->pertinencia_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
 // $data['title']="Correo";
    $data['title']="Pertinencia del documento";
	$this->load->view('template/page_header');		
  $this->load->view('pertinencia_record',$data);
	$this->load->view('template/page_footer');
}






}
