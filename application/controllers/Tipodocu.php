<?php

class Tipodocu extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tipodocu_model');
}

public function index(){
  	$data['tipodocu']=$this->tipodocu_model->tipodocu(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('tipodocu_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tipodocu_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idtipodocu' => $this->input->post('idtipodocu'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->tipodocu_model->save($array_item);
	 	redirect('tipodocu');
 	}



	public function edit()
	{
	 	$data['tipodocu'] = $this->tipodocu_model->tipodocu($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tipodocu";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tipodocu_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idtipodocu');
	 	$array_item=array(
		 	
		 	'idtipodocu' => $this->input->post('idtipodocu'),
		 	'descripcion' => $this->input->post('descripcion'),
	 	);
	 	$this->tipodocu_model->update($id,$array_item);
	 	redirect('tipodocu/actual/'.$id);
 	}



 	public function delete()
 	{
 		$data=$this->tipodocu_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tipodocu/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['tipodocu_list'] = $this->tipodocu_model->lista_tipodocusA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocu_list',$data);
	$this->load->view('template/page_footer');
}



function tipodocu_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tipodocu_model->lista_tipodocusA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtipodocu,$r->descripcion,$r->cantidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('tipodocu/actual').'"  data-idtipodocu="'.$r->idtipodocu.'">Ver</a>');
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
	$data['tipodocu'] = $this->tipodocu_model->tipodocu($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Tipo documento";
    		$this->load->view('template/page_header');		
    		$this->load->view('tipodocu_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }



public function elprimero()
{
	$data['tipodocu'] = $this->tipodocu_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('tipodocu_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tipodocu'] = $this->tipodocu_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('tipodocu_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tipodocu_list']=$this->tipodocu_model->lista_tipodocu()->result();
	$data['tipodocu'] = $this->tipodocu_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocu_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tipodocu_list']=$this->tipodocu_model->lista_tipodocu()->result();
	$data['tipodocu'] = $this->tipodocu_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('tipodocu_record',$data);
	$this->load->view('template/page_footer');
}



public function get_tipodocu() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idtipodocu')) {
        $this->db->select('*');
        $this->db->where(array('idtipodocu' => $this->input->post('idtipodocu')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
