<?php

class Ingregre extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('ingregre_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('institucion_model');
  	  $this->load->model('tipoingregre_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
		$data['ingregre'] = $this->ingregre_model->elprimero();
  		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
			
		$data['title']="Lista de ingregrees";
		$this->load->view('template/page_header');
		$this->load->view('ingregre_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }




public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['ingregre'] = $this->ingregre_model->ingregre($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
	$data['title']="Modulo de Ingregres";
	$this->load->view('template/page_header');		
	$this->load->view('ingregre_record',$data);
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
  		$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
		$data['title']="Nueva Ingregre";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('ingregre_form',$data);
	 	$this->load->view('template/page_footer');
	}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'fechaingregre' => $this->input->post('fechaingregre'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'idtipoingregre' => $this->input->post('idtipoingregre'),
	 	);
	 	$this->ingregre_model->save($array_item);
	 //	redirect('ingregre');
	//	redirect($_SERVER['HTTP_REFERER']);
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['ingregre'] = $this->ingregre_model->ingregre($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  		$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
 	 	$data['title'] = "Actualizar Ingregre";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('ingregre_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idingregre');
	 	$array_item=array(
		 	
		 	'idingregre' => $this->input->post('idingregre'),
			
		 	'fechaingregre' => $this->input->post('fechaingregre'),
		 	'valor' => $this->input->post('valor'),
		 	'detalle' => $this->input->post('detalle'),
			'idpersona' => $this->input->post('idpersona'),
			'idinstitucion' => $this->input->post('idinstitucion'),
			'idtipoingregre' => $this->input->post('idtipoingregre'),
	 	);
	 	$this->ingregre_model->update($id,$array_item);
	 	//redirect('ingregre');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->ingregre_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('ingregre/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Ingregres";
	$this->load->view('template/page_header');		
  $this->load->view('ingregre_list',$data);
	$this->load->view('template/page_footer');
}



function ingregre_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->ingregre_model->lista_ingregresA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idingregre,$r->lapersona,$r->numero,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-idingregre="'.$r->idingregre.'">Ver</a>');
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
	$data['ingregre'] = $this->ingregre_model->elprimero();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
    $data['title']="Ingregre";
    $this->load->view('template/page_header');		
    $this->load->view('ingregre_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['ingregre'] = $this->ingregre_model->elultimo();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
    $data['title']="Ingregre";
  
    $this->load->view('template/page_header');		
    $this->load->view('ingregre_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['ingregre_list']=$this->ingregre_model->lista_ingregre()->result();
	$data['ingregre'] = $this->ingregre_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
  $data['title']="Ingregre";
	$this->load->view('template/page_header');		
  $this->load->view('ingregre_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['ingregre_list']=$this->ingregre_model->lista_ingregre()->result();
	$data['ingregre'] = $this->ingregre_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['instituciones']= $this->institucion_model->lista_instituciones()->result();
  	$data['tipoingregres']= $this->tipoingregre_model->lista_tipoingregre()->result();
  $data['title']="Ingregre";
	$this->load->view('template/page_header');		
  $this->load->view('ingregre_record',$data);
	$this->load->view('template/page_footer');
}




}
