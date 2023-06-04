<?php

class Correo extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('correo_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('correo_estado_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['correo']=$this->correo_model->lista_correos()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
			
		$data['title']="Lista de correos";
		$this->load->view('template/page_header');
		$this->load->view('correo_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['correo'] = $this->correo_model->correo($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('correo_record',$data);
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
		$data['personas']= $this->persona_model->persona($this->uri->segment(3))->result();

	}else{

		$data['personas']= $this->persona_model->lista_personas()->result();
	}


  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
		$data['title']="Nueva Correo";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('correo_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idcorreo' => $this->input->post('idcorreo'),
		 	'nombre' => $this->input->post('nombre'),
			'idpersona' => $this->input->post('idpersona'),
			'idcorreo_estado' => $this->input->post('idcorreo_estado'),
	 	);
	 	$this->correo_model->save($array_item);
	 	//redirect('correo');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['correo'] = $this->correo_model->correo($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
 	 	$data['title'] = "Actualizar Correo";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('correo_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcorreo');
	 	$array_item=array(
		 	
		 	'idcorreo' => $this->input->post('idcorreo'),
		 	'nombre' => $this->input->post('nombre'),
			'idpersona' => $this->input->post('idpersona'),
			'idcorreo_estado' => $this->input->post('idcorreo_estado'),
	 	);
	 	$this->correo_model->update($id,$array_item);
	 	//redirect('correo');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->correo_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('correo/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Correos";
	$this->load->view('template/page_header');		
  $this->load->view('correo_list',$data);
	$this->load->view('template/page_footer');
}



function correo_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->correo_model->lista_correosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcorreo,$r->lapersona,$r->elcorreo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('correo/actual').'"  data-idcorreo="'.$r->idcorreo.'">Ver</a>');
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
	$data['correo'] = $this->correo_model->elprimero();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
    $this->load->view('template/page_header');		
    $this->load->view('correo_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['correo'] = $this->correo_model->elultimo();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Correo";
  
    $this->load->view('template/page_header');		
    $this->load->view('correo_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['correo_list']=$this->correo_model->lista_correo()->result();
	$data['correo'] = $this->correo_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('correo_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['correo_list']=$this->correo_model->lista_correo()->result();
	$data['correo'] = $this->correo_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['correo_estados']= $this->correo_estado_model->lista_correo_estado()->result();
  $data['title']="Correo";
	$this->load->view('template/page_header');		
  $this->load->view('correo_record',$data);
	$this->load->view('template/page_footer');
}




}
