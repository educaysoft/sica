<?php

class Areaconocimiento extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('areaconocimiento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['areaconocimiento']=$this->areaconocimiento_model->areaconocimiento(1)->row_array();
		$data['title']="Lista de areaconocimientoes";
		$this->load->view('template/page_header');
		$this->load->view('areaconocimiento_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva areaconocimiento";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('areaconocimiento_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idareaconocimiento' => $this->input->post('idareaconocimiento'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->areaconocimiento_model->save($array_item);
	 	redirect('areaconocimiento');
 	}



public function edit()
{
	 	$data['areaconocimiento'] = $this->areaconocimiento_model->areaconocimiento($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar areaconocimiento";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('areaconocimiento_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idareaconocimiento');
	 	$array_item=array(
		 	
		 	'idareaconocimiento' => $this->input->post('idareaconocimiento'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->areaconocimiento_model->update($id,$array_item);
	 	redirect('areaconocimiento');
 	}


 	public function delete()
 	{
 		$data=$this->areaconocimiento_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('areaconocimiento/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Areaconocimiento";
	$this->load->view('template/page_header');		
  $this->load->view('areaconocimiento_list',$data);
	$this->load->view('template/page_footer');
}



function areaconocimiento_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->areaconocimiento_model->lista_areaconocimientos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idareaconocimiento,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('areaconocimiento/actual').'"     data-idareaconocimiento="'.$r->idareaconocimiento.'">Ver</a>');
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
	$data['areaconocimiento'] = $this->areaconocimiento_model->areaconocimiento($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Areaconocimiento";
    $this->load->view('template/page_header');		
    $this->load->view('areaconocimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['areaconocimiento'] = $this->areaconocimiento_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Areaconocimiento";
    $this->load->view('template/page_header');		
    $this->load->view('areaconocimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['areaconocimiento'] = $this->areaconocimiento_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Areaconocimiento";
  
    $this->load->view('template/page_header');		
    $this->load->view('areaconocimiento_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['areaconocimiento_list']=$this->areaconocimiento_model->lista_areaconocimiento()->result();
	$data['areaconocimiento'] = $this->areaconocimiento_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Areaconocimiento";
	$this->load->view('template/page_header');		
  $this->load->view('areaconocimiento_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['areaconocimiento_list']=$this->areaconocimiento_model->lista_areaconocimiento()->result();
	$data['areaconocimiento'] = $this->areaconocimiento_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Areaconocimiento";
	$this->load->view('template/page_header');		
  $this->load->view('areaconocimiento_record',$data);
	$this->load->view('template/page_footer');
}

}
