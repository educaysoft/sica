<?php

class Etapamovilidadalumno extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('movilidadalumno_model');
  	  $this->load->model('etapamovilidad_model');
  	  $this->load->model('etapamovilidadalumno_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['etapamovilidadalumno']=$this->etapamovilidadalumno_model->lista_etapamovilidadalumnos()->row_array();
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnosA()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
  	$data['etapamovilidadalumnos']= $this->etapamovilidadalumno_model->lista_etapamovilidadalumnos()->result();
			
		$data['title']="Lista de etapamovilidadalumnos";
		$this->load->view('template/page_header');
		$this->load->view('etapamovilidadalumno_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


	public function add()
	{
			$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnosA()->result();
			$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
			$data['title']="Nueva Etapamovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('etapamovilidadalumno_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idetapamovilidadalumno' => $this->input->post('idetapamovilidadalumno'),
		'idmovilidadalumno' => $this->input->post('idmovilidadalumno'),
		'idetapamovilidad' => $this->input->post('idetapamovilidad'),
		'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->etapamovilidadalumno_model->save($array_item);
	 	redirect('etapamovilidadalumno');
 	}



	public function edit()
	{
			$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->etapamovilidadalumno($this->uri->segment(3))->row_array();
			$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnosA()->result();
			$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
			$data['title'] = "Actualizar Etapamovilidadalumno";
			$this->load->view('template/page_header');		
			$this->load->view('etapamovilidadalumno_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idetapamovilidadalumno');
	 	$array_item=array(
		 	
		 	'idetapamovilidadalumno' => $this->input->post('idetapamovilidadalumno'),
			'idmovilidadalumno' => $this->input->post('idmovilidadalumno'),
			'idetapamovilidad' => $this->input->post('idetapamovilidad'),
		'fecha' => $this->input->post('fecha'),
	 	);
	 	$this->etapamovilidadalumno_model->update($id,$array_item);
	 	redirect('etapamovilidadalumno');
 	}


 	public function delete()
 	{
 		$data=$this->etapamovilidadalumno_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('etapamovilidadalumno/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Etapamovilidadalumnos";
		$this->load->view('template/page_header');		
		$this->load->view('etapamovilidadalumno_list',$data);
		$this->load->view('template/page_footer');
	}



function etapamovilidadalumno_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->etapamovilidadalumno_model->lista_etapamovilidadalumnosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idetapamovilidadalumno,$r->lamovilidadalumno,$r->laetapamovilidad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('etapamovilidadalumno/actual').'"   data-idetapamovilidadalumno="'.$r->idetapamovilidadalumno.'">Ver</a>');
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


  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();


	$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->etapamovilidadalumno($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
    $data['title']="Etapamovilidadalumno";
    $this->load->view('template/page_header');		
    $this->load->view('etapamovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{


  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();


	$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->elprimero();
  if(!empty($data))
  {
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
    $data['title']="Etapamovilidadalumno";
    $this->load->view('template/page_header');		
    $this->load->view('etapamovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->elultimo();
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
  if(!empty($data))
  {
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
    $data['title']="Etapamovilidadalumno";
  
    $this->load->view('template/page_header');		
    $this->load->view('etapamovilidadalumno_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['etapamovilidadalumno_list']=$this->etapamovilidadalumno_model->lista_etapamovilidadalumno()->result();
	$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->siguiente($this->uri->segment(3))->row_array();
  	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
  

$data['title']="Etapamovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('etapamovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['etapamovilidadalumno_list']=$this->etapamovilidadalumno_model->lista_etapamovilidadalumno()->result();
	$data['etapamovilidadalumno'] = $this->etapamovilidadalumno_model->anterior($this->uri->segment(3))->row_array();
 	$data['movilidadalumnos']= $this->movilidadalumno_model->lista_movilidadalumnos()->result();
  	$data['etapamovilidads']= $this->etapamovilidad_model->lista_etapamovilidads()->result();
  $data['title']="Etapamovilidadalumno";
	$this->load->view('template/page_header');		
  $this->load->view('etapamovilidadalumno_record',$data);
	$this->load->view('template/page_footer');
}




}
