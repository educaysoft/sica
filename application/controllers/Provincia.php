<?php

class Provincia extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('provincia_model');
}

public function index(){
  	$data['provincia']=$this->provincia_model->provincia(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('provincia_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('provincia_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idprovincia' => $this->input->post('idprovincia'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->provincia_model->save($array_item);
	 	redirect('provincia');
 	}



	public function edit()
	{
	 	$data['provincia'] = $this->provincia_model->provincia($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar provincia";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('provincia_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idprovincia');
	 	$array_item=array(
		 	
		 	'idprovincia' => $this->input->post('idprovincia'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->provincia_model->update($id,$array_item);
	 	redirect('provincia');
 	}



 	public function delete()
 	{
 		$data=$this->provincia_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('provincia/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['provincia_list'] = $this->provincia_model->lista_provinciasA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('provincia_list',$data);
	$this->load->view('template/page_footer');
}



function provincia_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->provincia_model->lista_provinciasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idprovincia,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idprovincia="'.$r->idprovincia.'">Ver</a>');
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
	$data['provincia'] = $this->provincia_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('provincia_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['provincia'] = $this->provincia_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('provincia_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['provincia_list']=$this->provincia_model->lista_provincia()->result();
	$data['provincia'] = $this->provincia_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('provincia_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['provincia_list']=$this->provincia_model->lista_provincia()->result();
	$data['provincia'] = $this->provincia_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('provincia_record',$data);
	$this->load->view('template/page_footer');
}



public function get_provincia() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idprovincia')) {
        $this->db->select('*');
        $this->db->where(array('idprovincia' => $this->input->post('idprovincia')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
