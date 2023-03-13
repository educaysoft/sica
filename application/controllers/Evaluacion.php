<?php

class Evaluacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('evaluacion_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('pregunta_model');
  	  $this->load->model('respuesta_model');
  	  $this->load->model('participacion_model');

}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['evaluacion']=$this->evaluacion_model->lista_evaluacions()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
			
		$data['title']="Lista de evaluacions";
		$this->load->view('template/page_header');
		$this->load->view('evaluacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntaes']= $this->pregunta_model->lista_preguntaes()->result();
		$data['title']="Nueva Evaluacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('evaluacion_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'idpersona' => $this->input->post('idpersona'),
			'idpregunta' => $this->input->post('idpregunta'),
			'acierto' => $this->input->post('acierto'),
	 	);
	 	$this->evaluacion_model->save($array_item);
	 	redirect('evaluacion');
 	}

	public function  save2()
	{

   		date_default_timezone_set('America/Guayaquil');
    		$fecha = date("Y-m-d");
    		$hora= date("H:i:s");

	 	$arra=array(
			'idpersona' => $this->input->get('idpersona'),
			'fecha'=> $this->input->get('fecha'),
			'idreactivo' => $this->input->get('idreactivo')
		);
	 	$arrb=array(
			'idevaluacionpersona' => 0,
			'idpregunta' => $this->input->get('idpregunta'),
			'idrespuesta' => $this->input->get('idrespuesta'),
			'acierto' => $this->input->get('acierto')
	 	);
	 	$result =$this->evaluacion_model->save($arra,$arrb);
		if($result["idevaluacionpersona"]>0)
		{
	 	$array_item=array(
		 	'idpersona' => $this->input->get('idpersona'),
		 	'idevento' => $this->input->get('idevento'),
		 	'fecha' => $this->input->get('fecha'),
		 	'porcentaje' =>  $result['porcentaje'],
		 	'ayuda' => 0,
		 	'comentario' => "toma de evaluacion",
	 	);

	 	$result2=$this->participacion_model->save($array_item);
		}
		echo $result;
 	}



public function edit()
{
	 	$data['evaluacion'] = $this->evaluacion_model->evaluacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Evaluacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('evaluacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idevaluacion');
	 	$array_item=array(
		 	
		 	'idevaluacion' => $this->input->post('idevaluacion'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->evaluacion_model->update($id,$array_item);
	 	redirect('evaluacion');
 	}


 	public function delete()
 	{
 		$data=$this->evaluacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('evaluacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Evaluacions";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_list',$data);
	$this->load->view('template/page_footer');
}



function evaluacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->evaluacion_model->lista_evaluacionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idevaluacion,$r->lapersona,$r->elevaluacion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idevaluacion="'.$r->idevaluacion.'">Ver</a>');
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
	$data['evaluacion'] = $this->evaluacion_model->elprimero();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
    $data['title']="Evaluacion";
    $this->load->view('template/page_header');		
    $this->load->view('evaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['evaluacion'] = $this->evaluacion_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
    $data['title']="Evaluacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('evaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['evaluacion_list']=$this->evaluacion_model->lista_evaluacion()->result();
	$data['evaluacion'] = $this->evaluacion_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
  $data['title']="Evaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['evaluacion_list']=$this->evaluacion_model->lista_evaluacion()->result();
	$data['evaluacion'] = $this->evaluacion_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
  $data['title']="Evaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('evaluacion_record',$data);
	$this->load->view('template/page_footer');
}

public function get_evaluacion() {
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $this->db->where(array('idpregunta' => $this->input->get('idpregunta'),'idpersona' =>$this->input->get('idpersona')));
        $query = $this->db->get('evaluacion1');
	$data=$query->result();
	header('Content-Type: application/json');
	echo json_encode($data);

}




}
