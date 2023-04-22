<?php

class Pais extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('pais_model');
}

public function index(){
  	$data['pais']=$this->pais_model->pais(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('pais_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pais_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idpais' => $this->input->post('idpais'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->pais_model->save($array_item);
	 	redirect('pais');
 	}



	public function edit()
	{
	 	$data['pais'] = $this->pais_model->pais($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar pais";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('pais_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idpais');
	 	$array_item=array(
		 	
		 	'idpais' => $this->input->post('idpais'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->pais_model->update($id,$array_item);
	 	redirect('pais');
 	}



 	public function delete()
 	{
 		$data=$this->pais_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('pais/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['pais_list'] = $this->pais_model->lista_paisesA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('pais_list',$data);
	$this->load->view('template/page_footer');
}



function pais_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->pais_model->lista_paissA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpais,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idpais="'.$r->idpais.'">Ver</a>');
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
	$data['pais'] = $this->pais_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('pais_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['pais'] = $this->pais_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('pais_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pais_list']=$this->pais_model->lista_pais()->result();
	$data['pais'] = $this->pais_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('pais_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pais_list']=$this->pais_model->lista_pais()->result();
	$data['pais'] = $this->pais_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('pais_record',$data);
	$this->load->view('template/page_footer');
}



public function get_pais() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idpais')) {
        $this->db->select('*');
        $this->db->where(array('idpais' => $this->input->post('idpais')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
