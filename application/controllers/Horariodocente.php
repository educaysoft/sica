<?php

class Horariodocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('horariodocente_model');
  	  $this->load->model('asignaturadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['horariodocente']=$this->horariodocente_model->lista_horariodocentes()->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			
		$data['title']="Lista de horariodocentes";
		$this->load->view('template/page_header');
		$this->load->view('horariodocente_record',$data);
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
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
		$data['title']="Nueva Horariodocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('horariodocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->horariodocente_model->save($array_item);
	 	redirect('horariodocente');
 	}



public function edit()
{
	 	$data['horariodocente'] = $this->horariodocente_model->horariodocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Horariodocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('horariodocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idhorariodocente');
	 	$array_item=array(
		 	
		 	'idhorariodocente' => $this->input->post('idhorariodocente'),
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->horariodocente_model->update($id,$array_item);
	 	redirect('horariodocente');
 	}


 	public function delete()
 	{
 		$data=$this->horariodocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('horariodocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Horariodocentes";
	$this->load->view('template/page_header');		
  $this->load->view('horariodocente_list',$data);
	$this->load->view('template/page_footer');
}



function horariodocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->horariodocente_model->lista_horariodocentesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idhorariodocente,$r->eldocente,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('horariodocente/actual').'"  data-idhorariodocente="'.$r->idhorariodocente.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



	function asignaturadocente_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idhorariodocente=$this->input->get('idhorariodocente');
			$data0 =$this->asignaturadocente_model->lista_asignaturadocentesA($idhorariodocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idhorariodocente,$r->idasignaturadocente,$r->laasignatura,$r->paralelo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('asignaturadocente/actual').'"    data-idasignaturadocente="'.$r->idasignaturadocente.'">Ver</a>');
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
	$data['horariodocente'] = $this->horariodocente_model->horariodocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Horariodocente";
    $this->load->view('template/page_header');		
    $this->load->view('horariodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
	$data['horariodocente'] = $this->horariodocente_model->elprimero();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Horariodocente";
    $this->load->view('template/page_header');		
    $this->load->view('horariodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['horariodocente'] = $this->horariodocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Horariodocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('horariodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['horariodocente_list']=$this->horariodocente_model->lista_horariodocente()->result();
	$data['horariodocente'] = $this->horariodocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  

$data['title']="Horariodocente";
	$this->load->view('template/page_header');		
  $this->load->view('horariodocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['horariodocente_list']=$this->horariodocente_model->lista_horariodocente()->result();
	$data['horariodocente'] = $this->horariodocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  $data['title']="Horariodocente";
	$this->load->view('template/page_header');		
  $this->load->view('horariodocente_record',$data);
	$this->load->view('template/page_footer');
}




}
