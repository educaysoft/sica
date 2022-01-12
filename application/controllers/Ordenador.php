<?php

class Ordenador extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('ordenador_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['ordenador']=$this->ordenador_model->ordenador(1)->row_array();
		$data['title']="Lista de ordenadores";
		$this->load->view('template/page_header');
		$this->load->view('ordenador_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva ordenador";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ordenador_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idordenador' => $this->input->post('idordenador'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->ordenador_model->save($array_item);
	 	redirect('ordenador');
 	}



public function edit()
{
	 	$data['ordenador'] = $this->ordenador_model->ordenador($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar ordenador";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ordenador_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idordenador');
	 	$array_item=array(
		 	
		 	'idordenador' => $this->input->post('idordenador'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->ordenador_model->update($id,$array_item);
	 	redirect('ordenador');
 	}


 	public function delete()
 	{
 		$data=$this->ordenador_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ordenador/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['ordenador'] = $this->ordenador_model->lista_ordenadores()->result();
  $data['title']="Ordenador";
	$this->load->view('template/page_header');		
  $this->load->view('ordenador_list',$data);
	$this->load->view('template/page_footer');
}



function ordenador_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->ordenador_model->lista_ordenadores();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idordenador,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idordenador="'.$r->idordenador.'">Ver</a>');
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
	$data['ordenador'] = $this->ordenador_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Ordenador";
    $this->load->view('template/page_header');		
    $this->load->view('ordenador_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['ordenador'] = $this->ordenador_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Ordenador";
  
    $this->load->view('template/page_header');		
    $this->load->view('ordenador_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ordenador_list']=$this->ordenador_model->lista_ordenador()->result();
	$data['ordenador'] = $this->ordenador_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Ordenador";
	$this->load->view('template/page_header');		
  $this->load->view('ordenador_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ordenador_list']=$this->ordenador_model->lista_ordenador()->result();
	$data['ordenador'] = $this->ordenador_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Ordenador";
	$this->load->view('template/page_header');		
  $this->load->view('ordenador_record',$data);
	$this->load->view('template/page_footer');
}

}
