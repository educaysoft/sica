<?php

class Directorio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('directorio_model');
	  $this->load->model('ordenador_model');
}

public function index(){
  $data['directorio']=$this->directorio_model->directorio(1)->row_array();
 // print_r($data['usuario_list']);
  $data['title']="Lista de directorios";
	$this->load->view('template/page_header');		
        if(isset($data['directorio'])){
  $this->load->view('directorio_record',$data);
        }else{
	echo "no hay registro";
	}
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
		$data['title']="Nuevo directorio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('directorio_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddirectorio' => $this->input->post('iddirectorio'),
		 	'nombre' => $this->input->post('nombre'),
			'idordenador' => $this->input->post('idordenador'),
			'ruta' => $this->input->post('ruta'),
			'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->directorio_model->save($array_item);
	 	redirect('directorio');
 	}



public function edit()
{
	 	$data['directorio'] = $this->directorio_model->directorio($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar directorio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('directorio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddirectorio');
	 	$array_item=array(
		 	
		 	'iddirectorio' => $this->input->post('iddirectorio'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->directorio_model->update($id,$array_item);
	 	redirect('directorio');
 	}


public function siguiente(){
 // $data['directorio_list']=$this->directorio_model->lista_directorio()->result();
	$data['directorio'] = $this->directorio_model->siguiente($this->uri->segment(3))->row_array();
  $data['ordenadores']= $this->ordenador_model->lista_ordenadores()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('directorio_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['directorio_list']=$this->directorio_model->lista_directorio()->result();
	$data['directorio'] = $this->directorio_model->anterior($this->uri->segment(3))->row_array();
  $data['ordenadores']= $this->ordenador_model->lista_ordenador()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('directorio_record',$data);
	$this->load->view('template/page_footer');
}




}
