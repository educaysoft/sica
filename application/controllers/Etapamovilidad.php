<?php

class Etapamovilidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('etapamovilidad_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['etapamovilidad']=$this->etapamovilidad_model->etapamovilidad(1)->row_array();
		$data['title']="Lista de etapamovilidades";
		$this->load->view('template/page_header');
		$this->load->view('etapamovilidad_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva etapamovilidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('etapamovilidad_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idetapamovilidad' => $this->input->post('idetapamovilidad'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->etapamovilidad_model->save($array_item);
	 	redirect('etapamovilidad');
 	}



public function edit()
{
	 	$data['etapamovilidad'] = $this->etapamovilidad_model->etapamovilidad($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar etapamovilidad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('etapamovilidad_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idetapamovilidad');
	 	$array_item=array(
		 	
		 	'idetapamovilidad' => $this->input->post('idetapamovilidad'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->etapamovilidad_model->update($id,$array_item);
	 	redirect('etapamovilidad');
 	}


 	public function delete()
 	{
 		$data=$this->etapamovilidad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('etapamovilidad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Etapamovilidad";
	$this->load->view('template/page_header');		
  $this->load->view('etapamovilidad_list',$data);
	$this->load->view('template/page_footer');
}



function etapamovilidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->etapamovilidad_model->lista_etapamovilidads();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idetapamovilidad,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('etapamovilidad/actual').'" data-idetapamovilidad="'.$r->idetapamovilidad.'">Ver</a>');
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
	$data['etapamovilidad'] = $this->etapamovilidad_model->etapamovilidad($this->uri->segment(3))->row_array();
  	if(!empty($data))
  	{
    		$data['title']="Etapamovilidad";
    		$this->load->view('template/page_header');		
    		$this->load->view('etapamovilidad_record',$data);
    		$this->load->view('template/page_footer');
  	}else{
    		$this->load->view('template/page_header');		
    		$this->load->view('registro_vacio');
    		$this->load->view('template/page_footer');
  	}
 }










public function elprimero()
{
	$data['etapamovilidad'] = $this->etapamovilidad_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Etapamovilidad";
    $this->load->view('template/page_header');		
    $this->load->view('etapamovilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['etapamovilidad'] = $this->etapamovilidad_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Etapamovilidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('etapamovilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['etapamovilidad_list']=$this->etapamovilidad_model->lista_etapamovilidad()->result();
	$data['etapamovilidad'] = $this->etapamovilidad_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Etapamovilidad";
	$this->load->view('template/page_header');		
  $this->load->view('etapamovilidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['etapamovilidad_list']=$this->etapamovilidad_model->lista_etapamovilidad()->result();
	$data['etapamovilidad'] = $this->etapamovilidad_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Etapamovilidad";
	$this->load->view('template/page_header');		
  $this->load->view('etapamovilidad_record',$data);
	$this->load->view('template/page_footer');
}

}
