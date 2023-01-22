<?php

class Sexo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('sexo_model');
}

public function index(){
  	$data['sexo']=$this->sexo_model->sexo(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('sexo_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('sexo_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idsexo' => $this->input->post('idsexo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->sexo_model->save($array_item);
	 	redirect('sexo');
 	}



	public function edit()
	{
	 	$data['sexo'] = $this->sexo_model->sexo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar sexo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('sexo_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idsexo');
	 	$array_item=array(
		 	
		 	'idsexo' => $this->input->post('idsexo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->sexo_model->update($id,$array_item);
	 	redirect('sexo');
 	}



 	public function delete()
 	{
 		$data=$this->sexo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('sexo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['sexo_list'] = $this->sexo_model->lista_sexosA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('sexo_list',$data);
	$this->load->view('template/page_footer');
}



function sexo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->sexo_model->lista_sexosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idsexo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idsexo="'.$r->idsexo.'">Ver</a>');
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
	$data['sexo'] = $this->sexo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('sexo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['sexo'] = $this->sexo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('sexo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['sexo_list']=$this->sexo_model->lista_sexo()->result();
	$data['sexo'] = $this->sexo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('sexo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['sexo_list']=$this->sexo_model->lista_sexo()->result();
	$data['sexo'] = $this->sexo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('sexo_record',$data);
	$this->load->view('template/page_footer');
}



public function get_sexo() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsexo')) {
        $this->db->select('*');
        $this->db->where(array('idsexo' => $this->input->post('idsexo')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
