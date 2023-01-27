<?php

class Tipodocumento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipodocumento_model');
}

public function index(){
  	$data['tipodocumento']=$this->tipodocumento_model->tipodocumento(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tipodocumento_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipodocumento_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipodocumento' => $this->input->post('idtipodocumento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipodocumento_model->save($array_item);
	 	redirect('tipodocumento');
 	}



	public function edit()
	{
	 	$data['tipodocumento'] = $this->tipodocumento_model->tipodocumento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipodocumento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipodocumento_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipodocumento');
	 	$array_item=array(
		 	
		 	'idtipodocumento' => $this->input->post('idtipodocumento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipodocumento_model->update($id,$array_item);
	 	redirect('tipodocumento');
 	}



 	public function delete()
 	{
 		$data=$this->tipodocumento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipodocumento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipodocumento_list'] = $this->tipodocumento_model->lista_tipodocumentosA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumento_list',$data);
	$this->load->view('template/page_footer');
}



function tipodocumento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipodocumento_model->lista_tipodocumentosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipodocumento,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipodocumento="'.$r->idtipodocumento.'">Ver</a>');
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
	$data['tipodocumento'] = $this->tipodocumento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tipodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipodocumento'] = $this->tipodocumento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipodocumento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipodocumento_list']=$this->tipodocumento_model->lista_tipodocumento()->result();
	$data['tipodocumento'] = $this->tipodocumento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipodocumento_list']=$this->tipodocumento_model->lista_tipodocumento()->result();
	$data['tipodocumento'] = $this->tipodocumento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocumento_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipodocumento() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipodocumento')) {
        $this->db->select('*');
        $this->db->where(array('idtipodocumento' => $this->input->post('idtipodocumento')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
