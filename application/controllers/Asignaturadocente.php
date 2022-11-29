<?php

class Asignaturadocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('asignaturadocente_model');
  	  $this->load->model('horariodocente_model');
  	  $this->load->model('paralelo_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['asignaturadocente']=$this->asignaturadocente_model->lista_asignaturadocentes()->row_array();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			
		$data['title']="Lista de asignaturadocentes";
		$this->load->view('template/page_header');
		$this->load->view('asignaturadocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function add()
{
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['title']="Nueva Asignaturadocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('asignaturadocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idhorariodocente' => $this->input->post('idhorariodocente'),
			'idasignatura' => $this->input->post('idasignatura'),
	 	);
	 	$this->asignaturadocente_model->save($array_item);
	 	redirect('asignaturadocente');
 	}



public function edit()
{
	 	$data['asignaturadocente'] = $this->asignaturadocente_model->asignaturadocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['paralelos']= $this->paralelo_model->lista_paralelos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Asignaturadocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('asignaturadocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idasignaturadocente');
	 	$array_item=array(
		 	
		 	'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'idhorariodocente' => $this->input->post('idhorariodocente'),
			'idasignatura' => $this->input->post('idasignatura'),
	 	);
	 	$this->asignaturadocente_model->update($id,$array_item);
	 	redirect('asignaturadocente');
 	}


 	public function delete()
 	{
 		$data=$this->asignaturadocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('asignaturadocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Asignaturadocentes";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_list',$data);
	$this->load->view('template/page_footer');
}



function asignaturadocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->asignaturadocente_model->lista_asignaturadocentesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idasignaturadocente,$r->eldocente,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('asignaturadocente/actual').'"  data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a>');
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
	$data['asignaturadocente'] = $this->asignaturadocente_model->asignaturadocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Asignaturadocente";
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->elprimero();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Asignaturadocente";
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['asignaturadocente'] = $this->asignaturadocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Asignaturadocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('asignaturadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['asignaturadocente_list']=$this->asignaturadocente_model->lista_asignaturadocente()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  

$data['title']="Asignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['asignaturadocente_list']=$this->asignaturadocente_model->lista_asignaturadocente()->result();
	$data['asignaturadocente'] = $this->asignaturadocente_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  $data['title']="Asignaturadocente";
	$this->load->view('template/page_header');		
  $this->load->view('asignaturadocente_record',$data);
	$this->load->view('template/page_footer');
}




}
