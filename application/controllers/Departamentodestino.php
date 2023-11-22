<?php

class Departamentodestino extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('departamentodestino_model');
      $this->load->model('departamento_model');
}

	public function index(){
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 		// $data['departamentodestino']=$this->departamentodestino_model->departamentodestino(1)->row_array();
		$data['departamentodestino'] = $this->departamentodestino_model->elprimero();
 		// print_r($data['usuario_list']);
  		$data['title']="Lista de Departamentodestinoes";
		$this->load->view('template/page_header');		
  		$this->load->view('departamentodestino_record',$data);
		$this->load->view('template/page_footer');
	}


	public function add()
	{
		$data['departamentos']= $this->departamento_model->lista_departamentos1(0)->result();

		$data['title']="Nuevo Departamentodestino";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('departamentodestino_form',$data);
	 	$this->load->view('template/page_footer');
	}


public function listar()
{
	
  $data['list'] = $this->departamentodestino_model->lista_departamentodestino1()->result();
  $data['title']="Departamentodestinoes de departamento";
	$this->load->view('template/page_header');		
  $this->load->view('departamentodestino_list',$data);
	$this->load->view('template/page_footer');
}






	public function  save()
	{
	 	$array_item=array(
		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->departamentodestino_model->save($array_item);
	 	redirect('departamentodestino');
 	}



public function edit()
{

	 	$data['departamentodestino'] = $this->departamentodestino_model->departamentodestino($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar Departamentodestino";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('departamentodestino_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddepartamentodestino');
	 	$array_item=array(

		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$result=$this->departamentodestino_model->update($id,$array_item);
	 	if($result == false)
		{
			echo "<script language='JavaScript'> alert('Departamentodestino no  existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


 	public function delete()
 	{
 		$data=$this->departamentodestino_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('departamentodestino/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function elprimero()
{
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentodestino'] = $this->departamentodestino_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Departamentodestino del departamento";
    $this->load->view('template/page_header');		
    $this->load->view('departamentodestino_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentodestino'] = $this->departamentodestino_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Departamentodestino del departamento";
  
    $this->load->view('template/page_header');		
    $this->load->view('departamentodestino_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['departamentodestino_list']=$this->departamentodestino_model->lista_departamentodestino()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentodestino'] = $this->departamentodestino_model->siguiente($this->uri->segment(3))->row_array();
    $data['title']="Departamentodestino del departamento";
 // $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('departamentodestino_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['departamentodestino_list']=$this->departamentodestino_model->lista_departamentodestino()->result();
  $data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['departamentodestino'] = $this->departamentodestino_model->anterior($this->uri->segment(3))->row_array();
 // $data['title']="Correo";
    	$data['title']="Departamentodestino del departamento";
	$this->load->view('template/page_header');		
  	$this->load->view('departamentodestino_record',$data);
	$this->load->view('template/page_footer');
}






}
