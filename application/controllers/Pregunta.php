<?php

class Pregunta extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('pregunta_model');
  	$this->load->model('evaluacion_model');
}

public function index(){

  	$data['pregunta']=$this->pregunta_model->elultimo();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  
 // print_r($data['usuario_list']);
 	 $data['title']="Lista de Preguntaes";
	$this->load->view('template/page_header');		
 	 $this->load->view('pregunta_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
		$data['title']="Nueva Pregunta";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('pregunta_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'pregunta' => $this->input->post('pregunta'),
			'idevaluacion' => $this->input->post('idevaluacion'),
	 	);
	 	$this->pregunta_model->save($array_item);
	 	redirect('pregunta');
 	}



	public function edit()
	{
		$data['pregunta'] = $this->pregunta_model->pregunta($this->uri->segment(3))->row_array();
		$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
		$data['title'] = "Actualizar Pregunta";
		$this->load->view('template/page_header');		
		$this->load->view('pregunta_edit',$data);
		$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idpregunta');
	 	$array_item=array(
		 	
		 	'idpregunta' => $this->input->post('idpregunta'),
		 	'pregunta' => $this->input->post('pregunta'),
			'idevaluacion' => $this->input->post('idevaluacion'),
	 	);
	 	$this->pregunta_model->update($id,$array_item);
	 	redirect('pregunta/actual/'.$id);
 	}

public function listar()
{
	
  $data['title']="Pregunta";
	$this->load->view('template/page_header');		
  $this->load->view('pregunta_list',$data);
	$this->load->view('template/page_footer');
}

function pregunta_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->pregunta_model->lista_pregunta();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpregunta,$r->pregunta, $r->idevaluacion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idpregunta="'.$r->idpregunta.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}



	public function actual(){



	 // $data['documento_list']=$this->documento_model->lista_documento()->result();
	  	$data['pregunta'] = $this->pregunta_model->pregunta( $this->uri->segment(3))->row_array();
  		$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();


	  $data['title']="Preguntas:";
		$this->load->view('template/page_header');		
	  $this->load->view('pregunta_record',$data);
		$this->load->view('template/page_footer');
	}





public function elprimero()
{
	$data['pregunta'] = $this->pregunta_model->elprimero();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  if(!empty($data))
  {
    $data['title']="Pregunta";
    $this->load->view('template/page_header');		
    $this->load->view('pregunta_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['pregunta'] = $this->pregunta_model->elultimo();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  if(!empty($data))
  {
    $data['title']="Pregunta";
  
    $this->load->view('template/page_header');		
    $this->load->view('pregunta_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['pregunta_list']=$this->pregunta_model->lista_pregunta()->result();
	$data['pregunta'] = $this->pregunta_model->siguiente($this->uri->segment(3))->row_array();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  $data['title']="Pregunta";
	$this->load->view('template/page_header');		
  $this->load->view('pregunta_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['pregunta_list']=$this->pregunta_model->lista_pregunta()->result();
	$data['pregunta'] = $this->pregunta_model->anterior($this->uri->segment(3))->row_array();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  $data['title']="Pregunta";
	$this->load->view('template/page_header');		
  $this->load->view('pregunta_record',$data);
	$this->load->view('template/page_footer');
}



public function get_pregunta() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->get('idpregunta')) {
        $this->db->select('*');
        $this->db->where(array('idpregunta' => $this->input->get('idpregunta') ));
        $query = $this->db->get('pregunta');
	$data=$query->result();
	header('Content-Type: application/json');
	echo json_encode($data);
	}

}


public function get_preguntas() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idevaluacion')) {
        $this->db->select('*');
        $this->db->where(array('idevaluacion' => $this->input->post('idevaluacion') ));
        $query = $this->db->get('pregunta');
	$data=$query->result();
	echo json_encode($data);
	}

}







}
