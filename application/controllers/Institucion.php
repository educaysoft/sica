<?php

class Institucion extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('institucion_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['institucion']=$this->institucion_model->elultimo();
		$data['title']="Lista de instituciones";
		$this->load->view('template/page_header');
		$this->load->view('institucion_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva institucion";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('institucion_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{


   			date_default_timezone_set('America/Guayaquil');
    			$fecha = date("Y-m-d");
    			$hora= date("H:i:s");
			$idusuario=$this->session->userdata['logged_in']['idusuario'];

	 	$array_item=array(
	 	'nombre' => $this->input->post('nombre'),
	 	'iniciales' => $this->input->post('iniciales'),
	        'idusuario'=>$idusuario,
		'fechacreacion'=>$fecha,
		'horacreacion'=>$hora
	 	);
	 	$this->institucion_model->save($array_item);
	 	redirect('institucion');
 	}



	public function edit()
	{
			$data['institucion'] = $this->institucion_model->institucion($this->uri->segment(3))->row_array();
			$data['title'] = "Actualizar institucion";
			$this->load->view('template/page_header');		
			$this->load->view('institucion_edit',$data);
			$this->load->view('template/page_footer');
	 
	}


	public function  save_edit()
	{
		$id=$this->input->post('idinstitucion');
	 	$array_item=array(
		 	
		 	'idinstitucion' => $this->input->post('idinstitucion'),
		 	'nombre' => $this->input->post('nombre'),
	 		'iniciales' => $this->input->post('iniciales'),
	 	);
	 	$this->institucion_model->update($id,$array_item);
	 	redirect('institucion');
 	}


 	public function delete()
 	{
 		$result=$this->institucion_model->delete($this->uri->segment(3));
	 	if(!$result)
		{
			echo "<script language='JavaScript'> alert('La institucion no pudo eliminarse revise permisos'); </script>";
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}else{
			echo "<script language='JavaScript'> window.history.go(-2);</script>";
		}
 	}


	public function listar()
	{
		
	  $data['title']="Institucion";
		$this->load->view('template/page_header');		
	  $this->load->view('institucion_list',$data);
		$this->load->view('template/page_footer');
	}



function institucion_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->institucion_model->lista_instituciones();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idinstitucion,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver" data-retorno="'.site_url('institucion/actual').'"    data-idinstitucion="'.$r->idinstitucion.'">Ver</a>');
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
	$data['institucion'] = $this->institucion_model->institucion($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Institucion";
    $this->load->view('template/page_header');		
    $this->load->view('institucion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }







public function elprimero()
{
	$data['institucion'] = $this->institucion_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Institucion";
    $this->load->view('template/page_header');		
    $this->load->view('institucion_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['institucion'] = $this->institucion_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Institucion";
  
    $this->load->view('template/page_header');		
    $this->load->view('institucion_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['institucion_list']=$this->institucion_model->lista_institucion()->result();
	$data['institucion'] = $this->institucion_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Institucion";
	$this->load->view('template/page_header');		
  $this->load->view('institucion_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['institucion_list']=$this->institucion_model->lista_institucion()->result();
	$data['institucion'] = $this->institucion_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Institucion";
	$this->load->view('template/page_header');		
  $this->load->view('institucion_record',$data);
	$this->load->view('template/page_footer');
}

}
