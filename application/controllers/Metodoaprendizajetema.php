<?php

class Metodoaprendizajetema extends CI_Controller{

  public function __construct(){
      parent::__construct();
      	  $this->load->model('metodoaprendizajetema_model');
  	  $this->load->model('tema_model');
  	  $this->load->model('metodoaprendizaje_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['metodoaprendizajetema']=$this->metodoaprendizajetema_model->lista_metodoaprendizajetemas()->row_array();
  		$data['temas']= $this->tema_model->lista_temas()->result();
  		$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
			
		$data['title']="Lista de metodoaprendizajetemas";
		$this->load->view('template/page_header');
		$this->load->view('metodoaprendizajetema_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->metodoaprendizajetema($this->uri->segment(3))->row_array();
  	$data['temas']= $this->tema_model->lista_temas()->result();
  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('metodoaprendizajetema_record',$data);
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

		$data['temas']= $this->tema_model->tema1($this->uri->segment(3))->result();

	}else{

		$data['temas']= $this->tema_model->lista_temas1(0)->result();
	}


  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
		$data['title']="Nueva Metodoaprendizajetema";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('metodoaprendizajetema_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idmetodoaprendizajetema' => $this->input->post('idmetodoaprendizajetema'),
			'idtema' => $this->input->post('idtema'),
			'idmetodoaprendizaje' => $this->input->post('idmetodoaprendizaje'),
	 	);
	 	$this->metodoaprendizajetema_model->save($array_item);
	 	//redirect('metodoaprendizajetema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->metodoaprendizajetema($this->uri->segment(3))->row_array();
		$data['temas']= $this->tema_model->lista_temas1(0)->result();
  		$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
 	 	$data['title'] = "Actualizar Metodoaprendizajetema";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('metodoaprendizajetema_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idmetodoaprendizajetema');
	 	$array_item=array(
		 	
		 	'idmetodoaprendizajetema' => $this->input->post('idmetodoaprendizajetema'),
			'idtema' => $this->input->post('idtema'),
			'idmetodoaprendizaje' => $this->input->post('idmetodoaprendizaje'),
	 	);
	 	$this->metodoaprendizajetema_model->update($id,$array_item);
	 	//redirect('metodoaprendizajetema');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->metodoaprendizajetema_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('metodoaprendizajetema/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Metodoaprendizajetemas";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizajetema_list',$data);
	$this->load->view('template/page_footer');
}



function metodoaprendizajetema_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->metodoaprendizajetema_model->lista_metodoaprendizajetemasA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmetodoaprendizajetema,$r->latema,$r->elmetodoaprendizajetema,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idmetodoaprendizajetema="'.$r->idmetodoaprendizajetema.'">Ver</a>');
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
	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->elprimero();
  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
  if(!empty($data))
  {
  	$data['temas']= $this->tema_model->lista_temas()->result();
    $data['title']="Metodoaprendizajetema";
    $this->load->view('template/page_header');		
    $this->load->view('metodoaprendizajetema_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->elultimo();
  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
  if(!empty($data))
  {
  	$data['temas']= $this->tema_model->lista_temas()->result();
    $data['title']="Metodoaprendizajetema";
  
    $this->load->view('template/page_header');		
    $this->load->view('metodoaprendizajetema_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->siguiente($this->uri->segment(3))->row_array();
  	$data['temas']= $this->tema_model->lista_temas()->result();
  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
  $data['title']="Metodoaprendizajetema";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizajetema_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
	$data['metodoaprendizajetema'] = $this->metodoaprendizajetema_model->anterior($this->uri->segment(3))->row_array();
 	$data['temas']= $this->tema_model->lista_temas()->result();
  	$data['metodoaprendizajes']= $this->metodoaprendizaje_model->lista_metodoaprendizajes()->result();
  $data['title']="Metodoaprendizajetema";
	$this->load->view('template/page_header');		
  $this->load->view('metodoaprendizajetema_record',$data);
	$this->load->view('template/page_footer');
}




}
