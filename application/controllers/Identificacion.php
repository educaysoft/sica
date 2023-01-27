<?php

class Identificacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('tipodocumento_model');
  	  $this->load->model('identificacion_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['identificacion']=$this->identificacion_model->lista_identificacions()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  	$data['identificacions']= $this->identificacion_model->lista_identificacions()->result();
			
		$data['title']="Lista de identificacions";
		$this->load->view('template/page_header');
		$this->load->view('identificacion_record',$data);
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
			$data['title']="Nueva Identificacion";
			$this->load->view('template/page_header');		
			$this->load->view('identificacion_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'ididentificacion' => $this->input->post('ididentificacion'),
			'idpersona' => $this->input->post('idpersona'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
			'identificacion' => $this->input->post('identificacion'),
	 	);
	 	$this->identificacion_model->save($array_item);
	 	redirect('identificacion');
 	}



	public function edit()
	{
			$data['identificacion'] = $this->identificacion_model->identificacion($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
			$data['title'] = "Actualizar Identificacion";
			$this->load->view('template/page_header');		
			$this->load->view('identificacion_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('ididentificacion');
	 	$array_item=array(
		 	
		 	'ididentificacion' => $this->input->post('ididentificacion'),
			'idpersona' => $this->input->post('idpersona'),
			'idtipodocumento' => $this->input->post('idtipodocumento'),
			'identificacion' => $this->input->post('identificacion'),
	 	);
	 	$this->identificacion_model->update($id,$array_item);
	 	redirect('identificacion');
 	}


 	public function delete()
 	{
 		$data=$this->identificacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('identificacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Identificacions";
		$this->load->view('template/page_header');		
		$this->load->view('identificacion_list',$data);
		$this->load->view('template/page_footer');
	}



function identificacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->identificacion_model->lista_identificacionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->ididentificacion,$r->eltipodocumento,$r->identificacion,$r->lapersona,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('identificacion/actual').'"   data-ididentificacion="'.$r->ididentificacion.'">Ver</a>');
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


	$data['identificacion'] = $this->identificacion_model->identificacion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identificacion";
    $this->load->view('template/page_header');		
    $this->load->view('identificacion_record',$data);
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


	$data['identificacion'] = $this->identificacion_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identificacion";
    $this->load->view('template/page_header');		
    $this->load->view('identificacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['identificacion'] = $this->identificacion_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Identificacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('identificacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['identificacion_list']=$this->identificacion_model->lista_identificacion()->result();
	$data['identificacion'] = $this->identificacion_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  

$data['title']="Identificacion";
	$this->load->view('template/page_header');		
  $this->load->view('identificacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['identificacion_list']=$this->identificacion_model->lista_identificacion()->result();
	$data['identificacion'] = $this->identificacion_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['tipodocumentos']= $this->tipodocumento_model->lista_tipodocumentos()->result();
  $data['title']="Identificacion";
	$this->load->view('template/page_header');		
  $this->load->view('identificacion_record',$data);
	$this->load->view('template/page_footer');
}




}
