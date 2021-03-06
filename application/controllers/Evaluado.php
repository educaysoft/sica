<?php

class Evaluado extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('evaluado_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('pregunta_model');
  	  $this->load->model('respuesta_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['evaluado']=$this->evaluado_model->lista_evaluados()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
			
		$data['title']="Lista de evaluados";
		$this->load->view('template/page_header');
		$this->load->view('evaluado_record',$data);
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
		$data['title']="Nueva Evaluado";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('evaluado_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idpregunta' => $this->input->post('idpregunta'),
			'acierto' => $this->input->post('acierto'),
	 	);
	 	$this->evaluado_model->save($array_item);
	 	redirect('evaluado');
 	}

	public function  save2()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idpregunta' => $this->input->post('idpregunta'),
			'idrespuesta' => $this->input->post('idrespuesta'),
			'acierto' => $this->input->post('acierto'),
	 	);
	 	$result =$this->evaluado_model->save($array_item);
		echo $result;
 	}



public function edit()
{
	 	$data['evaluado'] = $this->evaluado_model->evaluado($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Evaluado";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('evaluado_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idevaluado');
	 	$array_item=array(
		 	
		 	'idevaluado' => $this->input->post('idevaluado'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->evaluado_model->update($id,$array_item);
	 	redirect('evaluado');
 	}


 	public function delete()
 	{
 		$data=$this->evaluado_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('evaluado/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Evaluados";
	$this->load->view('template/page_header');		
  $this->load->view('evaluado_list',$data);
	$this->load->view('template/page_footer');
}



function evaluado_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->evaluado_model->lista_evaluadosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idevaluado,$r->lapersona,$r->elevaluado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idevaluado="'.$r->idevaluado.'">Ver</a>');
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
	$data['evaluado'] = $this->evaluado_model->elprimero();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
    $data['title']="Evaluado";
    $this->load->view('template/page_header');		
    $this->load->view('evaluado_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['evaluado'] = $this->evaluado_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
    $data['title']="Evaluado";
  
    $this->load->view('template/page_header');		
    $this->load->view('evaluado_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['evaluado_list']=$this->evaluado_model->lista_evaluado()->result();
	$data['evaluado'] = $this->evaluado_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
  $data['title']="Evaluado";
	$this->load->view('template/page_header');		
  $this->load->view('evaluado_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['evaluado_list']=$this->evaluado_model->lista_evaluado()->result();
	$data['evaluado'] = $this->evaluado_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['preguntas']= $this->pregunta_model->lista_pregunta()->result();
  	$data['respuestas']= $this->respuesta_model->lista_respuesta()->result();
  $data['title']="Evaluado";
	$this->load->view('template/page_header');		
  $this->load->view('evaluado_record',$data);
	$this->load->view('template/page_footer');
}

public function get_evaluado() {
    $this->load->database();
    $this->load->helper('form');
        $this->db->select('*');
        $this->db->where(array('idpregunta' => $this->input->post('idpregunta'),'idpersona' =>$this->input->post('idpersona')));
        $query = $this->db->get('evaluado');
	$data=$query->result();
	echo json_encode($data);

}




}
