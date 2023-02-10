<?php

class Calendarioacademico extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('calendarioacademico_model');
      $this->load->model('fechacalendario_model');
      $this->load->model('periodoacademico_model');
      $this->load->model('departamento_model');
}

//=========================================================
// Es la primera función que se ejecuta cuando llamamos a
// http://educaysoft.org/sica/calendarioacademico
// ========================================================
	public function index(){
		if(isset($this->session->userdata['logged_in'])){
			$data['calendarioacademico']=$this->calendarioacademico_model->elultimo();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['title']="Lista de calendarioacademicos";
			$this->load->view('template/page_header');
			$this->load->view('calendarioacademico_record',$data);
			$this->load->view('template/page_footer');
		}else{
			$this->load->view('template/page_header.php');
			$this->load->view('login_form');
			$this->load->view('template/page_footer.php');
		}
	}


	public function add()
	{
			$data['title']="Nueva calendarioacademico";
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$this->load->view('template/page_header');		
			$this->load->view('calendarioacademico_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		'iddepartamento' => $this->input->post('iddepartamento'),
	 	'idperiodoacademico' => $this->input->post('idperiodoacademico'),
	 	);
	 	$this->calendarioacademico_model->save($array_item);
	 	redirect('calendarioacademico');
 	}



	public function edit()
	{
			$data['calendarioacademico'] = $this->calendarioacademico_model->calendarioacademico($this->uri->segment(3))->row_array();
  			$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
			$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
			$data['title'] = "Actualizar calendarioacademico";
			$this->load->view('template/page_header');		
			$this->load->view('calendarioacademico_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idcalendarioacademico');
	 	$array_item=array(
		 	
		 	'idcalendarioacademico' => $this->input->post('idcalendarioacademico'),
	 		'idperiodoacademico' => $this->input->post('idperiodoacademico'),
		 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	);
	 	$this->calendarioacademico_model->update($id,$array_item);
	 	redirect('calendarioacademico/actual/'.$id);
 	}


 	public function delete()
 	{
 		$this->calendarioacademico_model->delete($this->uri->segment(3));
 //		echo json_encode($data);
	 	redirect('calendarioacademico/elultimo');
	//	$db['default']['db_debug']=FALSE
 	}










	public function listar()
	{
		
		$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicos1(0)->result();
	  	$data['title']="Calendarioacademico";
  		$data['filtro']= $this->uri->segment(3);
		$this->load->view('template/page_header');		
	  	$this->load->view('calendarioacademico_list',$data);
		$this->load->view('template/page_footer');
	}



function calendarioacademico_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	//	$idperiodoacademico=$this->input->get('idperiodoacademico');

	 	$data0 = $this->calendarioacademico_model->lista_calendarioacademicos1(0);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcalendarioacademico,$r->iddepartamento,$r->idperiodoacademico,$r->elcalendarioacademico,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"   data-retorno="'.site_url('calendarioacademico/actual').'"    data-idcalendarioacademico="'.$r->idcalendarioacademico.'">Ver</a>');
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
	
	$data['calendarioacademicos'] = $this->calendarioacademico_model->lista_calendarioacademicos()->result();
  	$data['title']="Calendarioacademico";
	$this->load->view('template/page_header');		
  	$this->load->view('calendarioacademicos/calendarioacademicos',$data);
	$this->load->view('template/page_footer');
}


public function iniciar()
{
  	$data['evento']=array('idcalendarioacademico'=>$_GET['idcalendarioacademico'],'idevento'=>$_GET['idevento']);	
	$data['calendarioacademico'] = $this->calendarioacademico_model->calendarioacademico($_GET['idcalendarioacademico'])->row_array();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_unidades($_GET['idcalendarioacademico'])->result();
  	$data['title']="Calendarioacademico";
	$this->load->view('template/page_header');		
 	$this->load->view('calendarioacademicos/FundamentosDeProgramacion_clases',$data);
	$this->load->view('template/page_footer');
}



	function fecha_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idcalendarioacademico=$this->input->get('idcalendarioacademico');
			$data0 =$this->fechacalendario_model->fechacalendarios($idcalendarioacademico);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idcalendarioacademico,$r->idfechacalendario,$r->fechacalendario,$r->actividad,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('fechacalendario/actual').'"    data-idfechacalendario="'.$r->idfechacalendario.'">Ver</a>');
			}	
			$output=array( "draw"=>$draw,
				"recordsTotal"=> $data0->num_rows(),
				"recordsFiltered"=> $data0->num_rows(),
				"data"=>$data
			);
			echo json_encode($output);
			exit();
	}



	public function reportepdf()
	{
		$idperiodoacademico=$this->uri->segment(3);
	 	$data['fechacalendarios']= $this->fechacalendario_model->lista_fechacalendarios1($idperiodoacademico)->result();

		$data['title']="Evento";
		$this->load->view('calendarioacademico_list_pdf',$data);
	}






public function actual()
{
	$data['calendarioacademico'] = $this->calendarioacademico_model->calendarioacademico($this->uri->segment(3))->row_array();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Calendarioacademico";
    $this->load->view('template/page_header');		
    $this->load->view('calendarioacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }




public function elprimero()
{
	$data['calendarioacademico'] = $this->calendarioacademico_model->elprimero();
	$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Calendarioacademico";
    $this->load->view('template/page_header');		
    $this->load->view('calendarioacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
		$data['calendarioacademico'] = $this->calendarioacademico_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  if(!empty($data))
  {
    $data['title']="Calendarioacademico";
  
    $this->load->view('template/page_header');		
    $this->load->view('calendarioacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['calendarioacademico_list']=$this->calendarioacademico_model->lista_calendarioacademico()->result();
	$data['calendarioacademico'] = $this->calendarioacademico_model->siguiente($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['title']="Calendarioacademico";
	$this->load->view('template/page_header');		
  	$this->load->view('calendarioacademico_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['calendarioacademico_list']=$this->calendarioacademico_model->lista_calendarioacademico()->result();
	$data['calendarioacademico'] = $this->calendarioacademico_model->anterior($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
	$data['periodoacademicos'] = $this->periodoacademico_model->lista_periodoacademicos()->result();
  	$data['title']="Calendarioacademico";
	$this->load->view('template/page_header');		
  	$this->load->view('calendarioacademico_record',$data);
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
