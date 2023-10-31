<?php

class Metodologiasasignatura extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('metodologiasasignatura_model');
  	  $this->load->model('asignatura_model');
  	  $this->load->model('tipometodologiasasignatura_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['metodologiasasignatura']=$this->metodologiasasignatura_model->lista_metodologiasasignaturas()->row_array();
  		$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  		$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
			
		$data['title']="Lista de metodologiasasignaturas";
		$this->load->view('template/page_header');
		$this->load->view('metodologiasasignatura_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->metodologiasasignatura($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('metodologiasasignatura_record',$data);
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


  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
		$data['title']="Nueva Metodologiasasignatura";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('metodologiasasignatura_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmetodologiasasignatura' => $this->input->post('idmetodologiasasignatura'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiasasignatura' => $this->input->post('idtipometodologiasasignatura'),
	 	);
	 	$this->metodologiasasignatura_model->save($array_item);
	 	//redirect('metodologiasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->metodologiasasignatura($this->uri->segment(3))->row_array();
		$data['asignaturas']= $this->asignatura_model->lista_asignaturasA(0)->result();
  		$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
 	 	$data['title'] = "Actualizar Metodologiasasignatura";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('metodologiasasignatura_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmetodologiasasignatura');
	 	$array_item=array(
		 	
		 	'idmetodologiasasignatura' => $this->input->post('idmetodologiasasignatura'),
		 	'cantidad' => $this->input->post('cantidad'),
			'idasignatura' => $this->input->post('idasignatura'),
			'idtipometodologiasasignatura' => $this->input->post('idtipometodologiasasignatura'),
	 	);
	 	$this->metodologiasasignatura_model->update($id,$array_item);
	 	//redirect('metodologiasasignatura');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->metodologiasasignatura_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('metodologiasasignatura/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Metodologiasasignaturas";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiasasignatura_list',$data);
	$this->load->view('template/page_footer');
}



function metodologiasasignatura_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->metodologiasasignatura_model->lista_metodologiasasignaturasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmetodologiasasignatura,$r->laasignatura,$r->elmetodologiasasignatura,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmetodologiasasignatura="'.$r->idmetodologiasasignatura.'">Ver</a>');
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
	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->elprimero();
  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiasasignatura";
    $this->load->view('template/page_header');		
    $this->load->view('metodologiasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->elultimo();
  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
  if(!empty($data))
  {
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
    $data['title']="Metodologiasasignatura";
  
    $this->load->view('template/page_header');		
    $this->load->view('metodologiasasignatura_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['metodologiasasignatura_list']=$this->metodologiasasignatura_model->lista_metodologiasasignatura()->result();
	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->siguiente($this->uri->segment(3))->row_array();
  	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
  $data['title']="Metodologiasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiasasignatura_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['metodologiasasignatura_list']=$this->metodologiasasignatura_model->lista_metodologiasasignatura()->result();
	$data['metodologiasasignatura'] = $this->metodologiasasignatura_model->anterior($this->uri->segment(3))->row_array();
 	$data['asignaturas']= $this->asignatura_model->lista_asignaturas()->result();
  	$data['tipometodologiasasignaturas']= $this->tipometodologiasasignatura_model->lista_tipometodologiasasignaturas()->result();
  $data['title']="Metodologiasasignatura";
	$this->load->view('template/page_header');		
  $this->load->view('metodologiasasignatura_record',$data);
	$this->load->view('template/page_footer');
}




}
