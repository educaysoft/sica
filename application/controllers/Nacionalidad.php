<?php

class Nacionalidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('nacionalidad_model');
}

public function index(){
  	$data['nacionalidad']=$this->nacionalidad_model->nacionalidad(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('nacionalidad_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('nacionalidad_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idnacionalidad' => $this->input->post('idnacionalidad'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->nacionalidad_model->save($array_item);
	 	redirect('nacionalidad');
 	}



	public function edit()
	{
	 	$data['nacionalidad'] = $this->nacionalidad_model->nacionalidad($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar nacionalidad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('nacionalidad_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idnacionalidad');
	 	$array_item=array(
		 	
		 	'idnacionalidad' => $this->input->post('idnacionalidad'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->nacionalidad_model->update($id,$array_item);
	 	redirect('nacionalidad');
 	}



 	public function delete()
 	{
 		$data=$this->nacionalidad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('nacionalidad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['nacionalidad_list'] = $this->nacionalidad_model->lista_nacionalidades()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('nacionalidad_list',$data);
	$this->load->view('template/page_footer');
}



function nacionalidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nacionalidad_model->lista_nacionalidadsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnacionalidad,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idnacionalidad="'.$r->idnacionalidad.'">Ver</a>');
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
	$data['nacionalidad'] = $this->nacionalidad_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('nacionalidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nacionalidad'] = $this->nacionalidad_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('nacionalidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nacionalidad_list']=$this->nacionalidad_model->lista_nacionalidad()->result();
	$data['nacionalidad'] = $this->nacionalidad_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('nacionalidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nacionalidad_list']=$this->nacionalidad_model->lista_nacionalidad()->result();
	$data['nacionalidad'] = $this->nacionalidad_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('nacionalidad_record',$data);
	$this->load->view('template/page_footer');
}



public function get_nacionalidad() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idnacionalidad')) {
        $this->db->select('*');
        $this->db->where(array('idnacionalidad' => $this->input->post('idnacionalidad')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
