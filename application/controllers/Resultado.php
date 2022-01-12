<?php

class Resultado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('resultado_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('evaluacion_model');
  	  $this->load->model('evaluado_model');
  	  $this->load->model('pregunta_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['resultado']=$this->resultado_model->lista_resultados()->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
			
		$data['title']="Lista de resultados";
		$this->load->view('template/page_header');
		$this->load->view('resultado_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }

public function add()
{
		$data['evaluados']= $this->evaluado_model->lista_evaluadosA()->result();
  	//	$data['preguntas']= $this->pregunta_model->lista_preguntas()->result();
  	//	$data['respuestas']= $this->respuesta_model->lista_respuestas()->result();
		$data['title']="Nueva Resultado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('resultado_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idevaluacion' => $this->input->post('idevaluacion'),
	 	);
	 	$this->resultado_model->save($array_item);
	 	redirect('resultado');
 	}



public function edit()
{
	 	$data['resultado'] = $this->resultado_model->resultado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Resultado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('resultado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idresultado');
	 	$array_item=array(
		 	
		 	'idresultado' => $this->input->post('idresultado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->resultado_model->update($id,$array_item);
	 	redirect('resultado');
 	}


 	public function delete()
 	{
 		$data=$this->resultado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('resultado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Resultados";
	$this->load->view('template/page_header');		
  $this->load->view('resultado_list',$data);
	$this->load->view('template/page_footer');
}



function resultado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->resultado_model->lista_resultadosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idresultado,$r->lapersona,$r->elresultado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idresultado="'.$r->idresultado.'">Ver</a>');
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
	$data['resultado'] = $this->resultado_model->elprimero();
  	$data['evaluacions']= $this->evaluacion_model->lista_evaluacion()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Resultado";
    $this->load->view('template/page_header');		
    $this->load->view('resultado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['resultado'] = $this->resultado_model->elultimo();
  	$data['evaluacions']= $this->evaluacion_model->lista_evaluacion()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_persona()->result();
    $data['title']="Resultado";
  
    $this->load->view('template/page_header');		
    $this->load->view('resultado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['resultado_list']=$this->resultado_model->lista_resultado()->result();
	$data['resultado'] = $this->resultado_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['evaluacions']= $this->evaluacion_model->lista_evaluacion()->result();
  $data['title']="Resultado";
	$this->load->view('template/page_header');		
  $this->load->view('resultado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['resultado_list']=$this->resultado_model->lista_resultado()->result();
	$data['resultado'] = $this->resultado_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_persona()->result();
  	$data['evaluacions']= $this->evaluacion_model->lista_evaluacion()->result();
  $data['title']="Resultado";
	$this->load->view('template/page_header');		
  $this->load->view('resultado_record',$data);
	$this->load->view('template/page_footer');
}




}
