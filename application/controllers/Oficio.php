<?php

class Oficio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('oficio_model');
      		$this->load->model('documento_model');
      		$this->load->model('evento_model');
      		$this->load->model('tipodocu_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	$data['oficio'] = $this->oficio_model->elultimo();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
  		$data['title']="Lista de Empresas";
		$this->load->view('template/page_header');		
  		$this->load->view('oficio_record',$data);
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
		$data['title']="Nuevo oficio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('oficio_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idoficio' => $this->input->post('idoficio'),
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


		'firma1_x' => $this->input->post('firma1_x'),
		'firma1_y' => $this->input->post('firma1_y'),

		'firma2_x' => $this->input->post('firma2_x'),
		'firma2_y' => $this->input->post('firma2_y'),

		'firma3_x' => $this->input->post('firma3_x'),
		'firma3_y' => $this->input->post('firma3_y'),

	 	'ancho_x' => $this->input->post('ancho_x'),
	 	'alto_y' => $this->input->post('alto_y'),
		'correohead' => $this->input->post('correohead'),
		'correosubject' => $this->input->post('correosubject'),
		'correofoot' => $this->input->post('correofoot'),
	 	);
	 	$this->oficio_model->save($array_item);
	 	redirect('oficio');
 	}



public function edit()
{
	 	$data['oficio'] = $this->oficio_model->oficio($this->uri->segment(3))->row_array();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 	 	$data['title'] = "Actualizar Oficio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('oficio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idoficio');
	 	$array_item=array(
		 	
		 	'idoficio' => $this->input->post('idoficio'),
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

		 	'firma1_x' => $this->input->post('firma1_x'),
		 	'firma1_y' => $this->input->post('firma1_y'),


		 	'firma2_x' => $this->input->post('firma2_x'),
		 	'firma2_y' => $this->input->post('firma2_y'),


		 	'firma3_x' => $this->input->post('firma3_x'),
		 	'firma3_y' => $this->input->post('firma3_y'),


			'correohead' => $this->input->post('correohead'),
			'correosubject' => $this->input->post('correosubject'),
			'correofoot' => $this->input->post('correofoot'),

	 	);
	 	$this->oficio_model->update($id,$array_item);
	 	redirect('oficio');
 	}


 	public function delete()
 	{
 		$data=$this->oficio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('oficio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}






public function listar()
{
	
  $data['oficio'] = $this->oficio_model->lista_oficioes()->result();
  $data['title']="Oficio";
	$this->load->view('template/page_header');		
  $this->load->view('oficio_list',$data);
	$this->load->view('template/page_footer');
}

function oficio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->oficio_model->lista_oficioes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idoficio,$r->propietario,$r->archivo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idoficio="'.$r->idoficio.'"  data-ubicacion="'.$r->ubicacion.'"  data-archivo="'.$r->archivo.'">Ver</a>');
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
	$data['oficio'] = $this->oficio_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Oficio";
    $this->load->view('template/page_header');		
    $this->load->view('oficio_record',$data);
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
	$data['oficio'] = $this->oficio_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Oficio";
  
    $this->load->view('template/page_header');		
    $this->load->view('oficio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['oficio_list']=$this->oficio_model->lista_oficio()->result();
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['oficio'] = $this->oficio_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Oficio";
	$this->load->view('template/page_header');		
  $this->load->view('oficio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
		$data['eventos']= $this->evento_model->lista_eventos()->result();
		$data['tipodocus']= $this->tipodocu_model->lista_tipodocu()->result();
		$data['documentos']= $this->documento_model->lista_documentos()->result();
 // $data['oficio_list']=$this->oficio_model->lista_oficio()->result();
	$data['oficio'] = $this->oficio_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Oficio";
	$this->load->view('template/page_header');		
  $this->load->view('oficio_record',$data);
	$this->load->view('template/page_footer');
}





}
