<?php

class Identidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('tipodocumento_model');
  	  $this->load->model('identidad_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['identidad']=$this->identidad_model->lista_identidads()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  	$data['identidads']= $this->identidad_model->lista_identidads()->result();
			
		$data['title']="Lista de identidads";
		$this->load->view('template/page_header');
		$this->load->view('identidad_record',$data);
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
			$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
			$data['title']="Nueva Identidad";
			$this->load->view('template/page_header');		
			$this->load->view('identidad_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'ididentidad' => $this->input->post('ididentidad'),
			'idpersona' => $this->input->post('idpersona'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
			'identidad' => $this->input->post('identidad'),
	 	);
	 	$this->identidad_model->save($array_item);
	 	redirect('identidad');
 	}



	public function edit()
	{
			$data['identidad'] = $this->identidad_model->identidad($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
			$data['title'] = "Actualizar Identidad";
			$this->load->view('template/page_header');		
			$this->load->view('identidad_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('ididentidad');
	 	$array_item=array(
		 	
		 	'ididentidad' => $this->input->post('ididentidad'),
			'idpersona' => $this->input->post('idpersona'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
			'identidad' => $this->input->post('identidad'),
	 	);
	 	$this->identidad_model->update($id,$array_item);
	 	redirect('identidad');
 	}


 	public function delete()
 	{
 		$data=$this->identidad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('identidad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Identidads";
		$this->load->view('template/page_header');		
		$this->load->view('identidad_list',$data);
		$this->load->view('template/page_footer');
	}



function identidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->identidad_model->lista_identidadsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->ididentidad,$r->eltipodocumento,$r->identidad,$r->lapersona,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('identidad/actual').'"   data-ididentidad="'.$r->ididentidad.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
	
			

}



public function actual()
{


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();


	$data['identidad'] = $this->identidad_model->identidad($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identidad";
    $this->load->view('template/page_header');		
    $this->load->view('identidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }










public function elprimero()
{


  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();


	$data['identidad'] = $this->identidad_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identidad";
    $this->load->view('template/page_header');		
    $this->load->view('identidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['identidad'] = $this->identidad_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('identidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['identidad_list']=$this->identidad_model->lista_identidad()->result();
	$data['identidad'] = $this->identidad_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  

$data['title']="Identidad";
	$this->load->view('template/page_header');		
  $this->load->view('identidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['identidad_list']=$this->identidad_model->lista_identidad()->result();
	$data['identidad'] = $this->identidad_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  $data['title']="Identidad";
	$this->load->view('template/page_header');		
  $this->load->view('identidad_record',$data);
	$this->load->view('template/page_footer');
}




}
