<?php

class Plantillacorreo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('plantillacorreo_model');
      		$this->load->model('documento_model');
      		$this->load->model('evento_model');
      		$this->load->model('tipodocu_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	$data['plantillacorreo'] = $this->plantillacorreo_model->elultimo();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['title']="Lista de Empresas";
		$this->load->view('template/page_header');		
  		$this->load->view('plantillacorreo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nuevo plantillacorreo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('plantillacorreo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idplantillacorreo' => $this->input->post('idplantillacorreo'),
		'body' => $this->input->post('body'),
		'head' => $this->input->post('head'),
		'subject' => $this->input->post('subject'),
		'foot' => $this->input->post('foot'),
	 	);
	 	$this->plantillacorreo_model->save($array_item);
	 	redirect('plantillacorreo');
 	}



public function edit()
{
	 	$data['plantillacorreo'] = $this->plantillacorreo_model->plantillacorreo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Plantillacorreo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('plantillacorreo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idplantillacorreo');
	 	$array_item=array(
		 	
		 	'idplantillacorreo' => $this->input->post('idplantillacorreo'),
		 	'body' => $this->input->post('body'),
			'head' => $this->input->post('head'),
			'subject' => $this->input->post('subject'),
			'foot' => $this->input->post('foot'),

	 	);
	 	$this->plantillacorreo_model->update($id,$array_item);
	 	redirect('plantillacorreo');
 	}


 	public function delete()
 	{
 		$data=$this->plantillacorreo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('plantillacorreo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function listar()
{
	
  $data['plantillacorreo'] = $this->plantillacorreo_model->lista_plantillacorreos1()->result();
  $data['title']="Plantillacorreo";
	$this->load->view('template/page_header');		
  $this->load->view('plantillacorreo_list',$data);
	$this->load->view('template/page_footer');
}

function plantillacorreo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->plantillacorreo_model->lista_plantillacorreos1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idplantillacorreo,$r->propietario,$r->archivo,$r->eldocumento,$r->elevento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idplantillacorreo="'.$r->idplantillacorreo.'"  data-ubicacion="'.$r->ubicacion.'"  data-archivo="'.$r->archivo.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ir" data-retorno="'.site_url('plantillacorreo/actual').'"    data-idplantillacorreo="'.$r->idplantillacorreo.'">ir</a>');
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
	$data['plantillacorreo'] = $this->plantillacorreo_model->plantillacorreo($this->uri->segment(3))->row_array();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  if(!empty($data))
  {
    $data['title']="Plantillacorreo";
    $this->load->view('template/page_header');		
    $this->load->view('plantillacorreo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }





public function elprimero()
{
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['plantillacorreo'] = $this->plantillacorreo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Plantillacorreo";
    $this->load->view('template/page_header');		
    $this->load->view('plantillacorreo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['plantillacorreo'] = $this->plantillacorreo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Plantillacorreo";
  
    $this->load->view('template/page_header');		
    $this->load->view('plantillacorreo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['plantillacorreo_list']=$this->plantillacorreo_model->lista_plantillacorreo()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['plantillacorreo'] = $this->plantillacorreo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Plantillacorreo";
	$this->load->view('template/page_header');		
  $this->load->view('plantillacorreo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 // $data['plantillacorreo_list']=$this->plantillacorreo_model->lista_plantillacorreo()->result();
	$data['plantillacorreo'] = $this->plantillacorreo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Plantillacorreo";
	$this->load->view('template/page_header');		
  $this->load->view('plantillacorreo_record',$data);
	$this->load->view('template/page_footer');
}





}
