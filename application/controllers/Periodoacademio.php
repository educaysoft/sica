<?php

class Periodoacademio extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('periodoacademio_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['periodoacademio']=$this->periodoacademio_model->elultimo();
		$data['title']="Lista de periodoacademioes";
		$this->load->view('template/page_header');
		$this->load->view('periodoacademio_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva periodoacademio";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('periodoacademio_form',$data);
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
	 	$this->periodoacademio_model->save($array_item);
	 	redirect('periodoacademio');
 	}



public function edit()
{
	 	$data['periodoacademio'] = $this->periodoacademio_model->periodoacademio($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar periodoacademio";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('periodoacademio_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idperiodoacademio');
	 	$array_item=array(
		 	
			'idperiodoacademio' => $this->input->post('idperiodoacademio'),
			'iddepartamento' => $this->input->post('iddepartamento'),
			'nombrecorto' => $this->input->post('nombrecorto'),
			'nombrelargo' => $this->input->post('nombrelargo'),
			'fechainicio' => $this->input->post('fechainicio'),
			'fechafin' => $this->input->post('fechafin'),
	 	);
	 	$this->periodoacademio_model->update($id,$array_item);
	 	redirect('periodoacademio');
 	}


 	public function delete()
 	{
 		$this->periodoacademio_model->delete($this->uri->segment(3));
	 	redirect('periodoacademio/elultimo');
 	}


	public function listar()
	{
	
		  $data['title']="Periodoacademio";
		$this->load->view('template/page_header');		
		  $this->load->view('periodoacademio_list',$data);
		$this->load->view('template/page_footer');
	}



	function periodoacademio_data()
	{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

	 	$data0 = $this->periodoacademio_model->lista_periodoacademioes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idperiodoacademio,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idperiodoacademio="'.$r->idperiodoacademio.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	}








public function elprimero()
{
	$data['periodoacademio'] = $this->periodoacademio_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Periodoacademio";
    $this->load->view('template/page_header');		
    $this->load->view('periodoacademio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['periodoacademio'] = $this->periodoacademio_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Periodoacademio";
  
    $this->load->view('template/page_header');		
    $this->load->view('periodoacademio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['periodoacademio_list']=$this->periodoacademio_model->lista_periodoacademio()->result();
	$data['periodoacademio'] = $this->periodoacademio_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Periodoacademio";
	$this->load->view('template/page_header');		
  $this->load->view('periodoacademio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['periodoacademio_list']=$this->periodoacademio_model->lista_periodoacademio()->result();
	$data['periodoacademio'] = $this->periodoacademio_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Periodoacademio";
	$this->load->view('template/page_header');		
  $this->load->view('periodoacademio_record',$data);
	$this->load->view('template/page_footer');
}

}
