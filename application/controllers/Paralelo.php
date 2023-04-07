<?php

class Paralelo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('paralelo_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['paralelo']=$this->paralelo_model->paralelo(1)->row_array();
		$data['title']="Lista de paraleloes";
		$this->load->view('template/page_header');
		$this->load->view('paralelo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva paralelo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('paralelo_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idparalelo' => $this->input->post('idparalelo'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->paralelo_model->save($array_item);
	 	redirect('paralelo');
 	}



public function edit()
{
	 	$data['paralelo'] = $this->paralelo_model->paralelo($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar paralelo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('paralelo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idparalelo');
	 	$array_item=array(
		 	
		 	'idparalelo' => $this->input->post('idparalelo'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->paralelo_model->update($id,$array_item);
	 	redirect('paralelo');
 	}


 	public function delete()
 	{
 		$data=$this->paralelo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('paralelo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Paralelo";
	$this->load->view('template/page_header');		
  $this->load->view('paralelo_list',$data);
	$this->load->view('template/page_footer');
}



function paralelo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->paralelo_model->lista_paralelos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idparalelo,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('paralelo/actual').'"     data-idparalelo="'.$r->idparalelo.'">Ver</a>');
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
	$data['paralelo'] = $this->paralelo_model->paralelo($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Paralelo";
    $this->load->view('template/page_header');		
    $this->load->view('paralelo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['paralelo'] = $this->paralelo_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Paralelo";
    $this->load->view('template/page_header');		
    $this->load->view('paralelo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['paralelo'] = $this->paralelo_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Paralelo";
  
    $this->load->view('template/page_header');		
    $this->load->view('paralelo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['paralelo_list']=$this->paralelo_model->lista_paralelo()->result();
	$data['paralelo'] = $this->paralelo_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Paralelo";
	$this->load->view('template/page_header');		
  $this->load->view('paralelo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['paralelo_list']=$this->paralelo_model->lista_paralelo()->result();
	$data['paralelo'] = $this->paralelo_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Paralelo";
	$this->load->view('template/page_header');		
  $this->load->view('paralelo_record',$data);
	$this->load->view('template/page_footer');
}

}
