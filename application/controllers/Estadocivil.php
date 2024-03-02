<?php

class Estadocivil extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadocivil_model');
}

public function index(){
  	$data['estadocivil']=$this->estadocivil_model->estadocivil(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('estadocivil_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadocivil_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idestadocivil' => $this->input->post('idestadocivil'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadocivil_model->save($array_item);
	 	redirect('estadocivil');
 	}



	public function edit()
	{
	 	$data['estadocivil'] = $this->estadocivil_model->estadocivil($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadocivil";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadocivil_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idestadocivil');
	 	$array_item=array(
		 	
		 	'idestadocivil' => $this->input->post('idestadocivil'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadocivil_model->update($id,$array_item);
	 	redirect('estadocivil');
 	}



 	public function delete()
 	{
 		$data=$this->estadocivil_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadocivil/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['estadocivil_list'] = $this->estadocivil_model->lista_estadocivilsA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('estadocivil_list',$data);
	$this->load->view('template/page_footer');
}



function estadocivil_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadocivil_model->lista_estadocivilsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadocivil,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadocivil="'.$r->idestadocivil.'">Ver</a>');
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
	$data['estadocivil'] = $this->estadocivil_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('estadocivil_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadocivil'] = $this->estadocivil_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadocivil_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadocivil_list']=$this->estadocivil_model->lista_estadocivil()->result();
	$data['estadocivil'] = $this->estadocivil_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('estadocivil_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadocivil_list']=$this->estadocivil_model->lista_estadocivil()->result();
	$data['estadocivil'] = $this->estadocivil_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('estadocivil_record',$data);
	$this->load->view('template/page_footer');
}



public function get_estadocivil() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idestadocivil')) {
        $this->db->select('*');
        $this->db->where(array('idestadocivil' => $this->input->post('idestadocivil')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
