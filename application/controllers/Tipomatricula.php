<?php

class Tipomatricula extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipomatricula_model');
}

public function index(){
  	$data['tipomatricula']=$this->tipomatricula_model->tipomatricula(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tipomatricula_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipomatricula_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipomatricula' => $this->input->post('idtipomatricula'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipomatricula_model->save($array_item);
	 	redirect('tipomatricula');
 	}



	public function edit()
	{
	 	$data['tipomatricula'] = $this->tipomatricula_model->tipomatricula($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipomatricula";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipomatricula_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipomatricula');
	 	$array_item=array(
		 	
		 	'idtipomatricula' => $this->input->post('idtipomatricula'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipomatricula_model->update($id,$array_item);
	 	redirect('tipomatricula');
 	}



 	public function delete()
 	{
 		$data=$this->tipomatricula_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipomatricula/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipomatricula_list'] = $this->tipomatricula_model->lista_tipomatriculasA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipomatricula_list',$data);
	$this->load->view('template/page_footer');
}



function tipomatricula_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipomatricula_model->lista_tipomatriculasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipomatricula,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipomatricula="'.$r->idtipomatricula.'">Ver</a>');
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
	$data['tipomatricula'] = $this->tipomatricula_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tipomatricula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipomatricula'] = $this->tipomatricula_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipomatricula_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipomatricula_list']=$this->tipomatricula_model->lista_tipomatricula()->result();
	$data['tipomatricula'] = $this->tipomatricula_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipomatricula_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipomatricula_list']=$this->tipomatricula_model->lista_tipomatricula()->result();
	$data['tipomatricula'] = $this->tipomatricula_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipomatricula_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipomatricula() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipomatricula')) {
        $this->db->select('*');
        $this->db->where(array('idtipomatricula' => $this->input->post('idtipomatricula')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
