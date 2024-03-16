<?php

class Tipoidentificacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipoidentificacion_model');
}

public function index(){
  	$data['tipoidentificacion']=$this->tipoidentificacion_model->tipoidentificacion(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tipoidentificacion_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipoidentificacion_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipoidentificacion' => $this->input->post('idtipoidentificacion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoidentificacion_model->save($array_item);
	 	redirect('tipoidentificacion');
 	}



	public function edit()
	{
	 	$data['tipoidentificacion'] = $this->tipoidentificacion_model->tipoidentificacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipoidentificacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipoidentificacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipoidentificacion');
	 	$array_item=array(
		 	
		 	'idtipoidentificacion' => $this->input->post('idtipoidentificacion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipoidentificacion_model->update($id,$array_item);
	 	redirect('tipoidentificacion');
 	}



 	public function delete()
 	{
 		$data=$this->tipoidentificacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipoidentificacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipoidentificacion_list'] = $this->tipoidentificacion_model->lista_tipoidentificacionsA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoidentificacion_list',$data);
	$this->load->view('template/page_footer');
}



function tipoidentificacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipoidentificacion_model->lista_tipoidentificacionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipoidentificacion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipoidentificacion="'.$r->idtipoidentificacion.'">Ver</a>');
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
	$data['tipoidentificacion'] = $this->tipoidentificacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tipoidentificacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipoidentificacion'] = $this->tipoidentificacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipoidentificacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipoidentificacion_list']=$this->tipoidentificacion_model->lista_tipoidentificacion()->result();
	$data['tipoidentificacion'] = $this->tipoidentificacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoidentificacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipoidentificacion_list']=$this->tipoidentificacion_model->lista_tipoidentificacion()->result();
	$data['tipoidentificacion'] = $this->tipoidentificacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipoidentificacion_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipoidentificacion() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipoidentificacion')) {
        $this->db->select('*');
        $this->db->where(array('idtipoidentificacion' => $this->input->post('idtipoidentificacion')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
