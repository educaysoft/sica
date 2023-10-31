<?php

class Metodologiatema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('metodologiatema_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tipometodologiatema_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['metodologiatema']=$this->metodologiatema_model->lista_metodologiatemas()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
			
		$data['title']="Lista de metodologiatemas";
		$this->load->view('template/page_header');
		$this->load->view('metodologiatema_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['metodologiatema'] = $this->metodologiatema_model->metodologiatema($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('metodologiatema_record',$data);
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


  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
		$data['title']="Nueva Metodologiatema";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('metodologiatema_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmetodologiatema' => $this->input->post('idmetodologiatema'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiatema' => $this->input->post('idtipometodologiatema'),
	 	);
	 	$this->metodologiatema_model->save($array_item);
	 	//redirect('metodologiatema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['metodologiatema'] = $this->metodologiatema_model->metodologiatema($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
 	 	$data['title'] = "Actualizar Metodologiatema";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('metodologiatema_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmetodologiatema');
	 	$array_item=array(
		 	
		 	'idmetodologiatema' => $this->input->post('idmetodologiatema'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiatema' => $this->input->post('idtipometodologiatema'),
	 	);
	 	$this->metodologiatema_model->update($id,$array_item);
	 	//redirect('metodologiatema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->metodologiatema_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('metodologiatema/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Metodologiatemas";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiatema_list',$data);
	$this->load->view('template/page_footer');
}



function metodologiatema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->metodologiatema_model->lista_metodologiatemasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmetodologiatema,$r->laasignatura,$r->elmetodologiatema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmetodologiatema="'.$r->idmetodologiatema.'">Ver</a>');
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
	$data['metodologiatema'] = $this->metodologiatema_model->elprimero();
  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiatema";
    $this->load->view('template/page_header');		
    $this->load->view('metodologiatema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['metodologiatema'] = $this->metodologiatema_model->elultimo();
  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiatema";
  
    $this->load->view('template/page_header');		
    $this->load->view('metodologiatema_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['metodologiatema_list']=$this->metodologiatema_model->lista_metodologiatema()->result();
	$data['metodologiatema'] = $this->metodologiatema_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
  $data['title']="Metodologiatema";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiatema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['metodologiatema_list']=$this->metodologiatema_model->lista_metodologiatema()->result();
	$data['metodologiatema'] = $this->metodologiatema_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiatemas']= $this->tipometodologiatema_model->lista_tipometodologiatemas()->result();
  $data['title']="Metodologiatema";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiatema_record',$data);
	$this->load->view('template/page_footer');
}




}
