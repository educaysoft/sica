<?php

class Fechacalendario extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('fechacalendario_model');
      $this->load->model('periodoacademico_model');
      $this->load->model('silabo_model');
      $this->load->model('institucion_model');
      $this->load->model('calendarioacademico_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/fechacalendario
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['fechacalendario']=$this->fechacalendario_model->elultimo();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['title']="Lista de fechacalendarioes";
			$this->load->view('template/page_header');
			$this->load->view('fechacalendario_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva fechacalendario";
			$data['silabos'] = $this->silabo_model->lista_silabos()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$this->load->view('template/page_header');		
			$this->load->view('fechacalendario_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'actividad' => $this->input->post('actividad'),
		'idinstitucion' => $this->input->post('idinstitucion'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	'fechacalendario' => $this->input->post('fechacalendario'),
	 	);
	 	$this->fechacalendario_model->save($array_item);
	 	redirect('fechacalendario');
 	}



	public function edit()
	{
			$data['fechacalendario'] = $this->fechacalendario_model->fechacalendario($this->uri->segment(3))->row_array();
	$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicos1()->result();
			$data['title'] = "Actualizar fechacalendario";
			$this->load->view('template/page_header');		
			$this->load->view('fechacalendario_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idfechacalendario');
	 	$array_item=array(
		 	
		 	'idfechacalendario' => $this->input->post('idfechacalendario'),
		 	'actividad' => $this->input->post('actividad'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 		'fechacalendario' => $this->input->post('fechacalendario'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->fechacalendario_model->update($id,$array_item);
	 	redirect('fechacalendario/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->fechacalendario_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('fechacalendario/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['fechacalendarios'] = $this->fechacalendario_model->lista_fechacalendarios1(0)->result();
	  	$data['title']="Fechacalendario";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('fechacalendario_list',$data);
		$this->load->view('template/page_footer');
	}



function fechacalendario_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->fechacalendario_model->lista_fechacalendarios1($idperiodoacademico);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->elperiodoacademico,$r->idfechacalendario,$r->fechacalendario,$r->actividad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('fechacalendario/actual').'"    data-idfechacalendario="'.$r->idfechacalendario.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function panel()
{
	
	$data['fechacalendarios'] = $this->fechacalendario_model->lista_fechacalendarios()->result();
  	$data['title']="Fechacalendario";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendarios/fechacalendarios',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idfechacalendario'=>$_GET['idfechacalendario'],'idevento'=>$_GET['idevento']);	
	$data['fechacalendario'] = $this->fechacalendario_model->fechacalendario($_GET['idfechacalendario'])->row_array();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_unidades($_GET['idfechacalendario'])->result();
  	$data['title']="Fechacalendario";
	$this->load->view('template/page_header');		
 	$this->load->view('fechacalendarios/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['fechacalendario'] = $this->fechacalendario_model->fechacalendario($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendario";
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['fechacalendario'] = $this->fechacalendario_model->elprimero();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendario";
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendario_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['fechacalendario'] = $this->fechacalendario_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendario";
  
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendario_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['fechacalendario_list']=$this->fechacalendario_model->lista_fechacalendario()->result();
	$data['fechacalendario'] = $this->fechacalendario_model->siguiente($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['title']="Fechacalendario";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendario_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['fechacalendario_list']=$this->fechacalendario_model->lista_fechacalendario()->result();
	$data['fechacalendario'] = $this->fechacalendario_model->anterior($this->uri->segment(3))->row_array();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Fechacalendario";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendario_record',$data);
	$this->load->view('template/page_footer');
}

public function get_periodoacademico() {
    $this->load->database();
    $this->load->helper('form');
    if($this->input->post('idsilabo')) {
        $this->db->select('*');
        $this->db->where(array('idsilabo' => $this->input->post('idsilabo')));
        $query = $this->db->get('periodoacademico');
	$data=$query->result();
	echo json_encode($data);
	}

}





}
