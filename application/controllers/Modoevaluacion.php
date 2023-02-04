<?php
/*----------------------------------------------------------------------------------
	Arhivo: Modoevaluacion.php -->
	Modulo: modoevaluacion -->
	Descripción: permite administrar la información del modo de evaluacion -->
	Autor: Stalin Francis -->
	Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->
-----------------------------------------------------*/

class Modoevaluacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('modoevaluacion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['modoevaluacion']=$this->modoevaluacion_model->modoevaluacion(1)->row_array();
		$data['title']="Lista de modoevaluaciones";
		$this->load->view('template/page_header');
		$this->load->view('modoevaluacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva modoevaluacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('modoevaluacion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
	 	'nombre' => $this->input->post('nombre'),
	 	'ponderacion' => $this->input->post('ponderacion'),
	 	);
	 	$this->modoevaluacion_model->save($array_item);
	 	redirect('modoevaluacion');
 	}



public function edit()
{
	 	$data['modoevaluacion'] = $this->modoevaluacion_model->modoevaluacion($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar modoevaluacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('modoevaluacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmodoevaluacion');
	 	$array_item=array(
		 	
		 	'idmodoevaluacion' => $this->input->post('idmodoevaluacion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'ponderacion' => $this->input->post('ponderacion'),
	 	);
	 	$this->modoevaluacion_model->update($id,$array_item);
	 	redirect('modoevaluacion');
 	}


 	public function delete()
 	{
 		$data=$this->modoevaluacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('modoevaluacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Modoevaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('modoevaluacion_list',$data);
	$this->load->view('template/page_footer');
}



function modoevaluacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->modoevaluacion_model->lista_modoevaluacions();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmodoevaluacion,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('modoevaluacion/actual').'"     data-idmodoevaluacion="'.$r->idmodoevaluacion.'">Ver</a>');
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
	$data['modoevaluacion'] = $this->modoevaluacion_model->modoevaluacion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Modoevaluacion";
    $this->load->view('template/page_header');		
    $this->load->view('modoevaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['modoevaluacion'] = $this->modoevaluacion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Modoevaluacion";
    $this->load->view('template/page_header');		
    $this->load->view('modoevaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['modoevaluacion'] = $this->modoevaluacion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Modoevaluacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('modoevaluacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['modoevaluacion_list']=$this->modoevaluacion_model->lista_modoevaluacion()->result();
	$data['modoevaluacion'] = $this->modoevaluacion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Modoevaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('modoevaluacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['modoevaluacion_list']=$this->modoevaluacion_model->lista_modoevaluacion()->result();
	$data['modoevaluacion'] = $this->modoevaluacion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Modoevaluacion";
	$this->load->view('template/page_header');		
  $this->load->view('modoevaluacion_record',$data);
	$this->load->view('template/page_footer');
}

}
