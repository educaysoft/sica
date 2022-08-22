<?php

class Acceso extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('acceso_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('usuario_model');
  	  $this->load->model('modulo_model');
  	  $this->load->model('nivelacceso_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['acceso']=$this->acceso_model->lista_accesos()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
			
		$data['title']="Lista de accesos";
		$this->load->view('template/page_header');
		$this->load->view('acceso_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }



public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['acceso']=$this->acceso_model->usuario($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
	$data['title']="Modulo de acceso";
	$this->load->view('template/page_header');		
	$this->load->view('acceso_record',$data);
	$this->load->view('template/page_footer');
   }else{
	$this->load->view('template/page_header.php');
	$this->load->view('login_form');
	$this->load->view('template/page_footer.php');
   }
}



public function add()
{
	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
		$data['title']="Nueva Acceso";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('acceso_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'idacceso' => $this->input->post('idacceso'),
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
			'idnivelacceso' => $this->input->post('idnivelacceso'),
	 	);
	 	$this->acceso_model->save($array_item);
	 	redirect('acceso');
 	}



public function edit()
{
	 	$data['acceso'] = $this->acceso_model->acceso($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar Acceso";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('acceso_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idacceso');
	 	$array_item=array(
		 	
		 	'idacceso' => $this->input->post('idacceso'),
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
			'idnivelacceso' => $this->input->post('idnivelacceso'),
	 	);
	 	$this->acceso_model->update($id,$array_item);
	 	redirect('acceso');
 	}


 	public function delete()
 	{
 		$data=$this->acceso_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('acceso/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
	
  		$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  		$data['title']="Accesos";
		$this->load->view('template/page_header');		
  		$this->load->view('acceso_list',$data);
		$this->load->view('template/page_footer');
	}



function acceso_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$id=$this->input->get('idusuario');

	 	$data0 = $this->acceso_model->lista_accesosA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idacceso,$r->elusuario,$r->elmodulo,$r->elnivelacceso,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idacceso="'.$r->idacceso.'">Ver</a>');
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
	$data['acceso'] = $this->acceso_model->elprimero();


  if(!empty($data))
  {
 	$data['acceso']=$this->acceso_model->lista_accesos()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
	


    $data['title']="Acceso";
    $this->load->view('template/page_header');		
    $this->load->view('acceso_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['acceso'] = $this->acceso_model->elultimo();
  if(!empty($data))
  {
 	$data['acceso']=$this->acceso_model->lista_accesos()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
	


    $data['title']="Acceso";
  
    $this->load->view('template/page_header');		
    $this->load->view('acceso_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 

	$data['acceso'] = $this->acceso_model->siguiente($this->uri->segment(3))->row_array();

  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
	


 	$data['title']="Acceso";
	$this->load->view('template/page_header');		
  	$this->load->view('acceso_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
	$data['acceso'] = $this->acceso_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelaccesos']= $this->nivelacceso_model->lista_nivelaccesos()->result();
	 
 
  $data['title']="Acceso";
	$this->load->view('template/page_header');		
  $this->load->view('acceso_record',$data);
	$this->load->view('template/page_footer');
}




}
