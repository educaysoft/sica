<?php

class Comisionacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('comisionacademica_model');
}

public function index(){
  	$data['comisionacademica']=$this->comisionacademica_model->comisionacademica(1)->row_array();
 
  	$data['title']="Tipos de documentos";
	$this->load->view('template/page_header');		
  	$this->load->view('comisionacademica_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva Tipo de documento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('comisionacademica_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcomisionacademica' => $this->input->post('idcomisionacademica'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->comisionacademica_model->save($array_item);
	 	redirect('comisionacademica');
 	}



	public function edit()
	{
	 	$data['comisionacademica'] = $this->comisionacademica_model->comisionacademica($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar comisionacademica";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('comisionacademica_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcomisionacademica');
	 	$array_item=array(
		 	
		 	'idcomisionacademica' => $this->input->post('idcomisionacademica'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->comisionacademica_model->update($id,$array_item);
	 	redirect('comisionacademica');
 	}



 	public function delete()
 	{
 		$data=$this->comisionacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('comisionacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['comisionacademica_list'] = $this->comisionacademica_model->lista_comisionacademicasA()->result();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('comisionacademica_list',$data);
	$this->load->view('template/page_footer');
}



function comisionacademica_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->comisionacademica_model->lista_comisionacademicasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcomisionacademica,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcomisionacademica="'.$r->idcomisionacademica.'">Ver</a>');
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
	$data['comisionacademica'] = $this->comisionacademica_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
    $this->load->view('template/page_header');		
    $this->load->view('comisionacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['comisionacademica'] = $this->comisionacademica_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tipo documento";
  
    $this->load->view('template/page_header');		
    $this->load->view('comisionacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['comisionacademica_list']=$this->comisionacademica_model->lista_comisionacademica()->result();
	$data['comisionacademica'] = $this->comisionacademica_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('comisionacademica_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['comisionacademica_list']=$this->comisionacademica_model->lista_comisionacademica()->result();
	$data['comisionacademica'] = $this->comisionacademica_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tipo documento";
	$this->load->view('template/page_header');		
  $this->load->view('comisionacademica_record',$data);
	$this->load->view('template/page_footer');
}



public function get_comisionacademica() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idcomisionacademica')) {
        $this->db->select('*');
        $this->db->where(array('idcomisionacademica' => $this->input->post('idcomisionacademica')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
