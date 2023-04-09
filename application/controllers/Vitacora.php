<?php

class Vitacora extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('vitacora_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('usuario_model');
  	  $this->load->model('modulo_model');
  	  $this->load->model('nivelvitacora_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['vitacora']=$this->vitacora_model->lista_vitacoras()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
			
		$data['title']="Lista de vitacoras";
		$this->load->view('template/page_header');
		$this->load->view('vitacora_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }



public function actual(){
 if(isset($this->session->userdata['logged_in'])){
	$data['vitacora']=$this->vitacora_model->vitacora($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
	$data['title']="Modulo de vitacora";
	$this->load->view('template/page_header');		
	$this->load->view('vitacora_record',$data);
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
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
		$data['title']="Nueva Vitacora";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('vitacora_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
			'idnivelvitacora' => $this->input->post('idnivelvitacora'),
	 	);
	 	$this->vitacora_model->save($array_item);
	 	redirect('vitacora');
 	}



public function edit()
{
	 	$data['vitacora'] = $this->vitacora_model->vitacora($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  		$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
  		$data['modulos']= $this->modulo_model->lista_modulos()->result();
 	 	$data['title'] = "Actualizar Vitacora";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('vitacora_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idvitacora');
	 	$array_item=array(
		 	
		 	'idvitacora' => $this->input->post('idvitacora'),
			'idusuario' => $this->input->post('idusuario'),
			'idmodulo' => $this->input->post('idmodulo'),
			'idnivelvitacora' => $this->input->post('idnivelvitacora'),
	 	);
	 	$this->vitacora_model->update($id,$array_item);
	 	redirect('vitacora');
 	}


 	public function delete()
 	{
 		$data=$this->vitacora_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('vitacora/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
	
  		$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  		$data['title']="Vitacoras";
		$this->load->view('template/page_header');		
  		$this->load->view('vitacora_list',$data);
		$this->load->view('template/page_footer');
	}



function vitacora_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		$id=$this->input->get('idusuario');

	 	$data0 = $this->vitacora_model->lista_vitacorasA($id);
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idvitacora,$r->elusuario,$r->elmodulo,$r->elnivelvitacora,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('vitacora/actual').'"  data-idvitacora="'.$r->idvitacora.'">Ver</a>');
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
	$data['vitacora'] = $this->vitacora_model->elprimero();


  if(!empty($data))
  {
 	$data['vitacora']=$this->vitacora_model->lista_vitacoras()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
	


    $data['title']="Vitacora";
    $this->load->view('template/page_header');		
    $this->load->view('vitacora_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['vitacora'] = $this->vitacora_model->elultimo();
  if(!empty($data))
  {
	$data['vitacora'] = $this->vitacora_model->elultimo();
 //	$data['vitacora']=$this->vitacora_model->lista_vitacoras()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
	


    $data['title']="Vitacora";
  
    $this->load->view('template/page_header');		
    $this->load->view('vitacora_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 

	$data['vitacora'] = $this->vitacora_model->siguiente($this->uri->segment(3))->row_array();

  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
	


 	$data['title']="Vitacora";
	$this->load->view('template/page_header');		
  	$this->load->view('vitacora_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
	$data['vitacora'] = $this->vitacora_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['usuarios']= $this->usuario_model->lista_usuarios1()->result();
  	$data['modulos']= $this->modulo_model->lista_modulos()->result();
  	$data['nivelvitacoras']= $this->nivelvitacora_model->lista_nivelvitacoras()->result();
	 
 
  $data['title']="Vitacora";
	$this->load->view('template/page_header');		
  $this->load->view('vitacora_record',$data);
	$this->load->view('template/page_footer');
}




}
