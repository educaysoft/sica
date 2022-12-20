<?php

class Fechacalendaria extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('fechacalendaria_model');
      $this->load->model('periodoacademico_model');
      $this->load->model('silabo_model');
      $this->load->model('institucion_model');
      $this->load->model('documento_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/fechacalendaria
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['fechacalendaria']=$this->fechacalendaria_model->elultimo();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['title']="Lista de fechacalendariaes";
			$this->load->view('template/page_header');
			$this->load->view('fechacalendaria_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva fechacalendaria";
			$data['silabos'] = $this->silabo_model->lista_silabos()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$this->load->view('template/page_header');		
			$this->load->view('fechacalendaria_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
	 	'actividad' => $this->input->post('actividad'),
		'idinstitucion' => $this->input->post('idinstitucion'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	'fechacalendaria' => $this->input->post('fechacalendaria'),
	 	);
	 	$this->fechacalendaria_model->save($array_item);
	 	redirect('fechacalendaria');
 	}



	public function edit()
	{
			$data['fechacalendaria'] = $this->fechacalendaria_model->fechacalendaria($this->uri->segment(3))->row_array();
  			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar fechacalendaria";
			$this->load->view('template/page_header');		
			$this->load->view('fechacalendaria_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idfechacalendaria');
	 	$array_item=array(
		 	
		 	'idfechacalendaria' => $this->input->post('idfechacalendaria'),
		 	'actividad' => $this->input->post('actividad'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 		'fechacalendaria' => $this->input->post('fechacalendaria'),
		 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->fechacalendaria_model->update($id,$array_item);
	 	redirect('fechacalendaria/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->fechacalendaria_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('fechacalendaria/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['fechacalendarias'] = $this->fechacalendaria_model->lista_fechacalendarias1(0)->result();
	  	$data['title']="Fechacalendaria";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('fechacalendaria_list',$data);
		$this->load->view('template/page_footer');
	}



function fechacalendaria_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

		$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->fechacalendaria_model->lista_fechacalendarias1($idperiodoacademico);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->elperiodoacademico,$r->idfechacalendaria,$r->fechacalendaria,$r->actividad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('fechacalendaria/actual').'"    data-idfechacalendaria="'.$r->idfechacalendaria.'">Ver</a>');
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
	
	$data['fechacalendarias'] = $this->fechacalendaria_model->lista_fechacalendarias()->result();
  	$data['title']="Fechacalendaria";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendarias/fechacalendarias',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idfechacalendaria'=>$_GET['idfechacalendaria'],'idevento'=>$_GET['idevento']);	
	$data['fechacalendaria'] = $this->fechacalendaria_model->fechacalendaria($_GET['idfechacalendaria'])->row_array();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_unidades($_GET['idfechacalendaria'])->result();
  	$data['title']="Fechacalendaria";
	$this->load->view('template/page_header');		
 	$this->load->view('fechacalendarias/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}




public function actual()
{
	$data['fechacalendaria'] = $this->fechacalendaria_model->fechacalendaria($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendaria";
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendaria_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['fechacalendaria'] = $this->fechacalendaria_model->elprimero();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendaria";
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendaria_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['fechacalendaria'] = $this->fechacalendaria_model->elultimo();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Fechacalendaria";
  
    $this->load->view('template/page_header');		
    $this->load->view('fechacalendaria_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['fechacalendaria_list']=$this->fechacalendaria_model->lista_fechacalendaria()->result();
	$data['fechacalendaria'] = $this->fechacalendaria_model->siguiente($this->uri->segment(3))->row_array();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['title']="Fechacalendaria";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendaria_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['fechacalendaria_list']=$this->fechacalendaria_model->lista_fechacalendaria()->result();
	$data['fechacalendaria'] = $this->fechacalendaria_model->anterior($this->uri->segment(3))->row_array();
		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
	$data['documentos']= $this->documento_model->lista_documentos()->result();
  	$data['title']="Fechacalendaria";
	$this->load->view('template/page_header');		
  	$this->load->view('fechacalendaria_record',$data);
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
