<?php

class Videotutorial extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('videotutorial_model');
      $this->load->model('instructor_model');
      $this->load->model('evaluacion_model');
}

public function index(){
  	$data['videotutorial']=$this->videotutorial_model->elultimo();
	$data['instructores']= $this->instructor_model->lista_instructorA()->result();
	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
 // print_r($data['usuario_list']);
  	$data['title']="Lista de videotutorials";
	$this->load->view('template/page_header');		
        if(isset($data['videotutorial'])){
  $this->load->view('videotutorial_record',$data);
        }else{
	echo "no hay registro";
	}
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['instructores']= $this->instructor_model->lista_instructorA()->result();
		$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
		$data['title']="Nuevo videotutorial";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('videotutorial_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
		 	'nombre' => $this->input->post('nombre'),
			'idinstructor' => $this->input->post('idinstructor'),
			'idevaluacion' => $this->input->post('idevaluacion'),
			'enlace' => $this->input->post('enlace'),
			'duracion' => $this->input->post('duracion'),
	 	);
	 	$this->videotutorial_model->save($array_item);
	 	redirect('videotutorial');
 	}



	public function edit()
	{
		$data['videotutorial'] = $this->videotutorial_model->videotutorial($this->uri->segment(3))->row_array();
		$data['instructores']= $this->instructor_model->lista_instructorA()->result();
		$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
		$data['title'] = "Actualizar videotutorial";
		$this->load->view('template/page_header');		
		$this->load->view('videotutorial_edit',$data);
		$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idvideotutorial');
	 	$array_item=array(
		 	
		 	'idvideotutorial' => $this->input->post('idvideotutorial'),
		 	'nombre' => $this->input->post('nombre'),
			'idinstructor' => $this->input->post('idinstructor'),
			'idevaluacion' => $this->input->post('idevaluacion'),
			'enlace' => $this->input->post('enlace'),
			'duracion' => $this->input->post('duracion'),
	 	);
	 	$this->videotutorial_model->update($id,$array_item);
	 	redirect('videotutorial');
 	}


 	public function delete()
 	{
 		$this->videotutorial_model->delete($this->uri->segment(3));
	 	redirect('videotutorial/elultimo');
 	}






	public function listar()
	{
		
	  $data['title']="Videotutorials";
		$this->load->view('template/page_header');		
	  $this->load->view('videotutorial_list',$data);
		$this->load->view('template/page_footer');
	}



function videotutorial_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->videotutorial_model->lista_videotutorialsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvideotutorial,$r->elordenador,$r->nombre,$r->ruta,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idvideotutorial="'.$r->idvideotutorial.'">Ver</a>');
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
	$data['videotutorial'] = $this->videotutorial_model->elprimero();
  if(!empty($data))
  {
	$data['instructores']= $this->instructor_model->lista_instructorA()->result();
	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
    	$data['title']="Videotutorial";
    	$this->load->view('template/page_header');		
    	$this->load->view('videotutorial_record',$data);
    	$this->load->view('template/page_footer');
  }else{
    	$this->load->view('template/page_header');		
    	$this->load->view('registro_vacio');
    	$this->load->view('template/page_footer');
  }
 }


public function elultimo()
{
	$data['videotutorial'] = $this->videotutorial_model->elultimo();
  if(!empty($data))
  {
	$data['instructores']= $this->instructor_model->lista_instructorA()->result();
	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
    	$data['title']="Videotutorial";
    	$this->load->view('template/page_header');		
    	$this->load->view('videotutorial_record',$data);
    	$this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}




public function siguiente(){
 // $data['videotutorial_list']=$this->videotutorial_model->lista_videotutorial()->result();
	$data['videotutorial'] = $this->videotutorial_model->siguiente($this->uri->segment(3))->row_array();
	$data['instructores']= $this->instructor_model->lista_instructorA()->result();
	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('videotutorial_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['videotutorial_list']=$this->videotutorial_model->lista_videotutorial()->result();
	$data['videotutorial'] = $this->videotutorial_model->anterior($this->uri->segment(3))->row_array();
	$data['instructores']= $this->instructor_model->lista_instructorA()->result();
	$data['evaluaciones']= $this->evaluacion_model->lista_evaluaciones()->result();
  $data['title']="Documento";
	$this->load->view('template/page_header');		
  $this->load->view('videotutorial_record',$data);
	$this->load->view('template/page_footer');
}




}
