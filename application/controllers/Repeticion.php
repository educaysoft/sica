<?php

class Repeticion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('repeticion_model');
}

public function index(){
  	$data['repeticion']=$this->repeticion_model->repeticion(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('repeticion_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('repeticion_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idrepeticion' => $this->input->post('idrepeticion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->repeticion_model->save($array_item);
	 	redirect('repeticion');
 	}



	public function edit()
	{
	 	$data['repeticion'] = $this->repeticion_model->repeticion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar repeticion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('repeticion_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idrepeticion');
	 	$array_item=array(
		 	
		 	'idrepeticion' => $this->input->post('idrepeticion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->repeticion_model->update($id,$array_item);
	 	redirect('repeticion');
 	}



 	public function delete()
 	{
 		$data=$this->repeticion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('repeticion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['repeticion_list'] = $this->repeticion_model->lista_repeticionsA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('repeticion_list',$data);
	$this->load->view('template/page_footer');
}



function repeticion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->repeticion_model->lista_repeticionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idrepeticion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idrepeticion="'.$r->idrepeticion.'">Ver</a>');
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
	$data['repeticion'] = $this->repeticion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('repeticion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['repeticion'] = $this->repeticion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('repeticion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['repeticion_list']=$this->repeticion_model->lista_repeticion()->result();
	$data['repeticion'] = $this->repeticion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('repeticion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['repeticion_list']=$this->repeticion_model->lista_repeticion()->result();
	$data['repeticion'] = $this->repeticion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('repeticion_record',$data);
	$this->load->view('template/page_footer');
}



public function get_repeticion() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idrepeticion')) {
        $this->db->select('*');
        $this->db->where(array('idrepeticion' => $this->input->post('idrepeticion')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
