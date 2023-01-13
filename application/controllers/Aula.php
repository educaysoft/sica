<?php

class Aula extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('aula_model');
      $this->load->model('prestamoaula_model');
  	  $this->load->model('institucion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
	  	$data['aula']=$this->aula_model->elultimo();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['title']="Lista de Artiulos";
			$this->load->view('template/page_header');		
  		$this->load->view('aula_record',$data);
			$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
		$data['title']="Nuevo Artículo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('aula_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idaula' => $this->input->post('idaula'),
	 	'nombre' => $this->input->post('nombre'),
	 	'detalle' => $this->input->post('detalle'),
	 	'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->aula_model->save($array_item);
	 	redirect('aula');
 	}



public function edit()
{
	 	$data['aula'] = $this->aula_model->aula($this->uri->segment(3))->row_array();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
 	 	$data['title'] = "Actualizar Aula";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('aula_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idaula');
	 	$array_item=array(
		 	
		 	'idaula' => $this->input->post('idaula'),
		 	'nombre' => $this->input->post('nombre'),
		 	'detalle' => $this->input->post('detalle'),
	 		'idinstitucion' => $this->input->post('idinstitucion'),
	 	);
	 	$this->aula_model->update($id,$array_item);
	 	redirect('aula');
 	}



public function listar()
{
	
  $data['title']="Aula";
	$this->load->view('template/page_header');		
  $this->load->view('aula_list',$data);
	$this->load->view('template/page_footer');
}

function aula_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->aula_model->lista_aulas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idaula,$r->nombre,$r->detalle,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('aula/actual').'"  data-idaula="'.$r->idaula.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}




	function prestamo_data()
	{
			$draw= intval($this->input->get("draw"));
			$draw= intval($this->input->get("start"));
			$draw= intval($this->input->get("length"));

			$idaula=$this->input->get('idaula');
			$data0 =$this->prestamoaula_model->prestamoaulasA($idaula);
			$data=array();
			foreach($data0->result() as $r){
				$data[]=array($r->idprestamoaula,$r->idaula,$r->lapersona,$r->fechaprestamo,$r->horaprestamo,$r->fechadevolucion,$r->horadevolucion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoaula/actual').'"    data-idprestamoaula="'.$r->idprestamoaula.'">Ver</a><a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('prestamoaula/edit').'"    data-idprestamoaula="'.$r->idprestamoaula.'">edit</a>');
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
	$data['aula'] = $this->aula_model->aula($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Aula";
    $this->load->view('template/page_header');		
    $this->load->view('aula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['aula'] = $this->aula_model->elprimero();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Aula";
    $this->load->view('template/page_header');		
    $this->load->view('aula_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	  $data['aula'] = $this->aula_model->elultimo();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
    $data['title']="Aula";
  
    $this->load->view('template/page_header');		
    $this->load->view('aula_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['aula_list']=$this->aula_model->lista_aula()->result();
	$data['aula'] = $this->aula_model->siguiente($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Aula";
	$this->load->view('template/page_header');		
  $this->load->view('aula_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['aula_list']=$this->aula_model->lista_aula()->result();
	$data['aula'] = $this->aula_model->anterior($this->uri->segment(3))->row_array();
 	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Aula";
	$this->load->view('template/page_header');		
  $this->load->view('aula_record',$data);
	$this->load->view('template/page_footer');
}





}
