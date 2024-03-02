<?php

class Tiposangre extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tiposangre_model');
}

public function index(){
  	$data['tiposangre']=$this->tiposangre_model->tiposangre(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tiposangre_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tiposangre_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtiposangre' => $this->input->post('idtiposangre'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiposangre_model->save($array_item);
	 	redirect('tiposangre');
 	}



	public function edit()
	{
	 	$data['tiposangre'] = $this->tiposangre_model->tiposangre($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tiposangre";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tiposangre_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtiposangre');
	 	$array_item=array(
		 	
		 	'idtiposangre' => $this->input->post('idtiposangre'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiposangre_model->update($id,$array_item);
	 	redirect('tiposangre');
 	}



 	public function delete()
 	{
 		$data=$this->tiposangre_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tiposangre/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tiposangre_list'] = $this->tiposangre_model->lista_tiposangresA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposangre_list',$data);
	$this->load->view('template/page_footer');
}



function tiposangre_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tiposangre_model->lista_tiposangresA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtiposangre,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtiposangre="'.$r->idtiposangre.'">Ver</a>');
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
	$data['tiposangre'] = $this->tiposangre_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tiposangre_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tiposangre'] = $this->tiposangre_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tiposangre_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tiposangre_list']=$this->tiposangre_model->lista_tiposangre()->result();
	$data['tiposangre'] = $this->tiposangre_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposangre_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tiposangre_list']=$this->tiposangre_model->lista_tiposangre()->result();
	$data['tiposangre'] = $this->tiposangre_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tiposangre_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tiposangre() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtiposangre')) {
        $this->db->select('*');
        $this->db->where(array('idtiposangre' => $this->input->post('idtiposangre')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
