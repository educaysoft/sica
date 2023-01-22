<?php

class Canton extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('canton_model');
}

public function index(){
  	$data['canton']=$this->canton_model->canton(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('canton_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('canton_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcanton' => $this->input->post('idcanton'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->canton_model->save($array_item);
	 	redirect('canton');
 	}



	public function edit()
	{
	 	$data['canton'] = $this->canton_model->canton($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar canton";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('canton_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcanton');
	 	$array_item=array(
		 	
		 	'idcanton' => $this->input->post('idcanton'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->canton_model->update($id,$array_item);
	 	redirect('canton');
 	}



 	public function delete()
 	{
 		$data=$this->canton_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('canton/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['canton_list'] = $this->canton_model->lista_cantonsA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('canton_list',$data);
	$this->load->view('template/page_footer');
}



function canton_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->canton_model->lista_cantonsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcanton,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcanton="'.$r->idcanton.'">Ver</a>');
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
	$data['canton'] = $this->canton_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('canton_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['canton'] = $this->canton_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('canton_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['canton_list']=$this->canton_model->lista_canton()->result();
	$data['canton'] = $this->canton_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('canton_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['canton_list']=$this->canton_model->lista_canton()->result();
	$data['canton'] = $this->canton_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('canton_record',$data);
	$this->load->view('template/page_footer');
}



public function get_canton() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcanton')) {
        $this->db->select('*');
        $this->db->where(array('idcanton' => $this->input->post('idcanton')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
