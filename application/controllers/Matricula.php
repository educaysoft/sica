<?php

class Matricula extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('estudiante_model');
  	  $this->load->model('departamento_model');
  	  $this->load->model('nivelacademico_model');
  	  $this->load->model('tipomatricula_model');
  	  $this->load->model('matricula_model');
  	  $this->load->model('periodoacademico_model');
  	  $this->load->model('documentoportafolio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['matricula']=$this->matricula_model->lista_matriculas()->row_array();
  		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
  		$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
		$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
		$data['title']="Lista de matriculas";
		$this->load->view('template/page_header');
		$this->load->view('matricula_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


	public function add()
	{
			$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
			$data['title']="Nueva Matricula";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$this->load->view('template/page_header');		
			$this->load->view('matricula_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		'idmatricula' => $this->input->post('idmatricula'),
		'idestudiante' => $this->input->post('idestudiante'),
		'iddepartamento' => $this->input->post('iddepartamento'),
		'idnivelacademico' => $this->input->post('idnivelacademico'),
		'idtipomatricula' => $this->input->post('idtipomatricula'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->matricula_model->save($array_item);
	 	redirect('matricula');
 	}



	public function edit()
	{
			$data['matricula'] = $this->matricula_model->matricula($this->uri->segment(3))->row_array();
			$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar Matricula";
			$this->load->view('template/page_header');		
			$this->load->view('matricula_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idmatricula');
	 	$array_item=array(
		 	
		 	'idmatricula' => $this->input->post('idmatricula'),
			'idestudiante' => $this->input->post('idestudiante'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'idnivelacademico' => $this->input->post('idnivelacademico'),
		'idtipomatricula' => $this->input->post('idtipomatricula'),
		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->matricula_model->update($id,$array_item);
	 	redirect('matricula');
 	}


 	public function delete()
 	{
 		$data=$this->matricula_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('matricula/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Matriculas";
		$this->load->view('template/page_header');		
		$this->load->view('matricula_list',$data);
		$this->load->view('template/page_footer');
	}



function matricula_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->matricula_model->lista_matriculasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmatricula,$r->laestudiante,$r->ladepartamento,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('matricula/actual').'"   data-idmatricula="'.$r->idmatricula.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}


public function genpagina()
{
	$idperiodoacademico=0;

	$ordenrpt=0;
	if($this->uri->segment(3))
	{
		$idperiodoacademico=$this->uri->segment(3);
	 	$data['matriculas']= $this->matricula_model->matriculaxperiodo($idperiodoacademico)->result();
		$arreglo=array();
		$i=0;
		foreach($data['matriculas'] as $row){
		$idestudiante=$row->idestudiante;

		$xx=array($this->documentoportafolio_model->documentoportafolioestudiante($idestudiante,$row->idperiodoacademico)->result_array());
		if(count($xx[0]) > 0){
		foreach($xx as $row2){
			foreach($row2 as $row3)
			 {
				$arreglo+=array($i=>array($row->idestudiante=>$row3));
				$i=$i+1;
			}
			}
		}
		}
		$data['documentoportafolio']=array();
	//	array_push($data['jornadadocente'],$arreglo); 
		$data['documentoportafolio']=$arreglo; 
		echo "<br> jornadadocnete<br>" ;


		$this->load->view('matricula_genpagina',$data);
	}
}








public function actual()
{


  	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();


  		$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
	$data['matricula'] = $this->matricula_model->matricula($this->uri->segment(3))->row_array();
		$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  if(!empty($data))
  {
    $data['title']="Matricula";
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{


  	$data['estudiantes']= $this->estudiante_model->lista_estudiantes()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();

  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();

	$data['matricula'] = $this->matricula_model->elprimero();
		$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();
  if(!empty($data))
  {
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
    $data['title']="Matricula";
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{

	$data['matricula'] = $this->matricula_model->elultimo();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

  if(!empty($data))
  {
    $data['title']="Matricula";
  
    $this->load->view('template/page_header');		
    $this->load->view('matricula_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['matricula_list']=$this->matricula_model->lista_matricula()->result();
	$data['matricula'] = $this->matricula_model->siguiente($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

$data['title']="Matricula";
	$this->load->view('template/page_header');		
  $this->load->view('matricula_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['matricula_list']=$this->matricula_model->lista_matricula()->result();
	$data['matricula'] = $this->matricula_model->anterior($this->uri->segment(3))->row_array();
  	$data['estudiantes']= $this->estudiante_model->lista_estudiantesA()->result();
  	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  		$data['nivelacademicos']= $this->nivelacademico_model->lista_nivelacademicos()->result();
  		$data['tipomatriculas']= $this->tipomatricula_model->lista_tipomatriculas()->result();
  	$data['matriculas']= $this->matricula_model->lista_matriculas()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos1()->result();

  	$data['title']="Matricula";
	$this->load->view('template/page_header');		
  	$this->load->view('matricula_record',$data);
	$this->load->view('template/page_footer');
}




}
