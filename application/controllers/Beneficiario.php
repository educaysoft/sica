<?php

class Beneficiario extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('beneficiario_model');
      $this->load->model('persona_model');
      $this->load->model('documento_model');
}

	public function index(){
  		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['personas']= $this->persona_model->lista_personas()->result();
 		// $data['beneficiario']=$this->beneficiario_model->beneficiario(1)->row_array();
		$data['beneficiario'] = $this->beneficiario_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Beneficiarioes";
		$this->load->view('template/page_header');		
  		$this->load->view('beneficiario_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nuevo Beneficiario";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('beneficiario_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->beneficiario_model->save($array_item);
	 	redirect('beneficiario');
 	}



public function edit()
{

	 	$data['beneficiario'] = $this->beneficiario_model->beneficiario($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personasA()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Persona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('beneficiario_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idbeneficiario');
	 	$array_item=array(

		 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$result=$this->beneficiario_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Beneficiario no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->beneficiario_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('beneficiario/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['beneficiario'] = $this->beneficiario_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Beneficiario del documento";
    $this->load->view('template/page_header');		
    $this->load->view('beneficiario_record',$data);
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
	$data['beneficiario'] = $this->beneficiario_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Beneficiario del documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('beneficiario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['beneficiario_list']=$this->beneficiario_model->lista_beneficiario()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['beneficiario'] = $this->beneficiario_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Beneficiario del documento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('beneficiario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['beneficiario_list']=$this->beneficiario_model->lista_beneficiario()->result();
  $data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['beneficiario'] = $this->beneficiario_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
 // $data['title']="Correo";
    $data['title']="Beneficiario del documento";
	$this->load->view('template/page_header');		
  $this->load->view('beneficiario_record',$data);
	$this->load->view('template/page_footer');
}






}
