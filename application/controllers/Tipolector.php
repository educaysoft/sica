<?php

class Tipolector extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipolector_model');
}

public function index(){
  	$data['tipolector']=$this->tipolector_model->tipolector(1)->row_array();
 
  	$data['title']="Tipos de lectores";
	$this->load->view('template/page_header');		
  	$this->load->view('tipolector_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de lector";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipolector_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipolector' => $this->input->post('idtipolector'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipolector_model->save($array_item);
	 	redirect('tipolector');
 	}



	public function edit()
	{
	 	$data['tipolector'] = $this->tipolector_model->tipolector($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipolector";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipolector_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipolector');
	 	$array_item=array(
		 	
		 	'idtipolector' => $this->input->post('idtipolector'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tipolector_model->update($id,$array_item);
	 	redirect('tipolector/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->tipolector_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipolector/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipolector_list'] = $this->tipolector_model->lista_tipolectorsA()->result();
  $data['title']="Tipo lector";
	$this->load->view('template/page_header');		
  $this->load->view('tipolector_list',$data);
	$this->load->view('template/page_footer');
}



function tipolector_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipolector_model->lista_tipolectorsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipolector,$r->nombre,$r->cantidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipolector/actual').'"  data-idtipolector="'.$r->idtipolector.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}




public function actual()
{
	$data['tipolector'] = $this->tipolector_model->tipolector($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Tipo lector";
    		$this->load->view('template/page_header');		
    		$this->load->view('tipolector_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }



public function elprimero()
{
	$data['tipolector'] = $this->tipolector_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo lector";
    $this->load->view('template/page_header');		
    $this->load->view('tipolector_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipolector'] = $this->tipolector_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo lector";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipolector_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipolector_list']=$this->tipolector_model->lista_tipolector()->result();
	$data['tipolector'] = $this->tipolector_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo lector";
	$this->load->view('template/page_header');		
  $this->load->view('tipolector_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipolector_list']=$this->tipolector_model->lista_tipolector()->result();
	$data['tipolector'] = $this->tipolector_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo lector";
	$this->load->view('template/page_header');		
  $this->load->view('tipolector_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipolector() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipolector')) {
        $this->db->select('*');
        $this->db->where(array('idtipolector' => $this->input->post('idtipolector')));
        $query = $this->db->get('lector');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
