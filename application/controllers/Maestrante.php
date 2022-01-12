<?php

class Maestrante extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('maestrante_model');
      $this->load->model('persona_model');
      $this->load->model('maestrante_estado_model');
      $this->load->model('maestria_model');
}

public function index(){
	$data['maestrante']=$this->maestrante_model->maestrante(1)->row_array();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
	$data['maestrias']= $this->maestria_model->lista_maestria()->result();
 // print_r($data['maestrante_list']);
  	$data['title']="Lista de Maestrantes";
	$this->load->view('template/page_header');		
  	$this->load->view('maestrante_record',$data);
	$this->load->view('template/page_footer');
}


public function add()
{
		$data['personas']= $this->persona_model->lista_persona()->result();
		$data['maestrante_estadoes']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
		$data['maestrias']= $this->maestria_model->lista_maestria()->result();
		$data['title']="Nuevo Maestrante";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('maestrante_form',$data);
	 	$this->load->view('template/page_footer');
}


	public function  save()
	{
	 	$array_item=array(
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idmaestrante_estado' => $this->input->post('idmaestrante_estado'),
		 	'idmaestria' => $this->input->post('idmaestria'),
	 	);
	 	$this->maestrante_model->save($array_item);
	 	redirect('maestrante');
 	}



public function edit()
{
	$data['maestrante'] = $this->maestrante_model->maestrante($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estadoes']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
  	$data['title'] = "Actualizar Maestrante";
  	$this->load->view('template/page_header');		
  	$this->load->view('maestrante_edit',$data);
 	$this->load->view('template/page_footer');
}


	public function  save_edit()
	{
		$id=$this->input->post('idmaestrante');
	 	$array_item=array(
		 	'password' => $this->input->post('password'),
		 	'idpersona' => $this->input->post('idpersona'),
		 	'idmaestrante_estado' => $this->input->post('idpefil'),
		 	'email' => $this->input->post('email'),
	 	);
	 	$this->maestrante_model->update($id,$array_item);
	 	redirect('maestrante');
 	}



 	public function delete()
 	{
 		$data=$this->maestrante_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('maestrante/elprimero');
 	}





public function listar()
{
	
  $data['maestrante'] = $this->maestrante_model->lista_maestrantes()->result();
  $data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
  $data['title']="Maestrantes";
	$this->load->view('template/page_header');		
  $this->load->view('maestrante_list',$data);
	$this->load->view('template/page_footer');
}


public function estado()
{
  	$data['idmaestrante']=$this->uri->segment(3);
	$data['title']="Maestrante estado";
	$this->load->view('template/page_header');		
  $this->load->view('vitacora_maestrante_list',$data);
	$this->load->view('template/page_footer');
}





function maestrante_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->maestrante_model->lista_maestrantes1();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmaestrante,$r->maestrante,$r->maestria,$r->estado,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_pdf"  data-idmaestrante="'.$r->idmaestrante.'">pdf</a>');
		}	
		$output=array( "draw"=>$draw,
			"recordsTotal"=> $data0->num_rows(),
			"recordsFiltered"=> $data0->num_rows(),
			"data"=>$data
		);
		echo json_encode($output);
		exit();
}


function maestrante_estado()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));

                $idmaestrante=$_GET['idmaestrante'];
	 	//$data0 = $this->maestrante_model->lista_estados($this->uri->segment(3));
	 	$data0 = $this->maestrante_model->lista_estados($idmaestrante);
$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idmaestrante,$r->maestrante,$r->estado,$r->fechainicia,$r->fechafinaliza,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_pdf"  data-idmaestrante="'.$r->idmaestrante.'">pdf</a>');
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

	$data['maestrante'] = $this->maestrante_model->elprimero();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
	$data['maestrias']= $this->maestria_model->lista_maestria()->result();
  if(!empty($data))
  {
    $data['title']="Maestrante";
  
    $this->load->view('template/page_header');		
    $this->load->view('maestrante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }


public function elultimo()
{

	$data['maestrante'] = $this->maestrante_model->elultimo();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
	$data['maestrias']= $this->maestria_model->lista_maestria()->result();
  if(!empty($data))
  {
    $data['title']="Maestrante";
  
    $this->load->view('template/page_header');		
    $this->load->view('maestrante_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');

  }
  
  }




public function siguiente(){
 // $data['maestrante_list']=$this->maestrante_model->lista_maestrante()->result();
	$data['maestrante'] = $this->maestrante_model->siguiente($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
	$data['maestrias']= $this->maestria_model->lista_maestria()->result();
  $data['title']="Maestrante";
	$this->load->view('template/page_header');		
  $this->load->view('maestrante_record',$data);
	$this->load->view('template/page_footer');
}


public function anterior(){
 // $data['maestrante_list']=$this->maestrante_model->lista_maestrante()->result();
	$data['maestrante'] = $this->maestrante_model->anterior($this->uri->segment(3))->row_array();
	$data['personas']= $this->persona_model->lista_persona()->result();
	$data['maestrante_estado']= $this->maestrante_estado_model->lista_maestrante_estado()->result();
	$data['maestrias']= $this->maestria_model->lista_maestria()->result();
  $data['title']="Maestrante";
	$this->load->view('template/page_header');		
  $this->load->view('maestrante_record',$data);
	$this->load->view('template/page_footer');
}





}
