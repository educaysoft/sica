<?php

class Direccion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('direccion_model');
  	  $this->load->model('persona_model');
  	  $this->load->model('codigopostal_model');
}

public function index(){

  	if(isset($this->session->userdata['logged_in'])){
			
  	$data['direccion']=$this->direccion_model->lista_direccions()->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
			
		$data['title']="Lista de direccions";
		$this->load->view('template/page_header');
		$this->load->view('direccion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}

 }


public function actual(){
 if(isset($this->session->userdata['logged_in'])){

	$data['direccion'] = $this->direccion_model->direccion($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
	$data['title']="Modulo de Telefonos";
	$this->load->view('template/page_header');		
	$this->load->view('direccion_record',$data);
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
		$data['personas']= $this->persona_model->persona($this->uri->segment(3))->result();

	}else{

		$data['personas']= $this->persona_model->lista_personas()->result();
	}


  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
		$data['title']="Nueva Direccion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('direccion_form',$data);
	 	$this->load->view('template/page_footer');


}


	public function  save()
	{
	 	$array_item=array(
		 	
		 	'iddireccion' => $this->input->post('iddireccion'),
		 	'nombre' => $this->input->post('nombre'),
			'idpersona' => $this->input->post('idpersona'),
			'idcodigopostal' => $this->input->post('idcodigopostal'),
	 	);
	 	$this->direccion_model->save($array_item);
	 	//redirect('direccion');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}



public function edit()
{
	 	$data['direccion'] = $this->direccion_model->direccion($this->uri->segment(3))->row_array();
		$data['personas']= $this->persona_model->lista_personas()->result();
  		$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
 	 	$data['title'] = "Actualizar Direccion";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('direccion_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('iddireccion');
	 	$array_item=array(
		 	
		 	'iddireccion' => $this->input->post('iddireccion'),
		 	'nombre' => $this->input->post('nombre'),
			'idpersona' => $this->input->post('idpersona'),
			'idcodigopostal' => $this->input->post('idcodigopostal'),
	 	);
	 	$this->direccion_model->update($id,$array_item);
	 	//redirect('direccion');
		echo "<script  language='JavaScript'>window.history.go(-2);</script>";
 	}


 	public function delete()
 	{
 		$data=$this->direccion_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('direccion/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Direccions";
	$this->load->view('template/page_header');		
  $this->load->view('direccion_list',$data);
	$this->load->view('template/page_footer');
}



function direccion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->direccion_model->lista_direccionsA();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->iddireccion,$r->lapersona,$r->eldireccion,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('direccion/actual').'"  data-iddireccion="'.$r->iddireccion.'">Ver</a>');
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
	$data['direccion'] = $this->direccion_model->elprimero();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Direccion";
    $this->load->view('template/page_header');		
    $this->load->view('direccion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['direccion'] = $this->direccion_model->elultimo();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
  if(!empty($data))
  {
  	$data['personas']= $this->persona_model->lista_personas()->result();
    $data['title']="Direccion";
  
    $this->load->view('template/page_header');		
    $this->load->view('direccion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['direccion_list']=$this->direccion_model->lista_direccion()->result();
	$data['direccion'] = $this->direccion_model->siguiente($this->uri->segment(3))->row_array();
  	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
  $data['title']="Direccion";
	$this->load->view('template/page_header');		
  $this->load->view('direccion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['direccion_list']=$this->direccion_model->lista_direccion()->result();
	$data['direccion'] = $this->direccion_model->anterior($this->uri->segment(3))->row_array();
 	$data['personas']= $this->persona_model->lista_personas()->result();
  	$data['codigopostals']= $this->codigopostal_model->lista_codigopostal()->result();
  $data['title']="Direccion";
	$this->load->view('template/page_header');		
  $this->load->view('direccion_record',$data);
	$this->load->view('template/page_footer');
}




}
