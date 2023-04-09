<?php

class Nivelestudio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('nivelestudio_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['nivelestudio']=$this->nivelestudio_model->nivelestudio(1)->row_array();
		$data['title']="Lista de nivelestudioes";
		$this->load->view('template/page_header');
		$this->load->view('nivelestudio_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva nivelestudio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('nivelestudio_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idnivelestudio' => $this->input->post('idnivelestudio'),
	 	'nombre' => $this->input->post('nombre'),
	 	'numero' => $this->input->post('numero'),
	 	);
	 	$this->nivelestudio_model->save($array_item);
	 	redirect('nivelestudio');
 	}



public function edit()
{
	 	$data['nivelestudio'] = $this->nivelestudio_model->nivelestudio($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar nivelestudio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('nivelestudio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idnivelestudio');
	 	$array_item=array(
		 	
		 	'idnivelestudio' => $this->input->post('idnivelestudio'),
		 	'nombre' => $this->input->post('nombre'),
	 		'numero' => $this->input->post('numero'),
	 	);
	 	$this->nivelestudio_model->update($id,$array_item);
	 	redirect('nivelestudio');
 	}


 	public function delete()
 	{
 		$data=$this->nivelestudio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('nivelestudio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Nivelestudio";
	$this->load->view('template/page_header');		
  $this->load->view('nivelestudio_list',$data);
	$this->load->view('template/page_footer');
}



function nivelestudio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->nivelestudio_model->lista_nivelestudios();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idnivelestudio,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('nivelestudio/actual').'"     data-idnivelestudio="'.$r->idnivelestudio.'">Ver</a>');
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
	$data['nivelestudio'] = $this->nivelestudio_model->nivelestudio($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Nivelestudio";
    $this->load->view('template/page_header');		
    $this->load->view('nivelestudio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['nivelestudio'] = $this->nivelestudio_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Nivelestudio";
    $this->load->view('template/page_header');		
    $this->load->view('nivelestudio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['nivelestudio'] = $this->nivelestudio_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Nivelestudio";
  
    $this->load->view('template/page_header');		
    $this->load->view('nivelestudio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['nivelestudio_list']=$this->nivelestudio_model->lista_nivelestudio()->result();
	$data['nivelestudio'] = $this->nivelestudio_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Nivelestudio";
	$this->load->view('template/page_header');		
  $this->load->view('nivelestudio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['nivelestudio_list']=$this->nivelestudio_model->lista_nivelestudio()->result();
	$data['nivelestudio'] = $this->nivelestudio_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Nivelestudio";
	$this->load->view('template/page_header');		
  $this->load->view('nivelestudio_record',$data);
	$this->load->view('template/page_footer');
}

}
