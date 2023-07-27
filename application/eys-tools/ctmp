<?php

class Estadoproceso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('estadoproceso_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['estadoproceso']=$this->estadoproceso_model->estadoproceso(1)->row_array();
		$data['title']="Lista de estadoprocesoes";
		$this->load->view('template/page_header');
		$this->load->view('estadoproceso_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva estadoproceso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('estadoproceso_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idestadoproceso' => $this->input->post('idestadoproceso'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadoproceso_model->save($array_item);
	 	redirect('estadoproceso');
 	}



public function edit()
{
	 	$data['estadoproceso'] = $this->estadoproceso_model->estadoproceso($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar estadoproceso";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('estadoproceso_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idestadoproceso');
	 	$array_item=array(
		 	
		 	'idestadoproceso' => $this->input->post('idestadoproceso'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->estadoproceso_model->update($id,$array_item);
	 	redirect('estadoproceso');
 	}


 	public function delete()
 	{
 		$data=$this->estadoproceso_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estadoproceso/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Estadoproceso";
	$this->load->view('template/page_header');		
  $this->load->view('estadoproceso_list',$data);
	$this->load->view('template/page_footer');
}



function estadoproceso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estadoproceso_model->lista_estadoprocesos();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestadoproceso,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idestadoproceso="'.$r->idestadoproceso.'">Ver</a>');
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
	$data['estadoproceso'] = $this->estadoproceso_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Estadoproceso";
    $this->load->view('template/page_header');		
    $this->load->view('estadoproceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estadoproceso'] = $this->estadoproceso_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Estadoproceso";
  
    $this->load->view('template/page_header');		
    $this->load->view('estadoproceso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estadoproceso_list']=$this->estadoproceso_model->lista_estadoproceso()->result();
	$data['estadoproceso'] = $this->estadoproceso_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Estadoproceso";
	$this->load->view('template/page_header');		
  $this->load->view('estadoproceso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estadoproceso_list']=$this->estadoproceso_model->lista_estadoproceso()->result();
	$data['estadoproceso'] = $this->estadoproceso_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Estadoproceso";
	$this->load->view('template/page_header');		
  $this->load->view('estadoproceso_record',$data);
	$this->load->view('template/page_footer');
}

}
