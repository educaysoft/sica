<?php

class Periodoacademico extends CI_Controller{

  public function __construct(){
      parent::__construct();
      	$this->load->model('periodoacademico_model');
    	$this->load->model('departamento_model');
    	$this->load->model('silabo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['periodoacademico']=$this->periodoacademico_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Lista de periodoacademicos";
		$this->load->view('template/page_header');
		$this->load->view('periodoacademico_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
		$data['title']="Nueva periodoacademico";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('periodoacademico_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'iddepartamento' => $this->input->post('iddepartamento'),
	 	'nombrecorto' => $this->input->post('nombrecorto'),
	 	'nombrelargo' => $this->input->post('nombrelargo'),
	 	'fechainicio' => $this->input->post('fechainicio'),
	 	'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->periodoacademico_model->save($array_item);
	 	redirect('periodoacademico');
 	}



public function edit()
{
	 	$data['periodoacademico'] = $this->periodoacademico_model->periodoacademico($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
 	 	$data['title'] = "Actualizar periodoacademico";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('periodoacademico_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idperiodoacademico');
	 	$array_item=array(
		 	
			'idperiodoacademico' => $this->input->post('idperiodoacademico'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'nombrecorto' => $this->input->post('nombrecorto'),
			'nombrelargo' => $this->input->post('nombrelargo'),
			'fechainicio' => $this->input->post('fechainicio'),
			'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->periodoacademico_model->update($id,$array_item);
	 	redirect('periodoacademico');
 	}


 	public function delete()
 	{
 		$this->periodoacademico_model->delete($this->uri->segment(3));
	 	redirect('periodoacademico/elultimo');
 	}


	public function listar()
	{
	
		  $data['title']="Periodoacademico";
		$this->load->view('template/page_header');		
		  $this->load->view('periodoacademico_list',$data);
		$this->load->view('template/page_footer');
	}



	function periodoacademico_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	 	$data0 = $this->periodoacademico_model->lista_periodoacademicos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idperiodoacademico,$r->nombrecorto,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idperiodoacademico="'.$r->idperiodoacademico.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}




	function silabo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idperiodoacademico=$this->input->get('idperiodoacademico');
			$data0 =$this->silabo_model->silabosp($idperiodoacademico);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->iddocente,$r->idsilabo,$r->elsilabo,$r->elperiodo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retornos="'.site_url('silabo/actual').'"    data-idsilabo="'.$r->idsilabo.'">Ver</a>');
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
	$data['periodoacademico'] = $this->periodoacademico_model->periodoacademico($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Periodoacademico";
    $this->load->view('template/page_header');		
    $this->load->view('periodoacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }






public function elprimero()
{
	$data['periodoacademico'] = $this->periodoacademico_model->elprimero();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Periodoacademico";
    $this->load->view('template/page_header');		
    $this->load->view('periodoacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['periodoacademico'] = $this->periodoacademico_model->elultimo();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  if(!empty($data))
  {
    $data['title']="Periodoacademico";
  
    $this->load->view('template/page_header');		
    $this->load->view('periodoacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['periodoacademico_list']=$this->periodoacademico_model->lista_periodoacademico()->result();
	$data['periodoacademico'] = $this->periodoacademico_model->siguiente($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Periodoacademico";
	$this->load->view('template/page_header');		
  $this->load->view('periodoacademico_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['periodoacademico_list']=$this->periodoacademico_model->lista_periodoacademico()->result();
	$data['periodoacademico'] = $this->periodoacademico_model->anterior($this->uri->segment(3))->row_array();
		$data['departamentos']= $this->departamento_model->lista_departamentos()->result();
  $data['title']="Periodoacademico";
	$this->load->view('template/page_header');		
  $this->load->view('periodoacademico_record',$data);
	$this->load->view('template/page_footer');
}

}
