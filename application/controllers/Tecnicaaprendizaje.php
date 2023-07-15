<?php

class Tecnicaaprendizaje extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tecnicaaprendizaje_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tecnicaaprendizaje']=$this->tecnicaaprendizaje_model->tecnicaaprendizaje(1)->row_array();
		$data['title']="Lista de tecnicaaprendizajees";
		$this->load->view('template/page_header');
		$this->load->view('tecnicaaprendizaje_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tecnicaaprendizaje";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tecnicaaprendizaje_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtecnicaaprendizaje' => $this->input->post('idtecnicaaprendizaje'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tecnicaaprendizaje_model->save($array_item);
	 	redirect('tecnicaaprendizaje');
 	}



public function edit()
{
	 	$data['tecnicaaprendizaje'] = $this->tecnicaaprendizaje_model->tecnicaaprendizaje($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tecnicaaprendizaje";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tecnicaaprendizaje_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtecnicaaprendizaje');
	 	$array_item=array(
		 	
		 	'idtecnicaaprendizaje' => $this->input->post('idtecnicaaprendizaje'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tecnicaaprendizaje_model->update($id,$array_item);
	 	redirect('tecnicaaprendizaje');
 	}


 	public function delete()
 	{
 		$data=$this->tecnicaaprendizaje_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tecnicaaprendizaje/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tecnicaaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('tecnicaaprendizaje_list',$data);
	$this->load->view('template/page_footer');
}



function tecnicaaprendizaje_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tecnicaaprendizaje_model->lista_tecnicaaprendizajes();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtecnicaaprendizaje,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtecnicaaprendizaje="'.$r->idtecnicaaprendizaje.'">Ver</a>');
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
	$data['tecnicaaprendizaje'] = $this->tecnicaaprendizaje_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tecnicaaprendizaje";
    $this->load->view('template/page_header');		
    $this->load->view('tecnicaaprendizaje_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tecnicaaprendizaje'] = $this->tecnicaaprendizaje_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tecnicaaprendizaje";
  
    $this->load->view('template/page_header');		
    $this->load->view('tecnicaaprendizaje_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tecnicaaprendizaje_list']=$this->tecnicaaprendizaje_model->lista_tecnicaaprendizaje()->result();
	$data['tecnicaaprendizaje'] = $this->tecnicaaprendizaje_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tecnicaaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('tecnicaaprendizaje_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tecnicaaprendizaje_list']=$this->tecnicaaprendizaje_model->lista_tecnicaaprendizaje()->result();
	$data['tecnicaaprendizaje'] = $this->tecnicaaprendizaje_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tecnicaaprendizaje";
	$this->load->view('template/page_header');		
  $this->load->view('tecnicaaprendizaje_record',$data);
	$this->load->view('template/page_footer');
}

}
