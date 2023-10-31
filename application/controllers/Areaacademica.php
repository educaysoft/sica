<?php

class Areaacademica extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('areaacademica_model');
}

public function index(){
  	$data['areaacademica']=$this->areaacademica_model->areaacademica(1)->row_array();
 
  	$data['title']="Areas académicas";
	$this->load->view('template/page_header');		
  	$this->load->view('areaacademica_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['title']="Nueva área académica";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('areaacademica_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idareaacademica' => $this->input->post('idareaacademica'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->areaacademica_model->save($array_item);
	 	redirect('areaacademica');
 	}



	public function edit()
	{
	 	$data['areaacademica'] = $this->areaacademica_model->areaacademica($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar areaacademica";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('areaacademica_edit',$data);
	 	$this->load->view('template/page_footer');
 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idareaacademica');
	 	$array_item=array(
		 	
		 	'idareaacademica' => $this->input->post('idareaacademica'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->areaacademica_model->update($id,$array_item);
	 	redirect('areaacademica');
 	}



 	public function delete()
 	{
 		$data=$this->areaacademica_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('areaacademica/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
 // $data['areaacademica_list'] = $this->areaacademica_model->lista_areaacademicasA()->result();
  $data['title']="Areas academicas";
	$this->load->view('template/page_header');		
  $this->load->view('areaacademica_list',$data);
	$this->load->view('template/page_footer');
}



function areaacademica_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idareaacademica=$this->input->get('idareaacademica');

	 	$data0 = $this->areaacademica_model->lista_areaacademicasA($idareaacademica);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idareaacademica,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('areaacademica/actual').'"  data-idareaacademica="'.$r->idareaacademica.'">Ver</a>');
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
	$data['areaacademica'] = $this->areaacademica_model->areaacademica($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Area académica";
    $this->load->view('template/page_header');		
    $this->load->view('areaacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }









public function elprimero()
{
	$data['areaacademica'] = $this->areaacademica_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Area académica";
    $this->load->view('template/page_header');		
    $this->load->view('areaacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['areaacademica'] = $this->areaacademica_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Area académnica";
  
    $this->load->view('template/page_header');		
    $this->load->view('areaacademica_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['areaacademica_list']=$this->areaacademica_model->lista_areaacademica()->result();
	$data['areaacademica'] = $this->areaacademica_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Area académica";
	$this->load->view('template/page_header');		
  $this->load->view('areaacademica_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['areaacademica_list']=$this->areaacademica_model->lista_areaacademica()->result();
	$data['areaacademica'] = $this->areaacademica_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Area académica";
	$this->load->view('template/page_header');		
  $this->load->view('areaacademica_record',$data);
	$this->load->view('template/page_footer');
}



public function get_areaacademica() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idareaacademica')) {
        $this->db->select('*');
        $this->db->where(array('idareaacademica' => $this->input->post('idareaacademica')));
        $query = $this->db->get('documento');
	$data=$query->result();
	echo json_encode($data);
	}

}









}
