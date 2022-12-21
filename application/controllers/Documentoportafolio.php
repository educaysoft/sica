<?php

class Documentoportafolio extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('docente_model');
  	  $this->load->model('documento_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('documentoportafolio_model');
  	  $this->load->model('asignaturadocente_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['documentoportafolio']=$this->documentoportafolio_model->lista_documentoportafolios()->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
			
		$data['title']="Lista de documentoportafolios";
		$this->load->view('template/page_header');
		$this->load->view('documentoportafolio_record',$data);
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
		$data['title']="Nueva Documentoportafolio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('documentoportafolio_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->documentoportafolio_model->save($array_item);
	 	redirect('documentoportafolio');
 	}



public function edit()
{
	 	$data['documentoportafolio'] = $this->documentoportafolio_model->documentoportafolio($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
 	 	$data['title'] = "Actualizar Documentoportafolio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('documentoportafolio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddocumentoportafolio');
	 	$array_item=array(
		 	
		 	'iddocumentoportafolio' => $this->input->post('iddocumentoportafolio'),
			'iddocente' => $this->input->post('iddocente'),
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->documentoportafolio_model->update($id,$array_item);
	 	redirect('documentoportafolio');
 	}


 	public function delete()
 	{
 		$data=$this->documentoportafolio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('documentoportafolio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Documentoportafolios";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_list',$data);
	$this->load->view('template/page_footer');
}



function documentoportafolio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->documentoportafolio_model->lista_documentoportafoliosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddocumentoportafolio,$r->eldocente,$r->elperiodoacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('documentoportafolio/actual').'"  data-iddocumentoportafolio="'.$r->iddocumentoportafolio.'">Ver</a>');
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

			$iddocumentoportafolio=$this->input->get('iddocumentoportafolio');
			$data0 =$this->asignaturadocente_model->lista_asignaturadocentesA($iddocumentoportafolio);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocumentoportafolio,$r->idasignaturadocente,$r->laasignatura,$r->paralelo,
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
	$data['documentoportafolio'] = $this->documentoportafolio_model->documentoportafolio($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentes()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Documentoportafolio";
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
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
	$data['documentoportafolio'] = $this->documentoportafolio_model->elprimero();
	  if(!empty($data))
	  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Documentoportafolio";
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['documentoportafolio'] = $this->documentoportafolio_model->elultimo();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Documentoportafolio";
  
    $this->load->view('template/page_header');		
    $this->load->view('documentoportafolio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['documentoportafolio_list']=$this->documentoportafolio_model->lista_documentoportafolio()->result();
	$data['documentoportafolio'] = $this->documentoportafolio_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  

$data['title']="Documentoportafolio";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['documentoportafolio_list']=$this->documentoportafolio_model->lista_documentoportafolio()->result();
	$data['documentoportafolio'] = $this->documentoportafolio_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['periodoacademicos']= $this->periodoacademico_model->lista_periodoacademicos()->result();
  $data['title']="Documentoportafolio";
	$this->load->view('template/page_header');		
  $this->load->view('documentoportafolio_record',$data);
	$this->load->view('template/page_footer');
}




}
