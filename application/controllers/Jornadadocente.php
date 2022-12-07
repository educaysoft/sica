<?php

class Jornadadocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('diasemana_model');
  	  $this->load->model('jornadadocente_model');
  	  $this->load->model('horariodocente_model');
  	  $this->load->model('asignaturadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['jornadadocente']=$this->jornadadocente_model->lista_jornadadocentes()->row_array();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			
		$data['title']="Lista de jornadadocentes";
		$this->load->view('template/page_header');
		$this->load->view('jornadadocente_record',$data);
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
  	$data['asignaturadocentes']=$this->asignaturadocente_model->lista_asignaturadocentesA()->result();
  	$data['diasemanas']= $this->diasemana_model->lista_diasemanas()->result();
		$data['title']="Nueva Jornadadocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('jornadadocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'iddiasemana' => $this->input->post('iddiasemana'),
			'horainicio' => $this->input->post('horainicio'),
			'duracionminutos' => $this->input->post('duracionminutos'),
	 	);
	 	$this->jornadadocente_model->save($array_item);
	 	redirect('jornadadocente');
 	}



	public function edit()
	{
			$data['jornadadocente'] = $this->jornadadocente_model->jornadadocente($this->uri->segment(3))->row_array();
			$data['docentes']= $this->docente_model->lista_docentesA()->result();
			$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
			$data['title'] = "Actualizar Jornadadocente";
			$this->load->view('template/page_header');		
			$this->load->view('jornadadocente_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idjornadadocente');
	 	$array_item=array(


			'idjornadadocente' => $this->input->post('idjornadadocente'),
			'idasignaturadocente' => $this->input->post('idasignaturadocente'),
			'iddiasemana' => $this->input->post('iddiasemana'),
			'horainicio' => $this->input->post('horainicio'),
			'duracionminutos' => $this->input->post('duracionminutos'),

	 	);
	 	$this->jornadadocente_model->update($id,$array_item);
	 	redirect('jornadadocente');
 	}


 	public function delete()
 	{
 		$data=$this->jornadadocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('jornadadocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Jornadadocentes";
	$this->load->view('template/page_header');		
  $this->load->view('jornadadocente_list',$data);
	$this->load->view('template/page_footer');
}



function jornadadocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->jornadadocente_model->lista_jornadadocentesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idjornadadocente,$r->eldocente,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('jornadadocente/actual').'"  data-idjornadadocente="'.$r->idjornadadocente.'">Ver</a>');
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
	$data['jornadadocente'] = $this->jornadadocente_model->jornadadocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Jornadadocente";
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
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
	$data['jornadadocente'] = $this->jornadadocente_model->elprimero();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Jornadadocente";
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['jornadadocente'] = $this->jornadadocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
    $data['title']="Jornadadocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('jornadadocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['jornadadocente_list']=$this->jornadadocente_model->lista_jornadadocente()->result();
	$data['jornadadocente'] = $this->jornadadocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  

$data['title']="Jornadadocente";
	$this->load->view('template/page_header');		
  $this->load->view('jornadadocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['jornadadocente_list']=$this->jornadadocente_model->lista_jornadadocente()->result();
	$data['jornadadocente'] = $this->jornadadocente_model->anterior($this->uri->segment(3))->row_array();
 	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['horariodocentes']=$this->horariodocente_model->lista_horariodocentesA()->result();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  $data['title']="Jornadadocente";
	$this->load->view('template/page_header');		
  $this->load->view('jornadadocente_record',$data);
	$this->load->view('template/page_footer');
}




}
