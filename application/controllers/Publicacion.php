<?php

class Publicacion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('publicacion_model');
  	  $this->load->model('docente_model');
  	  $this->load->model('distributivo_model');
  	  $this->load->model('tipopublicacion_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['publicacion']=$this->publicacion_model->lista_publicacions()->row_array();
  		$data['docentes']= $this->docente_model->lista_docentesA()->result();
  		$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
			
		$data['title']="Lista de publicacions";
		$this->load->view('template/page_header');
		$this->load->view('publicacion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['publicacion'] = $this->publicacion_model->publicacion($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('publicacion_record',$data);
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
		$data['docentes']= $this->docente_model->docentes1($this->uri->segment(3))->result();

	}else{

		$data['docentes']= $this->docente_model->lista_docentesA()->result();
	}


  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
		$data['title']="Nueva Publicacion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('publicacion_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idpublicacion' => $this->input->post('idpublicacion'),
		 	'titulo' => $this->input->post('titulo'),
		 	'url' => $this->input->post('url'),
			'fechapublicacion' => $this->input->post('fechapublicacion'),
			'idtipopublicacion' => $this->input->post('idtipopublicacion'),
	 	);
	 	$this->publicacion_model->save($array_item);
	 	//redirect('publicacion');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['publicacion'] = $this->publicacion_model->publicacion($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
 	 	$data['title'] = "Actualizar Publicacion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('publicacion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpublicacion');
	 	$array_item=array(
		 	
		 	'idpublicacion' => $this->input->post('idpublicacion'),
		 	'titulo' => $this->input->post('titulo'),
		 	'url' => $this->input->post('url'),
			'fechapublicacion' => $this->input->post('fechapublicacion'),
			'idtipopublicacion' => $this->input->post('idtipopublicacion'),
	 	);
	 	$this->publicacion_model->update($id,$array_item);
	 	//redirect('publicacion');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->publicacion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('publicacion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Publicacions";
	$this->load->view('template/page_header');		
  $this->load->view('publicacion_list',$data);
	$this->load->view('template/page_footer');
}



function publicacion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
	 	$data0 = $this->publicacion_model->lista_publicacionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpublicacion,$r->ladocente,$r->titulo,$r->tipo,$r->url,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('publicacion/actual').'"  data-idpublicacion="'.$r->idpublicacion.'">Ver</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();

}


	public function reportepdf()
	{
		$iddistributivo=$this->uri->segment(3);
		$data['publicacions']=$this->publicacion_model->lista_publicacionsA()->result();
		$data['distributivo'] =$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('publicacion_pdf',$data);
	}







public function elprimero()
{
	$data['publicacion'] = $this->publicacion_model->elprimero();
  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Publicacion";
    $this->load->view('template/page_header');		
    $this->load->view('publicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['publicacion'] = $this->publicacion_model->elultimo();
  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
    $data['title']="Publicacion";
  
    $this->load->view('template/page_header');		
    $this->load->view('publicacion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['publicacion_list']=$this->publicacion_model->lista_publicacion()->result();
	$data['publicacion'] = $this->publicacion_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
  $data['title']="Publicacion";
	$this->load->view('template/page_header');		
  $this->load->view('publicacion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['publicacion_list']=$this->publicacion_model->lista_publicacion()->result();
	$data['publicacion'] = $this->publicacion_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA()->result();
  	$data['tipopublicacions']= $this->tipopublicacion_model->lista_tipopublicacions()->result();
  $data['title']="Publicacion";
	$this->load->view('template/page_header');		
  $this->load->view('publicacion_record',$data);
	$this->load->view('template/page_footer');
}




}
