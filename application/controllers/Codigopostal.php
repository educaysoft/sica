<?php

class Codigopostal extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('codigopostal_model');
}

public function index(){
  	$data['codigopostal']=$this->codigopostal_model->codigopostal(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('codigopostal_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('codigopostal_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcodigopostal' => $this->input->post('idcodigopostal'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->codigopostal_model->save($array_item);
	 	redirect('codigopostal');
 	}



	public function edit()
	{
	 	$data['codigopostal'] = $this->codigopostal_model->codigopostal($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar codigopostal";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('codigopostal_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcodigopostal');
	 	$array_item=array(
		 	
		 	'idcodigopostal' => $this->input->post('idcodigopostal'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->codigopostal_model->update($id,$array_item);
	 	redirect('codigopostal');
 	}



 	public function delete()
 	{
 		$data=$this->codigopostal_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('codigopostal/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['codigopostal_list'] = $this->codigopostal_model->lista_codigopostalsA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('codigopostal_list',$data);
	$this->load->view('template/page_footer');
}



function codigopostal_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->codigopostal_model->lista_codigopostalsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcodigopostal,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcodigopostal="'.$r->idcodigopostal.'">Ver</a>');
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
	$data['codigopostal'] = $this->codigopostal_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('codigopostal_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['codigopostal'] = $this->codigopostal_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('codigopostal_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['codigopostal_list']=$this->codigopostal_model->lista_codigopostal()->result();
	$data['codigopostal'] = $this->codigopostal_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('codigopostal_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['codigopostal_list']=$this->codigopostal_model->lista_codigopostal()->result();
	$data['codigopostal'] = $this->codigopostal_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('codigopostal_record',$data);
	$this->load->view('template/page_footer');
}



public function get_codigopostal() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcodigopostal')) {
        $this->db->select('*');
        $this->db->where(array('idcodigopostal' => $this->input->post('idcodigopostal')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
