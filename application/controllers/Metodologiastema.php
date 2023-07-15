<?php

class Metodologiastema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('metodologiastema_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tipometodologiastema_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['metodologiastema']=$this->metodologiastema_model->lista_metodologiastemas()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
			
		$data['title']="Lista de metodologiastemas";
		$this->load->view('template/page_header');
		$this->load->view('metodologiastema_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['metodologiastema'] = $this->metodologiastema_model->metodologiastema($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('metodologiastema_record',$data);
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


  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
		$data['title']="Nueva Metodologiastema";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('metodologiastema_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmetodologiastema' => $this->input->post('idmetodologiastema'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiastema' => $this->input->post('idtipometodologiastema'),
	 	);
	 	$this->metodologiastema_model->save($array_item);
	 	//redirect('metodologiastema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['metodologiastema'] = $this->metodologiastema_model->metodologiastema($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
 	 	$data['title'] = "Actualizar Metodologiastema";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('metodologiastema_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmetodologiastema');
	 	$array_item=array(
		 	
		 	'idmetodologiastema' => $this->input->post('idmetodologiastema'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiastema' => $this->input->post('idtipometodologiastema'),
	 	);
	 	$this->metodologiastema_model->update($id,$array_item);
	 	//redirect('metodologiastema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->metodologiastema_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('metodologiastema/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Metodologiastemas";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiastema_list',$data);
	$this->load->view('template/page_footer');
}



function metodologiastema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->metodologiastema_model->lista_metodologiastemasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmetodologiastema,$r->laasignatura,$r->elmetodologiastema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmetodologiastema="'.$r->idmetodologiastema.'">Ver</a>');
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
	$data['metodologiastema'] = $this->metodologiastema_model->elprimero();
  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiastema";
    $this->load->view('template/page_header');		
    $this->load->view('metodologiastema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['metodologiastema'] = $this->metodologiastema_model->elultimo();
  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiastema";
  
    $this->load->view('template/page_header');		
    $this->load->view('metodologiastema_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['metodologiastema_list']=$this->metodologiastema_model->lista_metodologiastema()->result();
	$data['metodologiastema'] = $this->metodologiastema_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
  $data['title']="Metodologiastema";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiastema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['metodologiastema_list']=$this->metodologiastema_model->lista_metodologiastema()->result();
	$data['metodologiastema'] = $this->metodologiastema_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiastemas']= $this->tipometodologiastema_model->lista_tipometodologiastemas()->result();
  $data['title']="Metodologiastema";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiastema_record',$data);
	$this->load->view('template/page_footer');
}




}
