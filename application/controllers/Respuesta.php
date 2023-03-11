<?php

class Respuesta extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('respuesta_model');
  	$this->load->model('pregunta_model');
}

public function index(){

  	$data['respuesta']=$this->respuesta_model->elultimo();
		$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Respuestaes";
	$this->load->view('template/page_header');		
 	 $this->load->view('respuesta_record',$data);
	$this->load->view('template/page_footer');
}


	public function add()
	{
			$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
			$data['title']="Nueva Respuesta";
			$this->load->view('template/page_header');		
			$this->load->view('respuesta_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'respuesta' => $this->input->post('respuesta'),
			'idpregunta' => $this->input->post('idpregunta'),
			'acierto' => $this->input->post('acierto'),
	 	);
	 	$this->respuesta_model->save($array_item);
	 	redirect('respuesta');
 	}



	public function edit()
	{
		$data['respuesta'] = $this->respuesta_model->respuesta($this->uri->segment(3))->row_array();
		$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
		$data['title'] = "Actualizar Respuesta";
		$this->load->view('template/page_header');		
		$this->load->view('respuesta_edit',$data);
		$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idrespuesta');
	 	$array_item=array(
		 	
		 	'idrespuesta' => $this->input->post('idrespuesta'),
		 	'respuesta' => $this->input->post('respuesta'),
			'idpregunta' => $this->input->post('idpregunta'),
			'acierto' => $this->input->post('acierto'),
	 	);
	 	$this->respuesta_model->update($id,$array_item);
	 	redirect('respuesta');
 	}

public function listar()
{
	
  $data['title']="Respuesta";
	$this->load->view('template/page_header');		
  $this->load->view('respuesta_list',$data);
	$this->load->view('template/page_footer');
}

function respuesta_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->respuesta_model->lista_respuesta();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idrespuesta,$r->respuesta, $r->idevaluacion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idrespuesta="'.$r->idrespuesta.'">Ver</a>');
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
	$data['respuesta'] = $this->respuesta_model->elprimero();
	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  if(!empty($data))
  {
    $data['title']="Respuesta";
    $this->load->view('template/page_header');		
    $this->load->view('respuesta_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['respuesta'] = $this->respuesta_model->elultimo();
	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  if(!empty($data))
  {
    $data['title']="Respuesta";
  
    $this->load->view('template/page_header');		
    $this->load->view('respuesta_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['respuesta_list']=$this->respuesta_model->lista_respuesta()->result();
	$data['respuesta'] = $this->respuesta_model->siguiente($this->uri->segment(3))->row_array();
	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  $data['title']="Respuesta";
	$this->load->view('template/page_header');		
  $this->load->view('respuesta_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['respuesta_list']=$this->respuesta_model->lista_respuesta()->result();
	$data['respuesta'] = $this->respuesta_model->anterior($this->uri->segment(3))->row_array();
	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  $data['title']="Respuesta";
	$this->load->view('template/page_header');		
  $this->load->view('respuesta_record',$data);
	$this->load->view('template/page_footer');
}



public function get_respuesta() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idpregunta')) {
        $this->db->select('*');
        $this->db->where(array('idpregunta' => $this->input->get('idpregunta')));
        $query = $this->db->get('respuesta');
	$data=$query->result();
	echo json_encode($data);
	}

}





}
