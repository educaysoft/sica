<?php

class Portafoliodocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('documento_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('portafoliodocente_model');
  	  $this->load->model('asignaturadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['portafoliodocente']=$this->portafoliodocente_model->lista_portafoliodocentes()->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			
		$data['title']="Lista de portafoliodocentes";
		$this->load->view('template/page_header');
		$this->load->view('portafoliodocente_record',$data);
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
		$data['title']="Nueva Portafoliodocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('portafoliodocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->portafoliodocente_model->save($array_item);
	 	redirect('portafoliodocente');
 	}



public function edit()
{
	 	$data['portafoliodocente'] = $this->portafoliodocente_model->portafoliodocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Portafoliodocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('portafoliodocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idportafoliodocente');
	 	$array_item=array(
		 	
		 	'idportafoliodocente' => $this->input->post('idportafoliodocente'),
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->portafoliodocente_model->update($id,$array_item);
	 	redirect('portafoliodocente');
 	}


 	public function delete()
 	{
 		$data=$this->portafoliodocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('portafoliodocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Portafoliodocentes";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_list',$data);
	$this->load->view('template/page_footer');
}



function portafoliodocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->portafoliodocente_model->lista_portafoliodocentesA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idportafoliodocente,$r->eldocente,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('portafoliodocente/actual').'"  data-idportafoliodocente="'.$r->idportafoliodocente.'">Ver</a>');
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

			$idportafoliodocente=$this->input->get('idportafoliodocente');
			$data0 =$this->asignaturadocente_model->lista_asignaturadocentesA($idportafoliodocente);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idportafoliodocente,$r->idasignaturadocente,$r->laasignatura,$r->paralelo,
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





	function documento_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idpersona=$this->input->get('idpersona');
			$data0 =$this->documento_model->lista_documentosC($idpersona);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumento,$r->idpersona,$r->asunto,$r->fechaelaboracion,$r->archivopdf,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('documento/actual').'"    data-iddocumento="'.$r->iddocumento.'">Ver</a>');
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
	$data['portafoliodocente'] = $this->portafoliodocente_model->portafoliodocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Portafoliodocente";
    $this->load->view('template/page_header');		
    $this->load->view('portafoliodocente_record',$data);
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
	$data['portafoliodocente'] = $this->portafoliodocente_model->elprimero();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Portafoliodocente";
    $this->load->view('template/page_header');		
    $this->load->view('portafoliodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['portafoliodocente'] = $this->portafoliodocente_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Portafoliodocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('portafoliodocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['portafoliodocente_list']=$this->portafoliodocente_model->lista_portafoliodocente()->result();
	$data['portafoliodocente'] = $this->portafoliodocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  

$data['title']="Portafoliodocente";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['portafoliodocente_list']=$this->portafoliodocente_model->lista_portafoliodocente()->result();
	$data['portafoliodocente'] = $this->portafoliodocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  $data['title']="Portafoliodocente";
	$this->load->view('template/page_header');		
  $this->load->view('portafoliodocente_record',$data);
	$this->load->view('template/page_footer');
}




}
