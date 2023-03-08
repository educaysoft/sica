<?php

class Proceso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('proceso_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('ubicacionproceso_model');
  	  $this->load->model('persona_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['proceso']=$this->proceso_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['title']="Lista de Artiulos";
		$this->load->view('template/page_header');		
  		$this->load->view('proceso_record',$data);
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
	 	$this->load->view('proceso_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idproceso' => $this->input->post('idproceso'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->proceso_model->save($array_item);
	 	redirect('proceso');
 	}



public function edit()
{
	 	$data['proceso'] = $this->proceso_model->proceso($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
 	 	$data['title'] = "Actualizar Proceso";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('proceso_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idproceso');
	 	$array_item=array(
		 	
		 	'idproceso' => $this->input->post('idproceso'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 		'idpersona' => $this->input->post('idpersona'),
	 	);
	 	$this->proceso_model->update($id,$array_item);
	 	redirect('proceso');
 	}



public function listar()
{
	
  $data['title']="Proceso";
	$this->load->view('template/page_header');		
  $this->load->view('proceso_list',$data);
	$this->load->view('template/page_footer');
}

function proceso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->proceso_model->lista_procesos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idproceso,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('proceso/actual').'"  data-idproceso="'.$r->idproceso.'">Ver</a>');
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

			$idproceso=$this->input->get('idproceso');
			$data0 =$this->ubicacionproceso_model->ubicacionprocesosA($idproceso);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idubicacionproceso,$r->idproceso,$r->eldepartamento,$r->lapersona,$r->fecha,$r->hora,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionproceso/actual').'"    data-idubicacionproceso="'.$r->idubicacionproceso.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('ubicacionproceso/edit').'"    data-idubicacionproceso="'.$r->idubicacionproceso.'">edit</a>');
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
	$data['proceso'] = $this->proceso_model->proceso($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Proceso";
    $this->load->view('template/page_header');		
    $this->load->view('proceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['proceso'] = $this->proceso_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Proceso";
    $this->load->view('template/page_header');		
    $this->load->view('proceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['proceso'] = $this->proceso_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  if(!empty($data))
  {
    $data['title']="Proceso";
  
    $this->load->view('template/page_header');		
    $this->load->view('proceso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['proceso_list']=$this->proceso_model->lista_proceso()->result();
	$data['proceso'] = $this->proceso_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Proceso";
	$this->load->view('template/page_header');		
  $this->load->view('proceso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['proceso_list']=$this->proceso_model->lista_proceso()->result();
	$data['proceso'] = $this->proceso_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 		$data['personas']= $this->persona_model->lista_personas()->result();
  $data['title']="Proceso";
	$this->load->view('template/page_header');		
  $this->load->view('proceso_record',$data);
	$this->load->view('template/page_footer');
}





}
