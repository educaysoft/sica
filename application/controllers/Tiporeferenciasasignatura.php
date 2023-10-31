<?php

class Tiporeferenciasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('tiporeferenciasasignatura_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['tiporeferenciasasignatura']=$this->tiporeferenciasasignatura_model->tiporeferenciasasignatura(1)->row_array();
		$data['title']="Lista de tiporeferenciasasignaturaes";
		$this->load->view('template/page_header');
		$this->load->view('tiporeferenciasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva tiporeferenciasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('tiporeferenciasasignatura_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'idtiporeferenciasasignatura' => $this->input->post('idtiporeferenciasasignatura'),
	 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiporeferenciasasignatura_model->save($array_item);
	 	redirect('tiporeferenciasasignatura');
 	}



public function edit()
{
	 	$data['tiporeferenciasasignatura'] = $this->tiporeferenciasasignatura_model->tiporeferenciasasignatura($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar tiporeferenciasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('tiporeferenciasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idtiporeferenciasasignatura');
	 	$array_item=array(
		 	
		 	'idtiporeferenciasasignatura' => $this->input->post('idtiporeferenciasasignatura'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->tiporeferenciasasignatura_model->update($id,$array_item);
	 	redirect('tiporeferenciasasignatura');
 	}


 	public function delete()
 	{
 		$data=$this->tiporeferenciasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('tiporeferenciasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Tiporeferenciasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tiporeferenciasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function tiporeferenciasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idtiporeferenciasasignatura,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idtiporeferenciasasignatura="'.$r->idtiporeferenciasasignatura.'">Ver</a>');
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
	$data['tiporeferenciasasignatura'] = $this->tiporeferenciasasignatura_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Tiporeferenciasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('tiporeferenciasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['tiporeferenciasasignatura'] = $this->tiporeferenciasasignatura_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Tiporeferenciasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('tiporeferenciasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['tiporeferenciasasignatura_list']=$this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignatura()->result();
	$data['tiporeferenciasasignatura'] = $this->tiporeferenciasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Tiporeferenciasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tiporeferenciasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['tiporeferenciasasignatura_list']=$this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignatura()->result();
	$data['tiporeferenciasasignatura'] = $this->tiporeferenciasasignatura_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Tiporeferenciasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('tiporeferenciasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

}
