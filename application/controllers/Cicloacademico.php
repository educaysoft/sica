<?php

class Cicloacademico extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('cicloacademico_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['cicloacademico']=$this->cicloacademico_model->cicloacademico(1)->row_array();
		$data['title']="Lista de cicloacademicoes";
		$this->load->view('template/page_header');
		$this->load->view('cicloacademico_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva cicloacademico";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('cicloacademico_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idcicloacademico' => $this->input->post('idcicloacademico'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cicloacademico_model->save($array_item);
	 	redirect('cicloacademico');
 	}



public function edit()
{
	 	$data['cicloacademico'] = $this->cicloacademico_model->cicloacademico($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar cicloacademico";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('cicloacademico_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcicloacademico');
	 	$array_item=array(
		 	
		 	'idcicloacademico' => $this->input->post('idcicloacademico'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->cicloacademico_model->update($id,$array_item);
	 	redirect('cicloacademico');
 	}


 	public function delete()
 	{
 		$data=$this->cicloacademico_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('cicloacademico/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Cicloacademico";
	$this->load->view('template/page_header');		
  $this->load->view('cicloacademico_list',$data);
	$this->load->view('template/page_footer');
}



function cicloacademico_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->cicloacademico_model->lista_cicloacademicos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcicloacademico,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcicloacademico="'.$r->idcicloacademico.'">Ver</a>');
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
	$data['cicloacademico'] = $this->cicloacademico_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Cicloacademico";
    $this->load->view('template/page_header');		
    $this->load->view('cicloacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['cicloacademico'] = $this->cicloacademico_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Cicloacademico";
  
    $this->load->view('template/page_header');		
    $this->load->view('cicloacademico_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['cicloacademico_list']=$this->cicloacademico_model->lista_cicloacademico()->result();
	$data['cicloacademico'] = $this->cicloacademico_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Cicloacademico";
	$this->load->view('template/page_header');		
  $this->load->view('cicloacademico_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['cicloacademico_list']=$this->cicloacademico_model->lista_cicloacademico()->result();
	$data['cicloacademico'] = $this->cicloacademico_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Cicloacademico";
	$this->load->view('template/page_header');		
  $this->load->view('cicloacademico_record',$data);
	$this->load->view('template/page_footer');
}

}
