<?php

class Publicaciondocente extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('publicaciondocente_model');
  	  $this->load->model('docente_model');
  	  $this->load->model('distributivo_model');
  	  $this->load->model('publicacion_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  		$data['publicaciondocente']=$this->publicaciondocente_model->lista_publicaciondocentes()->row_array();
  		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
			
		$data['title']="Lista de publicaciondocentes";
		$this->load->view('template/page_header');
		$this->load->view('publicaciondocente_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['publicaciondocente'] = $this->publicaciondocente_model->publicaciondocente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('publicaciondocente_record',$data);
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
		$idpublicacion=$this->uri->segment(3);
  		$data['publicacions']= $this->publicacion_model->publicacionsA($idpublicacion)->result();
	}else{
  		$data['publicacions']= $this->publicacion_model->publicacionsA(0)->result();
	}

		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();

		$data['title']="Nueva Publicaciondocente";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('publicaciondocente_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'idpublicaciondocente' => $this->input->post('idpublicaciondocente'),
			'iddocente' => $this->input->post('iddocente'),
			'idpublicacion' => $this->input->post('idpublicacion'),
	 	);
	 	$this->publicaciondocente_model->save($array_item);
	 	//redirect('publicaciondocente');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['publicaciondocente'] = $this->publicaciondocente_model->publicaciondocente($this->uri->segment(3))->row_array();
		$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  		$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
 	 	$data['title'] = "Actualizar Publicaciondocente";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('publicaciondocente_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idpublicaciondocente');
	 	$array_item=array(
		 	
		 	'idpublicaciondocente' => $this->input->post('idpublicaciondocente'),
			'iddocente' => $this->input->post('iddocente'),
			'idpublicacion' => $this->input->post('idpublicacion'),
	 	);
	 	$this->publicaciondocente_model->update($id,$array_item);
	 	//redirect('publicaciondocente');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->publicaciondocente_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('publicaciondocente/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Publicaciondocentes";
	$this->load->view('template/page_header');		
  $this->load->view('publicaciondocente_list',$data);
	$this->load->view('template/page_footer');
}



function publicaciondocente_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));
		if($this->input->get('iddocente')){
		$iddocente=$this->input->get('iddocente');
	 	$data0 = $this->publicaciondocente_model->publicaciondocentesA($iddocente);
		}else{
	 	$data0 = $this->publicaciondocente_model->publicaciondocentesA(0);
		}
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idpublicaciondocente,$r->eldocente,$r->titulo,$r->tipo,$r->url,$r->fechapublicacion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('publicaciondocente/actual').'"  data-idpublicaciondocente="'.$r->idpublicaciondocente.'">Ver</a>');
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
		$data['publicaciondocentes']=$this->publicaciondocente_model->lista_publicaciondocentesA(0)->result();
		$data['distributivo'] =$this->distributivo_model->distributivo1($iddistributivo)->result();
		$data['title']="Evento";
		$this->load->view('publicaciondocente_pdf',$data);
	}







public function elprimero()
{
	$data['publicaciondocente'] = $this->publicaciondocente_model->elprimero();
  	$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Publicaciondocente";
    $this->load->view('template/page_header');		
    $this->load->view('publicaciondocente_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['publicaciondocente'] = $this->publicaciondocente_model->elultimo();
  	$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
  if(!empty($data))
  {
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
    $data['title']="Publicaciondocente";
  
    $this->load->view('template/page_header');		
    $this->load->view('publicaciondocente_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['publicaciondocente_list']=$this->publicaciondocente_model->lista_publicaciondocente()->result();
	$data['publicaciondocente'] = $this->publicaciondocente_model->siguiente($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
  $data['title']="Publicaciondocente";
	$this->load->view('template/page_header');		
  $this->load->view('publicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['publicaciondocente_list']=$this->publicaciondocente_model->lista_publicaciondocente()->result();
	$data['publicaciondocente'] = $this->publicaciondocente_model->anterior($this->uri->segment(3))->row_array();
  	$data['docentes']= $this->docente_model->lista_docentesA(0)->result();
  	$data['publicacions']= $this->publicacion_model->lista_publicacions()->result();
  $data['title']="Publicaciondocente";
	$this->load->view('template/page_header');		
  $this->load->view('publicaciondocente_record',$data);
	$this->load->view('template/page_footer');
}




}
