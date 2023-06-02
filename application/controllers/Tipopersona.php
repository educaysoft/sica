<?php

class Tipopersona extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipopersona_model');
}

public function index(){
  	$data['tipopersona']=$this->tipopersona_model->tipopersona(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tipopersona_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipopersona_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipopersona' => $this->input->post('idtipopersona'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->tipopersona_model->save($array_item);
	 	redirect('tipopersona');
 	}



	public function edit()
	{
	 	$data['tipopersona'] = $this->tipopersona_model->tipopersona($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipopersona";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipopersona_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipopersona');
	 	$array_item=array(
		 	
		 	'idtipopersona' => $this->input->post('idtipopersona'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->tipopersona_model->update($id,$array_item);
	 	redirect('tipopersona');
 	}



 	public function delete()
 	{
 		$data=$this->tipopersona_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipopersona/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipopersona_list'] = $this->tipopersona_model->lista_tipopersonasA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipopersona_list',$data);
	$this->load->view('template/page_footer');
}



function tipopersona_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipopersona_model->lista_tipopersonasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipopersona,$r->descripcion,$r->cantidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtipopersona="'.$r->idtipopersona.'">Ver</a>');
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
	$data['tipopersona'] = $this->tipopersona_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tipopersona_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipopersona'] = $this->tipopersona_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipopersona_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipopersona_list']=$this->tipopersona_model->lista_tipopersona()->result();
	$data['tipopersona'] = $this->tipopersona_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipopersona_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipopersona_list']=$this->tipopersona_model->lista_tipopersona()->result();
	$data['tipopersona'] = $this->tipopersona_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipopersona_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipopersona() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipopersona')) {
        $this->db->select('*');
        $this->db->where(array('idtipopersona' => $this->input->post('idtipopersona')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
