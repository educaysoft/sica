<?php

class Malla extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('malla_model');
      $this->load->model('asignatura_model');
  	  $this->load->model('departamento_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['malla']=$this->malla_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Lista de mallaes";
		$this->load->view('template/page_header');
		$this->load->view('malla_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Nueva malla";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('malla_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	'nombrecorto' => $this->input->post('nombrecorto'),
	 	'nombrelargo' => $this->input->post('nombrelargo'),
	 	'fechainicio' => $this->input->post('fechainicio'),
	 	'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->malla_model->save($array_item);
	 	redirect('malla');
 	}



public function edit()
{
	 	$data['malla'] = $this->malla_model->malla($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar malla";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('malla_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmalla');
	 	$array_item=array(
		 	
			'idmalla' => $this->input->post('idmalla'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'nombrecorto' => $this->input->post('nombrecorto'),
			'nombrelargo' => $this->input->post('nombrelargo'),
			'fechainicio' => $this->input->post('fechainicio'),
			'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->malla_model->update($id,$array_item);
	 	redirect('malla');
 	}


 	public function delete()
 	{
 		$this->malla_model->delete($this->uri->segment(3));
	 	redirect('malla/elultimo');
 	}


	public function listar()
	{
	
		  $data['title']="Malla";
		$this->load->view('template/page_header');		
		  $this->load->view('malla_list',$data);
		$this->load->view('template/page_footer');
	}



	function malla_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	 	$data0 = $this->malla_model->lista_mallaes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmalla,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmalla="'.$r->idmalla.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}





	function asignatura_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idmalla=$this->input->get('idmalla');
			$data0 =$this->asignatura_model->asignaturasm($idmalla);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idmalla,$r->idasignatura,$r->nivelacademico,$r->codigo,$r->nombre,$r->creditos,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignatura/actual').'"    data-idasignatura="'.$r->idasignatura.'">Ver</a>');
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
	$data['malla'] = $this->malla_model->malla($this->uri->segment(3))->row_array();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Malla";
    $this->load->view('template/page_header');		
    $this->load->view('malla_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }





public function elprimero()
{
	$data['malla'] = $this->malla_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Malla";
    $this->load->view('template/page_header');		
    $this->load->view('malla_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['malla'] = $this->malla_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Malla";
  
    $this->load->view('template/page_header');		
    $this->load->view('malla_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['malla_list']=$this->malla_model->lista_malla()->result();
	$data['malla'] = $this->malla_model->siguiente($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Malla";
	$this->load->view('template/page_header');		
  $this->load->view('malla_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['malla_list']=$this->malla_model->lista_malla()->result();
	$data['malla'] = $this->malla_model->anterior($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Malla";
	$this->load->view('template/page_header');		
  $this->load->view('malla_record',$data);
	$this->load->view('template/page_footer');
}

}
