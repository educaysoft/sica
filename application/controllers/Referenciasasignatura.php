<?php

class Referenciasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('referenciasasignatura_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tiporeferenciasasignatura_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['referenciasasignatura']=$this->referenciasasignatura_model->lista_referenciasasignaturas()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
			
		$data['title']="Lista de referenciasasignaturas";
		$this->load->view('template/page_header');
		$this->load->view('referenciasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['referenciasasignatura'] = $this->referenciasasignatura_model->referenciasasignatura($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('referenciasasignatura_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}






public function add()
{

	if($this->uri->segment(3))
	{
		$data['asignaturas']= $this->asignatura_model->asignaturas1($this->uri->segment(3))->result();

	}else{

		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA()->result();
	}


  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
		$data['title']="Nueva Referenciasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('referenciasasignatura_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idreferenciasasignatura' => $this->input->post('idreferenciasasignatura'),
		 	'titulo' => $this->input->post('titulo'),
		 	'url' => $this->input->post('url'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtiporeferenciasasignatura' => $this->input->post('idtiporeferenciasasignatura'),
	 	);
	 	$this->referenciasasignatura_model->save($array_item);
	 	//redirect('referenciasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['referenciasasignatura'] = $this->referenciasasignatura_model->referenciasasignatura($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
 	 	$data['title'] = "Actualizar Referenciasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('referenciasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idreferenciasasignatura');
	 	$array_item=array(
		 	
		 	'idreferenciasasignatura' => $this->input->post('idreferenciasasignatura'),
		 	'titulo' => $this->input->post('titulo'),
		 	'url' => $this->input->post('url'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtiporeferenciasasignatura' => $this->input->post('idtiporeferenciasasignatura'),
	 	);
	 	$this->referenciasasignatura_model->update($id,$array_item);
	 	//redirect('referenciasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->referenciasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('referenciasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Referenciasasignaturas";
	$this->load->view('template/page_header');		
  $this->load->view('referenciasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function referenciasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->referenciasasignatura_model->lista_referenciasasignaturasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idreferenciasasignatura,$r->laasignatura,$r->elreferenciasasignatura,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idreferenciasasignatura="'.$r->idreferenciasasignatura.'">Ver</a>');
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
	$data['referenciasasignatura'] = $this->referenciasasignatura_model->elprimero();
  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Referenciasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('referenciasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['referenciasasignatura'] = $this->referenciasasignatura_model->elultimo();
  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Referenciasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('referenciasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['referenciasasignatura_list']=$this->referenciasasignatura_model->lista_referenciasasignatura()->result();
	$data['referenciasasignatura'] = $this->referenciasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
  $data['title']="Referenciasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('referenciasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['referenciasasignatura_list']=$this->referenciasasignatura_model->lista_referenciasasignatura()->result();
	$data['referenciasasignatura'] = $this->referenciasasignatura_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tiporeferenciasasignaturas']= $this->tiporeferenciasasignatura_model->lista_tiporeferenciasasignaturas()->result();
  $data['title']="Referenciasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('referenciasasignatura_record',$data);
	$this->load->view('template/page_footer');
}




}
