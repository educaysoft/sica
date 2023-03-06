<?php

class Tramite extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tramite_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('ubicaciontramite_model');
  	  $this->load->model('persona_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['tramite']=$this->tramite_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('tramite_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tramite_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtramite' => $this->input->post('idtramite'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->tramite_model->save($array_item);
	 	redirect('tramite');
 	}



public function edit()
{
	 	$data['tramite'] = $this->tramite_model->tramite($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Tramite";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tramite_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtramite');
	 	$array_item=array(
		 	
		 	'idtramite' => $this->input->post('idtramite'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 		'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->tramite_model->update($id,$array_item);
	 	redirect('tramite');
 	}



public function listar()
{
	
  $data['title']="Tramite";
	$this->load->view('template/page_header');		
  $this->load->view('tramite_list',$data);
	$this->load->view('template/page_footer');
}

function tramite_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tramite_model->lista_tramites();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtramite,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('tramite/actual').'"  data-idtramite="'.$r->idtramite.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




	function ubicacion_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idtramite=$this->input->get('idtramite');
			$data0 =$this->ubicaciontramite_model->ubicaciontramitesA($idtramite);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicaciontramite,$r->idtramite,$r->eldepartamento,$r->lapersona,$r->fecha,$r->hora,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicaciontramite/actual').'"    data-idubicaciontramite="'.$r->idubicaciontramite.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicaciontramite/edit').'"    data-idubicaciontramite="'.$r->idubicaciontramite.'">edit</a>');
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
	$data['tramite'] = $this->tramite_model->tramite($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Tramite";
    $this->load->view('template/page_header');		
    $this->load->view('tramite_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['tramite'] = $this->tramite_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Tramite";
    $this->load->view('template/page_header');		
    $this->load->view('tramite_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['tramite'] = $this->tramite_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Tramite";
  
    $this->load->view('template/page_header');		
    $this->load->view('tramite_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tramite_list']=$this->tramite_model->lista_tramite()->result();
	$data['tramite'] = $this->tramite_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Tramite";
	$this->load->view('template/page_header');		
  $this->load->view('tramite_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tramite_list']=$this->tramite_model->lista_tramite()->result();
	$data['tramite'] = $this->tramite_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Tramite";
	$this->load->view('template/page_header');		
  $this->load->view('tramite_record',$data);
	$this->load->view('template/page_footer');
}





}
