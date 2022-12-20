<?php

class Codigoqr extends CI_Controller{

  public function __construct(){
      parent::__construct();
      $this->load->model('codigoqr_model');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		$data['codigoqr']=$this->codigoqr_model->codigoqr(1)->row_array();
		$data['title']="Lista de codigoqres";
		$this->load->view('template/page_header');
		$this->load->view('codigoqr_record',$data);
		$this->load->view('template/page_footer');
	}else{
	 	$this->load->view('template/page_header.php');
		$this->load->view('login_form');
	 	$this->load->view('template/page_footer.php');
	}
}


public function add()
{
		$data['title']="Nueva codigoqr";
	 	$this->load->view('template/page_header');		
	 	$this->load->view('codigoqr_form',$data);
	 	$this->load->view('template/page_footer');
}


public function  save()
	{
	 	$array_item=array(
	 	'filename' => $this->input->post('filename'),
	 	'tamanio' => $this->input->post('tamanio'),
	 	'level' => $this->input->post('level'),
	 	'framesize' => $this->input->post('framesize'),
	 	'contenido' => $this->input->post('contenido'),
	 	);
	 	$this->codigoqr_model->save($array_item);
	 	redirect('codigoqr');
 	}



public function edit()
{
	 	$data['codigoqr'] = $this->codigoqr_model->codigoqr($this->uri->segment(3))->row_array();
 	 	$data['title'] = "Actualizar codigoqr";
 	 	$this->load->view('template/page_header');		
 	 	$this->load->view('codigoqr_edit',$data);
	 	$this->load->view('template/page_footer');
 
}


	public function  save_edit()
	{
		$id=$this->input->post('idcodigoqr');
	 	$array_item=array(
		 	
		 	'idcodigoqr' => $this->input->post('idcodigoqr'),
		 	'nombre' => $this->input->post('nombre'),
	 	);
	 	$this->codigoqr_model->update($id,$array_item);
	 	redirect('codigoqr');
 	}


 	public function delete()
 	{
 		$data=$this->codigoqr_model->delete($this->uri->segment(3));
 		echo json_encode($data);
	 	redirect('codigoqr/elprimero');
	//	$db['default']['db_debug']=FALSE
 	}


public function listar()
{
	
  $data['title']="Codigoqr";
	$this->load->view('template/page_header');		
  $this->load->view('codigoqr_list',$data);
	$this->load->view('template/page_footer');
}



function codigoqr_data()
{
		$draw= intval($this->input->get("draw"));
		$draw= intval($this->input->get("start"));
		$draw= intval($this->input->get("length"));


	 	$data0 = $this->codigoqr_model->lista_codigoqrs();
		$data=array();
		foreach($data0->result() as $r){
			$data[]=array($r->idcodigoqr,$r->numero,$r->nombre,
				$r->href='<a href="javascript:void(0);" class="btn btn-info btn-sm item_ver"  data-retorno="'.site_url('codigoqr/actual').'"     data-idcodigoqr="'.$r->idcodigoqr.'">Ver</a>');
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
	$data['codigoqr'] = $this->codigoqr_model->codigoqr($this->uri->segment(3))->row_array();
  if(!empty($data))
  {
    $data['title']="Codigoqr";
    $this->load->view('template/page_header');		
    $this->load->view('codigoqr_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }












public function elprimero()
{
	$data['codigoqr'] = $this->codigoqr_model->elprimero();
  if(!empty($data))
  {
    $data['title']="Codigoqr";
    $this->load->view('template/page_header');		
    $this->load->view('codigoqr_record',$data);
    $this->load->view('template/page_footer');
  }else{
    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
 }

public function elultimo()
{
	$data['codigoqr'] = $this->codigoqr_model->elultimo();
  if(!empty($data))
  {
    $data['title']="Codigoqr";
  
    $this->load->view('template/page_header');		
    $this->load->view('codigoqr_record',$data);
    $this->load->view('template/page_footer');
  }else{

    $this->load->view('template/page_header');		
    $this->load->view('registro_vacio');
    $this->load->view('template/page_footer');
  }
}

public function siguiente(){
 // $data['codigoqr_list']=$this->codigoqr_model->lista_codigoqr()->result();
	$data['codigoqr'] = $this->codigoqr_model->siguiente($this->uri->segment(3))->row_array();
  $data['title']="Codigoqr";
	$this->load->view('template/page_header');		
  $this->load->view('codigoqr_record',$data);
	$this->load->view('template/page_footer');
}

public function anterior(){
 // $data['codigoqr_list']=$this->codigoqr_model->lista_codigoqr()->result();
	$data['codigoqr'] = $this->codigoqr_model->anterior($this->uri->segment(3))->row_array();
  $data['title']="Codigoqr";
	$this->load->view('template/page_header');		
  $this->load->view('codigoqr_record',$data);
	$this->load->view('template/page_footer');
}

}
