<?php

class Estudio extends CI_Controller{

  public function __construct(){
      parent::__construct();
  	  $this->load->model('persona_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('estudio_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['estudio']=$this->estudio_model->lista_estudios()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['estudios']= $this->estudio_model->lista_estudios()->result();
			
		$data['title']="Lista de estudios";
		$this->load->view('template/page_header');
		$this->load->view('estudio_record',$data);
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
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['title']="Nueva Estudio";
			$this->load->view('template/page_header');		
			$this->load->view('estudio_form',$data);
			$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'nivel' => $this->input->post('nivel'),
			'titulo' => $this->input->post('titulo'),
	 	);
	 	$result=$this->estudio_model->save($array_item);
	 	if($result == FALSE)
		{
			echo "<script language='JavaScript'> alert('Estudios ya existe'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}



	public function edit()
	{
			$data['estudio'] = $this->estudio_model->estudio($this->uri->segment(3))->row_array();
			$data['personas']= $this->persona_model->lista_personas()->result();
			$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
			$data['title'] = "Actualizar Estudio";
			$this->load->view('template/page_header');		
			$this->load->view('estudio_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idestudio');
	 	$array_item=array(
		 	
		 	'idestudio' => $this->input->post('idestudio'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'fecharegistro' => $this->input->post('fecharegistro'),
			'numeroregistro' => $this->input->post('numeroregistro'),
			'nivel' => $this->input->post('nivel'),
			'titulo' => $this->input->post('titulo'),
	 	);
	 	$this->estudio_model->update($id,$array_item);
	 	redirect('estudio');
 	}


 	public function delete()
 	{
 		$data=$this->estudio_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('estudio/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


	public function listar()
	{
		
		$data['title']="Estudios";
		$this->load->view('template/page_header');		
		$this->load->view('estudio_list',$data);
		$this->load->view('template/page_footer');
	}



function estudio_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->estudio_model->lista_estudiosA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idestudio,$r->lapersona,$r->lainstitucion,$r->nivel,$r->titulo,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('estudio/actual').'"   data-idestudio="'.$r->idestudio.'">Ver</a>');
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
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();


	$data['estudio'] = $this->estudio_model->estudio($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Estudio";
    $this->load->view('template/page_header');		
    $this->load->view('estudio_record',$data);
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
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();


	$data['estudio'] = $this->estudio_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Estudio";
    $this->load->view('template/page_header');		
    $this->load->view('estudio_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['estudio'] = $this->estudio_model->elultimo();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Estudio";
  
    $this->load->view('template/page_header');		
    $this->load->view('estudio_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['estudio_list']=$this->estudio_model->lista_estudio()->result();
	$data['estudio'] = $this->estudio_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  

$data['title']="Estudio";
	$this->load->view('template/page_header');		
  $this->load->view('estudio_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['estudio_list']=$this->estudio_model->lista_estudio()->result();
	$data['estudio'] = $this->estudio_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  $data['title']="Estudio";
	$this->load->view('template/page_header');		
  $this->load->view('estudio_record',$data);
	$this->load->view('template/page_footer');
}




}
