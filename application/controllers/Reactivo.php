<?php

class Reactivo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('reactivo_model');
      $this->load->model('pregunta_model');
      $this->load->model('respuesta_model');
      $this->load->model('evento_model');
      $this->load->model('silabo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
	  	$data['reactivo']=$this->reactivo_model->elultimo();
  		$data['title']="Reactivo # :";
			$this->load->view('template/page_header');		
  		$this->load->view('reactivo_record',$data);
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
		$data['title']="Nuevo Reactivo :";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('reactivo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idreactivo' => $this->input->post('idreactivo'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
		'idevento' => $this->input->post('idevento'),
		'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->reactivo_model->save($array_item);
	 	redirect('reactivo');
 	}



	public function edit()
	{
			$data['reactivo'] = $this->reactivo_model->reactivo($this->uri->segment(3))->row_array();
			$data['eventos']= $this->evento_model->lista_eventos()->result();
			$data['title'] = "Actualizar Reactivo";
			$this->load->view('template/page_header');		
			$this->load->view('reactivo_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idreactivo');
	 	$array_item=array(
		 	
		 	'idreactivo' => $this->input->post('idreactivo'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
			'idevento' => $this->input->post('idevento'),
			'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->reactivo_model->update($id,$array_item);
	 	redirect('reactivo');
 	}


public function listar()
{
	
  $data['reactivo'] = $this->reactivo_model->lista_reactivoes()->result();
  $data['title']="Reactivo";
	$this->load->view('template/page_header');		
  $this->load->view('reactivo_list',$data);
	$this->load->view('template/page_footer');
}


function reactivo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->reactivo_model->lista_reactivoes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreactivo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('pregunta/actual').'"   data-idreactivo="'.$r->idreactivo.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}






function reactivo_pregunta()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


		$idreactivo=$this->input->get('idreactivo');
	 	$data0 = $this->pregunta_model->preguntasxreactivo($idreactivo);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreactivo,$r->idpregunta,$r->pregunta,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('pregunta/actual').'"   data-idpregunta="'.$r->idpregunta.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_resp" data-retorno="'.site_url('respuesta/add').'"   data-idpregunta="'.$r->idpregunta.'">Respuesta</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




function reactivo_respuesta()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$idreactivo=$this->input->get('idreactivo');
	 	$data0 = $this->respuesta_model->respuestasxreactivo($idreactivo);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreactivo,$r->idpregunta,$r->idrespuesta,$r->respuesta,$r->acierto,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver2" data-retorno="'.site_url('respuesta/actual').'"  data-idrespuesta="'.$r->idrespuesta.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



function reactivo_respuesta2()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$idpregunta=$this->input->get('idpregunta');
	 	$data0 = $this->respuesta_model->respuestasxpregunta($idpregunta);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreactivo,$r->idpregunta,$r->idrespuesta,$r->respuesta,$r->acierto,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver2" data-retorno="'.site_url('respuesta/actual').'"  data-idrespuesta="'.$r->idrespuesta.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}











	public function reportepdf()
	{

	 	$data['reactivo'] = $this->reactivo_model->reactivo($this->uri->segment(3))->row_array();
	 	$data['reactivos'] = $this->reactivo_model->reactivo($this->uri->segment(3))->result();
		$data['evento'] = $this->evento_model->evento($data['reactivo']['idevento'])->row_array();
		$data['silabo']=$this->silabo_model->silabo1($data['evento']['idsilabo'])->result();
	 	$data['pregunta'] = $this->pregunta_model->preguntasxreactivo($data['reactivo']['idreactivo'])->row_array();
	 	$data['preguntas'] = $this->pregunta_model->preguntasxreactivo($data['reactivo']['idreactivo'])->result();
	 	$data['respuesta'] = $this->respuesta_model->respuestasxreactivo($data['reactivo']['idreactivo'])->row_array();
	 	$data['respuestas'] = $this->respuesta_model->respuestasxreactivo($data['reactivo']['idreactivo'])->result();
		$data['title']="Reactivo";
		$this->load->view('reactivo_list_pdf',$data);
	}



public function actual()
{
 if(isset($this->session->userdata['logged_in'])){
	$data['reactivo'] = $this->reactivo_model->reactivo($this->uri->segment(3))->row_array();
  	$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Reactivo";
    $this->load->view('template/page_header');		
    $this->load->view('reactivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
	$this->load->view('login_form');
    $this->load->view('template/page_footer');
  }
 }















public function elprimero()
{
	$data['reactivo'] = $this->reactivo_model->elprimero();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Reactivo";
    $this->load->view('template/page_header');		
    $this->load->view('reactivo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['reactivo'] = $this->reactivo_model->elultimo();
  if(!empty($data))
  {
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
    $data['title']="Reactivo";
  
    $this->load->view('template/page_header');		
    $this->load->view('reactivo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['reactivo_list']=$this->reactivo_model->lista_reactivo()->result();
	$data['reactivo'] = $this->reactivo_model->siguiente($this->uri->segment(3))->row_array();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Reactivo";
	$this->load->view('template/page_header');		
  $this->load->view('reactivo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['reactivo_list']=$this->reactivo_model->lista_reactivo()->result();
	$data['reactivo'] = $this->reactivo_model->anterior($this->uri->segment(3))->row_array();
  		$data['eventos']= $this->evento_model->lista_eventos()->result();
  $data['title']="Reactivo";
	$this->load->view('template/page_header');		
  $this->load->view('reactivo_record',$data);
	$this->load->view('template/page_footer');
}


	public function imprimir(){
	 	$data['reactivo'] = $this->reactivo_model->reactivo($this->uri->segment(3))->result();
//		print_r($data['reactivo']);
//		die();

	 	$data['preguntas'] = $this->pregunta_model->preguntasxreactivo($this->uri->segment(3))->result();
		$data['res']=$this->respuesta_model;
 		$data['title'] = $data['reactivo'][0]->nombre;
 		$data['detalle'] = $data['reactivo'][0]->detalle;
 
		$this->load->view('reactivo_informe',$data);
 	}


public function get_reactivo() {
    $this->load->database();
    $this->load->helper('form');

    if($this->input->get('idreactivo')) {
        $this->db->select('*');
        $this->db->where(array('idreactivo' => $this->input->get('idreactivo')));
        $query = $this->db->get('reactivo');
	$data=$query->first_row('array');
	header('Content-Type: application/json');
	echo json_encode($data);
	}

}






}
