<?php

class Contabilidad extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('contabilidad_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('tipocontabilidad_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['contabilidad'] = $this->contabilidad_model->elprimero();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
			
		$data['title']="Lista de contabilidades";
		$this->load->view('template/page_header');
		$this->load->view('contabilidad_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['contabilidad'] = $this->contabilidad_model->contabilidad($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
	$data['title']="Modulo de Contabilidads";
	$this->load->view('template/page_header');		
	$this->load->view('contabilidad_record',$data);
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
  		$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
		$data['title']="Nueva Contabilidad";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('contabilidad_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'fechacontabilidad' => $this->input->post('fechacontabilidad'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'idtipocontabilidad' => $this->input->post('idtipocontabilidad'),
	 	);
	 	$this->contabilidad_model->save($array_item);
	 //	redirect('contabilidad');
	//	redirect($_SERVER['HTTP_REFERER']);
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['contabilidad'] = $this->contabilidad_model->contabilidad($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
 	 	$data['title'] = "Actualizar Contabilidad";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('contabilidad_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcontabilidad');
	 	$array_item=array(
		 	
		 	'idcontabilidad' => $this->input->post('idcontabilidad'),
			
		 	'fechacontabilidad' => $this->input->post('fechacontabilidad'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'idtipocontabilidad' => $this->input->post('idtipocontabilidad'),
	 	);
	 	$this->contabilidad_model->update($id,$array_item);
	 	//redirect('contabilidad');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->contabilidad_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('contabilidad/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Contabilidads";
	$this->load->view('template/page_header');		
  $this->load->view('contabilidad_list',$data);
	$this->load->view('template/page_footer');
}



function contabilidad_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->contabilidad_model->lista_contabilidadsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcontabilidad,$r->lapersona,$r->numero,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idcontabilidad="'.$r->idcontabilidad.'">Ver</a>');
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
	$data['contabilidad'] = $this->contabilidad_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
    $data['title']="Contabilidad";
    $this->load->view('template/page_header');		
    $this->load->view('contabilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['contabilidad'] = $this->contabilidad_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
    $data['title']="Contabilidad";
  
    $this->load->view('template/page_header');		
    $this->load->view('contabilidad_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['contabilidad_list']=$this->contabilidad_model->lista_contabilidad()->result();
	$data['contabilidad'] = $this->contabilidad_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
  $data['title']="Contabilidad";
	$this->load->view('template/page_header');		
  $this->load->view('contabilidad_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['contabilidad_list']=$this->contabilidad_model->lista_contabilidad()->result();
	$data['contabilidad'] = $this->contabilidad_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipocontabilidads']= $this->tipocontabilidad_model->lista_tipocontabilidad()->result();
  $data['title']="Contabilidad";
	$this->load->view('template/page_header');		
  $this->load->view('contabilidad_record',$data);
	$this->load->view('template/page_footer');
}




}
