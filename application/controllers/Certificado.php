<?php

class Certificado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('certificado_model');
      		$this->load->model('documento_model');
      		$this->load->model('evento_model');
      		$this->load->model('tipodocu_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	$data['certificado'] = $this->certificado_model->elultimo();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['title']="Lista de Empresas";
		$this->load->view('template/page_header');		
  		$this->load->view('certificado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['title']="Nuevo certificado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('certificado_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcertificado' => $this->input->post('idcertificado'),
	 	'idevento' => $this->input->post('idevento'),
	 	'idtipodocu' => $this->input->post('idtipodocu'),
	 	'iddocumento' => $this->input->post('iddocumento'),
	 	'propietario' => $this->input->post('propietario'),
	 	'archivo' => $this->input->post('archivo'),
	 	'posi_nomb_x' => $this->input->post('posi_nomb_x'),
	 	'posi_nomb_y' => $this->input->post('posi_nomb_y'),

	 	'posi_codigo_x' => $this->input->post('posi_codigo_x'),
	 	'posi_codigo_y' => $this->input->post('posi_codigo_y'),

	 	'posi_fecha_x' => $this->input->post('posi_fecha_x'),
	 	'posi_fecha_y' => $this->input->post('posi_fecha_y'),



	 	'ancho_x' => $this->input->post('ancho_x'),
	 	'alto_y' => $this->input->post('alto_y'),
		'correohead' => $this->input->post('correohead'),
		'correobody' => $this->input->post('correobody'),
		'correofoot' => $this->input->post('correofoot'),
	 	);
	 	$this->certificado_model->save($array_item);
	 	redirect('certificado');
 	}



public function edit()
{
	 	$data['certificado'] = $this->certificado_model->certificado($this->uri->segment(3))->row_array();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Certificado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('certificado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcertificado');
	 	$array_item=array(
		 	
		 	'idcertificado' => $this->input->post('idcertificado'),
		 	'idtipodocu' => $this->input->post('idtipodocu'),
	 		'idevento' => $this->input->post('idevento'),
	 		'idtipodocu' => $this->input->post('idtipodocu'),
	 		'iddocumento' => $this->input->post('iddocumento'),
		 	'posi_nomb_x' => $this->input->post('posi_nomb_x'),
		 	'posi_nomb_y' => $this->input->post('posi_nomb_y'),

			'posi_codigo_x' => $this->input->post('posi_codigo_x'),
			'posi_codigo_y' => $this->input->post('posi_codigo_y'),

			'posi_fecha_x' => $this->input->post('posi_fecha_x'),
			'posi_fecha_y' => $this->input->post('posi_fecha_y'),
		 	'ancho_x' => $this->input->post('ancho_x'),
		 	'alto_y' => $this->input->post('alto_y'),
			'correohead' => $this->input->post('correohead'),
			'correobody' => $this->input->post('correobody'),
			'correofoot' => $this->input->post('correofoot'),
	 	);
	 	$this->certificado_model->update($id,$array_item);
	 	redirect('certificado');
 	}


 	public function delete()
 	{
 		$data=$this->certificado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('certificado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function listar()
{
	
  $data['certificado'] = $this->certificado_model->lista_certificadoes()->result();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('certificado_list',$data);
	$this->load->view('template/page_footer');
}

function certificado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->certificado_model->lista_certificadoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcertificado,$r->propietario,$r->archivo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcertificado="'.$r->idcertificado.'"  data-ubicacion="'.$r->ubicacion.'"  data-archivo="'.$r->archivo.'">Ver</a>');
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
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['certificado'] = $this->certificado_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Certificado";
    $this->load->view('template/page_header');		
    $this->load->view('certificado_record',$data);
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
	$data['certificado'] = $this->certificado_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Certificado";
  
    $this->load->view('template/page_header');		
    $this->load->view('certificado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['certificado_list']=$this->certificado_model->lista_certificado()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['certificado'] = $this->certificado_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('certificado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 // $data['certificado_list']=$this->certificado_model->lista_certificado()->result();
	$data['certificado'] = $this->certificado_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Certificado";
	$this->load->view('template/page_header');		
  $this->load->view('certificado_record',$data);
	$this->load->view('template/page_footer');
}





}
