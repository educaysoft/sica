<?php

class Password extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('password_model');
  	  $this->load->model('usuario_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('modulo_model');
  	  $this->load->model('evento_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['password']=$this->password_model->lista_passwords()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
			
		$data['title']="Lista de passwords";
		$this->load->view('template/page_header');
		$this->load->view('password_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }



public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['password']=$this->password_model->password($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
	$data['title']="Modulo de password";
	$this->load->view('template/page_header');		
	$this->load->view('password_record',$data);
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
		$data['title']="Nueva Password";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('password_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
	 	);
	 	$this->password_model->save($array_item);
	 	redirect('password');
 	}



public function edit()
{
	 	$data['password'] = $this->password_model->password($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  		$data['modulos']= $this->modulo_model->lista_modulos()->result();
 	 	$data['title'] = "Actualizar Password";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('password_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpassword');
	 	$array_item=array(
		 	
		 	'idpassword' => $this->input->post('idpassword'),
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
	 	);
	 	$this->password_model->update($id,$array_item);
	 	redirect('password');
 	}


 	public function delete()
 	{
 		$data=$this->password_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('password/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
	
  		$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  		$data['title']="Passwords";
		$this->load->view('template/page_header');		
  		$this->load->view('password_list',$data);
		$this->load->view('template/page_footer');
	}



function password_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$id=$this->input->get('idusuario');

	 	$data0 = $this->password_model->lista_passwordsA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpassword,$r->elusuario,$r->elmodulo,$r->elnivelpassword,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('password/actual').'"  data-idpassword="'.$r->idpassword.'">Ver</a>');
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
	$data['password'] = $this->password_model->elprimero();


  if(!empty($data))
  {
 	$data['password']=$this->password_model->lista_passwords()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
	


    $data['title']="Password";
    $this->load->view('template/page_header');		
    $this->load->view('password_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['password'] = $this->password_model->elultimo();
  if(!empty($data))
  {
	$data['password'] = $this->password_model->elultimo();
 //	$data['password']=$this->password_model->lista_passwords()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
	


    $data['title']="Password";
  
    $this->load->view('template/page_header');		
    $this->load->view('password_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 

	$data['password'] = $this->password_model->siguiente($this->uri->segment(3))->row_array();

  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
	


 	$data['title']="Password";
	$this->load->view('template/page_header');		
  	$this->load->view('password_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
	$data['password'] = $this->password_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
	 
 
  $data['title']="Password";
	$this->load->view('template/page_header');		
  $this->load->view('password_record',$data);
	$this->load->view('template/page_footer');
}




}
